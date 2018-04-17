@section('title', 'Gestion')
@extends('layouts.header')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User Management</div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col">Update Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Alexis</td>
                                    <td>alexisdu54180@gmail.com</td>
                                    <td>2018-04-13 06:44:00</td>
                                    <td>2018-04-13 06:44:00</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Test</td>
                                    <td>testeur@gmail.com</td>
                                    <td>2018-04-15 12:24:00</td>
                                    <td>2018-04-15 12:24:00</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Clara</td>
                                    <td>clara@gmail.com</td>
                                    <td>2018-04-16 14:12:00</td>
                                    <td>2018-04-16 14:12:00</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
