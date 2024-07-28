const second = document.querySelector('#redirect')  
 const linkHome = document.querySelector('#linkHome').getAttribute("href");
 
 var timeLeft = 3;
second.innerHTML = "Chuyển trang trong " + timeLeft + " seconds.";

   window.setInterval(function timeCount() {
     timeLeft -= 1;
     second.innerHTML =  "Chuyển trang trong " + timeLeft + " seconds..";

     if (timeLeft == 0) {
         clearInterval(timeCount);
         window.location= linkHome;
     }
 }, 1000)