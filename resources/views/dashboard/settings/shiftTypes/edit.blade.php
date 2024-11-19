<div class="modal Edit-modal-default fade" id="edit{{ $info->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> تعديل الشفت</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.shiftTypes.update', $info->id) }}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">أسم الشفت</label>
                            <input class="form-control" name="name" value="{{ old('name', $info['name']) }}"
                                type="text" placeholder="أكتب أسم الشفت">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">من</label>
                            <input type="time" name="from_time" id="from_time" class="form-control"
                                value="{{ old('from_time', $info['from_time']) }}" />
                            @error('from_time')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">الى</label>
                            <input type="time" name="to_time" id="to_time" class="form-control"
                                value="{{ old('to_time', $info['to_time']) }}" />
                            @error('to_time')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group d-none">
                            <label for="exampleInputName">عدد الساعات</label>
                            <input type="text" class="form-control font-w" name="total_hours"
                                value="{{ old('total_hours', $info['total_hours']) }}"
                                oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="total_hours"
                                placeholder="أدخل عدد الساعات">
                            @error('total_hours')
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
