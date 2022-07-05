<div id="work" class="crt-paper-layers crt-animate">
    <div class="crt-paper clearfix">
        <div class="crt-paper-cont paper-padd clear-mrg">

            <section class="section padd-box">
                <h2 class="title-lg text-upper">تجربه کاری</h2>
                <div class="education">

                    @foreach($works as $work)

                        <div class="education-box">
                            <time class="education-date" datetime="2014-01T2016-03">
                                <span>{{$work->start}} - {{$work->end}}</span>
                            </time>
                            <h3>{{$work->title}}</h3>
                            <span class="education-company">{{$work->company}}</span>
                            <p>
                                {{$work->body}}
                            </p>
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
