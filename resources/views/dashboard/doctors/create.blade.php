@extends('dashboard.layouts.master')
@section('admin_title', 'أضافة طبيب')
@section('css')
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
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">أسم الطبيب</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    id="exampleInputName" placeholder="أدخل اسم الطبيب">
                                @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputName">الرقم القومى</label>
                                <input type="text" class="form-control" name="national_id"
                                    value="{{ old('national_id') }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                    id="national_id" placeholder="أدخل الرقم القومى">
                                @error('national_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">البريد الالكترونى</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                    id="exampleInputemail" placeholder="أدخل البريد الالكترونى">
                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputName">الموبايل</label>
                                <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="mobile"
                                    placeholder="أدخل المويايل">
                                @error('mobile')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="exampleInputName">العنوان</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                                    id="address" placeholder="أدخل .....">
                                @error('address')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>


                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">الجنس</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option selected>-- أختر الجنس --</option>
                                    <option value="1">ذكر</option>
                                    <option value="0">انثى</option>
                                </select> @error('gender')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="exampleInputName">القسم</label>
                                    <select name="section_id" id="section_id" class="custom-select">
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

                                <div class="form-group col-6">
                                    <label for="exampleInputName">التخصص</label>
                                    <select name="specialization_id" id="specialization_id" class="custom-select">
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
                            </div>


                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="exampleInputName">الجنسية</label>
                                    <select name="nationality_id" id="nationality_id" class="custom-select">
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
                                    @error('section_id')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group col-6">
                                    <label for="exampleInputName">درجة الدكتور الوظيفية</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ old('title') }}" id="title" placeholder="أدخل .....">
                                    @error('title')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">صورة الطبيب</label>
                                <input class="form-control @error('photo') is-invalid @enderror" accept="image/*"
                                    name="photo" type="file" id="example-text-input" onchange="loadFile(event)">
                                <img class="rounded-circle avatar-xl my-4 mx-3" style="width: 100px;height: 100px"
                                    id="output" />
                                @error('photo')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">تأكيد البيانات</button>
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
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
