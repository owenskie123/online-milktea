const PRODUCT_FILE = document.getElementById('product-file');

PRODUCT_FILE.onchange = () => {
    const FILE = PRODUCT_FILE.files[0];
    const _20MB = 20 * 1024 * 1024;
    if (FILE){
        if (!FILE.type.startsWith('image/')){
            alert('File type must be an image!');
            PRODUCT_FILE.value = '';
        }
        else if (FILE.size > _20MB){
            alert('File must be less than 20MB!');
            PRODUCT_FILE.value = '';
        }
    }
}