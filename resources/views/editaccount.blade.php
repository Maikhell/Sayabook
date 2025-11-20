<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saybabook</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/editaccount.css')}}">
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/Saybabook-ico.png') }}">
</head>

<body>
    @auth
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
                    @if ($userHeaderData)
                                    <span class="user-name-head">{{ $userHeaderData->username }}</span>
                                    <div class="row justify-content-end">
                                        <div class="user-info">
                                            <div class="dropstart">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        data-bs-popper-config='{"strategy":"fixed"}'>
                                                        <img src="{{ asset('storage/' . $user->image) }}"
                                                            alt="{{ $userHeaderData->username }}'s profile image" class="profile-image"
                                                            width="50">
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="{{ route('account') }}">Account</a></li>
                                                        <li><a class="dropdown-item" href="#">Archive</a></li>
                                                        <li>
                                                            <form action="/logout" method="POST" style="margin-bottom: 0;">
                                                                @csrf
                                                                <button class="dropdown-item" type="submit"
                                                                    style="color:red;">Logout</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="/logout" method="POST" class="d-flex">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </nav>
                        <div class="container" id="main-container">
                            <form action="/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4" id="outerProfile">
                                        <div class="row" id="innerProfile">
                                            <div class="col-sm-12">
                                               <img src="{{ asset('storage/' . $user->image) }}" class="profileImagePreview">
                                            </div>
                                            <div class="mb-3">
                                                {{-- 2. Button to trigger the file input --}}
                                                <label for="profileImageFile" class="btn" id="changeProfilebtn">
                                                    Choose New Profile
                                                </label>

                                                {{-- 3. Hidden File Input --}}
                                                <input type="file" class="form-control d-none profileImageFile" id="profileImageFile"
                                                    name="image" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9" id="outer-form-container">
                                        <div class="form-sub-heading">
                                            <h3 class="form-heading">Account Details</h3>
                                        </div>
                                        <div class="inner-form-container">
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <label for="Email" class="form-label">Email address</label>
                                                    <input value="{{ $userHeaderData->email }}" name="email" type="email"
                                                        class="form-control" id="InputEmail">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <label for="Username" class="form-label">Username</label>
                                                    <input value="{{ $userHeaderData->username }}" name="username" type="username"
                                                        class="form-control" id="InputUsername">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <label for="InputPassword" class="form-label"> Current Password</label>
                                                    <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <label for="InputNewPassword" class="form-label">New Password</label>
                                                    <input name="newPassword" type="password" class="form-control" id="newPassword">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <input type="hidden" name="image" value="{{ asset('icons/default_profile.png') }}">
                                                <div class="mb-3" id="create-acc-container">
                                                    <button type="submit" class="btn" id="create-acc-btn">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
    @endauth
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/addprofileimage.js') }}"></script>
    <script src="{{ asset('js/showtoast.js') }}"></script>
</body>

</html>