<?php

namespace helper;

class FormatMap
{

    protected $coderMap = array();
    protected $decoderMap = array();

    function __construct()
    {
        $this->coderMap = array(
            "csv"  => new DTOToCsv(),
            "json" => new DTOToJson(),
            "xml"  => new DTOToXml()

        );
        $this->decoderMap = array(
            "csv"  => new CsvToDTO(),
            "json" => new JsonToDTO(),
            "xml"  => new XmlToDTO()
        );
    }

    public function getDecoder($format)
    {
        $decod = $this->decoderMap[$format];
        return $decod;
    }

    public function getCoder($format)
    {
        $cod = $this->coderMap[$format];
        return $cod;
    }
}