<?php

function arrayMapUtf8Decode($data){
    if($data != ''){
        return array_map('utf8_decode', $data);
    }else{
        return $data;
    }
}//function arrayMapUtf8
function arrayMapUtf8Encode($data){
    if($data != ''){
        return array_map('utf8_encode', $data);
    }else{
        return $data;
    }
}//function arrayMapUtf8
function Utf8Decode($data){
    return utf8_decode($data);
}//function Utf8Decode
function Utf8Encode($data){
    return utf8_encode($data);
}//function Utf8Encode
function dateFormat($data){
	return date_format(new DateTime($data), 'd-m-Y');
}//function dateFormat
function hourFormat($data){
    return date_format(new DateTime($data), 'H:i:s');
}//function dateFormat
function dateTimeFormat($data){
    return date_format(new DateTime($data), 'd-m-Y H:i:s');
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