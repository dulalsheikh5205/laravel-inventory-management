@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

    <div class="row">

        <div class="col-lg-4">
            <div class="card"><br><br>
<center>
                <!-- <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no-image.jpg') }}" alt="Card image cap"> -->

                <!-- <img src="{{asset('storage/upload/admin_images/'.$adminData->profile_image)}}" width="100px"> -->

                <!-- <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image))? asset('storage/upload/admin_images/'.$adminData->profile_image): 'https://upload.wikimedia.org/wikipedia/commons/9/9e/Placeholder_Person.jpg' }}" alt="Card image cap"> -->

                 <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image))? asset('storage/upload/admin_images/'.$adminData->profile_image):asset('storage/no-image.jpg') }}" alt="Card image cap">


</center>
                <div class="card-body">
                    <h4 class="card-title">Name: {{$adminData->name}}</h4><hr>
                    <h4 class="card-title">Email: {{$adminData->email}}</h4><hr>
                    <h4 class="card-title">User Name: {{$adminData->username}}</h4><hr>
                    <a href="{{route('edit.profile')}}" class="btn btn-info waves-effect waves-light">Edit Profile</a>
                    
                      
                    </p>
                </div>
            </div>
        </div>
           
    </div>

    </div>
</div>


@endsection