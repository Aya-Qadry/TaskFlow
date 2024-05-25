<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="director-index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
         integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
         crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link  href="{{asset('assets/css/director-index.css')}}" rel="stylesheet" type="text/css"> 
    <link  href="{{asset('assets/css/director-projects.css')}}" rel="stylesheet" type="text/css"> 
</head>
<body>
        <div class="container">
        @include('partials.sidemenu', [])
       
        
        <div class="wrapper">
        <div class="header">
       
        <div class="user-settings">
            <!-- <img class="user-img" src="https://images.unsplash.com/photo-1587918842454-870dbd18261a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=943&q=80" alt=""> -->
            <div class="user-name">{{$name}}</div>
            <svg viewBox="0 0 492 492" fill="currentColor">
            <path d="M484.13 124.99l-16.11-16.23a26.72 26.72 0 00-19.04-7.86c-7.2 0-13.96 2.79-19.03 7.86L246.1 292.6 62.06 108.55c-5.07-5.06-11.82-7.85-19.03-7.85s-13.97 2.79-19.04 7.85L7.87 124.68a26.94 26.94 0 000 38.06l219.14 219.93c5.06 5.06 11.81 8.63 19.08 8.63h.09c7.2 0 13.96-3.57 19.02-8.63l218.93-219.33A27.18 27.18 0 00492 144.1c0-7.2-2.8-14.06-7.87-19.12z"></path>
            </svg>
            <div class="notify">
            <div class="notification"></div>
            <svg viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.707 8.796c0 1.256.332 1.997 1.063 2.85.553.628.73 1.435.73 2.31 0 .874-.287 1.704-.863 2.378a4.537 4.537 0 01-2.9 1.413c-1.571.134-3.143.247-4.736.247-1.595 0-3.166-.068-4.737-.247a4.532 4.532 0 01-2.9-1.413 3.616 3.616 0 01-.864-2.378c0-.875.178-1.682.73-2.31.754-.854 1.064-1.594 1.064-2.85V8.37c0-1.682.42-2.781 1.283-3.858C7.861 2.942 9.919 2 11.956 2h.09c2.08 0 4.204.987 5.466 2.625.82 1.054 1.195 2.108 1.195 3.745v.426zM9.074 20.061c0-.504.462-.734.89-.833.5-.106 3.545-.106 4.045 0 .428.099.89.33.89.833-.025.48-.306.904-.695 1.174a3.635 3.635 0 01-1.713.731 3.795 3.795 0 01-1.008 0 3.618 3.618 0 01-1.714-.732c-.39-.269-.67-.694-.695-1.173z" />
            </svg>
            </div>
        </div>
        </div>
        <div class="main-container">
        <div class="main-header anim" style="--delay: 0s">Clients</div>
        <div class="main-blogs">
            <div class="main-blog anim" style="--delay: .1s" id="main-blog">
                <div class="main-blog__title"></div>
                    <div class="main-blog__author">
                    <div class="project-table-container">
                        <table class="project-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <th scope="row">{{ $project->id }}</th>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>{{ $project->due_date }}</td>
                                        <td>
                                            @if($project->status == 'pending')
                                                <span class="badge badge-warning">
                                                    <i class="bi bi-hourglass-split"> Pending</i> 
                                                </span>
                                            @elseif($project->status == 'in progress')
                                                <span class="badge badge-info">
                                                    <i class="bi bi-play-circle"> In Progress</i> 
                                                </span>
                                            @elseif($project->status == 'completed')
                                                <span class="badge badge-success">
                                                    <i class="bi bi-check-circle"> Completed</i> 
                                                </span>
                                            @else
                                                <span class="badge badge-secondary">
                                                    <i class="bi bi-question-circle"> Unknown</i> 
                                                </span>
                                            @endif
                                        </td>
                                        <td class="actions">
                                            <a href="#"   data-toggle="modal" data-target="#projectModal"
                                            data-id="{{ $project->id }}" data-name="{{ $project->name }}"
                                            data-description="{{ $project->description }}" data-due-date="{{ $project->due_date }}"
                                            data-status="{{ $project->status }}">

                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('director.edit', $project->id) }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a> 
                                            <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $project->id }}" class="btn">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <span class="text-danger font-weight-bold">No projects found!</span>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $projects->links() }}
                        </div>

                    </div>   
            </div>
        </div>
        </div>     
        </div>
        </div>
        </div>


         <!-- show modal --> 
        <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectModalLabel">Project Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> <span id="modal-project-name"></span></p>
                    <p><strong>Description:</strong> <span id="modal-project-description"></span></p>
                    <p><strong>Due Date:</strong> <span id="modal-project-due-date"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this project?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form id="delete-project-form" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Okay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

             
            <!-- show modal -->
            <script>
                $(document).ready(function () {
                $('#projectModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var id = button.data('id');
                    var name = button.data('name');
                    var description = button.data('description');
                    var dueDate = button.data('due-date');
                    
                    // Update the modal's content
                    var modal = $(this);
                    modal.find('#modal-project-name').text(name);
                    modal.find('#modal-project-description').text(description);
                    modal.find('#modal-project-due-date').text(dueDate);
                });
                });

                $(document).ready(function() {
                $('#deleteModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var projectId = button.data('id');
                    var form = $('#delete-project-form');
                    form.attr('action', '{{ route("director.destroy", ":id") }}'.replace(':id', projectId));
                });
                });

            </script>
 
 


</body>
</html>