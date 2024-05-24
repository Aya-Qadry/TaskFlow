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
        <div class="sidebar">
        <span class="logo">S</span>
        <a class="logo-expand" href="#">TaskFlow</a>
        <div class="side-wrapper">
        <div class="side-title">MENU</div>
        <div class="side-menu">
            <a class="sidebar-link discover is-active" href="#">
            <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M9.135 20.773v-3.057c0-.78.637-1.414 1.423-1.414h2.875c.377 0 .74.15 1.006.414.267.265.417.625.417 1v3.057c-.002.325.126.637.356.867.23.23.544.36.87.36h1.962a3.46 3.46 0 002.443-1 3.41 3.41 0 001.013-2.422V9.867c0-.735-.328-1.431-.895-1.902l-6.671-5.29a3.097 3.097 0 00-3.949.072L3.467 7.965A2.474 2.474 0 002.5 9.867v8.702C2.5 20.464 4.047 22 5.956 22h1.916c.68 0 1.231-.544 1.236-1.218l.027-.009z" />
            </svg>
            Dashboard
            </a>
            <a class="sidebar-link trending" href="{{ route('director.projects') }}">
            <svg viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.835 12.007l.002.354c.012 1.404.096 2.657.242 3.451 0 .015.16.802.261 1.064.16.38.447.701.809.905a2 2 0 00.91.219c.249-.012.66-.137.954-.242l.244-.094c1.617-.642 4.707-2.74 5.891-4.024l.087-.09.39-.42c.245-.322.375-.715.375-1.138 0-.379-.116-.758-.347-1.064-.07-.099-.18-.226-.28-.334l-.379-.397c-1.305-1.321-4.129-3.175-5.593-3.79 0-.013-.91-.393-1.343-.407h-.057c-.665 0-1.286.379-1.603.991-.087.168-.17.496-.233.784l-.114.544c-.13.874-.216 2.216-.216 3.688zm-6.332-1.525C3.673 10.482 3 11.162 3 12a1.51 1.51 0 001.503 1.518l3.7-.328c.65 0 1.179-.532 1.179-1.19 0-.658-.528-1.191-1.18-1.191l-3.699-.327z" />
            </svg>
            Projects
            </a>
            <a class="sidebar-link" href="#">
            <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M11.23 7.29V3.283c0-.427.34-.782.77-.782.385 0 .711.298.763.677l.007.104v4.01h4.78c2.38 0 4.335 1.949 4.445 4.38l.005.215v5.04c0 2.447-1.887 4.456-4.232 4.569l-.208.005H6.44c-2.38 0-4.326-1.94-4.435-4.379L2 16.905v-5.03c0-2.447 1.878-4.466 4.222-4.58l.208-.004h4.8v6.402l-1.6-1.652a.755.755 0 00-1.09 0 .81.81 0 00-.22.568c0 .157.045.32.14.459l.08.099 2.91 3.015c.14.155.34.237.55.237a.735.735 0 00.465-.166l.075-.071 2.91-3.015c.3-.31.3-.816 0-1.126a.755.755 0 00-1.004-.077l-.086.077-1.59 1.652V7.291h-1.54z" />
            </svg>
            Clients
            </a>
            <a class="sidebar-link" href="#">
            <svg viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1535 16.64L14.995 13.77C15.2822 13.47 15.2822 13 14.9851 12.71C14.698 12.42 14.2327 12.42 13.9455 12.71L12.3713 14.31V9.49C12.3713 9.07 12.0446 8.74 11.6386 8.74C11.2327 8.74 10.896 9.07 10.896 9.49V14.31L9.32178 12.71C9.03465 12.42 8.56931 12.42 8.28218 12.71C7.99505 13 7.99505 13.47 8.28218 13.77L11.1139 16.64C11.1832 16.71 11.2624 16.76 11.3515 16.8C11.4406 16.84 11.5396 16.86 11.6386 16.86C11.7376 16.86 11.8267 16.84 11.9158 16.8C12.005 16.76 12.0842 16.71 12.1535 16.64ZM19.3282 9.02561C19.5609 9.02292 19.8143 9.02 20.0446 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5 22 16.0446 22H8.17327C5.58911 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.4901 2 7.96535 2H13.2525C13.5 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.1931 9.01 17.0149 9.02C17.4333 9.02 17.8077 9.02318 18.1346 9.02595C18.3878 9.02809 18.6125 9.03 18.8069 9.03C18.9479 9.03 19.1306 9.02789 19.3282 9.02561ZM19.6045 7.5661C18.7916 7.5691 17.8322 7.5661 17.1421 7.5591C16.047 7.5591 15.145 6.6481 15.145 5.5421V2.9061C15.145 2.4751 15.6629 2.2611 15.9579 2.5721C16.7203 3.37199 17.8873 4.5978 18.8738 5.63395C19.2735 6.05379 19.6436 6.44249 19.945 6.7591C20.2342 7.0621 20.0223 7.5651 19.6045 7.5661Z" />
            </svg>
            projects
            </a>
            <a class="sidebar-link" href="#">
                <svg viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.769 8.382H22C22 4.985 19.964 3 16.516 3H7.484C4.036 3 2 4.985 2 8.338v7.324C2 19.015 4.036 21 7.484 21h9.032C19.964 21 22 19.015 22 15.662v-.313h-4.231c-1.964 0-3.556-1.552-3.556-3.466 0-1.915 1.592-3.467 3.556-3.467v-.034zm0 1.49h3.484c.413 0 .747.326.747.728v2.531a.746.746 0 01-.747.728H17.85c-.994.013-1.864-.65-2.089-1.595a1.982 1.982 0 01.433-1.652 2.091 2.091 0 011.576-.74zm.151 2.661h.329a.755.755 0 00.764-.745.755.755 0 00-.764-.746h-.329a.766.766 0 00-.54.213.727.727 0 00-.224.524c0 .413.34.75.764.754zM6.738 8.382h5.644a.755.755 0 00.765-.746.755.755 0 00-.765-.745H6.738a.755.755 0 00-.765.737c0 .413.341.75.765.754z" />
                </svg>Settings
            </a>
        </div>
        </div>
        <div class="side-wrapper">
        <div class="side-menu">
            <a class="sidebar-link" href="#">
            <svg viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.164 6.083l.948.011c3.405 0 5.888 2.428 5.888 5.78v4.307c0 3.353-2.483 5.78-5.888 5.78A193.5 193.5 0 0112.01 22c-1.374 0-2.758-.01-4.122-.038-3.405 0-5.888-2.428-5.888-5.78v-4.307c0-3.353 2.483-5.78 5.898-5.78 1.286-.02 2.6-.04 3.935-.04v-.163c0-.665-.56-1.204-1.226-1.204h-.972c-1.109 0-2.012-.886-2.012-1.965 0-.395.334-.723.736-.723.412 0 .736.328.736.723 0 .289.246.52.54.52h.972c1.481.01 2.688 1.194 2.698 2.64v.183c.619 0 1.238.008 1.859.017zm-4.312 8.663h-1.03v1.02a.735.735 0 01-.737.723.728.728 0 01-.736-.722v-1.021H7.31a.728.728 0 01-.736-.723c0-.395.334-.722.736-.722h1.04v-1.012c0-.395.324-.723.736-.723.403 0 .736.328.736.723v1.012h1.03c.403 0 .737.327.737.722a.728.728 0 01-.736.723zm4.17-1.629h.099a.728.728 0 00.736-.722.735.735 0 00-.736-.723h-.098a.722.722 0 100 1.445zm1.679 3.315h.098a.728.728 0 00.736-.723.735.735 0 00-.736-.723H16.7a.722.722 0 100 1.445z" />
            </svg>
            Log out
            </a>
            
        </div>
        </div>
        </div>
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
        <div class="main-header anim" style="--delay: 0s">Projects</div>
        <div class="main-blogs">
            <div class="main-blog anim" style="--delay: .1s" id="main-blog">
                <div class="main-blog__title"></div>
                    <div class="main-blog__author">
                    <div class="project-table-container">
                        <table class="project-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Logo</th>
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
                                        <td><img src="{{ $project->logo }}" alt="{{ $project->name }} Logo" class="project-logo"></td>
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
                                            <button data-toggle="modal" data-target="#deleteModal"
                                                    data-id="{{ $project->id }}">
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