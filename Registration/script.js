let username = document.getElementById("Text");
let susername = document.getElementById("sText");
let email = document.getElementById("Email");
let semail = document.getElementById("semail");
let password = document.getElementById("Password");
let password1 = document.getElementById("psw");
let password2 = document.getElementById("pswr");
let login = document.getElementById("Login-btn");
let signup = document.getElementById("signup");
let label = document.getElementById("myLabel");
let Email = document.getElementById("myEmail");
let checkbox = document.getElementById("checkbox");
let phonenumber = document.getElementById("PhoneN");
let PhoneNumber = document.getElementById("Phonen");
let phonen = document.getElementById("phonen");

window.onload = function () {
    const checkbox = document.getElementById("checkbox");
    checkbox.checked = false;

    if (localStorage.susername) {
        document.getElementById("myLabel").innerHTML = localStorage.susername;
    }
    if (localStorage.semail) {
        document.getElementById("myEmail").innerHTML = localStorage.semail;
    }
    if (localStorage.phonenumber) {
        document.getElementById("Phonen").innerHTML = localStorage.phonenumber;
        document.getElementById("phonen").value = localStorage.phonenumber;
    }
}

// Email validation function
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

if (login) {
    login.onclick = function (event) {
        username = document.getElementById("Text").value;
        email = document.getElementById("Email").value;
        password = document.getElementById("Password").value;

        if (!validateEmail(email)) {
            alert("Invalid email address.");
            event.preventDefault(); // Prevent the default action of the button
            return;
        }
        const formData = {
            username: username,
            email: email,
            password: password
        };
        saveFormData(formData);
        console.log(username);
        console.log(email);
        console.log(password);
        localStorage.username = username;
        localStorage.email = email;
    };
    if (checkbox) {
        checkbox.checked = true;
        function checkboxChecked() {
            if (checkbox.checked) {
                localStorage.setItem('username', username);
                localStorage.setItem('email', email);
                return true;
            } else {
                localStorage.removeItem('username');
                localStorage.removeItem('email');
                return false;
            }
        }
    }
}

if (signup) {
    signup.onclick = function (event) {
        susername = document.getElementById("sText").value;
        semail = document.getElementById("semail").value;
        password1 = document.getElementById("psw").value;
        password2 = document.getElementById("pswr").value;
        phonenumber = document.getElementById("PhoneN").value;

        if (!validateEmail(semail)) {
            alert("Invalid email address.");
            event.preventDefault(); // Prevent the default action of the button
            return;
        }

        if (password1 !== password2) {
            alert("Passwords do not match.");
            event.preventDefault(); // Prevent the default action of the button
            return;
        }
        const Data = {
            susername: susername,
            semail: semail,
            password1: password1,
            password2: password2,
            phonenumber: phonenumber
        };
        saveFormData(Data);
        console.log(susername);
        console.log(semail);
        console.log(phonenumber);
        localStorage.phonenumber = phonenumber;
        localStorage.susername = susername;
        localStorage.semail = semail;
    };
    function saveFormData(Data) {
        const storedFormData = JSON.parse(localStorage.getItem('Data')) || [];
        storedFormData.push(Data);
        localStorage.setItem('Data', JSON.stringify(storedFormData));
    }
}

if (label && localStorage.susername) {
    document.getElementById("myLabel").innerHTML = "Welcome " + localStorage.susername;
    document.getElementById("mylabel").innerHTML = localStorage.susername;
}
if (Email && localStorage.semail) {
    document.getElementById("myEmail").innerHTML = localStorage.semail;
}
if (PhoneNumber && localStorage.phonenumber) {
    document.getElementById("Phonen").innerHTML = localStorage.phonenumber;
    document.getElementById("phonen").value = localStorage.phonenumber;
}

// localStorage.clear();
console.log(localStorage);