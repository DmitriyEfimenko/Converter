<?php

namespace helper;

class DTOToJson implements Coder
{
    public function fileCode($dto)
    {
        if($dto && is_array($dto))
        {
            $json = json_encode($dto,JSON_UNESCAPED_UNICODE);
            if(json_last_error() === JSON_ERROR_NONE )
            {
                return $json;
            }
        }
        return false;
    }
}