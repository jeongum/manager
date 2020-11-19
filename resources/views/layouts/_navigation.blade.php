<header class="header-global" id="home">
    <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light navbar-theme-secondary">
        <div class="container position-relative">
            <a class="navbar-brand mr-lg-4" href="/">
                <img class="navbar-brand-dark" src="{{asset('img/logo/software_wh.PNG')}}" alt="Logo light">
                <img class="navbar-brand-light" src="{{asset('img/logo/software.png')}}" alt="Logo dark">
            </a>
            <div class="navbar-collapse collapse mr-auto" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./index.html">
                                <img src="{{asset('swipe/img/dark.svg')}}" alt="Logo dark">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item">
                        <a href="{{route('lockers.index')}}" class="nav-link font-weight-border">
                        		신청하기
                        </a>
                    </li>
                    <li class="nav-item">
                    	@guest
                        <a href="{{route('login')}}" class="nav-link">
                            내사물함
                        </a>
                    	@elseif(Auth::user()->has_locker == 1)
                        <a href="{{route('lockers.show',Auth::user()->locker_info_id)}}" class="nav-link font-weight-border">
                            내사물함
                        </a>
                        @else
                        <a href="#" class="nav-link">
                            내사물함
                        </a>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
            	@if(Auth::check())
            		<p class="my-auto mr-3 profile-name" ><span class="font-weight-bolder">{{$user->name}}</span>님, 반갑습니다!</p>
                    <a href="{{route('logout')}}" class="btn btn-md btn-tertiary text-white d-none d-md-inline  animate-up-2 ">로그아웃<i class="fas fa-rocket ml-2"></i></a>
            	@else
                	<a href="{{ route('register') }}" class="btn btn-outline-soft d-none d-md-inline animate-up-2 mr-md-3">회원가입</a>
                    <a href="{{route('login')}}" class="btn btn-md btn-tertiary text-white d-none d-md-inline  animate-up-2 ">로그인<i class="fas fa-rocket ml-2"></i></a>
                @endif
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>