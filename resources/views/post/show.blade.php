@extends('public/wrap')
@section('main')
@if (env('APP_ENV') != 'local')
@endif
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
            <h4 class="blog-post-title">{{$postData['head']}}</h4>
            <p class="blog-post-meta border-bottom">{{Carbon\Carbon::parse($postData['created_at'])->format('Y-m-d')}} by <a class="text-muted" href="#">{{$postData['author']}}</a></p>
            <div class="guide">
                <p class="font-weight-light font-italic">{{$postData['guide']}}</p>
            </div>
            {!!$postData['content']!!}
            <p class="blog-like">
                <span id="like-tips" class="like-tips float-right text-danger font-weight-bold" style="position: absolute; display: none;">+1</span>
                <span class="float-right"><a title="like" data-id="{{$postData['id']}}" class="like" href="javascript:;">666</a>[<span>{{$statData['six']}}</span>] <a title="unlike" data-id="{{$postData['id']}}" class="unlike" href="javascript:;">999</a>[<span>{{$statData['nine']}}</span>]</span>
            </p>
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
<script>
$(document).ready(() => {
    let likeTips = $('#like-tips')
    $('a.like').click(likeTips, function() {
        $(this).off('click');
        $('a.unlike').off('click');
        let $this = $(this);
        likeTips.html('loading').addClass('text-secondary').removeClass('text-danger').show().css({
            left: ($this.position().left),
            top: ($this.position().top - 25),
        });
        $.get('/post/favorite/{{$postData['id']}}/1', function(resp) {
            if (resp.code != 0) {
                likeTips.fadeOut();
                return;
            }
            let count = parseInt($this.next().html());
            $this.next().html(count + 1);
            likeTips.html('+1').addClass('text-danger').removeClass('text-secondary').show().css({
                left: ($this.position().left + 8),
                top: ($this.position().top - 10),
            }).animate({top: ($this.position().top - 25)}, 400, function() { likeTips.fadeOut(200) });
        });
    });

    $('a.unlike').click(likeTips, function(e) {
        $(this).off('click');
        $('a.like').off('click');
        let $this = $(this);
        likeTips.html('loading').addClass('text-secondary').removeClass('text-danger').show().css({
            left: ($this.position().left),
            top: ($this.position().top - 25),
        });

        $.get('/post/favorite/{{$postData['id']}}/0', function(resp) {
            if (resp.code != 0) {
                likeTips.fadeOut();
                return;
            }
            let count = parseInt($this.next().html());
            $this.next().html(count + 1);
            likeTips.html('T.T').addClass('text-secondary').removeClass('text-danger').show().css({
                left: ($this.position().left + 5),
                top: ($this.position().top - 10),
            }).animate({top: ($this.position().top - 25)}, 400, function() {
                likeTips.fadeOut(200);
            });
        });
    });

})
</script>
@endsection
