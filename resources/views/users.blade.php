@extends('layouts.master')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="panel-title col-md-6">
                    Filter
                </div>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-inline" action="{{ route('users') }}" method="GET">
                <input type="text" class="form-control mb-2 mr-sm-4" placeholder="Enter year" id="year" name="year" value={{ $requestData['year'] ?? '' }}>
                <input type="text" class="form-control mb-2 mr-sm-4" placeholder="Enter month" id="month" name="month" value={{ $requestData['month'] ?? '' }}>

                <button type="submit" class="btn btn-primary mb-2">Filter</button>
            </form>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="panel-title col-md-6">
                    User List
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-hover table-striped">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Phone</th>
                    <th>IP</th>
                    <th>Country</th>
                </tr>
                </thead>

                <tbody>
                @foreach($userList as $user)
                    @php
                        $user = is_array($user) ? (object) $user : $user;
                    @endphp
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->email_address}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->dob}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->ip}}</td>
                        <td>{{$user->country}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {{ $userList->links() }}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
