<?php
namespace src;

use src\Services\StoreService;
use UploadInterface;
use Utils\Constants\ImageTypes;

class UploadImage implements UploadInterface{

    protected StoreService $service;
    public function __construct(StoreService $service)
    {
        $this->service = $service;
    }

    /**
     * @todo ver los tipos de file
     * @param mixed $file
     * @param string $path
     * @return void
     */
    public function upload(mixed $file, string $path)
    {
        //algo asi puede llegar el file
        // $file = $_FILES['video_file']['name'];
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if(!in_array($ext, ImageTypes::getTypes())){
            $this->store($this->service, $path, $file);
        }
    }

    public function store(StoreService $service, $path, $file)
    {
        $service->store($path, $file);
    }
}