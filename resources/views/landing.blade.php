<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Flow</title>
    <link  href="{{asset('assets/css/landing.css')}}" rel="stylesheet" type="text/css"> 
    
</head>
<body>
  <nav class="nav">
        <div class="container">
            <div class="logo">
               <img src="{{asset('assets/images/landing/final_logo.png')}}" alt="">
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="#">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>

    <section class="home" >
        <div id="center">
            <p id="title">Create a website for your company</p>
            <!-- @if (Route::has('login')) -->
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <!-- @auth -->
                        <!-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a> -->
                    <!-- @else -->
                        <a class="joinUs" href="{{ route('register') }}">Create one !</a>  

                        <!-- @if (Route::has('register')) -->
                            <!-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a> -->
                        <!-- @endif -->
                    <!-- @endauth -->
                </div>
            <!-- @endif -->

        </div>
    </section>

    <section class="services" id="services">
    <div class="services">
      <div class="cards">
        <div class="card-item">
          <div class="card-image">
            <img  id="service" src="{{asset('assets/images/landing/design.avif')}}"  alt="">
          </div>
          <div class="card-info">
            <h2 class="card-title">Website Design</h2>
            <p class="card-intro">
            Transform your online presence with expert web design. From sleek aesthetics to intuitive functionality, we craft captivating websites tailored to your brand. Let's bring your vision to life.
            </p>
          </div>
        </div>
      </div>
      <div class="cards">
        <div class="card-item">
          <div class="card-image">
          <img  id="service" src="{{asset('assets/images/landing/web.jpg')}}"  alt="">
          </div>
          <div class="card-info">
            <h2 class="card-title">Web Development</h2>
            <p class="card-intro">
            Elevate your online presence with expert web development. Our team creates seamless, high-performance websites that drive results. Let's turn your digital goals into reality.
            </p>
          </div>
        </div>
      </div>
      <div class="cards">
        <div class="card-item">
          <div class="card-image">
          <img  id="service" src="{{asset('assets/images/landing/maintenance.jpg')}}"  alt="">
          </div>
          <div class="card-info">
            <h2 class="card-title">Website Maintenance & Support</h2>
            <p class="card-intro">
            Keep your website running smoothly with our maintenance and support services. From updates and security patches to troubleshooting, we've got you covered. Stay worry-free and focused on your business while we take care of the technical details.
            </p>
          </div>
        </div>
      </div>
      <div class="cards">
        <div class="card-item">
          <div class="card-image">
          <img  id="service" src="{{asset('assets/images/landing/mobile.jpg')}}"  alt="">
          </div>
          <div class="card-info">
            <h2 class="card-title">Mobile Apps</h2>
            <p class="card-intro">
            Unlock the power of mobile apps with our expertise. From concept to launch, we craft dynamic and user-friendly mobile applications tailored to your needs. Reach your audience wherever they are, and make an impact with a custom mobile app.  
          </p>
          </div>
        </div>
      </div>
      
    </div> 
    </section>


    <section class="footer" id="contact">
      <div class="footer-row">
        <div class="footer-col">
          <h4>Info</h4>
          <ul class="links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Compressions</a></li>
            <li><a href="#">Customers</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Collection</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Explore</h4>
          <ul class="links">
            <li><a href="#">Free Designs</a></li>
            <li><a href="#">Latest Designs</a></li>
            <li><a href="#">Themes</a></li>
            <li><a href="#">Popular Designs</a></li>
            <li><a href="#">Art Skills</a></li>
            <li><a href="#">New Uploads</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Legal</h4>
          <ul class="links">
            <li><a href="#">Customer Agreement</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">GDPR</a></li>
            <li><a href="#">Security</a></li>
            <li><a href="#">Testimonials</a></li>
            <li><a href="#">Media Kit</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Newsletter</h4>
          <p>
            Subscribe to our newsletter for a weekly dose
            of news, updates, helpful tips, and
            exclusive offers.
          </p>
          <form action="#">
            <input type="text" placeholder="Your email" required>
            <button type="submit">SUBSCRIBE</button>
          </form>
          <div class="icons">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin"></i>
            <i class="fa-brands fa-github"></i>
          </div>
        </div>
      </div>
    </section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $('.navTrigger').click(function () {
        $(this).toggleClass('active');
        console.log("Clicked menu");
        $("#mainListDiv").toggleClass("show_list");
        $("#mainListDiv").fadeIn();
        });
    </script>

    <!-- shrink nav -->
    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script>

</body>
</html>