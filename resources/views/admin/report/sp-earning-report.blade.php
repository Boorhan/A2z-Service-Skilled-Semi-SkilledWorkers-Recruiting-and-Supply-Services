 @extends('layouts.admin')
 @section('title', 'SP Earning Report')
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
                    <h3 class="card-title">SP's Earning Report</h3>
                  </div>
                  <div class="col text-right">
                    <a href=""></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="overflow: auto;">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Service Provider</th>
                    <th>Total Earned</th>
                    <th>SP's Earning</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @php($i=1)
                    @foreach($spearning as $row)

                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->total_service_amount}}</td>
                        <td>{{$row->sp_earning}}</td>
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