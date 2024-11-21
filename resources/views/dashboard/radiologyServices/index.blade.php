@extends('dashboard.layouts.master')
@section('admin_title', 'الفروع')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection
@section('active-radiologyServices', 'active')
@section('page-header', 'جدول الفروع')
@section('page-header_desc', 'جدول الفروع')
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
                    <h3 class="card-title">جدول الفروع</h3>
                </div>
                <div class="card-header">
                    <button type="button" class="btn btn-md btn-primary btn-flat" data-toggle="modal"
                        data-target="#modal-default">
                        <i class="fas fa-plus ml-2"></i> أضافة فرع جديد
                    </button>
                    @include('dashboard.settings.branches.create')
                </div>
                <!-- /.card-header -->
                <div class="card-body p-2">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>أسم الفرع</th>
                                <th> عنوان</th>
                                <th> تليفون</th>
                                <th>البريد الالكترونى</th>
                                <th>المحافظة</th>
                                <th>المدينة</th>
                                <th>الحالة</th>
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
                                    <td>{{ Str::limit($info['address'], 20) }}</td>
                                    <td>{{ $info['phone'] }}</td>
                                    <td>{{ $info['email'] }}</td>
                                    <td>{{ $info->governorate->name }}</td>
                                    <td>{{ $info->city->name }}</td>
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
                                        @include('dashboard.settings.branches.delete')
                                        @include('dashboard.settings.branches.edit')
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>

        </div>

    </div>
    <!-- /.row -->



@endsection
@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('dashboard') }}/assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('dashboard') }}/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
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

    <script>
        // Get Cities When Governorate Changes
        $(document).on('change', '#governorate_id', function() {
            const governorate_id = $(this).val();
            if (governorate_id) {
                getCities(governorate_id);
            }
        });

        function getCities(governorate_id) {
            $.ajax({
                url: '{{ route('dashboard.branches.getCities') }}',
                type: 'POST',
                dataType: 'html',
                cache: false,
                data: {
                    "_token": '{{ csrf_token() }}',
                    governorate_id: governorate_id
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
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>

@endsection