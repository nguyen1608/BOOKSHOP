const fileImg = document.querySelector('.custom-file-input');
console.log(fileImg);
const img = document.querySelectorAll('.img-avt');
fileImg.addEventListener("change", () => {

    img.src = URL.createObjectURL(fileImg.files[0]);
});
