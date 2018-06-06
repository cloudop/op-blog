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
            let option = {
                scale: 2
            }
            $('img[data-thumbnail]').each(function(i, element){
                html2canvas($('#'+ $(element).data('thumbnail'))[0], option).then(canvas => {
                    $(element).attr('src', canvas.toDataURL());
                    $('#'+ $(element).data('thumbnail')).remove();
                });
            });
        }, 1000);


    });
</script>
<div class="row">
    <div class="col-md-8 blog-main border-bottom">
        <!-- <h3 class="pb-3 mb-4 font-italic border-bottom">
            From the Firehose
        </h3> -->
        @foreach ($posts as $key => $post)

        <div class="@if ($key%2 > 0)row_striped @endif row align-items-center blog-post border-top border-left border-right">
            <div class="col-md-3"><img  width="150" style="height: 150px;" class="img-thumbnail" data-thumbnail="thumb{{$post['id']}}" src="/tmp.svg"></div>
            <div class="col-md-9">
                <h4><a data-pjax href="/post/show?id={{$post['id']}}">{{$post['head']}}</a></h4>
                <p class="blog-post-meta">{{Carbon\Carbon::parse($post['created_at'])->format('F j, Y')}} by <a href="">{{$post['author']}}</a></p>
                <p>{{$post['guide']}}</p>
                <div id="thumb{{$post['id']}}" style="width:450px;height:450px;padding: 10px; position: fixed; background-color: #f8f9fa;">
                    {!!$post['content']!!}
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
