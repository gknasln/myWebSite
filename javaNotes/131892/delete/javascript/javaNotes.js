var container = document.querySelector('.theCenter');
var searchField = document.querySelector('.text-container input[type=text]');
var filterPanel = document.querySelector('.filter-panel');
var searchAtNameAnDescription = filterPanel.querySelector('#search-at-name');
var searchAtClass = filterPanel.querySelector('#search-at-class');
var filterButton = document.querySelector('.filter-button');
var noteFrame = document.querySelector('.center');

var minHeight = screen.height*0.6;
// const minWidth = screen.width*0.6;

document.body.style.minHeight = minHeight + "px";
// document.body.style.minWidth = minWidth + "px";
 

filterButton.addEventListener('click', function() { 
  if(filterPanel.classList.value.includes('show-filter-panel')){
    closeFilterPanel();
  }else{
    openFilterPanel();
  }
});


function openFilterPanel(){ 
  filterPanel.classList.add('show-filter-panel');
  setTimeout(function() {
    filterPanel.classList.add('animate-filter-panel'); 
  }, 100);
}

function closeFilterPanel(){
  filterPanel.classList.remove('animate-filter-panel'); 
  setTimeout(function() {
    filterPanel.classList.remove('show-filter-panel');
  }, 500);
}



//if entered keys are bigger than 3 and use is not pushing to white space search method will be called
function keyAction(e){
  const val = searchField.value.trim();  
  if( val.length  > 2 && e.key === 'Enter'){ 
    var nameValue, classValue;
    if(searchAtNameAnDescription.checked){
      nameValue = 1;
    }else{
      nameValue = 0;
    }
    if(searchAtClass.checked){
      classValue = 1;
    }else{
      classValue = 0;
    } 
    noteFrame.src = "./noteFrame.php?key=" + searchField.value + "&class=" + classValue + "&nameAndDescription=" + nameValue; 
  }
}

searchField.addEventListener('keyup', keyAction);

