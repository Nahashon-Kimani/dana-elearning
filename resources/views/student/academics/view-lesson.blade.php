@extends('layouts.backend.index')
@section('content')


    <div class="table-responsive">
            <div class="btn-group m-1">
                @foreach ($lessons as $key=>$singleLesson)
                    <form action="{{ route('student.view-lesson', $singleLesson->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="unit_id" value="{{ $singleLesson->unit_id }}">
                        @if ((($key + 1) % 2) == 0)
                            <button type="submit" class="btn btn-warning waves-effect waves-light"> 
                                <i class="fa fa-book-open"></i>
                                {{ \Illuminate\Support\Str::limit($singleLesson->title, 8) }}
                            </button>
                        @else
                            <button type="submit" class="btn btn-info waves-effect waves-light"> 
                                <i class="fa fa-book-open"></i>
                                {{ \Illuminate\Support\Str::limit($singleLesson->title, 8) }}
                            </button>
                        @endif
                    </form>
                @endforeach
            </div>
            {!! $lessons->links() !!}
        </div>

        <hr>

<div class="row mt-5">
    {{-- Course Outline --}}
        <div class="col-sm-12 mx-auto">
            <div class="card">           
            <div class="card-header bg-info text-white">
                <p class="h3 text-center text-uppercase">{{ $lesson->units->name }}: <br> <small> {{ $lesson->title }}</small>.</p>
                </div>
            <div class="card-body">
                <p class="card-text text-info"><strong> Lesson Objectives:</strong> <br>{{ $lesson->lesson_objectives }}</p>
                <hr>
                <p class="card-text text-justify">{!! $lesson->content !!}</p>
            </div>
            <div class="card-footer text-uppercase">dana school</div>
            </div>
        </div>
</div>

<hr>
<div class="row mt-5">
     {{-- Featuring Video --}}
      <div class="col-12 col-sm-6 col-md-6">
        <div class="card text-white bg-info text-center border border-info">
          <div class="card-body">
            <p class="card-text">
                @if ($lesson->featured_video == NULL)
                    No Video Attached
                @else
                    <button type="button" class="btn btn-warning waves-effect waves-light m-1 text-uppercase">
                        Lesson Video
                    </button>
                @endif
            </p>
          </div>
        </div>
      </div>
      
    {{-- Assignment --}}
    <div class="col-12 col-sm-6 col-md-6">
        <div class="card text-white text-center border border-warning bg-warning">
          <div class="card-body">
            <p class="card-text">
                @if ($lesson->exercise_id == NULL)
                    No Exercise Attached
                @else
                    <a href="{{ route('student.view-assignment', $lesson->exercise_id) }}" 
                        target="_blank"
                        class="btn btn-info waves-effect waves-light m-1 text-uppercase">
                        Exe: {{ $lesson->exercise->title }}
                    </a>
                @endif
            </p>
          </div>
        </div>
      </div>   
</div>


@endsection