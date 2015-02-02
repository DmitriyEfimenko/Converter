<?php

namespace helper;

class CsvToDTO implements Decoder
{
    public function dtoDecod($file)
    {
        $array = $fields = array(); $i = 0;
        $dataFile = fopen($file, "r");
        if ($dataFile || $row = fgetcsv($dataFile, 0,',') === false)
        {
            while (($row = fgetcsv($dataFile, 4096,',')) !== false) {
                if (empty($fields)) {
                    $fields = $row;
                    continue;
                }
                foreach ($row as $k=>$value) {
                    $array[$i][$fields[$k]] = $value;
                }
                $i++;

            }
            if (!feof($dataFile)) {
                echo "Error: unexpected fgets() fail\n";
                return false;
            }
            fclose($dataFile);
            if($array != null)
            {
                $dto = array("root" => $array);
                return $dto;
            }
        }
        return false;
    }
}