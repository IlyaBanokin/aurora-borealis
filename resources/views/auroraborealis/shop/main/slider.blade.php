@if(count($sliderItems) > 0)

    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>    <!-- SLIDE  -->
                @foreach($sliderItems as $slider)
                    <li data-transition="slidehorizontal" data-slotamount="1" data-masterspeed="600">
                        <!-- MAIN IMAGE -->
                        <img src="{{ asset(env('THEME')) }}/img/{{ $slider->img }}" style="background-color:#fea501"
                             alt="" data-bgfit="cover"
                             data-bgposition="center bottom" data-bgrepeat="no-repeat">
                        <!-- LAYERS NR. 1 -->
                        <div class="tp-caption lfl"
                             data-x="left"
                             data-y="100"
                             data-speed="800"
                             data-start="1200"
                             data-easing="Power4.easeOut"
                             data-endspeed="300"
                             data-endeasing="Linear.easeNone"
                             data-captionhidden="off">
                        </div>
                        <!-- LAYERS NR. 2 -->
                        <div class="tp-caption lfr large_bold_grey heading white"
                             data-x="right" data-hoffset="-10"
                             data-y="120"
                             data-speed="800"
                             data-start="2000"
                             data-easing="Power4.easeOut"
                             data-endspeed="300"
                             data-endeasing="Linear.easeNone"
                             data-captionhidden="off">{{ $slider->title }}
                        </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption whitedivider3px customin customout tp-resizeme"
                             data-x="right" data-hoffset="-20"
                             data-y="210" data-voffset="0"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="700"
                             data-start="2300"
                             data-easing="Power3.easeInOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="500"
                             style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;">&nbsp;
                        </div>
                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption finewide_verysmall_white_mw white customin customout tp-resizeme text-right paragraph"
                             data-x="right" data-hoffset="-10"
                             data-y="220"
                             data-customin="x:0;y:50;z:0;rotationX:-120;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 0%;"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="1000"
                             data-start="3500"
                             data-easing="Power3.easeInOut"
                             data-splitin="lines"
                             data-splitout="lines"
                             data-elementdelay="0.2"
                             data-endelementdelay="0.08"
                             data-endspeed="300"
                             style="z-index: 10; max-width: auto; max-height: auto; white-space: nowrap;">{{ $slider->description }}
                        </div>
                    </li>
                @endforeach
            </ul>
            <!-- Banner Timer -->
            <div class="tp-bannertimer"></div>
        </div>
    </div>
@endif
