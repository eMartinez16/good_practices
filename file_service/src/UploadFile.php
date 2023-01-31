<?php
namespace src;

use UploadInterface;
use Utils\FileTypes;

class UploadFile implements UploadInterface{


    public function upload($file){

        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if(in_array($ext, FileTypes::getTypes())){
            
        }
    }
}