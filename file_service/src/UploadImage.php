<?php
namespace src;

use Utils\ImageTypes;
use UploadInterface;


class UploadImage implements UploadInterface{


    public function upload($file){
        //algo asi puede llegar el file
        // $file = $_FILES['video_file']['name'];
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if(!in_array($ext, ImageTypes::getTypes())){
            
        }
    }
}