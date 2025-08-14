<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = DB::table('authors')
            ->select('authors.name', DB::raw('COUNT(ratings.rating_id) as voter'))
            ->join('books', 'books.author_id', '=', 'authors.author_id') // Join books with authors
            ->join('ratings', 'ratings.book_id', '=', 'books.book_id')   // Join ratings with books
            ->where('ratings.rating', '>', 5) // Only consider ratings greater than 5
            ->groupBy('authors.author_id', 'authors.name') // Group results by author
            ->orderByDesc('voter') // Order by voter count in descending order
            ->limit(10) // Limit the result to top 10 authors
            ->get();

        return view('author.index', compact('authors'));
    }
}
