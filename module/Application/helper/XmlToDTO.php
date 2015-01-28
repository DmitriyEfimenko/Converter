<?php

namespace helper;

class XmlToDTO implements Decoder
{
    public function dtoDecod($file)
    {
        $xml = simplexml_load_file($file);
        $dto = json_decode(json_encode($xml),true);
        var_dump($dto);
        return $dto;
    }
}