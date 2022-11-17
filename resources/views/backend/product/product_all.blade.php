@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <!-- Start page title  -->
        <!-- ===> along two laravel project serve at same time, that's why another project should change the port through cmd,php artisan serve --port=8081 -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between  ">
                    <h4 class="mb-sm-0">Product All</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                <a href="{{route('product.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add Product</a> <br><br>

                        <h4 class="card-title">Product All Data</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse; border-spacing:0;width:100%;" >

                            <thead>
                                <tr>
                                    <th width="5%">SI</th>
                                    <th>Name</th>
                                    <th>Supplier Name</th>
                                    <th>Unit</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($products as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->supplier_id}}</td>
                                    <td>{{$item->unit_id}}</td>
                                    <td>{{$item->category_id}}</td>

                                    <td>
                                    @if($item->status == 1)
                                    <a href="{{url('/category/status/0')}}/{{$item->id}}">
                                        <button type="button" class="btn btn-primary">Active</button>
                                        <!-- <div class="col-xl-3 col-lg-4 col-sm-6"><i class="mdi mdi-account-check" style="font-size:30px;" ></i><span></span></div> -->
                                       
                                    </a>
                                    
                                    @elseif($item->status == 0)
                                    <a href="{{url('/category/status/1')}}/{{$item->id}}">
                                        <button type="button" class="btn btn-warning">Deactive</button>
                                        <!-- <div class="col-xl-3 col-lg-4 col-sm-6"><i class="mdi mdi-account-cancel" style="font-size:30px; color:red;" ></i><span></span></div> -->

                                    </a>
                                    @endif
                              
                                    </td>


                                    <td>
                                        <a href="{{ route('category.edit',$item->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('category.delete',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>

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

