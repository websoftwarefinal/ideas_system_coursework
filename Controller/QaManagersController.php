<?php
require_once __DIR__ . './../Models/Model.php';
require_once __DIR__ . './../Helpers/SessionManager.php';

class QaManagersController{
    private static function createZip($files = array(), $destination = '') {
        // Create a new ZipArchive object
        $zip = new ZipArchive();
    
        // Open the ZIP file with the specified destination
        if ($zip->open($destination, ZipArchive::CREATE) !== true) {
            return false;
        }
    
        // Add files to the ZIP archive
        foreach ($files as $file) {
            // Make sure the file exists
            if (file_exists($file)) {
                // Add the file to the archive with a new name (basename)
                $zip->addFile($file, basename($file));
            } else {
                return false;
            }
        }
    
        // Close the ZIP file
        $zip->close();
    
        return file_exists($destination);
    }

    public static function zipFiles(){
        $session = new SessionManager;

        $zip_destination = 'ideas.zip';

        $idea_documents = new Model;

        $files_to_zip = [];

        foreach($idea_documents->ideaFilesArray() as $document){
            array_push($files_to_zip, './..' . $document['supporting_document']);
        }

        try{
            $create_zip = self::createZip($files_to_zip, $zip_destination);
            
            if($create_zip){
                // Download the ZIP file
                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename="' . basename($zip_destination) . '"');
                header('Content-Length: ' . filesize($zip_destination));

                readfile($zip_destination);
                
                // Delete the ZIP file after download
                unlink($zip_destination);
            }else{
                $session->set('down_file_error', 'Failed to download files!');
            }
        }catch (PDOException $e) {
            $session->set('down_file_error', 'Failed to create zip: ' . $e->getMessage());
            echo "Failed to create zip: " . $e->getMessage();
        }
    }

    public static function createCSVFile(){
        $session = new SessionManager;

        try{
            $model = new Model;
            $ideas = $model->select('Idea', ['idea_id', 'title', 'description', 'date', 'anonymous']);

            $output = fopen('php://temp', 'w');

            fputcsv($output, array_keys($ideas[0]));

            foreach($ideas as $idea){
                fputcsv($output, $idea);
            }

            rewind($output);
            $csv = stream_get_contents($output);
            fclose($output);

            // Set headers for CSV file download
            $filename = time() . '_ideas.csv';

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename=' . $filename);
            header('Pragma: no-cache');
            header('Expires: 0');

            if(!$csv){
                $session->set('down_file_error', 'CSV download failed!');
            }

            // Output CSV data to browser
            echo $csv;
        }catch (PDOException $e) {
            $session->set('down_file_error', 'Failed to create csv: ' . $e->getMessage());
            echo "Failed to create zip: " . $e->getMessage();
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['_method'] == 'download_files'){
        $documents = new QaManagersController;
        $documents->zipFiles();
    }

    if($_POST['_method'] == 'download_csv'){
        $documents = new QaManagersController;
        $documents->createCSVFile();
    }
}