var roll = document.getElementById("carousel_roll");

var slides = document.getElementsByClassName("carousel_elem");

var curr_carousel_elem = -1;

var carousel_duration = 3000;

var carousel_timer;

function init_carousel() {
    
    roll.style.width = (slides.length * 100) + "%";
    
    carousel_goto(0);
    
    carousel_reset_timer();
    
}

window.addEventListener("load", init_carousel);


function carousel_goto(elem_index) {
    
    if (elem_index >= slides.length) {return false;} // ! \ AJOUTER APRÈS GOTO_NEXT / GOTO_PREV
    
    roll.style.marginLeft = "-" + (elem_index * 100) + "%";
    
    curr_carousel_elem = elem_index;
    
}


function carousel_goto_next() {
    
    var new_index = curr_carousel_elem + 1;
    
    if (new_index >= slides.length) {new_index = 0;}
    
    carousel_goto(new_index);
    
}

function carousel_goto_prev() {
    
    var new_index = curr_carousel_elem - 1;
    
    if (new_index < 0) {new_index = slides.length-1;}
    
    carousel_goto(new_index);
    
}


function carousel_reset_timer() {
    
    clearInterval(carousel_timer);
    
    carousel_timer = setInterval(carousel_goto_next , carousel_duration);
    
}

document.getElementById("carousel-nav-prev").addEventListener("click", function(){carousel_reset_timer(); carousel_goto_prev();});

document.getElementById("carousel-nav-next").addEventListener("click", function(){carousel_reset_timer(); carousel_goto_next();});