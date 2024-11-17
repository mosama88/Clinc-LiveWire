@extends('dashboard.layouts.master')
@section('admin_title', 'الموظفين')
@section('css')
@endsection
@section('active-employees', 'active')
@section('page-header', 'جدول الموظفين')
@section('page-header_desc', 'جدول الموظفين')
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

                    <div class="row">
                        {{-- أسم الموظف --}}
                        <div class="form-group col-4">
                            <input type="text" class="form-control font-w" name="name" id="exampleInputName"
                                placeholder="أبحث باسم الموظف">
                        </div>



                        {{-- كود الموظف --}}
                        <div class="form-group col-4">
                            <input type="text" class="form-control font-w" name="employee_code"
                                oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="employee_code"
                                placeholder="أبحث بكود الموظف">
                        </div>


                        <div class="form-group col-4">
                            <select name="gender" id="gender" class="form-control font-w">
                                <option value="" disabled selected>-- بحث بنوع الجنس --</option>
                                <option value="1">ذكر</option>
                                <option value="2">أنثى</option>
                            </select>
                        </div>



                        {{-- الجنسية --}}
                        <div class="form-group col-4">
                            <select name="nationality_id" id="nationality_id" class="form-control select2 font-w">
                                <option value="" disabled selected>-- بحث بالجنسيات --</option>
                                @if (!empty($other['nationalities']) && isset($other['nationalities']))
                                    @foreach ($other['nationalities'] as $nationality)
                                        <option @if ($nationality['nationality_id'] == $nationality->id) ) selected @endif
                                            value="{{ $nationality->id }}">{{ $nationality->name }}
                                        </option>
                                    @endforeach
                                @else
                                    لا توجد بيانات
                                @endif
                            </select>
                        </div>


                        {{-- الأدارة --}}
                        <div class="form-group col-4">
                            <select name="department_id" id="department_id" class="form-control select2 font-w">
                                <option value="" disabled selected>-- بحث بالاداره --</option>
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
                        </div>

                    </div>













                </div>
                <div class="card-header">
                    <a href="{{ route('dashboard.employees.create') }}" type="button"
                        class="btn btn-md btn-primary btn-flat">
                        <i class="fas fa-plus ml-2"></i> أضافة موظف جديد
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>كود الموظف</th>
                                <th>أسم الموظف</th>
                                <th> الفئات الوظيفية</th>
                                <th>البريد الالكترونى</th>
                                <th>المحافظة</th>
                                <th>الأدارة</th>
                                <th>الفرع</th>
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
                                    <td>{{ $info['employee_code'] }}</td>
                                    <td>{{ $info['name'] }}</td>
                                    <td>{{ $info->jobCategory->name }}</td>
                                    <td>{{ $info['email'] }}</td>
                                    <td>{{ $info->governorate->name }}</td>
                                    <td>{{ $info->department->name }}</td>
                                    <td>{{ $info->branch->name }}</td>
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



                                                <a class="dropdown-item" type="button"
                                                    class="btn btn-md btn-primary btn-flat"
                                                    href="{{ route('dashboard.employees.show', $info->id) }}">
                                                    <i class="fas fa-eye ml-2"></i>
                                                    عرض بيانات
                                                </a>


                                                <a class="dropdown-item" type="button"
                                                    class="btn btn-md btn-primary btn-flat"
                                                    href="{{ route('dashboard.employees.edit', $info->id) }}">
                                                    <i class="fas fa-edit ml-2"></i>
                                                    تعديل
                                                </a>


                                                <button class="dropdown-item" type="button"
                                                    class="btn btn-md btn-primary btn-flat" data-toggle="modal"
                                                    data-target="#delete{{ $info->id }}">
                                                    <i class="fas fa-trash-alt ml-1"></i>حذف
                                                </button>

                                            </div>
                                        </div>
                                        @include('dashboard.employees.delete')
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
