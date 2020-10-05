<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">

                <a href="{{ route('admin') }}" class="logo">
                    {{-- <img src="assets/images/logo-sm-light.png" alt="" class="logo-small">
                    <img src="assets/images/logo-light.png" alt="" class="logo-large"> --}}
                    <span class="font-weight-bold">Routine Management System</span>
                </a>

            </div>

            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="navbar-right d-flex list-inline float-right mb-0">
                    <li class="dropdown notification-list d-none d-sm-block">
                        <form role="search" class="app-search">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" placeholder="Search..">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell noti-icon"></i>
                            <span class="badge badge-pill badge-info noti-icon-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                            <!-- item-->
                            <h6 class="dropdown-item-text">
                                Notifications (37)
                            </h6>
                            <div class="slimscroll notification-item-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-flag"></i></div>
                                    <p class="notify-details">Your item is shipped<span class="text-muted">It is a long established fact that a reader will</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                                </a>
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="dropdown notification-list">
                        <div class="dropdown notification-list">
                            <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('assets/images/users/user-4.jpg')  }}" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
{{--                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>--}}
{{--                                <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5"></i> My Wallet</a>--}}
{{--                                <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings m-r-5"></i> Settings</a>--}}
{{--                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5"></i> Lock screen</a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="mdi mdi-power text-danger"></i> Logout</a>
                            </div>
                        </div>
                    </li>

                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>



            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    {{-- <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-buffer"></i>UI Elements</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="ui-alerts.html">Alerts</a></li>
                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                    <li><a href="ui-badge.html">Badge</a></li>
                                    <li><a href="ui-cards.html">Cards</a></li>
                                    <li><a href="ui-carousel.html">Carousel</a></li>
                                    <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><a href="ui-grid.html">Grid</a></li>
                                    <li><a href="ui-images.html">Images</a></li>
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-pagination.html">Pagination</a></li>
                                    <li><a href="ui-popover-tooltips.html">Popover & Tooltips</a></li>
                                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                                    <li><a href="ui-typography.html">Typography</a></li>
                                    <li><a href="ui-video.html">Video</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-black-mesa"></i>Components</a>
                        <ul class="submenu">
                            <li><a href="components-lightbox.html">Lightbox</a></li>
                            <li><a href="components-rangeslider.html">Range Slider</a></li>
                            <li><a href="components-session-timeout.html">Session Timeout</a></li>
                            <li><a href="components-sweet-alert.html">Sweet-Alert</a></li>

                            <li>
                                <a href="calendar.html">Calendar</a>
                            </li>
                            <li class="has-submenu">
                                <a href="#">Tables</a>
                                <ul class="submenu">
                                    <li><a href="tables-basic.html">Basic Tables</a></li>
                                    <li><a href="tables-datatable.html">Data Table</a></li>
                                    <li><a href="tables-responsive.html">Responsive Table</a></li>
                                    <li><a href="tables-editable.html">Editable Table</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#">Icons</a>
                                <ul class="submenu">
                                    <li><a href="icons-material.html">Material Design</a></li>
                                    <li><a href="icons-ion.html">Ion Icons</a></li>
                                    <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                                    <li><a href="icons-themify.html">Themify Icons</a></li>
                                    <li><a href="icons-dripicons.html">Dripicons</a></li>
                                    <li><a href="icons-typicons.html">Typicons Icons</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#">Maps</a>
                                <ul class="submenu">
                                    <li><a href="maps-google.html"> Google Map</a></li>
                                    <li><a href="maps-vector.html"> Vector Map</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-clipboard"></i>Forms</a>
                        <ul class="submenu">
                            <li><a href="form-elements.html">Form Elements</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-advanced.html">Form Advanced</a></li>
                            <li><a href="form-editors.html">Form Editors</a></li>
                            <li><a href="form-uploads.html">Form File Upload</a></li>
                            <li><a href="form-xeditable.html">Form Xeditable</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-finance"></i>Charts</a>
                        <ul class="submenu">
                            <li><a href="charts-chartist.html">Chartist Chart</a></li>
                            <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                            <li><a href="charts-flot.html">Flot Chart</a></li>
                            <li><a href="charts-c3.html">C3 Chart</a></li>
                            <li><a href="charts-morris.html">Morris Chart</a></li>
                            <li><a href="charts-other.html">Jquery Knob Chart</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-google-pages"></i>Pages</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="pages-login.html">Login</a></li>
                                    <li><a href="pages-register.html">Register</a></li>
                                    <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                    <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><a href="pages-directory.html">Directory</a></li>
                                    <li><a href="pages-blank.html">Blank Page</a></li>
                                    <li><a href="pages-title-2.html">Page Title 2</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}

                    <li>
                        <a href="{{ url("/admin") }}"><i class="mdi mdi-home"></i>Dashboard</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#">Application Settings</a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="#">Departments</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('departments.index') }}">
                                            View All
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('departments.create') }}">
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#">Shift</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('shifts.index') }}">
                                            View All
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('shifts.create') }}">
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#">Courses</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('courses.index') }}">
                                            View all
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('courses.create') }}">
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#">Rooms</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('rooms.index') }}">
                                            View all
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('rooms.create') }}">
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="has-submenu">
                                <a href="#">Batch</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('batches.index') }}">
                                            View all
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('batches.create') }}">
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#">Sessions</a>
                                <ul class="submenu">

                                    <li>
                                        <a href="{{ route('sessions.index') }}">
                                            View all
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('sessions.create') }}">
                                            Add New
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#">Shift-Session</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('shift_sessions.index') }}">Show all</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('shift_sessions.create') }}">Assign Session</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#">Yearly-Session</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('yearly_sessions.index') }}">Show all</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('yearly_sessions.create') }}">Assign New Year</a>
                                    </li>
                                </ul>
                            </li>


                            <li class="has-submenu">
                                <a href="#">Sections</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('sections.index') }}">
                                            View all
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sections.create') }}">
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="has-submenu">
                                <a href="#">Teacher Rank</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('ranks.index') }}">
                                            View All
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('ranks.create') }}">
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>


                        </ul>


                    </li>







                    <li class="has-submenu">
                        <a href="#">Teachers</a>
                        <ul class="submenu">


                            <li>
                                <a href="{{ route('teachers.index') }}">
                                    View All
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('teachers.create') }}">
                                    Add New
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('teachers.requests') }}">
                                    Requests
                                </a>
                            </li>
                            <li class="has-submenu">
                                <a href="#">Assign Courses</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('assign_courses.index') }}">
                                            View All
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Add New
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>










                    <li class="has-submenu">
                        <a href="#">Students</a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ route('students.index') }}">
                                    Batch wise list
                                </a>
                            </li>
{{--                            <li>--}}
{{--                                <a href="{{ route('theory_section') }}">--}}
{{--                                    Add New--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="has-submenu">--}}
{{--                                <a href="#">Section - Students</a>--}}
{{--                                <ul class="submenu">--}}
{{--                                    <li>--}}
{{--                                        <a href="{{ route('section_students.index') }}">--}}
{{--                                            View all--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{ route('section_students.create') }}">--}}
{{--                                            Add New--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#">Time Slot</a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ route('time_slots.index') }}">
                                    View All
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('time_slots.create') }}">
                                    Add New
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#">Routine Committee</a>
                        <ul class="submenu">
                            <li>
                                <a href="#">
                                    View All
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Add New
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="{{ route('day_wise_slots') }}">Day Wise Slot</a>
                    </li>

{{--                    <li class="has-submenu">--}}
{{--                        <a href="#">Full Routine</a>--}}
{{--                        <ul class="submenu">--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('full_routine.index') }}">--}}
{{--                                    View All--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('full_routine.create') }}">--}}
{{--                                    Add New--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
