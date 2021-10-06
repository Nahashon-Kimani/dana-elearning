@extends('layouts.backend.index')
@section('content')


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
						<h4 class="text-white mb-0">{{ $messages }}</h4>
						<span class="text-white">
              @if ($messages == 0)
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
        <div class="card-footer">
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
  <!-- End Row-->


  @endsection