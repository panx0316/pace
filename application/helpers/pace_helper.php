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

if(!function_exists('GetAvanceComponente'))
{
	function GetAvanceComponente($id_proyecto,$id_estrategia,$id_componente)
	{
		$CI= & get_instance(); 
		$CI->load->model('pace_model');
		if(isset($id_proyecto) && isset($id_estrategia) && isset($id_componente))
		{
			
			$avance = $CI->pace_model->getAvanceComponentes($id_proyecto,$id_estrategia,$id_componente);

			
			return $avance;
		}
		else
		{
			return FALSE;
		}
	}
}
if(!function_exists('GetAvanceEstrategia'))
{
	function GetAvanceEstrategia($id_proyecto,$id_estrategia)
	{
		$CI= & get_instance(); 
		$CI->load->model('pace_model');
		if(isset($id_proyecto) && isset($id_estrategia))
		{
			
			$avance = $CI->pace_model->getAvanceEstrategia($id_proyecto,$id_estrategia);

			
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