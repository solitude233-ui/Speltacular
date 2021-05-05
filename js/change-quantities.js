window.addEventListener("load", function() {

    let buttons = document.getElementsByClassName("quantity-button");
    let updates = document.getElementsByClassName("batchUpdate");

    if ((buttons != null) && (updates != null)) {
        for (let i = 0; i < buttons.length; i++) {
            if (buttons[i].getAttribute("value") == "1") {
                buttons[i].addEventListener("click", function() {
                    var newValues = ["1", "&frac34;", "&frac12", "2&frac12", "1"]; 
                    for (let j = 0; j < updates.length; j++) {
                        updates[j].innerHTML = newValues[j];
                    }
                });
            }

            else if (buttons[i].getAttribute("value") == "2") {
                buttons[i].addEventListener("click", function() {
                    var newValues = ["2", "1&frac12;", "1", "5", "2"]; 
                    for (let j = 0; j < updates.length; j++) {
                        updates[j].innerHTML = newValues[j];
                    }
                });   
            }

            else {
                buttons[i].addEventListener("click", function() {
                    var newValues = ["3", "2&frac14;", "1&frac12", "7&frac12", "3"]; 
                    for (let j = 0; j < updates.length; j++) {
                        updates[j].innerHTML = newValues[j];
                    }
                }); 
            }
        }
    }
});