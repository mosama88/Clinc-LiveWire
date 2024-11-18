<label for="exampleInputName">التخصص</label>
<select name="specialization_id" id="specialization_id" class="form-control select2 font-w" style="width: 100%;">
    <option selected>-- أختر التخصص --</option>
    @if (!empty($other['specializations']) && isset($other['specializations']))
        @foreach ($other['specializations'] as $specialization)
            <option value="{{ $specialization->id }}">
                {{ $specialization->name }}</option>
        @endforeach
    @else
        لا توجد بيانات
    @endif
</select>

</div>

<script>
    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>
