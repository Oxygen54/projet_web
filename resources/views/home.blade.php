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
                                        <textarea class="form-control" name="body" id="new-post" style="min-height:100px;height:50%;" placeholder="Write your idea..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Post Idea</button>
                                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                                </form>
                                    <br>
                                <header><h3>The ideas...</h3></header>
                                <div class="card-body">
                                    <div class="card-body">
                                    <article class="post" data-postid="1">
                                        <p>Make a party Friday night</p>
                                        <div class="info" style="color: #aaa;font-style: italic;">
                                            Posted by Alexis at 4/11/18 3:50 PM
                                        </div>
                                        <div class="interaction">
                                            <a href="#" class="like" style="color: green;">Like</a> |
                                            <a href="#" class="like" style="color: red;">Dislike</a>
                                            @if (1)
                                                |
                                                <a href="#" class="edit">Edit</a> |
                                                <a href="">Delete</a>
                                            @endif
                                        </div>
                                    </article>
                                    </div>
                                    <div class="card-body">
                                    <article class="post" data-postid="1">
                                        <p>buy some screens</p>
                                        <div class="info" style="color: #aaa;font-style: italic;">
                                            Posted by James at 2/11/18 6:45 PM
                                        </div>
                                        <div class="interaction">
                                            </span><a href="#" class="like" style="color: green;">Like</a> |
                                            <a href="#" class="like" style="color: red;">Dislike</a>
                                            @if (1)
                                                |
                                                <a href="#" class="edit">Edit</a> |
                                                <a href="">Delete</a>
                                            @endif
                                        </div>
                                    </article>
                                    </div>
                                    <div class="card-body">
                                    <article class="post" data-postid="1">
                                        <p>Add a babyfoot</p>
                                        <div class="info" style="color: #aaa;font-style: italic;">
                                            Posted by Kim at 1/11/18 9:41 AM
                                        </div>
                                        <div class="interaction">
                                            <a href="#" class="like" style="color: green;">Like</a> |
                                            <a href="#" class="like" style="color: red;">Dislike</a>
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
                    </div>

                        <!-- EVENT BOX -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Events</div>
                                <div class="card-body" style="text-align:center;">UPCOMMING EVENTS<br>↓  ↓  ↓  ↓</div>
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
