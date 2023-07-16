@extends('website.dashboard.index')
@section('title', 'SP Canceled Orders')
@section('user_dashboard')

    <section id="service-subcategory" class="top">
      <div class="container">
          <div class="row">
            <div class="col p_0" >
                

                <div class="row">
                    <div class="col-12 service-col">
                      
                        <h5 style="margin-top: 15px;" class="myOrderH4">My Completed Orders</h5>
                            <div class="service-details-content" style="padding:0px 20px;">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <table class="table table-bordered table-striped" style="margin-top: 15px;">
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
                                        </table>
                                    </div>
                                </div>
                              </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
      </div>
    </section>
  @endsection