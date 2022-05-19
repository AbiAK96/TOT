@if(Auth::user()->role_id == 1)
<li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i style="color: black" class="nav-icon fas fa-tachometer-alt"></i>
        <p style="color: black">Dashboard</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-user"></i></i>
        <p style="color: black">Teachers</p>
    </a><i class=""></i>
</li>

<li class="nav-item">
    <a href="{{ route('questionTypes.index') }}"
       class="nav-link {{ Request::is('questionTypes*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-tags"></i></i>
        <p style="color: black">Question Types</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('questions.index') }}"
       class="nav-link {{ Request::is('questions*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-question"></i></i>
        <p style="color: black">Questions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('schools.index') }}"
       class="nav-link {{ Request::is('schools*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-school"></i></i>
        <p style="color: black">Schools</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('teacherTypes.index') }}"
       class="nav-link {{ Request::is('teacherTypes*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-tags"></i></i>
        <p style="color: black">Teacher Types</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('selected_Questions.index') }}"
       class="nav-link {{ Request::is('selected_questions*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-check"></i></i>
        <p style="color: black">Selected Questions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('teacher_groups.index') }}"
       class="nav-link {{ Request::is('teacher_groups*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-users"></i></i>
        <p style="color: black">Teacher Groups</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin_exams.index') }}"
       class="nav-link {{ Request::is('admin*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-pen"></i></i>
        <p style="color: black">Exams</p>
    </a>
</li>

@elseif(Auth::user()->role_id == 2)
<li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i style="color: black" class="nav-icon fas fa-tachometer-alt"></i>
        <p style="color: black">Dashboard</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-user"></i></i>
        <p style="color: black">Teachers</p>
    </a><i class=""></i>
</li>

<li class="nav-item">
    <a href="{{ route('questionTypes.index') }}"
       class="nav-link {{ Request::is('questionTypes*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-tags"></i></i>
        <p style="color: black">Question Types</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('questions.index') }}"
       class="nav-link {{ Request::is('questions*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-question"></i></i>
        <p style="color: black">Questions</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('teacherTypes.index') }}"
       class="nav-link {{ Request::is('teacherTypes*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-tags"></i></i>
        <p style="color: black">Teacher Types</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('selected_Questions.index') }}"
       class="nav-link {{ Request::is('selected_questions*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-check"></i></i>
        <p style="color: black">Selected Questions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('teacher_groups.index') }}"
       class="nav-link {{ Request::is('teacher_groups*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-users"></i></i>
        <p style="color: black">Teacher Groups</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin_requests.index') }}"
       class="nav-link {{ Request::is('admin_requests*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-envelope"></i></i>
        <p style="color: black">Request</p>
    </a>
</li>

@elseif(Auth::user()->role_id == 3)
<li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i style="color: black" class="nav-icon fas fa-tachometer-alt"></i>
        <p style="color: black">Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('teacher_exams.index') }}"
       class="nav-link {{ Request::is('teacher_exams*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-user"></i></i>
        <p style="color: black">Profile</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('teacher_exams.index') }}"
       class="nav-link {{ Request::is('teacher_exams*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-pen"></i></i>
        <p style="color: black">Exams</p>

    </a>
</li>

<li class="nav-item">
    <a href="{{ route('teacher_requests.index') }}"
       class="nav-link {{ Request::is('teacher_requests*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-envelope"></i></i>
        <p style="color: black">Request</p>
    </a>
</li>
@endif    


