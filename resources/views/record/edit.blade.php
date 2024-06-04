@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book Record</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('record.update', $record->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="book_Id" class="form-label">Book</label>
                <select name="book_Id" id="book_Id" class="form-select">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ $book->id == $record->book_Id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="memberId" class="form-label">Member</label>
                <select name="memberId" id="memberId" class="form-select">
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}" {{ $member->id == $record->memberId ? 'selected' : '' }}>
                            {{ $member->Name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="borrowing_date" class="form-label">Borrowing Date</label>
                <input type="date" name="borrowing_date" id="borrowing_date" class="form-control" value="{{ $record->borrowing_date }}">
            </div>

            <div class="mb-3">
                <label for="returning_date" class="form-label">Returning Date (optional)</label>
                <input type="date" name="returning_date" id="returning_date" class="form-control" value="{{ $record->returning_date }}">
            </div>

            <a href="{{ route('record.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Record</button>
        </form>
    </div>
@endsection
