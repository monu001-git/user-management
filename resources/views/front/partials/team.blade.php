        <!-- Team-section -->
        <section class="team-department-section-s2 section-padding pb-10">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="team-section-title">
                            <span>{{ $orgData->team_title ??'' }}</span>
                            <h2>{{ $orgData->team_heading ??'' }} </h2>
                            <p>

                                @if(!empty($orgData->team_description1))
                                {!! $orgData->team_description1 !!}
                                @else
                                <p>No description available</p>
                                @endif


                            </p>
                        </div>
                    </div>
                </div>
                <div class="department-wrap">
                    <div class="department-doctor-wrap mt-0 spty team">
                        <div class="team-slider owl-carousel owl-theme">
                            @if(isset($teamData) && count($teamData) > 0) @foreach ($teamData as $teams) <div class="notice-block-two">
                                <div class="team-single">
                                    <div class="team-boder-shapes-1">
                                        <div class="team-single-img">
                                            <img src="{{ asset('team/image'.'/'.$teams->image ) }}" alt="">
                                        </div>
                                        <div class="team-single-text">
                                            <h2><a href="dr-v-p-singh.php">{{ $teams->name ?? " " }}</a></h2>
                                            <span>{{ $teams->specialization ?? " " }}</span>
                                            <p>{{ $teams->qualification ?? " " }}</p>
                                            <p>{{ $teams->designation ?? " " }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @else
                            <p>No Doctor Detail available.</p>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-7 col-md-7 col-12 text-center department-wrap1">
                        <h6>


                            @if(!empty($orgData->team_description2))
                            {!! $orgData->team_description2 !!}
                            @else
                            <p>No description available</p>
                            @endif


                        </h6>
                        <a href="tel:{{ $orgData->team_phone ?? '' }}" ><img src="{{ asset('front/assets/images/icon/call-btn1.svg') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team-section end-->
