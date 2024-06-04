@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book Records</h1>

        <!-- Search form -->
        <form action="{{ route('record.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search by book ID or borrower's IC number">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>


        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <a href="{{ route('home') }}" class="btn btn-primary">
            Back to Dashboard
        </a>
        <a href="{{ route('record.create') }}" class="btn btn-primary mb-3">Add New Record</a>
        <table class="table">
            <thead>
            <tr>
                <th>Book ID</th>

                <th>Book Title</th>
                <th>Member IC </th>
                <th>Member Name</th>
                <th>Borrow Date</th>
                <th>return Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->book_Id }}</td>
                    <td>{{ optional($record->book)->title }}</td>
                    <td>{{ optional($record->member)->Ic_No }}</td>
                    <td>{{ optional($record->member)->Name }}</td>
                    <td>{{ $record->borrowing_date }}</td>
                    <td>{{ $record->returning_date ? $record->returning_date : 'No return date yet' }}</td>
                    <td>
                        <a href="{{ route('record.show', $record->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('record.edit', $record->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('record.destroy', $record->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
