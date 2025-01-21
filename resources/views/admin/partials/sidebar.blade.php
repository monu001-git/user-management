 <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
     <div class="sidebar-logo">
         <!-- Logo Header -->
         <div class="logo-header" data-background-color="dark">
             <a href="{{ url('/home') }}" class="logo">
               {{-- <img src="{{ asset('admin/assets/img/kaiadmin/logo_light.svg')}}" alt="navbar brand" class="navbar-brand" height="20" /> --}}
             </a>
             <div class="nav-toggle">
                 <button class="btn btn-toggle toggle-sidebar">
                     <i class="gg-menu-right"></i>
                 </button>
                 <button class="btn btn-toggle sidenav-toggler">
                     <i class="gg-menu-left"></i>
                 </button>
             </div>
             <button class="topbar-toggler more">
                 <i class="gg-more-vertical-alt"></i>
             </button>
         </div>
         <!-- End Logo Header -->
     </div>
     <div class="sidebar-wrapper scrollbar scrollbar-inner">
         <div class="sidebar-content">
             <ul class="nav nav-secondary">

                 @guest
                 @if (Route::has('login'))
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                 </li>
                 @endif

                 @if (Route::has('register'))
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                 </li>
                 @endif

                 @else

                 <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                     <a href="{{ route('home') }}">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>


                 <li class="nav-item {{ request()->routeIs('users.index','users.create', 'users.edit') ? 'active' : '' }}">
                     <a href="{{ route('users.index') }}">
                         <i class="fas fa-user"></i>
                         <p>Manage Users</p>
                     </a>
                 </li>

                 <li class="nav-item {{ request()->routeIs('roles.index', 'roles.create', 'roles.edit') ? 'active' : '' }}">
                     <a href="{{ route('roles.index') }}">
                         <i class="fas fa-id-card"></i>
                         <p>Manage Role</p>
                     </a>
                 </li>
                 <li class="nav-item {{ request()->routeIs('menus.index', 'menus.create', 'menus.edit') ? 'active' : '' }}">
                     <a href="{{ route('menus.index') }}">
                         <i class="fas fa-money-check"></i>
                         <p>Manage Menu</p>
                     </a>
                 </li>
                 <li class="nav-item {{ request()->routeIs('banners.index', 'banners.create', 'banners.edit') ? 'active' : '' }}">
                     <a href="{{ route('banners.index') }}">
                         <i class="fas fa-rss-square"></i>
                         <p>Manage Banner</p>
                     </a>
                 </li>
                 <li class="nav-item {{ request()->routeIs('orgs.index', 'orgs.create', 'orgs.edit') ? 'active' : '' }}">
                     <a href="{{ route('orgs.index') }}">
                         <i class="fas fa-qrcode"></i>
                         <p>Manage Organization </p>
                     </a>
                 </li>
                 <li class="nav-item {{ request()->routeIs('contents.index', 'contents.create', 'contents.edit') ? 'active' : '' }}">
                     <a href="{{ route('contents.index') }}">
                         <i class="fas fa-id-card"></i>
                         <p>Manage Content</p>
                     </a>
                 </li>

                 <li class="nav-item {{ request()->routeIs('gallery.index', 'gallery.create', 'gallery.edit') ? 'active' : '' }}">
                     <a href="{{ route('gallery.index') }}">
                         <i class="fas fa-image"></i>
                         <p>Manage Gallery</p>
                     </a>
                 </li>

                 @endguest



                 {{-- <li class="nav-item active">
                            <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="dashboard">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="../demo1/index.html">
                                            <span class="sub-item">Dashboard 1</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
             </ul>
         </div>
     </div>
 </div>
 <!-- End Sidebar -->
