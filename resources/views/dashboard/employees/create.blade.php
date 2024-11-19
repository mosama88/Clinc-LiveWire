@extends('dashboard.layouts.master')
@section('admin_title', 'أضافة موظف')
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
@section('active-employees', 'active')
@section('page-header', ' أضافة موظف')
@section('page-header_desc', 'أضافة موظف')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.employees.index') }}">جدول الموظفين</a></li>
@endsection
@section('content')

    {{-- ./row --}}
    <div class="row">

        {{-- Content --}}
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">أضف موظف</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif



                <div class="card-body">
                    {{-- <h4>صورة الموظف</h4> --}}
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                                href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                                aria-selected="true">البيانات الشخصية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-qualifications-tab" data-toggle="pill"
                                href="#custom-content-below-qualifications" role="tab"
                                aria-controls="custom-content-below-qualifications" aria-selected="false">المؤهلات
                                العلمية</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-military-tab" data-toggle="pill"
                                href="#custom-content-below-military" role="tab"
                                aria-controls="custom-content-below-military" aria-selected="false">البيانات
                                العسكرية</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                                href="#custom-content-below-profile" role="tab"
                                aria-controls="custom-content-below-profile" aria-selected="false">البيانات الوظيفية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill"
                                href="#custom-content-below-messages" role="tab"
                                aria-controls="custom-content-below-messages" aria-selected="false">بيانات أخرى</a>
                        </li>


                    </ul>

                    <form action="{{ route('dashboard.employees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                                aria-labelledby="custom-content-below-home-tab">



                                <div class="row my-4"> {{-- Start First Row of From --}}
                                    {{-- أسم الموظف --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputName">أسم الموظف</label>
                                        <input type="text" class="form-control font-w" name="name"
                                            value="{{ old('name') }}" id="exampleInputName" placeholder="أدخل اسم الموظف">
                                        @error('name')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- البريد الالكترونى --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail">البريد الالكترونى</label>
                                        <input type="text" class="form-control font-w" name="email"
                                            value="{{ old('email') }}" id="exampleInputEmail"
                                            placeholder="أدخل البريد الالكترونى ">
                                        @error('email')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- تاريخ الميلاد --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">تاريخ الميلاد</label>
                                        <input type="date" class="form-control font-w" name="brith_date"
                                            value="{{ old('brith_date') }}" id="brith_date" placeholder="YYYY-MM-DD ">
                                        @error('brith_date')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- نوع الجنس --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">نوع الجنس</label>
                                        <select name="gender" id="gender" class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء تحديد نوع الجنس --</option>
                                            <option @if (old('gender') == 1) selected @endif value="1">ذكر
                                            </option>
                                            <option @if (old('gender') == 2) selected @endif value="2">أنثى
                                            </option>
                                        </select>
                                        @error('gender')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الديانه --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">الديانه</label>
                                        <select name="religion" id="religion" class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء تحديد الديانه --</option>
                                            <option @if (old('religion') == 'muslim') selected @endif value="muslim">مسلم
                                            </option>
                                            <option @if (old('religion') == 'christian') selected @endif value="christian">
                                                مسيحى
                                            </option>
                                        </select>
                                        @error('religion')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الرقم القومى --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputName">الرقم القومى</label>
                                        <input type="text" class="form-control font-w" name="national_id"
                                            value="{{ old('national_id') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="national_id"
                                            placeholder="أدخل الرقم القومى">
                                        @error('national_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- الجنسية --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">الجنسية</label>
                                        <select name="nationality_id" id="nationality_id"
                                            class="form-control select2 font-w">
                                            <option value="" disabled selected>-- برجاء تحديد الجنسية --</option>
                                            @if (!empty($other['nationalities']) && isset($other['nationalities']))
                                                @foreach ($other['nationalities'] as $nationality)
                                                    <option @if (old('nationality_id', $nationality['nationality_id'] == $nationality->id)) selected @endif
                                                        value="{{ $nationality->id }}">{{ $nationality->name }}
                                                    </option>
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

                                    {{-- المحافظة --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">المحافظة</label>
                                        <select name="governorate_id" id="governorate_id"
                                            class="form-control select2 font-w">
                                            <option value="" disabled selected>-- برجاء تحديد المحافظة --</option>
                                            @if (!empty($other['governorates']) && isset($other['governorates']))
                                                @foreach ($other['governorates'] as $governorate)
                                                    <option @if (old('governorate_id', $governorate['governorate_id'] == $governorate->id)) selected @endif
                                                        value="{{ $governorate->id }}">{{ $governorate->name }}
                                                    </option>
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
                                    <div class="form-group col-6" id="city_Div">
                                        <label for="exampleInput">المدينه</label>
                                        <select name="city_id" id="city_id" class="form-control select2 font-w">
                                            <option value="" disabled selected>-- برجاء تحديد المدينه --</option>
                                            @if (!empty($other['cities']) && isset($other['cities']))
                                                @foreach ($other['cities'] as $city)
                                                    <option @if (old('city_id', $city['city_id'] == $city->id)) selected @endif
                                                        value="{{ $city->id }}">{{ $city->name }}
                                                    </option>
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
                                    {{-- فصيلة الدم --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">فصيلة الدم</label>
                                        <select name="blood_types_id" id="blood_types_id" class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء تحديد المدينه --</option>
                                            @if (!empty($other['blood_types']) && isset($other['blood_types']))
                                                @foreach ($other['blood_types'] as $blood_type)
                                                    <option @if (old('blood_types_id', $blood_type['blood_types_id'] == $blood_type->id)) selected @endif
                                                        value="{{ $blood_type->id }}">{{ $blood_type->name }}
                                                    </option>
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

                                    {{-- عنوان الموظف --}}
                                    <div class="form-group col-12">
                                        <label for="exampleInputAddress">عنوان الموظف</label>
                                        <input type="text" class="form-control font-w" name="address"
                                            value="{{ old('address') }}" id="exampleInputAddress"
                                            placeholder="أدخل اسم الموظف">
                                        @error('address')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- رقم الهاتف --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputName">رقم الهاتف</label>
                                        <input type="text" class="form-control font-w" name="home_telephone"
                                            value="{{ old('home_telephone') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="home_telephone"
                                            placeholder="أدخل رقم الهاتف">
                                        @error('home_telephone')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الرقم المحمول --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputName">الرقم المحمول</label>
                                        <input type="text" class="form-control font-w" name="mobile"
                                            value="{{ old('mobile') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="mobile"
                                            placeholder="أدخل الرقم المحمول">
                                        @error('mobile')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الحالة الاجتماعية --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">الحالة الاجتماعية</label>
                                        <select name="social_status" id="social_status" class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء تحديد الحالة الاجتماعية --
                                            </option>
                                            <option @if (old('social_status') == 'married') selected @endif value="married">
                                                متزوج
                                            </option>
                                            <option @if (old('social_status') == 'divorced') selected @endif value="divorced">
                                                مطلق
                                            </option>
                                            <option @if (old('social_status') == 'single') selected @endif value="single">
                                                أعزب
                                            </option>
                                            <option @if (old('social_status') == 'widowed') selected @endif value="widowed">
                                                أرمل
                                            </option>
                                        </select>
                                        @error('social_status')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- عدد الأطفال --}}
                                    <div class="form-group col-6 d-none" id="children_number_hideandshow">
                                        <label for="exampleInput">عدد الأطفال</label>
                                        <input type="text" class="form-control font-w" name="children_number"
                                            value="{{ old('children_number') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" value="0"
                                            id="children_number" placeholder="أدخل عدد الأطفال">
                                        @error('children_number')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div> {{-- End First Row of From --}}
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-qualifications" role="tabpanel"
                                aria-labelledby="custom-content-below-qualifications-tab">
                                <div class="row my-4"> {{-- Start Seconed Row of From --}}
                                    {{-- أسم المؤهل --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">المؤهل</label>
                                        <select name="qualification_id" id="qualification_id"
                                            class="form-control select2 font-w">
                                            <option value="" disabled selected>-- برجاء تحديد المؤهل --</option>
                                            @if (!empty($other['qualifications']) && isset($other['qualifications']))
                                                @foreach ($other['qualifications'] as $qualification)
                                                    <option @if (old('qualification_id', $qualification['qualification_id'] == $qualification->id)) selected @endif
                                                        value="{{ $qualification->id }}">{{ $qualification->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('qualification_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- تاريخ الحصول على المؤهل --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">تاريخ الحصول على المؤهل</label>
                                        <input type="date" class="form-control font-w" name="qualification_year"
                                            value="{{ old('qualification_year') }}" id="qualification_year">
                                        @error('qualification_year')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- تخصص الشهاده --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">تخصص الشهاده</label>
                                        <input type="text" class="form-control font-w" name="major"
                                            value="{{ old('major') }}" id="major" placeholder="أدخل التخصص ">
                                        @error('major')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- اسم الجهة التعليمية --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">اسم الجهة التعليمية</label>
                                        <input type="text" class="form-control font-w" name="university"
                                            value="{{ old('university') }}" id="university"
                                            placeholder="أدخل الجهة التعليمية ">
                                        @error('university')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- المعدل التراكمي أو الدرجة --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">المعدل التراكمي أو الدرجة</label>
                                        <select name="graduation_estimate" id="graduation_estimate"
                                            class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء تحديد المعدل التراكمي أو
                                                الدرجة --
                                            </option>
                                            <option @if (old('graduation_estimate') == 'fair') selected @endif value="fair">
                                                مقبول
                                            </option>
                                            <option @if (old('graduation_estimate') == 'good') selected @endif value="good">
                                                جيد
                                            </option>
                                            <option @if (old('graduation_estimate') == 'very_good') selected @endif value="very_good">
                                                جيد جدآ
                                            </option>
                                            <option @if (old('graduation_estimate') == 'excellent') selected @endif value="excellent">
                                                أمتياز
                                            </option>
                                        </select>
                                        @error('graduation_estimate')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>{{-- End Seconed Row of From --}}
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-military" role="tabpanel"
                                aria-labelledby="custom-content-below-military-tab">
                                <div class="row my-4"> {{-- Start Seconed Row of From --}}
                                    {{-- الحالة العسكرية --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">الحالة العسكرية</label>
                                        <select name="military" id="military" class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء تحديد الحالة العسكرية --
                                            </option>
                                            <option @if (old('military') == 'exemption') selected @endif value="exemption">
                                                إعفاء نهائى
                                            </option>
                                            <option @if (old('military') == 'exemption_temporary') selected @endif
                                                value="exemption_temporary">
                                                تأجيل
                                            </option>
                                            <option @if (old('military') == 'complete') selected @endif value="complete">
                                                أدى الخدمه العسكرية
                                            </option>
                                            <option @if (old('military') == 'have_not') selected @endif value="have_not">
                                                ليس لديه
                                            </option>
                                        </select>
                                        @error('military')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- تاريخ بداية الخدمه العسكرية --}}
                                    <div class="form-group col-6 d-none" id="military_date_from_Div">
                                        <label for="exampleInput">تاريخ بداية الخدمه العسكرية</label>
                                        <input type="date" class="form-control font-w" name="military_date_from"
                                            value="{{ old('military_date_from') }}" id="military_date_from">
                                        @error('military_date_from')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- تاريخ نهاية الخدمه العسكرية --}}
                                    <div class="form-group col-6 d-none" id="military_date_to_Div">
                                        <label for="exampleInput">تاريخ نهاية الخدمه العسكرية</label>
                                        <input type="date" class="form-control font-w" name="military_date_to"
                                            value="{{ old('military_date_to') }}" id="military_date_to">
                                        @error('military_date_to')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- نوع سلاح الخدمة العسكرية --}}
                                    <div class="form-group col-6 d-none" id="military_wepon_Div">
                                        <label for="exampleInput">نوع سلاح الخدمة العسكرية </label>
                                        <input type="text" class="form-control font-w" name="military_wepon"
                                            value="{{ old('military_wepon') }}" id="military_wepon"
                                            placeholder="أدخل التخصص ">
                                        @error('military_wepon')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- تاريخ الاعفاء من الخدمه العسكرية --}}
                                    <div class="form-group col-6 d-none" id="military_exemption_date_Div">
                                        <label for="exampleInput">تاريخ الاعفاء من الخدمه العسكرية</label>
                                        <input type="date" class="form-control font-w" name="military_exemption_date"
                                            value="{{ old('military_exemption_date') }}" id="military_exemption_date">
                                        @error('military_exemption_date')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- سبب الاعفاء من الخدمه العسكرية --}}
                                    <div class="form-group col-6 d-none" id="military_exemption_reason_Div">
                                        <label for="exampleInput">سبب الاعفاء من الخدمه العسكرية</label>
                                        <input type="text" class="form-control font-w"
                                            name="military_exemption_reason"
                                            value="{{ old('military_exemption_reason') }}"
                                            id="military_exemption_reason">
                                        @error('military_exemption_reason')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    {{-- تاريخ التأجيل من الخدمه العسكرية --}}
                                    <div class="form-group col-6 d-none" id="military_postponement_date_Div">
                                        <label for="exampleInput">تاريخ التأجيل من الخدمه العسكرية</label>
                                        <input type="date" class="form-control font-w"
                                            name="military_postponement_date"
                                            value="{{ old('military_postponement_date') }}"
                                            id="military_postponement_date">
                                        @error('military_postponement_date')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    {{-- سبب التأجيل من الخدمه العسكرية --}}
                                    <div class="form-group col-6 d-none" id="military_postponement_reason_Div">
                                        <label for="exampleInput">سبب التأجيل من الخدمه العسكرية</label>
                                        <input type="text" class="form-control font-w"
                                            name="military_postponement_reason"
                                            value="{{ old('military_postponement_reason') }}"
                                            id="military_postponement_reason">
                                        @error('military_postponement_reason')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>{{-- End Seconed Row of From --}}
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                                aria-labelledby="custom-content-below-profile-tab">

                                <div class="row my-4"> {{-- Start Seconed Row of From --}}

                                    {{-- حالة الموظف	 --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">حالة الموظف </label>
                                        <select name="functional_status" id="functional_status"
                                            class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء تحديد حالة الموظف --
                                            </option>
                                            <option @if (old('functional_status') == '1') selected @endif value="1">
                                                يعمل
                                            </option>
                                            <option @if (old('functional_status') == '2') selected @endif value="0">
                                                لا يعمل
                                            </option>
                                        </select>
                                        @error('functional_status')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- نوع وظيفة الموظف --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">نوع وظيفة الموظف </label>
                                        <select name="job_type" id="job_type" class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء تحديد نوع وظيفة الموظف --
                                            </option>
                                            <option @if (old('job_type') == 'doctor') selected @endif value="doctor">
                                                دكتور
                                            </option>
                                            <option @if (old('job_type') == 'employee') selected @endif value="employee">
                                                موظف
                                            </option>
                                            <option @if (old('job_type') == 'nurse') selected @endif value="nurse">
                                                ممرض
                                            </option>
                                            <option @if (old('job_type') == 'worker') selected @endif value="worker">
                                                عامل
                                            </option>
                                        </select>
                                        @error('functional_status ')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- تاريخ بدء العمل  --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">تاريخ بدء العمل </label>
                                        <input type="date" class="form-control font-w" name="work_start_date"
                                            value="{{ old('work_start_date') }}" id="work_start_date">
                                        @error('work_start_date')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الأدارة --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">الأدارة</label>
                                        <select name="department_id" id="department_id"
                                            class="form-control select2 font-w">
                                            <option value="" disabled selected>-- برجاء تحديد الأدارة --</option>
                                            @if (!empty($other['departments']) && isset($other['departments']))
                                                @foreach ($other['departments'] as $department)
                                                    <option @if (old('department_id', $department['department_id'] == $department->id)) selected @endif
                                                        value="{{ $department->id }}">{{ $department->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('department_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الفرع --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">الفرع</label>
                                        <select name="branch_id" id="branch_id" class="form-control select2 font-w">
                                            <option value="" disabled selected>-- برجاء تحديد الفرع --</option>
                                            @if (!empty($other['branches']) && isset($other['branches']))
                                                @foreach ($other['branches'] as $branch)
                                                    <option @if (old('branch_id', $branch['branch_id'] == $branch->id)) selected @endif
                                                        value="{{ $branch->id }}">{{ $branch->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('branch_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الدرجه الوظيفية --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">الدرجه الوظيفية</label>
                                        <select name="job_grade_id" id="job_grade_id" class="form-control select2 font-w"
                                            style="width: 100%;">
                                            <option value="" disabled selected>-- برجاء تحديد الدرجه الوظيفية --
                                            </option>
                                            @if (!empty($other['job_grades']) && isset($other['job_grades']))
                                                @foreach ($other['job_grades'] as $jobGrade)
                                                    <option @if (old('job_grade_id', $jobGrade['job_grade_id'] == $jobGrade->id)) selected @endif
                                                        value="{{ $jobGrade->id }}">{{ $jobGrade->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('job_grade_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الفئات الوظيفية --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">الفئات الوظيفية</label>
                                        <select name="job_category_id" id="job_category_id"
                                            class="form-control select2 font-w">
                                            <option value="" disabled selected>-- برجاء تحديد الفئات الوظيفية --
                                            </option>
                                            @if (!empty($other['job_categories']) && isset($other['job_categories']))
                                                @foreach ($other['job_categories'] as $job)
                                                    <option @if (old('job_category_id', $job['job_category_id'] == $job->id)) selected @endif
                                                        value="{{ $job->id }}">{{ $job->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('job_category_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- هل له شفت ثابت --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">هل له شفت ثابت</label>
                                        <select name="has_fixed_shift" id="has_fixed_shift" class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء التحديد --
                                            </option>
                                            <option @if (old('has_fixed_shift') == '1') selected @endif value="1">
                                                نعم
                                            </option>
                                            <option @if (old('has_fixed_shift') == '0') selected @endif value="0">
                                                لا
                                            </option>
                                        </select>
                                        @error('has_fixed_shift')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- نوع الشفت --}}
                                    <div class="form-group col-6 d-none" id="shift_type_id_Div">
                                        <label for="exampleInput">نوع الشفت</label>
                                        <select name="shift_type_id" id="shift_type_id" class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء تحديد نوع الشفت --
                                            </option>
                                            @if (!empty($other['shift_types']) && isset($other['shift_types']))
                                                @foreach ($other['shift_types'] as $shift)
                                                    <option @if (old('shift_type_id', $shift['shift_type_id'] == $shift->id)) selected @endif
                                                        value="{{ $shift->id }}">{{ $shift->name }}  من ( {{$shift->from_time}} ) إلى ( {{$shift->to_time}} )  
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('shift_type_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- عدد ساعات العمل --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputName">عدد ساعات العمل</label>
                                        <input type="text" class="form-control font-w" name="daily_work_hour"
                                            value="{{ old('daily_work_hour') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="daily_work_hour"
                                            placeholder="أدخل عدد ساعات العمل">
                                        @error('daily_work_hour')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- المرتب --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputName">المرتب</label>
                                        <input type="text" class="form-control font-w" name="salary"
                                            value="{{ old('salary') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="salary"
                                            placeholder="أدخل المرتب">
                                        @error('salary')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- سعر اليومى للمرتب --}}
                                    <div class="form-group col-6 d-none">
                                        <label for="exampleInputName">سعر اليومى للمرتب</label>
                                        <input type="text" class="form-control font-w" name="day_price"
                                            value="{{ old('day_price') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="day_price"
                                            placeholder="أدخل سعر اليومى للمرتب">
                                        @error('day_price')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- هل له حافز --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">هل له حافز</label>
                                        <select name="motivation_type" id="motivation_type" class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء التحديد --
                                            </option>
                                            <option @if (old('motivation_type') == 'changeable') selected @endif value="changeable">
                                                متغير
                                            </option>
                                            <option @if (old('motivation_type') == 'fixed') selected @endif value="fixed">
                                                ثابت
                                            </option>
                                            <option @if (old('motivation_type') == 'none') selected @endif value="none">
                                                لا يوجد
                                            </option>
                                        </select>
                                        @error('motivation_type')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- قيمة الحافز --}}
                                    <div class="form-group col-6 d-none" id="motivation_value_Div">
                                        <label for="exampleInputName">قيمة الحافز</label>
                                        <input type="text" class="form-control font-w" name="motivation_value"
                                            value="{{ old('motivation_value') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="motivation_value"
                                            placeholder="أدخل قيمة الحافز">
                                        @error('motivation_value')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- هل له بدلات ثابته --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">هل له بدلات ثابته</label>
                                        <select name="fixed_allowances" id="fixed_allowances"
                                            class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء التحديد --
                                            </option>
                                            <option @if (old('fixed_allowances') == '1') selected @endif value="1">
                                                نعم
                                            </option>
                                            <option @if (old('fixed_allowances') == '0') selected @endif value="0">
                                                لا
                                            </option>
                                        </select>
                                        @error('fixed_allowances')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- هل له تأمين اجتماعي --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">هل له تأمين اجتماعي </label>
                                        <select name="social_insurance" id="social_insurance"
                                            class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء التحديد --
                                            </option>
                                            <option @if (old('social_insurance') == '1') selected @endif value="1">
                                                نعم
                                            </option>
                                            <option @if (old('social_insurance') == '0') selected @endif value="0">
                                                لا
                                            </option>
                                        </select>
                                        @error('social_insurance')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- قيمة استقطاع التأمين الاجتماعي الشهري للموظف --}}
                                    <div class="form-group col-6 d-none" id="social_insurance_cut_monthely_Div">
                                        <label for="exampleInputName">قيمة استقطاع التأمين الاجتماعي الشهري</label>
                                        <input type="text" class="form-control font-w"
                                            name="social_insurance_cut_monthely"
                                            value="{{ old('social_insurance_cut_monthely') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                            id="social_insurance_cut_monthely"
                                            placeholder="أدخل قيمة استقطاع التأمين الاجتماعي الشهري للموظف">
                                        @error('social_insurance_cut_monthely')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- رقم التأمين الاجتماعى --}}
                                    <div class="form-group col-6 d-none" id="social_insurance_number_Div">
                                        <label for="exampleInputName">الرقم التأمينى الاجتماعى</label>
                                        <input type="text" class="form-control font-w" name="social_insurance_number"
                                            value="{{ old('social_insurance_number') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                            id="social_insurance_number" placeholder="أدخل رقم التأمين الاجتماعى">
                                        @error('social_insurance_number')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- هل له تأمين طبي --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">هل له تأمين طبي </label>
                                        <select name="medical_insurance" id="medical_insurance"
                                            class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء التحديد --
                                            </option>
                                            <option @if (old('medical_insurance') == '1') selected @endif value="1">
                                                نعم
                                            </option>
                                            <option @if (old('medical_insurance') == '0') selected @endif value="0">
                                                لا
                                            </option>
                                        </select>
                                        @error('medical_insurance')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- قيمة استقطاع التأمين الطبى الشهري للموظف --}}
                                    <div class="form-group col-6 d-none" id="medical_insurance_cut_monthely_Div">
                                        <label for="exampleInputName">قيمة استقطاع التأمين الطبى الشهري</label>
                                        <input type="text" class="form-control font-w"
                                            name="medical_insurance_cut_monthely"
                                            value="{{ old('medical_insurance_cut_monthely') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                            id="medical_insurance_cut_monthely"
                                            placeholder="أدخل قيمة استقطاع التأمين الطبى الشهري للموظف">
                                        @error('medical_insurance_cut_monthely')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- رقم التأمين الطبى --}}
                                    <div class="form-group col-6 d-none" id="medical_insurance_number_Div">
                                        <label for="exampleInputName">الرقم التأمينى الطبى</label>
                                        <input type="text" class="form-control font-w" name="medical_insurance_number"
                                            value="{{ old('medical_insurance_number') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                            id="medical_insurance_number" placeholder="أدخل رقم التأمين الطبى">
                                        @error('medical_insurance_number')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- نوع صرف الراتب --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">نوع صرف الراتب </label>
                                        <select name="Type_salary_receipt" id="Type_salary_receipt"
                                            class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء التحديد --
                                            </option>
                                            <option @if (old('Type_salary_receipt') == '1') selected @endif value="1">
                                                كاش
                                            </option>
                                            <option @if (old('Type_salary_receipt') == '2') selected @endif value="2">
                                                فيزا
                                            </option>
                                        </select>
                                        @error('Type_salary_receipt')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>{{-- End Seconed Row of From --}}
                            </div>


                            <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel"
                                aria-labelledby="custom-content-below-messages-tab">









                                <div class="row my-4"> {{-- Start Seconed Row of From --}}

                                    {{-- هل يمتلك رخصه قياده --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">هل يمتلك رخصه قياده </label>
                                        <select name="driving_license" id="driving_license" class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء التحديد --
                                            </option>
                                            <option @if (old('driving_license') == '1') selected @endif value="1">
                                                نعم
                                            </option>
                                            <option @if (old('driving_license') == '0') selected @endif value="0">
                                                لا
                                            </option>
                                        </select>
                                        @error('driving_license')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>




                                    {{-- نوع رخصه القيادة --}}
                                    <div class="form-group col-6 d-none" id="driving_license_type_Div">
                                        <label for="exampleInput">نوع رخصه القيادة </label>
                                        <select name="driving_license_type" id="driving_license_type"
                                            class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء التحديد --
                                            </option>
                                            <option @if (old('driving_license_type') == 'special') selected @endif value="special">
                                                رخصه خاصة
                                            </option>
                                            <option @if (old('driving_license_type') == 'first') selected @endif value="first">
                                                رخصه درجه أولى
                                            </option>
                                            <option @if (old('driving_license_type') == 'second') selected @endif value="second">
                                                رخصه درجه ثانية
                                            </option>
                                            <option @if (old('driving_license_type') == 'third') selected @endif value="third">
                                                رخصه درجه ثالثه
                                            </option>
                                            <option @if (old('driving_license_type') == 'fourth') selected @endif value="fourth">
                                                رخصه درجه رابعه
                                            </option>
                                            <option @if (old('driving_license_type') == 'pro') selected @endif value="pro">
                                                رخصة مهنية
                                            </option>
                                            <option @if (old('driving_license_type') == 'motorcycle') selected @endif value="motorcycle">
                                                دراجه نارية
                                            </option>
                                        </select>
                                        @error('driving_license_type')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    {{-- رقم رخصة القياده --}}
                                    <div class="form-group col-6 d-none" id="driving_License_id_Div">
                                        <label for="exampleInputName">رقم رخصة القياده</label>
                                        <input type="text" class="form-control font-w" name="driving_License_id"
                                            value="{{ old('driving_License_id') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                            id="driving_License_id" placeholder="أدخل رقم رخصة القياده">
                                        @error('driving_License_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>



                                    {{-- هل له اقارب بالعمل --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">هل له اقارب بالعمل </label>
                                        <select name="has_relatives" id="has_relatives" class="form-control font-w">
                                            <option value="" disabled selected>-- برجاء التحديد --
                                            </option>
                                            <option @if (old('has_relatives') == '1') selected @endif value="1">
                                                نعم
                                            </option>
                                            <option @if (old('has_relatives') == '0') selected @endif value="0">
                                                لا
                                            </option>
                                        </select>
                                        @error('has_relatives')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    {{-- تفاصيل الاقارب بالعمل --}}
                                    <div class="form-group col-6 d-none" id="relatives_details_Div">
                                        <label for="exampleInputName">تفاصيل الاقارب بالعمل</label>
                                        <input type="text" class="form-control font-w" name="relatives_details"
                                            value="{{ old('relatives_details') }}" id="relatives_details"
                                            placeholder="أدخل تفاصيل الاقارب بالعمل">
                                        @error('relatives_details')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>



                                    {{-- تفاصيل شخص يمكن الرجوع اليه للوصول للموظف --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputName">تفاصيل شخص يمكن الرجوع اليه للوصول للموظف </label>
                                        <input type="text" class="form-control font-w" name="urgent_person_details"
                                            value="{{ old('urgent_person_details') }}" id="urgent_person_details"
                                            placeholder="أدخل تفاصيل شخص يمكن الرجوع اليه للوصول للموظف">
                                        @error('urgent_person_details')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    {{-- ملاحظات --}}
                                    <div class="form-group col-12">
                                        <label for="exampleInputName">ملاحظات </label>
                                        <textarea class="form-control font-w" rows="3" name="notes" placeholder="أدخل ملاحظات">{{ old('notes') }}</textarea>
                                        @error('notes')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- صورة الموظف --}}
                                    <div class="form-group col-12">
                                        <label for="exampleInput">صورة الموظف</label>

                                        <input class="form-control @error('photo') is-invalid @enderror" accept="image/*"
                                            name="photo" type="file" id="example-text-input"
                                            onchange="loadFile(event)">
                                        <img class="rounded-circle avatar-xl my-4 mx-3" style="width: 100px;height: 100px"
                                            id="output" />
                                        @error('photo')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>{{-- End Seconed Row of From --}}
                            </div>
                            <div class="card-footer">
                                <button type="submit" style="float: left" class="btn btn-primary">تأكيد البيانات
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
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
        $(document).on('change', '#governorate_id', function() {
            let governorate_id = $(this).val();
            if (governorate_id) {
                getCities(governorate_id);
            }
        });

        function getCities(governorate_id) {
            $.ajax({
                url: '{{ route('dashboard.employees.getCities') }}',
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


    <script>
        $('select[name="social_status"]').change(function() {
            let social_status = $("#social_status").val();
            let children_number = $("#children_number_hideandshow").val();

            if (social_status != "single") {
                $("#children_number_hideandshow").removeClass('d-none');

            } else {
                $("#children_number_hideandshow").addClass('d-none');
            }
        });
    </script>


    <script>
        $(document).ready(function() {

            $('select[name="military"]').change(function() {

                let military = $("#military").val();

                if (military === 'exemption') {
                    $("#military_exemption_date_Div").removeClass('d-none');
                    $("#military_exemption_reason_Div").removeClass('d-none');
                    $("#military_date_from_Div").addClass('d-none');
                    $("#military_date_to_Div").addClass('d-none');
                    $("#military_wepon_Div").addClass('d-none');
                    $("#military_postponement_reason_Div").addClass('d-none');
                    $("#military_postponement_date_Div").addClass('d-none');
                } else if (military === 'exemption_temporary') {
                    $("#military_postponement_reason_Div").removeClass('d-none');
                    $("#military_postponement_date_Div").removeClass('d-none');
                    $("#military_exemption_date_Div").addClass('d-none');
                    $("#military_exemption_reason_Div").addClass('d-none');
                    $("#military_date_from_Div").addClass('d-none');
                    $("#military_date_to_Div").addClass('d-none');
                    $("#military_wepon_Div").addClass('d-none');

                } else if (military === 'complete') {
                    $("#military_date_from_Div").removeClass('d-none');
                    $("#military_date_to_Div").removeClass('d-none');
                    $("#military_wepon_Div").removeClass('d-none');
                    $("#military_exemption_date_Div").addClass('d-none');
                    $("#military_exemption_reason_Div").addClass('d-none');
                    $("#military_postponement_reason_Div").addClass('d-none');
                    $("#military_postponement_date_Div").addClass('d-none');
                } else if (military === 'have_not') {
                    $("#military_exemption_date_Div").addClass('d-none');
                    $("#military_exemption_reason_Div").addClass('d-none');
                    $("#military_date_from_Div").addClass('d-none');
                    $("#military_date_to_Div").addClass('d-none');
                    $("#military_wepon_Div").addClass('d-none');
                    $("#military_postponement_reason_Div").addClass('d-none');
                    $("#military_postponement_date_Div").addClass('d-none');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="has_fixed_shift"]').change(function() {
                let has_fixed_shift = $("#has_fixed_shift").val();
                if (has_fixed_shift == 1) {
                    $("#shift_type_id_Div").removeClass('d-none');
                } else {
                    $("#shift_type_id_Div").addClass('d-none');

                }
            });


            $('select[name="motivation_type"]').change(function() {
                let motivation_type = $("#motivation_type").val();
                if (motivation_type == 'fixed') {
                    $("#motivation_value_Div").removeClass('d-none');
                } else {
                    $("#motivation_value_Div").addClass('d-none');
                }
            });


            $('select[name="social_insurance"]').change(function() {
                let social_insurance = $("#social_insurance").val();
                if (social_insurance == 1) {
                    $("#social_insurance_cut_monthely_Div").removeClass('d-none');
                    $("#social_insurance_number_Div").removeClass('d-none');
                } else {
                    $("#social_insurance_cut_monthely_Div").addClass('d-none');
                    $("#social_insurance_number_Div").addClass('d-none');
                }
            });

            $('select[name="medical_insurance"]').change(function() {
                let medical_insurance = $("#medical_insurance").val();
                if (medical_insurance == 1) {
                    $("#medical_insurance_cut_monthely_Div").removeClass('d-none');
                    $("#medical_insurance_number_Div").removeClass('d-none');
                } else {
                    $("#medical_insurance_cut_monthely_Div").addClass('d-none');
                    $("#medical_insurance_number_Div").addClass('d-none');
                }
            });



            $('select[name="driving_license"]').change(function() {
                let driving_license = $("#driving_license").val();
                if (driving_license == 1) {
                    $("#driving_license_type_Div").removeClass('d-none');
                    $("#driving_License_id_Div").removeClass('d-none');
                } else {
                    $("#driving_license_type_Div").addClass('d-none');
                    $("#driving_License_id_Div").addClass('d-none');
                }
            });


            $('select[name="has_relatives"]').change(function() {
                let has_relatives = $("#has_relatives").val();
                if (has_relatives == 1) {
                    $("#relatives_details_Div").removeClass('d-none');
                } else {
                    $("#relatives_details_Div").addClass('d-none');
                }
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
@endsection
