@extends('public/wrap')
@section('main')
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1335715983150640",
    enable_page_level_ads: true
  });
</script>
<script>
    $(document).ready(function() {
        // 代码高亮
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });
        // 同分类边栏
        $(this).load('/post/sidebar?category_id={{$postData['category_id']}}&id={{$postData['id']}}', function(html) {
            if ($('aside.blog-sidebar').length) {
                $('aside.blog-sidebar').remove();
            }
            $('.blog-main').after(html);
        });
    });
</script>
<div class="row">
    <div class="col-md-8 blog-main">
        <!-- <h3 class="pb-3 mb-4 font-italic border-bottom">
            From the Firehose
        </h3> -->
        <div class="blog-post border shadow">
            <h2 class="blog-post-title">{{$postData['head']}}</h2>
            <p class="blog-post-meta border-bottom">{{Carbon\Carbon::parse($postData['created_at'])->format('Y-m-d')}} by <a class="text-muted" href="#">{{$postData['author']}}</a></p>
            {!!$postData['content']!!}
            <hr class="hr-dashed">
            <p>
                @if ($prev)
                <a class="float-left text-muted" data-pjax href="/post/{{$prev['id']}}/{{$prev['subhead']}}">← {{$prev['head']}}</a>
                @endif
                @if ($next)
                <a class="float-right text-muted" data-pjax href="/post/{{$next['id']}}/{{$next['subhead']}}">{{$next['head']}} →</a>
                @endif
            </p>
        </div><!-- /.blog-post -->
    </div><!-- /.blog-main -->
</div><!-- /.row -->
@endsection
