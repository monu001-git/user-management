<section id="info-6" class="bg-blue info-section division">
    <!-- TEXT BLOCK -->
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 offset-lg-6 col-12">
                <div class="txt-block pc-30 white-color wow fadeInUp" data-wow-delay="0.4s"
                    style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">

                    @if (!empty($orgData->some_point))
                        {!! $orgData->some_point !!}
                    @else
                        <p>No point available</p>
                    @endif

                </div>
            </div>
        </div> <!-- End row -->
    </div> <!-- END TEXT BLOCK -->

    <!-- INFO-6 IMAGE -->
    @if (!empty($orgData->middle_image))
        <div class="text-center" style="background: url( {{ asset('uploads/middleimage/' . $orgData->middle_image) }});">
        </div>
    @else
        <div> Image not available</div>
    @endif


</section>
