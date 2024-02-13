<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-4">
                <img src="{{ $user->getImageUrl() }}" alt="Profile" class="rounded-circle" style="height:3rem">
                <div>
                    <h4 class="card-title mb-0"><a href="#"> {{ $user->name }}
                        </a></h4>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>
            @can('update', $user)
                <div>
                    <a href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit fs-4 text-info"></i></a>
                </div>
            @endcan
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            @include('users.shared.userStats')
            @auth
                @if (Auth::user()->isNot($user))
                    <div class="mt-3">
                        @if (Auth::user()->follows($user))
                            <form action="{{ route('users.unfollow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"> Unfollow </button>
                            </form>
                        @else
                            <form action="{{ route('users.follow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                            </form>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
<hr>
