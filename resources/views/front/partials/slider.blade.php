   <section class="static-hero" id='div'>
       <div class="swiper-container">
           <div class="swiper-wrapper">
               @if(isset($bannerData) && count($bannerData) > 0)
               @foreach ($bannerData as $key=> $bannerDatas)
               <div class="swiper-slide">
                   <div class="slide-inner slide-bg-image" data-background="{{  asset('uploads/banner'.'/'.$bannerDatas->image)  }}">
                       <div class="gradient-overlay"></div>
                       <div class="container">
                           <div class="slide-content">
                               <div class="wpo-static-hero-inner">
                                   <div class="slide-sub-title">
                                       <h2>{{ $bannerDatas->title ??'' }}</h2>
                                   </div>
                                   <div class="slide-text">
                                       {!! $bannerDatas->description !!}
                                   </div>
                                   <div class="clearfix"></div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               @endforeach

               @else
               <p>No Banner available</p>

               @endif
           </div>
           <div class="swiper-pagination"></div>
           <div class="swiper-button-next"></div>
           <div class="swiper-button-prev"></div>
       </div>

   </section>
