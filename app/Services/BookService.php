<?php
namespace App\Services;

use App\Models\Book;
use Illuminate\Http\Request;

class BookService
{
    public function getAllBooks()
    {
        return Book::all();
    }

    public function createBook(array $data)
    {
        return Book::create($data);
    }

    public function updateBook(Book $book, array $data)
    {
        $book->update($data);
        return $book;
    }

    public function deleteBook(Book $book)
    {
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
