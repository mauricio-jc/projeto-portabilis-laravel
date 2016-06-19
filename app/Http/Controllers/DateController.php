<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DateController extends Controller {

	public function convert_date_db($data){
		$date = explode('/', $data);
		$newDate = $date[2] . "-" . $date[1] . "-" . $date[0];
		return $newDate;
	}

	public function convert_date_screen($data){
		$date = explode('-', $data);
		$newDate = $date[2] . "/" . $date[1] . "/" . $date[0];
		return $newDate;	
	}
}
