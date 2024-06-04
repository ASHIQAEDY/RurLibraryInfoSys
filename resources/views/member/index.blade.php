@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Member Details</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('member.create') }}" class="btn btn-primary mb-3">Add New Member</a>
        <a href="{{ route('home') }}" class="btn btn-primary">
        Back to Homepage
        </a>
        @if(count($members) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>IC No.</th>
                    <th>Address</th>
                    <th>Contact No.</th>
                    <th>Volunteer ID </th>
                    <th>Action </th>
                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->Name }}</td>
                        <td>{{ $member->Ic_No }}</td>
                        <td>{{ $member->Address }}</td>
                        <td>{{ $member->PhoneNumber }}</td>
                        <td>{{ $member->VolunteerId }}</td> <!-- Display VolunteerId -->
                        <td>
                            <!-- View Button -->
                            <a href="{{ route('member.show', $member->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('member.edit', $member) }}" class="btn btn-primary">Edit</a>
                            <!-- Delete Form -->
                            <form action="{{ route('member.destroy', $member->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No members found.</p>
        @endif
    </div>
@endsection
