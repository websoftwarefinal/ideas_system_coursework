<?php
class FileStorageHelper{
    public static function saveFile($file){
        // Saving the supporting document
        $target_dir = __DIR__ . "/../storage/uploads/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Change permissions as needed
        }
        $target_file = $target_dir . time() . basename($_FILES[$file]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES[$file]["tmp_name"]);

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            return;
        }

        // Check file size
        if ($_FILES[$file]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            return;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {
                return explode("..", $target_file)[1];
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}