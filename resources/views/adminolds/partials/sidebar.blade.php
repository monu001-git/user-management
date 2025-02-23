 <!-- Sidebar -->

 <div class="sidebar" data-background-color="dark">

     {{-- <div class="sidebar-logo">

         <div class="logo-header" data-background-color="dark">

             <a href="{{ url('/') }}" class="logo">

                 <img src="{{ asset('uploads/logo/headerlogo' . '/' . $orgData->header_logo ?? '') }}" alt="navbar brand"

                     class="navbar-brand" height="20" />

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



     </div> --}}

     <div class="sidebar-wrapper scrollbar scrollbar-inner">



         <div class="sidebar-content">



             @if (isset($orgData->header_logo) && $orgData->header_logo != null)

                 <a href="{{ url('/') }}" class="logo">

                     <img src="{{ asset('uploads/logo/headerlogo' . '/' . $orgData->header_logo ?? '') }}"

                         alt="navbar brand" class="navbar-brand" height="20" />

                 </a>

             @endif

             <ul class="nav nav-secondary">



                 @guest



                     @if (Route::has('login'))

                         <li class="nav-item">

                             <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                         </li>

                     @endif



                     {{-- @if (Route::has('register'))

                 <li class="nav-item">

                     <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

                 </li>

                 @endif --}}

                 @else

                     @can('user-list')

                         <li

                             class="nav-item {{ request()->routeIs('users.index', 'users.create', 'users.edit') ? 'active' : '' }}">

                             <a href="{{ route('users.index') }}">

                                 <i class="fas fa-user"></i>

                                 <p>Manage Users</p>

                             </a>

                         </li>

                     @endcan



                     @can('role-list')

                         <li

                             class="nav-item {{ request()->routeIs('roles.index', 'roles.create', 'roles.edit') ? 'active' : '' }}">

                             <a href="{{ route('roles.index') }}">

                                 <i class="fas fa-id-card"></i>

                                 <p>Manage Role</p>

                             </a>

                         </li>

                     @endcan



                     @can('banner-list')

                         <li

                             class="nav-item {{ request()->routeIs('banners.index', 'banners.create', 'banners.edit') ? 'active' : '' }}">

                             <a href="{{ route('banners.index') }}">

                                 <i class="fas fa-rss-square"></i>

                                 <p>Manage Banner</p>

                             </a>

                         </li>

                     @endcan





                     @can('org-list')

                         <li

                             class="nav-item {{ request()->routeIs('orgs.index', 'orgs.create', 'orgs.edit') ? 'active' : '' }}">

                             <a href="{{ route('orgs.index') }}">

                                 <i class="fas fa-qrcode"></i>

                                 <p>Manage Organization </p>

                             </a>

                         </li>

                     @endcan




                     @can('content-list')

                         <li

                             class="nav-item {{ request()->routeIs('contents.index', 'contents.create', 'contents.edit') ? 'active' : '' }}">

                             <a href="{{ route('contents.index') }}">

                                 <i class="fas fa-id-card"></i>

                                 <p>Manage Page</p>

                             </a>

                         </li>

                     @endcan





                     @can('menu-list')

                         <li

                             class="nav-item {{ request()->routeIs('menus.index', 'menus.create', 'menus.edit') ? 'active' : '' }}">

                             <a href="{{ route('menus.index') }}">

                                 <i class="fas fa-money-check"></i>

                                 <p>Manage Menu</p>

                             </a>

                         </li>

                     @endcan



                     @can('team-list')

                         <li

                             class="nav-item {{ request()->routeIs('teams.index', 'teams.create', 'teams.edit') ? 'active' : '' }}">

                             <a href="{{ route('teams.index') }}">

                                 <i class="fas fa-qrcode"></i>

                                 <p>Manage Team </p>

                             </a>

                         </li>

                     @endcan



                     @can('gallery-list')

                         <li

                             class="nav-item {{ request()->routeIs('gallery.index', 'gallery.create', 'gallery.edit') ? 'active' : '' }}">

                             <a href="{{ route('gallery.index') }}">

                                 <i class="fas fa-image"></i>

                                 <p>Manage Gallery</p>

                             </a>

                         </li>

                     @endcan







                     @can('specialitie-list')

                         <li

                             class="nav-item {{ request()->routeIs('specialities.index', 'specialities.create', 'specialities.edit') ? 'active' : '' }}">

                             <a href="{{ route('specialities.index') }}">

                                 <i class="fas fa-image"></i>

                                 <p>Manage Specialitie</p>

                             </a>

                         </li>

                     @endcan

                     @can('faq-list')

                         <li

                             class="nav-item {{ request()->routeIs('faqs.index', 'faqs.create', 'faqs.edit') ? 'active' : '' }}">

                             <a href="{{ route('faqs.index') }}">

                                 <i class="fas fa-image"></i>

                                 <p>Manage Faq</p>

                             </a>

                         </li>

                     @endcan



                     @can('testimonial-list')

                         <li

                             class="nav-item {{ request()->routeIs('testimonials.index', 'testimonials.create', 'testimonials.edit') ? 'active' : '' }}">

                             <a href="{{ route('testimonials.index') }}">

                                 <i class="fas fa-image"></i>

                                 <p>Manage Testimonial</p>

                             </a>

                         </li>

                     @endcan



                     @can('appointment-list')

                         <li class="nav-item {{ request()->routeIs('appointments.index') ? 'active' : '' }}">

                             <a href="{{ route('appointments.index') }}">

                                 <i class="fas fa-image"></i>

                                 <p>Manage Appointment </p>

                             </a>

                         </li>

                     @endcan






                  

                         @if (auth()->id() === 1)

                             <li class="nav-item {{ request()->is('log') ? 'active' : '' }}">

                                 <a href="{{ url('log') }}">

                                     <i class="fas fa-image"></i>

                                     <p>Manage Log</p>

                                 </a>

                             </li>

                         @endif

                
                 @endguest



             </ul>

         </div>

     </div>

 </div>

 <!-- End Sidebar -->

