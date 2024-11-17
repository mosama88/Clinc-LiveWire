@extends('dashboard.layouts.master')
@section('admin_title', 'الأطباء')
@section('css')
@endsection
@section('active-doctors', 'active')
@section('page-header', 'جدول الأطباء')
@section('page-header_desc', 'جدول الأطباء')
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
                    <h3 class="card-title">جدول الأطباء</h3>
                </div>
                <div class="card-header">
                    <a href="{{ route('dashboard.doctors.create') }}" type="button"
                        class="btn btn-md btn-primary btn-flat">
                        <i class="fas fa-plus ml-2"></i> أضافة طبيب جديد
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>كود الطبيب</th>
                                <th>أسم الطبيب</th>
                                <th>تليفون</th>
                                <th>البريد الالكترونى</th>
                                <th>التخصص</th>
                                <th>القسم</th>
                                <th>المواعيد</th>
                                <th>الحاله</th>
                                <th>أضافة بواسطة</th>
                                <th>تعديل بواسطة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data as $info)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $info['doctor_code'] }}</td>
                                    <td>{{ $info['name'] }}</td>
                                    <td>{{ $info['mobile'] }}</td>
                                    <td>{{ $info['email'] }}</td>
                                    <td>{{ $info->specialization->name }}</td>
                                    <td>{{ $info->section->name }}</td>
                                    <td>السبت</td>
                                    <td>
                                        @if ($info->status == 1)
                                            مفعل
                                        @else
                                            غير مفعل
                                        @endif
                                    </td>
                                    <td>{{ $info->createdBy->name }}</td>
                                    <td>
                                        @if ($info->updated_by > 0)
                                            {{ $info->updatedBy->name }}
                                        @else
                                            لا يوجد تحديث
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">العلميات</button>
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="true">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu" x-placement="top-start"
                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -165px, 0px);">


                                                <button class="dropdown-item" type="button"
                                                    class="btn btn-md btn-primary btn-flat"
                                                    href="{{ route('dashboard.doctors.edit', $info->id) }}">
                                                    <i class="fas fa-edit ml-2"></i>
                                                    تعديل
                                                </button>


                                                <button class="dropdown-item" type="button"
                                                    class="btn btn-md btn-primary btn-flat" data-toggle="modal"
                                                    data-target="#delete{{ $info->id }}">
                                                    <i class="fas fa-trash-alt ml-1"></i>حذف
                                                </button>

                                            </div>
                                        </div>
                                        @include('dashboard.doctors.delete')
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="col-12">
                        {{ $data->render('pagination::bootstrap-5') }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

        </div>

    </div>
    <!-- /.row -->



@endsection
@section('scripts')

    <script>
        $('#modal-default').modal({
            keyboard: false,
            show: false,
            backdrop: 'static',

        });

        $('.Edit-modal-default').modal({
            keyboard: false,
            show: false,
            backdrop: 'static',

        });

        $('.Delete-modal-default').modal({
            keyboard: false,
            show: false,
            backdrop: 'static',

        });
    </script>


@endsection
