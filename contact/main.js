

function initMap() { 
  var besiktas = {lat: 41.066325, lng: 29.004334}; 
  var map = new google.maps.Map(
    document.querySelector('.google-map'), {zoom: 18, center: besiktas}); 
    var marker = new google.maps.Marker({position: besiktas, map: map});
  } 
  
  setTimeout(() => {
    window.scrollTo(0, 100);
  }, 300);