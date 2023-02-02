<?php
namespace src;

use src\Services\StoreService;
use UploadInterface;
use Utils\Constants\FileTypes;

class UploadFile implements UploadInterface{

    protected StoreService $service;
    public function __construct(StoreService $service)
    {
        $this->service = $service;
    }

    /**
     * @todo ver los tipos que recibiria en file
     * @param mixed $file
     * @param string $path
     * @return void
     */
    public function upload(mixed $file, string $path)
    {

        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if(in_array($ext, FileTypes::getTypes())){
            $this->store($this->service, $path, $file);
        }
    }

    public function store(StoreService $service, $path, $file)
    {
        $service->store($path, $file);
    }
}