(function(){
    
    const e = document.getElementsByClassName('js-load');

    window.addEventListener('load', function(){

        for(var i = 0; i < e.length; i++){

            e[i].classList.add('js-loaded');

            if(e[i].offsetTop < window.scrollY + window.innerHeight){

                setTimeout((function(){
                
                    this.classList.add('js-visible');
                
                }).bind(e[i]),1500);

            }

        }

    });

    window.addEventListener('scroll', function(){

        for(var i = 0; i < e.length; i++){

            if(e[i].offsetTop + e[i].clientHeight < window.scrollY + window.innerHeight){

                e[i].classList.add('js-visible');

            }

        }

    });

})();