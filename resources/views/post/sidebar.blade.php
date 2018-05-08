<aside class="col-md-4 blog-sidebar">
    <div class="p-3 mb-3 bg-light rounded">
        <h4 class="font-italic">关于</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>

    <div class="p-3">
        <h4 class="font-italic">栏目</h4>
        <ol class="list-unstyled mb-0">
            @foreach ($postArr as $post)
            <li><a data-pjax href="/post/show?id={{$post['id']}}">{{$post['head']}}</a></li>
            @endforeach
        </ol>
    </div>

    <div class="p-3">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>
</aside><!-- /.blog-sidebar -->