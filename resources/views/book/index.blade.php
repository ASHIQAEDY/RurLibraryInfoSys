@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Available Books</h1>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Volunteer Dashboard
        </a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(count($books) > 0)
            <table class="table">

                <thead>

                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Published Year</th>
                    <th>Category</th>
                    <th>Actions</th> <!-- New column for actions -->
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publisherName }}</td>
                        <td>{{ $book->published_year }}</td>
                        <td>{{ $book->category }}</td>
                        <td>
                            <!-- View Button -->
                            <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('book.edit', $book) }}" class="btn btn-primary">Edit</a>
                            <!-- Delete Form -->
                            <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <a href="{{ route('book.create') }}" class="btn btn-primary">
                    Add New Book
                </a>
            </table>
        @else
            <p>No books available.</p>



        @endif
    </div>
@endsection
