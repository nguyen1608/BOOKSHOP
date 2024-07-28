const img = document.querySelector('.img-avt');
const input = document.querySelector('.custom-file-input');

input.addEventListener('change', ()=>{
    img.src = URL.createObjectURL(input.files[0]);
})
