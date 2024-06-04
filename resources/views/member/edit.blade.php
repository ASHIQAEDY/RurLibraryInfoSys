@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Member Details</h1>

        <form method="POST" action="{{ route('member.update', $member->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="Name" id="Name" class="form-control" value="{{ $member->Name }}">
            </div>

            <div class="form-group">
                <label for="ic_no">IC No.:</label>
                <input type="text" name="Ic_No" id="Ic_No" class="form-control" value="{{ $member->Ic_No }}">
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="Address" id="Address" class="form-control" value="{{ $member->Address }}">
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="PhoneNumber" id="PhoneNumber" class="form-control" value="{{ $member->PhoneNumber }}">
            </div>

            <!-- Add more input fields for additional member details -->

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('member.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
