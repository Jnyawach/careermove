<ul class="nav">
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/jobs'))? 'text-decoration-underline'
                :'text-decoration-none' }}"  href="{{route('jobs.index')}}">All Jobs</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/jobs/pending'))? 'text-decoration-underline'
                :'text-decoration-none' }}" href="{{route('jobs-pending')}}">Pending Approval</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/jobs/active'))? 'text-decoration-underline'
                :'text-decoration-none' }}" href="{{route('jobs-active')}}">Active</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/jobs/blocked'))? 'text-decoration-underline'
                :'text-decoration-none' }}" href="{{route('jobs-blocked')}}">Blocked</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/jobs/disabled'))? 'text-decoration-underline'
                :'text-decoration-none' }}" href="{{route('jobs-disabled')}}">Disabled</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/jobs/inactive'))? 'text-decoration-underline'
                :'text-decoration-none' }}" href="{{route('jobs-inactive')}}">Inactive</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('jobs.create')}}">Create Listing</a>
    </li>

</ul>
