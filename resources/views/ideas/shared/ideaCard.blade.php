<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <img src="{{ $idea->user->getImageUrl() }}" alt="Profile" class="rounded-circle" style="height:3rem">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div class="d-flex gap-2 flex-row align-items-center">
                @auth
                    @if (Auth::user()->id == $idea->user_id)
                        <a href="{{ route('ideas.edit', $idea->id) }}"><i class="fas fa-edit fs-4 text-info"></i></a>
                    @endif
                    <a href="{{ route('ideas.show', $idea->id) }}"><i class="fas fa-info-circle fs-4 text-success"></i></a>
                    @if (Auth::user()->id == $idea->user_id)
                        <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">X</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class="fs-6 d-block text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark btn-sm"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.likeButton')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                   {{ $idea->created_at->diffForHumans()}}
                </span>
            </div>
        </div>
        @include('shared.comment')
    </div>
</div>
