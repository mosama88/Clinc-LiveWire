<div>
    <div>
<div class="row">
        {{-- أسم المريض --}}
        <div class="form-group col-4">
            <input type="text" class="form-control font-w" wire:model.live="search_name" id="exampleInputName"
                   placeholder="أبحث باسم المريض">
        </div>



        {{-- كود المريض --}}
        <div class="form-group col-4">
            <input type="text" class="form-control font-w" wire:model.live="search_patient_code"
                   oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="patient_code"
                   placeholder="أبحث بكود المريض">
        </div>

    {{-- رقم قومى --}}
    <div class="form-group col-4">
        <input type="text" class="form-control font-w" wire:model.live="search_national_id"
               oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="national_id"
               placeholder="أبحث برقم قومى">
    </div>

        {{-- كود المريض --}}
        <div class="form-group col-4">
            <input type="text" class="form-control font-w" wire:model.live="search_mobile"
                   oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="mobile"
                   placeholder="أبحث برقم المحمول">
        </div>

        <div class="form-group col-4">
            <select wire:model.live="search_gender" id="gender" class="form-control font-w">
                <option value="">-- بحث بنوع الجنس --</option>
                <option value="1">ذكر</option>
                <option value="2">أنثى</option>
            </select>
        </div>

        {{-- التخصص --}}
        <div class="form-group col-md-4">
            <select wire:model.live = "search_nationality_id" id="search_nationality_id"
                    class="form-control select2 font-w" style="width: 100%;">
                <option value="">-- إبحث بالجنسية --</option>
                @if (!empty($other['nationalities']) && isset($other['nationalities']))
                    @foreach ($other['nationalities'] as $nationality)
                        <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                    @endforeach
                @else
                    لا توجد بيانات
                @endif
            </select>
        </div>

        {{-- شركات التامين --}}
        <div class="form-group col-md-4">
            <select wire:model.live = "search_insurance_id" id="search_insurance_id"
                    class="form-control select2 font-w" style="width: 100%;">
                <option value="">-- إبحث شركات التامين --</option>
                @if (!empty($other['insurance_companies']) && isset($other['insurance_companies']))
                    @foreach ($other['insurance_companies'] as $insurance)
                        <option value="{{ $insurance->id }}">{{ $insurance->name }}</option>
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
            <th>كود المريض</th>
            <th>أسم المريض</th>
            <th>موبايل</th>
            <th>البريد الالكترونى</th>
            <th>المحافظة</th>
            <th>الجنسية</th>
            <th>العمر</th>
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
                <td>{{ $info['patient_code'] }}</td>
                <td>{{ $info['name'] }}</td>
                <td>{{ $info['mobile'] }}</td>
                <td>{{ $info['email'] }}</td>
                <td>{{ $info->governorate->name }}</td>
                <td>{{ $info->nationality->name }}</td>
                <td>{{$info->getAgeAttribute()}} سنه</td>
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
        {{ $data->links() }}
    </div>


    {{-- Search Location /> --}}
</div>


</div>
</div>
</div>
