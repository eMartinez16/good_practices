<?php
namespace src\Services;

use UploadInterface;

class StoreService{


    /**
     * 
     * @param string $path
     * @param mixed $file
     * @return bool|\Throwable
     */
    public function store(string $path, mixed $file){
        try{
            /** file =  $_FILES['IMAGES', 'FILES']['NAME']*/
            if(!file_exists($file, $path)){
                move_uploaded_file($file, $path);
                return true;
            }

            return false;
        }
        catch(\Throwable $exception){
            throw $exception;
        }
    }
}