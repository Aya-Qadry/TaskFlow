<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- <script src="https://unpkg.com/@popperjs/core@2"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


    <style>
        #bounce {
            background-color: #006249;
            color: white;
        }

        .row {
            margin-top: 20px;
        }
        .row #role{
            width: 150px;
        }
        .row #id{
            color: grey;
            font-weight: bolder;
        }
    </style>

</head>

<body>

    <div class="main-container d-flex">

 

        <div class="container-fluid" id="container-fluid">
            <div class="row ">
                <div class="col-lg-6">
                    <h3 class="m-1">Dashboard</h3>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
        
            <div class="row " style="margin-bottom: 0%;">
                <div class="col-lg-6">
                    <div class="card card-danger">
                        <div class="card-header" style="background-color: #006249;">
                            <h3 class="card-title">Teams
                            <a href="{{ route('director.createTeam') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Team</a>
                            </h3>

                        </div>
                        <div class="card-body">
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Manager</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teams as $team)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->description }}</td>
                                    <td> 
                                    {{ $team->manager->name }}  
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <span class="text-danger"><strong>No projects found!</strong></span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                  

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header" style="background-color: #17a2b8; color: white;">
                            <h3 class="card-title">Orders & Customers Chart</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="comparaisonChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 549px;"
                                    width="549" height="400" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12"> 
                    <div class="card">
                        <div class="card-header" style="background-color:#dc3545; color: white;">
                            <h3 class="card-title">Projects</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="usersTable">
                                
                                <tbody>
                                <div class="card-body">
                         
                                                
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>
                                        @if($project->status == 'pending')
                                            <span class="badge badge-warning">
                                                <i class="bi bi-hourglass-split"></i> Pending
                                            </span>
                                        @elseif($project->status == 'in_progress')
                                            <span class="badge badge-info">
                                                <i class="bi bi-play-circle"></i> In Progress
                                            </span>
                                        @elseif($project->status == 'completed')
                                            <span class="badge badge-success">
                                                <i class="bi bi-check-circle"></i> Completed
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                <i class="bi bi-question-circle"></i> Unknown
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#projectModal"
                                        data-id="{{ $project->id }}" data-name="{{ $project->name }}"
                                        data-description="{{ $project->description }}" data-due-date="{{ $project->due_date }}"
                                        data-status="{{ $project->status }}">
                                            <i class="bi bi-eye"></i> Show
                                        </a>
                                        @can('edit-project')
                                            <a href="{{ route('director.edit', $project->id) }}" class="btn btn-primary btn-sm">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                        @endcan
                                        @can('delete-project')
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"
                                                    data-id="{{ $project->id }}">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <span class="text-danger"><strong>No projects found!</strong></span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                  
                        {{ $projects->links() }}

                        </div>
                    

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/fragments.js"></script>

    

</body>

</html>