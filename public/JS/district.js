document.getElementById('deleteForm').addEventListener('submit', function(event) {
    var confirmation = confirm('Do you want to delete this District?');

    if (!confirmation) {
        event.preventDefault(); // Cancel the form submission if the user clicks "Cancel" in the confirmation dialog.
    }
});