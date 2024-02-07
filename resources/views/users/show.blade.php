@extends('layouts.layout')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.sideLinkes')
            </div>
            <div class="col-6">
                @include('shared.successMessage')
                <div class="mt-3">
                    @if ($editing ?? false)
                        @include('shared.userEdit')
                    @else
                        @include('shared.userCard')
                    @endif
                </div>
                <hr>
                @forelse ($ideas as $idea)
                    <div class="mt-3">
                        @include('shared.ideaCard')
                    </div>
                @empty
                    <h1 class="text-center mb-4">No result found 🥲</h1>
                @endforelse
                <div class="mt-4">
                    {{ $ideas->withQueryString()->links() }}
                </div>
            </div>
            <div class="col-3">
                @include('shared.searchSection')
                @include('shared.followingList')
            </div>
        </div>
    </div>
@endsection
