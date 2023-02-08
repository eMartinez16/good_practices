<?php
namespace src;

use Exceptions\FileTypeException;
use src\Services\StoreService;
use UploadInterface;
use Utils\Constants\FileTypes;

class UploadFile implements UploadInterface{

    protected StoreService $service;
    /**
     * dependency injection
     * @param StoreService $service
     */
    public function __construct(StoreService $service)
    {
        $this->service = $service;
    }

    /**
     * @todo  must see file type (parameter)
     * @param mixed $file
     * @param string $path
     * @return void
     */
    public function upload(mixed $file, string $path)
    {

        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if( in_array($ext, FileTypes::getTypes())){

            try{
                $this->store($this->service, $path, $file);
            }catch(FileTypeException $err){
                throw $err;
            }
        }
    }

    public function store(StoreService $service, $path, $file)
    {
        $service->store($path, $file);
    }
}