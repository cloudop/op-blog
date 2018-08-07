<?php
ob_implicit_flush(true);
ob_end_flush();
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    echo <<<eot
<!doctype html>
<html lang="zh-CN">
<head>
    <title>clougop</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name=”description” content="林云开的个人站">
    <link href="https://www.clougop.com/bower_components/bootstrap/dist/css/bootstrap.css" media='all' rel='stylesheet' type='text/css' />
    <link href="https://www.clougop.com/bower_components/nprogress/nprogress.css" media='all' rel='stylesheet' type='text/css' />
    <link href="https://www.clougop.com/css/highlight/atom-one-dark.css" media='all' rel='stylesheet' type='text/css' />
    <link href="https://www.clougop.com/css/screen.min.css" media='all' rel='stylesheet' type='text/css' />
    <script src="https://www.clougop.com/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://www.clougop.com/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script defer src="https://www.clougop.com/js/fontawesome-all.js"></script>
    <!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet"> -->
    <style>
    /* google fonts api fk wall */
    /* latin-ext */
    @font-face {
        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 700;
        src: local('Playfair Display Bold'), local('PlayfairDisplay-Bold'), url(/font/nuFlD-vYSZviVYUb_rj3ij__anPXBYf9lWAe5j5hNKe1_w.woff2) format('woff2');
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 700;
        src: local('Playfair Display Bold'), local('PlayfairDisplay-Bold'), url(/font/nuFlD-vYSZviVYUb_rj3ij__anPXBYf9lW4e5j5hNKc.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    /* latin-ext */
    @font-face {
        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 900;
        src: local('Playfair Display Black'), local('PlayfairDisplay-Black'), url(/font/nuFlD-vYSZviVYUb_rj3ij__anPXBb__lWAe5j5hNKe1_w.woff2) format('woff2');
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 900;
        src: local('Playfair Display Black'), local('PlayfairDisplay-Black'), url(/font/nuFlD-vYSZviVYUb_rj3ij__anPXBb__lW4e5j5hNKc.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    /* stylelint-disable selector-list-comma-newline-after */
    .blog-header {
        height: 50px;
      line-height: 1;
      border-bottom: 1px solid #e5e5e5;
    }

    .blog-header-logo {
      font-family: "Playfair Display", Georgia, "Times New Roman", serif;
      font-size: 2.25rem;
    }

    .blog-header-logo:hover {
      text-decoration: none;
    }

    h1, h2, h3, h4, h5, h6 {
      /* font-family: "Playfair Display", Georgia, "Times New Roman", serif; */
    }

    .display-4 {
      font-size: 2.5rem;
    }
    @media (min-width: 768px) {
      .display-4 {
        font-size: 3rem;
      }
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
      /* background-color: #485b7c; */
      background-color: #444;
      /* line-height: 2.6em; */
    }

    .nav-scroller .nav-link {
      padding-top: .75rem;
      padding-bottom: .75rem;
      font-size: .875rem;
    }

    .card-img-right {
      height: 100%;
      border-radius: 0 3px 3px 0;
    }

    .flex-auto {
      -ms-flex: 0 0 auto;
      -webkit-box-flex: 0;
      flex: 0 0 auto;
    }

    .h-250 { height: 250px; }
    @media (min-width: 768px) {
      .h-md-250 { height: 250px; }
    }

    .border-top { border-top: 1px solid #e5e5e5; }
    .border-bottom { border-bottom: 1px solid #e5e5e5; }

    .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

    /*
     * Blog name and description
     */
    .blog-title {
      margin-bottom: 0;
      font-size: 2rem;
      font-weight: 400;
    }
    .blog-description {
      font-size: 1.1rem;
      color: #999;
    }

    @media (min-width: 40em) {
      .blog-title {
        font-size: 3.5rem;
      }
    }

    /* Pagination */
    .blog-pagination {
        margin-top: 15px;
        margin-bottom: 4rem;
    }
    .blog-pagination > .btn {
        border-radius: 2rem;
    }

    /*
     * Blog posts
     */
    .blog-post {
      padding: 10px 15px 10px 15px;
      /* padding: 15px; */
      background: #fff;
      margin-left: 0;
      margin-right: 0;
      position: relative;
      overflow: hidden;
      /* border-top: 2px solid #dee2e6 !important;
      border-bottom: 2px solid #dee2e6 !important; */
      /* box-shadow: 2px 5px 7px rgba(0,0,0,.5); */
    }
    .blog-post p {
        margin-bottom: 2px;
        padding:0 7px;
    }
    .blog-post pre {
        margin-bottom: 10px;
    }
    .blog-post h4 {
        font-size: 25px;
    }
    .blog-post-title {
        margin: 15px 0 10px;
        font-size: 2.5rem;
    }
    .blog-post-meta {
      margin-bottom: 0;
      color: #999;
    }
    .blog-post p {
        font-size: 14px;
    }
    .blog-main {
        /* padding-right: 0; */
    }
    .blog-sidebar {
        padding-left: 0;
    }

    /*
     * Footer
     */
    .blog-footer {
      padding: 2.5rem 0;
      color: #999;
      text-align: center;
      background-color: #f9f9f9;
      border-top: .05rem solid #e5e5e5;
      margin-top: 10px;
    }
    .blog-footer p:last-child {
      margin-bottom: 0;
    }


    .post-head {
        color: #d33;
    }
    .post-head:hover {
        color: #4285f4;
        text-decoration: none;
    }
    .post-head:visited {
        color: #444;
    }

    .row_striped {
        background: #fcfdff;
    }

    .header_canvas {
        display: block;
        width: 100%;
        height: 80px;
        /* background: #000; */
    }
    .nav-scroller .active {
        color: #888;
        border-bottom: 4px solid #aaaeb0;
    }
    .nav-scroller a {
        color: #ccc;
        display: block;
        float: left;
        height: 44px;
        font-size: 14px;
        margin-right: 10px;
    }
    .nav-scroller a:hover {
        color: #888;
        background-color: #555;
    }
    .r-label {
        position: absolute;
        right: -5px; top: 0px;
        z-index: 1;
        overflow: hidden;
        width: 75px; height: 75px;
        text-align: right;
    }
    .r-label span {
        font-size: 10px;
        font-weight: bold;
        color: #FFF;
        text-transform: uppercase;
        text-align: center;
        line-height: 20px;
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        width: 80px;
        display: block;
        background: #79A70A;
        background: linear-gradient(#9BC90D 0%, #79A70A 100%);
        box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 12px; right: -18px;
    }
    .r-label span::after {
        content: "";
        position: absolute; right: 0px; top: 100%;
        z-index: -1;
        border-left: 3px solid transparent;
        border-right: 3px solid #79A70A;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #79A70A;
    }

    .r-label-red span {
    	color: #FFF;
    	background: #ec383c;
    	background: linear-gradient(#ee4f52 0%, #ec383c 100%);
    }


    .r-label-red span::before {

      border-left: 3px solid ec383c;
      border-top: 3px solid #ec383c;
    }

    .r-label-red span::after {
      border-right: 3px solid #ec383c;
      border-top: 3px solid #ec383c;
    }
    .avatar {
        border-radius: 50%;
        margin-right: 10px;
    }
    .domain {
        /* color: #fff; */
        font-family: none;
        font-size: none;
        margin-bottom: 0;
        margin-top: 40px;
        padding-left: 3px;
    }
    .post-date {
        margin-bottom: 0;
        text-align: right;
        height: 20px;
    }
    .post-guide {
        margin-bottom: 5px;
    }
    pre {
        margin: 5px;
        border-radius: 4px;
        box-shadow: 2px 3px 5px rgba(0,0,0,.5);
    }
    .hr-dashed {
        border-color: #DDD;
        border-image: none;
        border-style: none none dashed;
        border-width: medium medium 1px;
        margin-bottom: 10px;
    }
    .guide {
        background-color: #fafbff;
        border: 1px solid transparent;
        border-color: #f1f3f7;
        border-radius: 0.25rem;
        margin-top: 10px;
        padding: 0 10px;
    }
    .guide p {
        font-size: 13px;
        margin: 0;
    }
    </style>
</head>
eot;
}

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
