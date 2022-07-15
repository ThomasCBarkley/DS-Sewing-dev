<nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
    <div class="container">
        <!-- Branding Image -->
    {{--{{ route('admin.dashboard', config('app.name', 'Laravel'), [], ['class' => 'navbar-brand']) }}--}}

    <!-- Collapsed Hamburger -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            @include('admin/shared/sidebar')

            <div style="padding-top: 8px">
                <a href="{{ url('s/admin/logout') }}" style="color: rgba(255, 255, 255, 0.55); text-decoration: none;"
                   class=""
                   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </div>
            <form id="logout-form" class="d-none" action="{{ url('s/admin/logout') }}" method="POST">
                @csrf
            </form>
        </div>
    </div>
</nav>

