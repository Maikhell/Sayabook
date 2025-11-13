<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saybabook</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userbooks.css')}}">
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/Saybabook-ico.png') }}">
</head>

<body>
    @auth
        <!-- Navbar Content Starts -->
        <nav class="navbar navbar-expand-lg navbar-light" id="top-logo">
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

                    <div class="row justify-content-end">
                        @if ($userHeaderData)
                            <div class="user-info">
                                <span class="user-name-head">{{ $userHeaderData->username }}</span>
                                <img src="{{ asset($userHeaderData->image) }}"
                                    alt="{{ $userHeaderData->username }}'s profile image" class="profile-image" width="50">
                            </div>
                        @else
                            <img src="{{ asset('icons/human-30.png') }}" alt="Default Avatar" class="profile-image">
                        @endif
                    </div>
                    <form action="/logout" method="POST" class="d-flex">
                        @csrf
                        <button class="btn btn-outline-success" id="btn-out" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Navbar Content Ends -->
        <!-- Navbar Menu Starts -->
        <section class="sub-navbar-container" id="first-bg">
            <nav class="navbar sticky-top navbar-expand-lg navbar-light" id="sub-navbar">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('mybooks') }}">Browse</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Books</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Manga</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">My Books</a>
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
                                    <img class="search-icon" src="{{ asset('icons/search.png') }}" alt="">
                                </button>
                            </div>
                        </form>
                        <div id="selected-info"></div>
                    </div>
                </div>
            </nav>

            @if ($userHeaderData)
                <div class="position-fixed bottom-0 end-0 p-3">
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="popToast">
                        <div class="toast-header">
                            <img src="{{ asset('icons/Saybabook-ico.png') }}" id="toast-img" class="rounded me-1" alt="...">
                            <strong class="me-auto">Saybabook</strong>
                            <small>Just now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Hey! <span class="user-name">{{ $userHeaderData->username }} </span> you can add your books by
                            pressing the add button!
                        </div>
                    </div>
                </div>
            @else
            @endif
        </section>
        <div class="divider wave-1">
        </div>
        <section class="second-bg">
            <div class="container-fluid" id="card-outer-container">
                <div id="card-outer-container">
                    <div class="row justify-content-start mx-auto" id="card-container">
                        <div class="card" id="paginated-card-add">
                            <button class="btn-add" type="button" data-bs-toggle="modal" data-bs-target="#addbooksModal">
                                <span class="add-ico">+</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center" id="pagination-container">
                <nav aria-label="Page navigation example" id="card-pagination">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" data-page="prev">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#" data-page="1">1</a></li>
                        <li class="page-item"><a class="page-link" href="#" data-page="2">2</a></li>
                        <li class="page-item"><a class="page-link" href="#" data-page="3">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" data-page="next">Next</a></li>
                    </ul>
                </nav>
            </div>
        </section>
        <div class="modal" id="addbooksModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Books</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="/addbooks" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body">
                            <div id="book-forms-container">
                                {{-- The content here will be added dynamically --}}
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-check me-2"></i> Add Book(s) to Collection
                            </button>

                            <button type="button" class="btn btn-primary btn-lg" id="add-more-books-btn">
                                <i class="fas fa-plus me-2"></i> Add More Books
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Navbar Menu Starts -->
    @else
    @endauth
    <!-- Form Instance -->
    <script>
        window.currentDate = '{{ date('Y-m-d') }}';
    </script>
    <script id="book-form-template" type="text/template">
        <div class="book-form-instance mb-5 p-4 border rounded shadow-sm" data-index="BOOK_INDEX">

            <h4 class="mb-4 text-primary">Book #<span class="book-index-display">BOOK_DISPLAY_INDEX</span></h4>

            <div class="row justify-content-center">

                <div class="col-md-4 col-sm-12 text-center">
                    <h4 class="mb-3">Book Cover</h4>
                    <img class="img-fluid border mb-3 bookCoverPreview" style="max-height: 300px; object-fit: cover;"
                        src="{{ asset('icons/sampleprofile.jpg') }}" alt="Book Cover Preview">
                    <div class="mb-3">
                        <label for="bookCoverFile-BOOK_INDEX" class="btn btn-primary w-100">
                            <i class="fas fa-upload me-2"></i> Choose Book Cover
                        </label>
                        <input type="file" class="form-control d-none bookCoverFile" 
                            id="bookCoverFile-BOOK_INDEX" 
                            name="books[BOOK_INDEX][book_cover]"
                            accept="image/*">
                    </div>
                </div>

                <div class="col-md-8 col-sm-12">
                    <div class="mb-3">
                        <label for="bookTitle-BOOK_INDEX" class="form-label">Book Title</label>
                        <input type="text" class="form-control" id="bookTitle-BOOK_INDEX" 
                            name="books[BOOK_INDEX][book_title]" required>
                    </div>
                    <div class="mb-3">
                        <label for="bookAuthor-BOOK_INDEX" class="form-label">Book Author</label>
                        <input type="text" class="form-control" id="bookAuthor-BOOK_INDEX" 
                            name="books[BOOK_INDEX][book_author]" required>
                    </div>
                    <div class="mb-3">
                        <label for="bookDescription-BOOK_INDEX" class="form-label">Book Description</label>
                        <textarea class="form-control" id="bookDescription-BOOK_INDEX" 
                            name="books[BOOK_INDEX][book_description]" rows="3"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="bookStatus-BOOK_INDEX" class="form-label">Book Status</label>
                            <select class="form-select" id="bookStatus-BOOK_INDEX" 
                                name="books[BOOK_INDEX][book_status]" required>
                                <option value="" disabled selected>Select Status</option>
                                <option value="reading">Currently Reading</option>
                                <option value="completed">Completed</option>
                                <option value="to_read">To Read</option>
                                <option value="dropped">Dropped</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="bookCategory-BOOK_INDEX" class="form-label">Book Category</label>
                            <select class="form-select" id="bookCategory-BOOK_INDEX" 
                                name="books[BOOK_INDEX][book_category]">
                                <option value="" disabled selected>Select Category</option>
                                <option value="fiction">Fiction</option>
                                <option value="nonfiction">Non-Fiction</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="bookGenre-BOOK_INDEX" class="form-label">Book Genre</label>
                            <select class="form-select" id="bookGenre-BOOK_INDEX" 
                                name="books[BOOK_INDEX][book_genre]">
                                <option value="" disabled selected>Select Genre</option>
                                <option value="fantasy">Fantasy</option>
                                <option value="scifi">Science Fiction</option>
                            </select>
                        </div>
                         <div class="col-md-4 mb-3">
                            <label for="bookPrivacy-BOOK_INDEX" class="form-label">Book Privacy</label>
                            <select class="form-select" id="bookPrivacy-BOOK_INDEX" 
                                name="books[BOOK_INDEX][book_privacy]">
                                <option value="" disabled selected>Privacy Options</option>
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bookLink-BOOK_INDEX" class="form-label">Book's Online Link</label>
                        <input type="url" class="form-control" id="bookLink-BOOK_INDEX" 
                            name="books[BOOK_INDEX][book_online_link]"
                            placeholder="https://example.com/book-page">
                    </div>

                    <input type="hidden" name="books[BOOK_INDEX][date_added]" value="BOOK_DATE_VALUE"> 

                </div>
            </div>

            <div class="text-end">
                 <button type="button" class="btn btn-outline-danger btn-sm remove-book-btn">Remove Book</button>
            </div>

        </div>
    </script>

    <script src="{{ asset('js/formInstances.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
    <script src="{{ asset('js/showtoast.js') }}"></script>
    <script src="{{ asset('js/pagination.js') }}"></script>
    <script src="{{ asset('js/addimage.js') }}"></script>
</body>

</html>