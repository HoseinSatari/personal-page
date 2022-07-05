<div id="crt-sidebar">
    <button id="crt-sidebar-close" class="btn btn-icon btn-light btn-shade">
        <span class="crt-icon crt-icon-close"></span>
    </button>

    <div id="crt-sidebar-inner">
        <nav id="crt-main-nav-sm" class="visible-xs visible-sm text-center">

            <ul class="clear-list">
                <li><a href="@if(request()->routeIs('home')) #about @else/#about @endif">خانه</a></li>
                <li><a href="@if(request()->routeIs('home')) #eduction @else/#eduction @endif">تحصیلات</a></li>
                <li><a href="@if(request()->routeIs('home')) #job @else/#job @endif">نمونه‌کارها</a></li>
                <li><a href="{{route('blog')}}">بلاگ</a></li>
                <li><a href=""@if(request()->routeIs('home')) #contact @else/#contact @endif">تماس</a></li>
            </ul>
        </nav>


        <div class="crt-card bg-primary text-center">
            <div class="crt-card-avatar">
                <img class="avatar avatar-195" src="{{\App\Models\info_basic::find(1)->img}}" srcset="{{\App\Models\info_basic::find(1)->img}} 2x" width="195" height="195" alt="">
            </div>
            <div class="crt-card-info">
                <h2> حسین ستاری</h2>

                <p class="text-muted">توسعه دهنده صفحات وب / بک اند </p>
                <ul class="crt-social clear-list">
                    <li><a href="{{option()->stackoverflow}}" title="StackOverFlow"><span class="crt-icon crt-icon-stack-overflow"></span></a></li>
                    <li><a href="{{option()->github}}" title="GitHub"><span class="crt-icon crt-icon-github"></span></a></li>
                    <li><a href="{{option()->gitlab}}" title="GitLab"><span class="crt-icon crt-icon-gitlab"></span></a></li>
                    <li><a href="{{option()->twitter}}" title="Twitter"><span class="crt-icon crt-icon-twitter"></span></a></li>
                    <li><a href="{{option()->whatsup}}" title="WhatsUp"><span class="crt-icon crt-icon-whatsapp"></span></a></li>
                    <li><a href="{{option()->instagram}}" title="InstaGram"><span class="crt-icon crt-icon-instagram"></span></a></li>
                    <li><a href="{{option()->telegram}}" title="Telegram"><span class="crt-icon crt-icon-telegram"></span></a></li>
                    <li><a href="{{option()->linkdin}}" title="Telegram"><span class="crt-icon crt-icon-linkedin"></span></a></li>
                </ul>
            </div>
        </div>
        <aside class="widget-area">
            <section class="widget widget_search">
                <form role="search" method="get" class="search-form" action="{{route('blog')}}">
                    <label>
                        <span class="screen-reader-text">جستجو برای:</span>
                        <input type="search" class="search-field" placeholder="جستجو" value="" name="search">
                    </label>
                    <button type="submit" class="search-submit">
                        <span class="screen-reader-text">جستجو</span>
                        <span class="crt-icon crt-icon-search"></span>
                    </button>
                </form>
            </section>

            <section class="widget widget_posts_entries">
                <h2 class="widget-title">مطالب اخیر</h2>
                <ul>
                    @foreach(\App\Models\Articles::where('is_active' , 1)->get()->take(3) as $article)
                    <li>
                        <a class="post-image" href="{{route('single' , $article->slug)}}">
                            <img src="{{$article->poster}}" style="width: 70px;height: 70px" alt="{{$article->title}}">
                        </a>
                        <div class="post-content">
                            <h3>
                                <a href="{{route('single' , $article->slug)}}">  {{$article->title}} </a>
                            </h3>
                        </div>
                        <div class="post-category-comment">
                            <a href="{{route('blog' , ['category' => $article->category()->first()->slug])}}" class="post-category">{{$article->category()->first()->title}}</a>
                            <a href="" class="post-comments">{{$article->comments()->count()}} دیدگاه</a>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </section>

            <section class="widget widget_categories">
                <h4 class="widget-title">دسته های مطالب</h4>
                <ul>
                    @foreach(\App\Models\Category::where('is_active' , 1)->get() as $cat)
                        <li class="cat-item"><a href="{{route('blog' , ['category' => $cat->slug])}}"> {{$cat->title}}</a></li>
                    @endforeach
                </ul>
            </section>
        </aside>

    </div><!-- #crt-sidebar-inner -->
</div>
