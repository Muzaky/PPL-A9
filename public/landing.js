const title = document.querySelectorAll("herotitle");

document.addEventListener("scroll", function(){
    title.forEach(paragraph => {
        if(isInView(paragraph)){
            paragraph.classList.add(".
    });
});

function isInView(element){
    const rect = element.getBoundingClientRect();
    return(
        rect.bottom > 0 && rect.top <
        (window.innerHeight -   150 || document.documentElement.clientHeight - 150)
    )
}