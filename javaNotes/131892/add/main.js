var contentField = document.getElementById('content-field');


document.getElementById('red-button').onclick = function(e){
  e.preventDefault();
  setSelection('red');
}

document.getElementById('blue-button').onclick = function(e){
  e.preventDefault();
  setSelection('blue');
}

document.getElementById('green-button').onclick = function(e){
  e.preventDefault();
  setSelection('green');
}

document.getElementById('bold-button').onclick = function(e){
  e.preventDefault();
  setSelection('b');
}

document.getElementById('underline-button').onclick = function(e){
  e.preventDefault();
  setSelection('u');
}

document.getElementById('overline-button').onclick = function(e){
  e.preventDefault();
  setSelection('strike');
}


contentField.addEventListener('keydown', function(e){
  if(e.altKey && e.key == 'Enter'){
    // setSelection("code");
    console.log(contentField.value.includes('\r'));
  }
  if(e.ctrlKey && e.key == 'b'){
    setSelection("b");
  }

  if(e.ctrlKey && e.key == 'i'){
    setSelection("i");
  } 

});



function setSelection(tagName){
  var start = contentField.selectionStart;
  var end = contentField.selectionEnd;
  var selectedLength = end - start;
  if(selectedLength == 0) return; 
  var firstPart = contentField.value.substr(0, start);
  var rest = contentField.value.substr(start);
  var newText = firstPart + "<" + tagName + ">" + 
      rest.substr(0, selectedLength) + "</" + tagName  + ">" + rest.substr(selectedLength);
  contentField.value = newText;
}