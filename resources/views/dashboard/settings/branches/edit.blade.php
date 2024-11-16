<div class="modal Edit-modal-default fade" id="edit{{ $info->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> تعديل الفرع</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.branches.update', $info->id) }}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">أسم الفرع</label>
                            <input class="form-control" name="name" value="{{ $info['name'] }}" type="text"
                                placeholder="أكتب أسم الفرع">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">عنوان الفرع</label>
                            <input class="form-control" name="address" value="{{ $info['address'] }}" type="text"
                                placeholder="أكتب عنوان الفرع">
                            @error('address')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">تليفون الفرع</label>
                            <input class="form-control" name="phone" type="text" value="{{ $info['phone'] }}"
                                placeholder="أكتب تليفون الفرع">
                            @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="">البريد الالكترونى</label>
                            <input class="form-control" value="{{ $info['email'] }}" name="email" type="text"
                                placeholder="أكتب البريد الالكترونى للفرع">
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>محافظة</label>
                            <select name="governorate_id" class="custom-select">
                                <option selected>-- أختر المحافظة --</option>

                                @if (!empty($other['governorates']) && isset($other['governorates']))
                                    @foreach ($other['governorates'] as $governrate)
                                        <option @if (old('governorate_id', $info['governorate_id']) == $governrate->id) selected="selected" @endif
                                            value="{{ $governrate->id }}">{{ $governrate->name }}</option>
                                    @endforeach
                                @else
                                    لا توجد بيانات
                                @endif
                            </select>
                            @error('governorate_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>المدينة</label>
                            <select name="city_id" class="custom-select">
                                <option selected>-- أختر المدينة --</option>
                                @if (!empty($other['cities']) && isset($other['cities']))
                                    @foreach ($other['cities'] as $city)
                                        <option @if (old('city_id', $info['city_id']) == $city->id) selected="selected" @endif
                                            value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                @else
                                    لا توجد بيانات
                                @endif
                            </select>
                            @error('city_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>حالة الفرع</label>
                            <select name="status" class="custom-select">
                                <option selected>-- أختر الحالة --</option>
                                <option @if ($info['status'] == 1) selected @endif value="1">مفعل</option>
                                <option @if ($info['status'] == 0) selected @endif value="0">غير مفعل
                                </option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                    </div>
                    <!-- /.card-body -->

            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">تأكيد البيانات</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
