@extends('dashboard.layouts.master')
@section('admin_title', 'المدن')
@section('css')
@endsection
@section('active-cities', 'active')
@section('page-header', 'جدول المدن')
@section('page-header_desc', 'جدول المدن')
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
                    <h3 class="card-title">جدول المدن</h3>
                </div>
                <div class="card-header">
                    <button type="button" class="btn btn-md btn-primary btn-flat" data-toggle="modal"
                        data-target="#modal-default">
                        <i class="fas fa-plus ml-2"></i> أضافة مدينة جديدة
                    </button>
                    @include('dashboard.settings.cities.create')
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>أسم المدينه</th>
                                <th>المحافظة</th>
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
                                    <td>{{ $info['name'] }}</td>
                                    <td>{{ $info->governorate->name }}</td>
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
                                                    class="btn btn-md btn-primary btn-flat" data-toggle="modal"
                                                    data-target="#edit{{ $info->id }}">
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
                                        @include('dashboard.settings.cities.delete')
                                        @include('dashboard.settings.cities.edit')
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
