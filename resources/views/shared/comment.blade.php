<div>
    <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="comment-text" class="fs-6 form-control" rows="1"></textarea>
            @error('comment-text')
                <span class="fs-6 d-block text-danger"> {{ $message }} </span>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @foreach ($idea->comments->sortByDesc('created_at') as $comment)
        <div class="d-flex align-items-start mb-3 idea-comments gap-2">
            <img src="{{ $comment->user->getImageUrl() }}" alt="Profile" class="rounded-circle" style="height:3rem">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6><a href="{{ route('profile', $comment->user->id) }}">{{ $comment->user->name }}</a></h6>
                    <small class="fs-6 fw-light text-muted">
                        <script>
                            var postedDate = "{{ $comment->created_at }}";
                            var adjustedDate = moment(postedDate).add(3, 'hours');
                            document.write(adjustedDate.fromNow());
                        </script>
                    </small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @endforeach
</div>
