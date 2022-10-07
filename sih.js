const form = document.getElementById('register');
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const phone = document.getElementById('phone');
var error = document.getElementById("fnameerror")


form.addEventListener('submit',(e) => {
    if(fname.value === "" || fname.value == null){
        error.innerText = "Enter your first name.";
        e.preventDefault();
    }
})
