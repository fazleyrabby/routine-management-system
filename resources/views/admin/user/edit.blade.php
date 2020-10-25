@extends('layouts.app')

@section('title', 'user')

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
                                user - Edit
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary float-right">user List</a>
                            </div>
                            {!! Form::open(['route' => ['users.update', $user->id], "method"=>"put" ])!!}

                            <div class="form-group row @if($errors->has('building')) has-error @endif">
                                <div class="col-md-2 align-self-center">
                                    {!! Form::label('Building') !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('building', $user->building, ['class'=> 'form-control']) !!}
                                    @if ($errors->has('building'))
                                        <span class="help-block">
                                            {!! $errors->first('building') !!}
                                        </span>
                                    @endif
                                </div>
                            </div>


                            {!! Form::submit('Update',['class' => 'btn btn-sm btn-warning'] ) !!}

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



