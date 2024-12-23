@extends('dashboard.layouts.master')
@section('admin_title', 'أضافة طبيب')
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
@section('page-header', ' أضافة طبيب')
@section('page-header_desc', 'أضافة طبيب')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.doctors.index') }}">جدول الأطباء</a></li>
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
                    <h3 class="card-title">أضف طبيب</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('dashboard.doctors.store') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row col-md-12">
                            {{-- أسم الطبيب --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">أسم الطبيب</label>
                                <input type="text" class="form-control font-w" name="name" value="{{ old('name') }}"
                                    id="exampleInputName" placeholder="أدخل اسم الطبيب">
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
                                    value="{{ old('national_id') }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
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
                                <input type="text" class="form-control font-w" name="email" value="{{ old('email') }}"
                                    id="exampleInputemail" placeholder="أدخل البريد الالكترونى">
                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- الموبايل --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">الموبايل</label>
                                <input type="text" class="form-control font-w" name="mobile" value="{{ old('mobile') }}"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="mobile"
                                    placeholder="أدخل المويايل">
                                @error('mobile')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            {{-- العنوان --}}
                            <div class="form-group col-md-12">
                                <label for="exampleInputName">العنوان</label>
                                <input type="text" class="form-control font-w" name="address" value="{{ old('address') }}"
                                    id="address" placeholder="أدخل .....">
                                @error('address')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            {{-- الجنس --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">الجنس</label>
                                <select name="gender" id="gender" class="form-control font-w">
                                    <option selected>-- أختر الجنس --</option>
                                    <option value="1">ذكر</option>
                                    <option value="2">انثى</option>
                                </select> @error('gender')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- القسم --}}
                            <div class="form-group col-md-4">
                                <label for="exampleInputName">القسم</label>
                                <select name="section_id" id="section_id" class="form-control select2 font-w"
                                    style="width: 100%;">
                                    <option selected>-- أختر القسم --</option>
                                    @if (!empty($other['sections']) && isset($other['sections']))
                                        @foreach ($other['sections'] as $section)
                                            <option @if (old('section_id') == $section->id) selected="selected" @endif
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
                                <select name="specialization_id" id="specialization_id" class="form-control select2 font-w"
                                    style="width: 100%;">
                                    <option selected>-- أختر التخصص --</option>
                                    @if (!empty($other['specializations']) && isset($other['specializations']))
                                        @foreach ($other['specializations'] as $specialization)
                                            <option @if (old('specialization_id') == $specialization->id) selected="selected" @endif
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





                            {{-- الجنسية --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">الجنسية</label>
                                <select name="nationality_id" id="nationality_id" class="form-control select2 font-w"
                                    style="width: 100%;">
                                    <option selected>-- أختر الجنسية --</option>
                                    @if (!empty($other['nationalities']) && isset($other['nationalities']))
                                        @foreach ($other['nationalities'] as $nationality)
                                            <option @if (old('nationality_id') == $nationality->id) selected="selected" @endif
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

                            {{-- درجة الدكتور الوظيفية --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName">درجة الدكتور الوظيفية</label>
                                <input type="text" class="form-control font-w" name="title" value="{{ old('title') }}"
                                    id="title" placeholder="أدخل .....">
                                @error('title')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- تفاصيل --}}
                            <div class="form-group col-md-12">
                                <label for="exampleInputName">تفاصيل</label>
                                <input type="text" class="form-control font-w" name="details" value="{{ old('details') }}"
                                    id="details" placeholder="أدخل .....">
                                @error('details')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- صورة الطبيب --}}
                            <div class="form-group col-md-12">
                                <label for="exampleInputFile">صورة الطبيب</label>
                                <input class="form-control @error('photo') is-invalid @enderror" accept="image/*"
                                    name="photo" type="file" id="example-text-input" onchange="loadFile(event)">
                                    <div id="output" class="d-flex flex-wrap my-4"></div>

                                @error('photo')
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
    var loadFile = function(event) {
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
@endsection
