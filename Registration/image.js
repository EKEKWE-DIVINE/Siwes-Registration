const imageInput = document.getElementById("file");
const profileImage = document.getElementById("uploaded image");


    // Function to store image in LocalStorage
    imageInput.addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function() {
                const base64String = reader.result;
                localStorage.setItem("profilePic", base64String);
                profileImage.src = base64String;
            };

            reader.readAsDataURL(file);
        }
    });

    // Function to load image from LocalStorage when page loads
    function loadProfileImage() {
        const storedImage = localStorage.getItem("profilePic");
        if (storedImage) {
            profileImage.src = storedImage;
        }
    }

    // Function to clear stored image
    function clearImage() {
        localStorage.removeItem("profilePic");
        profileImage.src = "";
    }

    // Load the stored profile picture on page load
    window.onload = loadProfileImage;

    FileValidation = (event) => {
        var uploaded_image = document.getElementById('uploaded image');
        let uploaded = localStorage.getItem('uploaded image');
        localStorage.uploaded_image = uploaded;
    uploaded_image.src = URL.createObjectURL(event.target.files[0]);
        const selected_file = document.getElementById("file");
        if (selected_file.files.length > 0) {
            for (const i = 0; i <= selected_file.files.length - 1; i++) {
                const file_size = selected_file.files.item(i).size;

                const file = Math.round((file_size / 1024));
                console.log(uploaded)
                }
                }
                }
