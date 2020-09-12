<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title> @yield('title') </title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
{{--        <link rel="shortcut icon" href="assets/images/favicon.ico">--}}
        <link href="{{asset ('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset ('assets/plugins/morris/morris.css') }}" rel="stylesheet">
        <link href="{{asset ('assets/css/custom.css') }}" rel="stylesheet">
        <link href="{{asset ('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset ('assets/css/style.css') }}" rel="stylesheet" type="text/css">
        @yield('stylesheets')
    </head>
<body>

