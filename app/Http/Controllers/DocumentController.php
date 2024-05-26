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
    public function index(Project $project)
    {
        $template_contents = TemplateDocument::where('project_id', $project->id)->first();
        Session::put('template_contents', $template_contents);
        $template_contents = Session::get('template_contents');
        // dd($template_contents);
        return view('project.template.KK3',['project' => $project, 'template_contents'=>$template_contents]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function printContentToTemplate(Request $request)
    {
        $kertas_kerja = new \PhpOffice\PhpWord\TemplateProcessor('KK3-template.docx');

        $templateContent = TemplateDocument::where('id',2)->firstOrFail();
        $data2 = $templateContent->data2;

        foreach ($data2 as $key => $value) {
            $kertas_kerja->setValue($key, $value);
        }

        // $kertas_kerja->setValues([
        //     'it22_71a' => 'input',
        //     'it21_2' => 'input',
        //     //continue
        // ]);

        // Cloning Extra
        // $testData = [
        //     'First bullet point contentFirst bullet point contentFirst bullet point contentFirst bullet point contentFirst bullet point content',
        //     'Second bullet point content',
        //     'Third bullet point contentFirst bullet point contentFirst bullet point contentFirst bullet point contentFirst bullet point content',
        //     'Third bullet point content',
        //     'Third bullet point content',
        //     // If bullet doesn't work Ctrl+A (Copy All) -> Ctrl+V(Paste) in the original template document
        // ];

        // $clone = count($testData);

        // $kertas_kerja->cloneBlock('it18extra', $clone, true, true);

        // for ($i = 0; $i < $clone; $i++) {
        //     // $kertas_kerja->setValue('it18_ex#' . ($i+1), $testData[$i]['number']);
        //     $kertas_kerja->setValue('it18_ex#' . ($i+1), $testData[$i]);
        // }



        // $kertas_kerja->saveAs('test/KK3-test.docx');
        $documentPath = 'projects/test1/versionck'; // Example document path
        $fileName = 'testing-full-output.docx';
        $temporaryFilePath = storage_path('app/' . $fileName);
        $kertas_kerja->saveAs($temporaryFilePath);

        // Move the file to the desired directory
        $storedPath = Storage::putFileAs($documentPath, $temporaryFilePath, $fileName);

        // Delete the temporary file
        unlink($temporaryFilePath);

        return response()->json(['stored_path' => $storedPath]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function download(Request $request)
    {
        // Individual File Download 

        $documentPath = 'projects/test1/version1';
        $fileName = 'KK3-test.docx';
        if (Storage::exists($documentPath . '/' . $fileName)) {
            // Get the file content
            return Storage::download($documentPath . '/' . $fileName);
        } else {
            // If the file does not exist, return an error message or redirect to a page accordingly
            return response()->json(['error' => 'File not found'], 404);
        }

        // Zip 1 File

        // $documentPath = 'projects/test1/version1';
        // $fileName = 'KK3-test.docx';

        // if (Storage::exists($documentPath . '/' . $fileName)) {
        //     // Create a new ZipArchive instance
        //     $zip = new ZipArchive;
        //     // Create a temporary file to store the zip archive
        //     $zipFilePath = tempnam(sys_get_temp_dir(), 'KK3-test') . '.zip';
        //     if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
        //         // Get the content of the file
        //         $fileContent = Storage::get($documentPath . '/' . $fileName);
        //         // Add the file content to the zip archive
        //         $zip->addFromString($fileName, $fileContent);
        //         // Close the zip archive
        //         $zip->close();

        //         // Send the zip archive as a response with the appropriate headers
        //         return response()->download($zipFilePath)->deleteFileAfterSend(true);
        //     } else {
        //         // If unable to create the zip archive, return an error message
        //         return response()->json(['error' => 'Failed to create zip archive'], 500);
        //     }
        // } else {
        //     // If the file does not exist, return an error message or redirect to a page accordingly
        //     return response()->json(['error' => 'File not found'], 404);
        // }

        // Zip All File and Folder 

        $documentPath = 'projects/test1/version1';
        $zipFileName = 'version1.zip';

        if (Storage::exists($documentPath)) {
            // Create a new ZipArchive instance
            $zip = new ZipArchive;
            // Create a temporary file to store the zip archive
            $zipFilePath = tempnam(sys_get_temp_dir(), 'version1') . '.zip';

            if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
                // Add all files and folders within the 'version1' directory to the zip archive
                $this->addFilesToZip($zip, $documentPath, $documentPath);
                // Close the zip archive
                $zip->close();

                // Send the zip archive as a response with the appropriate headers
                return response()->download($zipFilePath, $zipFileName)->deleteFileAfterSend(true);
            } else {
                // If unable to create the zip archive, return an error message
                return response()->json(['error' => 'Failed to create zip archive'], 500);
            }
        } else {
            // If the directory does not exist, return an error message or redirect to a page accordingly
            return response()->json(['error' => 'Directory not found'], 404);
        }
    }

    private function addFilesToZip($zip, $folderPath, $baseFolder)
    {
        $files = Storage::files($folderPath);
        foreach ($files as $file) {
            $relativePath = substr($file, strlen($baseFolder) + 1);
            $zip->addFile(Storage::path($file), $relativePath);
        }

        $subFolders = Storage::directories($folderPath);
        foreach ($subFolders as $subFolder) {
            $this->addFilesToZip($zip, $subFolder, $baseFolder);
        }
    }

    /**
     * Display the specified resource. combine and change return depend on user role
     */
    public function saveDraft(Request $request, Project $project)
    {
        // $data = $request->validate([
        //     "it1" => "nullable|string",
        //     "tujuan" => "nullable|string",
        //     "visi" => "nullable|string",
        //     "misi" => "nullable|string",
        //     "matlamat" => "nullable|string",
        //     "it4" => "nullable|string",
        //     "it5_1" => "nullable|string",
        //     "it5_2" => "nullable|string",
        //     "it6_1" => "nullable|string",
        //     "it6_2" => "nullable|string",
        //     "it6_3" => "nullable|string",
        //     "it7_bmk" => "nullable|string",
        //     "it7_bmp" => "nullable|string",
        //     "it7_enk" => "nullable|string",
        //     "it7_enp" => "nullable|string",
        //     "it7_bma" => "nullable|string",
        //     "it7_ena" => "nullable|string",
        //     "it8_cb1" => "nullable|string",
        //     "it8_cb2" => "nullable|string",
        //     "it8_cb3" => "nullable|string",
        //     "it8_cb4" => "nullable|string",
        //     "it9" => "nullable|string",
        //     "it10" => "nullable|string",
        //     "it11" => "nullable|string",
        //     "it12" => "nullable|string",
        //     "it13" => "nullable|string",
        //     "it14" => "nullable|string",
        //     "it15" => "nullable|string",
        //     "it16_1" => "nullable|string",
        //     "it16_2" => "nullable|string",
        //     "it16_3" => "nullable|string",
        //     "it16_4" => "nullable|string",
        //     "it16_5" => "nullable|string",
        //     "it17_1cb1" => "nullable|string",
        //     "it17_1cb2" => "nullable|string",
        //     "it17_2" => "nullable|string",
        //     "it18_1" => "nullable|string",
        //     "it18_2" => "nullable|string",
        //     "it18_3" => "nullable|string",
        //     "it18_4" => "nullable|string",
        //     "it18_5" => "nullable|string",
        //     "it18_6" => "nullable|string",
        //     "it18_7" => "nullable|string",
        //     "it18_8" => "nullable|string",
        //     "it18_9" => "nullable|string",
        //     "it18_10" => "nullable|string",
        //     "it18_11" => "nullable|string",
        //     "it18_12" => "nullable|string",
        //     "it18_13" => "nullable|string",
        //     "it18_14" => "nullable|string",
        //     "it19" => "nullable|string",
        //     "it20" => "nullable|string",
        //     "it21_1" => "nullable|string",
        //     "it21_2" => "nullable|string",
        //     "it21_3" => "nullable|string",
        //     "it22_1_en" => "nullable|string",
        //     "it22_1_bm" => "nullable|string",
        //     "it22_1x" => "nullable|string",
        //     "it22_2a" => "nullable|string",
        //     "it22_2ax" => "nullable|string",
        //     "it22_2b" => "nullable|string",
        //     "it22_2bx" => "nullable|string",
        //     "it22_3a" => "nullable|string",
        //     "it22_3ax" => "nullable|string",
        //     "it22_3b" => "nullable|string",
        //     "it22_3bx" => "nullable|string",
        //     "it22_4peo1" => "nullable|string",
        //     "it22_4peo2" => "nullable|string",
        //     "it22_4peo3" => "nullable|string",
        //     "it22_4peox" => "nullable|string",
        //     "it22_4plo1" => "nullable|string",
        //     "it22_4plo2" => "nullable|string",
        //     "it22_4plo3" => "nullable|string",
        //     "it22_4plox" => "nullable|string",
        //     "it22_5a" => "nullable|string",
        //     "it22_5ax" => "nullable|string",
        //     "it22_5b" => "nullable|string",
        //     "it22_5bx" => "nullable|string",
        //     "it22_5c" => "nullable|string",
        //     "it22_5cx" => "nullable|string",
        //     "it22_5d" => "nullable|string",
        //     "it22_5dx" => "nullable|string",
        //     "it22_5e" => "nullable|string",
        //     "it22_5ex" => "nullable|string",
        //     "it22_6a" => "nullable|string",
        //     "it22_6b" => "nullable|string",
        //     "it22_6c" => "nullable|string",
        //     "it22_6x" => "nullable|string",
        //     "it22_71a" => "nullable|string",
        //     "it22_71b" => "nullable|string",
        //     "it22_72a" => "nullable|string",
        //     "it22_72b" => "nullable|string",
        //     "it22_72c" => "nullable|string",
        //     "it22_72p" => "nullable|string",
        //     "it22_73a" => "nullable|string",
        //     "it22_73b" => "nullable|string",
        //     "it22_73c" => "nullable|string",
        //     "it22_73p" => "nullable|string",
        //     "it23_1a" => "nullable|string",
        //     "it23_1b" => "nullable|string",
        //     "it23_1c" => "nullable|string",
        //     "it23_1d" => "nullable|string",
        //     "it23_1e" => "nullable|string",
        //     "it23_2a" => "nullable|string",
        //     "it23_2b" => "nullable|string",
        //     "it23_2c" => "nullable|string",
        //     "it23_2d" => "nullable|string",
        //     "it23_2e" => "nullable|string",
        //     "it23_3a" => "nullable|string",
        //     "it23_3b" => "nullable|string",
        //     "it23_3c" => "nullable|string",
        //     "it23_3d" => "nullable|string",
        //     "it23_3e" => "nullable|string",
        //     "it23_4a" => "nullable|string",
        //     "it23_4b" => "nullable|string",
        //     "it23_4c" => "nullable|string",
        //     "it23_4d" => "nullable|string",
        //     "it23_4e" => "nullable|string",
        //     "it24_1" => "nullable|string",
        //     "it24_2" => "nullable|string",
        //     "it24_3" => "nullable|string",
        //     "it24_4" => "nullable|string",
        //     "it24_5" => "nullable|string",
        //     "it25_1" => "nullable|string",
        //     "it25_2" => "nullable|string",
        //     "it26_1" => "nullable|string",
        //     "it26_2" => "nullable|string",
        //     "it27_1" => "nullable|string",
        //     "it27_2" => "nullable|string",
        //     "it27_3" => "nullable|string",
        //     "it27_4" => "nullable|string",
        //     "it28" => "nullable|string",
        //     "it29_1" => "nullable|string",
        //     "it29_2" => "nullable|string",
        //     "it29_3" => "nullable|string",
        //     "it30_1" => "nullable|string",
        //     "it30_2" => "nullable|string",
        //     "it30_3" => "nullable|string",
        //     "it30_4" => "nullable|string",
        //     "it30_5" => "nullable|string",
        //     "it30_6" => "nullable|string",
        //     "it30_7" => "nullable|string",
        //     "it30_8" => "nullable|string",
        //     "it31" => "nullable|string",
        //     "it_excel1" => "nullable|string",
        //     "it_excel2" => "nullable|string",
        //     "it_excel3cb1" => "nullable|string",
        //     "it_excel3cb2" => "nullable|string",
        //     "it_excel3cb3" => "nullable|string",
        //     "it_excelx" => "nullable|string",
        //     "it_excelj" => "nullable|string",
        // ]);
    
        $fields = [
            "it1", "tujuan", "visi", "misi", "matlamat", "it4", "it5_1", "it5_2", "it6_1", "it6_2",
            "it6_3", "it7_bmk", "it7_bmp", "it7_enk", "it7_enp", "it7_bma", "it7_ena", "it8_cb1", "it8_cb2",
            "it8_cb3", "it8_cb4", "it9", "it10", "it11", "it12", "it13", "it14", "it15", "it16_1", "it16_2",
            "it16_3", "it16_4", "it16_5", "it17_1cb1", "it17_1cb2", "it17_2", "it18_1", "it18_2", "it18_3",
            "it18_4", "it18_5", "it18_6", "it18_7", "it18_8", "it18_9", "it18_10", "it18_11", "it18_12", "it18_13",
            "it18_14", "it19", "it20", "it21_1", "it21_2", "it21_3", "it22_1_en", "it22_1_bm", "it22_1x", "it22_2a",
            "it22_2ax", "it22_2b", "it22_2bx", "it22_3a", "it22_3ax", "it22_3b", "it22_3bx", "it22_4peo1", "it22_4peo2",
            "it22_4peo3", "it22_4peox", "it22_4plo1", "it22_4plo2", "it22_4plo3", "it22_4plox", "it22_5a", "it22_5ax",
            "it22_5b", "it22_5bx", "it22_5c", "it22_5cx", "it22_5d", "it22_5dx", "it22_5e", "it22_5ex", "it22_6a",
            "it22_6b", "it22_6c", "it22_6x", "it22_71a", "it22_71b", "it22_72a", "it22_72b", "it22_72c", "it22_72p",
            "it22_73a", "it22_73b", "it22_73c", "it22_73p", "it23_1a", "it23_1b", "it23_1c", "it23_1d", "it23_1e",
            "it23_2a", "it23_2b", "it23_2c", "it23_2d", "it23_2e", "it23_3a", "it23_3b", "it23_3c", "it23_3d", "it23_3e",
            "it23_4a", "it23_4b", "it23_4c", "it23_4d", "it23_4e", "it24_1", "it24_2", "it24_3", "it24_4", "it24_5",
            "it25_1", "it25_2", "it26_1", "it26_2", "it27_1", "it27_2", "it27_3", "it27_4", "it28", "it29_1", "it29_2",
            "it29_3", "it30_1", "it30_2", "it30_3", "it30_4", "it30_5", "it30_6", "it30_7", "it30_8", "it31", "it_excel1",
            "it_excel2", "it_excel3cb1", "it_excel3cb2", "it_excel3cb3", "it_excelx", "it_excelj",
        ];
    
        // Validate the fields
        $data = $request->validate(array_fill_keys($fields, 'nullable|string'));
        
        $templateDocument = TemplateDocument::updateOrCreate(
            ['project_id' => $project->id],
            ['data2' => $data]
        );

        dd($data);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
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
}
