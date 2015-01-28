<?php

namespace helper;

class DTOToJson implements Coder
{
    public function fileCode($dto)
    {
        // TODO: Implement fileCode() method.
        if(is_array($dto))
        {
            $json = json_encode($dto);
            return $json;
        }else{
            return false;
        }

    }
}