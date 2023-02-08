<?php

namespace Utils\Constants;


class FileTypes{
    protected const TYPES = ['pdf', 'csv', 'xls'];

    public static function getTypes(): array
    {
        return self::TYPES;
    }

    public static function getSpecificType(int $position) : string
    {
        return self::TYPES[$position];
    }
}