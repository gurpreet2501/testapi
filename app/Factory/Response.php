<?php
namespace App\Factory;

class Response{

	public static function rawResp(){
		return [
			'STATUS' => '',
			'RESPONSE' => '',
			'ERRORS' =>'' ,
		];
	}

	public static function success(Array $data, $message=null){
		$res = Response::rawResp();
		$res['STATUS'] = 'SUCCESS';
		$res['MESSAGE'] = $message;
		$res['RESPONSE'] = $data;
		return response()->json($res);

	}

	public static function rawResp(Array $data, $message=null){
		$res = Response::rawResp();
		$res['MESSAGE'] = $message;
		$res['RESPONSE'] = $data;
		return response()->json($res);

	}

	public static function errors($code){

		$res = Response::rawResp();
		$res['STATUS'] = 'FAILURE';
		$res['ERRORS'] = [ "{$code}" => config("errors.".$code)];
		return $res;

	}
}