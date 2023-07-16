@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('service.all')}}">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Services</span>
                  <span class="info-box-number">
                    {{$count_service}}
                    <small></small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('order.pending')}}">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-history"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Pending Orders</span>
                  <span class="info-box-number">{{$pending_order}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('order.processing')}}">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-share-square"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Processing Orders</span>
                  <span class="info-box-number">{{$processing_order}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('order.completed')}}">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clipboard-check" style="color: #fff;"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Completed Orders</span>
                  <span class="info-box-number">{{$completed_order}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-9">
            
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Pending Service Request</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Service Title</th>
                      <th>Date & Time</th>
                      <th>User Info</th>
                      <th>Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderList as $row)
                      <tr>
                        <td><a href="{{url('order-details/'.$row->service_request_no)}}">{{$row->order_number}}</a></td>
                        <td>{{$row->service_name}}</td>
                        <td>{{$row->order_date}} , {{$row->order_time}}</td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">{{$row->name}}, {{$row->phone}}</div>
                        </td>
                        <td><a href="{{url('order-details/'.$row->service_request_no)}}" class="btn btn-info" id="update" title="delete" style="margin-bottom: 5px;"><i class="fas fa-eye"></i></a></td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="{{route('order.pending')}}" class="btn btn-sm btn-secondary float-right">View All Pending Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-3">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-user-cog" style="color: #fff"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" style="color: #fff">Service Providers</span>
                <span class="info-box-number" style="color: #fff">{{$totalSP}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Customers</span>
                <span class="info-box-number">{{$totalCustomer}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-file-invoice-dollar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Earnings</span>
                <span class="info-box-number">{{$total_earning}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Our Earnings</span>
                <span class="info-box-number">{{$our_earning}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
@endsection