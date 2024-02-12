@extends('layouts.layout')
@section('title','Terms')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.sideLinkes')
            </div>
            <div class="col-6">
                <h1>Terms</h1>
                <p>Lorem ipsum, dolor sit amet consectetur
                    adipisicing elit. Nihil nemo maiores,
                    recusandae cupiditate quos, debitis aspernatur ducimus magnam dolores quidem eaque soluta perspiciatis.
                    Voluptatem
                    modi maiores quasi ullam ipsum necessitatibus.</p>
            </div>
            <div class="col-3">
                @include('shared.searchSection')
                @include('shared.followingList')
            </div>
        </div>
    </div>
@endsection
