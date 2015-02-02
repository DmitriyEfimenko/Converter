<?php

namespace helper;

class XmlToDTO implements Decoder
{

    public function dtoDecod($file)
    {
        $dataFile = file_get_contents($file);
        if($dataFile)
        {
            $dom = new \DOMDocument("1.0", "utf-8");
            if($dom->loadXML($dataFile) !== false)
            {
                $dto = $this->xml_to_array($dom);
                return $dto;
            }
        }
        return false;
    }

    private function xml_to_array ($dom)
    {
        if ($dom->hasAttributes())
        {
            $attrs = $dom->attributes;
            foreach ($attrs as $attr)
            {
                $result["_" . $attr->name] = $attr->value;
            }
        }

        if ($dom->hasChildNodes())
        {
            $children = $dom->childNodes;
            if ($children->length == 1)
            {
                $child = $children->item(0);
                if ($child->nodeType == XML_TEXT_NODE)
                {
                    $result['_value'] = $child->nodeValue;
                    return count($result) == 1
                        ? $result['_value']
                        : $result;
                }
            }

            $groups = array();

            foreach ($children as $child)
            {
                if (!isset($result[$child->nodeName]))
                {
                    $result[$child->nodeName] = $this->xml_to_array($child);
                    if($child->nodeName == "#text")
                    {
                        unset($result[$child->nodeName]);
                    }
                } else{
                    if (!isset($groups[$child->nodeName]))
                    {
                        $result[$child->nodeName] = array($result[$child->nodeName]);
                        $groups[$child->nodeName] = 1;
                    }
                    $result[$child->nodeName][] = $this->xml_to_array($child);
                }
            }
        }

        return $result;
    }
}