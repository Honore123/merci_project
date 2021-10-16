@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active">Report</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.layouts.partials.notification')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">All Sales</h5>
                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="products-table">
                                    <thead>
                                    <th>#</th>
                                    <th>Table</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Option</th>
                                    </thead>
                                    <tbody>
                                    @forelse($tableOrders as $tableOrder)
                                        <tr>
                                            <td class="text-middle">{{$loop->index + 1}}</td>
                                            <td class="text-middle">Number {{$tableOrder->table->number}}</td>
                                            <td class="text-middle">
                                                @if($tableOrder->order_status == 0)
                                                    <span class="badge badge-primary p-2">Pending</span>
                                                @else
                                                    <span class="badge badge-success p-2">Prepared</span>
                                                @endif
                                            </td>
                                            <td class="text-middle">{{number_format($tableOrder->total_amount,0,'.',',')}}</td>
                                            <td class="text-middle">@include('admin.report.partials.action')</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="7">No order yet</td>
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
