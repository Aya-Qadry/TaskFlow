<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="director-index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="{{ asset('assets/css/register.css') }}" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #1f1d2b;
        }
        .error {
            color: red;
            font-size: 0.875em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="header">
                <div class="user-settings"></div>
            </div>
            <div class="main-container">
                <div class="main-header anim" style="--delay: 0s">
                    Create Your TaskFlow Account
                    <div class="logo-container">
                        <img src="{{ asset('assets/images/landing/bgless-logo.png') }}" alt="" class="logo">
                    </div>
                </div>
                <div class="main-blogs">
                    <div class="main-blog anim" style="--delay: .1s" id="main-blog">
                        <div class="main-blog__title"></div>
                        <div class="main-blog__author">
                            <form action="{{ route('register.action') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="step" id="step1">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                    <div class="error" id="error-name"></div>

                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                    <div class="error" id="error-email"></div>

                                    <label for="profile_picture">Profile Picture</label>
                                    <input type="file" id="profile_picture" name="profile_picture" class="form-control" required>
                                    <div class="error" id="error-profile-picture"></div>

                                    <div class="buttons">
                                        <button type="button" class="next-btn btn btn-primary">Next</button>
                                    </div>
                                </div>

                                <div class="step" id="step2" style="display: none;">
                                    <div class="field-container">
                                      <div>
                                        <label for="city" class="form-label">City</label>
                                        <select id="city" name="city" class="form-control" required>
                                            <option value="">Select a city</option>
                                        </select>
                                        <div class="error" id="error-city"></div>
                                      </div>
                                      <div>
                                        <label for="company" class="form-label">Company</label>
                                        <input type="text" id="company" name="company" class="form-control" required>
                                        <div class="error" id="error-company"></div>
                                      </div>
                                    </div>

                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    <div class="error" id="error-password"></div>

                                    <label for="password_confirmation">Password confirmation</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                    <div class="error" id="error-password_confirmation"></div>

                                    <div class="buttons">
                                        <button type="button" class="prev-btn btn btn-secondary">Previous</button>
                                        <button type="submit" class="next-btn btn btn-primary" id="submit_btn">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const citySelect = document.getElementById("city");
        const url = "http://api.geonames.org/searchJSON?q=*&country=MA&maxRows=1000&username=lamar";

        // Fetch the data from the GeoNames API
        fetch(url)
            .then(response => response.json())
            .then(data => {
                // Loop through the data and add options to the select element
                data.geonames.forEach(city => {
                    const option = document.createElement("option");
                    option.value = city.name;
                    option.textContent = city.name;
                    citySelect.appendChild(option);
                });
            })
            .catch(error => console.error(error));

        const steps = document.querySelectorAll('.step');
        const nextBtns = document.querySelectorAll('.next-btn:not(#submit_btn)');
        const prevBtns = document.querySelectorAll('.prev-btn');
        const submitBtn = document.getElementById('submit_btn');

        let formData = {};

        nextBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                clearErrors();
                if (!validateStep(steps[index])) {
                    return;
                }
                steps[index].style.display = 'none';
                steps[index + 1].style.display = 'block';
                saveFormData(steps[index]);
            });
        });

        prevBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                steps[index + 1].style.display = 'none';
                steps[index].style.display = 'block';
                loadFormData(steps[index]);
            });
        });

        submitBtn.addEventListener('click', (event) => {
            clearErrors();
            if (!validateStep(document.getElementById('step2'))) {
                event.preventDefault();
                return;
            }
            const passwordInput = document.getElementById('password');
            const passwordConfirmationInput = document.getElementById('password_confirmation');

            if (passwordInput.value !== passwordConfirmationInput.value) {
                showError('password_confirmation', 'Password and Password Confirmation do not match. Please try again.');
                event.preventDefault();
            }
        });

        function saveFormData(step) {
            const formElements = step.querySelectorAll('input, textarea, select');
            formElements.forEach(element => {
                formData[element.name] = element.value;
            });
        }

        function loadFormData(step) {
            const formElements = step.querySelectorAll('input, textarea, select');
            formElements.forEach(element => {
                element.value = formData[element.name] || '';
            });
        }

        function validateStep(step) {
            let valid = true;
            const formElements = step.querySelectorAll('input[required], select[required]');
            formElements.forEach(element => {
                if (!element.value) {
                    showError(element.id, `${element.previousElementSibling.innerText} is required`);
                    valid = false;
                } else if (element.type === 'email' && !validateEmail(element.value)) {
                    showError(element.id, 'Please enter a valid email address');
                    valid = false;
                }
            });
            return valid;
        }

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }

        function showError(elementId, message) {
            const errorElement = document.getElementById(`error-${elementId}`);
            if (errorElement) {
                errorElement.innerText = message;
            }
        }

        function clearErrors() {
            document.querySelectorAll('.error').forEach(errorElement => {
                errorElement.innerText = '';
            });
        }
    </script>
</body>
</html>
