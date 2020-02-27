<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

$codPro = $_POST['codPro'];

$arrData = "";




$buttons = '<form action="registro-prospecto" target="_blank" method="post">
                <input type="hidden" name="variable1" value="'.$codPro.'" />
                <button type="submit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top">
                    <i class="fa fa-edit"></i>
                </button>
                <button target="_blank" type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Eliminar" onclick="">
                <i class="fa fa-trash"></i>
            </button>
            </form>';


    $arrData = array('buttons'=> $buttons);


    echo json_encode($arrData);
