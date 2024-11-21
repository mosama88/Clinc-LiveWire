<div class="modal Edit-modal-default fade" id="edit{{ $info->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> تعديل بيانات الاشعه</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.radiologyServices.update', $info->id) }}" method="POST" role="form">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">أسم الأشعه</label>
                            <input class="form-control" name="name" value="{{ old('name',$info['name']) }}" type="text"
                                   placeholder="أكتب أسم الأشعه">
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">سعر الأشعه</label>
                            <input type="text" class="form-control font-w" name="price"
                                   value="{{ old('price',$info['price']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                   id="price" placeholder="أدخل سعر الأشعه">
                            @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">ملاحظات</label>
                            <textarea class="form-control font-w" rows="3" name="notes" placeholder="أدخل ...">{{ old('notes',$info['notes']) }}</textarea>
                            @error('phone')
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
