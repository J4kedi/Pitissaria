document.addEventListener("DOMContentLoaded", function() {
    const checkboxes = document.querySelectorAll("#tamanhos input[type='checkbox']");

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function() {
            checkboxes.forEach(item => {
                if (item !== this) {
                    item.checked = false;
                }
            });
        });
    });
});
