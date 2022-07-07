<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(){

        $all_data       = DB::table('user_statistics')->get();

        $user_sum       = count($all_data);
        $finished       = 0;
        $correct        = 0;
        $all_answers    = 0;





        for($i = 0; $i < $user_sum; $i++){
            if($all_data[$i]->answered_question_count == 10){
                $finished += 1;
            }

            $all_answers += $all_data[$i]->answered_question_count;
            $correct     += $all_data[$i]->correct_question_count;
        }

        $incorrect       = $all_answers - $correct;


        return view('statistic', [
            'user_sum'  => $user_sum,
            'finished'  => number_format($finished / $user_sum * 100, 2),
            'correct'   => number_format($correct / $all_answers * 100, 2),
            'incorrect' => number_format($incorrect / $all_answers * 100, 2)
        ]);
    }
}
