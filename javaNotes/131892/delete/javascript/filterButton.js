var filterButton = document.querySelector('.filter-button');


filterButton.onmouseover = function(){
  filterButton.classList.add('hover');
}

filterButton.onmouseout = function(){
  filterButton.classList.remove('hover');
}

filterButton.onclick = function(){
  if(filterButton.classList.value.includes('active')){
     filterButton.classList.remove('active');
     setTimeout(function(){
       filterButton.classList.remove('hide');
     },500);
  }else{
    filterButton.classList.add('active');
    filterButton.classList.add('hide');
  }
}
  