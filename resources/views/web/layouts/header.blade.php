<div class="header header-four">
    <div class="container-fluid">
        <div class="header-left header-left-four">
			<a href="{{route('index')}}" class="logo">
				<img src="{{asset('web/assets/img/logo.png')}}" alt="Logo">
			</a>
			<a href="{{route('index')}}" class="dark-logo">
				<img src="{{asset('web/assets/img/logo.png')}}" alt="Logo">
			</a>
			<a href="{{route('index')}}" class="logo logo-small">
				<img src="{{asset('web/assets/img/logo.png')}}" alt="Logo" width="30" height="30">
			</a>
		</div>
        <a class="mobile_btn mobile_btn-two" id="mobile_btn"><i class="fas fa-bars"></i></a>
        <div class="sidebar sidebar-five">
            <div id="sidebar-menu" class="sidebar-menu sidebar-menu-five">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @if(Auth::user()->id == 1)
                    <li class="nav-item submenu-five" role="presentation">
                        <a href="{{route('index')}}" class="new-active">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item submenu-five" role="presentation">
                        <a href="{{route('customer')}}">
                            <i class="fas fa-user"></i>
                            <span>Customers</span>
                        </a>
                    </li>

                    <li class="nav-item submenu-five" role="presentation">
                        <a  id="home-tab" class="active" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-keyboard"></i>
                            <span>Entry</span>
                        </a>
                    </li>
                    <li class="nav-item submenu-five" role="presentation">
                        <a  id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                            <i class="fas fa-sticky-note"></i>
                            <span>Notes</span>
                        </a>
                    </li>

                    <li class="nav-item submenu-five" role="presentation">
                        <a id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false" onclick="reviewFunction()">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Reviews</span>
                        </a>
                    </li>
                    @if(Auth::user()->id == 1)
                    <li class="nav-item submenu-five" role="presentation">
                        <a href="{{route('technician.add')}}">
                            <i class="fa fa-user"></i>
                            <span>Add Technicians</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <ul class="nav nav-tabs user-menu user-menu-four">
            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle dropdown-toggle-four nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <img src="assets/img/profiles/avatar-14.png" alt="" />
                        <span class="status online"></span>
                    </span>
                    <span>{{Auth::user()->name}}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('logout')}}"><i data-feather="log-out" class="me-1"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>
