<?php

use src\Services\StoreService;

/**
 * Podemos agregar otras funcionalidades mas aca..
 */
interface UploadInterface{

    public function __construct(StoreService $service);
    public function upload(mixed $file, string $path);

    public function store(StoreService $service, string $path, $file);
}