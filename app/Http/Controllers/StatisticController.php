<?php

namespace App\Http\Controllers;

use App\Models\UserStatistic;
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
            // CALCULETE HOW MANY USER ANSWERED ALL 10 QUESTIONS
            if($all_data[$i]->answered_question_count == 10){
                $finished += 1;
            }

            $all_answers += $all_data[$i]->answered_question_count;
            $correct     += $all_data[$i]->correct_question_count;
        }

        $incorrect       = $all_answers - $correct;

        return view('statistic', [
            'user_sum'  => $user_sum,
            'finished'  => ($user_sum != 0)     ? number_format($finished / $user_sum * 100, 2) : 0,
            'correct'   => ($all_answers != 0)  ? number_format($correct / $all_answers * 100, 2) : 0,
            'incorrect' => ($all_answers != 0)  ? number_format($incorrect / $all_answers * 100, 2) : 0
        ]);
    }

    public function statisticUser($username){
        $user_data       = DB::table('user_statistics')->whereUser($username)->first();

        if($user_data == null){
            return redirect()->route('home')->with('error', 'User not find');
        }


        return view('statistic_user', [
            'username'  => $user_data->user,
            'answered'  => $user_data->answered_question_count,
            'correct'   => $user_data->correct_question_count,
            'incorrect' => $user_data->answered_question_count - $user_data->correct_question_count
        ]);
    }


    public function scatisticClear(){
        UserStatistic::truncate();

        $result             = [];
        $result['status']   = 'success';
        $result['msg']      = 'Statistic cleared';

        return redirect()->route('statistic')->with($result['status'], $result['msg']);
    }
}
