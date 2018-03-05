jQuery(document).ready(function($) {

    var chapterMeta = [];

    $('#form_errata').on('change', 'select[name="PRODUCT_ID"]', function(){

        // Reset selected chapter in CHAPTER select dropdown and selected section in SECTION dropdown.
        $('select[name="CHAPTER"]').prop('selectedIndex', 0);
        $('select[name="SECTION"]').prop('selectedIndex', 0);

        if($(this).val() !== ''){

            $.post({
                url: '../errata-api',
                data: {
                    PRODUCT_ID: parseInt($(this).val())
                },
                success: function(data){
                    chapterMeta = data;

                    console.log(data);

                    // Enable available chapters in the CHAPTER select dropdown.
                    $('select[name="CHAPTER"] > option').slice(1).css({'display': 'none'});
                    $('select[name="CHAPTER"] > option').slice(0, data.length + 1).css({'display':'block'});

                    // Enable CHAPTER select dropdown.
                    $('select[name="CHAPTER"]').addClass('state-active');

                }
            });

        } else {

            // Disable available chapters in the CHAPTER select dropdown.
            $('select[name="CHAPTER"] > option').slice(0, 1).css({'display': 'none'});

            // Disable CHAPTER select dropdown
            $('select[name="CHAPTER"]').removeClass('state-active');

        }

    });

    $('#form_errata').on('change', 'select[name="CHAPTER"]', function(){

        // Reset selected chapter in CHAPTER select dropdown.
        $('select[name="SECTION"]').prop('selectedIndex', 0);

        if($(this).val() !== ''){

            const chapterIndex = parseInt($(this).val());

            console.log(chapterMeta[chapterIndex].length + 1);

            // Enable available chapters in the SECTION select dropdown.
            $('select[name="SECTION"] > option').slice(1).css({'display': 'none'});
            $('select[name="SECTION"] > option').slice(0, chapterMeta[chapterIndex].length + 1).css({'display':'block'});            

            // Enable SECTION select dropdown.
            $('select[name="SECTION"]').addClass('state-active');

        } else {

            // Disable available chapters in the SECTION select dropdown.
            $('select[name="SECTION"] > option').slice(0, 1).css({'display': 'none'});

            // Disable SECTION select dropdown.
            $('select[name="SECTION"]').removeClass('state-active');

        }

    });


    $('.toggle-errata').on('click', function(){
        $('#page').toggleClass('state-locked');
        $('#section-errata').toggleClass('state-active');
        $('#footer-errata').toggleClass('state-active');
    });

});

// $('select[name="SECTION"]').addClass('state-active');

(function(){

    const f = document.getElementById('footer-errata');
    const n = document.querySelector('.nav-shortcuts');
    const m = document.getElementById('masthead');
    const s = document.querySelector('.section-errata');

    function footerEventHandler(){

        const max_scroll = s.offsetTop + s.clientHeight - parseInt(window.getComputedStyle(s, null).getPropertyValue('padding-bottom')) - (window.innerHeight / 2);

        if(window.scrollY > max_scroll){

            const difference = max_scroll - ( s.offsetTop - n.clientHeight - m.clientHeight );

            window.requestAnimationFrame(footerEventAnimation.bind(this, difference));

        } else if(window.scrollY > ( s.offsetTop - n.clientHeight - m.clientHeight )){

            const difference = window.scrollY - ( s.offsetTop - n.clientHeight - m.clientHeight );

            window.requestAnimationFrame(footerEventAnimation.bind(this, difference));

        } else {

            window.requestAnimationFrame(footerEventAnimation.bind(this, 0));

        }

    }

    function footerEventAnimation(int){

        f.style.transform = "translateY(" + int + "px)";

    }


    window.addEventListener('load', function(){

        if(this.innerWidth > 1024){
            // Desktop Event Listeners
            window.addEventListener('scroll', footerEventHandler);

        } else {

        }

    });


    window.addEventListener('resize', function(){

        if(this.innerWidth > 1024){
            // Remove Mobile Event Listeners

            // Add Desktop Event Listeners
            window.addEventListener('scroll', footerEventHandler);

        } else {
            // Remove Desktop Event Listeners + Reset Animations
            window.removeEventListener('scroll', footerEventHandler);
            footerEventAnimation(0);

            // Mobile Event Listeners
            
        }

    });


})();

