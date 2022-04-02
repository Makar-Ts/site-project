//==============Delete book================//

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

//==============Animation control================//

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

//==============Edit book================//
let regular_checks = {
    img:    /^https:\/\/[a-z0-9]{2}.mybook.io\/p\/x378\/book_covers\/[0-9a-z]+\/[0-9a-z]+\/[0-9a-z-]+.jpg$/,
    name:   /^[А-я ,.!?№#:%@0-9'"A-z]+$/u,
    author: /^[А-я ]+$/u,
    rate:   /^[0-5]$/,
    status: /^[1-5]$/
};

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

    let img = element.querySelector('input[name="img"]').value,
        book_name = element.querySelector('input[name="name"]').value,
        author = element.querySelector('input[name="author"]').value,
        rate = parseInt(element.querySelector('input[name="rate"]').value),
        book_status = parseInt(element.querySelector('input[name="status"]').value)-1;
    
    alert(book_id+" "+img+" "+book_name+" "+author+" "+rate+" "+book_status);

    if ((regular_checks['img'].test(img) || !img) && (regular_checks['name'].test(book_name) || !book_name) && 
        (regular_checks['author'].test(author) || !author) && (regular_checks['rate'].test(rate) || isNaN(rate)) &&
        (regular_checks['status'].test(book_status) || isNaN(book_status))) { 
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
    else { alert(`Check unacces (img:${regular_checks['img'].test(img) || img}, name:${regular_checks['name'].test(book_name) || book_name}, author:${regular_checks['author'].test(author) || author}, rate:${regular_checks['rate'].test(rate) || isNaN(rate)}, status:${regular_checks['status'].test(book_status) || isNaN(book_status)})`); }
}

function edit_book_unaccept(event) {
    const element = event.currentTarget.parentElement.parentElement;
    close_animation(element, animationClose, animationOpen);
}

function edit_successfully() {
    alert("Edit Successfully!");
    location.reload();
}

//==============Add book================//

var animationAddOpen = 'animate__fadeInDown',
    animationAddClose = 'animate__fadeOutUp';

$( document ).ready(function() { add_menu = document.getElementById('add_menu'); 
                                 add_menu_background = document.getElementById('add_menu').parentElement;});


function add_book(event) {
    open_animation(add_menu_background, animationAddOpen);
}

function add_book_accept(event) {
    let img = add_menu.querySelector('input[name="img"]').value,
        book_name = add_menu.querySelector('input[name="name"]').value,
        author = add_menu.querySelector('input[name="author"]').value,
        rate = parseInt(add_menu.querySelector('input[name="rate"]').value),
        book_status = parseInt(add_menu.querySelector('input[name="status"]').value)-1;
    
    alert(img+" "+book_name+" "+author+" "+rate+" "+book_status);

    if (regular_checks['img'].test(img) && regular_checks['name'].test(book_name) && 
        regular_checks['author'].test(author) && regular_checks['rate'].test(rate) &&
        regular_checks['status'].test(book_status)) { 
            $.post(
                "php/add_book.php", {
                    img:img,
                    name:book_name,
                    author:author,
                    rate:rate, 
                    status:book_status
                }, add_successfully
            );
        }
    else { alert(`Check unacces (img:${regular_checks['img'].test(img)}, name:${regular_checks['name'].test(book_name)}, author:${regular_checks['author'].test(author)}, rate:${regular_checks['rate'].test(rate)}, status:${regular_checks['status'].test(book_status)})`); }
}

function add_book_unaccept(event) {
    close_animation(add_menu_background, animationAddClose, animationAddOpen);
}

function add_successfully() {
    alert("Add Successfully!");
    location.reload();
}

//==============Feedback================//

$( document ).ready(function() { feedback = document.getElementById('form_input') });

function feedback_send(event) {
    let name = feedback.querySelector('input[name="name"]').value,
        phone = feedback.querySelector('input[name="phone"]').value,
        mail = feedback.querySelector('input[name="mail"]').value,
        comm = feedback.querySelector('textarea[name="comm"]').value;
    
    let regular_checks_feedback = {
        name:   /^[А-яёЁA-z ]*$/u,
        phone:  /^[+]?[1-9][0-9]{0,2}[ ]?[(]?[1-9][0-9]{0,2}[)]?[ ]?\d{3}([ -_]?\d{2}){2}$/,
        mail:   /^[A-z 0-9.]+[@]{1}[A-z]+[.]{1}[a-z]+$/
    };

    if (regular_checks_feedback['name'].test(name) &&
        regular_checks_feedback['phone'].test(phone) &&
        regular_checks_feedback['mail'].test(mail)) {
            $.post(
                "php/add_comment.php", {
                    name:name,
                    phone:phone,
                    mail:mail,
                    comment:comm
                }, add_comment_successfully
            );
        } else {
            alert(`Неправильный ввод!(name:${regular_checks_feedback['name'].test(name)}, phone:${regular_checks_feedback['phone'].test(phone)}, mail:${regular_checks_feedback['mail'].test(mail)})`);
        }
}

function add_comment_successfully() {
    alert("Спасибо за отзыв!");
    location.reload();
}