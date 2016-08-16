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

if(!function_exists('FormatearFechaES'))
{
	function FormatearFechaES($fecha)
	{
		if(isset($fecha))
		{
			$porciones=explode("-", $fecha);
			$anio=$porciones[0];
			$mes=$porciones[1];
			$dia=$porciones[2];
			$fecha_final=$dia."/".$mes."/".$anio;
			
			return $fecha_final;
		}
		else
		{
			return FALSE;
		}
	}
}

if(!function_exists('GetAvanceHito'))
{
	function GetAvanceHito($id_proyecto,$id_area,$id_hito)
	{
		$CI= & get_instance(); 
		$CI->load->model('pace_model');
		if(isset($id_proyecto) && isset($id_area) && isset($id_hito))
		{
			
			$avance = $CI->pace_model->getAvanceHitos($id_proyecto,$id_area,$id_hito);

			
			return $avance;
		}
		else
		{
			return FALSE;
		}
	}
}
if(!function_exists('GetAvanceArea'))
{
	function GetAvanceArea($id_proyecto,$id_area)
	{
		$CI= & get_instance(); 
		$CI->load->model('pace_model');
		if(isset($id_proyecto) && isset($id_area))
		{
			
			$avance = $CI->pace_model->getAvanceArea($id_proyecto,$id_area);

			
			return $avance;
		}
		else
		{
			return FALSE;
		}
	}
}

if(!function_exists('GetAvanceProyecto'))
{
	function GetAvanceProyecto($id_proyecto)
	{
		$CI= & get_instance(); 
		$CI->load->model('pace_model');
		if(isset($id_proyecto))
		{
			
			$avance = $CI->pace_model->getAvanceProyecto($id_proyecto);

			
			return $avance;
		}
		else
		{
			return FALSE;
		}
	}
}

if(!function_exists('GetNombreResponsable'))
{
	function GetNombreResponsable($rut)
	{
		$CI= & get_instance(); 
		$CI->load->model('pace_model');
		if(isset($rut))
		{
			
			$nombre = $CI->pace_model->getNombreResponsable($rut);

			
			return $nombre;
		}
		else
		{
			return FALSE;
		}
	}
}