<?php
namespace src;

use Exceptions\FileTypeException;
use UploadInterface;
use Utils\FileTypes ;

class UploadFile implements UploadInterface{


    public function upload($file){
        if(in_array(filetype($file), FileTypes::getTypes())){
            throw new FileTypeException();
        }
    }
}