@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Add New Book</h2>
        <form method="POST" action="{{ route('book.store') }}">

        @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="publisherName">Publisher</label>
                <input type="text" class="form-control" id="publisherName" name="publisherName" required>
            </div>
            <div class="form-group">
                <label for="published_year">Published Year</label>
                <select class="form-control" id="published_year" name="published_year" required>
                    @for ($year = now()->year; $year >= 1900; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>


            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="Novel">Novel</option>
                    <option value="Religion">Religion</option>
                    <option value="Academic">Academic</option>
                    <option value="Children">Children</option>
                    <option value="General Readings">General Readings</option>
                    <option value="General Readings">Fiction</option>
                    <option value="General Readings">Non-Fiction</option>

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
@endsection
