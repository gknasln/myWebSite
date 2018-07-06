var contentField = document.getElementById('content-field');

contentField.addEventListener('keydown', function(e){
  if(e.altKey && e.key == 'Enter'){
    contentField.value += "<hr/>";
  } 
});