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
        @include('layouts.navbar')
        @include('layouts.menu')
        <div class="divider wave-1">
        </div>
        <section class="second-bg">
            <div class="container-fluid" id="card-outer-container">
                <div id="card-outer-container">
                    <div class="row justify-content-start mx-auto" id="card-container">
                        @foreach ($publicBooks as $publicBook)
                            <div class="card" id="paginated-card">
                                <div class="row" id="small-card-btn">
                                    <div class="col-2">
                                        <button class="btn-small" id="small-ico"> <img class="small-ico-btn-user"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Added By:  {{ $publicBook->user->username}}"
                                                src="{{ asset('storage/' . $publicBook->user->image) }}"></button>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn-small" id="small-ico"> <img class="small-ico-btn"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Add To Your Books"
                                                src="{{ asset('icons/plus.png') }}"></button>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn-small" id="small-ico"> <img class="small-ico-btn"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Archive This Book"
                                                src="{{ asset('icons/book.png') }}"></button>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn-small" id="small-ico"> <img class="small-ico-btn"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Favorite this Book"
                                                src="{{ asset('icons/star.png') }}"></button>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn-small" id="small-ico"> <img class="small-ico-btn"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Online Link of the Book"
                                                src="{{ asset('icons/smallink.png') }}"></button>
                                    </div>
                                </div>
                                <img src="{{ asset('storage/' . $publicBook->book_cover) }}" class="card-img-top"
                                    alt="{{ asset('storage/' . 'images/default_cover.png') }}">
                                <span class="card-title">{{ $publicBook->book_title }}</span>
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
            <div class="d-flex justify-content-center" id="pagination-container">
                <nav aria-label="Page navigation" id="card-pagination">
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
        <!-- Navbar Menu Starts -->
    @else
    @endauth
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
    <script src=" {{ asset('js/showtoast.js') }}"></script>
    <script src="{{ asset('js/pagination.js') }}"></script>
</body>

</html>