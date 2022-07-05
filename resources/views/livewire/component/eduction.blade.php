<div id="eduction" class="crt-paper-layers crt-animate">
    <div class="crt-paper clearfix">
        <div class="crt-paper-cont paper-padd clear-mrg">

            <section class="section padd-box">
                <h2 class="title-lg text-upper">تحصیلات</h2>
                <div class="education">

                    @foreach($eductions as $eduction)

                        <div class="education-box">
                            <time class="education-date" datetime="2014-01T2016-03">
                                <span>{{$eduction->start}} - {{$eduction->end}}</span>
                            </time>
                            <h3>{{$eduction->title}}</h3>
                            <span class="education-company">{{$eduction->company}}</span>
                            <p>
                                {{$eduction->body}}
                            </p>
                            @if($eduction->img)
                                <a href="{{$eduction->img}}">برای مشاهده تصویر مدرک کلیک کنید</a>
                            @endif
                        </div>
                    @endforeach
                    <!-- .education-box -->


                </div>
                <!-- .education -->
            </section>
            <!-- .section -->

        </div>
        <!-- .crt-paper-cont -->
    </div>
    <!-- .crt-paper -->
</div>
