<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p style="color: black">Teachers</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('questionTypes.index') }}"
       class="nav-link {{ Request::is('questionTypes*') ? 'active' : '' }}">
        <p style="color: black">Question Types</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('questions.index') }}"
       class="nav-link {{ Request::is('questions*') ? 'active' : '' }}">
        <p style="color: black">Questions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('schools.index') }}"
       class="nav-link {{ Request::is('schools*') ? 'active' : '' }}">
        <p style="color: black">Schools</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('teacherTypes.index') }}"
       class="nav-link {{ Request::is('teacherTypes*') ? 'active' : '' }}">
        <p style="color: black">Teacher Types</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('selected_Questions.index') }}"
       class="nav-link {{ Request::is('selected_questions*') ? 'active' : '' }}">
        <p style="color: black">Selected Questions</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('teacher_groups.index') }}"
       class="nav-link {{ Request::is('teacher_groups*') ? 'active' : '' }}">
        <p style="color: black">Teacher Groups</p>
    </a>
</li>


