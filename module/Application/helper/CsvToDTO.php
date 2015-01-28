<?php

namespace helper;

class CsvToDTO implements Decoder
{
    public function dtoDecod($file)
    {
        $dto = $fields = array(); $i = 0;
        $fp = fopen($file, "r");
        if ($fp) {
            while (($row = fgetcsv($fp, 4096)) !== false) {
                if (empty($fields)) {
                    $fields = $row;
                    continue;
                }
                foreach ($row as $k=>$value) {
                    $dto[$i][$fields[$k]] = $value;
                }
                $i++;

            }
            if (!feof($fp)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($fp);
        }
        return $dto;
    }
}