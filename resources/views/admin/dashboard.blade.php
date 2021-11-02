@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$pendingOrders}}</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$completedOrders}}</h3>

                            <p>Completed Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$tables}}</h3>

                            <p>Total tables</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-glass-cheers"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$users}}</h3>

                            <p>System Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">New orders</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>Table</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>View</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $order)
                                <tr>
                                    <td>
                                        Table {{ $order->table_id}}
                                    </td>
                                    <td>
                                        @if($order->order_status)
                                            <span class="badge bg-success">Completed</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{$order->total_amount}} RF</td>

                                    <td>
                                        <a href="{{route('report.show', $order->id)}}" class="text-muted">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            No Pending orders!
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Income Overview</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-sm btn-tool">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success text-xl">
                                    <i class="fas fa-check"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      {{number_format($totalRevenue->sum('total_amount'),0,'.',',')}} RF
                    </span>
                                    <span class="text-muted">TOTAL REVENUE</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-warning text-xl">
                                    <i class="fas fa-spinner"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                  {{number_format($orders->sum('total_amount'),0,'.',',')}} RF
                                    </span>
                                    <span class="text-muted">PENDING ORDERS</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
