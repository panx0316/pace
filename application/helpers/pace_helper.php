<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('FormatearFecha'))
{
	function FormatearFecha($fecha)
	{
		if(isset($fecha))
		{
			$porciones=explode("/", $fecha);
			$dia=$porciones[0];
			$mes=$porciones[1];
			$anio=$porciones[2];
			$fecha_final=$anio."-".$mes."-".$dia;
			
			return $fecha_final;
		}
		else
		{
			return FALSE;
		}
	}
}

