@extends('dashboard.layouts.master')
@section('admin_title', 'تعديل بيانات المريض')
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
@section('active-patients', 'active')
@section('page-header', ' تعديل بيانات المريض')
@section('page-header_desc', 'تعديل بيانات المريض')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.patients.index') }}">جدول المرضى</a></li>
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
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل بيانات المريض</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('dashboard.patients.update',$info['id']) }}" method="POST" role="form"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row col-md-12">

                            {{-- كود المريض --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">كود المريض</label>
                                <input disabled type="text" class="form-control font-w" name="name" value="{{ old('patient_code',$info['patient_code']) }}"
                                       id="exampleInputName">
                            </div>


                            {{-- أسم المريض --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">أسم المريض</label>
                                <input type="text" class="form-control font-w" name="name" value="{{ old('name',$info['name']) }}"
                                       id="exampleInputName" placeholder="أدخل اسم المريض">
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- الرقم القومى --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">الرقم القومى</label>
                                <input type="text" class="form-control font-w" name="national_id"
                                       value="{{ old('national_id',$info['national_id']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                       id="national_id" placeholder="أدخل الرقم القومى">
                                @error('national_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- البريد الالكترونى --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">البريد الالكترونى</label>
                                <input type="text" class="form-control font-w" name="email" value="{{ old('email',$info['email']) }}"
                                       id="exampleInputemail" placeholder="أدخل البريد الالكترونى">
                                @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- تاريخ الميلاد --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">تاريخ الميلاد</label>
                                <input type="date" class="form-control font-w" name="date_of_birth"
                                       value="{{ old('date_of_birth',$info['date_of_birth']) }}" id="date_of_birth">
                                @error('date_of_birth')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- الموبايل --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">الموبايل</label>
                                <input type="text" class="form-control font-w" name="mobile" value="{{ old('mobile',$info['mobile']) }}"
                                       oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="mobile"
                                       placeholder="أدخل المويايل">
                                @error('mobile')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- موبايل آخر --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">موبايل آخر</label>
                                <input type="text" class="form-control font-w" name="alt_mobile"
                                       value="{{ old('alt_mobile',$info['alt_mobile']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                       id="alt_mobile" placeholder="أدخل المويايل">
                                @error('alt_mobile')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- العنوان --}}
                            <div class="form-group col-md-12">
                                <label for="exampleInputName">العنوان</label>
                                <input type="text" class="form-control font-w" name="address" value="{{ old('address',$info['address']) }}"
                                       id="address" placeholder="أدخل .....">
                                @error('address')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- جهة اتصال الطوارئ --}}
                            <div class="form-group col-md-12">
                                <label for="exampleInputName">جهة اتصال الطوارئ</label>
                                <input type="text" class="form-control font-w" name="emergency_contact"
                                       value="{{ old('emergency_contact',$info['emergency_contact']) }}" id="emergency_contact" placeholder="أدخل .....">
                                @error('emergency_contact')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- المحافظة --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">المحافظة</label>
                                <select name="governorate_id" id="governorate_id" class="form-control select2 font-w"
                                        style="width: 100%;">
                                    <option selected>-- أختر المحافظة --</option>
                                    @if (!empty($other['governorates']) && isset($other['governorates']))
                                        @foreach ($other['governorates'] as $governorate)
                                            <option @if (old('governorate_id',$info['governorate_id']) == $governorate->id) selected="selected" @endif
                                            value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('governorate_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- المدينه --}}
                            <div class="form-group col-md-4" id="city_Div">
                                <label for="exampleInputName">المدينه</label>
                                <select name="city_id" id="city_id" class="form-control select2 font-w"
                                        style="width: 100%;">
                                    <option selected>-- أختر المدينه --</option>
                                    @if (!empty($other['cities']) && isset($other['cities']))
                                        @foreach ($other['cities'] as $city)
                                            <option @if (old('city_id',$info['city_id']) == $city->id) selected="selected" @endif
                                            value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('city_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- الجنسية --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">الجنسية</label>
                                <select name="nationality_id" id="nationality_id" class="form-control select2 font-w"
                                        style="width: 100%;">
                                    <option selected>-- أختر الجنسية --</option>
                                    @if (!empty($other['nationalities']) && isset($other['nationalities']))
                                        @foreach ($other['nationalities'] as $nationality)
                                            <option @if (old('nationality_id',$info['nationality_id']) == $nationality->id) selected="selected" @endif
                                            value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('nationality_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- نوع فصيلة الدم --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">نوع فصيلة الدم</label>
                                <select name="blood_types_id" id="blood_types_id" class="form-control select2 font-w"
                                        style="width: 100%;">
                                    <option selected>-- أختر نوع فصيلة الدم --</option>
                                    @if (!empty($other['blood_types']) && isset($other['blood_types']))
                                        @foreach ($other['blood_types'] as $blood_type)
                                            <option @if (old('blood_types_id',$info['blood_types_id']) == $blood_type->id) selected="selected" @endif
                                            value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('blood_types_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- شركة التأمين التابع لها --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">شركة التأمين التابع لها</label>
                                <select name="insurance_id" id="insurance_id" class="form-control select2 font-w"
                                        style="width: 100%;">
                                    <option selected>-- أختر شركة التأمين --</option>
                                    @if (!empty($other['insurance_companies']) && isset($other['insurance_companies']))
                                        @foreach ($other['insurance_companies'] as $insurance)
                                            <option @if (old('insurance_id',$info['insurance_id']) == $insurance->id) selected="selected" @endif
                                            value="{{ $insurance->id }}">{{ $insurance->name }}</option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('insurance_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- نوع الجنس --}}
                            <div class="form-group col-4">
                                <label for="exampleInput">نوع الجنس</label>
                                <select name="gender" id="gender" class="form-control font-w font-w">
                                    <option value="" disabled selected>-- برجاء تحديد نوع الجنس --</option>
                                    <option @if (old('gender',$info['gender']) == 1) selected @endif value="1">ذكر
                                    </option>
                                    <option @if (old('gender',$info['gender']) == 2) selected @endif value="2">أنثى
                                    </option>
                                </select>
                                @error('gender')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- التاريخ المرضى --}}
                            <div class="form-group col-md-12">
                                <label for="exampleInputName">التاريخ المرضى</label>
                                <textarea class="form-control font-w" rows="3" name="medical_history" placeholder="أدخل ...">{{ old('medical_history',$info['medical_history']) }}</textarea>
                                @error('medical_history')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- هل هناك جراحات سابقة --}}
                            <div class="form-group col-md-12">
                                <label for="exampleInputName">هل هناك جراحات سابقة</label>
                                <select class="form-control font-w" name="are_previous_surgeries" id="are_previous_surgeries">
                                    <option value="" selected>-- أختر --</option>
                                    <option @if (old('are_previous_surgeries',$info['are_previous_surgeries'] == 1)) selected @endif value="1">نعم</option>
                                    <option @if (old('are_previous_surgeries',$info['are_previous_surgeries'] == 0)) selected @endif value="0">لا</option>
                                </select>
                                @error('are_previous_surgeries')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="exampleInputName">اذكر تفاصيل جراحات سابقة</label>
                                <textarea class="form-control font-w" rows="3" name="previous_surgeries_details" placeholder="أدخل ...">{{ old('previous_surgeries_details',$info['previous_surgeries_details']) }}</textarea>
                                @error('previous_surgeries_details')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- هل تاخذ علاج مزمن --}}
                            <div class="form-group col-md-12">
                                <label for="exampleInputName">هل تاخذ علاج مزمن</label>
                                <select class="form-control font-w" name="Do_you_take_therapy" id="Do_you_take_therapy">
                                    <option value="" selected>-- أختر --</option>
                                    <option @if (old('Do_you_take_therapy',$info['Do_you_take_therapy'] == 1)) selected @endif value="1">نعم</option>
                                    <option @if (old('Do_you_take_therapy',$info['Do_you_take_therapy'] == 0)) selected @endif value="0">لا</option>
                                </select>
                                @error('Do_you_take_therapy')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="exampleInputName">اذكر تفاصيل علاج مزمن</label>
                                <textarea class="form-control font-w" rows="3" name="take_therapy_details" placeholder="أدخل ...">{{ old('take_therapy_details',$info['take_therapy_details']) }}</textarea>
                                @error('take_therapy_details')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- هل يوجد امراض مزمنه --}}
                            <div class="form-group col-md-12">
                                <label for="exampleInputName">هل يوجد امراض مزمنه</label>
                                <select class="form-control font-w" name="Do_you_chronic_diseases" id="Do_you_chronic_diseases">
                                    <option value="" selected>-- أختر --</option>
                                    <option @if (old('Do_you_chronic_diseases',$info['Do_you_chronic_diseases'] == 1)) selected @endif value="1">نعم</option>
                                    <option @if (old('Do_you_chronic_diseases',$info['Do_you_chronic_diseases'] == 0)) selected @endif value="0">لا</option>
                                </select>
                                @error('Do_you_chronic_diseases')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="exampleInputName">اذكر تفاصيل الامراض مزمنه</label>
                                <textarea class="form-control font-w" rows="3" name="hronic_diseases_details" placeholder="أدخل ...">{{ old('hronic_diseases_details',$info['hronic_diseases_details']) }}</textarea>
                                @error('hronic_diseases_details')
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
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script>
        $(document).on('change', '#governorate_id', function() {
            let governorate_id = $(this).val();
            if (governorate_id) {
                getCities(governorate_id);
            }
        });

        function getCities(governorate_id) {
            $.ajax({
                url: '{{ route('dashboard.patients.getCities') }}',
                type: 'POST',
                dataType: 'html',
                cache: false,
                data: {
                    "_token": '{{ csrf_token() }}',
                    governorate_id: governorate_id,
                },
                success: function(data) {
                    $("#city_Div").html(data);
                },
                error: function() {
                    alert("عفوا لقد حدث خطأ ");
                }

            });
        }
    </script>
@endsection
