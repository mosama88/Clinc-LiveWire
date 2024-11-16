<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة تخصص جديد</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.specializations.store') }}" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">أسم التخصص</label>
                            <input class="form-control" name="name" type="text" placeholder="أكتب أسم التخصص">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>القسم </label>
                            <select name="section_id" id="section_id" class="custom-select">
                                <option selected>-- أختر القسم --</option>

                                @if (!empty($other['sections']) && isset($other['sections']))
                                    @foreach ($other['sections'] as $section)
                                        <option @if (old('section_id') == $section->id) selected="selected" @endif
                                            value="{{ $section->id }}">{{ $section->name }}</option>
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
