// Function to set up the image preview logic
function setupProfileImagePreview() {
    // 1. Get the elements by their specific IDs/Classes
    const fileInput = document.getElementById('profileImageFile'); // The hidden input field
    const previewImage = document.querySelector('.profileImagePreview'); // The <img> tag
    const changeButton = document.getElementById('changeProfileBtn'); // The button/label

    // --- Link Button to File Input ---
    if (changeButton && fileInput) {
        // Since we are using a <label for="id"> the click is usually automatic.
        // If not, you'd add: changeButton.addEventListener('click', () => fileInput.click());
        // We ensure the input is hidden, and the label does the job.
    }


    // --- Image Preview Logic (Your original logic adapted) ---
    if (fileInput && previewImage) {
        fileInput.addEventListener('change', function (event) {
            // Check if a file was selected
            if (event.target.files && event.target.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Update the src of the preview <img> tag
                    previewImage.src = e.target.result;
                };

                // Read the file as a data URL (Base64 string) for instant preview
                reader.readAsDataURL(event.target.files[0]);
            } else {
            }
        });
    }
}

// Call the function once the DOM is fully loaded
document.addEventListener('DOMContentLoaded', setupProfileImagePreview);