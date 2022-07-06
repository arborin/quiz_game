@extends('layouts.main')

{{-- title --}}
@section('title', 'Quiz app')

{{-- app main content --}}
@section('content')


<div class="row">
    <div class="col-md-12">
        <a href="{{ route('add-question') }}" class="btn btn-sm btn-primary mt-3 mb-3">Add New Question</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">Answer</th>
                <th scope="col">Operate</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </div>
</div>



@endsection
