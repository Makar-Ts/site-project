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


var animationOpen = 'animate__fadeInLeft',
    animationClose = 'animate__fadeOutLeft';

function edit_book(event) {
    let book_id_str = event.currentTarget.parentElement.parentElement.id;
    const element = event.currentTarget.parentElement.parentElement.parentElement.children[2];
    let book_id = parseInt(book_id_str);

    open_animation(element, animationOpen);
}

function edit_book_accept(event) {
    let book_id_str = event.currentTarget.parentElement.parentElement.parentElement.children[0].id;
    const element = event.currentTarget.parentElement.parentElement;
    let book_id = parseInt(book_id_str);

    let img = element.querySelector('input[name="img"]').value;
        book_name = element.querySelector('input[name="name"]').value;
        author = element.querySelector('input[name="author"]').value;
        rate = parseInt(element.querySelector('input[name="rate"]').value);
        book_status = parseInt(element.querySelector('input[name="status"]').value);
    
    alert(book_id+" "+img+" "+book_name+" "+author+" "+rate+" "+book_status);

    $.post(
        "php/edit_book.php", {
            id:book_id,
            img:img,
            name:book_name,
            author:author,
            rate:rate, 
            status:book_status
        }, edit_successfully
    );
}

function edit_book_unaccept(event) {
    const element = event.currentTarget.parentElement.parentElement;
    close_animation(element, animationClose, animationOpen);
}

function edit_successfully() {
    alert("Edit Successfully!");
    location.reload();
}