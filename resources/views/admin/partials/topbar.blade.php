 <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
     <div class="container-fluid">
         <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
             <div class="input-group">
                 {{-- <div class="input-group-prepend">
                     <button type="submit" class="btn btn-search pe-1">
                         <i class="fa fa-search search-icon"></i>
                     </button>
                 </div>
                 <input type="text" placeholder="Search ..." class="form-control" /> --}}
             </div>
         </nav>

         <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

             <li class="nav-item topbar-user dropdown hidden-caret">
                 <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                     <div class="avatar-sm">
                         <img src="{{ asset('admin/assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle" />
                     </div>
                     <span class="profile-username">
                         <span class="op-7">Hi,</span>
                         <span class="fw-bold"> {{ auth()->user()->name ?? '' }}</span>
                     </span>
                 </a>
                 <ul class="dropdown-menu dropdown-user animated fadeIn">
                     <div class="dropdown-user-scroll scrollbar-outer">
                         <li>
                             <div class="user-box">
                                 <div class="avatar-lg">
                                     <img src="{{ asset('admin/assets/img/profile.jpg')}}" alt="image profile" class="avatar-img rounded" />
                                 </div>
                                 <div class="u-text">
                                     <h4> {{ auth()->user()->name ?? '' }}</h4>
                                     <p class="text-muted"> {{ auth()->user()->email ?? '' }}</p>
                                     <a href="{{ route('dashboard') }}" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                 </div>
                             </div>
                         </li>
                         <li>
                             <div class="dropdown-divider"></div>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                 @csrf
                                 <button class="dropdown-item" >Logout</button>
                             </form>
                         </li>
                     </div>
                 </ul>
             </li>
         </ul>
     </div>
 </nav>
