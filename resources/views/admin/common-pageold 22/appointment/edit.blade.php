@extends('admin.layouts.app')

@section('content')


    @if (count($errors) > 0)
        <div class="alert alert-danger text-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="page-inner">
        <div class="page-header">

            <h3 class="fw-bold mb-3">Appointment book Management</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a>
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Appointment book Update Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('appointments.update', dEncrypt($appointment->id)) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name *:</strong>
                                        <input class="form-control preventnumeric" value="{{ $appointment->name ?? '' }}"
                                            minlength="2" maxlength="100" type="text" placeholder="Full Name"
                                            name="name" id="name" required>

                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input class="form-control" type="email" minlength="2" maxlength="100"
                                            value="{{ $appointment->email ?? '' }}" placeholder="Email" name="email"
                                            id="email" required>

                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Phone:</strong>
                                            <input class="form-control mobile_no" minlength="10"
                                                value="{{ $appointment->phone ?? '' }}" maxlength="10" name="phone"
                                                type="tel" placeholder="Phone No." required>

                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Age:</strong>
                                            <br />
                                            <select name="age" class="form-control" required>
                                                <option value="" disabled selected>Age</option>
                                                @for ($i = 1; $i <= 100; $i++)
                                                    <option {{ old('age', $appointment->age) == $i ? 'selected' : '' }}
                                                        value="{{ $i }}">{{ $i }}</option>
                                                @endfor

                                            </select>
                                            @error('age')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Gender *:</strong>
                                            <select name="gender" class="form-control" required>
                                                <option value="" disabled selected>Gender</option>
                                                <option
                                                    {{ old('gender', $appointment->gender) == 'male' ? 'selected' : '' }}
                                                    value="male">Male</option>
                                                <option
                                                    {{ old('gender', $appointment->gender) == 'female' ? 'selected' : '' }}
                                                    value="female">Female</option>
                                                <option
                                                    {{ old('gender', $appointment->gender) == 'other' ? 'selected' : '' }}
                                                    value="other">Other</option>
                                            </select>
                                            @error('gender')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>




                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Department *:</strong>
                                            <select name="department" class="form-control department" required>
                                                <option value="" selected>Choose Department</option>
                                                @if (isset($bookapp) && count($bookapp) > 0)
                                                    @foreach ($bookapp as $bookapps)
                                                        <option
                                                            {{ old('department', $appointment->department) == $bookapps->id ? 'selected' : '' }}
                                                            value="{{ $bookapps->id ?? '' }}">
                                                            {{ $bookapps->department ?? '' }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('department')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Doctor *:</strong>
                                            <select name="doctor" class="form-control" id="doctor_value" required>


                                            </select>

                                            @error('doctor')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Status :</strong>
                                            <select name="status" class="form-control">
                                                <option value="" disabled selected>Gender</option>
                                                <option
                                                    {{ old('status', $appointment->status) == 'pending' ? 'selected' : '' }}
                                                    value="pending">Pending</option>
                                                <option
                                                    {{ old('status', $appointment->status) == 'booked' ? 'selected' : '' }}
                                                    value="booked">Booked</option>
                                                <option
                                                    {{ old('status', $appointment->status) == 'completed' ? 'selected' : '' }}
                                                    value="completed">Completed</option>
                                                <option
                                                    {{ old('status', $appointment->status) == 'cancelled' ? 'selected' : '' }}
                                                    value="cancelled">Cancelled</option>

                                            </select>
                                            @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                  

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Date *:</strong>
                                            <input class="form-control" type="date" placeholder="Date"
                                                value="{{ $appointment->date }}" name="date" required
                                                min="{{ \Carbon\Carbon::today()->toDateString() }}"
                                                max="{{ \Carbon\Carbon::today()->addMonth()->toDateString() }}">
                                            @error('date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="card-action">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a class="btn btn-danger" href="{{ route('banners.index') }}"> Back</a>
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function() {
            var initialDepartmentId = $(".department").val();
            if (initialDepartmentId) {
                loadDoctors(initialDepartmentId);
            }
        });

        $(".department").change(function(e) {
            var selectedDepartmentId = $(this).val();
            loadDoctors(selectedDepartmentId);
        });

        function loadDoctors(departmentId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('doctor-lists') }}",          
                type: "GET",
                data: {
                    id: departmentId
                },
                success: function(data) {


                    var resdata = data.doctor;
                    var formoption = "<option value=''>Please select a doctor</option>";

                    var selectedDoctorId = @json($appointment->doctor);

                    for (var i = 0; i < resdata.length; i++) {
                        var doctorId = resdata[i].id;
                        var doctorName = resdata[i].name;


                        var isSelected = (parseInt(doctorId) === parseInt(selectedDoctorId)) ? "selected" : "";

                        formoption += "<option value='" + doctorId + "' " + isSelected + ">" + doctorName +
                            "</option>";
                    }

                    $('#doctor_value').html(formoption);


                    $('#doctor_value').trigger("change");
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        }
    </script>



@endsection
