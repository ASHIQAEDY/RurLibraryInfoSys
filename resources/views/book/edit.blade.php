<!-- resources/views/book/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Book</h2>
        <form method="POST" action="{{ route('book.update', $book->id) }}">
            @csrf
            @method('PUT') <!-- This line is important for updating the resource -->

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="publisherName">Publisher</label>
                <input type="text" class="form-control" id="publisherName" name="publisherName" value="{{ $book->publisherName }}" required>
            </div>
            <div class="form-group">
                <label for="published_year">Published Year</label>
                <select class="form-control" id="published_year" name="published_year" required>
                    @for ($year = now()->year; $year >= 1900; $year--)
                        <option value="{{ $year }}" {{ $year == $book->published_year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="Novel" {{ $book->category == 'Novel' ? 'selected' : '' }}>Novel</option>
                    <option value="Religion" {{ $book->category == 'Religion' ? 'selected' : '' }}>Religion</option>
                    <option value="Academic" {{ $book->category == 'Academic' ? 'selected' : '' }}>Academic</option>
                    <option value="Children" {{ $book->category == 'Children' ? 'selected' : '' }}>Children</option>
                    <option value="General Readings" {{ $book->category == 'General Readings' ? 'selected' : '' }}>General Readings</option>
                    <option value="Fiction" {{ $book->category == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                    <option value="Non-Fiction" {{ $book->category == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
            <a href="{{ route('book.index', $book) }}" class="btn btn-primary">Back </a>
        </form>
    </div>
@endsection
