@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Member</h1>

        <form action="{{ route('member.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="Name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Ic_No">IC No.</label>
                <input type="text" name="Ic_No" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="Address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="PhoneNumber">Contact No.</label>
                <input type="text" name="PhoneNumber" class="form-control" required>
            </div>
            <!-- Add other fields as necessary -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
