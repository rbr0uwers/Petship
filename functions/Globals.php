<?php
    define('DEFAULT_IMAGE', 'generic.jpg');

    function exitGracefully() {
        header("location: error.php");
        exit; 
    }

    function console_log($data){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    function file_upload($picture) {
        $result = new stdClass();
        $result->fileName = DEFAULT_IMAGE;
        $result->error = true;

        if (is_null($picture)) {
            $result->ErrorMessage = "There was an error uploading the file.";
            return $result;
        }

        $fileError = $picture["error"];

        if ($fileError == 4) {       
            $result->ErrorMessage = "No file was provided.";
            return $result;
        }

        // catch remaining possible upload errors. see: https://www.php.net/manual/en/features.file-upload.errors.php
        if ($fileError != 0) {
            $result->ErrorMessage = "There was an error uploading the file. Error code: $fileError";
            return $result;
        }
    
        $fileName = $picture["name"];
        $fileExtension = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); 
        $filesAllowed = ["png", "jpg", "jpeg"];

        if (!in_array($fileExtension, $filesAllowed)) {
            $result->ErrorMessage = "This file type cant be uploaded.";
            return $result;
        }

        $fileTmpName = $picture["tmp_name"];
        $fileNewName = uniqid('') . "." . $fileExtension;
        $destination = "uploads/$fileNewName";

        if (move_uploaded_file($fileTmpName, $destination)) {
            $result->error = false;
            $result->fileName = $fileNewName;
            return $result;
        } else {    
            $result->ErrorMessage = "There was an error uploading the file.";
            return $result;
        }    
    }
?>