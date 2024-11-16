<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة فئة الوظيفية جديدة</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.jobCategories.store') }}" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">أسم الفئة الوظيفية</label>
                            <input class="form-control" name="name" type="text"
                                placeholder="أكتب أسم الفئة الوظيفية">
                            @error('name')
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
