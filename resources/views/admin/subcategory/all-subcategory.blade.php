 @extends('layouts.admin')
 @section('title', 'All Subcategories')
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
                    <h3 class="card-title">All Subcategories</h3>
                  </div>
                  <div class="col text-right">
                    <a href="{{route('subcategory')}}"><i class="fas fa-plus"></i> Add Subcategory</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="overflow: auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Subcategory Name</th>
                    <th>Category Name</th>
                    <th>Subcategory Image</th>
                    <th>Subcategory Slug</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Manage</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @php($i=1)
                    @foreach($subcategories as $row)

                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->sub_category_name}}</td>
                        <td>{{$row->category_name}}</td>
                        <td style="text-align: center;"><a href="{{asset('public/uploads/'.$row->sub_category_image)}}" target="_blank" ><img src="{{asset('public/uploads/'.$row->sub_category_image)}}" class="img-responsive" style="height: 100px;"></a></td>
                        <td>{{$row->sub_category_slug}}</td>
                        <td>{{$row->admin_name}}</td>
                        <td>{{$row->created_at}}</td>
                         <td class="text-center">
                          <a href="{{url('delete-subcategory/'.$row->subcategory_no)}}" class="btn btn-danger" id="delete"><i class="fas fa-trash"></i></a>
                          <a href="{{url('edit-subcategory/'.$row->subcategory_no)}}" class="btn btn-info" id="edit"><i class="fas fa-pencil-alt"></i></a>
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