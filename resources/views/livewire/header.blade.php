<header id="crt-header">
    <div class="crt-head-inner crt-container">
        <div class="crt-container-sm">
            <div class="crt-head-row">
                <div id="crt-head-col1" class="crt-head-col text-left">
                    <a id="crt-logo" class="crt-logo" href="#">
                        <img src="{{option()->logo}}" style="width: 6rem;" alt="logo">
                    </a>
                </div>

                <div id="crt-head-col2" class="crt-head-col text-right">
                    <div class="crt-nav-container crt-container hidden-sm hidden-xs">
                        <nav id="crt-main-nav">

                            <ul class="clear-list">
                                <li><a href="@if(request()->routeIs('home')) #about @else/#about @endif" >خانه</a></li>
                                <li><a href="@if(request()->routeIs('home')) #eduction @else/#eduction @endif ">تحصیلات</a></li>
                                <li><a href="@if(request()->routeIs('home')) #job @else/#job @endif ">نمونه‌کارها</a></li>
                                <li ><a href="{{route('blog')}}">بلاگ</a></li>
                                <li><a href="@if(request()->routeIs('home')) #contact @else/#contact @endif ">تماس</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div id="crt-head-col3" class="crt-head-col text-right">
                    <button id="crt-sidebar-btn" class="btn btn-icon btn-shade">
                        <span class="crt-icon crt-icon-side-bar-icon"></span>
                    </button>
                </div>
            </div>
        </div><!-- .crt-head-inner -->
    </div>

    <nav id="crt-nav-sm" class="crt-nav hidden-lg hidden-md">
        <ul class="clear-list">
            <li>
                <a href="@if(request()->routeIs('home')) #about @else/#about @endif" data-tooltip="خانه"><img class="avatar avatar-42" src="{{\App\Models\info_basic::find(1)->img}}" srcset="{{\App\Models\info_basic::find(1)->img}} 2x" alt="me"></a>
            </li>
            <li>
                <a href="@if(request()->routeIs('home')) #eduction @else/#eduction @endif" data-tooltip="تحصیلات"><span class="crt-icon crt-icon-experience"></span></a>
            </li>
            <li>
                <a href="@if(request()->routeIs('home')) #job @else/#job @endif" data-tooltip="نمونه‌کارها"><span class="crt-icon crt-icon-portfolio"></span></a>
            </li>

            <li>
                <a href="@if(request()->routeIs('home')) #contact @else/#contact @endif" data-tooltip="تماس"><span class="crt-icon crt-icon-contact"></span></a>
            </li>
            <li>
                <a href="{{route('blog')}}" data-tooltip="بلاگ"><span class="crt-icon crt-icon-blog"></span></a>
            </li>
        </ul>
    </nav><!-- #crt-nav-sm -->
</header>
