@extends('public/wrap')
@section('main')
<script src="{{ URL::asset('js/html2canvas.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });
        let option = {
            scale: 2
        }
        // html2canvas($('#test')[0], option).then(canvas => {
        //     $('#test').html('');
        //     $('#test-img').attr('src', canvas.toDataURL());
        // });
        $('img[data-thumbnail]').each(function(i, element){
            html2canvas($('#'+ $(element).data('thumbnail'))[0], option).then(canvas => {
                $(element).attr('src', canvas.toDataURL());
            });
        });
    })
</script>
<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">{{$bannerPost['head']}}</h1>
        <p class="lead my-3">{{$bannerPost['guide']}}</p>
        <p class="lead mb-0"><a data-pjax href="/post/show?id={{$bannerPost['id']}}" class="text-white font-weight-bold">继续阅读...</a></p>
    </div>
</div>
<div class="row mb-2">
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">{{$recommendPost[0]['category']['name']}}</strong>
                <h3 class="mb-0">
                    <a data-pjax class="text-dark" href="/post/show?id={{$recommendPost[0]['id']}}">{{$recommendPost[0]['head']}}</a>
                </h3>
                <div class="mb-1 text-muted">{{Carbon\Carbon::parse($recommendPost[0]['created_at'])->format('M j')}}</div>
                <p class="card-text mb-auto">{{$recommendPost[0]['guide']}}</p>
                <a data-pjax href="/post/show?id={{$recommendPost[0]['id']}}">继续阅读</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block border-left" data-thumbnail="thumb{{$recommendPost[0]['id']}}" src="/tmp.svg">
        </div>
        <div id="thumb{{$recommendPost[0]['id']}}" style="width:600px;height:750px;padding: 10px; position: fixed; background-color: #f8f9fa;">
            {!!$recommendPost[0]['content']!!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">{{$recommendPost[1]['category']['name']}}</strong>
                <h3 class="mb-0">
                    <a data-pjax class="text-dark" href="/post/show?id={{$recommendPost[1]['id']}}">{{$recommendPost[1]['head']}}</a>
                </h3>
                <div class="mb-1 text-muted">{{Carbon\Carbon::parse($recommendPost[1]['created_at'])->format('M j')}}</div>
                <p class="card-text mb-auto">{{$recommendPost[1]['guide']}}</p>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block border-left" data-thumbnail="thumb{{$recommendPost[1]['id']}}" src="/tmp.svg">
        </div>
        <div id="thumb{{$recommendPost[1]['id']}}" style="width:600px;height:750px;padding: 10px; position: fixed; background-color: #f8f9fa;">
            {!!$recommendPost[1]['content']!!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 blog-main">
        <!-- <h3 class="pb-3 mb-4 font-italic border-bottom">
            From the Firehose
        </h3> -->
        @foreach ($posts as $post)
        <div class="blog-post">
            <h2 class="blog-post-title">{{$post['head']}}</h2>
            <p class="blog-post-meta">{{Carbon\Carbon::parse($post['created_at'])->format('F j, Y')}} by <a href="">{{$post['author']}}</a></p>
            <h3>{{$post['subhead']}}</h3>
            <hr>
            <p>{{$post['guide']}}</p>
            <a data-pjax href="/post/show?id={{$post['id']}}">继续阅读</a>
        </div><!-- /.blog-post -->
        @endforeach

        <!-- <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav> -->

    </div><!-- /.blog-main -->
</div><!-- /.row -->
<script>
$(document).ready(function() {
    $(this).load('/index/sidebar', function(html) {
        $('.blog-main').after(html);
    });
});
</script>
@endsection
