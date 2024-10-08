<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Services\BookService;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    // عرض قائمة الكتب
    public function index()
    {
        return response()->json($this->bookService->getAllBooks());
    }

    // إضافة كتاب جديد
    public function store(BookRequest $request)
    {
        $book = $this->bookService->createBook($request->validated());
        return response()->json($book, 201);
    }

    // عرض كتاب معين
    public function show(Book $book)
    {
        return response()->json($book);
    }

    // تحديث بيانات كتاب
    public function update(BookRequest $request, Book $book)
    {
        $book = $this->bookService->updateBook($book, $request->validated());
        return response()->json($book);
    }

    // حذف كتاب
    public function destroy(Book $book)
    {
        return $this->bookService->deleteBook($book);
    }
}
