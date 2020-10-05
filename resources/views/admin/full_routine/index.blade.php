@extends('layouts.app')

@section('title', 'Routine')

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
                                Assign Routine
{{--                                <a href="{{ route('ranks.create') }}" class="btn btn-sm btn-primary float-right">Add New</a>--}}
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

                            @foreach($days as $day)
                                <h3 class="text-uppercase bg-dark p-2 text-light float-left"><strong>
                                        {{ $day->day_title }}</strong>
                                </h3>
                                <table class="table table-striped table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>

                                        <th>Batch</th>
                                        @foreach($timeslots as $timeslot)
                                        <th class="text-center">
                                            {{ date('g:i a', strtotime($timeslot->from)).'-'.date('g:i a', strtotime($timeslot->to)) }}
                                        </th>
                                        @endforeach
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach($sections as $section)
                                            <tr>
                                            <td>
                                                {{ $section->department_name.'-'.$section->batch_no.'-'.$section->slug }}
                                                 {{ $section->section_name ? '- '.$section->section_name : '' }}
                                            </td>
                                             @for($i=0; $i < $timeslots->count(); $i++)
                                                    <td class="text-center">
                                                        <span class="mb-2 d-block">
                                                           Course | Room | Teacher
                                                        </span>
                                                        <button id="{{ 'b'.$section->batch_id.'/s'.$section->section_id  }}" class="btn btn-primary btn-sm">Assign / Edit </button>
                                                    </td>
                                             @endfor
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @endforeach

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


{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#datatable').DataTable();--}}

{{--            //Buttons examples--}}
{{--            var table = $('#datatable-buttons').DataTable({--}}
{{--                lengthChange: false,--}}
{{--                buttons: ['copy', 'excel', 'pdf', 'print',]--}}
{{--            });--}}

{{--            table.buttons().container()--}}
{{--                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');--}}
{{--        });--}}
{{--    </script>--}}


@endpush
