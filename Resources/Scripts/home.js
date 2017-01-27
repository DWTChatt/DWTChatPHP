function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
$(document).ready(function () {
    if(readCookie('color') != 'white') { $('.neptune-logo > img').attr("src","<?=IMAGES_DIR?>/NTLogo.png"); }
    if(readCookie('color') == null) {
        var color = "white";
        var textColor = "grey";
        document.cookie = "color="+ color +"; expires= 31 Dec 2023 12:00:00 UTC; path=/";
        document.cookie = "textColor="+ textColor +"; expires= 31 Dec 2023 12:00:00 UTC; path=/";
        if(color == 'white') { $('.neptune-logo > img').attr("src","<?=IMAGES_DIR?>/NTLogoDark.png"); }
        else { $('.neptune-logo > img').attr("src","<?=IMAGES_DIR?>/NTLogo.png"); }
        $.ajax({
            method : "GET",
            url : "<?=BASE_URL?>/home/get",
            success : function (response) {
                $(".customize").html(response);
            }
        });
    }
    $("label.radio").click(function () {
        var color = $(this).find("input:first").attr("nt-switch-color");
        var textColor = $(this).find("input:first").attr("nt-switch-text-color");
        document.cookie = "color="+ color +"; expires= 31 Dec 2023 12:00:00 UTC; path=/";
        document.cookie = "textColor="+ textColor +"; expires= 31 Dec 2023 12:00:00 UTC; path=/";
        if(color == 'white') { $('.neptune-logo > img').attr("src","<?=IMAGES_DIR?>/NTLogoDark.png"); }
        else { $('.neptune-logo > img').attr("src","<?=IMAGES_DIR?>/NTLogo.png"); }
        $.ajax({
            method : "GET",
            url : "<?=BASE_URL?>/home/get",
            success : function (response) {
                $(".customize").html(response);
            }
        });
    });
    $(".languages>ul>li>a").click(function () {
        document.cookie = "lang="+$(this).attr("nt-lang")+"; expires= 31 Dec 2023 12:00:00 UTC; path=/";
        window.location.href = window.location.href;
    });
});
