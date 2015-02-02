<?php

namespace helper;

class DTOToXml implements Coder
{
    public function fileCode($dto)
    {
        if($dto && is_array($dto))
        {

            $dom = new \DOMDocument("1.0", "utf-8");
            $dom->formatOutput = true;
            foreach($dto as $key => $value)
            {
                $mainWrapper = $key;
                $dto = $value;
            }
            $xml = $dom->saveXML($this->arrayToXml($dto,$dom,$mainWrapper));
            if($xml)
            {
                return $xml;
            }
        }
       return false;
    }

    private function arrayToXml ($array, \DOMDocument $dom, $tagName)
    {

        $element = $dom->createElement($tagName);

        foreach($array as $key => $value)
        {
            if(is_array($value))
            {
                if(!is_numeric($key))
                {
                    foreach ($value as $elementKey => $elementValue)
                    {

                        if(!is_numeric($elementKey))
                        {
                            $element->appendChild($this->arrayToXml($value, $dom, $key));
                            break;
                        }else{
                            $element->appendChild($this->arrayToXml($elementValue, $dom, $key));
                        }

                    }
                }else{
                    $key = 'key';
                    $element->appendChild($this->arrayToXml($value, $dom, $key));
                }
            }else{
                $isAttribute = substr($key,0,1);
                if($isAttribute == "_")
                {
                    $element->setAttribute(substr($key,1,strlen($key)),$value);
                }else{
                    $element->appendChild($dom->createElement($key,$value));
                }
            }
        }
        return $element;
    }
}