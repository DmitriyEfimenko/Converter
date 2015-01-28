<?php

namespace helper;

class DTOToXml implements Coder
{
    private $writer;
    private $version = '1.0';
    private $encoding = 'UTF-8';

    public function fileCode($dto)
    {
        var_dump($dto);
        $this->writer = new \XMLWriter();
        $this->writer->openMemory();
        $this->writer->startDocument($this->version,$this->encoding);
        if(is_array($dto)){
            $this->arrayToXml($dto);
            return $this->writer->outputMemory();
        }else{
            return false;
        }
    }

    private function arrayToXml ($array)
    {
        foreach ($array as $key => $value)
        {
            if(is_array($value))
            {
                if(!is_numeric($key))
                {
                    $this->writer->startElement($key);
                    $this->arrayToXml($value);
                    $this->writer->endElement();
                }else{
                    $key = 'key'.$key;
                    $this->writer->startElement($key);
                    $this->arrayToXml($value);
                    $this->writer->endElement();
                }
            }else{
                $this->writer->writeElement($key,$value);
            }
        }
    }
}