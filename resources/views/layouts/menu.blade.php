<li class="nav-item">
    <a href="{{ route('teachers.index') }}"
       class="nav-link {{ Request::is('teachers*') ? 'active' : '' }}">
        <p>Teachers</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('questionTypes.index') }}"
       class="nav-link {{ Request::is('questionTypes*') ? 'active' : '' }}">
        <p>Question Types</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('questions.index') }}"
       class="nav-link {{ Request::is('questions*') ? 'active' : '' }}">
        <p>Questions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('schools.index') }}"
       class="nav-link {{ Request::is('schools*') ? 'active' : '' }}">
        <p>Schools</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('teacherTypes.index') }}"
       class="nav-link {{ Request::is('teacherTypes*') ? 'active' : '' }}">
        <p>Teacher Types</p>
    </a>
</li>


