<?php

function arrayMapUtf8Decode($data){
	return $data;
}//function arrayMapUtf8
function arrayMapUtf8Encode($data){
	return $data;
}//function arrayMapUtf8
function dateFormat($data){
	return date_format(new DateTime($data), 'd/m/Y');
}//function dateFormat
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