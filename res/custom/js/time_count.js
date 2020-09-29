
  
  function CountDownDate(date) {
    // Set the date we're counting down to
    var countDownDate_value = date; 
    var countDownDate = new Date(countDownDate_value).getTime();
  
    // Update the count down every 1 second
    
  
      // Get today's date and time
      var imgroot = "/assets/land/image/cunter-point.png";
      
      // Find the distance between now and the count down date
      var x = setInterval(function() {
      var now = new Date().getTime();
      var distance = countDownDate - now ;
  
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
      // Display the result in the element with class="counter"
        
      elem = document.getElementsByClassName("counter");
      for (var i = 0; i < elem.length; ++i) {
        elem[i].innerHTML = '<div class="px-3"><div class="digit">'+days+'</div>Дни</div><div class=""><img src="'+imgroot+'"><br/><img src="'+imgroot+'"></div><div class="px-3"><div class="digit">'+hours+'</div>Часы </div><div class=""><img src="'+imgroot+'"><br/><img src="'+imgroot+'"></div><div class="px-3"><div class="digit">'+minutes+'</div>Минуты</div><div class=""><img src="'+imgroot+'"><br/><img src="'+imgroot+'"></div><div class="px-3"><div class="digit">'+seconds+'</div>Секунды</div>';
        elem[i].innerHTML = '<div class="flex">'+
              '<div><span>'+days+'</span>DAYS</div>'+
              '<div><span>'+hours+'</span>HOURS</div>'+
              '<div><span>'+minutes+'</span>MIN</div>'+
              '<div><span>'+seconds+'</span>SEC</div>'+
            '</div';
  
          // If the count down is finished, write some text 
          if (distance < 0) {
            clearInterval(x);
            elem[i].innerHTML = "EXPIRED";
          }
      }
    }, 1000);
  }
  
