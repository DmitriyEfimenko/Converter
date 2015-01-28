<?php

namespace helper;

class JsonToDTO implements Decoder
{
    public function dtoDecod($file)
    {
        $dataFile = file_get_contents($file);
        $dto = json_decode($dataFile,true);
        return $dto;
    }
}