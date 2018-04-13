@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Idea Box</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                    <!-- IDEA BOX -->
                            <div class="card-body">

                                <header><h3>What's your idea?</h3></header>
                                <form action="{{ route('post.create') }}" method="post">
                                    <div class="form-group">
                                        <label for="title">Title&nbsp;</label>
                                        <input type="text" id="title_idea" name="title_idea" placeholder="Write your title...">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="body" id="new-post" style="min-height:100px;height:50%;" placeholder="Write your idea..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary">Post Idea</button>
                                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                                </form>
                                    <br>
                                <header><h3>The ideas...</h3></header>
                                <div class="card-body">
                                    <div class="card-body">
                                        <section class="row posts">
                                            <div class="col-md-12 col-md-offset-3">
                                                @foreach($posts as $post)
                                                    <article class="post" data-postid="{{ $post->id }}">
                                                        <p>{{ $post->title }}</p>
                                                        <p>{{ $post->body }}</p>
                                                        <div class="info">
                                                            Posted by {{ $post->user->name }} on {{ $post->created_at }}
                                                        </div>
                                                        <div class="interaction">
                                                            <a href="#" class="btn btn-xs btn-outline-success like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
                                                            <a href="#" class="btn btn-xs btn-outline-danger like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don t like this post' : 'Dislike' : 'Dislike'  }}</a>
                                                        </div>
                                                    </article>
                                                @endforeach
                                            </div>
                                        </section>
                                    </div>
                            </div>
                        </div>


                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/idea_box.js') }}"></script>
    <script type="text/javascript">
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}';
    </script>
@endsection
