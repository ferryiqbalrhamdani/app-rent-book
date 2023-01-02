<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $data['title'] = 'Book List';
        $data['bookCount'] = Book::count();
        $data['books'] = Book::all()->sortBy('book_code');
        return view('book', $data);
    }

    public function bookList()
    {
        $data['title'] = 'Book List';
        $data['bookCount'] = Book::count();
        $data['books'] = Book::where('status', '=', 'in stock')->paginate(5);
        return view('books.books-list', $data);
    }

    public function add()
    {
        $data['title'] = 'Add Book';
        $data['categories'] = Category::all();
        return view('books.book-add', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:100',
            'title' => 'required|max:100',
            'category' => 'required|max:100'
        ]);

        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->category);

        return redirect('books')->with('status', 'Book added successfully.');
    }

    public function edit($slug)
    {
        $data['title'] = 'Edit Book';
        $data['categories'] = Category::all();
        $data['book'] = Book::where('slug', $slug)->first();

        return view('books.book-edit', $data);
    }

    public function destroy(Request $request, $slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->categories()->sync($request->category);
        $book->delete();

        return redirect('books')->with('status', 'Data book deleted successfully.');
    }

    public function update(Request $request, $slug)
    {
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }


        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());

        if ($request->category) {
            $book->categories()->sync($request->category);
        }
        return redirect('books')->with('status', 'Book updated successfully.');
    }

    public function bookRent(Request $request, $slug)
    {
    }
}
