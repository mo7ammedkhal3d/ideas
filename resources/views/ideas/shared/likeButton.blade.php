@auth
    @if ($idea->isLiker(Auth::user()))
        <div>
            <form action="{{ route('idea.unlike', $idea->id) }}" method="POST">
                @csrf
                <button type="submit" href="" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes_count}} </button>
            </form>
        </div>
    @else
        <div>
            <form action="{{ route('idea.like', $idea->id) }}" method="POST">
                @csrf
                <button type="submit" href="" class="fw-light nav-link fs-6"> <span
                        class="far fa-heart me-1">
                    </span> {{ $idea->likes->count() }} </button>
            </form>
        </div>
    @endif
@endauth
@guest
    <div>
        <form action="{{ route('idea.like', $idea->id) }}" method="POST">
            @csrf
            <button type="submit" href="" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                </span> {{ $idea->likes->count() }} </button>
        </form>
    </div>
@endguest
