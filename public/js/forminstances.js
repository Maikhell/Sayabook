// formInstances.js
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('book-forms-container');
    const template = document.getElementById('book-form-template')?.innerHTML;
    const addButton = document.getElementById('add-more-books-btn');
    const form = document.querySelector('#addbooksModal form');
    const modal = document.getElementById('addbooksModal');

    let bookIndex = 0;
    form.addEventListener('submit', async function (e) {
        e.preventDefault(); // Stop the default page reload

        const formData = new FormData(this); // Collect all form data (including files)

        try {
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                // Laravel expects the CSRF token, which FormData should include from the hidden input.
            });

            const result = await response.json();

            // Handle the JSON response
            if (response.ok) {
                // Success response (HTTP 200-299)
                showCustomToast(result.message, result.status);

                // Close modal and reset form state after success
                const bsModal = bootstrap.Modal.getInstance(modal);
                if (bsModal) {
                    bsModal.hide();
                }
                form.reset();
                // You may also need to reset your dynamic forms/container here.
                resetDynamicForms();
            } else {
                // Error response (HTTP 400s or 500s)
                const errorMessage = result.message || 'An unexpected error occurred.';
                showCustomToast(errorMessage, 'error');
            }

        } catch (error) {
            console.error('Submission failed:', error);
            showCustomToast('Failed to connect to the server.', 'error');
        }
    });
    function resetDynamicForms() {
        // Clear all forms and add back the first empty instance
        const container = document.getElementById('book-forms-container');
        if (container) {
            container.innerHTML = '';
            // Reset bookIndex and add the first form instance
            window.bookIndex = 0; // Assuming bookIndex is managed globally or needs resetting
            addBookForm(); 
            updateFormIndexes();
        }
    }
    // Get the date value from the global variable defined in the Blade file
    const dateValue = window.currentDate || new Date().toISOString().slice(0, 10);

    if (!template || !container || !addButton) {
        console.error("Required DOM elements (template, container, or button) not found.");
        return; // Stop execution if required elements are missing
    }

    function addBookForm() {
        // 1. Get the template content and replace all placeholders
        let newForm = template.replace(/BOOK_INDEX/g, bookIndex);
        newForm = newForm.replace(/BOOK_DISPLAY_INDEX/g, bookIndex + 1);
        newForm = newForm.replace(/BOOK_DATE_VALUE/g, dateValue); // Replace the date placeholder

        // 2. Append the HTML string
        container.insertAdjacentHTML('beforeend', newForm);

        // 3. Get the newly added element using lastElementChild (THE FIX)
        const newFormElement = container.lastElementChild;

        if (!newFormElement || !newFormElement.classList.contains('book-form-instance')) {
            console.error("Failed to insert valid form element. Check template structure.");
            return;
        }

        // --- Image Preview Logic ---
        const fileInput = newFormElement.querySelector('.bookCoverFile');
        const previewImage = newFormElement.querySelector('.bookCoverPreview');

        if (fileInput && previewImage) {
            fileInput.addEventListener('change', function (event) {
                if (event.target.files && event.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                } else {
                    // Reset to the default image if file is cleared 
                    previewImage.src = "{{ asset('icons/sampleprofile.jpg') }}";
                }
            });
        }

        const removeBtn = newFormElement.querySelector('.remove-book-btn');
        if (removeBtn) {
            if (bookIndex === 0) {
                removeBtn.style.display = 'none';
            } else {
                removeBtn.addEventListener('click', function () {
                    newFormElement.remove();
                    updateFormIndexes();
                });
            }
        }

        bookIndex++;
    }
    function updateFormIndexes() {
        const formInstances = container.querySelectorAll('.book-form-instance');
        formInstances.forEach((formElement, index) => {
            const removeBtn = formElement.querySelector('.remove-book-btn');
            if (removeBtn) {
                removeBtn.style.display = (index === 0) ? 'none' : 'inline-block';
            }
        });
        bookIndex = formInstances.length;
    }
    const addBooksModal = document.getElementById('addbooksModal');

    addBooksModal.addEventListener('shown.bs.modal', function () {
        if (container.children.length === 0) {
            bookIndex = 0;
            addBookForm();
        }
    });
    addButton.addEventListener('click', addBookForm);
});