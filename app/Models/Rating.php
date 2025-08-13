<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $primaryKey = 'rating_id';
    
    protected $fillable = [
        'book_id',
        'rating',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
