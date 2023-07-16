 @extends('layouts.admin')
 @section('title', 'All Service Providers')
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
                    <h3 class="card-title">All Service Providers</h3>
                  </div>
                  <div class="col text-right">
                    <a href="{{route('sp.reg')}}"><i class="fas fa-plus"></i> Add New</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="overflow: auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>NID</th>
                    <th>NID Image</th>
                    <th>Education</th>
                    <th>Details</th>
                    <th>Address</th>
                    <th>Additional ID/Reg</th>
                    <th>Photo</th>
                    <th>Created By</th>
                    <th>Created On</th>
                    <th>Status</th>
                    <th>Manage</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @php($i=1)
                    @foreach($allSP as $row)

                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->user_nid}}</td>
                        <td style="text-align: center;"><a href="{{asset('public/uploads/'.$row->user_nid_photo)}}" target="_blank"><img src="{{asset('public/uploads/'.$row->user_nid_photo)}}" style="height: 150px;"></a></td>
                        <td>{{$row->educational_qualification}}</td>
                        <td>{{$row->user_details}}</td>
                        <td>{{$row->user_address}}</td>
                        <td>{{$row->id_type_name}} : {{$row->additional_id_num}}</td>
                        <td style="text-align: center;"><a href="{{asset('public/uploads/'.$row->user_photo)}}" target="_blank"><img src="{{asset('public/uploads/'.$row->user_photo)}}" class="img-responsive"></a></td>
                        <td>{{$row->admin_name}}</td>
                        <td>{{$row->created_at}}</td>
                        <td><span class="badge {{$row->is_active == 1 ?'badge-info':'badge-danger'}}">{{$row->is_active == 1 ?"Active":"Inactive"}}</span></td>
                         <td class="text-center">
                          <?php if($row->is_active == 1): ?>
                            <a href="{{url('block-sp/'.$row->user_no)}}" class="btn btn-danger" id="inactive" title="Inactivate"><i class="fas fa-lock"></i> </a>
                          <?php else: ?>
                            <a href="{{url('activate-sp/'.$row->user_no)}}" class="btn btn-info" id="active" title="Activate"><i class="fas fa-lock-open"></i> </a>
                          <?php endif ?>
                          <!-- <a href="{{url('edit-sp/'.$row->user_no)}}" class="btn btn-info" id="edit"><i class="fas fa-pencil-alt"></i></a> -->
                         </td>
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