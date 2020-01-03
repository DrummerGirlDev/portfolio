
//////////////////////////
// VISUAL ARTS PAGE JS //
////////////////////////
filterSelection("all")
function filterSelection(c) {
  var x, i; 																//declaring varibles
  x = document.getElementsByClassName("filterDiv"); 						//each image will now be called x
  if (c == "all") c = ""; 													//if the filter name is all c will be set to blank
  for (i = 0; i < x.length; i++) { 											//looping throught all of the images
    RemoveClass(x[i], "show"); 												//pass each image class into the remove class function with name as show
    if (x[i].className.indexOf(c) > -1) AddClass(x[i], "show"); 			//if XXXX is true then pass each image class into the add class function with name as show
  }
}

function AddClass(element, name) {											//element is the image class (logo) and name is show?
  var i, arr1, arr2;														//declaring varibles
  arr1 = element.className.split(" ");										//
  arr2 = name.split(" ");													//
  for (i = 0; i < arr2.length; i++) {										//
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}	//
  }
}

function RemoveClass(element, name) {										//
  var i, arr1, arr2;														//declaring varibles
  arr1 = element.className.split(" ");										//
  arr2 = name.split(" ");													//
  for (i = 0; i < arr2.length; i++) {										//
    while (arr1.indexOf(arr2[i]) > -1) {									//
      arr1.splice(arr1.indexOf(arr2[i]), 1);    							//
    }
  }
  element.className = arr1.join(" ");										//
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
//////////////////////////////
// END VISUAL ARTS PAGE JS //
////////////////////////////
