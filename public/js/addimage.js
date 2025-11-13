function addBookForm() {
    // ... (Template cloning and insertion logic) ...

    // Get the newly added instance element
    const newFormElement = container.querySelector(`[data-index="${bookIndex}"]`);

    // --- Image Preview Logic ---
    // We use class selectors here because the IDs are now unique (e.g., 'bookCoverFile-0')
    // and need to be found relative to the new form instance.
    const fileInput = newFormElement.querySelector('.bookCoverFile');
    const previewImage = newFormElement.querySelector('.bookCoverPreview');

    if (fileInput && previewImage) {
        // Attach change listener to the file input
        fileInput.addEventListener('change', function (event) {
            if (event.target.files && event.target.files[0]) {
                const reader = new FileReader(); // Create a new reader for each instance

                reader.onload = function (e) {
                    previewImage.src = e.target.result; // Set the specific preview image source
                };

                reader.readAsDataURL(event.target.files[0]);
            } else {
                // Reset to the default image if file is cleared (e.g., canceled upload)
                previewImage.src = "{{ asset('icons/sampleprofile.jpg') }}";
            }
        });
    }

    // ... (Remove button logic and bookIndex increment) ...
}

// ... (updateFormIndexes function and event listeners) ...