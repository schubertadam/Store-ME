<div class="sidenav-menu-heading">Navigation</div>
<a class="nav-link" href="{{ route('dashboard') }}">
    <div class="nav-link-icon"><i data-feather="activity"></i></div>
    Dashboard
</a>

@role('administrator')
<div class="sidenav-menu-heading">Administrator</div>
<a class="nav-link" href="">
    <div class="nav-link-icon"><i data-feather="users"></i></div>
    User management
</a>
@endrole
