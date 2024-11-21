    <label>المدينة</label>
    <select name="city_id" id="city_id" class="custom-select">
        <option selected>-- أختر المدينة --</option>
        @if (!empty($other['cities']) && isset($other['cities']))
            @foreach ($other['cities'] as $city)
                <option @if (old('city_id') == $city->id) selected="selected" @endif value="{{ $city->id }}">
                    {{ $city->name }}</option>
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
