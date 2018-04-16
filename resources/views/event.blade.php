@section('title', 'Events')
@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Event</div>
                    <div class="card-body">
                        <!-- EVENT BOX -->
                        <div class="card-body" style="text-align:center;">UPCOMMING EVENTS<br>↓ ↓ ↓ ↓</div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- IDEA BOX -->
                                                <div class="card-body">

                                                    @if (Route::has('login'))
                                                        @auth
                                                            <header><h3>Add an event</h3></header>
                                                            <form action="{{ route('event.create') }}" method="post">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           id="title_event"
                                                                           name="title_event"
                                                                           placeholder="Write your title...">
                                                                </div>
                                                                <div class="form-group">
                                        <textarea class="form-control" name="event" id="new-event"
                                                  style="min-height:100px;height:50%;"
                                                  placeholder="Write your event..."></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-outline-primary">
                                                                    Post event
                                                                </button>
                                                                <input type="hidden" value="{{ Session::token() }}"
                                                                       name="_token">
                                                            </form>
                                                            <br>
                                                        @else
                                                        @endauth
                                                    @endif

                                                    <header><h3>The Events...</h3></header>
                                                    <div class="card-body">
                                                        <div class="card-body">
                                                            <section class="row events">
                                                                <div class="col-md-12 col-md-offset-3">
                                                                    @foreach($events as $event)
                                                                        <article class="event"
                                                                                 data-postid="{{ $event->id }}">
                                                                            <p>{{ $event->title }}</p>
                                                                            <p>{{ $event->event }}</p>
                                                                            <div class="info">
                                                                                Posted by {{ $event->user->name }}
                                                                                on {{ $event->created_at }}
                                                                            </div>
                                                                            @if (Route::has('login'))
                                                                                @auth
                                                                                    <div class="interaction">
                                                                                        <a href="#"
                                                                                           class="btn btn-xs btn-outline-success subscribe">{{ Auth::user()->subscribes()->where('event_id', $event->id)->first() ? Auth::user()->subscribes()->where('event_id', $event->id)->first()->event == 1 ? 'You subscribed this event' : 'Subscribe' : 'Subscribe'  }}</a>
                                                                                        |
                                                                                        <a href="#"
                                                                                           class="btn btn-xs btn-outline-danger subscribe">{{ Auth::user()->subscribes()->where('event_id', $event->id)->first() ? Auth::user()->subscribes()->where('event_id', $event->id)->first()->event == 0 ? 'You don\'t subscribed this event' : 'UnSubscribe' : 'UnSubscribe'  }}</a>
                                                                                        @if(Auth::user() == $event->user)
                                                                                            |
                                                                                            <a href="#" class="edit">Edit</a>
                                                                                            |
                                                                                            <a href="{{ route('event.delete', ['event_id' => $event->id]) }}">Delete</a>
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
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label for="title_event">Edit the Title</label>
                                                                        <input type="text" class="form-control"
                                                                               id="title_event"
                                                                               name="title_event">
                                                                        <br><br>
                                                                        <label for="event-body">Edit the event</label>
                                                                        <textarea class="form-control" name="event-body"
                                                                                  id="event-body" rows="5"></textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="button" class="btn btn-primary"
                                                                        id="modal-save">Save changes
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
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('/js/events.js') }}"></script>
        <script type="text/javascript">
            var token = '{{ Session::token() }}';
            var urlSubscribe = '{{ route('subscribe') }}';
            var urlEdit = '{{ route('edit_event') }}';
        </script>
@endsection
