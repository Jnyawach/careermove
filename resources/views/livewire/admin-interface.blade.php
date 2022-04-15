<div class="vh-100">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-2">
            <a href="{{route('jobs.index')}}" class="text-decoration-none">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-title">
                        <h1>{{$jobs}}</h1>
                    </div>
                    <h5 class="text-success">Total Jobs Listed</h5>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-bold">Active: <span>{{$active}}</span></h6>
                        </div>
                        <div class="col-6">
                            <h6 class="fw-bold">Pending: <span>{{$pending}}</span></h6>
                        </div>
                    </div>

                </div>


            </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-2">
            <a href="{{route('messages.index')}}" class="text-decoration-none">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-title">
                        <h1>{{$messages}}</h1>
                    </div>
                    <h5 class="text-primary">Message Received</h5>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-bold">Unread: <span>{{$unread}}</span></h6>
                        </div>
                        <div class="col-6">
                            <h6 class="fw-bold">Responded: <span>{{$response}}</span></h6>
                        </div>
                    </div>

                </div>


            </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-2">
            <a href="{{route('report.index')}}" class="text-decoration-none">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-title">
                        <h1>{{$reported}}</h1>
                    </div>
                    <h5 class="text-danger">Reported Jobs</h5>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-bold">Total Reports: <span>{{$reports}}</span></h6>
                        </div>

                    </div>

                </div>


            </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-2">
            <a href="{{route('users.index')}}" class="text-decoration-none">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-title">
                            <h1>{{$users}}</h1>
                        </div>
                        <h5 class="text-danger">Total Users</h5>
                        <div class="row">
                            <div class="col-6">
                                <h6 class="fw-bold">Employers: <span>{{$employers}}</span></h6>

                            </div>
                            <div class="col-6">
                                <h6 class="fw-bold">Customers: <span>{{$jobseekers}}</span></h6>

                            </div>

                        </div>

                    </div>


                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-2">
            <a href="{{route('subscribers.index')}}" class="text-decoration-none">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-title">
                            <h1>{{$subscribers}}</h1>
                        </div>
                        <h5 class="text-success">Total Subscribers</h5>
                        <div class="row">
                            <div class="col-6">
                                <h6 class="fw-bold">Active: <span>{{$subscribers}}</span></h6>

                            </div>


                        </div>

                    </div>


                </div>
            </a>
        </div>

    </div>
</div>
