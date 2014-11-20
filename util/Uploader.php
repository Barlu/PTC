<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Uploader
 *
 * @author emmett.newman
 */
class Uploader {

    private $fileArrayName;
    private $folderPath;
    private $fileTypes = [];

    const PNG = 'image/png';
    const GIF = 'image/gif';
    const JPEG = 'image/jpeg';
    const PDF = 'application/pdf';
    const DOC = 'application/doc';

    function uploader($fileArrayName, $folderPath) {
        $this->fileArrayName = $fileArrayName;
        $this->fileTypes = [self::PNG, self::GIF, self::JPEG, self::PDF, self::DOC];
        $this->folderPath = $folderPath;
    }

    function is_uploaded() {
        if ($_FILES[$this->fileArrayName]['name']) {
            if ($_FILES[$this->fileArrayName]['error']) {
                switch ($_FILES[$this->fileArrayName]['error']) {
                    case 1: echo "Error : File exceeds maximum upload file size<br />";
                        return false;
                        break;
                    case 2: echo "Error : File exceeds maximum upload size<br />";
                        return false;
                        break;
                    case 3: echo "Error : Partially uploaded<br />";
                        return false;
                        break;
                    case 4: echo "Error : No file uploaded<br />";
                        return false;
                }
            } // END OF FILE ERROR
//Get the file type
            $type = trim(strtolower($_FILES[$this->fileArrayName]['type']));
            $correctType = false;

            foreach ($this->fileTypes as $ftype) {
                // compare the file type with each allowed file type
                if (strcmp($type, $ftype) === 0) {
                    $correctType = true;
                    break;
                }
            }
            if (!$correctType) {
                echo "Error : \'$type\' IS NOT AN ACCEPTED FILE TYPE<br />";
                return false;
            }

            // store file name
            $fileName = $_FILES[$this->fileArrayName]['name'];

            if (is_uploaded_file($_FILES[$this->fileArrayName]['tmp_name'])) {
// CHECK IF THE Folder EXISTS, if not create one//
                if ($this->folderPath) {
                    if (!is_dir($this->folderPath)) {
// creating a folder
                        $old_umask = umask(0); // clear umask
//path/name , permissions
                        if (!mkdir($this->folderPath, 0777)) {
                            echo "Error : unable to create folder" . $this->folderPath . " <br />";
                            return false;
                        }
//Now set the umask to the way it was
                        umask($old_umask);
                    }
                    $filePath = $this->folderPath . "/" . $fileName;
                } else {
                    $filePath = $fileName;
                }

                if (file_exists($filePath)) {
                    $new_name = uniqid("CP") . $fileName;
                    echo "File $fileName already exists, File renamed to $new_name <br />";
// reset the filepath
                    $filePath = ($this->folderPath) ? $this->folderPath . "/" . $new_name : $new_name;
                }
// moving the temporary file to our desired location
                if (move_uploaded_file($_FILES[$this->fileArrayName]
                                ['tmp_name'], $filePath)) {
// Check if it is available
                    if (file_exists($filePath)) {
                        echo "File $filePath uploaded successfully<br />";
                        return $filePath;
                    } else {
                        echo "ERROR : Unable to Move file $filePath, Rename the file and try again<br />";
                        return false;
                    }
                }
            }// end of check if temporary file available
            else {
                echo "ERROR : Temporary File not available <br />";
                return false;
            }
        }// end of if file name available
        else {
            echo "ERROR : File name not available<br />";
            return false;
        }
    }

// end of function is_uploaded
}
