document.querySelector(".icon_login").addEventListener("click", function(event) {
    document.querySelector(".login-form").classList.add("active");
    event.preventDefault();
});
// document.querySelector(".icon_login").addEventListener("click", function(event) {
//     event.preventDefault();
//     document.querySelector(".login-form").classList.add("active");
//     var url = window.location.href.split('?')[0] + '?act=login';
//     window.location.href = url;
// });


document.querySelector(".close-btn").addEventListener("click", function() {
    document.querySelector(".login-form").classList.remove("active");   
});

document.addEventListener("mouseup", function(event) {
    let container = $(".form-container");
    if (!container.is(event.target) && container.has(event.target).length === 0) {
        document.querySelector(".login-form").classList.remove("active");
    }
});

// -----------jquery for angle-down icon beside sub menu---------
$(document).ready(function(){
    // Tìm <li> có sub
    $('.sub_menu').parent('li').addClass('has_child');
})

