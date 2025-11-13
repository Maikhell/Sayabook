// In your existing showtoast.js file

function showCustomToast(message, status) {
    const toastElement = document.getElementById('popToast');
    if (!toastElement) return;

    const toastBody = toastElement.querySelector('.toast-body');
    const toastHeader = toastElement.querySelector('.toast-header');
    
    // 1. Update Message
    if (toastBody) {
        // Find the username span (or remove it if you only want the dynamic message)
        let staticPrefix = toastBody.textContent.includes('Hey!') ? 'Hey! ' : ''; 
        
        // Temporarily remove static content and insert the new message
        toastBody.innerHTML = message; 
    }

    // 2. Optional: Update styling for visual status feedback
    toastHeader.classList.remove('bg-success', 'bg-danger');
    toastHeader.style.color = '#fff'; // Reset text color

    if (status === 'success') {
        toastHeader.classList.add('bg-success');
        // Optionally update the small text/icon for success
    } else if (status === 'error') {
        toastHeader.classList.add('bg-danger');
        // Optionally update the small text/icon for error
    } else {
        // Default style if status is neither success nor error
        toastHeader.classList.add('bg-secondary');
    }
    
    // 3. Show the toast using Bootstrap's JS
    const toast = new bootstrap.Toast(toastElement);
    toast.show();
}

// You might also want to initialize the toast structure on page load
document.addEventListener('DOMContentLoaded', function () {
    // This part is for showing the initial session flash message toast (if any)
    const toastElement = document.getElementById('popToast');
    if (toastElement && toastElement.dataset.message) {
        showCustomToast(toastElement.dataset.message, toastElement.dataset.status);
    }
});