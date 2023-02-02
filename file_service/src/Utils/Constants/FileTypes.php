<?php

namespace Utils\Constants;


class FileTypes{
    protected const TYPES = ['pdf', 'csv', 'xls'];

    public static function getTypes(): array
    {
        return self::TYPES;
    }
}