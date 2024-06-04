<!-- resources/views/book/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book Details</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $book->id }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $book->title }}</td>
            </tr>
            <tr>
                <th>Author</th>
                <td>{{ $book->author }}</td>
            </tr>
            <tr>
                <th>Publisher</th>
                <td>{{ $book->publisherName }}</td>
            </tr>
            <tr>
                <th>Published Year</th>
                <td>{{ $book->published_year }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $book->category }}</td>
            </tr>


        </table>

        <a href="{{ route('book.index', $book) }}" class="btn btn-primary">Back </a>
    </div>
@endsection
