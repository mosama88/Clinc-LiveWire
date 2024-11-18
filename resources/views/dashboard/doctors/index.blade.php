@extends('dashboard.layouts.master')
@section('admin_title', 'الأطباء')
@section('css')
@endsection
@section('active-doctors', 'active')
@section('page-header', 'جدول الأطباء')
@section('page-header_desc', 'جدول الأطباء')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">لوحة التحكم</a></li>
@endsection
@section('content')

    {{-- ./row --}}
    <div class="row">
        <div class="col-md-12">
            @if (session('success') != null)
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            {{-- Content --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول الأطباء</h3>
                </div>
                <div class="card-header">
                    <a href="{{ route('dashboard.doctors.create') }}" type="button"
                        class="btn btn-md btn-primary btn-flat">
                        <i class="fas fa-plus ml-2"></i> أضافة طبيب جديد
                    </a>
                </div>

                <div class="card-header">
                    @livewire('search-doctor-component')

                </div>
                <!-- /.card-body -->
            </div>

        </div>

    </div>
</div>
    <!-- /.row -->



@endsection
@section('scripts')

    <script>
        $('#modal-default').modal({
            keyboard: false,
            show: false,
            backdrop: 'static',

        });

        $('.Edit-modal-default').modal({
            keyboard: false,
            show: false,
            backdrop: 'static',

        });

        $('.Delete-modal-default').modal({
            keyboard: false,
            show: false,
            backdrop: 'static',

        });
    </script>


@endsection
