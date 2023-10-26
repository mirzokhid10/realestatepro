@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div>
                            <img class="wd-100 ht-100 rounded-circle"
                                src="{{ !empty($profileData->photo)
                                    ? url('upload/admin_images/'.$profileData->photo)
                                    : url('upload/no_image.jpg') }}"
                                alt="profile">
                            <span class="h4 ms-3">{{ $profileData->name }}</span>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Username:</label>
                            <p class="text-muted">
                                {{ !empty($profileData->username) ? $profileData->username : 'Username not entered' }} </p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">
                                {{ !empty($profileData->email) ? $profileData->email : 'Email not entered' }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">
                                {{ !empty($profileData->phone) ? $profileData->phone : 'Phone not entered' }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address</label>
                            <p class="text-muted">
                                {{ !empty($profileData->address) ? $profileData->address : 'Address not entered' }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Update admin profile</h6>
                        <form method="POST" action="{{route("admin.profile.store")}}" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control"
                                    value="{{ $profileData->username }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $profileData->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $profileData->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $profileData->phone }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ $profileData->address }}">
                            </div>
                            <div class="mb-3">
                                <label for="formfile" class="form-label">Photo</label>
                                <input type="file" name="photo" class="form-control"
                                    value="{{ $profileData->address }}" id="image">
                            </div>
                            <div class="mb-3">
                                <img id="showImage" class="wd-75 h-75 rounded-circle"
                                    src="{{ !empty($profileData->photo)
                                        ? url('upload/admin/admin_images/' . $profileData->photo)
                                        : url('upload/no_image.jpg') }}"
                                    alt="profile">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#image").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#showImage").attr("src", e.target.result);
                }
                reader.readAsDataURL(e.target.files["0"]);
            })
        })
    </script>
@endsection
