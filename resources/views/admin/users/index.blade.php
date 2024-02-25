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
                <h1>Users</h1>
                <table class="table table-striped table-bordered mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined At</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="fs-6">{{ $user->id }}</td>
                                <td class="fs-6">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="fs-6">{{ $user->created_at->toDateString() }}</td>
                                <td>
                                    <a href="{{ route('usres.show', $user) }}"><i class="fa fa-solid fa-plus"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.users.edit',$user) }}" method="POST">
                                        @csrf
                                        <button type="submit"><i class="fas fa-edit fs-4 text-info"></button>
                                    </form>
                                    <a href="{{ route('admin.users.show') }}"><i
                                            class="fas fa-info-circle fs-4 text-success"></a>
                                    <form action="{{ route('admin.users.delete') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">x</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
