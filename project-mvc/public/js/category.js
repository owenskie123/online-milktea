const CATEGORY_FILE = document.getElementById('category-file');

CATEGORY_FILE.onchange = () => {
    const FILE = CATEGORY_FILE.files[0];
    const _20MB = 20 * 1024 * 1024;
    if (FILE){
        if (!FILE.type.startsWith('image/')){
            alert('File type must be an image!');
            CATEGORY_FILE.value = '';
        }
        else if (FILE.size > _20MB){
            alert('File must be less than 20MB!');
            CATEGORY_FILE.value = '';
        }
    }
}