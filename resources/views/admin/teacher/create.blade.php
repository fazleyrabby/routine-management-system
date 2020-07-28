@extends('layouts.app')

@section('title', 'Teacher')

@section('stylesheets')
    <!-- DataTables -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <!-- page wrapper start -->
    <!-- page-title-box -->
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <!-- end row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-0 header-title mb-4">
                                Teacher - Create
                                <a href="{{ route('teachers.index') }}" class="btn btn-sm btn-primary float-right">Teacher List</a>
                            </div>
                            {!! Form::open(['route' =>'teachers.store', 'enctype'=> 'multipart/form-data'])!!}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group @if($errors->has('first_name')) has-error @endif">
                                        {!! Form::label('First Name') !!}
                                        {!! Form::text('first_name', null, ['class'=> 'form-control']) !!}
                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                            {!! $errors->first('first_name') !!}
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group @if($errors->has('last_name')) has-error @endif">
                                        {!! Form::label('Last Name') !!}
                                        {!! Form::text('last_name', null, ['class'=> 'form-control']) !!}
                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                            {!! $errors->first('last_name') !!}
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group @if($errors->has('username')) has-error @endif">
                                        {!! Form::label('username') !!}
                                        {!! Form::text('username', null, ['class'=> 'form-control']) !!}
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                            {!! $errors->first('username') !!}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group @if($errors->has('date_of_birth')) has-error @endif">
                                        {!! Form::label('Date of Birth') !!}
                                        {!! Form::text('date_of_birth', null, ['class'=> 'form-control']) !!}
                                        @if ($errors->has('date_of_birth'))
                                            <span class="help-block">
                                            {!! $errors->first('date_of_birth') !!}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('Gender') !!}
                                        {!! Form::select('gender', [1=> 'Male',2 => 'Female'], null ,['class'=> 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group @if($errors->has('email')) has-error @endif">
                                        {!! Form::label('E-mail') !!}
                                        {!! Form::text('email', null, ['class'=> 'form-control']) !!}
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            {!! $errors->first('email') !!}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('Role') !!}
                                        {!! Form::select('role', ['superadmin' => 'Super admin','admin' => 'Admin','subadmin'=> 'Sub Admin', 'teacher'=> 'Teacher'], null ,['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group @if($errors->has('photo')) has-error @endif">
                                        {!! Form::label('Photo','Photo', ['style'=> 'display:block;']) !!}
                                        {!! Form::file('photo', null, ['class'=> 'form-control']) !!}
                                        @if ($errors->has('photo'))
                                            <span class="help-block">
                                            {!! $errors->first('photo') !!}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('Department') !!}
                                        {!! Form::select('department', $departments, null ,['class'=> 'form-control']) !!}
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('Rank') !!}
                                        {!! Form::select('rank', $ranks, null ,['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('Join date') !!}
                                        {!! Form::date('join_date', null, ['class'=> 'form-control','id'=>'example-date-input']) !!}
                                    </div>
                                </div>

                            </div>

                            {!! Form::submit('Create',['class' => 'btn btn-sm btn-primary'] ) !!}

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end page content-->

    </div>
    <!-- page wrapper end -->
@endsection

@push('script')
    <script src="{{ asset('assets/pages/form-advanced.js') }}"></script>
@endpush



