@extends('layouts.backend.index')

@section('content')

<div class="row">
    <div class="col-sm-11 mx-auto">
        <hr>
			   <div class="card">
			     <div class="card-body">
				   <div class="card-title text-uppercase">Edit {{ $user->name }} Details</div>				   
                   <hr>
                   <div class="card-title text-info text-uppercase">Personal information</div>
				    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            {{-- Personal  Information --}}
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="input-13">Name</label>
                                    <input name="name" type="text" class="form-control form-control-square" value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="input-13">About Me</label>
                                    <textarea name="about" class="form-control form-control-square" rows="5">
                                        {{ $user->about }}
                                    </textarea>
                                </div>

                                {{-- <div class="form-group col-sm-9">
                                    <label for="input-13">Profile Picture</label>
                                    <input type="file" name="image" class="form-control form-control-square"> 
                                </div> --}}
                            </div>
                        
                            <div class="col-sm-6">
                                <div class="form-group col-sm-9 offset-col-sm-3">
                                        <label for="basic-select" >Select Roles</label>
                                          <select name="role_id" class="form-control" id="basic-select">
                                                <option value="{{ $user->role_id }}">{{ $user->role->name }}</option>
                                                <option disabled>__________________________</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Lecturer</option>
                                                <option value="3">Student</option>
                                            </select>
                                        </div>
                                      </div>

                                          
                                
                        </div>


					 {{-- Contact Information --}}
                        <hr>
                        <div class="card-title text-info text-uppercase">Contact information</div>
                        <div class="form-row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="input-14">Email</label>
                                    <input name="email" type="text" class="form-control form-control-square" id="input-14" value="{{ $user->email }}">
                                   </div>
    
                                   <div class="form-group">
                                    <label for="input-15">Phone Number</label>
                                    <input name="phone_no" type="text" class="form-control form-control-square" id="input-15" value="{{ $user->phone_no }}">
                                   </div>
                            </div>

                            {{-- Address and City --}}
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="input-15">City and Address</label>
                                    <textarea name="city" rows="5" class="form-control" id="basic-textarea">
                                        {{ $user->city }}
                                    </textarea>
                                   </div>
                            </div>
                        </div>

                        {{-- Personal Account/Portal Information --}}
                        <hr>
                        <div class="card-title text-info text-uppercase">Account information</div>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="input-15">Password</label>
                                <input  name="password" type="hidden" class="form-control form-control-square" 
                                id="input-15" value="{{ $user->password }}">
                               </div>
                               <div class="form-group col-sm-6">
                                <label for="input-15">Password</label>
                                <input  name="password" type="hidden" class="form-control form-control-square" 
                                id="input-15" value="{{ $user->password }}">
                               </div>
                        </div>

					 <div class="form-group">
                         <a href="{{ route('admin.user.index') }}" class="btn btn-warning shadow-primary btn-square px-5 text-uppercase">Cancel</a>
					  <button type="submit" class="btn btn-primary shadow-primary btn-square px-5 text-uppercase"> UPDATE</button>
                     </div>
                    </form>
                 </div>
               </div>
    </div>
</div>
@endsection