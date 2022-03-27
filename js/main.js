function delete_book(event) {
    let book_id_str = event.currentTarget.parentElement.parentElement.id;
    let book_id = parseInt(book_id_str);
    let accept = confirm("Delete book(ID: "+book_id+")?");
    if (accept) {
        $.post(
            "php/delete_book.php", {
                deleted_id:book_id
            }, deleted_successfully
        );
    } else {
        alert("Delete unaccept");
    }
}

function deleted_successfully() {
    alert("Deleted Successfully!");
    location.reload();
}



function open_animation(element, animationUp) {
    element.classList.add("active");
    element.classList.add('animate__animated', animationUp);
}

function close_animation(element, animationDown, animationUp) {
    element.classList.remove(animationUp); 
    element.classList.add(animationDown);

    element.addEventListener('animationend', () => {
        if (element.classList.contains(animationDown)) { 
            element.classList.remove('animate__animated', animationDown);
            element.classList.remove("active");
        }
    });
}

function edit_book(event) {
    let book_id_str = event.currentTarget.parentElement.parentElement.id;
    const element = event.currentTarget.parentElement.parentElement.parentElement.children[2];
    let book_id = parseInt(book_id_str);

    var animationDown = 'animate__slideOutUp',
        animationUp = 'animate__slideInDown';

    open_animation(element, animationUp);
}

function edit_book_accept(event) {

}

function edit_book_unaccept(event) {
    
}

function edit_successfully() {
    alert("Edit Successfully!");
    location.reload();
}