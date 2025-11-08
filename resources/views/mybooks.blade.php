<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saybabook</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mybook.css')}}">
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/Saybabook-ico.png') }}">
</head>

<body>
    @auth
        <!-- Navbar Content Starts -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-light" id="top-logo">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img class="logo-brand" src="{{asset('icons/Saybabook-logo.png') }}"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    </ul>
                    <form action="/logout" method="POST" class="d-flex">
                        @csrf
                        <button class="btn btn-outline-success" id="logoutbtn" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Navbar Content Ends -->
        <!-- Navbar Menu Starts -->
        <section class="sub-navbar-container" id="first-bg">
            <nav class="navbar navbar-expand-lg navbar-light" id="sub-navbar">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Browse</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Books</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Manga</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Books</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <div class="input-group">
                                <button class="btn btn-success text-white dropdown-toggle rounded-l-lg" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" id="category-selector-text">
                                    All Categories
                                </button>
                                <ul class="dropdown-menu shadow-lg rounded-xl p-2" aria-labelledby="category-selector-text">
                                    <li><a class="dropdown-item text-gray-700 font-semibold" href="#"
                                            onclick="selectCategory('All Categories')">All Categories</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle flex justify-between items-center text-blue-600 font-semibold"
                                            href="#" id="fiction-menu" onclick="selectCategory('Fiction', event)">
                                            Fiction
                                            <span class="ms-1">&#9656;</span>
                                        </a>
                                        <ul class="dropdown-menu shadow-xl rounded-xl">
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Fantasy', event)">Fantasy</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Science Fiction', event)">Science Fiction</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Mystery / Thriller', event)">Mystery /
                                                    Thriller</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Historical Fiction', event)">Historical
                                                    Fiction</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Literary Fiction', event)">Literary
                                                    Fiction</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Romance', event)">Romance</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Horror', event)">Horror</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu" id="d-down-nf">
                                        <a class="dropdown-item dropdown-toggle flex justify-between items-center text-blue-600 font-semibold"
                                            href="#" id="non-fiction-menu" onclick="selectCategory('Non-fiction', event)">
                                            Non-Fiction
                                            <span class="ms-1">&#9656;</span>
                                        </a>
                                        <ul class="dropdown-menu shadow-xl rounded-xl">
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Biography & Memoir', event)">Biography &
                                                    Memoir</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('History', event)">History</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Science & Nature', event)">Science & Nature</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Self-Help & Personal', event)">Self-Help &
                                                    Personal
                                                    Development</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Trues Crime', event)">True
                                                    Crime</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Business & Finance', event)">Business &
                                                    Finance</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Cooking & Food', event)">Cooking & Food</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Arts & Photography', event)">Arts &
                                                    Photography</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Reference', event)">Reference</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="selectCategory('Travel', event)">Travel</a></li>

                                        </ul>
                                    </li>
                                </ul>
                                <input type="search"
                                    class="form-control focus:border-blue-500 focus:shadow-lg focus:shadow-blue-200/50"
                                    placeholder="Search books, authors, or ISBNs..." aria-label="Search input"
                                    id="search-input-field">
                                <button class="btn btn-outline-primary rounded-r-lg" id="search-btn" type="submit">
                                    <!--Need Search icon-->
                                    Search
                                </button>
                            </div>
                        </form>
                        <div id="selected-info"></div>
                    </div>
                </div>
            </nav>
        </section>
        <div class="divider wave-1">
        </div>
        <section class="second-bg">                
        </section>
        <!-- Navbar Menu Starts -->
    @else
    @endauth
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
</body>

</html>