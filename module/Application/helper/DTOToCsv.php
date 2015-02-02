<?php

namespace helper;

class DTOToCsv implements Coder
{
    private $tempMemory;
    private $csv;
    private $status = true;

    public function fileCode($dto)
    {
        if($dto && is_array($dto))
        {
            $this->tempMemory = fopen('php://temp', 'r+');
            $this->arrayToCsv($dto);
            fclose($this->tempMemory);
            if($this->csv != null && $this->status != false)
            {
                return $this->csv;
            }
        }
        return false;
    }

    private function arrayToCsv($dto)
    {
        foreach($dto as $key => $value)
        {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    if($this->csv == null)
                    {
                        $this->arrayToCsv($value);
                    }else{
                        $this->status = false;
                        break;
                    }

                } else {
                    if ($key == 0) {
                        fputcsv($this->tempMemory, array_keys($value));
                        fputcsv($this->tempMemory, $value);
                    } else {
                        fputcsv($this->tempMemory, $value);
                    }
                    rewind($this->tempMemory);
                    $this->csv = stream_get_contents($this->tempMemory);
                }

            }
        }
    }
}