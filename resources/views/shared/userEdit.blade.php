<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{route('users.update',$user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-4">
                    <img src="{{$user->getImageUrl()}}"
                        alt="Profile" title="picture here depends in your email check gravatar website"
                        class="rounded-circle" style="height:3rem">
                    <div>
                        <h3 class="card-title mb-0"><a href="#"> <input type="name" name="name"
                                    id="name" value="{{ $user->name }}" class="form-control" autocomplete="">
                            </a></h3>
                        @error('name')
                            <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror
                        <span class="fs-6 text-muted">@mario</span>
                    </div>
                </div>
                @auth
                    @if ($user->id === Auth::id())
                        <div>
                            <a href="{{ route('users.show', $user->id) }}"><i
                                    class="fas fa-info-circle fs-3 text-success"></i></a>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="mt-4">
                <label for="image">Add profile picture</label>
                <input id="image" name="image" type="file" class="form-control">
                @error('image')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <p class="fs-6 fw-light">
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3"> {{$user->bio}} </textarea>
                    @error('bio')
                        <span class="fs-6 d-block text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </p>
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $user->ideas->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $user->comments->count() }} </a>
                </div>
                @auth
                    @if ($user->id !== Auth::id())
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    @endif
                @endauth
            </div>
        </form>
    </div>
</div>
