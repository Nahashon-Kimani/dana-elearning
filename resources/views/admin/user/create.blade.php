@extends('layouts.backend.index')

@section('content')

<div class="row">
    <div class="col-sm-11 mx-auto">
        <hr>
			   <div class="card">
			     <div class="card-body">
				   <div class="card-title text-uppercase">Add a New User</div>
				   <hr>
				    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="input-13">Name</label>
                                    <input name="name" type="text" class="form-control form-control-square" id="input-13" placeholder="Enter Your Name">
                                </div>

                                <div class="form-group">
                                    <label for="input-13">Profile Picture</label>
                                    <input type="file" id="image" name="image" class="form-control form-control-square">
                                </div>
                            </div>
                        
                            <div class="col-sm-6">
                                <div class="form-group col-sm-9 offset-col-sm-3">
                                        <label for="basic-select" >Select Roles</label>
                                          <select name="role_id" class="form-control" id="basic-select">
                                                <option value="1">Admin</option>
                                                <option value="2">Lecturer</option>
                                                <option value="3">Student</option>
                                            </select>
                                        </div>
                                      </div>
                                
                            </div>
					 
                        <hr>
                        <div class="form-row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="input-14">Email</label>
                                    <input name="email" type="text" class="form-control form-control-square" id="input-14" placeholder="Enter Your Email Address">
                                   </div>
    
                                   <div class="form-group">
                                    <label for="input-15">Phone Number</label>
                                    <input name="phone_no" type="text" class="form-control form-control-square" id="input-15" placeholder="Enter Password">
                                   </div>
                            </div>

                            {{-- Address and City --}}
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="input-15">City and Address</label>
                                    <textarea name="city" rows="5" class="form-control" id="basic-textarea"></textarea>
                                   </div>
                            </div>

                        </div>

                        {{-- ABOUT THE USER --}}
                        <div class="form-group">
                            <label for="input-15">STAFF DESCRIPTION: WILL APPEAR ON THE WEBSITE</label>
                            <textarea name="abouts" id="summernote" cols="30" rows="10"></textarea>
                           </div>



                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="input-15">Password</label>
                                <input name="password" type="password" class="form-control form-control-square" id="input-15" placeholder="Enter Password">
                               </div>

                               <div class="form-group col-sm-6">
                                <label for="input-15">Confirm Password</label>
                                <input name="confirm-password" type="password" class="form-control form-control-square" id="input-15" placeholder="Enter Password">
                               </div>
                        </div>
					 <div class="form-group">
                         <a href="{{ route('admin.user.index') }}" class="btn btn-warning shadow-primary btn-square px-5 text-uppercase">Cancel</a>
					  <button type="submit" class="btn btn-primary shadow-primary btn-square px-5 text-uppercase"><i class="icon-lock"></i> Register</button>
                     </div>
                    </form>
               </div>
               </div>
    </div>
</div>
@endsection