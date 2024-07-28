let btnComment = document.querySelector("btn-comment");
let displayPost = document.querySelector("display-post");
displayPost.addEventListener("click",function(){
        if(btnComment.style.display === 'none') {
            btnComment.style.display = "block";
        }else {
            btnComment.style.display = "none";
        }
    })