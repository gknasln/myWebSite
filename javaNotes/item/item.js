var codes = document.querySelectorAll('code');


var isString, word;
for(var i = 0; i < codes.length; i++){
  isString = false;
  word = "";
  var letters = codes[i].innerHTML.split(''); 
  codes[i].innerHTML = ""; 
  for(var j = 0; j < letters.length; j++){ 
    word += letters[j];
    if(letters[j] == '\"' || letters[j] == '\''){ 
      if(!isString){
        isString = true; 
      }else{
        isString = false;
        codes[i].innerHTML += "<span style='color: #b75a35'>" + word + "</span>";
        word = "";
      }
    }
    if(letters[j] == " " && !isString){
      codes[i].innerHTML += paintWord(word);
      word = "";
    }
  }
  if(word != ""){
    codes[i].innerHTML +=   word;
  }
}
/*

    //codes[i].innerHTML = "";
for(var j = 0; j < words.length; j++){ 
      codes[i].innerHTML += paintWord(words[j]) + " ";
    }*/

function paintWord(value){
  var word = value.trim();
  console.log(word);
  if(word.includes("System.out.println")){
    return value.replace("System.out.println", "<b>System.out.println</b>");
  }
  else if(word.includes("System.out.print")){
    return value.replace("System.out.print", "<b>System.out.print</b>");
  }
  else if(word.includes("System.err.println")){
    return value.replace("System.err.println", "<b>System.err.println</b>");
  }
  else if(word.includes("System.err.print")){
    return value.replace("System.err.print", "<b>System.err.print</b>");
  }
  else if(word.includes("byte")){  
    return value.replace("byte", "<span style='color:blue; font-weight: bold;'>byte</span>");
  }
  else if(word.includes("short")){ 
    return value.replace("short", "<span style='color:blue; font-weight: bold;'>short</span>");
  }
  else if(word.includes("int")){
    return  value.replace("int", "<span style='color:blue; font-weight: bold;'>int</span>");
  }
  else if(word.includes("long")){ 
    return value.replace("long", "<span style='color:blue; font-weight: bold;'>long</span>");
  }
  else if(word.includes("float")){ 
    return value.replace("float", "<span style='color:blue; font-weight: bold;'>float</span>");
  }
  else if(word.includes("double")){ 
    return value.replace("double", "<span style='color:blue; font-weight: bold;'>double</span>");
  }
  else if(word.includes("boolean")){ 
    return value.replace("boolean", "<span style='color:blue; font-weight: bold;'>boolean</span>");
  }
  else if(word.includes("String")){ 
    return value.replace("String", "<span style='color:blue; font-weight: bold;'>String</span>");
  }
  
  else{ 
      return value; 
  }
}
  
  /*
  switch(word){
    case "byte" :
      return "<span style='color:blue;'>byte</span>";
      break;
    case "short" :
      return "<span style='color:blue;'>short</span>";
      break; 
    case "int" :
      return "";
      alert(2);
      break;
     case "long" :
      return "<span style='color:blue;'>long</span>";
      break;
     case "float" :
      return "<span style='color:blue;'>float</span>";
      break;
    case "double" : 
      return "<span style='color:blue'>double</span>";
      break;
    case "boolean" : 
      return "<span style='color:'>boolean</span>";
      break;
  }
  */