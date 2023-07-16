 @extends('layouts.admin')
 @section('title', 'Earning Report')
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
                    <h3 class="card-title">Earning Report</h3>
                  </div>
                  <div class="col text-right">
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="overflow: auto;">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Date</th>
                    <th>Service</th>
                    <th>Service Charge</th>
                    <th>Our Earning</th>
                    <th>SP's Earning</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @php($i=1)
                    @foreach($earning as $row)

                      <tr>
                        <td>{{$i++}}</td>
                        <td style="min-width: 100px;">{{$row->created_at}}</td>
                        <td style="min-width: 100px;">{{$row->service_name}}</td>
                        <td style="min-width: 80px;">{{$row->service_amt}}</td>
                        <td style="min-width: 80px;">{{$row->percent_amt}}</td>
                        <td style="min-width: 80px;">{{$row->sp_earned_amt}}</td>
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