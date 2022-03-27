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



function edit_book(event) {
    let book_id_str = event.currentTarget.parentElement.parentElement.id;
    let book_id = parseInt(book_id_str);
}

function edit_successfully() {
    alert("Edit Successfully!");
    location.reload();
}