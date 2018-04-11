@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                    <!-- IDEA BOX -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Idea Box</div>
                            <div class="card-body">

                                <header><h3>What's your idea?</h3></header>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <textarea class="form-control" name="body" id="new-post" style="min-height:100px;height:50%;" placeholder="Your Idea"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Post Idea</button>
                                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                                </form>
                                    <br>
                                <div class="card-body">
                                    <article class="post" data-postid="1">
                                        <p>I want to hit your face. XoXo</p>
                                        <div class="info">
                                            Posted by Alexis
                                        </div>
                                        <div class="interaction">
                                            <a href="#" class="like">Like</a> |
                                            <a href="#" class="like">Dislike</a>
                                            @if (1)
                                                |
                                                <a href="#" class="edit">Edit</a> |
                                                <a href="">Delete</a>
                                            @endif
                                        </div>
                                    </article>
                                </div>


                            </div>
                        </div>
                    </div>

                        <!-- EVENT BOX -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Events</div>
                                <div class="card-body">test event</div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var token = '{{ Session::token() }}';
    var urlEdit = '{{ route('edit') }}';
    var urlLike = '{{ route('like') }}';
</script>
@endsection
