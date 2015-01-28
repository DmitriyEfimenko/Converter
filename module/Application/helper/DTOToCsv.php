<?php

namespace helper;

class DTOToCsv implements Coder
{
    public function fileCode($dto)
    {
        if(is_array($dto))
        {
            var_dump($dto);
            $temp_memory = fopen('php://temp', 'rw');
            foreach($dto as $line)
            {

                    foreach($line as $lines)
                    {
                        fputcsv($temp_memory,$lines);
                    }

            }
            rewind($temp_memory);
            $csv = stream_get_contents($temp_memory);
            fclose($temp_memory);
            return $csv;
        }else{
            return false;
        }
    }
}