@extends('layouts.app')

@section('title', 'Assign Course')

@section('stylesheets')
    <!-- DataTables -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <!-- end row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-0 header-title mb-4">
                                Assigned Course - List
                                <a href="{{ route('assign_courses.create') }}" class="btn btn-sm btn-primary float-right">Assign New</a>
                            </div>
                            @if (Session::has('message'))
                                <div class="alert-dismissable alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
                                    </button>
                                    {{ Session('message') }}
                                </div>
                            @endif
                            @if (Session::has('delete-message'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
                                    </button>
                                    {{ Session('delete-message') }}
                                </div>
                            @endif
                            <table id="datatable-buttons"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Teacher Name</th>
                                    <th>Designation</th>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Credit</th>
                                    <th>Program/Batch/Session</th>
                                    <th>Session</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
{{--                                   @php $i = 1 @endphp--}}
                                   @foreach($assign_courses as $assign_course)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $assign_course->teacher->user->firstname." ".$assign_course->teacher->user->lastname }}</td>
                                        <td>{{ $assign_course->teacher->rank->rank }}</td>
                                        <td>{{ $assign_course->course->course_code }}</td>
                                        <td>{{ $assign_course->course->course_name }}</td>
                                        <td>{{ $assign_course->course->course_code }}</td>
                                        <td>{{ $assign_course->batch->department->department_name. '-' . $assign_course->batch->batch_no. '-' . $assign_course->batch->shift->slug }}</td>
                                        <td>{{ $assign_course->session->session->session_name."-".$assign_course->session->year }}</td>
                                        <td>
                                            <a href="{{ route('assign_courses.edit', $assign_course->id) }}"
                                               class="btn btn-sm btn-primary">Edit</a>

                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".bs-example-modal-center{{$assign_course->id}}">Delete</button>
                                        </td>
                                    </tr>

{{--                                    @php $i++ @endphp--}}
                                    <div class="modal fade bs-example-modal-center{{$assign_course->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5>Are you sure? You want to delete this?</h5>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::open(['route' => ['assign_courses.destroy', $assign_course->id ], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Yes', ['class' => 'btn btn-lg btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                    <button type="button" class="btn btn-lg btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center{{$assign_course->id}}"> No </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach



                                </tbody>
                            </table>
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
    <!-- Datatable init js -->

    <!-- Required datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="../"></script>
    <!-- Buttons examples -->


    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print',]
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });
    </script>


@endpush
