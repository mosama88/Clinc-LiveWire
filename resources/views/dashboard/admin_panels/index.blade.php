@extends('dashboard.layouts.master')
@section('admin_title', 'الضبط العام')
@section('css')
@endsection
@section('active-admin_panels', 'active')
@section('page-header', 'جدول الضبط العام')
@section('page-header_desc', 'جدول الضبط العام')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">لوحة التحكم</a></li>
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
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            {{-- Content --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول الضبط العام</h3>
                </div>
                <div class="card-header">
                    <a type="button" href="{{ route('dashboard.admin_panels.edit', $data['id']) }}"
                        class="btn btn-md btn-primary btn-flat"><i class="fas fa-edit ml-2"></i> تعديل بيانات الشركة</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">


                    @if (!empty($data) && isset($data))
                        <table class="table table-bordered mg-b-0 text-md-nowrap">
                            <tr>
                                <td class="wd-500">اسم الشركة</td>
                                <td> {{ $data['company_name'] }}</td>
                            </tr>
                            <tr>
                                <td class="wd-500"> حالة التفعيل</td>
                                <td>
                                    @if ($data['system_status'] == 1)
                                        مفعل
                                    @else
                                        معطل
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="wd-500">هاتف الشركة</td>
                                <td> {{ $data['phones'] }}</td>
                            </tr>
                            <tr>
                                <td class="wd-500">عنوان الشركة</td>
                                <td> {{ $data['address'] }}</td>
                            </tr>
                            <tr>
                                <td class="wd-500">بريد الشركة</td>
                                <td> {{ $data['email'] }}</td>
                            </tr>


                            <tr>
                                <td class="wd-500">شعار الشركة</td>
                                <td>
                                    @if ($data->image)
                                        <img class="img-thumbnail rounded me-2" alt="200x200"
                                            style="width: 80px; height:50px"
                                            src="{{ asset('dashboard/assets/uploads/AdminPanels/photo/' . $data->image->filename) }}"
                                            data-holder-rendered="true">
                                    @else
                                        <img alt="Responsive image" style="width: 80px; height:50px"
                                            src="{{ asset('dashboard/assets/uploads/logo-default.png') }}">
                                    @endif
                                </td>
                            </tr>

                        </table>
                    @else
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                            لا توجد بيانات لعرضها!!
                        </div>
                    @endif



                </div>
                <!-- /.card-body -->
            </div>

        </div>

    </div>
    <!-- /.row -->



@endsection
@section('scripts')
@endsection
