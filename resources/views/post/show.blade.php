@extends('public/wrap')
@section('main')
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
        </div><!-- /.blog-post -->
        <nav class="blog-pagination">
            @if ($prev)
            <a class="btn btn-outline-primary" href="/post/show?id={{$prev['id']}}" data-pjax>Older</a>
            @else
            <a class="btn btn-outline-secondary disabled">Older</a>
            @endif
            @if ($next)
            <a class="btn btn-outline-primary" href="/post/show?id={{$next['id']}}" data-pjax>Newer</a>
            @else
            <a class="btn btn-outline-secondary disabled">Newer</a>
            @endif
        </nav>
    </div><!-- /.blog-main -->
</div><!-- /.row -->
@endsection
