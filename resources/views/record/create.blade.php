@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Book Record</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('record.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="book_Id" class="form-label">Book</label>
                <select name="book_Id" id="book_Id" class="form-select">
                    <option value="">Select a book</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="memberId" class="form-label">Member</label>
                <select name="memberId" id="memberId" class="form-select">
                    <option value="">Select a member</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}">{{ $member->Name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="borrowing_date" class="form-label">Borrowing Date</label>
                <input type="date" name="borrowing_date" id="borrowing_date" class="form-control" value="{{ old('borrowing_date') }}">
            </div>


            <a href="{{ route('record.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Add Record</button>
        </form>
    </div>
@endsection
