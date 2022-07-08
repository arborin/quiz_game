@extends('layouts.main')

{{-- title --}}
@section('title', 'Quiz app')

{{-- app main content --}}
@section('content')


<div class="text-center mt-5">

    {{-- <h1 class="text-primary"><strong>Start Quiz</strong></h1> --}}
    <img src="{{ asset('images/question_img.png') }}" class="question-mark"/>

    <p><strong>User:</strong> {{ $username }}</p>

    <p>Question: <strong><span id="question-count">1</span></strong>/10</p>
    <div class="quiz-content mt-5" >
        <a href="{{ route('home') }}" class="quiz-title binary @if($type=='') active-mode @endif"><i class="fa fa-th-list" aria-hidden="true"></i></a>
        <a href="{{ route('home', ['type' => 'multi']) }}" class="quiz-title multiply @if($type=='multi') active-mode @endif"><i class="fa fa-window-restore" aria-hidden="true"></i></a>

        <div class="break"></div>

        <div class="question-title mt-5"><h4>Who said it?</h4></div>

        <div class="break"></div>

        <div class="question-binary mt-3 mb-3">
            <blockquote><p id="question-quote">...</p></blockquote>
        </div>

        <div class="break"></div>

        <div class="answer">

        </div>

        <div class="next-button mt-3 hide" style="width: 100%">
            <button type="button" class="btn btn-primary" id='next-btn'>Next</button>
        </div>

        @if($type == '')
            <div class="answer-buttons mt-3">
                <button type="button" class="btn btn-success mr-30 yes-btn">Yes</button>
                <button type="button" class="btn btn-danger no-btn">No</button>
            </div>
        @endif
    </div>

@endsection


@section('script')

<script>

    const update_quote = (data) => {
        let quote = data['quote'];
        let answers = data['answers']

        $('.answer').empty();
        $("#question-quote").text(quote);


        if(answers.length == 1){
            // IN CASE OF BINARY QUIZ
            answers.forEach(answer => {
                $('.answer').append(
                    $('<p/>')
                    .attr("id", "")
                    .addClass("option")
                    // .append("<span/>")
                    .text(answer)
                );
            });
        }else{
            // IN CASE OF MULTIPLY CHOISE ANSWERS
            answers.forEach(answer => {
                $('.answer').append(
                    $('<p/>')
                    .attr("id", "")
                    .addClass("option multi-answer-option")
                    // .append("<span/>")
                    .text(answer)
                );
            });
        }
    }

    const set_cookie = (user_data) => {
        document.cookie = 'quiz=' + JSON.stringify(user_data);
    }

    const toggle_buttons = () => {
        $('.next-button').toggleClass('hide');
        $('.answer-buttons').toggleClass('hide');
    }

    const toggle_options = () => {
        $('.next-button').toggleClass('hide');
        $('.answer').toggleClass('hide');

    }


    const get_cookie = (key) => {
        let cookies = document.cookie.split(';')
        let json = '';

        cookies.forEach(cookie => {
            if( cookie.includes(key)){
                json = JSON.parse(cookie.split("=")[1]);
            }
        });

        return json;
    }


    const get_random_question = () =>{
        let quiz = get_cookie('quiz');
        let type = quiz['type'];
        let url  = "random/"+type;

        console.log(url);

        $.ajax({
            type: "GET",
            url: url,

            success: function(data) {
                    update_quote(data)
                    console.log(JSON.stringify(data));
                },
            error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.status);
                }
        });
    }

    const send_answer = (username, quote, answer, status) =>{
        let _token   = $('meta[name="csrf-token"]').attr('content');

        console.log(_token);
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        let url  = "{{ route('check.answer') }}";

        let data = {name: "ASDASDASD", quote: "test 12", answer: '12', status: 'yes'}

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: "text",
            _token: _token,

            success: function(data) {
                    data = JSON.parse(data);
                    document.getElementById("question-count").textContent = data['question_count'];
                    document.getElementById("question-quote").textContent = data['message'];

                },
            error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.status);
                }
        });
    }


    $(document).ready(function() {
        let user            = '{{ $username }}';    //get user
        let default_type    = '{{ $type }}';        // get question type
        let quiz            = get_cookie('quiz');   // get type from cookies
        let user_data       = {'user': user, 'type': default_type};     //

        set_cookie(user_data);

        get_random_question();

    });


    $('.yes-btn').click(function(){
        send_answer("OIUEWOIRU", 'test 12', '12', 'yes');
        toggle_buttons();
    });


    $('.no-btn').click(function(){
        send_answer("OIUEWOIRU", 'test 12', '12', 'yes');
        toggle_buttons();
    });

    $('#next-btn').click(function(){
        let default_type = '{{ $type }}';

        if(default_type == ''){
            toggle_buttons();
        }else{
            toggle_options();
        }

        get_random_question();
    });

    $(function() {
        $(document).on("click", '.multi-answer-option', function() {
            toggle_options();
            // get_random_question();
        });
    });



    </script>

@endsection
