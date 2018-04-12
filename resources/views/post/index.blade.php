<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Like / Disklike</title>
    </head>
<body>
<div class="container">
    <div class="blog-header">
        <h2>Like & Dislike</h2>
        <p>Laravel</p>
        <hr>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="blog-post">
                @foreach ($posts as $post)
                    <div class="post" data-postid="{{ $post->id }}">
                        <a href="#"><h3>{{$post->title}}</h3></a>
                    <h6>Posted on {{$post->created_at}} by {{$post->user->name}}</h6>
                    <p>{{$post->body}}</p>
                        <div class="interaction">
                            <a href="#">Like</a>
                            <a href="#">Dislike</a>
                            <hr>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</body>

</html>