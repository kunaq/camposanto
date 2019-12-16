<?php

function arrayMapUtf8Decode($data){
	return $data;
}//function arrayMapUtf8
function arrayMapUtf8Encode($data){
	return $data;
}//function arrayMapUtf8
function dateFormat($data){
	return date_format(new DateTime($data), 'd-m-Y');
}//function dateFormat
function escapeComillasJson($data){
	$data = str_replace('"', '\\"', $data);
	return $data;
}//function escapeComillasJson