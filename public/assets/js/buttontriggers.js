var sticky = document.querySelector("#logo");
var height = sticky.offsetHeight;
const nav = document.querySelector("#nav");
const managebar = document.querySelector(".managebar");


function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}


                /*  Navbar dropdown   */ 
document.querySelectorAll(".dropdown-toggle-button").forEach(button => {

    button.addEventListener('click', (event) => {
        let toggleDropdown = button.parentElement.parentElement.querySelector('.dropdown-content')
        let displayStateCache = toggleDropdown.style.display;
        document.querySelectorAll('.dropdown-content').forEach(dropdownContent => {
            dropdownContent.style.display = "";
        })
        toggleDropdown.style.display = displayStateCache;

        if (toggleDropdown.style.display != "flex") {
            toggleDropdown.style.display = "flex";
            button.style.transform = "rotate(180deg)"
        } else {
            toggleDropdown.style.display = "none";
            button.style.transform = "rotate(0deg)"
        }
    })
    window.addEventListener('mouseup', (event) => {
        let clickPath = event.path || event.composedPath()
        document.querySelectorAll('.dropdown-content').forEach(x => {
            if (!clickPath.includes(x.parentElement)) {
                x.style.display = "";
                button.style.transform = "rotate(0deg)";
            }
        })
    });
});

            /*  Mobile Navbar roll  */
document.querySelectorAll ("#navtoggle").forEach(button =>{
        button.addEventListener ('click',(event)=>{
            if (nav.style.display != "flex") {
                nav.style.display = "flex";
                button.classList.add("fa-times");
                button.classList.remove("fa-bars");
                button.style.transform = "translateX(200px)";
            }
            else {
                nav.style.display="none";
                button.classList.add("fa-bars");
                button.classList.remove("fa-times");
                button.style.transform = "rotate(180deg)";
            }
        })
});
            /*  Mobile admin roll  */
            document.querySelectorAll ("#admintoggle").forEach(button =>{
                button.addEventListener ('click',(event)=>{
                    let adminpanel=document.querySelector(".managebar");
                    if (adminpanel.style.display != "flex") {
                        adminpanel.style.display = "flex";
                        button.classList.add("fa-times");
                        button.classList.remove("fa-user");
                        button.style.transform = "translateX(-200px)";
                    }
                    else {
                        adminpanel.style.display="none";
                        button.classList.add("fa-user");
                        button.classList.remove("fa-times");
                        button.style.transform = "rotate(360deg)";
                    }
                })
        });

    /* read more button */
document.querySelectorAll(".rm").forEach(button =>{

    button.addEventListener('click', (event) => {
        let hiddentext = button.parentElement.querySelector(".hidden-content");
        let btn =button.parentElement.querySelector(".rm");
        if (hiddentext.style.display != "flex") 
        {
            hiddentext.style.display = "flex";
            btn.innerHTML =("čítaj menej");
        }
        else 
        {
            hiddentext.style.display = "none";
           btn.innerHTML =("čítaj viac..");
        }
    })
});

document.querySelectorAll(".close").forEach(button =>{

    button.addEventListener('click', (event) => {
        let overlay =button.parentElement.parentElement;
        if (overlay.style.display != "none") 
        {
            overlay.style.display = "none";
        }
    })
});
