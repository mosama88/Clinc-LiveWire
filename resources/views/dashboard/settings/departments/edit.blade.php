<div class="modal Edit-modal-default fade" id="edit{{ $info->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> تعديل الأداره </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.departments.update', $info->id) }}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">أسم الأداره</label>
                            <input class="form-control" name="name" value="{{ $info['name'] }}" type="text"
                                placeholder="أكتب أسم الأداره">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="">تليفون الأدارة</label>
                            <input class="form-control" name="phones" value="{{ $info['phones'] }}" type="text"
                                placeholder="أكتب تليفون الأدارة">
                            @error('phones')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">ملاحظات عن الأدارة</label>
                            <input class="form-control" value="{{ $info['notes'] }}" name="notes" type="text"
                                placeholder="أكتب ملاحظات عن الأدارة">
                            @error('notes')
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
