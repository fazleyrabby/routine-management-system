{{-- @extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('title', 'Home')

@section('content')
           <!-- page wrapper start -->
           <div class="wrapper">
            <div class="page-title-box">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-12">
                            {{-- <div class="state-information d-none d-sm-block">
                                <div class="state-graph">
                                    <div id="header-chart-1"></div>
                                    <div class="info">Balance $ 2,317</div>
                                </div>
                                <div class="state-graph">
                                    <div id="header-chart-2"></div>
                                    <div class="info">Item Sold 1230</div>
                                </div>
                            </div> --}}
                            
                        <h4 class="page-title">Home</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Welcome to Routine Management System</li>
                            </ol>

                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        {{ __('You are logged in!') }}

                        </div>
                    </div>
                </div>
                <!-- end container-fluid -->
            
            </div>
            <!-- page-title-box -->

            <div class="page-content-wrapper">
                <div class="container-fluid">
                    {{-- <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary mini-stat position-relative">
                                <div class="card-body">
                                    <div class="mini-stat-desc">
                                        <h6 class="text-uppercase verti-label text-white-50">Orders</h6>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mt-0 text-white-50">Orders</h6>
                                            <h3 class="mb-3 mt-0">1,587</h3>
                                            <div class="">
                                                <span class="badge badge-light text-info"> +11% </span> <span class="ml-2">From previous period</span>
                                            </div>
                                        </div>
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-cube-outline display-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary mini-stat position-relative">
                                <div class="card-body">
                                    <div class="mini-stat-desc">
                                        <h6 class="text-uppercase verti-label text-white-50">Revenue</h6>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mt-0 text-white-50">Revenue</h6>
                                            <h3 class="mb-3 mt-0">$46,785</h3>
                                            <div class="">
                                                <span class="badge badge-light text-danger"> -29% </span> <span class="ml-2">From previous period</span>
                                            </div>
                                        </div>
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-buffer display-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary mini-stat position-relative">
                                <div class="card-body">
                                    <div class="mini-stat-desc">
                                        <h6 class="text-uppercase verti-label text-white-50">Av. Price</h6>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mt-0 text-white-50">Average Price</h6>
                                            <h3 class="mb-3 mt-0">15.9</h3>
                                            <div class="">
                                                <span class="badge badge-light text-primary"> 0% </span> <span class="ml-2">From previous period</span>
                                            </div>
                                        </div>
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-tag-text-outline display-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary mini-stat position-relative">
                                <div class="card-body">
                                    <div class="mini-stat-desc">
                                        <h6 class="text-uppercase verti-label text-white-50">Pr. Sold</h6>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mt-0 text-white-50">Product Sold</h6>
                                            <h3 class="mb-3 mt-0">1890</h3>
                                            <div class="">
                                                <span class="badge badge-light text-info"> +89% </span> <span class="ml-2">From previous period</span>
                                            </div>
                                        </div>
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-briefcase-check display-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
                    
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-3">Inbox</h4>
                                    <div class="inbox-wid">
                                        <a href="#" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-left mr-3"><img src="assets/images/users/user-1.jpg" class="thumb-md rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mt-0 mb-1">Irene</h6>
                                                <p class="inbox-item-text text-muted mb-0">Hey! there I'm available...</p>
                                                <p class="inbox-item-date text-muted">13:40 PM</p>
                                            </div>
                                        </a>
                                        <a href="#" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-left mr-3"><img src="assets/images/users/user-2.jpg" class="thumb-md rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mt-0 mb-1">Jennifer</h6>
                                                <p class="inbox-item-text text-muted mb-0">I've finished it! See you so...</p>
                                                <p class="inbox-item-date text-muted">13:34 PM</p>
                                            </div>
                                        </a>
                                        <a href="#" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-left mr-3"><img src="assets/images/users/user-3.jpg" class="thumb-md rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mt-0 mb-1">Richard</h6>
                                                <p class="inbox-item-text text-muted mb-0">This theme is awesome!</p>
                                                <p class="inbox-item-date text-muted">13:17 PM</p>
                                            </div>
                                        </a>
                                        <a href="#" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-left mr-3"><img src="assets/images/users/user-4.jpg" class="thumb-md rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mt-0 mb-1">Martin</h6>
                                                <p class="inbox-item-text text-muted mb-0">Nice to meet you</p>
                                                <p class="inbox-item-date text-muted">12:20 PM</p>
                                            </div>
                                        </a>
                                        <a href="#" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-left mr-3"><img src="assets/images/users/user-5.jpg" class="thumb-md rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mt-0 mb-1">Sean</h6>
                                                <p class="inbox-item-text text-muted mb-0">Hey! there I'm available...</p>
                                                <p class="inbox-item-date text-muted">11:47 AM</p>
                                            </div>
                                        </a>
                                        
                                    </div>  
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-5">Recent Activity Feed</h4>
                                    <div>
                                        <ul class="nav nav-pills nav-justified recent-activity-tab mb-4" id="recent-activity-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="activity1-tab" data-toggle="pill" href="#activity1" role="tab" aria-controls="activity1" aria-selected="true">21 Sep</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="activity2-tab" data-toggle="pill" href="#activity2" role="tab" aria-controls="activity2" aria-selected="false">22 Sep</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="activity3-tab" data-toggle="pill" href="#activity3" role="tab" aria-controls="activity3" aria-selected="false">23 Sep</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="activity4-tab" data-toggle="pill" href="#activity4" role="tab" aria-controls="activity4" aria-selected="false">24 Sep</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="activity1" role="tabpanel" aria-labelledby="activity1-tab">
                                                <div class="p-3">
                                                    <div class="text-muted">
                                                        <p>21 Sep, 2018</p>
                                                        <h6 class="text-dark">Responded to need “Volunteer Activities”</h6>
                                                        <p>Aenean vulputate eleifend tellus</p>
                                                        <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus Nullam quis ante.</p>
                                                        <a href="#" class="text-primary">Read More...</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="activity2" role="tabpanel" aria-labelledby="activity2-tab">
                                                <div class="p-3">
                                                    <div class="text-muted">
                                                        <p>22 Sep, 2018</p>
                                                        <h6 class="text-dark">Added an interest “Volunteer Activities”</h6>
                                                        <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur velit sed quia non tempora incidunt.</p>
                                                        <p>Ut enim ad minima veniam quis nostrum</p>
                                                        <a href="#" class="text-primary">Read More...</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="activity3" role="tabpanel" aria-labelledby="activity3-tab">
                                                <div class="p-3">
                                                    <div class="text-muted">
                                                        <p>23 Sep, 2018</p>
                                                        <h6 class="text-dark">Joined the group “Boardsmanship Forum”</h6>
                                                        <p>Nemo enim voluptatem quia voluptas</p>
                                                        <p>Donec pede justo fringilla vel aliquet nec vulputate eget arcu. In enim justo rhoncus ut imperdiet a venenatis vitae. </p>
                                                        <a href="#" class="text-primary">Read More...</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="activity4" role="tabpanel" aria-labelledby="activity4-tab">
                                                <div class="p-3">
                                                    <div class="text-muted">
                                                        <p>24 Sep, 2018</p>
                                                        <h6 class="text-dark">Attending the event “Some New Event”</h6>
                                                        <p>At vero eos et accusamus et iusto odio</p>
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium </p>
                                                        <a href="#" class="text-primary">Read More...</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Top product sales</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="mt-0">Computers</h6>
                                                        <p class="text-muted mb-0">The languages only differ</p>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <span class="peity-pie" data-peity='{ "fill": ["#1b82ec", "#f2f2f2"]}' data-width="54" data-height="54">70/100</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mt-0">70%</h6>
                                                        <p class="text-muted mb-0">Sales</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="mt-0">Laptops</h6>
                                                        <p class="text-muted mb-0">Maecenas tempus tellus</p>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <span class="peity-donut" data-peity='{ "fill": ["#f5b225", "#f2f2f2"], "innerRadius": 20, "radius": 32 }' data-width="54" data-height="54">9,4</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mt-0">84%</h6>
                                                        <p class="text-muted mb-0">Sales</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="mt-0">Ipad</h6>
                                                        <p class="text-muted mb-0">Donec pede justo</p>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <span class="peity-pie" data-peity='{ "fill": ["#1b82ec", "#f2f2f2"]}' data-width="54" data-height="54">62/100</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mt-0">62%</h6>
                                                        <p class="text-muted mb-0">Sales</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="mt-0">Mobile</h6>
                                                        <p class="text-muted mb-0">Aenean leo ligula</p>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <span class="peity-donut" data-peity='{ "fill": ["#f5b225", "#f2f2f2"], "innerRadius": 20, "radius": 32 }' data-width="54" data-height="54">20,4</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mt-0">89%</h6>
                                                        <p class="text-muted mb-0">Sales</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Latest Trasaction</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                              <tr>
                                                <th scope="col">(#) Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col" colspan="2">Status</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">#15236</th>
                                                <td>
                                                    <div>
                                                        <img src="assets/images/users/user-2.jpg" alt="" class="thumb-md rounded-circle mr-2"> Jeanette James
                                                    </div>
                                                </td>
                                                <td>14/8/2018</td>
                                                <td>$104</td>
                                                <td><span class="badge badge-success">Delivered</span></td>
                                                <td>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">#15237</th>
                                                <td>
                                                    <div>
                                                        <img src="assets/images/users/user-3.jpg" alt="" class="thumb-md rounded-circle mr-2"> Christopher Taylor
                                                    </div>
                                                </td>
                                                <td>15/8/2018</td>
                                                <td>$112</td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                                <td>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">#15238</th>
                                                <td>
                                                    <div>
                                                        <img src="assets/images/users/user-4.jpg" alt="" class="thumb-md rounded-circle mr-2"> Edward Vazquez
                                                    </div>
                                                </td>
                                                <td>15/8/2018</td>
                                                <td>$116</td>
                                                <td><span class="badge badge-success">Delivered</span></td>
                                                <td>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">#15239</th>
                                                <td>
                                                    <div>
                                                        <img src="assets/images/users/user-5.jpg" alt="" class="thumb-md rounded-circle mr-2"> Michael Flannery
                                                    </div>
                                                </td>
                                                <td>16/8/2018</td>
                                                <td>$109</td>
                                                <td><span class="badge badge-primary">Cancel</span></td>
                                                <td>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </td>
                                              </tr>
                                              <tr>
                                                <th scope="row">#15240</th>
                                                <td>
                                                    <div>
                                                        <img src="assets/images/users/user-6.jpg" alt="" class="thumb-md rounded-circle mr-2"> Jamie Fishbourne
                                                    </div>
                                                </td>
                                                <td>17/8/2018</td>
                                                <td>$120</td>
                                                <td><span class="badge badge-success">Delivered</span></td>
                                                <td>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </td>
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Latest Order</h4>
                                    <div class="table-responsive order-table">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                <th scope="col">(#) Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date/Time</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col" colspan="2">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">#14562</th>
                                                    <td>
                                                        <div>
                                                            <img src="assets/images/users/user-4.jpg" alt="" class="thumb-md rounded-circle mr-2"> Matthew Drapeau
                                                        </div>
                                                    </td>
                                                    <td>17/8/2018
                                                        <p class="font-13 text-muted mb-0">8:26AM</p>
                                                    </td>
                                                    <td>$104</td>
                                                    <td><span class="badge badge-success badge-pill"><i class="mdi mdi-checkbox-blank-circle text-success"></i> Delivered</span></td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">#14563</th>
                                                    <td>
                                                        <div>
                                                            <img src="assets/images/users/user-5.jpg" alt="" class="thumb-md rounded-circle mr-2"> Ralph Shockey
                                                        </div>
                                                    </td>
                                                    <td>18/8/2018
                                                        <p class="font-13 text-muted mb-0">10:18AM</p>
                                                    </td>
                                                    <td>$112</td>
                                                    <td><span class="badge badge-warning badge-pill"><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Pending</span></td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">#14564</th>
                                                    <td>
                                                        <div>
                                                            <img src="assets/images/users/user-6.jpg" alt="" class="thumb-md rounded-circle mr-2"> Alexander Pierson
                                                        </div>
                                                    </td>
                                                    <td>18//8/2018
                                                        <p class="font-13 text-muted mb-0">12:36PM</p>
                                                    </td>
                                                    <td>$116</td>
                                                    <td><span class="badge badge-success badge-pill"><i class="mdi mdi-checkbox-blank-circle text-success"></i> Delivered</span></td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">#14565</th>
                                                    <td>
                                                        <div>
                                                            <img src="assets/images/users/user-7.jpg" alt="" class="thumb-md rounded-circle mr-2"> Robert Rankin
                                                        </div>
                                                    </td>
                                                    <td>19/8/2018
                                                        <p class="font-13 text-muted mb-0">11:47AM</p>
                                                    </td>
                                                    <td>$109</td>
                                                    <td><span class="badge badge-primary badge-pill"><i class="mdi mdi-checkbox-blank-circle text-primary"></i> Cancel</span></td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">#14566</th>
                                                    <td>
                                                        <div>
                                                            <img src="assets/images/users/user-8.jpg" alt="" class="thumb-md rounded-circle mr-2"> Myrna Shields
                                                        </div>
                                                    </td>
                                                    <td>20/8/2018
                                                        <p class="font-13 text-muted mb-0">02:52PM</p>
                                                    </td>
                                                    <td>$120</td>
                                                    <td><span class="badge badge-success badge-pill"><i class="mdi mdi-checkbox-blank-circle text-success"></i> Delivered</span></td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
