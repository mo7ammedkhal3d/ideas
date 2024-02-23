<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : '' }} "
                    href="{{ route('admin.dashboard') }}">
                    <span>Dashboard</span></a>
            </li>
        </ul>
    </div>
    @auth
        <div class="card-footer text-center py-2">
            <a class="btn btn-link btn-sm" href="{{ route('profile', Auth::id()) }}">View Profile </a>
        </div>
    @endauth
</div>
