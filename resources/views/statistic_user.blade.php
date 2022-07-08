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
                <h1>{{ $username }}</h1>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Unswered</td>
                            <td class="text-danger"><strong>{{ $answered }}</strong></td><strong>
                        </tr>
                        <tr>
                            <td>Correct</td>
                            <td class="text-danger"><strong>{{ $correct }}</strong></td><strong>

                        </tr>
                        <tr>
                            <td>Incorrect</td>
                            <td class="text-danger"><strong>{{ $incorrect }}</strong></td><strong>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ route('home') }}" type="button" class="btn btn-warning mt-5">Start quiz</a>
            </div>
        </div>
    </div>

@endsection
