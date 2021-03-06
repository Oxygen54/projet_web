@section('title', 'IdeaBox')
@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Idea Box</div>
                    <div class="card-body">
                        <div class="row">
                            <!-- IDEA BOX -->
                            <div class="card-body">

                                @if (Route::has('login'))
                                    @auth
                                        <header><h3>What's your idea?</h3></header>
                                        <form action="{{ route('post.create') }}" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="title_idea"
                                                       name="title_idea"
                                                       placeholder="Write your title...">
                                            </div>
                                            <div class="form-group">
                                        <textarea class="form-control" name="body" id="new-post"
                                                  style="min-height:100px;height:50%;"
                                                  placeholder="Write your idea..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-outline-primary">Post Idea</button>
                                            <input type="hidden" value="{{ Session::token() }}" name="_token">
                                        </form>
                                        <br>
                                    @else

                                    @endauth
                                @endif

                                <header><h3>The ideas...</h3></header>
                                <div class="card-body">
                                    <div class="card-body">
                                        <section class="row posts">
                                            <div class="col-md-12 col-md-offset-3">
                                                @foreach($posts as $post)
                                                    <article class="post" data-postid="{{ $post->id }}">
                                                        <p style="font-weight: bold;">{{ $post->title }}</p>
                                                        <p>{{ $post->body }}</p>
                                                        <div class="info">
                                                            Posted by {{ $post->user->name }}
                                                            on {{ $post->created_at }}
                                                        </div>
                                                        @if (Route::has('login'))
                                                            @auth
                                                                <div class="interaction">
                                                                    <a href="#"
                                                                       class="btn btn-xs btn-outline-success like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a>
                                                                    |
                                                                    <a href="#"
                                                                       class="btn btn-xs btn-outline-danger like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
                                                                    @if(Auth::user() == $post->user)
                                                                        |
                                                                        <a href="#" class="edit">Edit</a> |
                                                                        <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                                                                    @endif
                                                                </div>
                                                            @else
                                                            @endauth
                                                        @endif

                                                    </article>
                                                @endforeach
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Route::has('login'))
                        @auth
                            <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                        aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="post-body">Edit the Post</label>
                                                    <textarea class="form-control" name="post-body" id="post-body"
                                                              rows="5"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary" id="modal-save">Save changes
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- EVENT BOX -->
                        @else

                        @endauth
                    @endif

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/js/idea_box.js') }}"></script>
    <script type="text/javascript">
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}';
        var urlEdit = '{{ route('edit') }}';
    </script>
@endsection