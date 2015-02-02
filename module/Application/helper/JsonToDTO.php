<?php

namespace helper;

class JsonToDTO implements Decoder
{
    public function dtoDecod($file)
    {
        $dataFile = @file_get_contents($file);
        if($dataFile)
        {
            $dto = json_decode($dataFile,true);
            if(json_last_error() === JSON_ERROR_NONE)
            {
                return $dto;
            }
        }
        return false;
    }
}