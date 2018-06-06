@if (Request::ajax() == false)
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
    <script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script defer src="{{ URL::asset('js/fontawesome-all.js') }}"></script>
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
      font-family: "Playfair Display", Georgia, "Times New Roman", serif;
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
      line-height: 1.6em;
    }

    .nav-scroller .nav {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
      float: left;
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
      margin-bottom: 4rem;
    }
    .blog-pagination > .btn {
      border-radius: 2rem;
    }

    /*
     * Blog posts
     */
    .blog-post {
      padding: 20px 0 20px 10px;
      background: #fff;
      margin-left: 0;
      margin-right: 0;
      position: relative;
      overflow: hidden;
    }
    .blog-post-title {
      margin-bottom: .25rem;
      font-size: 2.5rem;
    }
    .blog-post-meta {
      margin-bottom: 0;
      color: #999;
    }
    .blog-post p {
        font-size: 15px;
    }
    .blog-main {
        padding-right: 0;
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


    .container a {
        color: #d33;
    }
    .container a:hover {
        color: #4285f4;
        text-decoration: none;
    }
    .container a:visited {
        color: #444;
    }

    .row_striped {
        background: #fcfdff;
    }
    </style>
</head>
<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="text-muted" href="/">首页</a>
                </div>
                <div class="col-4 text-center">
                </div>
            </div>
        </header>
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                @foreach ($category as $value)
                <a class="p-2 text-light" href="#">{{$value['name']}}</a>
                @endforeach
            </nav>
        </div>
    </div>
    <main role="main" class="container" id="pjax-container">
        @yield('main')
    </main><!-- /.container -->

    <footer class="blog-footer">
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
<script src="{{ URL::asset('bower_components/jquery-pjax/jquery.pjax.js') }}"></script>
<script src="{{ URL::asset('bower_components/nprogress/nprogress.js') }}"></script>
<script src="{{ URL::asset('js/highlight.js') }}"></script>
<script>
    $(document).pjax('[data-pjax] a, a[data-pjax]', '#pjax-container');
    $(document).on('pjax:start', function() {NProgress.start();});
    $(document).on('pjax:end', function() {NProgress.done();});
    $(document).on('ajaxSend', function() {NProgress.start();});
    $(document).on('ajaxComplete', function() {NProgress.done();});
</script>
</body>
</html>
@else
@yield('main')
@endif
