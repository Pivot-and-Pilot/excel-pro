(function(){

    if(document.getElementById('button_register')){

        document.getElementById('button_register').addEventListener('click', function(){

            if(document.getElementById('customer_login').classList.toggle('state-register')){

              this.dataset.text = "Login";

              this.children[0].textContent = "Login";

            } else {

              this.children[0].textContent = "Register";

              this.dataset.text = "Register"

            }


        });

    }

})();