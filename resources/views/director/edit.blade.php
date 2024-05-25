<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit project</title>

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

    <style>
        .card{
            width: 1100px;
        }
        .form-group{
            margin-bottom : 25px;
        }
        .card-header{
            color:#3f51b5;
            font-size:18px;
        }
        .img{
            border-radius:4px;
            margin-top:22px;
            
        }
        #image-container {
            position: relative;
            padding-bottom: 8%; /* 1:1 Aspect Ratio */
            overflow: hidden;
        }

        #image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 90%;
            height: 90%;
            object-fit: cover; /* Ensures the image covers the entire div */
        }

    </style>
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

        <div class="main-header anim" style="--delay: 0s">Project : </div>
        <div class="main-blogs">
            <div class="main-blog anim" style="--delay: .1s" id="main-blog">
                <div class="main-blog__title"></div>
                    <div class="main-blog__author">
                    <div class="project-table-container">
                    <div class="">
                        <div class="card">
                            <div class="card-header">Edit Project</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class=" col-md-8">
                                        <form method="POST" action="{{ route('director.update', $project->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" required>{{ $project->description }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" id="status" name="status" required>
                                                    <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="in progress" {{ $project->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                                    <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Project</button>
                                        </form>
                                    </div>
                                    @if ($project->logo)
                                    <div class="col-md-4" id="image-container" >
                                        <img src="{{  $project->logo }}" alt="{{ $project->name }} Logo" class="img">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>  
                       
                    </div>   
            </div>
        </div>
        </div>     
        </div>
        </div>
        </div>


      
 
</body>
</html>