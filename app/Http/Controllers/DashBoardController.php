<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeHumidity;
use App\LandHumidity;
use App\Temperature;
use Carbon\Carbon;
use Input;
use DB;

class DashBoardController extends Controller
{
    public function index()
    {
    	$teamperature_now = Temperature::orderBy('id','desc')->first();
    	$home_humidiy_now = HomeHumidity::orderBy('id','desc')->first();
    	$lan_humidiy_now = LandHumidity::orderBy('id','desc')->first();
    	return view('admin.dashboard',compact('teamperature_now','home_humidiy_now','lan_humidiy_now'));
    }
}
