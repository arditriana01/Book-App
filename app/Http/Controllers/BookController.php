<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the books with search, pagination, and rating statistics.
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10);
        $search = $request->input('search');

        $books = Book::with(['author', 'category'])
                ->withCount(['ratings as voter_count']) // Count total number of ratings and alias as 'voter_count'
                ->withAvg('ratings as average_rating', 'rating') // Calculate the average rating and alias as 'average_rating'
                ->when($search, function ($query, $search) {

                    // Apply filtering only if a search term is provided
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhereHas('author', function ($q) use ($search) {
                            
                            // Or search by author name through the relationship
                            $q->where('name', 'like', "%{$search}%");
                        });
                })
                ->orderByDesc('average_rating')
                ->paginate($limit)
                ->appends($request->query());

        return view('book.index', compact('books'));
    }
}
