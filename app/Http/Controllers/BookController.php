<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10);
        $search = $request->input('search');

        $books = Book::with(['author', 'category'])
            ->withCount(['ratings as voter_count'])
            ->withAvg('ratings as average_rating', 'rating')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhereHas('author', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->orderByDesc('average_rating')
            ->paginate($limit)
            ->appends($request->query());

        return view('book.index', compact('books'));
    }
}
