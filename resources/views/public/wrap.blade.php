@if (Request::ajax() == false)
<!doctype html>
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
</body>
</html>
@else
@yield('main')
@endif
