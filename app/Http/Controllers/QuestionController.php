<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'quote' => 'required',
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
}
