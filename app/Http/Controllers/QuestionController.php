<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\UserStatistic;

use function PHPSTORM_META\type;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{

    public function index(){
        return view('questions', [
            'questions' => DB::table('questions')->orderBy('id', 'desc')->paginate(10)
        ]);
    }


    public function create(Request $request){
        $validated = $request->validate([
            'quote' => 'required|unique:questions',
            'author' => 'required',
        ]);

        $question = Question::create([
            'quote'     => $request->quote,
            'author'    => $request->author,
        ]);

        return redirect()->route('questions')->with('success', 'New question add');
    }


    public function destroy(Request $request){
        $result     = [];
        $id         = $request->question_id;
        // dd($id);
        $question   = Question::where('id', $id)->first();

        if($question){
            $question->delete();
            $result['status']   = 'success';
            $result['msg']      = 'Quote deleted';
        }else{
            $result['status']   = 'error';
            $result['msg']      = 'Cann\'t find record...';
        }

        return redirect()->route('questions')->with($result['status'], $result['msg']);
    }


    public function getRandomQeustion($user, $type = null){

        # GET 4 RANDOM ANSWER IF QUESTION TYPE IS myltiply TYPE. ELSE 1 ANSWER
        $choise_count           = 1;

        $questions              = Question::all();

        $count                  = count($questions);
        $random_index           = random_int(0, $count - 1);    # GENERATE RANDOM INDEX TO GET RUNDOM QUOTE
        $question_quote         = $questions[$random_index]->quote;
        $correct_answer         = $questions[$random_index]->author;

        # CORRECT ANSWER ARRAY
        $answers                = [];
        if($type == 'multi'){
            $answers[]          = $correct_answer;      # PROVIDES THAT CORRECT ANSWER WILL BE IN ANSWER ARRAY
            $choise_count       = 4;                    # CHOISE COUNT
        }

        # answers array example:

        # GET AVELABLE 4 OR 1 ANSWER ACCORDING THE type
        while(count($answers) < $choise_count){
            # FOR BETTER RANDOM
            $rand_range = range(0, $count - 1);

            shuffle($rand_range);

            $random_answer_ind = $rand_range[0];  // FOR GETTING RANDOM INDEX ANSWER

            $quote = $questions[$random_answer_ind]->author;

            # CHECK IF ANSWER NOT EXISTS IN answer ARRAY
            if(!in_array($quote, $answers)){
                $answers[] = $quote;
            }
        }

        # THIS USER ALREADY UNSWERED:
        $question_count = 0;

        $user = UserStatistic::whereUser($user)->first();

        if($user){
            $question_count = $user->answered_question_count;
        }

        # SHUFFLE ANSWERS
        shuffle($answers);

        return response()->json([
           'quote'          => $question_quote,
           'answers'        => $answers,
           'question_count' => $question_count
        ]);
    }
}
