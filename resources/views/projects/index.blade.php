<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Flow</title>
    <script src="director-index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link  href="{{asset('assets/css/director-index.css')}}" rel="stylesheet" type="text/css"> 
    <link  href="{{asset('assets/css/client-dashboard.css')}}" rel="stylesheet" type="text/css"> 


    <style>
        *{
      font-family: var(--body-font);

        }
        .card-offer {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
  width: 100%;
  padding: 20px 1px;
  text-align: center;
  position: relative;
  cursor: pointer;
  border-radius: 10px;
  
}

.content-offer {
}

.content-offer .price-offer {
  font-family: var(--body-font);

  color: white;
  font-weight: 800;
  font-size: 50px;
  text-shadow: 0px 0px 10px rgba(0, 0, 0, 0.42);
}

.content-offer .description-offer {
    margin-top: 34px ; 
  color: white;
  font-weight: 800;
  font-size: 20px;
}

.content-offer .title-offer {

  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.64);
  margin-top: 10px;
  font-size: 25px;
  letter-spacing: 1px;
}

#offer {
    position: relative;
    background: rgb(31,45,116);
background: radial-gradient(circle, rgba(31,45,116,0.4632703423166141) 0%, rgba(243,238,199,1) 100%);
}


    </style>
</head>
<body>
        <div class="container anim" style="--delay: 0s">
        @include('partials.clients', [])



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
        <div class="main-header anim" style="--delay: 0s">Dashboard</div>
        <div class="main-blogs">
            <div class="main-blog anim" style="--delay: .1s">
                <div class="main-blog__title"></div>
                    <div class="main-blog__author">
                        <div class="author-img__wrapper">
                            <h1>Welcome to TaskFlow</h1>
            <a href="{{ route('projects.create') }}" >

                            <button>

                            Create a new project ! 
                            <div class="arrow-wrapper">
                                <div class="arrow"></div>
                            </div>
                        </button>
                        </a>

                        </div>
                    <div class="author-detail">
                <!-- <div class="author-name">Thomas Hope</div> -->
            <!-- <div class="author-info">53K views <span class="seperate"></span>2 weeks ago</div> -->
            </div>
        </div>
        
        </div>

    
            <div class="main-blog anim" style="--delay: .2s"  id="offer">
            <div class="main-blog__author tips">
                
            <div class="card-offer">
                <div class="content-offer">
                    <div class="price-offer">$39.99</div>
                    <div class="description-offer">
                    Unlock your online presence today with our special offer! 

                    </div>
                </div>
            </div>

           
            </div>
            </div>
        </div>
        <div class="small-header anim" style="--delay: .3s">Trending Projects</div>
        <div class="videos">
    
       
        <div class="card" id="box">
            <div class="content">
                <div class="back">
                    <div class="back-content">
                        <img src="{{asset('assets/images/client/e-commerce.jpg')}}" alt="" style="width: 100%; height: 100%;border-radius: 20px; object-fit: cover; object-position: center;" id="card-filler">
                    </div>
                </div>
                <div class="front">
                    <div class="img">
                        <div class="circle"></div>
                        <div class="circle" id="right"></div>
                        <div class="circle" id="bottom"></div>
                    </div>
                    <div class="front-content">
                        <small class="badge">Starting from 100$</small>
                        <div class="description">
                            <div class="title">
                                <p class="title">
                                <strong>E-Commerce App</strong>
                                </p>
                                    <g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero" fill="#20c997">
                                        <g transform="scale(8,8)">
                                            <path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <p class="card-footer">
                            An intuitive and scalable online store solution with customizable product 
                            listings, secure payment integration, and advanced analytics.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" id="box">
            <div class="content">
                <div class="back">
                    <div class="back-content">
                        <img src="{{asset('assets/images/client/corporate.jpg')}}" alt="" style="width: 100%; height: 100%;border-radius: 20px; object-fit: cover; object-position: center;" id="card-filler">
                    </div>
                </div>
                <div class="front">
                    <div class="img">
                        <div class="circle"></div>
                        <div class="circle" id="right"></div>
                        <div class="circle" id="bottom"></div>
                    </div>
                    <div class="front-content">
                        <small class="badge">Starting from 250$</small>
                        <div class="description">
                            <div class="title">
                                <p class="title">
                                <strong>Corporate Website</strong>
                                </p>
                                    <g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero" fill="#20c997">
                                        <g transform="scale(8,8)">
                                            <path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <p class="card-footer">
                            Modernize your corporate website with a fresh design, improved user experience, and 
                            enhanced functionality to better represent your brand.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" id="box">
            <div class="content">
                <div class="back">
                    <div class="back-content">
                        <img src="{{asset('assets/images/client/travel.jpg')}}" alt="" style="width: 100%; height: 100%;border-radius: 20px; object-fit: cover; object-position: center;" id="card-filler">
                    </div>
                </div>
                <div class="front">
                    <div class="img">
                        <div class="circle"></div>
                        <div class="circle" id="right"></div>
                        <div class="circle" id="bottom"></div>
                    </div>
                    <div class="front-content">
                        <small class="badge">Starting from 200$</small>
                        <div class="description">
                            <div class="title">
                                <p class="title">
                                <strong> Travel Booking</strong>
                                </p>
                                    <g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero" fill="#20c997">
                                        <g transform="scale(8,8)">
                                            <path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <p class="card-footer">
                            A user-friendly travel booking website that allows users to search for flights, 
                            hotels, and rental cars, with personalized recommendations.
                            </p>
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