<label for="exampleInputName">التخصص</label>
<select name="section_id" id="section_id" class="form-control select2 font-w" style="width: 100%;">
    <option selected>-- أختر القسم --</option>
    @if (!empty($other['sections']) && isset($other['sections']))
        @foreach ($other['sections'] as $section)
            <option @if (old('section_id') == $section->id) selected="selected" @endif value="{{ $section->id }}">
                {{ $section->name }}</option>
        @endforeach
</select>
</div>


<script>
    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>
