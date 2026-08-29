let imageInput = document.getElementById('image');
if (imageInput) {
    imageInput.addEventListener('change', function (event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imagePreview = document.getElementById('imagePreview');
                let remover = document.getElementById('remover')

                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Show the image preview
                if (remover) {
                    remover.style.display = 'block'
                }
            }
            reader.readAsDataURL(input.files[0]); // Read the file as a data URL
        }
    });
}

let imageEditInput = document.getElementById('edit_image');
if (imageEditInput) {
    imageEditInput.addEventListener('change', function (event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imagePreview = document.getElementById('imageEditPreview');
                let remover = document.getElementById('remover')

                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Show the image preview
                if (remover) {
                    remover.style.display = 'block'
                }
            }
            reader.readAsDataURL(input.files[0]); // Read the file as a data URL
        }
    });
}
