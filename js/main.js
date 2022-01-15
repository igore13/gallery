window.addEventListener("DOMContentLoaded", (event) => {
    var imageFullScreen = document.getElementById("image-fullscreen");
    var allElementImg = document.querySelectorAll("#gallery figure img");
    var elementImgSelected = document.getElementById("imgSelected");
    var closeImageFullScreen = document.getElementById("imgSelectedClose");

    allElementImg.forEach(elementImg => {
        elementImg.addEventListener('click', function() {
            imageFullScreen.style.display = "block";
            elementImgSelected.src = this.src.replace('thumbnails/', '');
        });
    });

    closeImageFullScreen.onclick = function() { 
        imageFullScreen.style.display = "none";
    };
});