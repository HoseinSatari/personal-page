<div class="crt-paper-layers">
    @section('title' , $article->title)
    @section('subject' , $article->title)
    @section('keyword' , $article->keywords)
    @section('descrip' , $article->short_descrip)
    <div class="crt-paper clearfix">
        <div class="crt-paper-cont clear-mrg">

            <article class="post hentry">
                <div class="post-media">
                    <div class="post-image">
                        <img src="{{$article->poster}}" alt="" style="height: 313px ; width: 100%">
                    </div>
                </div>

                <div class="padd-box-sm">
                    <header class="post-header text-center">
                        <h1 class="post-title entry-title text-upper">{{$article->title}}</h1>

                        <div class="post-header-info">
											<span class="posted-on">
												<span class="screen-reader-text">ارسال در </span>
												<a href="#" rel="bookmark">
													<time class="post-date published"
                                                          datetime="{{$article->created_at}}">{{jdate($article->created_at)->format('d M Y')}}</time>
													<time class="post-date updated"
                                                          datetime="{{$article->updated_at}}">{{jdate($article->updated_at)->format('d M Y')}}</time>
												</a>
											</span>
                            <span class="post-author vcard">، توسط  <a class="url fn n" href="#"
                                                                       rel="author">{{$article->user->name}}</a></span>
                        </div>
                    </header>

                    <div class="post-content entry-content editor clearfix clear-mrg">
                        @if($article->is_active == 1)
                            {!! $article->body !!}
                        @else
                            <p class="text-center text-danger">این مقاله قابل نمایش نیست</p>
                        @endif

                    </div>

                    <footer class="post-footer">
                        <div class="post-footer-top brd-btm">
                            <div class="post-footer-info">
												<span class="post-cat-links">
													<span class="screen-reader-text">دسته ها</span>
													 @foreach($article->category()->get() as $item)
                                                        <a href="{{route('blog' ,['cateogry' => $item->slug ])}}"
                                                           rel="category tag">{{$item->title}}</a> @if(!$loop->last)
                                                            ،
                                                        @endif
                                                    @endforeach
												</span>
                                <span class="post-line">|</span>
                                <a href="" class="post-comments-count">{{$article->comments()->count()}} دیدگاه</a>
                            </div>
                        </div>

                        <div class="post-footer-btm">
                            <div class="post-tags">
                                <span class="screen-reader-text">برچسب ها </span>
                                @if($article->is_active == 1)
                                    @foreach(explode(',' , $article->keyword) as $item)
                                        <a href="#" title="{{$item}}" rel="tag">{{$item}}</a>
                                    @endforeach
                                @else
                                    <p class="text-center text-danger">برپسب های این مقاله قابل نمایش نیست</p>
                                @endif


                            </div>
                        </div>
                    </footer>
                </div>
            </article><!-- .post -->

            <nav class="post-nav" role="navigation">
                <div class="padd-box-sm brd-btm">
                    <h2 class="screen-reader-text">سایر مطالب</h2>
                    @php
                        $next = \App\Models\Articles::whereid($article->id - 1)->first() ?? $article;
                        $pervis = \App\Models\Articles::whereid($article->id + 1)->first() ?? $article;
                    @endphp
                    <div class="row">
                        <div class="col-sm-5 col-xs-6">
                            <div class="post-nav-prev">
                                <a href="{{route('single' , $pervis->slug)}}" rel="prev">
                                    <span class="text-left text-muted">مقاله قبلی</span>
                                    <figure><img src="{{$pervis->poster}}" alt="{{$pervis->title}}"
                                                 style="width: 225px ; height: 126px"></figure>
                                    <strong class="text-upper text-center">{{$pervis->title}}</strong>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-5 col-sm-offset-2 col-xs-6">
                            <div class="post-nav-next">
                                <a href="{{route('single' , $next->slug)}}" rel="next">
                                    <span class="text-right text-muted">مقاله بعدی</span>
                                    <figure><img src="{{$next->poster}}" alt="{{$next->title}}"></figure>
                                    <strong class="text-upper text-center">{{$next->title}}</strong>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav><!-- .post-nav -->
{{--            <div wire:init="load">--}}
{{--                @if($readyToLoad)--}}
                    <div id="comments" class="comments-area">
                        <h2 class="title text-upper">دیدگاه‌ها</h2>
                        @if($article->is_active == 1)
                            @if(!$this->article->comments()->where('parent_id', null)->count())
                                <br><br>
                                <span>اولین نفری باشید که نظر میگذارید</span>
                                <br><br>

                            @endif
                            <div class="padd-box-sm">
                                <ol class="comment-list clear-list">
                                    @foreach($this->article->comments()->where('parent_id', null)->where('approved' , 1)->get() as $comment)
                                        <li class="comment bypostauthor">
                                            <article class="comment-body">
                                                <header class="comment-header">
                                                    <div class="comment-author vcard">
                                                        <img alt=""
                                                             src="@if($comment->user and $comment->user->issuperuser()) {{\App\Models\info_basic::find(1)->img}} @else /assets/images/uploads/avatar/avatar-58x58-default.png @endif"
                                                             srcset="@if($comment->user and $comment->user->issuperuser()) {{\App\Models\info_basic::find(1)->img}} @else /assets/images/uploads/avatar/avatar-58x58-default.png @endif 2x"
                                                             class="avatar avatar-58 photo"
                                                             style="width: 58px;height: 58px">
                                                        <strong
                                                            @if($comment->user and $comment->user->issuperuser()) class="fn" @endif><a
                                                                onclick="event.preventDefault()" rel="external nofollow"
                                                                class="url">{{$comment->name}} </a></strong>
                                                    </div>

                                                    <div class="comment-date">
                                                        در <a onclick="event.preventDefault()">
                                                            <time
                                                                datetime="{{$comment->created_at}}">{{jdate($comment->created_at)->format('d M Y h:i')}}
                                                            </time>
                                                        </a>
                                                    </div>
                                                </header>

                                                <div class="comment-content clear-mrg">
                                                    <p>
                                                        {{$comment->comment}}
                                                    </p>
                                                </div>

                                                <footer class="comment-footer">
                                                    @if($comment->child()->count())
                                                        <div class="comment-replys-count">
                                                            <a rel="nofollow" class="comment-replys-link"
                                                               onclick="event.preventDefault()"
                                                               aria-label="Replys to Mr {{$comment->name}}">{{$comment->child()->count()}}
                                                                پاسخ</a>
                                                        </div>
                                                    @endif

                                                    <div class="comment-links">
                                                        <a class="comment-reply-link" rel="nofollow"  onclick="comment_answer({{$comment->id}});event.preventDefault()"
                                                           aria-label="Reply to Mr {{$comment->name}}">پاسخ</a>
                                                    </div>
                                                    <div class="comment-answer" id="comment_{{$comment->id}}">
                                                        <livewire:comment.send :obj="$article" :status="0" :commentable_type="get_class($article)"
                                                                               :commentable_id="$article->id" :parent_id="$comment->id" />
                                                    </div>
                                                </footer>
                                            </article><!-- .comment-body -->

                                            @if($comment->child())
                                                <ol class="children clear-list">
                                                    @foreach($comment->child()->get() as $child)
                                                        <li class="comment">
                                                            <article class="comment-body">
                                                                <header class="comment-header">
                                                                    <div class="comment-author vcard">
                                                                        <img alt=""
                                                                             src="@if($child->user and $child->user->issuperuser()) {{\App\Models\info_basic::find(1)->img}} @else /assets/images/uploads/avatar/avatar-58x58-default.png @endif"
                                                                             srcset="assets/images/uploads/avatar/avatar-116x116-default-2x.jpg 2x"
                                                                             class="avatar avatar-58 avatar-default photo"
                                                                             style="width: 58px;height: 58px">

                                                                        <strong
                                                                            @if($child->user and $child->user->issuperuser()) class="fn" @endif><a
                                                                                onclick="event.preventDefault()"
                                                                                rel="external nofollow"
                                                                                class="url">{{$child->name}}
                                                                            </a></strong>
                                                                    </div>

                                                                    <div class="comment-date">
                                                                        در <a onclick="event.preventDefault()">
                                                                            <time
                                                                                datetime="{{$child->created_at}}">{{jdate($child->created_at)->format('d M Y h:i')}}

                                                                            </time>
                                                                        </a>
                                                                    </div>
                                                                </header>

                                                                <div class="comment-content clear-mrg">
                                                                    <span style="color: #0d6efd">@ {{$comment->name }}</span>
                                                                    <p>{{$child->comment}}</p>
                                                                </div>

                                                                <footer class="comment-footer">
                                                                    <div class="comment-links">
                                                                        <a class="comment-reply-link" rel="nofollow"
                                                                           onclick="comment_answer({{$child->id}});event.preventDefault()"
                                                                           aria-label="Reply to Mr WordPress">پاسخ</a>
                                                                    </div>
                                                                    <div class="comment-answer" id="comment_{{$child->id}}">
                                                                        <livewire:comment.send :obj="$article" :status="0" :commentable_type="get_class($article)"
                                                                                               :commentable_id="$article->id" :parent_id="$child->id" />
                                                                    </div>
                                                                </footer>
                                                            </article><!-- .comment-body -->

                                                            @if($child->child())
                                                                @foreach($child->child()->get() as $chi)
                                                                    @include('layouts.comment' , ['comment' => $chi])
                                                                @endforeach
                                                            @endif
                                                        </li><!-- .comment -->

                                                    @endforeach
                                                </ol><!-- .children -->
                                            @endif
                                        </li><!-- .comment -->

                                    @endforeach
                                </ol><!-- .comment-list -->
                            </div><!-- .padd-box-sm -->
                        @else
                            <p class="text-center text-danger">نظرات این مقاله قابل نمایش نیست</p>
                        @endif



                    </div><!-- #comments -->
{{--                @endif--}}
{{--            </div>--}}

            <!-- Post Form: Logged In -->


            <!-- Post Form: Logged Out -->
            @if($article->is_active == 1)
                <livewire:comment.send :obj="$article" :status="1" :commentable_type="get_class($article)"
                                       :commentable_id="$article->id"  />
            @endif


        </div>
        <!-- .crt-paper-cont -->
    </div>
    <script>

        function comment_answer(id) {
            $(`#comment_${id}`).toggleClass('active')
        }

        document.addEventListener('livewire:load', () => {
            Livewire.on('comment_answer', (id) => {
                $(`#comment_${id}`).toggleClass('active')
                console.log('h')
            })
        })
    </script>
    <style>
        .comment-answer {
            display: none;
            transition: all 2s;
        }

        .comment-answer.active {
            display: block;
            transition: all 2s;
        }
    </style>
    <!-- .crt-paper -->
</div>
