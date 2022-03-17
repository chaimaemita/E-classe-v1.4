const uname = document.getElementById('name');
const email = document.getElementById('email');
const psw = document.getElementById('psw');
var log = document.getElementById("log");


log.addEventListener('click',()=>{
    let tab = '';
    if (uname.value.length == 0 ) {
       tab += '\nname is required';
    }
    if (email.value.length == 0) {
        tab += '\nemail is required';  
    }
    if (psw.value.length == 0) {
        tab += '\npassword is required';
    }
    if (tab.length != 0) {
        alert(tab);
    }
});

