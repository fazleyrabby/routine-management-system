@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- page wrapper start -->
        <!-- page-title-box -->
        <div class="page-content-wrapper">
            <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Teachers</h6>
                                    <h3 class="mb-3 mt-0">{{ $data['teacher'] }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Students</h6>
                                    <h3 class="mb-3 mt-0">{{ $data['student'] }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Courses</h6>
                                    <h3 class="mb-3 mt-0">{{ $data['course'] }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Batches</h6>
                                    <h3 class="mb-3 mt-0">{{ $data['batch'] }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            {{-- <div class="row">
                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-8 border-right">
                                    <h4 class="mt-0 header-title mb-4">Sales Report</h4>
                                    <div id="morris-area-example" class="dashboard-charts morris-charts"></div>
                                </div>
                                <div class="col-xl-4">
                                    <h4 class="header-title mb-4">Yearly Sales Report</h4>
                                    <div class="p-3">
                                        <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-first-tab" data-toggle="pill" href="#pills-first" role="tab" aria-controls="pills-first" aria-selected="true">2015</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-second-tab" data-toggle="pill" href="#pills-second" role="tab" aria-controls="pills-second" aria-selected="false">2016</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-third-tab" data-toggle="pill" href="#pills-third" role="tab" aria-controls="pills-third" aria-selected="false">2017</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="pills-first" role="tabpanel" aria-labelledby="pills-first-tab">
                                                <div class="p-3">
                                                    <h2>$17562</h2>
                                                    <p class="text-muted">Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus Nullam quis ante.</p>
                                                    <a href="#" class="text-primary">Read more...</a>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="pills-second" role="tabpanel" aria-labelledby="pills-second-tab">
                                                <div class="p-3">
                                                    <h2>$18614</h2>
                                                    <p class="text-muted">Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus Nullam quis ante.</p>
                                                    <a href="#" class="text-primary">Read more...</a>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="pills-third" role="tabpanel" aria-labelledby="pills-third-tab">
                                                <div class="p-3">
                                                    <h2>$19752</h2>
                                                    <p class="text-muted">Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus Nullam quis ante.</p>
                                                    <a href="#" class="text-primary">Read more...</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Sales Analytics</h4>
                            <div id="morris-donut-example" class="dashboard-charts morris-charts"></div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- end row -->
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Teachers</h4>
                                <div class="table-responsive">
                                    <table id="datatable-buttons"
                                           class="table table-striped table-bordered dt-responsive nowrap"
                                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Teacher Name</th>
                                            <th>Department</th>
                                            <th>Rank</th>
                                            <th>Email</th>
                                            <th>Join Date</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($teachers as $teacher)
                                            <tr>
                                                <td>{{ $teacher->id }}</td>
                                                <td>{{ $teacher->user->firstname." ".$teacher->user->lastname }}</td>
                                                <td>{{ $teacher->department->department_name }}</td>
                                                <td>{{ $teacher->rank->rank }}</td>
                                                <td>{{ $teacher->user->email }}</td>
                                                <td>{{ $teacher->join_date }}</td>
                                                <td>{{ ucwords($teacher->user->contact) }}</td>
                                                <td>{{ $teacher->is_active == 'yes' ? 'Active' : 'Inactive' }}</td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Rooms</h4>
                                <div class="table-responsive order-table">
                                    <table id="datatable-buttons"
                                           class="table table-striped table-bordered dt-responsive nowrap"
                                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Building</th>
                                            <th>Room No</th>
                                            <th>Room Type</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($rooms as $room)
                                            <tr>
                                                <td>{{ $room->id }}</td>
                                                <td>{{ $room->building }}</td>
                                                <td>{{ $room->room_no }}</td>
                                                <td>{{ $room->room_type == '0' ? 'Theory' : 'Sessional' }}</td>
                                                <td>{{ $room->is_active == 'yes' ? 'Active' : 'Inactive' }}</td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Courses</h4>
                                <div class="table-responsive">
                                    <table id="datatable-buttons"
                                           class="table table-striped table-bordered dt-responsive nowrap"
                                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name</th>
                                            <th>Course Code</th>
                                            <th>Credit</th>
                                            <th>Course Type</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($courses as $course)
                                            <tr>
                                                <td>{{ $course->id }}</td>
                                                <td>{{ $course->course_name }}</td>
                                                <td>{{ $course->course_code }}</td>
                                                <td>{{ $course->credit }}</td>
                                                <td>{{ $course->course_type == 0 ? 'Theory' : 'Sessional' }}</td>
                                                <td>{{ $course->is_active == 'yes' ? 'Active' : 'Inactive' }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-xl-6">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <h4 class="mt-0 header-title mb-4">Rooms</h4>--}}
{{--                                <div class="table-responsive order-table">--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>



                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end page content-->

    </div>
    <!-- page wrapper end -->
@endsection
