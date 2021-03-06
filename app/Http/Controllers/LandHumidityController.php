<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandHumidity;
use Carbon\Carbon;
use Input;
use DB;

class LandHumidityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ini_set('max_execution_time', 300);
        // Get time
        if(Input::has('start_time')) {
            $start_time = Carbon::parse(e(Input::get('start_time')));
        } else {
            $start_time = Carbon::today('Asia/Ho_Chi_Minh')->subDay(7);
        }
        if(Input::has('end_time')) {
            $end_time = Carbon::parse(e(Input::get('end_time')));
        } else {
            $end_time = Carbon::today('Asia/Ho_Chi_Minh');
        }
        /* 
            tạo giá trị mặc định
        */
        $revenue_report = "";
        /* 
            kết thúc tạo giá trị mặc định
        */
        //make highest LandHumidity
        $end_time_tmp = clone $end_time;
        $highest = LandHumidity::where('created_at', '>=',$start_time)
                                ->where('created_at', '<' ,$end_time_tmp->addDay(1))
                                ->orderBy('number','desc')
                                ->first();
        //make smallest LandHumidity
        $end_time_tmp = clone $end_time;
        $smallest = LandHumidity::where('created_at', '>=',$start_time)
                                ->where('created_at', '<' ,$end_time_tmp->addDay(1))
                                ->orderBy('number','asc')
                                ->first();
        $distance = $start_time->diffInDays($end_time, false);

        for ($i=0; $i <= abs($distance) ; $i++) { 
            //make total log
            $start_time_clone = clone $start_time;
            $start_end_clone  = clone $start_time;
            $total_log = LandHumidity::where('created_at', '>=',$start_time_clone->addDay($i))
                                    ->where('created_at', '<' ,$start_end_clone->addDay($i+1))
                                    ->count();
            //make total value
            $start_time_clone = clone $start_time;
            $start_end_clone  = clone $start_time;
            $total_value = LandHumidity::where('created_at', '>=',$start_time_clone->addDay($i))
                                      ->where('created_at', '<' ,$start_end_clone->addDay($i+1))
                                      ->sum('number');
            $start_time_clone = clone $start_time;
            $date =  $start_time_clone->addDay($i)->toDateString();              
            $averages = $this->makeAverages($total_value,$total_log);
            $revenue_report = $revenue_report."{date:'".$date."',LandHumidity:".$averages . "},";
        }
        $start = $start_time->toDateString();
        $end   = $end_time->toDateString();
        return view('admin.LandHumidity',compact('revenue_report','highest','smallest','start','end'));
    }

    // make Averages
    public function makeAverages($total_value,$total_log)
    {
        if ($total_log == 0 )
        {
            return 0;
        }
        else
        {
            $averages = round($total_value/$total_log,2);
            return $averages;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
