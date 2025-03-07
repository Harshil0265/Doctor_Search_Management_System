function goBack() {
    window.history.back();
}

function showPopup(action) {
    var popup = document.getElementById("popup1");
    var content = document.getElementById("popup-content");

    if (action === 'edit') {
        content.innerHTML = "Edit popup content goes here.";
    } else if (action === 'view') {
        content.innerHTML = "View popup content goes here.";
    } else if (action === 'drop') {
        content.innerHTML = "Delete popup content goes here.";
    }

    popup.style.display = "block";
}

function closePopup() {
    var popup = document.getElementById("popup1");
    popup.style.display = "none";
}
