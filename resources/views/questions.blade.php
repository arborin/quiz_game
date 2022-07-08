@extends('layouts.main')

{{-- title --}}
@section('title', 'Quiz app')

{{-- app main content --}}
@section('content')


    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('new-question') }}" class="btn btn-sm btn-primary mt-3 mb-3">Add New Question</a>

            @if (count($questions) == 0)
                <h4 class="mt-3">Please add questions...</h4>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Quote</th>
                            <th scope="col">Author</th>
                            <th scope="col">Operate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $question->quote }}</td>
                                <td>{{ $question->author }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-toggle="modal"
                                        id="delete-{{ $question->id }}" data-target="#exampleModal">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $questions->links() }}
            @endif
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route("delete.question") }}">
                        @csrf
                        <input type="hidden" id="delete-question" value="" name="question_id"/>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection



@section('script')
    <script>
        $('.delete-btn').click(function() {
            let id = $(this).attr('id');
            // id example: delete-12, we want to get 12
            id = id.split('-')[1];

            $("#delete-question").val(id);

            $('#exampleModal').show();
        });
    </script>
@endsection
