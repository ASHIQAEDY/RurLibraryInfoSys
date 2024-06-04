@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Record Details</h1>

        <div>
            <h3>Book Title: {{ $record->book->title }}</h3>
            <p>Member Name: {{ $record->member->Name }}</p>
            <p>Borrowing Date: {{ $record->borrowing_date }}</p>
            <p>Returning Date: {{ $record->returning_date ?? 'Not returned yet' }}</p>
        </div>

        <div>
            <!-- You can add additional details here if needed -->
        </div>

        <div>
            <a href="{{ route('record.index') }}" class="btn btn-secondary">Cancel</a>
            <a href="{{ route('record.edit', $record->id) }}" class="btn btn-primary">Edit</a>
            <!-- Add any other actions/buttons you need here -->
        </div>
    </div>
@endsection
