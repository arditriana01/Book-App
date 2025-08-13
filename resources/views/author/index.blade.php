@extends('app')

@section('content')
    <div class="container mt-4">
        <h2 class="fw-bold">Top 10 Most Famous Author</h2>
        <table class="table table-bordered text-center mt-3">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Author Name</th>
                    <th>Voter</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $index => $author)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->voter }}</td>
                    </tr>
                @endforeach

                @if($authors->count() < 10)
                    @for($i = $authors->count() + 1; $i <= 10; $i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>…..</td>
                            <td>….</td>
                        </tr>
                    @endfor
                @endif
            </tbody>
        </table>
    </div>
@endsection
