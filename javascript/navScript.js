var mobileDropdowns =  document.querySelectorAll('.mobile-dropdown-button');

  for (i = 0; i < mobileDropdowns.length; i++) {
    mobileDropdowns[i].addEventListener("click", function() {

    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

  function openNav(){
      document.querySelector('#panel').style.width= '45%';
  }
  
  function closeNav(){
    document.getElementById('panel').style.width= '0';
  }