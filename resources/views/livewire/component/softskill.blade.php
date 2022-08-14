<div id="portfolio" class="crt-paper-layers crt-animate">
    <div class="crt-paper clearfix">

        <div class="crt-paper-cont paper-padd clear-mrg">

            <!-- Chart -->
            <div class="padd-box-sm"> <h2 class="title-lg text-upper">مهارت های نرم</h2>
                <div class="row">
                    <div class="col-sm-12">
                        @foreach($skills as $skill)
                            <button class="btn btn-upper btn-primary mb-2">{{$skill->title}}</button>

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
