@extends('layouts.main')

{{-- title --}}
@section('title', 'Quiz app')

{{-- app main content --}}
@section('content')


<div class="text-center mt-5">

    <h1 class="text-primary"><strong>Start Quiz</strong></h1>
    <img src="{{ asset('images/question_img.png') }}" class="question-mark"/>

    <p class="lead">User: 897546798</p>

    <p>Question: <strong>1</strong>/10</p>
    <div class="quiz-content mt-5" >
        <div class="quiz-title binary active-mode"><i class="fa fa-th-list" aria-hidden="true"></i></div>
        <div class="quiz-title multiply"><i class="fa fa-window-restore" aria-hidden="true"></i></div>

        <div class="break"></div>

        <div class="question-title mt-5"><h4>Who said it?</h4></div>

        <div class="break"></div>

        <div class="question-binary mt-3">
            <blockquote><p>სჯობს სიცოცხლესა ნაძრახსა სიკვდილი სახელოვანი!</p></blockquote>
        </div>

        <div class="break"></div>

        <div class="answer">
            <p>შოთა რუსთაველი</p>
        </div>

        <div class="answer-buttons mt-3">
            <button type="button" class="btn btn-success mr-30">Yes</button>
            <button type="button" class="btn btn-danger">No</button>

        </div>
    </div>

@endsection
