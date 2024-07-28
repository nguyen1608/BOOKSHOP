let inputDetail = document.getElementById('input-detail');
let augment = document.getElementById('augment');
let abatement = document.getElementById('abatement');

augment.addEventListener('click', function(){
    inputDetail.value++;

})
abatement.addEventListener('click', function(){
    inputDetail.value--;
    if(inputDetail.value < 1){
        inputDetail.value = 1
    }
})