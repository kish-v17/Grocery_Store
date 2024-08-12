

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

if(choice){

    choice.addEventListener('change',()=>{
        if(choice.checked){
            document.querySelector('.js-shipping-details').classList.remove('invisible');
        }
        else{
            document.querySelector('.js-shipping-details').classList.add('invisible');
        }
    });
}


//cart page - to change the quantity of the certain cart item
const quantityModifier = Array.from(document.getElementsByClassName('qty-mod'));

if(quantityModifier && quantityModifier.length>0){
    quantityModifier.forEach(function(qtyMod){
        const minusButton =qtyMod.children[0]; 
        const plusButton = qtyMod.children[2];
        const input = qtyMod.children[1];
        minusButton.addEventListener('click',function(){
            if(input.value==1){
                input.setAttribute('disabled','true');
                minusButton.setAttribute('disabled','true');
            }
            else{
                if(input.hasAttribute('disabled'))
                    input.removeAttribute('disabled');
                if(plusButton.hasAttribute('disabled'))
                    plusButton.removeAttribute('disabled');
                input.value = parseInt(input.value)-1;
            }
        });
        plusButton.addEventListener('click',function(){
            if(input.value==10){
                input.setAttribute('disabled','true');
                plusButton.setAttribute('disabled','true');
            }
            else{
                if(input.hasAttribute('disabled'))
                    input.removeAttribute('disabled');
                if(minusButton.hasAttribute('disabled'))
                    minusButton.removeAttribute('disabled');
                input.value = parseInt(input.value)+1;
            }
        });
    });
}

// product details page
function selectQuantity(selectedDiv, value) {
    const quantities = document.querySelectorAll('.quantity div');
    quantities.forEach(div => {
        div.classList.remove('selected');
    });
    selectedDiv.classList.add('selected');
    document.getElementById('selectedQuantity').value = value;
}

gsap.to("#navibar",{
    backgroundColor : '#3ED48E',
    duration:0.1,
    scrollTrigger:{
        trigger:'#navibar',
        scroll:'body',
        start:'6%',
        end:'5%',
        scrub:1,
    }
})
gsap.to("nav .nav-link , .active, .logo ",{
    color:"#fff",
    scrollTrigger:{
        scroll:'body',
        start:'2%',
        end:'1%',
        scrub:1,
    }
})

gsap.to(".btn",{
    backgroundColor:"#fff",
    color:"#198754",
    borderColor:"#fff",
    scrollTrigger:{
        scroll:'body',
        start:'2%',
        end:'1%',
        scrub:1,
    }
})