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
                <div class="col-xl-6 offset-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-0 header-title mb-4">
                                Teacher - Create
                                <a href="{{ route('teachers.index') }}" class="btn btn-sm btn-primary float-right">Teacher List</a>
                            </div>
                            {!! Form::open(['route' =>'teachers.store'])!!}

                            <div class="row">
                                <div class="col-md-6">
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

                                <div class="col-md-6">
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
                            </div>

                            <div class="row">
                                <div class="col-md-6">
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

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-2 align-self-center">
                                            {!! Form::label('Room Type') !!}
                                        </div>
                                        <div class="col-md-10">
                                            {!! Form::select('room_type', [1=> 'Male',2 => 'Female'], null ,['class'=> 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group row">
                                <div class="col-md-2 align-self-center">
                                    {!! Form::label('Room Type') !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::select('room_type', [0=> 'Theory',1 => 'Sessional'], null ,['class'=> 'form-control']) !!}
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



