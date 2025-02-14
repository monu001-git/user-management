  <section class="certificate">
      <div class="container">
          <div class="wpo-contact-area ex-wiget certificate">
              <div class="certificate-slider owl-carousel owl-theme">
                  @if (isset($galleryDataCar) && count($galleryDataCar) > 0)
                      @foreach ($galleryDataCar['gallerydetailData'] as $galleryCar)
                          <div class="notice-block-two">
                              <div class="certificate-img">
                                  <div class="img-holder">
                                      <a href="{{ asset('uploads/content/image' . '/' . $galleryCar->image) ?? '' }}"
                                          class="fancybox" data-fancybox-group="gall-1">
                                          <img src="{{ asset('uploads/content/image' . '/' . $galleryCar->image) ?? '' }}"
                                              alt class="img img-responsive">
                                          <div class="hover-content">
                                              <i class="ti-plus"></i>
                                          </div>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  @else
                      <p>No certificate items available.</p>

                  @endif
              </div>
          </div>
      </div>
  </section>
