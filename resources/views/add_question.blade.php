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
                <form>
                    <div class="mb-3">
                        <label for="question" class="form-label">Question <span class="text-secondary">(question)</span></label>
                        <input type="text" class="form-control" id="question">
                    </div>
                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer <span class="text-secondary">(author)</span></label>
                        <input type="text" class="form-control" id="answer">
                    </div>
                    <a href="{{ route('questions') }}" class="btn btn-sm btn-secondary">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                  </form>
            </div>
        </div>
    </div>
</div>


@endsection
