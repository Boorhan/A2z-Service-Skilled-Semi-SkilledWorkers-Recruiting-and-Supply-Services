 @extends('layouts.admin')
 @section('title', 'All Payments')
 @section('content')
  <!-- Main content -->
    <section class="content" style="padding-top: 20px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm"></div>
          <div class="col-md-12">

            <div class="card card-info">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h3 class="card-title">All Payments</h3>
                  </div>
                  <div class="col text-right">
                    <a href="{{route('payment')}}"><i class="fas fa-plus"></i> New Payment</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="overflow: auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Payment Time</th>
                    <th>Paid Amount</th>
                    <th>Transaction ID</th>
                    <th>Service Provider</th>
                    <th>Received By</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @php($i=1)
                    @foreach($payments as $row)

                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{{$row->payment_amount}}</td>
                        <td>{{$row->transaction_id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->admin_name}}</td>
                      </tr>
                    @endforeach
                  </tbody>                
                </table>
              </div>
            </div>
            </div>
            <!-- /.card -->

          </div>
          <div class="col-sm"></div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection