<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
 
</head>
<body>
    
<div class="card">
    <div class="card-header">project List</div>
    <div class="card-body">
        @can('create-project')
            <a href="{{ route('projects.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New project</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
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
                        <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                        <a href="#"  class="btn btn-warning btn-sm" 
                        data-toggle="modal" 
                        data-target="#projectModal" 
                        data-id="{{ $project->id }}" 
                        data-name="{{ $project->name }}" 
                        data-description="{{ $project->description }}" 
                        data-due-date="{{ $project->due_date }}">
                        <i class="bi bi-eye"></i> Show</a>

                            @can('edit-project')
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                            @endcan

                            @csrf
                            @can('delete-project')
                                <!-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this project?');"><i class="bi bi-trash"></i> Delete</button> -->
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this project?');">
                                <i class="bi bi-trash"></i> Delete
                                </button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No project Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $projects->links() }}

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
    </script>
</body>
</html>
