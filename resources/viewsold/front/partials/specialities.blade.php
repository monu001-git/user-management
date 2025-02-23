  <!-- start wpo-department-section -->
  <section class="wpo-department-section section-padding">
      <div class="container prk">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="wpo-section-title">
                      <span>{{ $orgData->specialities_title ?? '' }}</span>
                      <h2>{{ $orgData->specialities_heading ?? '' }}</h2>

                      @if (!empty($orgData->specialities_description1))
                          {!! substr_replace($orgData->specialities_description1, '', 600) !!}
                      @else
                          <p>No description available</p>
                      @endif
                  </div>
              </div>
          </div>
          <div class="row justify-content-center">

              @if (isset($specialitieData) && count($specialitieData) > 0)
                  @foreach ($specialitieData as $specialitieDatas)
                      <div class="col-lg-4">
                          <div class="card">
                              <img class="card-img-new"
                                  src="{{ asset('uploads/specialitie' . '/' . $specialitieDatas->image) }}" />

                              <div class="card-body">
                                  <h4 class="card-title">{{ $specialitieDatas->title ?? '' }}</h4>
                                  @if (!empty($specialitieDatas->description))
                                      {!! substr_replace($specialitieDatas->description, '', 100) !!}
                                  @else
                                      <p>No description available</p>
                                  @endif

                                  <a  @if (!empty($specialitieDatas->url))  href="{{ $specialitieDatas->url ?? '' }}" @endif class="btn btn-info">Learn More</a>
                              </div>
                          </div>
                      </div>
                  @endforeach
              @endif


              <div class="row justify-content-center">
                  <div class="col-xl-7 col-lg-7 col-md-7 col-12 text-center">
                      <h6>
                          @if (!empty($orgData->specialities_description2))
                              {!! substr_replace($orgData->specialities_description2, '', 600) !!}
                          @else
                              No description available
                          @endif
                      </h6>
                      <a href="tel:{{ $orgData->specialities_phone ?? '' }}"><img
                              src="{{ asset('front/assets/images/icon/call-btn.svg') }}" alt=""></a>
                  </div>
              </div>
          </div>
  </section>
  <!-- end wpo-department-section -->
