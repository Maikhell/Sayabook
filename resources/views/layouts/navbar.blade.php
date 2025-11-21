<!-- Navbar Content Starts -->
<nav class="navbar navbar-expand-lg navbar-light" id="top-logo">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img class="logo-brand" src="{{asset('icons/Saybabook-logo.png') }}"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                        <form action="/logout" method="POST" style="margin-bottom: 0;">
                                            @csrf
                                            <button class="dropdown-item" type="submit" style="color:red;">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            @else
                    <img src="{{ asset('icons/default_profile.png') }}" alt="Default Avatar" class="profile-image">
                @endif
            </div>
            <form action="/logout" method="POST" class="d-flex">
                @csrf

            </form>
        </div>
    </div>
</nav>