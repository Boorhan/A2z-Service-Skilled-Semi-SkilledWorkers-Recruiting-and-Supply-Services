 @extends('layouts.admin')
 @section('title', 'Payment')
 @section('content')
  <!-- Main content -->
    <section class="content" style="padding-top: 20px;">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-sm"></div>
          <div class="col-md-9">

            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Payment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('payment.submit')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Service Provider</label>
                    <div class="col-sm-9">
                      <select class="form-control search" id="payment_sp" name="user_no">
                        <option value="-1" disabled selected>--Select Service Provider--</option>
                        @foreach($getSP as $data)
                          <option value="{{$data->user_no}}">{{$data->name}} -- {{$data->phone}}</option>
                        @endforeach
                      </select>
                      @error('user_no')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Previous Due Amount</label>
                    <div class="col-sm-9">
                      <input type="text" readonly="" id="previous_due_amt" class="form-control" name="previous_due_amt" value="" style="font-weight: bold;color: #f00;font-size: 20px;">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Paid Amount</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control  @error('payment_amount') is-invalid @enderror" name="payment_amount" value="{{old('payment_amount')}}" placeholder="Paid Amount" id="payment_amount">
                      @error('payment_amount')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">New Due Amount</label>
                    <div class="col-sm-9">
                      <input type="text" readonly="" id="payment_due_amt" class="form-control" name="payment_due_amt" value="{{old('sub_category_name')}}" style="font-weight: bold;color: #f00;font-size: 20px;">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Transaction ID</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('transaction_id') is-invalid @enderror" name="transaction_id" value="{{old('transaction_id')}}" placeholder="Transaction ID">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                  <button type="submit" class="btn btn-info">Take Payment</button>
                  <a class="btn btn-default" href="{{route('dashboard')}}">Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>
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