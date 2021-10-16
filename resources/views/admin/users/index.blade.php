@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    @include('admin.layouts.partials.notification')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">All Users</h5>
                            <div class="card-tools">
                                <button class="btn btn-info rounded-0" data-toggle="modal" data-target="#add-user-modal">
                                    New User
                                </button>
                                @include('admin.users.partials.add')
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="products-table">
                                    <thead>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Option</th>
                                    </thead>
                                    <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td class="text-middle">{{$loop->index + 1}}</td>
                                            <td class="text-middle">{{$user->name}}</td>
                                            <td class="text-middle">{{$user->email}}</td>
                                            <td class="text-middle">@include('admin.users.partials.action')</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="4">No table yet</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
