@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Restaurant Tables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tables</li>
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
                            <h5 class="card-title">All Tables</h5>
                            <div class="card-tools">
                                <button class="btn btn-info rounded-0" data-toggle="modal"
                                        data-target="#add-table-modal">
                                    New Table
                                </button>
                                @include('admin.table.partials.add')
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="products-table">
                                    <thead>
                                    <th>#</th>
                                    <th>Number</th>
                                    <th>Option</th>
                                    </thead>
                                    <tbody>
                                    @forelse($tables as $table)
                                        <tr>
                                            <td class="text-middle">{{$loop->index + 1}}</td>
                                            <td class="text-middle">Number {{$table->number}}</td>
                                            <td class="text-middle">@include('admin.table.partials.action')</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="3">No table yet</td>
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
