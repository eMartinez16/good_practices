<?php

namespace Utils\Constants;

class ImageTypes{
    /**
     * agregar los necesarios
     * @var array
     */
    protected const TYPES = ['jpg', 'png'];

    public static function getTypes(): array
    {
        return self::TYPES;
    }

    public static function getSpecificType(int $position) : string
    {
        return self::TYPES[$position];
    }
}