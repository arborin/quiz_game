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
                            <th scope="row">Number of users played the game</th>
                            <td>{{ $user_sum }}</td>
                        </tr>
                        <tr>
                            <th scope="row">% of users finished the game</th>
                            <td>{{ $finished }}</td>

                        </tr>
                        <tr>
                            <th scope="row">% of correct answers</th>
                            <td>{{ $correct }}</td>
                        </tr>
                        <tr>
                            <th scope="row">% of incorrect answers</th>
                            <td>{{ $incorrect }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
