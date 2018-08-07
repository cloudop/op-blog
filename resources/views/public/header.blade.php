<!doctype html>
<html lang="zh-CN">
<head>
    <title>{{$title}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name=”description” content="{{$guide}}">
    <link href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" media='all' rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('bower_components/nprogress/nprogress.css') }}" media='all' rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/highlight/atom-one-dark.css') }}" media='all' rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/screen.min.css') }}" media='all' rel='stylesheet' type='text/css' />
    <script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('bower_components/jquery-pjax/jquery.pjax.js') }}"></script>
    <script src="{{ URL::asset('bower_components/nprogress/nprogress.js') }}"></script>
    <style>
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