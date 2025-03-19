let bell_icon = document.querySelector('.notif_bell')

let notif_box = document.querySelector('.notif-pop-up-box');

bell_icon.addEventListener("click",()=>{
    // alert("clicked")
    notif_box.classList.toggle("hidden");

})
