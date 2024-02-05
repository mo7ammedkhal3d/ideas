<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $idea->user->name }}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div class="d-flex gap-2 flex-row align-items-center">
                @auth
                    @if (Auth::user()->id == $idea->user_id)
                        <a href="{{ route('idea.edit', $idea->id) }}"><i class="fas fa-edit fs-3 text-info"></i></a>
                    @endif
                    <a href="{{ route('idea.show', $idea->id) }}"><i class="fas fa-info-circle fs-3 text-success"></i></a>
                @endauth
                <form action="{{ route('idea.destroy', $idea->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('idea.update', $idea->id) }}" method="POST">
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
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    <script>
                        var postedDate = "{{ $idea->created_at }}";
                        document.write(moment(postedDate).fromNow());
                    </script>
                </span>
            </div>
        </div>
        @include('shared.comment')
    </div>
</div>
