@extends('layouts.layout')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.sideLinkes')
            </div>
            <div class="col-6">
                <div class="mt-3">
                    @include('shared.ideaCard')
                </div>
            </div>
            <div class="col-3">
                @include('shared.searchSection')
                @include('shared.followingList')
            </div>
        </div>
    </div>
@endsection
