<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saybabook</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/landingpage.css')}}">
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/Saybabook-ico.png') }}">
</head>

<body>

    <!-- Navbar Contents Starts -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" id="top-logo">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo-brand" src="{{ asset('icons/Saybabook-logo.png') }}"
                    alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#sec-bg">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#third-bg">Contact</a>
                </ul>
                <button type="button" id="btn-log" class="btn btn-outline-success d-flex" data-bs-toggle="modal"
                    data-bs-target="#loginModal">
                    Login
                </button>
            </div>
        </div>
    </nav>

    <!-- Navbar Content Ends -->
    <!-- Header Contents Starts -->
    <section class="container-fluid" id="bg-container">
        <div class="row" id="outer-left-container">
            <div class="col-sm-6" id="inner-left-container">
                <div class="container-fluid" id="left-center-container">
                    <div class="main-title-container">
                        <h1 class="main-title">Saybabook</h1>
                    </div>
                    <div class="punchyline-container">
                        <span class="punchyline">The Simplest Way to Manage Your Reading List.</span>
                    </div>
                    <div class="description-container">
                        <span class="description">Effortlessly track, organize, and archive every book on your list.
                            Saybabook
                            gives you a simple, personalized space to manage your reading journey no more scattered
                            notes,
                            just
                            seamless progress. </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-1" alt="free-spacing">
            </div>
            <div class="col-sm-5">
                <!--Register -->
                <form action="/register" method="POST">
                    @csrf
                    <div class="container" id="outer-form-container">
                        <div class="form-sub-heading">
                            <h3 class="form-heading"> Sign Up For Free</h3>
                        </div>
                        <div class="inner-form-container">
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <p class="Or-divider"><span>Or</span></p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <label for="Email" class="form-label">Email address</label>
                                    <input name="email" type="email" class="form-control" id="InputEmail">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <label for="Username" class="form-label">Username</label>
                                    <input name="username" type="username" class="form-control" id="InputUsername">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <label for="InputPassword" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" id="Password">
                                </div>
                            </div>

                            <input type="hidden" name="image" value="{{ asset('icons/human-30.png') }}">

                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12" id="terms-text">
                                <p class="terms">By clicking Create account, I agree to the <a class="terms-link"
                                        href="">Terms of Service</a> and
                                    <a class="terms-link" href="">Privacy Policy</a>
                                </p>
                            </div>
                            <div class="mb-3" id="create-acc-container">
                                <button type="submit" class="btn" id="create-acc-btn">Create an Account</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </section>
    <div class="divider wave-1">
    </div>
    <section class="container-fluid" id="sec-bg">
        <div class="row">
            <!-- About Section -->
            <div class="col-sm-6 p-4">
                <h1 class="second-header">About Saybabook</h1>
                <p class="sec-description">
                    Saybabook is a simple web-based platform designed for readers who want to stay organized.
                    Whether you’re reading for leisure, study, or growth, Saybabook helps you track what you’ve
                    read, what you’re reading, and what’s next without messy notes or spreadsheets.
                </p>
            </div>

            <!-- Features Section -->
            <div class="col-sm-6 p-4">
                <h1 class="second-header">Features</h1>
                <div class="row g-3 align-items-center">
                    <div class="col-2"><img src="{{ asset('icons/lock.png') }}" alt="lock-icon"></div>
                    <div class="col-4">Personal Account</div>
                    <div class="col-6">Securely log in to manage your own library.</div>

                    <div class="col-2"><img src="{{ asset('icons/books.png') }}" alt="books-icon"></div>
                    <div class="col-4">Book Management</div>
                    <div class="col-6">Add, update, or delete books with ease.</div>

                    <div class="col-2"><img src="{{ asset('icons/folder.png') }}" alt="folder-icon"></div>
                    <div class="col-4">Archive Section</div>
                    <div class="col-6">Keep your completed books organized.</div>

                    <div class="col-2"><img src="{{ asset('icons/link.png') }}" alt="link-icon"></div>
                    <div class="col-4">Online Links</div>
                    <div class="col-6">Save where to find or buy books online.</div>

                    <div class="col-2"><img src="{{ asset('icons/thunder.png') }}" alt="thunder-icon"></div>
                    <div class="col-4">Simple Interface</div>
                    <div class="col-6">Built for speed, clarity, and comfort.</div>
                </div>
            </div>
        </div>
    </section>
    <div class="divider2 wave-2">
    </div>
    <section class="container-fluid" id="third-bg">
        <div class="row g-3 align-items-center">
            <!-- About Section -->
            <div class="col-sm-4 p-2">
                <h4>Useful Links</h4>
                <a class="footers-link" href="#top">Login</a>
            </div>
            <div class="col-sm-4 p-2">
                <a class="navbar-brand" href="#"><img class="logo-brand-footer"
                        src="{{ asset('icons/Saybabook-logo.png') }}" alt=""></a>
            </div>
            <div class="col-sm-4 p-2">
                <h4>Contact Us</h4>
                <a class="footers-link" href="">saybabook@gmail.com</a>
            </div>
        </div>
    </section>
    <!-- Header Contents Ends -->
    <!-- Modal Contents Starts -->
    <form action="/login" method="POST">
        @csrf
        <div class="modal fade" tabindex="-1" id="loginModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container" id="inner-modal-form">
                            <div class="container-fluid" id="log-in-modal-form">
                                <div class="mb-3 row">
                                    <div class="col-sm-12">
                                        <input name="loginusername" type="text" class="form-control"
                                            id="inputUsernameLogin" placeholder="Username">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-12">
                                        <input name="loginpassword" type="password" class="form-control"
                                            id="inputPasswordLogin" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="btn-log" type="submit" class="btn btn-success">Login</button>
                                <!-- Needed Submit Functionality Later-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal Contents Ends -->
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>