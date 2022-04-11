<div>
    <ul class="nav  side-bar p-2">
        <li class="nav-item">
            <a class="nav-link" href="{{route('careers.create')}}">List Jobs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('careers.index')}}">Listed Jobs
                <span class="badge bg-secondary">{{$jobs->count()}}</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('careers-active')}}">Active
                <span class="badge bg-secondary">{{$jobs->where('status_id',2)->count()}}</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('careers-pending')}}">Pending
                <span class="badge bg-secondary">{{$jobs->where('status_id',1)->count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{route('careers-blocked')}}">Blocked
                <span class="badge bg-danger">{{$jobs->where('status_id',4)->count()}}</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{route('careers-inactive')}}">Inactive
                <span class="badge bg-secondary">{{$jobs->where('status_id',5)->count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{route('organizations.index')}}">Company profile</a>
        </li>
    </ul>
</div>
