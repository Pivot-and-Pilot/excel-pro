(function(){

    var curTimelineIndex = 0;
    const timeline = document.getElementById('timeline');
    const timelineEvents = document.querySelectorAll('.m-timeline > .l-container > .text-closer');
    const timelineRight = document.getElementById('timeline-right');
    const timelineLeft = document.getElementById('timeline-left');

    timelineRight.addEventListener('click', function(){

        if(window.innerWidth < 768){

            if(curTimelineIndex < timelineEvents.length - 1){

                curTimelineIndex = curTimelineIndex + 1;

                goToIndex(curTimelineIndex);

                timelineLeft.classList.remove('s-hidden');

                if(curTimelineIndex === timelineEvents.length - 1){

                    this.classList.add('s-hidden');

                }

            }

        } else {

            if(curTimelineIndex < timelineEvents.length - 2){

                curTimelineIndex = curTimelineIndex + 1;

                goToIndex(curTimelineIndex);

                timelineLeft.classList.remove('s-hidden');

                if(curTimelineIndex === timelineEvents.length - 2){

                    this.classList.add('s-hidden');

                }


            }

        }

    });


    timelineLeft.addEventListener('click', function(){

        if(curTimelineIndex > 0) {

            curTimelineIndex = curTimelineIndex - 1;

            goToIndex(curTimelineIndex);

            timelineRight.classList.remove('s-hidden');

            if(curTimelineIndex === 0){

                this.classList.add('s-hidden');

            }

        }

    });

    function goToIndex(index){

        const container = document.querySelector('.l-container');

        const margin = parseInt(window.getComputedStyle(container, null).getPropertyValue('margin-left'));

        const newTimelineScroll = timeline.scrollLeft + timelineEvents[index].getBoundingClientRect().left - margin;

        scrollToX('timeline', newTimelineScroll, 100, 'easeInOutSine');

    }


    // document.getElementById('button_backward').addEventListener('click', function(){

    //     if(curTimelineIndex === 1){

    //         this.classList.remove('state-active');

    //     }

    //     if(timelineEvents[curTimelineIndex - 1]){

    //         const s = document.querySelector('.slider-horizontal-inner');

    //         const p = window.getComputedStyle(s, null).getPropertyValue('padding-left');

    //         const pInt = parseInt(p);

    //         curTimelineIndex = curTimelineIndex - 1;

    //         const newScroll = s.scrollLeft + timelineEvents[curTimelineIndex].getBoundingClientRect().left - pInt;

    //         scrollToX('slider_horizontal_inner', newScroll, 100, 'easeInOutSine');

    //         document.getElementById('button_forward').classList.remove('state-hidden');

    //     }

    // });


    window.requestAnimFrame = (function(){
      return  window.requestAnimationFrame       ||
              window.webkitRequestAnimationFrame ||
              window.mozRequestAnimationFrame    ||
              function( callback ){
                window.setTimeout(callback, 1000 / 60);
              };
    })();


    function scrollToX(scrollTargetId, scrollTargetX, speed, easing) {
        // scrollTargetX: the target scrollX property of the window
        // speed: time in pixels per second
        // easing: easing equation to use

        const sTarget = document.getElementById(scrollTargetId);

        var scrollX = sTarget.scrollLeft,
            scrollTargetX = scrollTargetX || 0,
            speed = speed || 2000,
            easing = easing || 'easeOutSine',
            currentTime = 0;

        // min time .1, max time .8 seconds
        var time = Math.max(.1, Math.min(Math.abs(scrollX - scrollTargetX) / speed, .8));

        // easing equations from https://github.com/danro/easing-js/blob/master/easing.js
        var easingEquations = {
            easeOutSine: function (pos) {
                return Math.sin(pos * (Math.PI / 2));
            },
            easeInOutSine: function (pos) {
                return (-0.5 * (Math.cos(Math.PI * pos) - 1));
            },
            easeInOutQuint: function (pos) {
                if ((pos /= 0.5) < 1) {
                    return 0.5 * Math.pow(pos, 5);
                }
                return 0.5 * (Math.pow((pos - 2), 5) + 2);
            }
        };

        // add animation loop
        function tick() {
            currentTime += 1 / 60;

            var p = currentTime / time;
            var t = easingEquations[easing](p);

            if (p < 1) {
                requestAnimFrame(tick);
                sTarget.scrollLeft = scrollX + ((scrollTargetX - scrollX) * t);
            } else {
                sTarget.scrollLeft = scrollTargetX;
            }
        }

        // call it once to get started
        tick();
    }

})();