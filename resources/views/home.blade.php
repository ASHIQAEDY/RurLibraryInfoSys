@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <a href="{{ route('book.index')}}" class="btn btn-primary">
                    Books Collection
                </a>

                <a href="{{ route('member.index')}}" class="btn btn-primary">
                    Membership
                </a>
                <a href="{{ route('record.index')}}" class="btn btn-primary">
                    Book Record
                </a>

            </div>
        </div>
    </div>
</div>
@endsection
