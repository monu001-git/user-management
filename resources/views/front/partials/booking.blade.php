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
                        <form method="post" action="{{ url('appointment-book') }}" class="contact-validation-active">
                            @csrf
                            <div class="row">
                                <div class="form-field col-lg-6">
                                    <input class="form-control-name " type="text" placeholder="Full Name" name="name" id="name" required >
                                </div>
                                <div class="form-field col-lg-6">
                                    <input class="form-control-mail" type="email" placeholder="Email" name="email" id="email" required>
                                </div> 
                                <div class="form-field col-lg-6">
                                    <input class="form-controls form-control-number" name="phone" type="tel" placeholder="Phone No." required >
                                </div>
                                <div class="form-control-age form-field col-lg-3">
                                    <input class="form-controls form-control-number" name="age" type="text" id="age" placeholder="Age"  required>
                                </div>
                                <div class="form-controls form-control-gender form-field col-lg-3">
                                    <select name="gender" class="form-control" required>
                                        <option value="0" disabled selected>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-control-age form-field col-lg-6">
                                    <div class="form-controls form-control-choose-department">
                                        <select name="department" class="form-control" required>
                                            <option value="0" disabled selected>Choose Department</option>
                                            <option value="Robotic Laparoscopic Surgery">Robotic Laparoscopic Surgery</option>
                                            <option value="Laser Treatment">Laser Treatment</option>
                                            <option value="General Physician">General Physician</option>
                                            <option value="Aesthetics Surgeries">Aesthetics Surgeries</option>
                                            <option value="Life style">Life style</option>
                                            <option value="Gynaecology & Obstetrics">Gynaecology & Obstetrics</option>
                                            <option value="Healthy Food">Healthy Food</option>
                                            <option value="Pharmacy">Pharmacy</option>
                                            <option value="CSR BY DDF">CSR BY DDF</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-control-age form-field col-lg-6">
                                    <input class="form-control-mail" type="date" placeholder="Date" name="date" required >
                                </div>

                                <div class="col-xl-7 col-lg-12 col-12">
                                    <div class="submit-area">
                                        <button type="submit" class="theme-btn">Book Appointment</button>
                                        {{-- <div id="loader">
                                            <i class="ti-reload"></i>
                                        </div> --}}
                                    </div>
                                </div>
                                {{-- <div class="clearfix error-handling-messages">
                                    <div id="success">Thank you for getting in touch! Your appointment has been successfully booked.</div>
                                    <div id="error"> Error occurred while sending email. Please try again later.</div>
                                </div> --}}
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
