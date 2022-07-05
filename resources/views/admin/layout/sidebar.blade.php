<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light pr-2">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{\App\Models\info_basic::find(1)->img}}"
                         class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}} </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{route('Basic_show')}}"
                           class="nav-link {{ isactive(['Basic_show']) }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p> اطلاعات پایه </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('education.index')}}" class="nav-link {{ isactive(['education.index' ,'education.create' , 'education.edit']) }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>لیست تحصیلات </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Work.index')}}" class="nav-link {{ isactive(['Work.index' ,'Work.create' , 'Work.edit']) }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>لیست تجربیات کاری </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('skill.index')}}" class="nav-link {{ isactive(['skill.index' ,'skill.create' , 'skill.edit']) }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>لیست مهارت ها  </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('softskill.index')}}" class="nav-link {{ isactive(['softskill.index' ,'softskill.create' , 'softskill.edit']) }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>لیست مهارت های نرم  </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('category_post.index')}}" class="nav-link  {{ isactive(['category_post.index', 'category_post.create' ,'category_post.edit']) }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p> دسته بندی </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('job.index')}}" class="nav-link {{ isactive(['job.index' ,'job.index' , 'job.edit']) }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p> لیست نمونه کار ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('article.index')}}" class="nav-link {{ isactive(['article.index' ,'article.edit' , 'article.create']) }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>لیست مقالات</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact.index')}}" class="nav-link {{ isactive(['contact.index' ]) }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p> پیام های ارتباط با من</p>
                        </a>
                    </li>



                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>
                               نظرات ({{\App\Models\Comment::whereapproved(0)->count()}})
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('comments')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> تایید شده ({{\App\Models\Comment::whereapproved(1)->count()}}) </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('comments' , ['unapproved' => 1])}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>تایید نشده ({{\App\Models\Comment::whereapproved(0)->count()}})</p>
                                </a>
                            </li>
                        </ul>
                    </li>





                    <li class="nav-item">
                        <a href="{{route('option.index')}}" class="nav-link {{ isactive(['option.index' ]) }}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>   تنظیمات</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
