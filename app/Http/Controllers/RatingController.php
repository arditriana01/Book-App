<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Rating;

class RatingController extends Controller
{
    public function create()
    {
        $authors = Author::all();
        return view('rating.create', compact('authors'));
    }

    public function getBooksByAuthor($authorId)
    {
        return response()->json(
            Book::where('author_id', $authorId)
                ->select('book_id', 'title')
                ->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_id' => 'required|exists:authors,author_id',
            'book_id'   => 'required|exists:books,book_id',
            'rating'    => 'required|integer|min:1|max:10',
        ]);

        Rating::create([
            'book_id' => $request->book_id,
            'rating'  => $request->rating,
        ]);

        return redirect()->route('book.index')->with('success', 'Rating added successfully!');
    }
}
