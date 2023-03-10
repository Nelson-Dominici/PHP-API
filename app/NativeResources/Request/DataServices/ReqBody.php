<?php

namespace app\NativeResources\Request\DataServices;

class ReqBody
{
	
	public static function get(): array{
		
		$bodyData = [];

		$nonStandardContent = json_decode(file_get_contents('php://input'), true);

		if(!empty($_POST)){
			$bodyData = $_POST;
		
		}elseif($nonStandardContent !== null) {
			$bodyData = $nonStandardContent;
		}
		
		if($bodyData !== []){
	
			return array_map(function ($input) {
				return htmlspecialchars(strip_tags($input));
			
			}, $bodyData);
		}

		return $bodyData;
	}

}