@section('title', 'Management')
@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="text-align: center;">
                <div class="card">
                    <div class="card-header">User Management</div>
                    <div class="card-body">
                        <div id="users_table" style="text-align: center;">
                            <table class="table table-hover table-bordered" id="users_table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col">Update Date</th>
                                    <th scope="col">Rank</th>
                                    <th scope="col" id="actions">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr data-userid="{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>{{ $user->rank }}</td>
                                        <td id="actions">
                                            <a href="#" class="btn btn-outline-success btn-xs edit">Edit</a>
                                            <a href="{{ route('user.delete', ['userid' => $user->id]) }}"
                                               class="btn btn-outline-danger btn-xs">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button onclick="javascript:MakePDF()" class="btn btn-outline-info btn-md">Export as PDF</button>
                </div>
                @if (Route::has('login'))
                    @auth
                        <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit a user</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="user-name">Edit the Name</label>
                                                <input class="form-control" name="user-name" id="user-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="user-email">Edit the email</label>
                                                <input class="form-control" name="user-email" id="user-email">
                                            </div>
                                            <div class="form-group">
                                                <label for="user-rank">Edit the rank</label>
                                                <input class="form-control" name="user-rank" id="user-rank">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>
    <script src="{{ asset('/js/generate_pdf.js') }}"></script>
    <script src="{{ asset('/js/edit_user.js') }}"></script>
    <script type="text/javascript">
        var urlEdit = '{{ route('edit_user') }}';
    </script>
@endsection

