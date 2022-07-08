<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questions', [
            'questions' => DB::table('questions')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
    public function destroy(Request $request)
    {
        $result     = [];
        $id         = $request->question_id;

        $question   = Question::whereId($id)->get();

        if(!$question->isEmpty()){
            $question->delete();
            $result['status']   = 'success';
            $result['msg']      = 'Quote deleted';
        }else{
            $result['status']   = 'error';
            $result['msg']      = 'Cann\'t find record...';
        }

        return redirect()->route('questions')->with($result['status'], $result['msg']);
    }


    public function getRandomQeustion($type = null){

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

        return response()->json([
           'quote'      => $question_quote,
           'answers'    => $answers
        ]);
    }
}
