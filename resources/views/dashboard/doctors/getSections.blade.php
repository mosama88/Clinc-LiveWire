<label for="exampleInputName">القسم</label>
<select name="section_id" id="section_id" class="form-control select2 font-w" style="width: 100%;">
    <option selected>-- أختر القسم --</option>
    @if (!empty($other['sections']) && isset($other['sections']))
        @foreach ($other['sections'] as $section)
            <option @if (old('section_id') == $section->id) selected="selected" @endif value="{{ $section->id }}">
                {{ $section->name }}</option>
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
