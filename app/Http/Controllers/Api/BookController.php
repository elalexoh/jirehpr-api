<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;


class BookController extends Controller
{
    public function getAllBooks()
    {
        $books = Book::get()->toJson(JSON_PRETTY_PRINT);
        return response($books, 200);
    }
}
