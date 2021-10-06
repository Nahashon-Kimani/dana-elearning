@extends('layouts.backend.index')
@section('content')

<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Bootstrap Elements</h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">Rocker</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">UI Elements</a></li>
        <li class="breadcrumb-item active" aria-current="page">Bootstrap Elements</li>
     </ol>
   </div>
 <div class="col-sm-3">
   <div class="btn-group float-sm-right">
    <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <div class="dropdown-menu">
      <a href="javaScript:void();" class="dropdown-item">Action</a>
      <a href="javaScript:void();" class="dropdown-item">Another action</a>
      <a href="javaScript:void();" class="dropdown-item">Something else here</a>
      <div class="dropdown-divider"></div>
      <a href="javaScript:void();" class="dropdown-item">Separated link</a>
    </div>
  </div>
 </div>
 </div>



<div class="row">
    <div class="col-sm-9 mx-auto">
        <div class="card">
          <div class="card-header bg-info text-white">
              <p class="h3 text-center text-uppercase">{{ $unit->units->name }} </p>
              {{-- <p class="h5">Unit under: {{ $unit->courses->name }} Course</p> --}}
              <p class="h5">Duration: {{ $unit->units->duration }}</p>

            </div>
          <div class="card-body">
            <p class="card-text">
                {!! $unit->units->desc !!}
            </p>
          </div>
          <div class="card-footer text-uppercase">dana school</div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card">
            <div class="card-header bg-info text-white text-uppercase"> Click to view unit:  </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action"> Scheme of Work </a>
                    <a href="#" class="list-group-item list-group-item-action"> Unit Syllabus</a>
                  </div>
            </div>
            <div class="card-footer text-uppercase">dana school</div>
          </div>
      </div>
</div>


<div class="row">
    <div class="col-sm-12 mx-auto">
      <div class="card">
        <div class="card-header text-uppercase">
            <i class="fa fa-table"></i> Uploaded lesson under this unit
            <a href="{{ route('lecturer.lesson.create') }}" class="btn btn-info float-right">
                <i class="fa fa-plus"> New Lesson</i>
            </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>LESSON TITLE</th>
                        <th>VIDEO LINK</th>
                        <th>LESSON ASSIGNMENT</th>
                        {{-- <th>CREATED BY</th> --}}
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse ($lessons as $key=>$lesson)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ Str::limit($lesson->title, 9, '') }}</td>
                        <td>
                          @if ($lesson->featured_video == NULL)
                            <span class="badge badge-warning m-1">No Video</span>  
                          @else
                            <a href="{{ $lesson->featured_video }}">{{ $lesson->featured_video }}</a>
                          @endif
                        </td>
                        {{-- <td><a href="{{ route('admin.user.show', $lesson->created_by) }}">{{ $lesson->user->name }}</a></td> --}}
                        {{-- <td>{{ $lesson->lessons->name }}</td> --}}
                        <td>
                          @if ($lesson->exercise_id == NULL)
                            <span class="badge badge-warning m-1">No Exercise</span>
                          @else
                            {{-- <a href="{{ route('admin.exercise.show', $lesson->exercise_id) }}" target="_blank">
                              {{ $lesson->exercise->title }}
                            </a> --}}
                          @endif
                        </td>
                        <td>
                          <div class="btn-group m-1" role="group">
                            <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              ACTIONS
                            </button>
                            <div class="dropdown-menu">
                              <a href="{{ route('lecturer.lesson.edit', $lesson->id) }}" class="dropdown-item">EDIT</a>
                                {{-- <div class="dropdown-divider"></div>
                              <a href="javaScript:void();" class="dropdown-item">QUICK VIEW</a> --}}
                                <div class="dropdown-divider"></div>
                              <a href="{{ route('lecturer.lesson.show', $lesson->id) }}" class="dropdown-item">VIEW</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                  @empty
                  <tr>
                    <td colspan="6" class="text-center">
                       <div class="alert alert-info alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert">×</button>
                           <div class="alert-icon contrast-alert">
                         <i class="icon-info"></i>
                         </div>
                         <div class="alert-message">
                           <span><strong>Info!</strong> No Assigned Unit.</span>
                         </div>
                       </div>
                    </td>
                  </tr>
                  @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>LESSON TITLE</th>
                        <th>VIDEO LINK</th>
                        <th>LESSON ASSIGNMENT</th>
                        {{-- <th>CREATED BY</th> --}}
                        <th>ACTION</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        </div>
      </div>
    </div>
  </div><!-- End Row-->



@endsection