 <!--Start sidebar-wrapper-->
 <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true" class="color-sidebar bg-dark">
    <div class="brand-logo">
     <a href="{{ route('website.index') }}" target="_blank">
      <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
      <h5 class="logo-text">DANA SCHOOL</h5>
    </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MAIN NAVIGATION</li>
     
     
     @if(Request::is('admin*'))	
     <li>
      <a href="{{ route('admin.dashboard') }}" class="waves-effect">
        <i class="icon-home"></i> <span>Home</span>
      </a>
    </li>
    {{-- <li>
      <a href="#" class="waves-effect">
        <i class="icon-calendar"></i> <span>Calendar</span>
        <small class="badge float-right badge-info">New</small>
      </a>
    </li> --}}
     <li>
       <a href="{{ route('admin.dashboard') }}" class="waves-effect">
         <i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">
         <li><a href="{{ route('admin.user.admin') }}"><i class="fa fa-circle-o"></i>Admins</a></li>
         <li><a href="{{ route('admin.user.lecturers') }}"><i class="fa fa-circle-o"></i>Lecturers</a></li>
         <li><a href="{{ route('admin.user.students') }}"><i class="fa fa-circle-o"></i>Students</a></li>
         <li><a href="{{ route('admin.subscribers.index') }}"><i class="fa fa-circle-o"></i>Subscribers</a></li>
         <li><a href="index5.html"><i class="fa fa-circle-o"></i>Partners</a></li>
         <li><a href="index6.html"><i class="fa fa-circle-o"></i>Inactive Students</a></li>
         <li><a href="index6.html"><i class="fa fa-circle-o"></i>Inactive Lecturers</a></li>
       </ul>
     </li>
     <li>
       <a href="#" class="waves-effect">
         <i class="fa fa-mortar-board"></i>
         <span>Courses</span> <i class="fa fa-angle-left pull-right"></i>
       </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('admin.courses.index') }}"><i class="fa fa-circle-o"></i>Courses</a></li>
          <li><a href="{{ route('admin.course-outline.index') }}"><i class="fa fa-circle-o"></i>Course Outline</a></li>
        </ul>
     </li>
     <li>
      <a href="#" class="waves-effect">
        <i class="icon-briefcase"></i>
        <span>Academics</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ route('admin.unit.index') }}"><i class="fa fa-circle-o"></i>Units</a></li>
          <li><a href="{{ route('admin.instructor-unit.index') }}"><i class="fa fa-circle-o"></i>Assign Unit</a></li>
          <li><a href="{{ route('admin.scheme.index') }}"><i class="fa fa-circle-o"></i>Schemes</a></li>
          <li><a href="{{ route('admin.syllabus.index') }}"><i class="fa fa-circle-o"></i>Syllabus</a></li>
        </ul>
    </li>
    <li>
      <a href="{{ route('admin.exercise.index') }}" class="waves-effect">
        <i class="fa fa-check-square"></i>
        <span>Exercise</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
    </li>
    <li>
      <a href="{{ route('admin.lesson.index') }}" class="waves-effect">
        <i class="fa fa-book"></i>
        <span>Lesson</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{ route('admin.lesson.index') }}"><i class="fa fa-circle-o"></i>All Lessons</a></li>
        <li><a href="{{ route('admin.lesson.index') }}"><i class="fa fa-circle-o"></i>Not Approved</a></li>
        <li><a href="{{ route('admin.lesson.create') }}"><i class="fa fa-circle-o"></i>Upload Lesson</a></li>
      </ul>
    </li>

    <li>
      <a href="{{ route('admin.message.index') }}" class="waves-effect">
        <i class="fa fa-commenting-o"></i> 
        <span>Messages</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
    </li>

    <li>
      <a href="#" class="waves-effect">
        <i class="icon-calendar"></i> <span>Contact Messages</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{ route('admin.contact-us.unread') }}"><i class="fa fa-circle-o"></i>New Messages</a></li>
        <li><a href="{{ route('admin.contact-us.index') }}"><i class="fa fa-circle-o"></i>All Messages</a></li>
        <li><a href="{{ route('admin.contact-us.read') }}"><i class="fa fa-circle-o"></i>Read</a></li>
      </ul>
    </li>

    <li>
      <a href="#" class="waves-effect">
        <i class="fa fa-question"></i> <span>Questions</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{ route('admin.question.pending') }}"><i class="fa fa-circle-o"></i>Pending</a></li>
        <li><a href="{{ route('admin.question.index') }}"><i class="fa fa-circle-o"></i>Answered</a></li>
      </ul>
    </li>

    <li>
      <a href="#" class="waves-effect">
        <i class="fa fa-money"></i> <span>Payments</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
        <li><a href="{{ route('admin.payments.index') }}"><i class="fa fa-circle-o"></i>New Payments</a></li>
        <li><a href="{{ route('admin.payments.index') }}"><i class="fa fa-circle-o"></i>All Payments</a></li>
      </ul>
    </li>
    {{-- Website --}}
      <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="fa fa-globe"></i>
         <span>Website</span>
         <i class="fa fa-angle-left pull-right"></i>  
       </a>
       <ul class="sidebar-submenu">
             <li><a href="mail-inbox.html"><i class="fa fa-circle-o"></i> Home</a></li>
             <li><a href="mail-compose.html"><i class="fa fa-circle-o"></i> About Us</a></li>
             <li><a href="mail-read.html"><i class="fa fa-circle-o"></i> Services</a></li>
             <li><a href="mail-read.html"><i class="fa fa-circle-o"></i> Blog</a></li>
             <li><a href="mail-read.html"><i class="fa fa-circle-o"></i> Contact Us</a></li>
           </ul>
     </li>
    
    {{-- Emails --}}
     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="icon-envelope"></i>
         <span>Mailbox</span>
              <small class="badge float-right badge-warning">12</small>
       </a>
       <ul class="sidebar-submenu">
             <li><a href="mail-inbox.html"><i class="fa fa-circle-o"></i> Inbox</a></li>
             <li><a href="mail-compose.html"><i class="fa fa-circle-o"></i> Compose</a></li>
             <li><a href="mail-read.html"><i class="fa fa-circle-o"></i> Read Mail</a></li>
           </ul>
     </li>
     {{-- End of Admin Part --}}
     @endif


     @if(Request::is('lecturer*'))	
     <li>
      <a href="{{ route('lecturer.dashboard') }}" class="waves-effect">
        <i class="icon-home"></i>
        <span>Home</span>
      </a>
    </li>

     <li>
      <a href="javaScript:void();" class="waves-effect">
        <i class="fa fa-users"></i>
        <span>Students</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="sidebar-submenu">
            <li><a href="components-grid-layouts.html"><i class="fa fa-circle-o"></i>My student List</a></li>
      </ul>
    </li>

     <li>
       <a href="javaScript:void();" class="waves-effect">
          <i class="icon-briefcase"></i>
         <span>Units</span>
         <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">
             <li><a href="{{ route('lecturer.instructor-unit.index') }}"><i class="fa fa-circle-o"></i>Taught Units</a></li>
             <li><a href="{{ route('lecturer.instructor-unit.index') }}"><i class="fa fa-circle-o"></i> Allocated Units</a></li>
       </ul>
     </li>
     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="icon-support"></i> <span>Schemes</span>
         <i class="fa fa-angle-left float-right"></i>
       </a>
       <ul class="sidebar-submenu">
         <li><a href="{{ route('lecturer.scheme.create') }}"><i class="fa fa-circle-o"></i> Upload Schemes</a></li>
         <li><a href="{{ route('lecturer.scheme.index') }}"><i class="fa fa-circle-o"></i> Uploaded Schemes</a></li>
       </ul>
     </li>
     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="icon-note"></i> <span>Syllabus</span>
         <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">
            <li><a href="{{ route('lecturer.syllabus.create') }}"><i class="fa fa-circle-o"></i> Upload Syllabus</a></li>
            <li><a href="{{ route('lecturer.syllabus.index') }}"><i class="fa fa-circle-o"></i> Uploaded Schemes </a></li>
       </ul>
     </li>
     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="icon-fire"></i> <span>Lessons</span>
         <i class="fa fa-angle-left float-right"></i>
       </a>
       <ul class="sidebar-submenu">
            <li><a href="{{ route('lecturer.lesson.create') }}"><i class="fa fa-circle-o"></i> Upload Lesson</a></li>
            <li><a href="{{ route('lecturer.lesson.index') }}"><i class="fa fa-circle-o"></i> Uploaded Lesson</a></li>
       </ul>
     </li>
     <li>
      <a href="{{ route('lecturer.exercise.index') }}" class="waves-effect">
        <i class="icon-fire"></i> <span>Exercises</span>
        {{-- <i class="fa fa-angle-left float-right"></i> --}}
      </a>
     </li>
     <li>
      <a href="javaScript:void();" class="waves-effect">
        <i class="icon-grid"></i> <span> Questions</span>
        <i class="fa fa-angle-left float-right"></i>
      </a>
      <ul class="sidebar-submenu">
            <li><a href="{{ route('lecturer.question.index') }}"><i class="fa fa-circle-o"></i> Not Answered</a></li>
            <li><a href="{{ route('lecturer.question.answered') }}"><i class="fa fa-circle-o"></i> Answered</a></li>
            <li><a href="{{ route('lecturer.question.all-question') }}"><i class="fa fa-circle-o"></i> All Questions</a></li>
      </ul>
     </li>
     
      <li>
       <a href="{{ route('lecturer.user.edit', Auth::user()->id) }}" class="waves-effect">
         <i class="icon-event"></i> <span>My Profile</span>
         <small class="badge float-right badge-danger">10</small>
       </a>
     </li>
     
     {{-- <li>
      <a href="javaScript:void();" class="waves-effect">
        <i class="icon-grid"></i> <span> To do</span>
        <i class="fa fa-angle-left float-right"></i>
      </a>
      <ul class="sidebar-submenu">
            <li><a href="table-simple-tables.html"><i class="fa fa-circle-o"></i> New Todo</a></li>
            <li><a href="table-header-tables.html"><i class="fa fa-circle-o"></i> Pending</a></li>
            <li><a href="table-color-tables.html"><i class="fa fa-circle-o"></i> Done</a></li>
      </ul>
     </li> --}}
      @endif
      {{-- Lecturer View Ends --}}




      @if(Request::is('student*'))	
      <li>
        <a href="{{ route('student.dashboard') }}" class="waves-effect">
          <i class="icon-home"></i> <span>Home</span>
          {{-- <i class="fa fa-angle-left float-right"></i> --}}
        </a>
       </li>

      <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="icon-chart"></i> <span>Academics</span>
         <i class="fa fa-angle-left float-right"></i>
       </a>
       <ul class="sidebar-submenu">
             <li><a href="{{ route('student.student-course') }}"><i class="fa fa-circle-o"></i>My Courses</a></li>
             <li><a href="{{ route('student.completed-course') }}"><i class="fa fa-circle-o"></i>Completed Courses</a></li>
             <li><a href="{{ route('student.units') }}"><i class="fa fa-circle-o"></i>My Units</a></li>
       </ul>
      </li>
     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="fa fa-question"></i> <span>Questions</span>
         <i class="fa fa-angle-left float-right"></i>
       </a>
       <ul class="sidebar-submenu">
        <li><a href="{{ route('student.question.index') }}"><i class="fa fa-circle-o"></i>My Questions</a></li>
        <li><a href="{{ route('student.question.all-questions') }}"><i class="fa fa-circle-o"></i>All Questions</a></li>
     </ul>
      </li>
      
      <li>
        <a href="{{ route('student.message.index') }}" class="waves-effect">
         <i class="fa fa-comments"></i> <span>Messages</span> 
          {{-- <i class="fa fa-angle-left float-right"></i> --}}
        </a>
       {{-- <ul class="sidebar-submenu">
           <li><a href="{{ route('student.message.index') }}"><i class="fa fa-circle-o"></i>Sent Messages</a></li>
           <li><a href="{{ route('student.message.my-messages') }}"><i class="fa fa-circle-o"></i>New Message</a></li>
            <li><a href="{{ route('student.message.allmessages') }}"><i class="fa fa-circle-o"></i>All Message</a></li> 
        </ul>--}}
       </li>
      
       <li>
       <a href="{{ route('student.payments.index') }}" class="waves-effect">
         <i class="fa fa-credit-card"></i> <span>Fee Statement</span>
         {{-- <i class="fa fa-angle-left float-right"></i> --}}
       </a>
      </li>
     <li class="sidebar-header">LABELS</li>

     {{-- <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="fa fa-circle-o text-red"></i> <span>Recommendation</span></a>
      </li> --}}

     <li><a href="javaScript:void();" class="waves-effect">
       <i class="fa fa-circle-o text-yellow"></i> <span>My Profile</span></a>
      </li>
     
     @endif
     {{-- Student view ends --}}


   </ul>
  </div>
  <!--End sidebar-wrapper-->