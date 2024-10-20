<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $dates = ['published_date'];
}
