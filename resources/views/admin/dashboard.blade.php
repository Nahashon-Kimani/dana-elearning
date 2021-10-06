@extends('layouts.backend.index')

@section('content')

{{-- First Row --}}

<div class="row mt-3">
	<div class="col-12 col-lg-6 col-xl-3">
		<div class="card bg-pattern-primary">
			<div class="card-body">
				<div class="media align-items-center">
					<div class="media-body text-left">
						<h4 class="text-white mb-0">{{ $noOfCourses }}</h4>
						<span class="text-white">Courses</span>
					</div>
					<div class="align-self-center w-circle-icon rounded-circle bg-contrast">
						<i class="icon-basket-loaded text-white"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-6 col-xl-3">
		<div class="card bg-pattern-danger">
			<div class="card-body">
				<div class="media align-items-center">
					<div class="media-body text-left">
						<h4 class="text-white mb-0">{{ $students }}</h4>
						<span class="text-white">New Students</span>
					</div>
					<div class="align-self-center w-circle-icon rounded-circle bg-contrast">
						<i class="icon-wallet text-white"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-6 col-xl-3">
		<div class="card bg-pattern-success">
			<div class="card-body">
				<div class="media align-items-center">
					<div class="media-body text-left">
						<h4 class="text-white mb-0">{{ $unAnsweredQuestion }}</h4>
						<span class="text-white">
							<a href="{{ route('admin.question.pending') }}" class="text-white">
								<i class="fa arrow-right"></i> Questions
							</a>
						</span>
					</div>
					<div class="align-self-center w-circle-icon rounded-circle bg-contrast">
						<i class="icon-pie-chart text-white"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-6 col-xl-3">
		<div class="card bg-pattern-warning">
			<div class="card-body">
				<div class="media align-items-center">
					<div class="media-body text-left">
						<h4 class="text-white mb-0">{{ $newMessages->count() }}</h4>
						<span class="text-white">
						@if ($newMessages->count() == 0)
							New Messages
						@else 
							<a href="{{ route('admin.message.index') }}" class="text-white">
								<i class="fa fa-arrow-right"></i>
							New Messages
							</a>
						@endif
            
						</span>
					</div>
					<div class="align-self-center w-circle-icon rounded-circle bg-contrast">
						<i class="icon-user text-white"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

  
{{-- First row starts --}}
  
