const augment = document.querySelector(".augment"); // -
const abatement = document.querySelector(".abatement"); // +
const spanCart = document.querySelector(".span-cart");
let spanCartValue = parseInt(spanCart.textContent);
abatement.addEventListener("click",function() {
    if(abatement) {
        abatement++;
        spanCart.textContent = spanCartValue;
    }
})
augment.addEventListener("click",function() {
    if(augment) {
        if(spanCartValue < 0) {
            return 0;
        }
        spanCartValue--;
        spanCart.textContent = spanCartValue;
    }
})



// const up = document.querySelector(".up");
// const down = document.querySelector(".down");
// const number = document.querySelector(".number");
// let numberValue = parseInt(number.textContent);
// up.addEventListener("click",function(){
//     if(numberValue >= 10) return;
//     numberValue++;
//     number.textContent = numberValue;
// })
// down.addEventListener("click",function(){
//     if(numberValue <= 0) return 0;
//     numberValue--;
//     number.textContent = numberValue;
// })