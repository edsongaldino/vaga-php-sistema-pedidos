<?php

namespace App\Helpers;

use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Support\Carbon;

class Helper{

	public static function converte_reais_to_mysql($valor) {	
		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);
		
		return $valor;
	}
	

	public static function converte_valor_real($valor) {	
		if (is_numeric($valor)) {
			try {
				$valor = number_format($valor,2,",",".");	
			} catch (\Exception $e) {
				return $valor;
			}
			
			if($valor > 0) {
				return $valor;
			} else {
				return 0;
			}
		}	
	}

	public static function limpa_campo($valor){
		$valor = preg_replace("/\D+/", "", $valor); // remove qualquer caracter não numérico
		return $valor;
	}

	public static function data_br($data,$retorno = "00/00/0000") {
		if($data) {
			if($data != "0000-00-00") {
				$data = explode("-",$data);
				return $data[2]."/".$data[1]."/".$data[0];
			} else {
				return $retorno;
			}
		} else {
			return $retorno;
		}
	}

	public static function data_mysql($data,$retorno = "0000-00-00") {
		if($data) {
			$data = explode("/",$data);
			return $data[2]."-".$data[1]."-".$data[0];
		} else {
			return $retorno;
		}
	}

	public static function datetime_br($data){

		$data = Carbon::parse($data)->format('Y-m-d');
		return Helper::data_br($data);
		
	}

	public static function totalPrice($id){

		$valor = OrderController::getTotal($id);
		return $valor;
		
	}
	
}

?>