<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\UserStatistic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index($type = null){

        $username = Str::random(15); // RANDOM USERNAME

        $questions              = Question::all();
        return view('home', [
            'username'          => Str::upper($username),
            'type'              => $type ?? '',
            'question_count'    => count($questions)
        ]);
    }

    public function checkAnswer(Request $request){
        $status = ['status' => 'ok'];
        // request example
        // name: "VZECAF1IATDJLP2", quote: "78979", answer: "123123", status: "yes"


        // CHECK USERNAME / CREATE OR EDIT /
        $user = UserStatistic::whereUser($request->name)->first();

        // dd($user);
        if(!$user){
            $user = UserStatistic::create([
                'user'                      => $request->name,
                'answered_question_count'   => 0,
                'correct_question_count'    => 0
            ]);
        }

        // dd($user->correct_question_count);
        if($user->answered_question_count < 10){
            $quote = Question::where('quote', $request->quote)->first();

            # IF AUTHOR IS CORRECT AND ANSWER IS YES
            if($quote->author == $request->answer AND $request->status == 'yes'){
                $user->correct_question_count +=1; // intval($user->correct_question_count) + 1;
                $msg = "Correct! The right answer is: " . $quote->author;
            }
            # IF AUTHOR IS INCORECT AND ANSWER IS NO
            elseif($quote->author != $request->answer AND $request->status == 'no'){
                $user->correct_question_count += 1;
                $msg = "Correct! The right answer is: " . $quote->author;
            }
            else{
                $msg = "Sorry, you are wrong! The right answer is: " . $quote->author;
            }

            $user->answered_question_count += 1;

            $user->update();
        }else{
            $msg = "You answered all 10 questions!";
        }
        $responce = [];
        $responce['question_count']     = $user->answered_question_count;
        $responce['message']            = $msg;

        return response()->json($responce);
    }
}
