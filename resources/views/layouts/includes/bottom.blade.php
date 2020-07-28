        <!-- jQuery  -->


        <script src="{{asset ('assets/js/jquery.min.js') }}"></script>
        <script src="{{asset ('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{asset ('assets/js/jquery.slimscroll.js') }}"></script>
{{--        <script src="{{asset ('assets/js/waves.min.js') }}"></script>--}}
{{--        <script src="{{asset ('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>--}}
{{--        <script src="{{asset ('assets/plugins/peity/jquery.peity.min.js') }}"></script>--}}
{{--        <script src="{{asset ('assets/plugins/morris/morris.min.js') }}"></script>--}}
{{--        <script src="{{asset ('assets/plugins/raphael/raphael-min.js') }}"></script>--}}
{{--        <script src="{{asset ('assets/pages/dashboard.js') }}"></script>--}}

        @stack('script')
        <script src="{{asset ('assets/js/app.js') }}"></script>


        </body>
    </html>
