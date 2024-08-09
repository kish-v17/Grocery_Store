

// account page
const menuItems = document.querySelectorAll('.menu-item');
menuItems.forEach(menuItem=>{
    
    menuItem.addEventListener('click',function(){
        const id = this.dataset.id;
        document.querySelector('#'+id).classList.remove('invisible');
        this.classList.add('active');
        menuItems.forEach(menuItem2=>{
          menuItem2.classList.add('active');
            if(id!=menuItem2.dataset.id){
                document.querySelector('#'+menuItem2.dataset.id).classList.add('invisible'); 
                menuItem2.classList.remove('active');
            }
        });
    });
});
//for printing my profile section by default on account page
const profile = document.querySelector('#my-profile');
if(profile)
    profile.classList.remove('invisible');


//checkout page - different shipping address feature
const choice = document.querySelector('#choice');

choice.addEventListener('change',()=>{
    if(choice.checked){
        document.querySelector('.js-shipping-details').classList.remove('invisible');
    }
    else{
        document.querySelector('.js-shipping-details').classList.add('invisible');
    }
});