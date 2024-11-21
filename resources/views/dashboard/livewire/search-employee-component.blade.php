<div>


    <div class="row">
        {{-- أسم الموظف --}}
        <div class="form-group col-4">
            <input type="text" class="form-control font-w" wire:model.live="search_name" id="exampleInputName"
                placeholder="أبحث باسم الموظف">
        </div>



        {{-- كود الموظف --}}
        <div class="form-group col-4">
            <input type="text" class="form-control font-w" wire:model.live="search_employee_code"
                oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="employee_code"
                placeholder="أبحث بكود الموظف">
        </div>

        {{-- رقم قومى --}}
        <div class="form-group col-4">
            <input type="text" class="form-control font-w" wire:model.live="search_national_id"
                   oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="national_id"
                   placeholder="أبحث برقم قومى">
        </div>

        <div class="form-group col-4">
            <select wire:model.live="search_gender" id="gender" class="form-control font-w">
                <option value="">-- بحث بنوع الجنس --</option>
                <option value="1">ذكر</option>
                <option value="2">أنثى</option>
            </select>
        </div>



        {{-- الجنسية --}}
        <div class="form-group col-4">
            <select wire:model.live="search_nationality_id" id="nationality_id" class="form-control select2 font-w">
                <option value="">-- بحث بالجنسيات --</option>
                @if (!empty($other['nationalities']) && isset($other['nationalities']))
                    @foreach ($other['nationalities'] as $nationality)
                        <option @if ($nationality['nationality_id'] == $nationality->id) ) selected @endif value="{{ $nationality->id }}">
                            {{ $nationality->name }}
                        </option>
                    @endforeach
                @else
                    لا توجد بيانات
                @endif
            </select>
        </div>


        {{-- الأدارة --}}
        <div class="form-group col-4">
            <select wire:model.live="search_department_id" id="department_id" class="form-control select2 font-w">
                <option value="">-- بحث بالاداره --</option>
                @if (!empty($other['departments']) && isset($other['departments']))
                    @foreach ($other['departments'] as $department)
                        <option @if (old('department_id', $department['department_id'] == $department->id)) selected @endif value="{{ $department->id }}">
                            {{ $department->name }}
                        </option>
                    @endforeach
                @else
                    لا توجد بيانات
                @endif
            </select>
        </div>

        {{-- الفرع --}}
        <div class="form-group col-4">
            <select wire:model.live="search_branch_id" id="branch_id" class="form-control select2 font-w">
                <option value="">-- بحث بالفرع --</option>
                @if (!empty($other['branches']) && isset($other['branches']))
                    @foreach ($other['branches'] as $branch)
                        <option @if ($branch['branch_id'] == $branch->id) ) selected @endif value="{{ $branch->id }}">
                            {{ $branch->name }}
                        </option>
                    @endforeach
                @else
                    لا توجد بيانات
                @endif
            </select>
        </div>

    </div>


    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>صورة الموظف</th>
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
                        <td>
                            @if ($info->image)
                                <img class="img-thumbnail rounded me-2 " alt="200x200" style="width: 50px; height:50px"
                                    src="{{ asset('dashboard/assets/uploads/Employee/photo/' . $info->image->filename) }}"
                                    data-holder-rendered="true">
                            @elseif(empty($info->image) && $info['gender'] == 1)
                                <img alt="Responsive image" style="width: 50px; height:50px"
                                    src="{{ asset('dashboard/assets/uploads/male-employee-default.png') }}">
                            @else
                                <img alt="Responsive image" style="width: 50px; height:50px"
                                    src="{{ asset('dashboard/assets/uploads/female-employee-default.png') }}">
                            @endif
                        </td>
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
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="true">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu" x-placement="top-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -165px, 0px);">



                                    <a class="dropdown-item" type="button" class="btn btn-md btn-primary btn-flat"
                                        href="{{ route('dashboard.employees.show', $info->id) }}">
                                        <i class="fas fa-eye ml-2"></i>
                                        عرض بيانات
                                    </a>


                                    <a class="dropdown-item" type="button" class="btn btn-md btn-primary btn-flat"
                                        href="{{ route('dashboard.employees.edit', $info->id) }}">
                                        <i class="fas fa-edit ml-2"></i>
                                        تعديل
                                    </a>


                                    <button class="dropdown-item" type="button" class="btn btn-md btn-primary btn-flat"
                                        data-toggle="modal" data-target="#delete{{ $info->id }}">
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
            {{ $data->links() }}
        </div>
    </div>
    <!-- /.card-body -->

</div>
