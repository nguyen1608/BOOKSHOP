const deleteBtn = document.querySelector('#myLink');
const updateBtn = document.querySelector('#updateCart');
deleteBtn.addEventListener('click', function(e){
  e.preventDefault()
    swal({
        title: "Bạn có chắc không?",
        text: "Cuốn sách này sẽ bị xóa khỏi giỏ hàng của bạn!",
        icon: "warning",
        buttons: ["No", "Yes"],
      })
      .then((willDelete) => {
        if (willDelete) {
          // Thực thi khi chọn Yes
          swal("Your file has been deleted!", {
            icon: "success",
          });
        } else {
          // Thực thi khi chọn No
          swal("Your file is safe!");
        }
      });
})
