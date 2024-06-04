<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all books from the database
        $books = Book::all();

        // Return the view with the list of books
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all(); // Retrieve all books from the database
        return view('book.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisherName' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1900|max:' . date('Y'),
            'category' => 'required|string|max:255',
        ]);


        // Retrieve the authenticated user's volunteer ID
        $volunteerId = Auth::user()->volunteer->id;


        // Create a new book instance and save to the database
        $book = Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publisherName' => $request->input('publisherName'),
            'published_year' => $request->input('published_year'),
            'category' => $request->input('category'),
            'volunteerId' => $volunteerId,
        ]);

        // Redirect to the index route with a success message
        return redirect()->route('book.index')->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisherName' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1900|max:' . date('Y'),
            'category' => 'required|string|max:255',
        ]);

        // Update the book instance with the validated data
        $book->update($validatedData);

        // Redirect back to the book index route with a success message
        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        // Delete the book from the database
        $book->delete();

        // Redirect to the index route with a success message
        return redirect()->route('book.index')->with('success', 'Book deleted successfully.');
    }
}
