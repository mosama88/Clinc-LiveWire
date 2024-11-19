@extends('dashboard.layouts.master')
@section('admin_title', 'تعديل طبيب')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <style>
        .font-w {
            font-weight: 600;
        }
    </style>
@endsection
@section('active-doctors', 'active')
@section('page-header', ' تعديل طبيب')
@section('page-header_desc', 'تعديل طبيب')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.doctors.appointmentIndex') }}">جدول مواعيد الأطباء</a></li>
@endsection
@section('content')

    {{-- ./row --}}
    <div class="row">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        {{-- Content --}}
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-appintmentEdit">
                <div class="card-header">
                    <h3 class="card-title">تعديل بيانات الطبيب</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('dashboard.doctors.updateAppintment', $appintmentEdit['id']) }}" method="POST"
                    role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @if ($appintmentEdit->image)
                            <img class="img-thumbnail rounded me-2 my-3" alt="200x200" style="width: 150px; height:150px"
                                src="{{ asset('dashboard/assets/uploads/Doctor/photo/' . $appintmentEdit->image->filename) }}"
                                data-holder-rendered="true">
                        @elseif(empty($appintmentEdit->image) && $appintmentEdit['gender'] == 1)
                            <img alt="Responsive image" class="my-3" style="width: 150px; height:150px"
                                src="{{ asset('dashboard/assets/uploads/male-doctor-default.jpg') }}">
                        @else
                            <img alt="Responsive image" class="my-3" style="width: 150px; height:150px"
                                src="{{ asset('dashboard/assets/uploads/female-doctor-default.jpg') }}">
                        @endif


                        <div class="row col-md-12">
                            {{-- كود الطبيب --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">كود الطبيب</label>
                                <input disabled type="text" class="form-control font-w " name="doctor_code"
                                    value="{{ old('doctor_code', $appintmentEdit['doctor_code']) }}" id="exampleInputName"
                                    placeholder="أدخل اسم الطبيب">
                                @error('doctor_code')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- أسم الطبيب --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">أسم الطبيب</label>
                                <input disabled type="text" class="form-control font-w " name="name"
                                    value="{{ old('name', $appintmentEdit['name']) }}" id="exampleInputName"
                                    placeholder="أدخل اسم الطبيب">
                                @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- المواعيد --}}
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label>المواعيد</label>
                                    <select class="select2 font-w" name="appointments[]" multiple="multiple" data-placeholder="Select a State"
                                            style="width: 100%;">

                                        @foreach ($other['appointments'] as $appointment)
                                            @php $check = []; @endphp
                                            @foreach ($appintmentEdit->doctorappointments as $key => $appointmentDOC)
                                                @php
                                                    $check[] = $appointmentDOC->id;
                                                @endphp
                                            @endforeach
                                            <option value="{{ $appointment->id }}"
                                                {{ in_array($appointment->id, $check) ? 'selected' : '' }}>
                                                {{ $appointment->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('appointments')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>



                            {{-- القسم --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">القسم</label>
                                <select disabled name="section_id" id="section_id" class="form-control font-w  select2 font-w"
                                    style="width: 100%;">
                                    <option selected>-- أختر القسم --</option>
                                    @if (!empty($other['sections']) && isset($other['sections']))
                                        @foreach ($other['sections'] as $section)
                                            <option @if (old('section_id', $appintmentEdit['section_id']) == $section->id) selected="selected" @endif
                                                value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('section_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- التخصص --}}
                            <div class="form-group col-md-4" id="specialization_Div">
                                <label for="exampleInputName">التخصص</label>
                                <select disabled name="specialization_id" id="specialization_id"
                                    class="form-control font-w  select2 font-w" style="width: 100%;">
                                    <option selected>-- أختر التخصص --</option>
                                    @if (!empty($other['specializations']) && isset($other['specializations']))
                                        @foreach ($other['specializations'] as $specialization)
                                            <option @if (old('specialization_id', $appintmentEdit['specialization_id']) == $specialization->id) selected="selected" @endif
                                                value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('section_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <!-- /.card-body -->
                            <div class="card-footer col-md-12">
                                <button type="submit" style="float: left" class="btn  btn-primary">تأكيد
                                    البيانات</button>
                            </div>
                        </div>

                </form>
            </div>
            <!-- /.card -->


        </div>
    </div>
    </div>
    <!-- /.row -->



@endsection
@section('scripts')

    <!-- Select2 -->
    <script src="{{ asset('dashboard') }}/assets/plugins/select2/js/select2.full.min.js"></script>

    <script>
        $(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
    <script>
        // Get Cities When Governorate Changes
        $(document).on('change', '#section_id', function() {
            const section_id = $(this).val();
            if (section_id) {
                getSpecializations(section_id);
            }
        });

        function getSpecializations(section_id) {
            $.ajax({
                url: '{{ route('dashboard.doctors.getSpecializations') }}',
                type: 'POST',
                dataType: 'html',
                cache: false,
                data: {
                    "_token": '{{ csrf_token() }}',
                    section_id: section_id
                },
                success: function(data) {
                    $("#specialization_Div").html(data);
                },
                error: function() {
                    alert("عفوا لقد حدث خطأ ");
                }
            });
        }
    </script>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
