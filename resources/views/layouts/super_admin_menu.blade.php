<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
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

<li class="nav-item">
    <a href="{{ route('selected_Questions.index') }}"
       class="nav-link {{ Request::is('selected_questions*') ? 'active' : '' }}">
        <p>Selected Questions</p>
    </a>
</li>


