@extends('layouts.main')

{{-- title --}}
@section('title', 'Quiz app')

{{-- app main content --}}
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
                Add new question
            </div>
            <div class="card-body">
                {{-- <ul class="list-unstyled">
                    @if(count($errors) > 0)
                    {{ dd($errors->first('quote')) }}
                    @endif
                </ul> --}}
                <form method="post" action="{{ route('create.question') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="question" class="form-label">Quote <span class="text-secondary">(question)</span></label>
                        <input type="text" class="form-control" name="quote" id="quote" value="{{ old('quote') }}">
                        @if($errors->first('quote'))
                            <label for="numberField" class="text-danger">{{ $errors->first('quote') }}</label>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer <span class="text-secondary">(author)</span></label>
                        <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
                        @if($errors->first('author'))
                            <label for="numberField" class="text-danger">{{ $errors->first('author') }}</label>
                        @endif
                    </div>
                    <a href="{{ route('questions') }}" class="btn btn-sm btn-secondary">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                  </form>
            </div>
        </div>
    </div>
</div>


@endsection
