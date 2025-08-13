@extends('app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Insert Rating</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('rating.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Book Author</label>
                        <select name="author_id" id="authorSelect" class="form-select" required>
                            <option value="">-- Select Author --</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->author_id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Book Name</label>
                        <select name="book_id" id="bookSelect" class="form-select" required>
                            <option value="">-- Select Book --</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <select name="rating" class="form-select" required>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>                    
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#authorSelect').on('change', function () {
                let authorId = $(this).val();
                let $bookSelect = $('#bookSelect');

                $bookSelect.html('<option>Loading...</option>');

                $.getJSON(`{{ url('/rating/books') }}/${authorId}`, function (data) {
                    $bookSelect.html('<option value="">-- Select Book --</option>');
                    $.each(data, function (index, book) {
                        $bookSelect.append(`<option value="${book.book_id}">${book.title}</option>`);
                    });
                });
            });
        });
    </script>

@endsection
