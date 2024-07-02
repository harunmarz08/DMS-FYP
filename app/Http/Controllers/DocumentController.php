<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Document;
use App\Models\TemplateDocument;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use ZipArchive;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project, $type = 'main', TemplateDocument $template_doc)
    {

        $template_contents = TemplateDocument::where('project_id', $project->id)->where('id', $template_doc->id)->first();
        Session::put('template_contents', $template_contents);
        $template_contents = Session::get('template_contents');
        // dd($template_contents);
        switch ($type) {
            case 'cover':
                $view = 'project.template.KK3cover';
                break;
            case 'excel':
                $view = 'project.template.KK3excel';
                break;
            default:
                $view = 'project.template.KK3';
                break;
        }

        return view($view, ['project' => $project, 'template_contents' => $template_contents]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function printAndDownloadTemplate(Request $request, Project $project, TemplateDocument $template_doc)
    {
        $kertas_kerja = new \PhpOffice\PhpWord\TemplateProcessor('images_assets/KK3-template.docx');
        $documentPath = 'projects/' . $project->created_by . '/p_' . $project->name . '/t_main';
        $fileName = $project->name . ' KK3 (' . $template_doc->verification . ',' . $template_doc->status . ').docx';
        $storedPath = $documentPath . '/' . $fileName;

        // Always generate and save the file

        $templateContent = TemplateDocument::where('id', $template_doc->id)->firstOrFail();
        $data1 = $templateContent->data1;
        $data2 = $templateContent->data2;
        $data3 = $templateContent->data3 ?? []; // extra inputs for cloning
        $data4 = $templateContent->data4;
        $data5 = $templateContent->data5 ?? []; // extra inputs for cloning

        foreach ($data1 as $key => $value) {
            $kertas_kerja->setValue($key, $value);
        }

        foreach ($data2 as $key => $value) {
            $kertas_kerja->setValue($key, $value);
        }

        foreach ($data4 as $key => $value) {
            $kertas_kerja->setValue($key, $value);
        }

        if (is_array($data3) && isset($data3['it18_ex'])) {
            $clone1 = count($data3['it18_ex']);
            if ($clone1 > 0) {
                $kertas_kerja->cloneBlock('it18ex', $clone1, true, true);
                for ($i = 0; $i < $clone1; $i++) {
                    $value = $data3['it18_ex'][$i] ?? null; // Use null if the key does not exist
                    $kertas_kerja->setValue('it18_ex#' . ($i+1), $value);
                }
            }
        }

        if (is_array($data5) && isset($data5['it_excelex'])) {
            $clone2 = count($data5['it_excelex']);
            if ($clone2 > 0) {
                $kertas_kerja->cloneBlock('itexcelextra', $clone2, true, true);
                for ($i = 0; $i < $clone2; $i++) {
                    $value = $data5['it_excelex'][$i] ?? null; // Use null if the key does not exist
                    $kertas_kerja->setValue('it_excelex#' . ($i+1), $value);
                }
            }
        }

        // Zip the file instead of download docx
        // Move the file to the desired directory, replacing the existing one if it exists
        // Storage::putFileAs($documentPath, new \Illuminate\Http\File($temporaryFilePath), $fileName);

        // // Create a zip archive and add the generated document
        // $zip = new ZipArchive;
        // $zipFilePath = storage_path('app/public/' . $project->name . '-KK3.zip');
        // if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
        //     $zip->addFile($temporaryFilePath, $fileName);
        //     $zip->close();

        //     // Delete the temporary file
        //     unlink($temporaryFilePath);

        //     // Return the zip archive for downloading
        //     return response()->download($zipFilePath)->deleteFileAfterSend(true);
        // } else {
        //     // Handle the case where zip creation fails
        //     return response()->json(['error' => 'Failed to create zip archive'], 500);
        // }
        // Temporary file path to store the generated document
        $temporaryFilePath = storage_path($fileName);
        $kertas_kerja->saveAs($temporaryFilePath);

        // Ensure the document path exists
        if (!Storage::exists($documentPath)) {
            Storage::makeDirectory($documentPath);
        }

        // Move the file to the desired directory, replacing the existing one if it exists
        Storage::putFileAs($documentPath, new \Illuminate\Http\File($temporaryFilePath), $fileName);

        // Delete the temporary file
        unlink($temporaryFilePath);

        return Storage::download($storedPath);
    }


    /**
     * Download resource from storage.
     */
    // public function compile(Request $request, Project $project)
    // {

    //     // Zip 1 File

    //     // $documentPath = 'projects/test1/version1';
    //     // $fileName = 'KK3-test.docx';

    //     // if (Storage::exists($documentPath . '/' . $fileName)) {
    //     //     // Create a new ZipArchive instance
    //     //     $zip = new ZipArchive;
    //     //     // Create a temporary file to store the zip archive
    //     //     $zipFilePath = tempnam(sys_get_temp_dir(), 'KK3-test') . '.zip';
    //     //     if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
    //     //         // Get the content of the file
    //     //         $fileContent = Storage::get($documentPath . '/' . $fileName);
    //     //         // Add the file content to the zip archive
    //     //         $zip->addFromString($fileName, $fileContent);
    //     //         // Close the zip archive
    //     //         $zip->close();

    //     //         // Send the zip archive as a response with the appropriate headers
    //     //         return response()->download($zipFilePath)->deleteFileAfterSend(true);
    //     //     } else {
    //     //         // If unable to create the zip archive, return an error message
    //     //         return response()->json(['error' => 'Failed to create zip archive'], 500);
    //     //     }
    //     // } else {
    //     //     // If the file does not exist, return an error message or redirect to a page accordingly
    //     //     return response()->json(['error' => 'File not found'], 404);
    //     // }

    //     // Zip All File and Folder 

    //     $documentPath = 'projects/' . $project->created_by . '/p_' . $project->name;
    //     $zipFileName = 'version1.zip';

    //     if (Storage::exists($documentPath)) {
    //         // Create a new ZipArchive instance
    //         $zip = new ZipArchive;
    //         // Create a temporary file to store the zip archive
    //         $zipFilePath = tempnam(sys_get_temp_dir(), 'version1') . '.zip';

    //         if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
    //             // Add all files and folders within the 'version1' directory to the zip archive
    //             $this->addFilesToZip($zip, $documentPath, $documentPath);
    //             // Close the zip archive
    //             $zip->close();

    //             // Send the zip archive as a response with the appropriate headers
    //             return response()->download($zipFilePath, $zipFileName)->deleteFileAfterSend(true);
    //         } else {
    //             // If unable to create the zip archive, return an error message
    //             return response()->json(['error' => 'Failed to create zip archive'], 500);
    //         }
    //     } else {
    //         // If the directory does not exist, return an error message or redirect to a page accordingly
    //         return response()->json(['error' => 'Directory not found'], 404);
    //     }
    // }

    // public function downloadTemplateFile(Request $request)
    // {
    //     // Individual File Download 
    //     $documentPath = '';
    //     $fileName = '';
    //     if (Storage::exists($documentPath . '/' . $fileName)) {
    //         // Get the file content
    //         return Storage::download($documentPath . '/' . $fileName);
    //     } else {
    //         // If the file does not exist, return an error message or redirect to a page accordingly
    //         return response()->json(['error' => 'File not found'], 404);
    //     }
    // }

    // private function addFilesToZip($zip, $folderPath, $baseFolder)
    // {
    //     $files = Storage::files($folderPath);
    //     foreach ($files as $file) {
    //         $relativePath = substr($file, strlen($baseFolder) + 1);
    //         $zip->addFile(Storage::path($file), $relativePath);
    //     }

    //     $subFolders = Storage::directories($folderPath);
    //     foreach ($subFolders as $subFolder) {
    //         $this->addFilesToZip($zip, $subFolder, $baseFolder);
    //     }
    // }

    /**
     * save content-Main to be printed in document in the database
     */
    public function saveDraftCover(Request $request, Project $project,TemplateDocument $template_doc)
    {
        $fields = $this->getData1Keys();
        // Validate the fields
        $data1 = $request->validate(array_fill_keys($fields, 'nullable|string'));

        try {
            $template_contents = TemplateDocument::updateOrCreate(
                ['id' => $template_doc->id, 'project_id' => $project->id],
                ['data1' => $data1]
            );

            return view('project.template.KK3cover', [
                'project' => $project,
                'template_contents' => $template_contents,
                'statusDraft' => 'Saved successfully'
            ]);
        } catch (\Exception $e) {
            return view('project.template.KK3cover', [
                'project' => $project,
                'template_contents' => $template_contents,
                'statusDraft' => 'Unsuccessful'
            ]);
        }
    }

    /**
     * save content-Main to be printed in document in the database
     */
    public function saveDraftMain(Request $request, Project $project,TemplateDocument $template_doc)
    {
        $fields = $this->getData2Keys();
        $data2 = $request->validate(array_fill_keys($fields, 'nullable|string'));
        $validatedData3 = $request->validate([
            'it18_ex.*' => 'nullable|string',
        ]);

        // Prepare data3 structure
        $data3 = $this->getDefaultData3();
        $data3['it18_ex'] = $validatedData3['it18_ex'] ?? [];

        try {
            $template_contents = TemplateDocument::updateOrCreate(
                ['id' => $template_doc->id, 'project_id' => $project->id],
                ['data2' => $data2, 'data3' => $data3]
            );

            return view('project.template.KK3', [
                'project' => $project,
                'template_contents' => $template_contents,
                'statusDraft' => 'Saved successfully'
            ]);
        } catch (\Exception $e) {
            return view('project.template.KK3', [
                'project' => $project,
                'template_contents' => null,
                'statusDraft' => 'Unsuccessful'
            ]);
        }
    }

    public function saveDraftExcel(Request $request, Project $project, TemplateDocument $template_doc)
    {
        $fields = $this->getData4Keys();
        $data4 = $request->validate(array_fill_keys($fields, 'nullable|string'));
        $validatedData5 = $request->validate([
            'it_excelex.*' => 'nullable|string',
        ]);

        $data5 = $this->getDefaultData5();
        $data5['it_excelex'] = $validatedData5['it_excelex'] ?? [];

        try {
            $template_contents = TemplateDocument::updateOrCreate(
                ['id' => $template_doc->id, 'project_id' => $project->id],
                ['data4' => $data4, 'data5' => $data5]
            );

            return view('project.template.KK3excel', [
                'project' => $project,
                'template_contents' => $template_contents,
                'statusDraft' => 'Saved successfully'
            ]);
        } catch (\Exception $e) {
            return view('project.template.KK3excel', [
                'project' => $project,
                'template_contents' => null,
                'statusDraft' => 'Unsuccessful'
            ]);
        }
    }

    /**
     * Update verification of document
     */
    public function verificationUpdate(Request $request, $projectId, $id)
    {
        $template_doc = TemplateDocument::findOrFail($id);
        $project = Project::findOrFail($projectId);
        // dd($project);
        // Update the status based on the form input
        $template_doc->update(['verification' => $request->input('review' . $id)]);
        return redirect()->route('project.tasks.index', ['project' => $project]);
    }

    /**
     * Update status of document
     */
    public function statusUpdate(Request $request, $projectId, $id)
    {
        $template_doc = TemplateDocument::findOrFail($id);
        $project = Project::findOrFail($projectId);
        // Update the status based on the form input
        $template_doc->update(['status' => $request->input('status' . $id)]);
        return redirect()->route('project.tasks.index', ['project' => $project]);
    }

    /**
     * Duplicate the specified resource in storage.
     */
    public function duplicate(Request $request, $projectId, TemplateDocument $template_doc)
    {
        // Duplicate the template document
        $newTemplateDoc = $template_doc->replicate();
        $project = Project::findOrFail($projectId);
        $newTemplateDoc->status = null;

        // Save the duplicated document
        $newTemplateDoc->save();
        return redirect()->route('project.tasks.index', ['project' => $project]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }

    protected function getDefaultData1()
    {
        $defaultData1 = [];
        // Loop through the keys and set them to null
        foreach ($this->getData1Keys() as $key) {
            $defaultData1[$key] = null;
        }
        return $defaultData1;
    }

    protected function getData1Keys()
    {
        return [
            "cover", "nama_program",
            "nama1", "nama2", "nama3",
            "jawatan1", "jawatan2", "jawatan3",
            "c_pp_name", "c_pp_jawatan", "c_pp_off", "c_pp_ph", "c_pp_mail",
            "c_dk_name", "c_dk_jawatan", "c_dk_off", "c_dk_ph", "c_dk_mail",
        ];
    }

    protected function getDefaultData2()
    {
        $defaultData2 = [];
        // Loop through the keys and set them to null
        foreach ($this->getData2Keys() as $key) {
            $defaultData2[$key] = null;
        }
        return $defaultData2;
    }

    protected function getData2Keys()
    {
        return [
            "it1", "tujuan", "visi", "misi", "matlamat", "it4", "it5_1", "it5_2", "it6_1", "it6_2",
            "it6_3", "it7_bmk", "it7_bmp", "it7_enk", "it7_enp", "it7_bma", "it7_ena", "it8_cb1", "it8_cb2",
            "it8_cb3", "it8_cb4", "it9", "it10", "it11", "it12", "it13", "it14", "it15", "it16_1", "it16_2",
            "it16_3", "it16_4", "it16_5", "it17_1cb1", "it17_1cb2", "it17_2", "it18_1", "it18_2", "it18_3",
            "it18_4", "it18_5", "it18_6", "it18_7", "it18_8", "it18_9", "it18_10", "it18_11", "it18_12", "it18_13", "it19", "it20", "it21_1", "it21_2", "it21_3", "it22_1_en", "it22_1_bm", "it22_1x", "it22_2a",
            "it22_2ax", "it22_2b", "it22_2bx", "it22_3a", "it22_3ax", "it22_3b", "it22_3bx", "it22_4peo1", "it22_4peo2",
            "it22_4peo3", "it22_4peox", "it22_4plo1", "it22_4plo2", "it22_4plo3", "it22_4plox", "it22_5a", "it22_5ax",
            "it22_5b", "it22_5bx", "it22_5c", "it22_5cx", "it22_5d", "it22_5dx", "it22_5e", "it22_5ex", "it22_6clo1",
            "it22_6clo2", "it22_6clo3", "it22_6x", "it22_71a", "it22_71b", "it22_72a", "it22_72b", "it22_72c", "it22_72p",
            "it22_73a", "it22_73b", "it22_73c", "it22_73p", "it22_8", "it23_1a", "it23_1b", "it23_1c", "it23_1d", "it23_1e",
            "it23_2a", "it23_2b", "it23_2c", "it23_2d", "it23_2e", "it23_3a", "it23_3b", "it23_3c", "it23_3d", "it23_3e",
            "it23_4a", "it23_4b", "it23_4c", "it23_4d", "it23_4e", "it24_1", "it24_2", "it24_3", "it24_4", "it24_5",
            "it25_1", "it25_2", "it26_1", "it26_2", "it27_1", "it27_2", "it27_3", "it27_4", "it28", "it29_1", "it29_2",
            "it29_3", "it30_1", "it30_2", "it30_3", "it30_4", "it30_5", "it30_6", "it30_7", "it30_8", "it31", "it_excel1",
            "it_excel2", "it_excel3cb1", "it_excel3cb2", "it_excel3cb3", "it_excelx", "it_excelj",
        ];
    }

    protected function getDefaultData3()
    {
        $defaultData3 = [];
        // Loop through the keys and set them to null
        foreach ($this->getData3Keys() as $key) {
            $defaultData3[$key] = null;
        }
        return $defaultData3;
    }

    protected function getData3Keys()
    {
        return [
            "it18_ex"
        ];
    }

    protected function getDefaultData4()
    {
        $defaultData4 = [];
        // Loop through the keys and set them to null
        foreach ($this->getData4Keys() as $key) {
            $defaultData4[$key] = null;
        }
        return $defaultData4;
    }

    protected function getData4Keys()
    {
        return [
            "it_excelx", "it_excel1", "it_excel2", "it_excel3cb1", "it_excel3cb2", "it_excel3cb3", "it_excelj",
        ];
    }

    protected function getDefaultData5()
    {
        $defaultData5 = [];
        // Loop through the keys and set them to null
        foreach ($this->getData5Keys() as $key) {
            $defaultData5[$key] = null;
        }
        return $defaultData5;
    }

    protected function getData5Keys()
    {
        return [
            "it_excelex"
        ];
    }
}
