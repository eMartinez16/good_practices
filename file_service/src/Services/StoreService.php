<?php
namespace src\Services;

use UploadInterface;
use Utils\Exceptions\ImageTypeException;

class StoreService{


    /**
     * 
     * @param string $path
     * @param mixed $file
     * @return bool|\Throwable
     */
    public function store(string $path, mixed $file){
        try{

            /** if dir exists, set to true
             *  if not, try to create it, if an error ocurrs, set to false, else true 
             * @var boolean $dirExists 
             */
            $dirExists = (is_dir($path))
                ? true
                : (@mkdir($path, 0777, true)
                    ? true
                    : false);

    
            /** file =  $_FILES['IMAGES', 'FILES']['NAME']*/
            if($dirExists){
                return move_uploaded_file($file, $path);
            }

            return false;
        }
        catch(\Exception $exception){
            throw $exception;
        }
    }
}