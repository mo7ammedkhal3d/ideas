@extends('layouts.layout')
@section('title', 'Admin Dashboard')
@section('content')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('admin.shared.sideLinkes')
            </div>
            <div class="col-9">
                @if (Route::is())
                    <h1>Users</h1>
                @else
                <h1>Admin</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
@endsection

