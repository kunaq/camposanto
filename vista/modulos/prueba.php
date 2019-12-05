<?php 
$ruc="20113301181";
try {
  $soapclient = new SoapClient('http://licenciacontasiscorp.com/20_App-Licencia_19/aDW_P40ducT04grUp413oS_WD.aspx?wsdl');
  $param = array('T1'=>$ruc);
  $rspt = $soapclient->Execute($param);

  $array = json_decode(json_encode($rspt),true);

  $array2=implode($array);

  $erase = array('[{','}]');

  $array3=str_replace($erase, "", $array2);

  $array4=str_replace('.00"', '',$array3);

  $arrayList=explode("},{", $array4);
     
     print_r($rspt);
}catch (Exception $e) {
}
?>