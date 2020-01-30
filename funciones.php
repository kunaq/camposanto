<?php

function arrayMapUtf8Decode($data){
    if($data != ''){
        return $data;
    }else{
        return $data;
    }   
}//function arrayMapUtf8
function arrayMapUtf8Encode($data){
    if($data != ''){
        return $data;
    }else{
        return $data;
    }   
}//function arrayMapUtf8
function Utf8Decode($data){
    return $data;
}//function Utf8Decode
function Utf8Encode($data){
    return $data;
}//function Utf8Encode
function dateFormat($data){
    return date_format($data, 'd/m/Y');
}//function dateFormat
function dateTimeFormat($data){
    return date_format($data, 'd/m/Y H:i:s');
}//function dateTimeFormat
function escapeComillasJson($data){
	$data = str_replace('"', '\\"', $data);
	return $data;
}//function escapeComillasJson
function utf8_converter($array)
{
    array_walk_recursive($array, function(&$item, $key){
        if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
        }
    });
 
    return $array;
}