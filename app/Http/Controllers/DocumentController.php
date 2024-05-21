<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Document;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use ZipArchive;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('project.template.KK3');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function printContentToTemplate(Request $request)
    {
        $kertas_kerja = new \PhpOffice\PhpWord\TemplateProcessor('KK3-template.docx');
        
        // $kertas_kerja->setValues([
        //     'it22_71a' => strip_tags(trim($request->input('nama_program'))),
        //     'it21_2' => strip_tags(trim($request->input('tujuan'))),
        // //     'kod_bm' => 'kod SECJ5541',
        // //     'kod_en' => 'kod SECJ5541',
        // //     'nama_program_bm' => 'Kejuruturaan Perisian',
        // //     'nama_program_en' => 'Software Engineering',
        // //     'award_bm' => 'bachelor keujuruteraan perisian',
        // //     'award_en' => 'Bachelor of Software Engineering',

        // //     'it5_1' => 'entiti akedemik',
        // //     'it18_1' => '',//and so on

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
        $fileName = 'testloop.docx';
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
    public function storeDocumentContent(Document $document)
    {


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
