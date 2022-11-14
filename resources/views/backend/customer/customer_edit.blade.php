@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Customer Page</h4><br><br>
            <form method="post" action="{{ route('customer.update')}}" id="myForm" enctype="multipart/form-data" >
                @csrf
                
                <input type="hidden" name="id" value="{{ $customer->id}}">

                <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label">Customer Name</label>
                    <div class="form-group col-sm-10">
                        <input class="form-control" type="text" name="name" value="{{ $customer->name}}" >
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label">Customer Mobile</label>
                    <div class="form-group col-sm-10">
                        <input class="form-control" type="text" name="mobile_no" value="{{ $customer->mobile_no}}" >
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label">Customer Email</label>
                    <div class="form-group col-sm-10">
                        <input class="form-control" type="email" name="email" value="{{ $customer->email}}" >
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label">Customer Address</label>
                    <div class="form-group col-sm-10">
                        <input class="form-control" type="text" name="address" value="{{ $customer->address}}" >
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Customer Image</label>
                    <div  class="form-group col-sm-10">
                        <input class="form-control" type="file" name="customer_image"   id="image">
                    </div>
                </div>
                <!-- end row -->


                <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <!-- <img class="rounded avatar-lg" id="showImage" src="{{asset($customer->customer_image)}}" alt="Card image cap"> -->
                    <img class="rounded avatar-lg" id="showImage" src="{{asset('storage/upload/customerStorage/'.$customer->customer_image)}}" alt="Card image cap">
                    </div>
                </div>
                <!-- {{ (!empty($customer->customer_image))? asset('storage/upload/admin_images/'.$customer->customer_image):asset('storage/no-image.jpg') }} -->

                <!-- end row -->

                

                

                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Customer">
            </form>   
            </div>
        </div>
    </div> <!-- end col -->
</div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                mobile_no: {
                    required : true,
                }, 
                email: {
                    required : true,
                }, 
                address: {
                    required : true,
                }, 
                // customer_image: {
                //     required : true,
                // }, 
            },
            messages :{
                name: {
                    required : 'Please Enter Your name',
                },
                mobile_no: {
                    required : 'Please Enter Your Mobile Number',
                },
                email: {
                    required : 'Please Enter Your email',
                },
                address: {
                    required : 'Please Enter Your Address',
                },
                // customer_image: {
                //     required : 'Please Select Your One Image',
                // },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
               $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);

        });
    });

   

</script> 


@endsection