<div id="crt-nav-wrap" class="hidden-sm hidden-xs">
    <div id="crt-nav-inner">
        <div class="crt-nav-cont">
            <div id="crt-nav-scroll">
                <nav id="crt-nav" class="crt-nav">
                    <ul class="clear-list">
                        <li>
                            <a href="#about" data-tooltip="خانه"><img class="avatar avatar-42" src="{{\App\Models\info_basic::find(1)->img}}" srcset="{{\App\Models\info_basic::find(1)->img}} 2x" alt=""></a>
                        </li>

                        <li>
                            <a href="#eduction" data-tooltip="تحصیلات"><span class="crt-icon crt-icon-experience"></span></a>
                        </li>
                        <li>
                            <a href="#job" data-tooltip="نمونه‌کارها"><span class="crt-icon crt-icon-portfolio"></span></a>
                        </li>

                        <li>
                            <a href="#contact" data-tooltip="تماس"><span class="crt-icon crt-icon-contact"></span></a>
                        </li>
                        <li>
                            <a href="{{route('blog')}}" data-tooltip="بلاگ"><span class="crt-icon crt-icon-blog"></span></a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div id="crt-nav-tools" class="hidden">
                <span class="crt-icon crt-icon-dots-three-horizontal"></span>

                <button id="crt-nav-arrow" class="clear-btn">
                    <span class="crt-icon crt-icon-chevron-thin-down"></span>
                </button>
            </div>
        </div>
        <div class="crt-nav-btm"></div>
    </div>
</div>
