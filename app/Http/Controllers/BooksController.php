<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function index()
    {
        if (Auth::user()->role != 'superadmin') {
            return abort(403);
        }

        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        if (Auth::user()->role != 'superadmin') {
            return abort(403);
        }

        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role != 'superadmin') {
            return abort(403);
        }

        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->category = $request->category;
        $book->save();

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        if (Auth::user()->role != 'superadmin') {
            return abort(403);
        }

        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        if (Auth::user()->role != 'superadmin') {
            return abort(403);
        }

        $book->title = $request->title;
        $book->author = $request->author;
        $book->category = $request->category;
        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        if (Auth::user()->role != 'superadmin') {
            return abort(403);
        }

        $book->delete();

        return redirect()->route('books.index');
    }
}
