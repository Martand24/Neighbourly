document.addEventListener("DOMContentLoaded", function () {
    initQuill();
    initImageUpload();
    initFormSubmission();
});

function initQuill() {
    window.quill = new Quill("#editor-container", {
        theme: "snow",
        modules: {
            toolbar: [
                ["bold", "italic", "underline"],
                ["code-block"],
                [{ header: 1 }, { header: 2 }],
                [{ list: "ordered" }, { list: "bullet" }],
                [{ color: [] }]
            ]
        }
    });
}


function initImageUpload() {
    const imageUpload = document.getElementById("imageUpload");
    const imagePreview = document.getElementById("image-preview");
    let files = [];

    imageUpload.addEventListener("change", function (event) {
        handleImageUpload(event.target.files);
    });

    function handleImageUpload(selectedFiles) {
        const dt = new DataTransfer();

        Array.from(selectedFiles).forEach(file => {
            if (!isDuplicate(file)) {
                files.push(file);
                previewImage(file);
            }
        });

        updateFileInput(dt);
    }

    function isDuplicate(file) {
        return files.some(f => f.name === file.name && f.size === file.size && f.type === file.type);
    }

    function previewImage(file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const imgContainer = document.createElement("div");
            imgContainer.classList.add("image-item");

            imgContainer.innerHTML = `
                <img src="${e.target.result}" style="max-width: 150px; max-height: 150px; margin: 5px;">
                <button class="delete-image" aria-label="Remove image">X</button>
            `;

            imagePreview.appendChild(imgContainer);
            imgContainer.querySelector(".delete-image").addEventListener("click", () => removeImage(file, imgContainer));
        };
        reader.readAsDataURL(file);
    }

    function removeImage(file, imgContainer) {
        files = files.filter(f => f !== file);
        imagePreview.removeChild(imgContainer);
        updateFileInput(new DataTransfer());
    }

    function updateFileInput(dt) {
        files.forEach(f => dt.items.add(f));
        imageUpload.files = dt.files;
    }
}

function initFormSubmission() {
    const form = document.getElementById("create-post-form");
    const descriptionInput = document.getElementById("description");

    form.addEventListener("submit", function () {
        descriptionInput.value = quill.root.innerHTML;
    });
}
