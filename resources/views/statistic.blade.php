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
        <div class="break"></div>

        <button type="button" class="btn btn-danger mt-5" data-toggle="modal" data-target="#clearRsultsModal">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Clear results
        </button>






        <!-- Modal -->
        <div class="modal fade" id="clearRsultsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Warning</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to clear quiz results?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                        <a href="{{ route('statistic.clear') }}" class="btn btn-danger btn-sm">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
