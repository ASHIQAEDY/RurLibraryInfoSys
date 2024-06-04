@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Member Details</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2>Member Information</h2>
                        <p><strong>Name: </strong> {{ $member->Name }}</p>
                        <p><strong>IC No.:</strong> {{ $member->Ic_No }}</p>
                        <p><strong>Address:</strong> {{ $member->Address }}</p>
                        <p><strong>Phone Number:</strong> {{ $member->PhoneNumber }}</p>
                        <!-- Add more member details as needed -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2>Book Record History</h2>
                        @if($member->records->isEmpty())
                            <p>No book records found for this member.</p>
                        @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Book Title</th>
                                    <th>Borrowing Date</th>
                                    <th>Return Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($member->records as $record)
                                    <tr>
                                        <td>{{ $record->book->title }}</td>
                                        <td>{{ $record->borrowing_date }}</td>
                                        <td>{{ $record->returning_date ?? 'Not returned yet' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('member.index') }}" class="btn btn-primary mt-3">Back to Member List</a>
    </div>
@endsection
