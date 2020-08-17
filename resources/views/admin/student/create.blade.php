{{--@extends('layouts.app')--}}

{{--@section('title', 'Student')--}}

{{--@section('stylesheets')--}}
{{--    <!-- DataTables -->--}}
{{--    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"--}}
{{--          type="text/css"/>--}}
{{--    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <!-- page wrapper start -->--}}
{{--    <!-- page-title-box -->--}}
{{--    <div class="page-content-wrapper">--}}
{{--        <div class="container-fluid">--}}
{{--            <!-- end row -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-6 offset-xl-3">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            @if (Session::has('error'))--}}
{{--                                <div class="alert-dismissable alert alert-success">--}}
{{--                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x--}}
{{--                                    </button>--}}
{{--                                    {{ Session('error') }}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            <div class="mt-0 header-title mb-4">--}}
{{--                                student Session - Create--}}
{{--                                <a href="{{ route('students.index') }}" class="btn btn-sm btn-primary float-right">student Session List</a>--}}
{{--                            </div>--}}
{{--                            {!! Form::open(['route' =>'students.store'])!!}--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        {!! Form::label('Student Number') !!}--}}
{{--                                        {!! Form::select('student_number', null ,['class'=> 'form-control']) !!}--}}

{{--                                        @if ($errors->has('student_number'))--}}
{{--                                            <span class="help-block">--}}
{{--                                            {!! $errors->first('student_number') !!}--}}
{{--                                        </span>--}}
{{--                                        @endif--}}

{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        {!! Form::label('Session') !!}--}}
{{--                                        {!! Form::select('session_id', $session, null ,['class'=> 'form-control']) !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        {!! Form::label('Shift') !!}--}}
{{--                                        {!! Form::select('shift_id', $shift, null ,['class'=> 'form-control']) !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                            {!! Form::submit('Create',['class' => 'btn btn-sm btn-primary'] ) !!}--}}

{{--                            {!! Form::close() !!}--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <!-- end row -->--}}
{{--        </div>--}}
{{--        <!-- end container-fluid -->--}}
{{--    </div>--}}
{{--    <!-- end page content-->--}}
{{--@endsection--}}



