<aside class="col-md-4 blog-sidebar">
    <div class="p-3 mb-3 bg-light widget border">
        <h5 class="title"><img height="40px" width="40px" class="avatar" src="{{URL::asset('img/sunknight.png')}}">{{$aboutMe['name']}}</h5>
        <p class="mb-0"><em>{{$aboutMe['github']}}</em></p>
        <p class="mb-0"><em>{{$aboutMe['email']}}</em></p>
    </div>

    <div class="p-3 mb-3 bg-light widget border">
        <h4 class="title">系列</h4>
        <ol class="list-unstyled mb-0">
            @foreach ($postArr as $post)
            <li><a class="post-head" data-pjax href="/post/{{$post['id']}}/{{$post['subhead']}}">{{$post['head']}}</a></li>
            @endforeach
        </ol>
    </div>

    <!-- <div class="p-3">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div> -->
</aside><!-- /.blog-sidebar -->