<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index($type = null){

        $username = Str::random(15); // RANDOM USERNAME

        return view('home', [
            'username'  => Str::upper($username),
            'type'      => $type ?? ''
        ]);
    }

    public function checkAnswer(Request $request){
        $status = ['status' => 'ok'];
        // request example
        // {"name":"ASDASDASD","quote":"test 12","answer":"12","status":"yes"}"


        // 1. CHECK USERNAME / CREATE OR EDIT /

        // 2. CHECK ANSWER / CORRECT OR NOT /

        // 3. UPDATE USER DATA

        // 4. RETURN RESPONSE
        // QUESTION NUMBER
        // CORRECT QUESTION
        $responce = [];
        $responce['question_count'] = 5;
        $responce['message'] = "Correct answer is: 12!";

        return response()->json($responce);
    }
}
