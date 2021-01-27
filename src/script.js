window.onload = function() {
    var open = document.getElementById("open-button");
    var close = document.getElementById("parentForm");
    
    open.addEventListener("click", function () {
        document.getElementById("parentForm").style.display = "block"
    });

    close.addEventListener("click", function () { 
        document.getElementById("parentForm").style.display = "none"
    });
    document.getElementById('childForm').addEventListener('click', e => e.stopPropagation());

}