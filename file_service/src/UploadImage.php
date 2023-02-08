<?php
namespace src;

use src\Services\StoreService;
use UploadInterface;
use Utils\Constants\ImageTypes;
use Utils\Exceptions\ImageTypeException;

class UploadImage implements UploadInterface{

    protected StoreService $service;
    public function __construct(StoreService $service)
    {
        $this->service = $service;
    }

    /**
     * @todo  must check images type (parameter)
     * @param mixed $file
     * @param string $path
     * @return void
     */
    public function upload(mixed $file, string $path)
    {
        //in PHP the files are used like this
        // $file = $_FILES['video_file']['name'];
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if( in_array($ext, ImageTypes::getTypes())){

            try{
                $this->store($this->service, $path, $file);
            }catch(ImageTypeException $err){
                throw $err;
            }
        }
        /** we can personalize the response*/
    }

    public function store(StoreService $service, $path, $file)
    {
        $service->store($path, $file);
    }
}