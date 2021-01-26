window.onload = function() {
    var open = document.getElementById("open-button");
    var close = document.getElementById("myForm");
    
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }
    
    

    open.addEventListener("click", openForm );
    close.addEventListener("click", function () {
        event.stopPropagation();
        document.getElementById("myForm").style.display = "none";
    } );
}