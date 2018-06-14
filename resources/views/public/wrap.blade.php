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
    .blog-post-title {
      margin-bottom: .25rem;
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
        margin-top: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <h4 class="domain"><font color="#a33133">clougop</font><font style="font-size:14px;">.com</font></h4>
        <!-- <canvas class="header_canvas" id="dy_canvas"></canvas> -->
        <!-- <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <h3 class="domain">clougop.com</h3>
                    <!-- <a class="text-muted" href="/">首页</a> -->
                <!-- </div>
                <div class="col-4 text-center">
                </div>
            </div>
        </header> -->
        <div class="nav-scroller mb-2">
            <a class="p-2 @if ($categoryId == 0)active @endif" href="/">首页</a>
            @foreach ($category as $value)
            <a class="p-2 @if ($categoryId == $value['id'])active @endif" href="/?category_id={{$value['id']}}">{{$value['name']}}</a>
            @endforeach
        </div>
    </div>
    <main role="main" class="container" id="pjax-container">
        @yield('main')
    </main><!-- /.container -->

    <footer class="blog-footer">
        <p> Copyright (c) 2018 Copyright Lin Yunkai All Rights Reserved.</p>
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
<script>
var r = 104;
var g = 204;
var b = 4;
var rPlus = 1;
var gPlus = 1;
var bPlus = 1;
class Circle {
    constructor(x, y) {
        this.x = x;
        this.y = y;
        this.r = Math.random() * 10 ;
        this._mx = Math.random();
        this._my = Math.random();
    }

    drawCircle(ctx) {
        // ctx.beginPath();
        // ctx.arc(this.x, this.y, this.r, 0, 360)
        // ctx.closePath();
        // ctx.fillStyle = 'rgba(204, 204, 204, 0.3)';
        // ctx.fill();
    }

    drawLine(ctx, _circle) {
        let dx = this.x - _circle.x;
        let dy = this.y - _circle.y;
        let d = Math.sqrt(dx * dx + dy * dy)
        var gradient=ctx.createLinearGradient(0,0, 450,0);
        gradient.addColorStop("0","magenta");
        gradient.addColorStop("0.5","blue");
        gradient.addColorStop("1.0","red");
        if (d < 150) {
            ctx.beginPath();
            ctx.moveTo(this.x, this.y);   //起始点
            ctx.lineTo(_circle.x, _circle.y);   //终点
            ctx.closePath();
            ctx.strokeStyle = gradient;
            // ctx.strokeStyle = 'rgba('+ r+ ', '+ g+ ', '+ b+ ', 0.3)';
            // ctx.strokeStyle = 'rgba(0,0,0,' + (parseInt(Math.random() * 100) / 100) + ')';
            ctx.stroke();
        }
    }

    // 圆圈移动的距离必须在屏幕范围内
    move(w, h) {
        this._mx = (this.x < w && this.x > 0) ? this._mx : (-this._mx);
        this._my = (this.y < h && this.y > 0) ? this._my : (-this._my);
        this.x += this._mx / 2;
        this.y += this._my / 2;
    }
}
let canvas = document.getElementById('dy_canvas');
let ctx = canvas.getContext('2d');
let w = canvas.width = canvas.offsetWidth;
let h = canvas.height = canvas.offsetHeight;
let circles = [];

let draw = function () {
    r += rPlus;
    g += gPlus;
    b += bPlus;

    if (r >= 255) {
        r = 254;
        rPlus = -1;
    }
    if (r <= 0) {
        r = 1;
        rPlus = 1;
    }
    if (g >= 255) {
        g = 254;
        gPlus = -1;
    }
    if (g <= 0) {
        g = 1;
        gPlus = 1;
    }
    if (b >= 255) {
        b = 254;
        bPlus = -1;
    }
    if (b <= 0) {
        b = 1;
        bPlus = 1;
    }
    ctx.clearRect(0, 0, w, h);
    for (let i = 0; i < circles.length; i++) {
        circles[i].move(w, h);
        // circles[i].drawCircle(ctx);
        for (j = i + 1; j < circles.length; j++) {
            circles[i].drawLine(ctx, circles[j])
        }
    }
    requestAnimationFrame(draw)
}

let init = function (num) {
    for (var i = 0; i < num; i++) {
        circles.push(new Circle(Math.random() * w, Math.random() * h));
    }
    requestAnimationFrame(draw)
    // draw();
}
// window.addEventListener('load', init(50));
</script>
</body>
</html>
@else
@yield('main')
@endif
