<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageResizer
 *
 * @author emmett.newman
 */
class ImageResizer {

    private $imageName;
    private $dimension;
    private $destFolder;
    private $prefix;

    /* Constructor overloading is not available in PHP, so you cannot create multiple
      constructors with different arguments [in case if some experienced OO programmers
      are wondering] */

    function imageResizer($imageName, $dimension, $destFolder, $prefix) {
        $this->imageName = $imageName;
        $this->dimension = $dimension;
        $this->destFolder = $destFolder;
        $this->prefix = $prefix;
    }

    function resize() {
        if (!file_exists($this->imageName)) {
            echo "Error : Source File not found ";
            return false;
        }
        /* what type of image we are dealing with? getimagesize() function not only
          returns an array of the image dimensions but also the image mime type */
        $image_info = getimagesize($this->imageName);
//while we are here calculate the aspect ratio
        $orig_w = $image_info[0]; // original width
        $orig_h = $image_info[1]; // original height
// run the formula to retain aspect ratio [ if you are not sure do the math]
        if ($orig_h > $orig_w) {// if height is grater than width
            $new_w = ($this->dimension / $orig_h) * $orig_w;
            $new_h = $this->dimension;
        } else {
// if width is > than height
            $new_h = ($this->dimension / $orig_w) * $orig_h;

            $new_w = $this->dimension;
        }
// ALSO create destination file name and path
        /* We have source path/name, so we need to extract file name from it. For
          e.g. if we have images/someimage.jpg, we are not interested in "images" we just
          need "someimage.jpg" */
        /* OK remember basename() function? It will return the file name from a given
          path */
        $fileName = basename($this->imageName);
// create destination name, if the destination folder and prefix is given use it
        $dFolder = ($this->destFolder) ? $this->destFolder . "/" : "";
        $dFile = ($this->prefix) ? $this->prefix . "_" . $fileName : $fileName;
        $fullPath = $dFolder . "" . $dFile;
//If folder name is given, create a destination folder if not exists
        if ($this->destFolder) {
            if (!is_dir($this->destFolder)) {
// creating a folder
                $old_umask = umask(0); // clear umask
//path/name , permissions
                if (!mkdir($this->destFolder, 0777)) {
                    echo "Error : unable to create folder ".$this->destFolder . " <br />";
                    return false;
                }
//Now set the umask to the way it was
                umask($old_umask);
            }
        }
// mime type is stored in key 'mime', compare the mime type
//If mime type is image/jpeg
        if (strcmp($image_info['mime'], "image/jpeg") == 0) {
// call resize_jpeg( ) function
            return $this->resize_jpeg($new_w, $new_h, $orig_w, $orig_h, $fullPath);
        }
//If mime type is image/gif
        else if (strcmp($image_info['mime'], "image/gif") == 0) {
// call resize_gif( ) function
            return resize_gif($new_w, $new_h, $orig_w, $orig_h, $fullPath);
        }
//If mime type is image/png
        else if (strcmp($image_info['mime'], "image/png") == 0) {
// call resize_png( ) function
            return resize_png($new_w, $new_h, $orig_w, $orig_h, $fullPath);
        }
//If mime type is not allowed
        else {
            echo "ERROR : WRONG FILE TYPE <br />";
            return false;
        }
    }

// end of resize()
######### RESIZE_JPEG( ) ###########

    function resize_jpeg($new_w, $new_h, $orig_w, $orig_h, $full_path) {
// create canvas to generate image
        $im = ImageCreateTrueColor($new_w, $new_h);
        $baseimage = ImageCreateFromJpeg($this->imageName);
        imagecopyResampled($im, $baseimage, 0, 0, 0, 0, $new_w, $new_h, $orig_w, $orig_h);
// you may also use imagecopyresized, but you will loose quality.
        imagejpeg($im, $full_path);
        imagedestroy($im);
        if (file_exists($full_path)) {
            echo "Image $full_path RESIZED SUCCESSFULLY <br />";
            return true;
        } else {
            echo "ERROR : Unable to RESIZE Image $full_path<br />";
            return false;
        }
    }

// end of resize_jpeg() function
    /* Now you create resize_gif() and resize_png() ‘just replace ImageCreateFromJpeg()
      and ImageJpeg() functions from above’ [visit php.net for help] */
######### RESIZE_GIF( ) ###########
// create resize_gif() function
######### RESIZE_PNG( ) ###########
//Create resize_png() function
}

// end of resize_image class
?>