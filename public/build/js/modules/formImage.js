export function formImage() {
    const inputFile = document.querySelector('input[id="image"]');
    inputFile.addEventListener('change', (e)=> {
        const file = inputFile.files[0];
        if(file) {
            const urlFile = URL.createObjectURL(file);
            
            const image = document.createElement('IMG');
            image.src = urlFile;
            document.body.appendChild(image);
        }
    })
}