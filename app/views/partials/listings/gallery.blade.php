<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 800px;
        height: 456px; background: #191919; overflow: hidden; margin: 20px 0 20px; 0">

    <!-- Loading Screen -->
    <div u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
        </div>
        <div style="position: absolute; display: block; background: url({{ URL::asset('images/jssor/img/loading.gif'); }}) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
        </div>
    </div>

    <!-- Slides Container -->
    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 800px; height: 356px; overflow: hidden;">
        @foreach ($listing->photos as $photo)
        <div>
            <img u="image" src="{{ $photo->path() }}" />
            <img u="thumb" src="{{ $photo->path() }}" />
        </div>
        @endforeach
    </div>

    <!-- Arrow Navigator Skin Begin -->
    <style>
        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l              (normal)
        .jssora05r              (normal)
        .jssora05l:hover        (normal mouseover)
        .jssora05r:hover        (normal mouseover)
        .jssora05ldn            (mousedown)
        .jssora05rdn            (mousedown)
        */
        .jssora05l, .jssora05r, .jssora05ldn, .jssora05rdn
        {
            position: absolute;
            cursor: pointer;
            display: block;
            /*background: url(../img/a17.png) no-repeat;*/


            background: url({{ URL::asset('images/jssor/img/a17.png'); }}) no-repeat;
            overflow:hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05ldn { background-position: -250px -40px; }
        .jssora05rdn { background-position: -310px -40px; }
    </style>
    <!-- Arrow Left -->
        <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 158px; left: 8px;">
        </span>
    <!-- Arrow Right -->
        <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 158px; right: 8px">
        </span>
    <!-- Arrow Navigator Skin End -->

    <!-- Thumbnail Navigator Skin Begin -->
    <div u="thumbnavigator" class="jssort01" style="position: absolute; width: 800px; height: 100px; left:0px; bottom: 0px;">
        <!-- Thumbnail Item Skin Begin -->
        <style>
            /* jssor slider thumbnail navigator skin 01 css */
            /*
            .jssort01 .p           (normal)
            .jssort01 .p:hover     (normal mouseover)
            .jssort01 .pav           (active)
            .jssort01 .pav:hover     (active mouseover)
            .jssort01 .pdn           (mousedown)
            */
            .jssort01 .w {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
            }

            .jssort01 .c {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 68px;
                height: 68px;
                border: #000 2px solid;
            }

            .jssort01 .p:hover .c, .jssort01 .pav:hover .c, .jssort01 .pav .c {
                /* background: url(../img/t01.png) center center; */
                background: url({{ URL::asset('images/jssor/img/t01.png'); }}) center center;
                border-width: 0px;
                top: 2px;
                left: 2px;
                width: 68px;
                height: 68px;
            }

            .jssort01 .p:hover .c, .jssort01 .pav:hover .c {
                top: 0px;
                left: 0px;
                width: 70px;
                height: 70px;
                border: #fff 1px solid;
            }
        </style>
        <div u="slides" style="cursor: move;">
            <div u="prototype" class="p" style="position: absolute; width: 72px; height: 72px; top: 0; left: 0;">
                <div class=w><thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
                <div class=c>
                </div>
            </div>
        </div>
        <!-- Thumbnail Item Skin End -->
    </div>
    <!-- Thumbnail Navigator Skin End -->
    <a style="display: none" href="http://www.jssor.com">content slider</a>
</div>
