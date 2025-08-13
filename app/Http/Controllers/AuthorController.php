<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = DB::table('authors')
            ->select('authors.name', DB::raw('COUNT(ratings.rating_id) as voter'))
            ->join('books', 'books.author_id', '=', 'authors.author_id')
            ->join('ratings', 'ratings.book_id', '=', 'books.book_id')
            ->where('ratings.rating', '>', 5)
            ->groupBy('authors.author_id', 'authors.name')
            ->orderByDesc('voter')
            ->limit(10)
            ->get();

        return view('author.index', compact('authors'));
    }
}