<div class="row">
    {{-- First Column with Message --}}
    
	<div class="col-md-5">
		<div class="card card-info">
			<div class="card-body">
				<h5 class="card-title text-uppercase">New Messages </h5>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
                  {{-- 
								<th scope="col">ID</th> --}}
                  
								<th scope="col">TITLE</th>
								<th scope="col">POSTED BY</th>
							</tr>
						</thead>
						<tbody>
                @forelse ($newMessages as $key=>$msg)
                    
					<tr>
						{{-- <td>{{ $key + 1 }}</td> --}}
						<td>
							{{-- <a href="{{ route('admin.message.show', $msg->id) }}">{{ Str::limit($msg->title, 27, '') }}</a> --}}
							@if ($msg->askedBy->role_id == 3)
								<form action="{{ route('admin.message.student-message-show', $msg->id) }}" method="post">
									@csrf
									@method('PUT')
									<input type="hidden" name="student_id" value="{{ $msg->asked_by }}">
									<button type="submit" class="btn btn-link">{{ Str::limit($msg->title, 27, '') }}</button>

									{{-- Getting whether the message is today's --}}
									@if (date('d-m-Y', strtotime($msg->created_at)) == date('d-m-Y'))
										<span class="badge badge-info">T</span>
									@else
										<span class="badge badge-warning">Y</span>
									@endif
								</form>
							@else
								<a href="{{ route('admin.message.show', $msg->id) }}">{{ Str::limit($msg->title, 27, '') }}</a>

								{{-- Getting whether the message is today's --}}
								@if (date('d-m-Y', strtotime($msg->created_at)) == date('d-m-Y'))
									<span class="badge badge-info">T</span>
								@else
									<span class="badge badge-warning">Y</span>
								@endif

							@endif
							{{-- {{ date('d/m H:i', strtotime($msg->created_at)) }} --}}
						</td>
						<td>{{ Str::ucfirst($msg->askedBy->name) }}</td>
					</tr>
                @empty
                    
							<tr>
								<td colspan="2">
									<div class="alert alert-icon-info alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert">×</button>
										 <div class="alert-icon icon-part-info">
										  <i class="icon-info"></i>
										 </div>
										 <div class="alert-message">
											<span>
												<strong>Info!</strong> No Messages 
												<a href="{{ route('admin.message.index') }}" class="alert-link">View Other Messages.</a>
											</span>
										 </div>
									   </div>
								</td>
							</tr>
                @endforelse
              
						</tbody>
					</table>
				</div>
			{{ $newMessages->links() }}
			</div>
		</div>
	</div>

    {{-- Payments section --}}
    
	<div class="col-md-7">
		<div class="card card-info">
			<div class="card-body pb-2">
				<h5 class="card-title text-uppercase">New/Pending Payments </h5>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">M-PESA CODE</th>
								<th scope="col">DATE</th>
								<th scope="col">POSTED BY</th>
							</tr>
						</thead>
						<tbody>
                @forelse ($pendingPayments as $key=>$pay)
                    
							<tr>
								<td>{{ $key + 1 }}</td>
								<td>
									<a href="{{ route('admin.payments.edit', $pay->id) }}">
                            {{ Str::upper($pay->mpesa_code) }}
                        </a>
								</td>
								<td>
									{{ date('d/m', strtotime($pay->created_at)) }}
									<small>
										<span class="badge badge-warning">
											({{ date('H:i', strtotime($pay->created_at)+10800) }})
										</span>
									</small>
								</td>
								<td class="text-capitalize">{{ Str::limit($pay->paidBy->name, 18,  '') }}</td>
							</tr>
                @empty
                    
							<tr>
								<td colspan="3">
									<div class="alert alert-outline-info alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<div class="alert-icon">
											<i class="icon-info"></i>
										</div>
										<div class="alert-message">
											<span>
												<strong>Info!</strong> No new Messages 
												<a href="{{ route('admin.message.index') }}" class="alert-link">View Other Messages.</a>
											</span>
										</div>
									</div>
								</td>
							</tr>
                @endforelse
              
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer">
				{{ $pendingPayments->links() }}
			</div>
		</div>
	</div>
</div>
{{-- First row ends --}}


{{-- Syllabus, schemes, blocked students --}}

<div class="row">
	<div class="col-12 col-md-6 col-lg-6 col-xl-2">
		<div class="card text-center border-bottom-sm border-top-sm border-primary">
			<div class="card-body">
				<h6>SCHEMES</h6>
				<h4 class="text-primary">
					<a href="{{ route('admin.scheme.index') }}">{{ $unApprovedSchemes }}</a>
				</h4>
				<span id="dashboard3-chart-1">
					<canvas width="118" height="25" style="display: inline-block; width: 118px; height: 25px; vertical-align: top;"></canvas>
				</span>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-6 col-lg-6 col-xl-2">
		<div class="card text-center border-bottom-sm border-top-sm border-danger">
			<div class="card-body">
				<h6>SYLLABUS</h6>
				<h4 class="text-danger">
					<a href="{{ route('admin.syllabus.index') }}">{{ $unApprovedSyllabus }}</a>
				</h4>
				<span id="dashboard3-chart-2">
					<canvas width="118" height="25" style="display: inline-block; width: 118px; height: 25px; vertical-align: top;"></canvas>
				</span>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-6 col-lg-6 col-xl-2">
		<div class="card text-center border-bottom-sm border-top-sm border-success">
			<div class="card-body">
				<h6>NEW USERS</h6>
				<h4 class="text-success">{{$newUsers }}</h4>
				<span id="dashboard3-chart-3">
					<canvas width="118" height="25" style="display: inline-block; width: 118px; height: 25px; vertical-align: top;"></canvas>
				</span>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-6 col-lg-6 col-xl-2">
		<div class="card text-center border-bottom-sm border-top-sm border-warning">
			<div class="card-body">
				<h6>QUESTIONS</h6>
				<h4 class="text-warning">{{ $pendingQuestions }}</h4>
				<span id="dashboard3-chart-4">
					<canvas width="118" height="25" style="display: inline-block; width: 118px; height: 25px; vertical-align: top;"></canvas>
				</span>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-6 col-lg-6 col-xl-2">
		<div class="card text-center border-bottom-sm border-top-sm border-info">
			<div class="card-body">
				<h6>REVENUE(Sh)</h6>
				<h4 class="text-info">{{ $revenue }}</h4>
				<span id="dashboard3-chart-5">
					<canvas width="118" height="25" style="display: inline-block; width: 118px; height: 25px; vertical-align: top;"></canvas>
				</span>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-6 col-lg-6 col-xl-2">
		<div class="card text-center border-bottom-sm border-top-sm border-dark">
			<div class="card-body">
				<h6>VISITS</h6>
				<h4 class="text-dark">9524</h4>
				<span id="dashboard3-chart-6">
					<canvas width="118" height="25" style="display: inline-block; width: 118px; height: 25px; vertical-align: top;"></canvas>
				</span>
			</div>
		</div>
	</div>
</div>

{{-- Getting all users in the system grouped by their role --}}
{{-- All users in the system --}}
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header gradient-blooker text-uppercase">
            <i class="fa fa-table"></i> All users
            <a href="{{ route('admin.user.create') }}" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add new User</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL </th>
                    <th>PHONE NO</th>
                    <th>DESIGNATION</th>
                    <th>ACTION</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($users as $key=>$user)
                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->phone_no }}</td>
                          <td>
                              @if ($user->role_id == 1)
                                <span class="badge badge-info m-1">{{ $user->role->name }}</span>
                              @elseif ($user->role_id == 2)
                                <span class="badge badge-primary m-1">{{ $user->role->name }}</span>
                              @else
                                <span class="badge badge-warning m-1">{{ $user->role->name }}</span>
                              @endif
                            </td>
                          <td>
                            <div class="btn-group m-1" role="group">
                              <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ACTIONS
                              </button>
                              <div class="dropdown-menu">
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="dropdown-item">EDIT</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('admin.user.show', $user->id) }}" class="dropdown-item">VIEW</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                    @endforeach
                </tbody>
            <tfoot>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>EMAIL </th>
                  <th>PHONE NO</th>
                  <th>DESIGNATION</th>
                  <th>ACTION</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
        <div class="card-footer text-right">
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div><!-- End Row-->
    
@endsection