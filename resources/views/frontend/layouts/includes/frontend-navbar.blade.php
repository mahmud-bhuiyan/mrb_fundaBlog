<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-none d-sm-none d-md-inline">
                <img src="{{ asset('assets/logo/logo.jpg') }}" alt="logo">
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5>Ads goes here</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class=" sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
        <div class="container">
            <a href="" class="navbar-brand d-inline d-sm-inline d-md-none"><img
                    src="{{ asset('assets/logo/logo.jpg') }}" style="widows: 100px;" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    @php
                        $categories = App\Models\Category::where('navbar_status', '1')
                            ->where('status', '1')
                            ->get();
                    @endphp
                    @foreach ($categories as $item)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('tutorial/' . $item->slug) }}">{{ $item->name }}</a>
                        </li>
                    @endforeach
                    @if (Auth::check())
                        <li>
                            <a class="nav-link btn-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
