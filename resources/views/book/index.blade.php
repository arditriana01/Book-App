@extends('app')

@section('content')

    <h1 class="mb-4">List of Books</h1>

    <form method="GET" action="{{ route('book.index') }}" class="mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="limit" class="col-form-label">List shown:</label>
            </div>
            <div class="col-auto">
                <select id="limit" name="limit" class="form-select">
                    @foreach(range(10, 100, 10) as $num)
                        <option value="{{ $num }}" {{ request('limit', 10) == $num ? 'selected' : '' }}>
                            {{ $num }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <label for="search" class="col-form-label">Search:</label>
            </div>
            <div class="col-auto">
                <input type="text" id="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Book or Author">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Book Name</th>
                <th>Category Name</th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $index => $book)
            <tr>
                <td>{{ $loop->iteration + ($books->currentPage() - 1) * $books->perPage() }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->category->name }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ number_format($book->average_rating, 2) }}</td>
                <td>{{ $book->voter_count }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No data found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $books->links() }}
@endsection
