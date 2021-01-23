<?php

namespace Support\DTO;

abstract class DTO 
{

    public function __construct(array $params)
    {
        $requiredParams = static::requiredParams();

        foreach($requiredParams as $param){
            if(empty($params[$param]))
                throw new \Exception("$param dows not exist");
            
            $this->$param = $params[$param];
        }


    }

    public static function requiredParams() : array 
    {
        return [
            //
        ];
    }
    
    public static function fromArray(array $params)
    {
        $DTO = new static($params);

        return $DTO;
    }

    public static function fromStd($object)
    {
        throw new Exception;
    }


}