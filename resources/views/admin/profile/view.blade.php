@extends('layouts.admin')
@section('content')
<div class="container">
   
      <!-- success message -->
      @if (session('msg'))
          <div class="alert bg-gradient-success alert-dismissible fade show text-white" role="alert">
                {{ session('msg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
        @endif

      <!-- Error message -->
        @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert bg-gradient-warning alert-dismissible fade show text-white" role="alert">
                {{ $error }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endforeach
        @endif


        
        <div class="row" style="padding: 30px;">
        <h3 class="pl-3 text-white">Update Profile Information</h3><hr>
        <div class="col-md-12 card p-4">
                <form action="{{route('update.info',Auth::guard('admin')->user()->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <img height="150px" width="150px" src="{{ asset(Auth::guard('admin')->user()->image) }}" alt=""><br><br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image"><br><br>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <label for="name">User Name</label><br>
                    <input type="text" name="name" id="name" class="form-control" value="{{ Auth::guard('admin')->user()->name }}"><br>

                    <label for="email">E-mail Address</label><br>
                    <input type="email" name="email" id="email" class="form-control" value="{{ Auth::guard('admin')->user()->email }}"><br>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        <div class="row" style="padding: 30px;">
        <h5>Change Password</h5>
            <div class="col-md-12 card p-4">
                <form action="{{route('update.password',Auth::guard('admin')->user()->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="current_password">Current Password</label><br>
                    <input type="password" name="current_password" id="current_password" class="form-control" ><br>
                    <label for="new_password">New Password</label><br>
                    <input type="password" name="new_password" id="new_password" class="form-control"><br>
                    <label for="confirm_password">Confirm New Password</label><br>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control"><br>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        <div class="row" style="padding: 30px;">
        <h5>Delete Account</h5>
            <div class="col-md-12 card p-4">
                    <div id="firstForm">
                        <p>
                        Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                        </p>
                        <button id="showFormButton" class="btn btn-danger">Delete</button>
                    </div>
                    <div id="formContainer" style="display: none;">
                        <form action="{{route('delete_admin_data',Auth::guard('admin')->user()->id)}}" method="post" enctype="multipart/form-data">
                            @csrf   
                            <h3>Are you sure you want to delete your account?</h3>
                            <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
                            <input type="password" id="password" name="password" class="form-control"><br>
                            <button type="button" onclick="hideForm()" class="btn btn-primary">Cancel</button>
                            <button type="submit" onclick="confirm('Press Okey to delete the account permanently')"  class="btn btn-danger">Delete Account</button> 
                        </form>
                    </div>
            </div>
        </div>
</div>
<script>
  const showFormButton = document.getElementById('showFormButton');
  const formContainer = document.getElementById('formContainer');

  showFormButton.addEventListener('click', () => {
    formContainer.style.display = 'block';
    firstForm.style.display = 'none';

  });

  function hideForm() {
    formContainer.style.display = 'none';
    firstForm.style.display = 'block';
  }
</script>
        </div>
@endsection