<div id="job" class="crt-paper-layers crt-animate">
    <div class="crt-paper clearfix">
        <div class="crt-paper-cont paper-padd clear-mrg">

            <section class="section padd-box">
                <h2 class="title-lg text-upper padd-box">نمونه‌کارها</h2>

                <div class="pf-wrap">

                    <div class="pf-grid">
                        <div class="pf-grid-sizer"></div><!-- used for sizing -->
                       @foreach($jobs as $job )
                        <div class="pf-grid-item bg-light" style="background: #fff;border: 1px solid black;box-shadow: 0 .75rem .5rem rgba(0,0,0,.5)">
                            <a class="pf-project" href="#pf-popup-{{$loop->index}}">
                                <figure class="pf-figure">
                                    <img src="{{$job->poster}}" alt="{{$job->title}}" style="height: 280px">
                                </figure>

                                <div class="pf-caption text-center">
                                    <div class="valign-table">
                                        <div class="valign-cell">
                                            <h2 class="pf-title">{{$job->title}}</h2>

{{--                                            <div class="pf-text clear-mrg">--}}
{{--                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>--}}
{{--                                            </div>--}}

                                            <button class="pf-btn btn btn-primary">مشاهده بیشتر</button>
                                        </div>
                                    </div>
                                </div>
                            </a><!-- .pf-project -->

                            <div id="pf-popup-{{$loop->index}}" class="pf-popup clearfix">
                                <div class="pf-popup-col1">
                                    <div class="pf-popup-media cr-slider" data-init="none">
                                        <div class="pf-popup-embed">
                                            <img src="{{$job->screen_shot}}" alt="" />
                                        </div>
                                    </div>
                                </div><!-- .pf-popup-col1 -->

                                <div class="pf-popup-col2">
                                    <div class="pf-popup-info">
                                        <h2 class="pf-popup-title">{{$job->title}}</h2>

                                        <div class="text-muted"><strong>طراحی / توسعه</strong></div>

                                        <dl class="dl-horizontal">
                                            <dt>تاریخ:</dt>
                                            <dd>{{$job->time_end}}</dd>

                                            <dt>لینک سایت:</dt>
                                            <dd><a href="{{$job->link}}">{{$job->link}}</a></dd>

                                            <dt>مشتری:</dt>
                                            <dd>{{$job->customer}}</dd>
                                        </dl>

                                       <div style="max-height: 300px;overflow-y: scroll; ">
                                           {!! $job->body !!}
                                       </div>
                                    </div><!-- .pf-popup-info -->


                                </div><!-- .pf-popup-col2 -->
                                <div class="pf-popup-col2">
                                    <div class="btn-group">
                                        @foreach($job->skills as $skill)
                                        <button class="btn @if($loop->index / 2 == 0) btn-default @else btn-light @endif">{{$skill->title}}</button>
                                        @endforeach
                                    </div>
                                </div>

                            </div><!-- .pf-popup -->
                        </div><!-- .pf-grid-item -->
                        @endforeach
                    </div><!-- .pf-grid -->
                </div><!-- .pf-wrap -->
            </section>
            <!-- .section -->

        </div>
        <!-- .crt-paper-cont -->
    </div>
    <!-- .crt-paper -->
</div>
