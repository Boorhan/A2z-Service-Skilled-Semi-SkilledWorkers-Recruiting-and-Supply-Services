 @extends('layouts.admin')
 @section('title', 'All Disapproved Services')
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
                    <h3 class="card-title">All Disapproved Services</h3>
                  </div>
                  <div class="col text-right">
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="overflow: auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Service Charge</th>
                    <th>Slug</th>
                    <th>Payment Details</th>
                    <th>Service Details</th>
                    <th>What Includes</th>
                    <th>What Excludes</th>
                    <th>Terms & Conditions</th>
                    <th>Image</th>
                    <th>Created By</th>
                    <th>Created On</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @php($i=1)
                    @foreach($declined_services as $row)

                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->service_name}}</td>
                        <td>{{$row->category_name}}</td>
                        <td>{{$row->sub_category_name}}</td>
                        <td>{{$row->service_charge}}</td>
                        <td>{{$row->service_slug}}</td>
                        <td><span class="text_">{{$row->payment_details}}</span></td>
                        <td><span class="text_">{{$row->service_details}}</span></td>
                        <td><span class="text_">{{$row->what_included}}</span></td>
                        <td><span class="text_">{{$row->what_excluded}}</span></td>
                        <td><span class="text_">{{$row->terms_condition}}</span></td>
                        <td style="text-align: center;"><a href="{{asset('public/uploads/'.$row->service_image)}}" target="_blank"><img src="{{asset('public/uploads/'.$row->service_image)}}" style="height: 100px;width: 150px;"></a></td>
                        <td>{{$row->admin_name}}</td>
                        <td>{{$row->created_at}}</td>
                        
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