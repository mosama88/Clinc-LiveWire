@extends('dashboard.layouts.master')
@section('admin_title', 'الأطباء')
@section('css')
@endsection
@section('active_appointmentIndex_doctors', 'active')
@section('page-header', 'جدول الأطباء')
@section('page-header_desc', 'جدول الأطباء')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">لوحة التحكم</a></li>
@endsection
@section('content')

    {{-- ./row --}}
    <div class="row">
        <div class="col-md-12">
           
            {{-- Content --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول مواعيد الأطباء</h3>
                </div>


                <div class="card-header">

@livewire('appoint-ment-doctor-component')

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
