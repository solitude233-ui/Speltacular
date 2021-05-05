window.addEventListener("load", function() {
    let directionList = document.getElementsByClassName("directionStep");

    // Preappend buttons to each list items
    if (directionList != null) {
        button = '<button class="hide-direction" aria-label="Hide step"> <span aria-hidden="true">&#10004;</span> </button> ';
        for (let i = 0; i < directionList.length; i++) {
            directionList[i].innerHTML = button + directionList[i].innerHTML;
        }
    }

    let buttons = document.getElementsByClassName("hide-direction");
    if (buttons != null) {
        for (let j = 0; j < buttons.length; j++) {
            buttons[j].addEventListener("click", function() {
                directionList[j].style.position = "absolute";
                directionList[j].style.visibility = "hidden";
                
            });
        }
    }
    
});