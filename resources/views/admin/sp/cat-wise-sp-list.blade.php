 @extends('layouts.admin')
 @section('title', 'Category Wise Service Providers List')
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
                    <a href="{{route('cat-wise-sp')}}"><i class="fas fa-plus"></i> Add New</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="overflow: auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Service Provider</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Created By</th>
                    <th>Created On</th>
                    <th>Manage</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @php($i=1)
                    @foreach($get_cat_wiseSP as $row)

                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->category_name}}</td>
                        <td>{{$row->sub_category_name}}</td>
                        <td>{{$row->admin_name}}</td>
                        <td>{{$row->created_at}}</td>
                        <td class="text-center">
                          <a href="{{url('delete-category-wise-service-provider/'.$row->cat_wise_sp_no)}}" class="btn btn-danger" id="delete"><i class="fas fa-trash"></i> </a>
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