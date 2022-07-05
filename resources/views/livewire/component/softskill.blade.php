<div id="portfolio" class="crt-paper-layers crt-animate">
    <div class="crt-paper clearfix">

        <div class="crt-paper-cont paper-padd clear-mrg">

            <!-- Chart -->
            <div class="padd-box-sm"> <h2 class="title-lg text-upper">مهارت های نرم</h2>
                <div class="row">
                    <div class="col-sm-12">
                        @foreach($skills as $skill)
                            <div class="progress-line crt-animate" role="progressbar" aria-valuenow="{{$skill->percent}}" aria-valuemin="0" aria-valuemax="100">
                                <strong class="progress-title">{{$skill->title}}</strong>
                                <div class="progress-bar" data-text="{{$skill->percent}}%" data-value="0.{{$skill->percent}}"></div>
                            </div><!-- .progress-line -->
                        @endforeach
                    </div><!-- .col-sm-6 -->
                </div><!-- .row -->
            </div><!-- .padd-box-sm -->
            <!-- .section -->

        </div>
        <!-- .crt-paper-cont -->
    </div>
    <!-- .crt-paper -->
</div>
