<section class="wpo-appoinment-section">
    <div class="container">
        <div class="appoinment-wrap">
            <div class="row ">
                <div class="col-xl-5 col-lg-12 col-12">
                    <div class="appoinment-text">
                        <a href="#" class="appoinment-btn">Book Appoinment</a>
                        <h2>Schedule a free online consultation</h2>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12 col-12">
                    <div class="appoinment-right">
                        @session('success')
                            <div class="alert alert-success" role="alert">
                                {{ $value }}
                            </div>
                        @endsession

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form method="post" action="{{ url('appointment-book') }}" class="contact-validation-active">
                            @csrf
                            <div class="row">
                                <div class="form-field col-lg-6">
                                    <input class="form-control-name preventnumeric" minlength="2" maxlength="100"
                                        type="text" placeholder="Full Name" name="name" id="name" required>

                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-field col-lg-6">
                                    <input class="form-control-mail" type="email" minlength="2" maxlength="100"
                                        placeholder="Email" name="email" id="email" required>

                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-field col-lg-6">
                                    <input class="form-controls form-control-number mobile_no" minlength="10"
                                        maxlength="10" name="phone" type="tel" placeholder="Phone No." required>

                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-controls form-control-gender form-field col-lg-3">
                                    <select name="age" class="form-control" required>
                                        <option value="" disabled selected>Age</option>
                                        @for ($i = 1; $i <= 100; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor

                                    </select>
                                    @error('age')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-controls form-control-gender form-field col-lg-3">
                                    <select name="gender" class="form-control" required>
                                        <option value="" disabled selected>Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-control-age form-field col-lg-6">
                                    <div class="form-controls form-control-choose-department ">
                                        <select name="department" class="form-control department" required>
                                            <option value="" selected>Choose Department</option>
                                            @if (isset($bookapp) && count($bookapp) > 0)
                                                @foreach ($bookapp as $bookapps)
                                                    <option value="{{ $bookapps->id ?? '' }}">
                                                        {{ $bookapps->department ?? '' }}</option>
                                                @endforeach
                                            @endif
                                        </select>

                                        @error('department')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-control-age form-field col-lg-6">
                                    <div class="form-controls form-control-choose-department">
                                        <select name="doctor" class="form-control" id="doctor_value" required>


                                        </select>

                                        @error('doctor')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-control-age form-field col-lg-12">
                                    <input class="form-control-mail" type="date" placeholder="Date" name="date"
                                        required min="{{ \Carbon\Carbon::today()->toDateString() }}"
                                        max="{{ \Carbon\Carbon::today()->addMonth()->toDateString() }}">
                                    @error('date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <img id="captcha-image" src="{{ captcha_src() }}" alt="CAPTCHA"
                                                class="captcha-img">
                                            <button type="button" class="btn btn-secondary" id="refresh-captcha"
                                                style="float:right">
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                        </div>

                                        <div class="col-lg-6">
                                            <input type="text" name="captcha" class="form-control"
                                                placeholder="Enter CAPTCHA" required>

                                        </div>
                                    </div>
                                    @error('captcha')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-xl-7 col-lg-12 col-12">
                                    <div class="submit-area">
                                        <button type="submit" class="theme-btn mt-3">Book Appointment</button>

                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="shape-1">
                <img src="{{ asset('front/assets/images/appoinment-shape.png') }}" alt="">
            </div>
        </div>
    </div>





</section>
