<ul class="navbar-nav navbar-sidenav">
    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link {{ request()->route()->named('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Posts">
        <a class="nav-link {{ request()->route()->named('admin.posts.*') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">Posts</span>
        </a>
    </li>

    {{--<li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Media">--}}
        {{--<a class="nav-link {{ request()->route()->named('admin.media.*') ? 'active' : '' }}" href="#">--}}
            {{--<i class="fa fa-file" aria-hidden="true"></i>&nbsp;--}}
            {{--<span class="nav-link-text">Media</span>--}}
        {{--</a>--}}
    {{--</li>--}}

</ul>

<ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
        </a>
    </li>
</ul>
