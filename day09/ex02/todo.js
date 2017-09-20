function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie() {
    var all_cookie = decodeURIComponent(document.cookie);
    var ca = all_cookie.split(';');

    for(var i = 0; i < ca.length; i++) {
        if (ca[i]) {
            var div = document.createElement("div");
            var n = ca[i].indexOf("=");
            var text = document.createTextNode(ca[i].substring(0, n));
            div.appendChild(text);
            div.addEventListener('click', function(){
                delMe(this);
            });
            var list = document.getElementById("ft_list");
            list.insertBefore(div, list.childNodes[0]);
        }
    }
}

function addElem() {
    var todo = prompt("What to do?", "Kill Bill!");
    if (todo == null || todo == "")
        return (false);
    var div = document.createElement("div");
    var text = document.createTextNode(todo);
    div.appendChild(text);
    div.addEventListener('click', function(){
        if (confirm("Delete? O_o rly??"))
            this.remove();}, false);
    var list = document.getElementById("ft_list");
    list.insertBefore(div, list.childNodes[0]);
    setCookie(todo, todo, 30);
}

function delMe(elem) {
    var content = elem.innerHTML;
    var parent = document.getElementById("ft_list");
    if (confirm("Delete? O_o rly??")) {
        parent.removeChild(elem);
        setCookie(content, "", -1);
    }
}