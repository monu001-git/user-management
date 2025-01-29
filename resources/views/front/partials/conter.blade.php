        <section class="wpo-fun-fact-section section-padding pt-0 counter-box-sec">
            <div class="container new-width">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="counter-box">
                            <div class="info">
                                <h3>
                                    <span class="odometer number" data-count="{{ $orgData->number_count1 ??''  }}">00</span>{{ $orgData->unit_count1 ??''   }}
                                </h3>
                                 <p>{{ $orgData->text_count1  ??'' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="counter-box">
                            <div class="info">
                                <h3>
                                    <span class="odometer number" data-count="{{ $orgData->number_count2 ??""  }}">00</span>{{ $orgData->unit_count2 ??''  }}
                                </h3>
                                 <p>{{ $orgData->text_count2  ??'' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="counter-box">
                            <div class="info">
                                <h3>
                                    <span class="odometer number" data-count="{{ $orgData->number_count3  ??'' }}">00</span>{{ $orgData->unit_count3 ??''  }}
                                </h3>
                                <p>{{ $orgData->text_count3  ??'' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="counter-box">
                            <div class="info">
                                <h3>
                                    <span class="odometer number" data-count="{{ $orgData->number_count4  ??"" }}">00</span>{{ $orgData->unit_count4 ??''  }}
                                </h3>
                                 <p>{{ $orgData->text_count4  ??'' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center subtitle-white">
                    <div class="col-xl-7 col-lg-7 col-md-7 col-12 text-center">
                        <h6>{{ $orgData->count_heading ??'' }}</h6>
                        <a href="{{ $orgData->count_phone ??'' }}"><img src="{{ asset('front/assets/images/icon/call-btn.svg') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </section>
