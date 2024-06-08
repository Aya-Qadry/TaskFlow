<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


</head>
<body>
        <div class="container">
        @include('partials.sidemenu', [])



        <div class="wrapper">
        <div class="header">
       
        <div class="user-settings">
            <!-- <img class="user-img" src="https://images.unsplash.com/photo-1587918842454-870dbd18261a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=943&q=80" alt=""> -->
            <!-- <div class="user-name">{{$name}}</div> -->
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
                <div class="main-blog__title">Clients</div>
                    <div class="main-blog__author">
                        <div class="author-img__wrapper">
                            <canvas id="line-chart"  class="feather feather-check" width="700%" height="250"></canvas>
                        </div>
                    <div class="author-detail">
                <!-- <div class="author-name">Thomas Hope</div> -->
            <!-- <div class="author-info">53K views <span class="seperate"></span>2 weeks ago</div> -->
            </div>
            </div>
            <div class="main-blog__time">As of : <span id="today"></span></div>
        </div>


            <div class="main-blog anim" style="--delay: .2s">
            <div class="main-blog__title">Skateboard Tips You need to know</div>
            <div class="main-blog__author tips">
            <div class="main-blog__time">7 min</div>
            <div class="author-img__wrapper">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
            </svg>
            <img class="author-img" src="https://images.unsplash.com/photo-1496345875659-11f7dd282d1d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mzl8fG1lbnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" />
            </div>
            <div class="author-detail">
            <div class="author-name">Tony Andrew</div>
            <div class="author-info">53K views <span></span>2 weeks ago</div>
            </div>
            </div>
            </div>
        </div>
        <div class="small-header anim" style="--delay: .3s">Most Watched</div>
        <div class="videos">
            <div class="video anim" style="--delay: .4s">
            <div class="video-time">8 min</div>
            <div class="video-wrapper">
            <video muted="">
            <source src="https://player.vimeo.com/external/436572488.sd.mp4?s=eae5fb490e214deb9ff532dd98d101efe94e7a8b&profile_id=139&oauth2_token_id=57447761" type="video/mp4">
            </video>
            <div class="author-img__wrapper video-author">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
            </svg>
            <img class="author-img" src="https://images.pexels.com/photos/1680172/pexels-photo-1680172.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
            </div>
            </div>
            <div class="video-by">Andy William</div>
            <div class="video-name">Basic how to ride your skateboard comfortly</div>
            <div class="video-view">54K views<span class="seperate video-seperate"></span>1 week ago</div>
            </div>
            <div class="video anim" style="--delay: .5s">
            <div class="video-time">5 min</div>
            <div class="video-wrapper">
            <video muted="">
            <source src="https://player.vimeo.com/external/449972745.sd.mp4?s=9943177fe8a6147b7bc4598259401f06ec57878a&profile_id=139&oauth2_token_id=57447761" type="video/mp4">
            </video>
            <div class="author-img__wrapper video-author">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
            </svg>
            <img class="author-img" src="https://images.pexels.com/photos/3370021/pexels-photo-3370021.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
            </div>
            </div>
            <div class="video-by offline">Gerard Bind</div>
            <div class="video-name">Prepare for your first skateboard jump</div>
            <div class="video-view">42K views<span class="seperate video-seperate"></span>1 week ago</div>
            </div>
            <div class="video anim" style="--delay: .6s">
            <div class="video-time">7 min</div>
            <div class="video-wrapper">
            <video muted="">
            <source src="https://player.vimeo.com/external/436553499.sd.mp4?s=0e44527f269278743db448761e35c5e39cfaa52c&profile_id=139&oauth2_token_id=57447761" type="video/mp4">
            </video>
            <div class="author-img__wrapper video-author">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
            </svg>
            <img class="author-img" src="https://images.pexels.com/photos/1870163/pexels-photo-1870163.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
            </div>
            </div>
            <div class="video-by offline">John Wise</div>
            <div class="video-name">Basic equipment to play skateboard safely</div>
            <div class="video-view">64K views<span class="seperate video-seperate"></span>2 week ago</div>
            </div>
            <div class="video anim" style="--delay: .7s">
            <div class="video-time">6 min</div>
            <div class="video-wrapper">
            <video muted="">
            <source src="https://player.vimeo.com/external/361861493.sd.mp4?s=19d8275ca755d653042a87ef28b2f0b2eabf57d0&profile_id=139&oauth2_token_id=57447761" type="video/mp4">
            </video>
            <div class="author-img__wrapper video-author">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
            </svg>
            <img class="author-img" src="https://images.pexels.com/photos/2889942/pexels-photo-2889942.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
            </div>
            </div>
            <div class="video-by">Budi Hakim</div>
            <div class="video-name">Tips to playing skateboard on the ramp</div>
            <div class="video-view">50K views<span class="seperate video-seperate"></span>1 week ago</div>
            </div>
        </div>
        <div class="stream-area">
            <div class="video-stream">
            <video id="my_video_1" class="video-js vjs-default-skin anim" width="640px" height="267px" controls preload="none" poster='https://images.unsplash.com/photo-1476801071117-fbc157ae3f01?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDh8fHxlbnwwfHx8&w=1000&q=80' data-setup='{ "aspectRatio":"940:620", "playbackRates": [1, 1.5, 2] }'>
            <source src="https://player.vimeo.com/external/390402719.sd.mp4?s=20cfdb066c4253047562b65bd4e411b86a004bc5&profile_id=139&oauth2_token_id=57447761" type='video/mp4' />
            <source src="https://player.vimeo.com/external/390402719.sd.mp4?s=20cfdb066c4253047562b65bd4e411b86a004bc5&profile_id=139&oauth2_token_id=57447761" type='video/webm' />
            </video>
            <div class="video-detail">
            <div class="video-content">
            <div class="video-p-wrapper anim" style="--delay: .1s">
                <div class="author-img__wrapper video-author video-p">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
                </svg>
                <img class="author-img" src="https://images.pexels.com/photos/1680172/pexels-photo-1680172.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                </div>
                <div class="video-p-detail">
                <div class="video-p-name">Andy William</div>
                <div class="video-p-sub">1,980,893 subscribers</div>
                </div>
                <div class="button-wrapper">
                <button class="like">
                <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.435 2.582a1.933 1.933 0 00-1.93-.503L3.408 6.759a1.92 1.92 0 00-1.384 1.522c-.142.75.355 1.704 1.003 2.102l5.033 3.094a1.304 1.304 0 001.61-.194l5.763-5.799a.734.734 0 011.06 0c.29.292.29.765 0 1.067l-5.773 5.8c-.428.43-.508 1.1-.193 1.62l3.075 5.083c.36.604.98.946 1.66.946.08 0 .17 0 .251-.01.78-.1 1.4-.634 1.63-1.39l4.773-16.075c.21-.685.02-1.43-.48-1.943z" />
                </svg>
                Share
                </button>
                <button class="like red">
                <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.85 2.5c.63 0 1.26.09 1.86.29 3.69 1.2 5.02 5.25 3.91 8.79a12.728 12.728 0 01-3.01 4.81 38.456 38.456 0 01-6.33 4.96l-.25.15-.26-.16a38.093 38.093 0 01-6.37-4.96 12.933 12.933 0 01-3.01-4.8c-1.13-3.54.2-7.59 3.93-8.81.29-.1.59-.17.89-.21h.12c.28-.04.56-.06.84-.06h.11c.63.02 1.24.13 1.83.33h.06c.04.02.07.04.09.06.22.07.43.15.63.26l.38.17c.092.05.195.125.284.19.056.04.107.077.146.1l.05.03c.085.05.175.102.25.16a6.263 6.263 0 013.85-1.3zm2.66 7.2c.41-.01.76-.34.79-.76v-.12a3.3 3.3 0 00-2.11-3.16.8.8 0 00-1.01.5c-.14.42.08.88.5 1.03.64.24 1.07.87 1.07 1.57v.03a.86.86 0 00.19.62c.14.17.35.27.57.29z" />
                </svg>
                Liked
                </button>
                </div>
            </div>
            <div class="video-p-title anim" style="--delay: .2s">Basic how to ride your Skateboard</div>
            <div class="video-p-subtitle anim" style="--delay: .3s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus illum tempora consequuntur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis earum velit accusantium maiores qui sit quas, laborum voluptatibus vero quidem tempore facilis voluptate tempora deserunt! </div>
            <div class="video-p-subtitle anim" style="--delay: .4s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus laborum qui dolorum fugiat eius accusantium repellendus illum tempora consequuntur. Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>
            </div>
            </div>
            </div>
            <div class="chat-stream">
            <div class="chat">
            <div class="chat-header anim">Live Chat<span><svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.212 7.762c0 2.644-2.163 4.763-4.863 4.763-2.698 0-4.863-2.119-4.863-4.763C4.486 5.12 6.651 3 9.35 3c2.7 0 4.863 2.119 4.863 4.762zM2 17.917c0-2.447 3.386-3.06 7.35-3.06 3.985 0 7.349.634 7.349 3.083 0 2.448-3.386 3.06-7.35 3.06C5.364 21 2 20.367 2 17.917zM16.173 7.85a6.368 6.368 0 01-1.137 3.646c-.075.107-.008.252.123.275.182.03.369.048.56.052 1.898.048 3.601-1.148 4.072-2.95.697-2.675-1.35-5.077-3.957-5.077a4.16 4.16 0 00-.818.082c-.036.008-.075.025-.095.055-.025.04-.007.09.019.124a6.414 6.414 0 011.233 3.793zm3.144 5.853c1.276.245 2.115.742 2.462 1.467a2.107 2.107 0 010 1.878c-.531 1.123-2.245 1.485-2.912 1.578a.207.207 0 01-.234-.232c.34-3.113-2.367-4.588-3.067-4.927-.03-.017-.036-.04-.034-.055.002-.01.015-.025.038-.028 1.515-.028 3.145.176 3.747.32z" />
                </svg>
                15,988 people
            </span>
            </div>
            <div class="message-container">
            <div class="message anim" style="--delay: .1s">
                <div class="author-img__wrapper video-author video-p">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
                </svg>
                <img class="author-img" src="https://images.unsplash.com/photo-1560941001-d4b52ad00ecc?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80" />
                </div>
                <div class="msg-wrapper">
                <div class="msg__name video-p-name"> Wijaya Adabi</div>
                <div class="msg__content video-p-sub"> Lorem ipsum clor sit, ame conse quae debitis</div>
                </div>
            </div>
            <div class="message anim" style="--delay: .2s">
                <div class="author-img__wrapper video-author video-p">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
                </svg>
                <img class="author-img" src="https://images.pexels.com/photos/2889942/pexels-photo-2889942.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                </div>
                <div class="msg-wrapper">
                <div class="msg__name video-p-name offline"> Johny Wise</div>
                <div class="msg__content video-p-sub"> Suscipit eos atque voluptates labore</div>
                </div>
            </div>
            <div class="message anim" style="--delay: .3s">
                <div class="author-img__wrapper video-author video-p">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
                </svg>
                <img class="author-img" src="https://images.unsplash.com/photo-1496345875659-11f7dd282d1d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mzl8fG1lbnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" />
                </div>
                <div class="msg-wrapper">
                <div class="msg__name video-p-name offline"> Budi Hakim</div>
                <div class="msg__content video-p-sub">Dicta quidem sunt adipisci</div>
                </div>
            </div>
            <div class="message anim" style="--delay: .4s">
                <div class="author-img__wrapper video-author video-p">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
                </svg>
                <img class="author-img" src="https://images.pexels.com/photos/1870163/pexels-photo-1870163.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                </div>
                <div class="msg-wrapper">
                <div class="msg__name video-p-name"> Thomas Hope</div>
                <div class="msg__content video-p-sub"> recusandae doloremque aperiam alias molestias</div>
                </div>
            </div>
            <div class="message anim" style="--delay: .5s">
                <div class="author-img__wrapper video-author video-p">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
                </svg>
                <img class="author-img" src="https://images.pexels.com/photos/1680172/pexels-photo-1680172.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                </div>
                <div class="msg-wrapper">
                <div class="msg__name video-p-name"> Gerard Will</div>
                <div class="msg__content video-p-sub">Dicta quidem sunt adipisci</div>
                </div>
            </div>
            <div class="message anim" style="--delay: .6s">
                <div class="author-img__wrapper video-author video-p">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <path d="M20 6L9 17l-5-5" />
                </svg>
                <img class="author-img" src="https://images.pexels.com/photos/2889942/pexels-photo-2889942.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                </div>
                <div class="msg-wrapper">
                <div class="msg__name video-p-name offline">Johny Wise</div>
                <div class="msg__content video-p-sub"> recusandae doloremque aperiam alias molestias</div>
                </div>
            </div>
            </div>
            <div class="chat-footer anim" style="--delay: .1s">
            <input type="text" placeholder="Write your message">
            </div>
            </div>
            <div class="chat-vid__container">
            <div class="chat-vid__title anim" style="--delay: .3s">Related Videos</div>
            <div class="chat-vid anim" style="--delay: .4s">
            <div class="chat-vid__wrapper">
                <img class="chat-vid__img" src="https://cdn.nohat.cc/thumb/f/720/3b55eddcfffa4e87897d.jpg" />
                <div class="chat-vid__content">
                <div class="chat-vid__name">Prepare for your first skateboard jump</div>
                <div class="chat-vid__by">Jordan Wise</div>
                <div class="chat-vid__info">125.908 views <span class="seperate"></span>2 days ago</div>
                </div>
            </div>
            </div>
            <div class="chat-vid anim" style="--delay: .5s">
            <div class="chat-vid__wrapper">
                <img class="chat-vid__img" src="https://iamaround.it/wp-content/uploads/2015/02/pexels-photo-4663818.jpeg" />
                <div class="chat-vid__content">
                <div class="chat-vid__name">Prepare for your first skateboard jump</div>
                <div class="chat-vid__by">Jordan Wise</div>
                <div class="chat-vid__info">125.908 views <span class="seperate"></span>2 days ago</div>
                </div>
            </div>
            </div>
            <div class="chat-vid__button anim" style="--delay: .6s">See All related videos (32)</div>
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>

    <script>

            var ctx = document.getElementById('line-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Created accounts',
                        data: {!! json_encode($data) !!},
                        borderColor: 'rgb(90, 154, 196)',
                        pointBackgroundColor: 'rgb(90, 154, 196)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        labels: {
                            fontColor: "rgb(90, 154, 196)",
                            fontSize: 14
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0 , 
                        }
                    }
                }
            });

        const day = document.getElementById('today');
        const today = new Date();
        day.textContent = today.toISOString().split('T')[0];

    </script>
 
</body>
</html>