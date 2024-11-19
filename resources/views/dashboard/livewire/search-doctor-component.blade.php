<div>
    <div>
        <div class="row">
            {{-- أسم الدكتور --}}
            <div class="form-group col-4">
                <input type="text" class="form-control font-w" wire:model.live="search_name" id="exampleInputName"
                    placeholder="أبحث باسم الدكتور">
            </div>



            {{-- كود الدكتور --}}
            <div class="form-group col-4">
                <input type="text" class="form-control font-w" wire:model.live="search_doctor_code"
                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="doctor_code"
                    placeholder="أبحث بكود الدكتور">
            </div>


            <div class="form-group col-4">
                <select wire:model.live="search_gender" id="gender" class="form-control font-w">
                    <option value="">-- بحث بنوع الجنس --</option>
                    <option value="1">ذكر</option>
                    <option value="2">أنثى</option>
                </select>
            </div>



            {{--  درجة الدكتور الوظيفية --}}
            <div class="form-group col-4">
                <input type="text" class="form-control font-w" wire:model.live="search_title"
                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="title"
                    placeholder="أبحث بدرجة الدكتور الوظيفية....">
            </div>

            {{-- التخصص --}}
            <div class="form-group col-md-4">
                <select wire:model.live = "search_specialization" id="search_specialization"
                    class="form-control select2 font-w" style="width: 100%;">
                    <option value="">-- إبحث بالتخصص --</option>
                    @if (!empty($other['specializations']) && isset($other['specializations']))
                        @foreach ($other['specializations'] as $specialization)
                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
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

            {{-- القسم --}}
            <div class="form-group col-md-4">
                <select wire:model.live = "search_section_id" id="search_section_id" class="form-control select2 font-w"
                    style="width: 100%;">
                    <option value="">-- إبحث بالقسم --</option>
                    @if (!empty($other['sections']) && isset($other['sections']))
                        @foreach ($other['sections'] as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    @else
                        لا توجد بيانات
                    @endif
                </select>
            </div>



        </div>
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
                        <td>
                            @foreach ($info->doctorappointments as $appointment)
                                {{ $appointment->name }}
                                @if(($loop->last) > 0)
                                    {{''}}
                                @else
                                    {{' , '}}
                                @endif
                            @endforeach</td>
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
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="true">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu" x-placement="top-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -165px, 0px);">



                                    <a class="dropdown-item" type="button" class="btn btn-md btn-primary btn-flat"
                                        href="{{ route('dashboard.doctors.show', $info->id) }}">
                                        <i class="fas fa-eye ml-2"></i>
                                        عرض بيانات
                                    </a>


                                    <a class="dropdown-item" type="button" class="btn btn-md btn-primary btn-flat"
                                        href="{{ route('dashboard.doctors.edit', $info->id) }}">
                                        <i class="fas fa-edit ml-2"></i>
                                        تعديل
                                    </a>


                                    <button class="dropdown-item" type="button" class="btn btn-md btn-primary btn-flat"
                                        data-toggle="modal" data-target="#delete{{ $info->id }}">
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
