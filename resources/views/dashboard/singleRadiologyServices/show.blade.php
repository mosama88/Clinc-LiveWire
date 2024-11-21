@extends('dashboard.layouts.master')
@section('admin_title', 'عرض شركة تامين')
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
@section('active-insuranceCompanies', 'active')
@section('page-header', ' عرض شركة تامين')
@section('page-header_desc', 'عرض شركة تامين')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.insuranceCompanies.index') }}">جدول شركة التأمين</a></li>
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
                    <h3 class="card-title">عرض شركة التامين</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="card-body">
                        <div class="row col-md-12">

                            {{-- كود الشركة تامين --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">كود شركة تامين</label>
                                <input disabled type="text" class="font-w form-control" name="company_code"
                                       value="{{ old('company_code', $data['company_code']) }}" id="exampleInputName"
                                       placeholder="أدخل اسم الشركة تامين">
                            </div>


                            {{-- أسم الشركة تامين --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">أسم الشركة تامين</label>
                                <input disabled type="text" class="font-w form-control" name="name"
                                       value="{{ old('name', $data['name']) }}" id="exampleInputName"
                                       placeholder="أدخل اسم الشركة تامين">

                            </div>

                            {{-- البريد الالكترونى --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">البريد الالكترونى</label>
                                <input disabled type="text" class="font-w form-control" name="email"
                                       value="{{ old('email', $data['email']) }}" id="exampleInputemail"
                                       placeholder="أدخل البريد الالكترونى">

                            </div>

                            {{-- أسم مندوب الشركه --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">أسم مندوب الشركه</label>
                                <input disabled type="text" class="font-w form-control" name="contact_person"
                                       value="{{ old('contact_person', $data['contact_person']) }}" id="contact_person"
                                       placeholder="أدخل أسم مندوب الشركه">

                            </div>

                            {{-- رقم مندوب الشركه --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">رقم مندوب الشركه</label>
                                <input disabled type="text" class="font-w form-control" name="mobile_person"
                                       value="{{ old('mobile_person', $data['mobile_person']) }}"
                                       oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="mobile_person"
                                       placeholder="أدخل المويايل">

                            </div>

                            {{-- هاتف العمل للشركه --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">هاتف العمل للشركه</label>
                                <input disabled type="text" class="font-w form-control" name="work_phone"
                                       value="{{ old('work_phone', $data['work_phone']) }}"
                                       oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="work_phone"
                                       placeholder="أدخل المويايل">

                            </div>

                            {{-- العنوان --}}
                            <div class="form-group col-md-12">
                                <label for="exampleInputName">العنوان</label>
                                <input disabled type="text" class="font-w form-control" name="address"
                                       value="{{ old('address', $data['address']) }}" id="address" placeholder="أدخل .....">

                            </div>

                            {{-- نسبة الخصم الممنوحه --}}
                            <div class="form-group col-md-6 mb-3">
                                <label for="exampleInputName">نسبة الخصم الممنوحه</label><i class="fas fa-percent mr-2"></i>
                                <input disabled type="text" class="font-w form-control" name="discount_rate"
                                       value="{{ old('discount_rate', $data['discount_rate']) * 1 }}"
                                       oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="discount_rate"
                                       placeholder="نسبة الخصم">

                            </div>


                            {{-- المحافظة --}}
                            <div class="form-group col-md-6 mb-3">
                                <label for="exampleInputName">المحافظة</label>
                                <select disabled name="governorate_id" id="governorate_id" class="font-w form-control select2 font-w"
                                        style="width: 100%;">
                                    <option selected>-- أختر المحافظة --</option>
                                    @if (!empty($other['governorates']) && isset($other['governorates']))
                                        @foreach ($other['governorates'] as $governorate)
                                            <option @if (old('governorate_id', $data['governorate_id']) == $governorate->id) selected="selected" @endif
                                            value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>

                            </div>

                            {{-- تفاصيل الاتفاقية --}}
                            <div class="form-group col-md-12">
                                <label for="exampleInputName">تفاصيل الاتفاقية</label>
                                <textarea disabled class="font-w form-control" rows="3" name="agreement_details" placeholder="أدخل ...">{{ old('agreement_details', $data['agreement_details']) }}</textarea>

                            </div>

                        </div>

            </div>
            <!-- /.card -->


        </div>
    </div>
    </div>
    <!-- /.row -->



@endsection
@section('scripts')


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
        var loadFileLogo = function(event) {
            var container = document.getElementById('output');
            container.innerHTML = ''; // تفريغ المحتوى السابق

            if (event.target.files[0]) {
                var file = event.target.files[0];
                if (file.type.startsWith('image/')) { // التحقق من أن الملف صورة
                    var img = document.createElement('img');
                    img.className = 'rounded-circle avatar-xl mx-2';
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover'; // ضبط تناسب الصورة
                    img.src = URL.createObjectURL(file);

                    img.onload = function() {
                        URL.revokeObjectURL(img.src); // تحرير الذاكرة
                    };

                    container.appendChild(img); // إضافة الصورة إلى العنصر
                }
            }
        };
    </script>
    <script>
        var loadFiles = function(event) {
            var files = event.target.files;
            var container = document.getElementById('outputFilesContainer');
            container.innerHTML = ''; // تفريغ الصور السابقة

            for (let i = 0; i < files.length; i++) {
                let file = files[i];

                if (file.type.startsWith('image/')) { // التحقق من أن الملف صورة
                    let img = document.createElement('img');
                    img.className = 'rounded-circle avatar-xl mx-2';
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover'; // لضمان تناسب الصورة مع الإطار
                    img.src = URL.createObjectURL(file);

                    img.onload = function() {
                        URL.revokeObjectURL(img.src); // تحرير الذاكرة
                    };

                    container.appendChild(img);
                }
            }
        };
    </script>


@endsection
