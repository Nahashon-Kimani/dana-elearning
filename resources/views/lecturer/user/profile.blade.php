@extends('layouts.backend.index')

@section('content')

<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <hr>
			   <div class="card">
			     <div class="card-body">
				   <div class="card-title text-uppercase">{{ $lecturer->name }} Profile</div>
				   <hr>
				    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="input-13">Name</label>
                                    <input name="name" type="text" class="form-control form-control-square" id="input-13" value="{{ $lecturer->name }}">
                                </div>
                            </div>
                        
                            <div class="col-sm-6">
                                <img src="{{ asset('images/users/'.Auth::user()->profile_picture) }}"
                                    class="img-responsive img-thumbnail float-right" alt="Profile Picture">
                            </div>
                        </div>
					 
                        <hr>
                        <div class="form-row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="input-14">Email</label>
                                    <input name="email" type="text" class="form-control form-control-square" id="input-14" value="{{ $lecturer->email }}">
                                   </div>
    
                                   <div class="form-group">
                                    <label for="input-15">Phone Number</label>
                                    <input name="phone_no" type="text" class="form-control form-control-square" id="input-15" value="{{ $lecturer->phone_no }}">
                                   </div>
                            </div>

                            {{-- Address and City --}}
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="input-15">City and Address</label>
                                    <textarea name="city" rows="5" class="form-control" id="basic-textarea">
                                        {{ $lecturer->city }}
                                    </textarea>
                                   </div>
                            </div>

                        </div>

                        {{-- ABOUT THE USER --}}
                        <div class="form-group">
                            <label for="input-15">STAFF DESCRIPTION: WILL APPEAR ON THE WEBSITE</label>
                            <textarea name="abouts" id="summernote" cols="30" rows="10">
                                {{ $lecturer->about }}
                            </textarea>
                           </div>



                        {{-- <div class="form-row">
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
                        <a href="{{ route('admin.user.index') }}" class="btn btn-warning shadow-warning btn-square px-5 text-uppercase">Cancel</a>
					    <button type="submit" class="btn btn-info shadow-info btn-square px-5 text-uppercase"><i class="icon-lock"></i> Register</button>
                     </div> --}}
                    </form>
               </div>
               </div>
    </div>
</div>
@endsection