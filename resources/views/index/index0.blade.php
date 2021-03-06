@extends('public/wrap')
@section('main')
<script src="{{ URL::asset('js/html2canvas.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });

        $(this).load('/index/sidebar', function(html) {
            if ($('aside.blog-sidebar').length) {
                $('aside.blog-sidebar').remove();
            }
            $('.blog-main').after(html);
        });


        setTimeout(() => {
            (async function() {
                let option = {
                    scale: 2,
                    logging: false
                }
                for (let i = 0; i < $('img[data-thumbnail]').length; i++) {
                    let thumbEl = $($('img[data-thumbnail]')[i]);
                    let canvasRs = await html2canvas($('#'+ thumbEl.data('thumbnail'))[0], option);
                    thumbEl.attr('src', canvasRs.toDataURL());
                    $('#'+ thumbEl.data('thumbnail')).remove();
                }
            })();
        }, 100);

    });
</script>
@if (env('APP_ENV') != 'local')

@endif
<div class="row">
    <div class="col-md-8 blog-main">
        @foreach ($posts as $key => $post)
        <div class="@if ($key%2 == 0)row_striped @endif row align-items-center blog-post border-top border-left border-right @if ($loop->last) border-bottom @endif">
            <div class="col-md-3"><img  width="150" style="height: 150px;" class="img-thumbnail" data-thumbnail="thumb{{$post['id']}}" src="/tmp.svg"></div>
            <div class="col-md-9">
                <h5><a class="post-head" data-pjax href="/post/{{$post['id']}}/{{$post['subhead']}}">{{$post['head']}}</a></h5>
                <p class="blog-post-meta"> <a class="text-muted" href="">{{$post['author']}}</a> · <a class="text-muted" href="">{{$post['category']['name']}}</a></p>
                <p class="post-guide">{{$post['guide']}}</p>
                <p class="post-date"><em><small class="text-muted">{{Carbon\Carbon::parse($post['created_at'])->format('Y-m-d')}}</small></em></p>
                <div style="display: relative;">
                    <div id="thumb{{$post['id']}}" style="width:450px;height:450px;padding: 10px; position: fixed;z-index: -1; background-color: #f8f9fa;">
                        {!!$post['content']!!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav> -->

    </div><!-- /.blog-main -->
</div><!-- /.row -->
@endsection
