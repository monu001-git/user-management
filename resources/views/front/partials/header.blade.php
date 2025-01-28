  <!-- Start header -->
  <header id="header">
      <div class="wpo-site-header">
          <nav class="navigation navbar navbar-expand-lg navbar-light">
              <div class="container">
                  <div class="row align-items-center justify-content-center">
                      <div class="col-lg-3 col-md-3 col-2 d-lg-none dl-block">
                          <div class="mobail-menu">
                              <button type="button" class="navbar-toggler open-btn">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="icon-bar first-angle"></span>
                                  <span class="icon-bar middle-angle"></span>
                                  <span class="icon-bar last-angle"></span>
                              </button>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-6">
                          <div class="navbar-header">
                              @if(isset($orgData->header_logo))
                              <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('uploads/logo/headerlogo'.'/'.$orgData->header_logo) }}" title="{{ $orgData->header_logo_title ??"" }}"></a>
                              @endif
                          </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-1">
                          <div id="navbar" class="collapse navbar-collapse navigation-holder">
                              <a class="navbar-brand d-lg-none mlogo" href="{{ url('/') }}"><img src="{{ asset('front/assets/images/logo.svg') }}" alt=""></a>
                              <button class="menu-close"><i class="ti-close"></i></button>
                              <ul class="nav navbar-nav mb-2 mb-lg-0">

                                  @if(isset($headerMenu) && count($headerMenu) > 0)
                                  @foreach ($headerMenu as $headerMenu)
                                  @if (isset($headerMenu->children) && count($headerMenu->children) > 0)
                                  <li class="menu-item-has-children">
                                      <a>{{ $headerMenu->name ?? ""  }}<span class="dwn"><svg xmlns="http://www.w3.org/2000/svg" width="10.121" height="6.121" viewBox="0 0 10.121 6.121">
                                                  <g transform="translate(-1181.797 -99.44)">
                                                      <line x2="3.786" y2="4" transform="translate(1182.857 100.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="1.5" />
                                                      <line x1="4.214" y2="4" transform="translate(1186.643 100.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="1.5" />
                                                  </g>
                                              </svg></span></a>
                                      <ul class="sub-menu">
                                          @foreach ($headerMenu->children as $subMenu)
                                          <li><a @if($subMenu->link_type != "0") href="{{ $subMenu->url ?? "" }}" @else target="_blank" href="{{ url($subMenu->url ??'')  }}" @endif>{{ $subMenu->name  ??""}}</a></li>
                                          @endforeach
                                      </ul>
                                  </li>
                                  @else


                                  <li><a @if($headerMenu->link_type != "0") href="{{ $headerMenu->url ??"" }}" @else target="_blank" href="{{ url($headerMenu->url ??'')  }}" @endif>{{ $headerMenu->name  ??""}}</a> </li>

                                  @endif

                                  @endforeach
                                  @else
                                  <p>No menu items available.</p>
                                  @endif



                                  <div class="rk d-lg-none">
                                      <ul>
                                          <li><i class="fi flaticon-placeholder"></i>
                                              {{ $orgData->address ?? "" }}
                                          </li>
                                          <li><i class="fi flaticon-phone-call"></i>{{ $orgData->phone ?? "" }} </li>
                                          <li><i class="fi flaticon-email"></i>{{ $orgData->email ??""  }}</li>
                                      </ul>
                                      <p class="copyright">© Copyright 2024-2025, All Rights Reserved<br> by Gunjan Clininc
                                          <br> Designed by <a href="" style="color:#02aa7e;">graphotive</a>
                                      </p>
                                  </div>


                              </ul>

                          </div>
                          <!-- end of nav-collapse -->
                      </div>
                      <div class="col-lg-1 col-md-1 col-4 p-0">
                          <div class="header-right">
                              <div class="header-search-form-wrapper">
                                  <div class="cart-search-contact">
                                      <a href="https://wa.me/919711010235?text=Hello" target="_blank" class="search-toggle-btn"><img src="{{ asset('front/assets/images/icon/whataApp.svg') }}"></a>
                                     
            
                                      <a class="search-toggle-btn story" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{ asset('front/assets/images/icon/subtraction.svg') }}"></a>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- end of container -->
          </nav>
      </div>
  </header>
  <!-- end of header -->
