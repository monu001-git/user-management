  <section class="certificate">
      <div class="container">
          <div class="wpo-contact-area ex-wiget certificate">
              <div class="certificate-slider owl-carousel owl-theme">
                  @if(isset($galleryDataCar))
            
                  @foreach ( $galleryDataCar['gallerydetailData'] as $galleryCar)
                  
                    <div class="notice-block-two">
                        <div class="certificate-img">
                            <div class="img-holder">
                              <a href="{{ asset('uploads/content/image'.'/'.$galleryCar->file) ??'' }}" class="fancybox" data-fancybox-group="gall-1">
                                  <img src="{{ asset('uploads/content/image'.'/'.$galleryCar->file) ??'' }}" alt class="img img-responsive">
                                  <div class="hover-content">
                                      <i class="ti-plus"></i>
                                  </div>
                              </a>
                            </div>
                        </div>
                    </div>
                  @endforeach
                  @endif
              </div>
          </div>
      </div>
      <!--div class="container certificate-width">
               <div class="row justify-content-center">
                  <div class="col col-lg-3 col-md-3 col-sm-3 col-6">
                     <div class="box-certificate">
                        <img src="assets/images/certificates/medicine.svg"/>
                     </div>
                  </div>
                  <div class="col col-lg-3 col-md-3 col-sm-3 col-6">
                     <div class="box-certificate"> <img src="assets/images/certificates/cer-2.svg"/></div>
                  </div>
                  <div class="col col-lg-3 col-md-3 col-sm-3 col-6">
                     <div class="box-certificate"><img src="assets/images/certificates/medicine.svg"/></div>
                  </div>
                  <div class="col col-lg-3 col-md-3 col-sm-3 col-6">
                     <div class="box-certificate"><img src="assets/images/certificates/cer-3.svg"/></div>
                  </div>
               </div>
            </div -->
  </section>
