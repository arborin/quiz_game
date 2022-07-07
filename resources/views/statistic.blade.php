@extends('layouts.main')

{{-- title --}}
@section('title', 'Statistics')

{{-- app main content --}}
@section('content')


    <div class="text-center mt-5">

        <h1 class="text-primary"><strong>Quiz Statistic</strong></h1>
        <img src="{{ asset('images/statistic.png') }}" class="question-mark" />

        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Number of users played the game</td>
                            <td class="text-danger"><strong>{{ $user_sum }}</strong></td><strong>
                        </tr>
                        <tr>
                            <td>% of users finished the game</td>
                            <td class="text-danger"><strong>{{ $finished }}</strong></td><strong>

                        </tr>
                        <tr>
                            <td>% of correct answers</td>
                            <td class="text-danger"><strong>{{ $correct }}</strong></td><strong>
                        </tr>
                        <tr>
                            <td>% of incorrect answers</td>
                            <td class="text-danger"><strong>{{ $incorrect }}</strong></td><strong>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
