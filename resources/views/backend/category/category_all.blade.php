@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <!-- Start page title  -->
        <!-- ===> along two laravel project serve at same time, that's why another project should change the port through cmd,php artisan serve --port=8081 -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between  ">
                    <h4 class="mb-sm-0">Category All</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                <a href="{{route('unit.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add Category</a> <br><br>

                        <h4 class="card-title">Category All Data</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse; border-spacing:0;width:100%;" >

                            <thead>
                                <tr>
                                    <th width="5%">SI</th>
                                    <th>Name</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($categories as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>

                                    <td>
                                        <a href="{{ route('unit.edit',$item->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('unit.delete',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>

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

