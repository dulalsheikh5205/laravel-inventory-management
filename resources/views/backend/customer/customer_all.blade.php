@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <!-- Start page title php artisan serve --port=8081 -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between  ">
                    <h4 class="mb-sm-0">Customer All</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                <a href="{{route('customer.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add Customer</a> <br><br>

                        <h4 class="card-title">Customer All Data</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse; border-spacing:0;width:100%;" >

                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>Customer Image</th>
                                    <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($customers as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                     <!-- <td><img src="{{ asset($item->customer_image) }}" style="width:60px;height;50px;"></td> -->   <!-- show Loop image BY Kazi Ariyan from database by maping -->
                                    <td><img src="{{asset('storage/upload/customerStorage/'.$item->customer_image)}}"  width="70px" height="70px"></td>   <!-- show Loop image BY Aman Sir from database by maping--> 
                                    <td>{{$item->mobile_no}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>
                                    @if($item->status == 1)
                                    <a href="{{url('/customer/status/0')}}/{{$item->id}}">
                                        <!-- <button type="button" class="btn btn-primary">Active</button> -->
                                        <div class="col-xl-3 col-lg-4 col-sm-6"><i class="mdi mdi-account-check" style="font-size:30px;" ></i><span></span></div>
                                       
                                    </a>
                                    
                                    @elseif($item->status == 0)
                                    <a href="{{url('/customer/status/1')}}/{{$item->id}}">
                                        <!-- <button type="button" class="btn btn-warning">Deactive</button> -->
                                        <div class="col-xl-3 col-lg-4 col-sm-6"><i class="mdi mdi-account-cancel" style="font-size:30px; color:red;" ></i><span></span></div>

                                    </a>
                                    @endif
                                    

                              
                                    </td>
                                    <td>
                                        <a href="{{ route('customer.edit',$item->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('customer.delete',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

