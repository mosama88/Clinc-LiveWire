@extends('dashboard.layouts.master')
@section('admin_title', 'تعديل الضبط العام')
@section('css')
@endsection
@section('active-admin_panels', 'active')
@section('page-header', 'جدول تعديل الضبط العام')
@section('page-header_desc', 'جدول تعديل الضبط العام')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.admin_panels.index') }}">جدول الضبط العام</a></li>
@endsection
@section('content')

    {{-- ./row --}}
    <div class="row">
        <div class="col-md-12">
            @if (session('success') != null)
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif



            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            {{-- Content --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> تعديل الضبط العام</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body p-0">

                    <form action="{{ route('dashboard.admin_panels.update', $editData['id']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <table class="table table-bordered mg-b-0 text-md-nowrap">
                            <tr>
                                <td class="wd-500">اسم الشركة</td>
                                <td>
                                    <input type="text" class="form-control" name="company_name"
                                        value="{{ $editData['company_name'] }}" placeholder="Enter ...">
                                    @error('company_name')
                                        <div class="alert alert-danger my-2 my-2">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="wd-500"> حالة التفعيل</td>
                                <td>
                                    <select name="system_status" class="form-control">
                                        <option selected>-- أختر حالة التفعيل --</option>
                                        <option @if ($editData['system_status'] == 1) selected @endif value="1">مفعل
                                        </option>
                                        <option @if ($editData['system_status'] == 0) selected @endif value="0">غير مفعل
                                        </option>
                                    </select>

                                    @error('system_status')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="wd-500">هاتف الشركة</td>
                                <td>
                                    <input type="text" name="phones" class="form-control"
                                        value="{{ $editData['phones'] }}" placeholder="Enter ...">
                                    @error('phones')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="wd-500">عنوان الشركة</td>
                                <td>
                                    <input type="text" name="address" class="form-control"
                                        value="{{ $editData['address'] }}" placeholder="Enter ...">
                                    @error('address')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="wd-500">بريد الشركة</td>
                                <td>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ $editData['email'] }}" placeholder="Enter ...">
                                    @error('email')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>


                            <tr>
                                <td class="wd-500">لوجو الشركة</td>
                                <td>
                                    <input class="form-control" name="photo" type="file" id="formFile">
                                    @error('photo')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="wd-500">صورة الشركة</td>
                                <td>
                                    <input class="form-control" name="photo_cover" type="file" id="formFile">

                                    @error('photo_cover')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-center">
                                    <button type="submit" class="btn  btn-primary btn-flat">تعديل البيانات</button>
                                </td>
                            </tr>
                        </table>

                    </form>


                </div>
                <!-- /.card-body -->
            </div>

        </div>

    </div>
    <!-- /.row -->



@endsection
@section('scripts')
@endsection
