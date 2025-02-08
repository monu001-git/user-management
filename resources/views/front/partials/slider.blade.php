   <section class="static-hero" id='div'>
       <div class="swiper-container">
           <div class="swiper-wrapper">
               @if (isset($bannerData) && count($bannerData) > 0)
                   @foreach ($bannerData as $key => $bannerDatas)
                       <div class="swiper-slide">
                           @if (!empty($bannerDatas->url))
                               <a
                                   @if ($bannerDatas->link_type != '0') href="{{ url($bannerDatas->url) }}" 
                            @else 
                                href="{{ $bannerDatas->url }}" 
                                onclick="return confirm('This link will take you to an external web site.')" 
                                target="_blank" @endif>
                           @endif
                           <div class="slide-inner slide-bg-image"
                               data-background="{{ asset('uploads/banner' . '/' . $bannerDatas->image) }}">
                               <div class="gradient-overlay"></div>
                               <div class="container">
                                   <div class="slide-content">
                                       <div class="wpo-static-hero-inner">
                                           <div class="slide-sub-title">
                                               <h2>{{ $bannerDatas->title ?? '' }}</h2>
                                           </div>
                                           <div class="slide-text">
                                               @if (!empty($bannerDatas->description))
                                                   {!! $bannerDatas->description ??'' !!}
                                               @endif
                                           </div>
                                           <div class="clearfix"></div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           @if (!empty($bannerDatas->url))
                               </a>
                           @endif
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
