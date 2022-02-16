var checkbox = document.querySelector('input[name=theme]');

checkbox.addEventListener('change', function(){
    if(checkbox.checked) {
        document.body.classList.add("dark-theme");
        document.cookie = "theme = dark-theme; expires=Fri, 31 Dec 2021 23:59:59 GMT; path=/";
        document.cookie = "checked = checked; expires=Fri, 31 Dec 2021 23:59:59 GMT; path=/";
    }
    else{
        document.body.classList.remove("dark-theme");
        document.cookie = "theme = ; expires=Fri, 31 Dec 2021 23:59:59 GMT; path=/";
        document.cookie = "checked = ; expires=Fri, 31 Dec 2021 23:59:59 GMT; path=/";
    }
})
