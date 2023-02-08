<?php

use src\Services\StoreService;

/**
 * we can add more functions here
 */
interface UploadInterface{

    public function __construct(StoreService $service);
    public function upload(mixed $file, string $path);

    public function store(StoreService $service, string $path, $file);
}