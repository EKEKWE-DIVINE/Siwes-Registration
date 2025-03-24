let Decline = document.getElementById('decline');
Decline.onclick = function() {
    let reason = prompt('Please enter the reason for declining the student');
    if (reason) {
        alert("You can't go further, you have to accept the terms. We will try to check up on yur reason for declining the student");
    } else {
        alert('Please enter a reason for declining the student');
    }
}