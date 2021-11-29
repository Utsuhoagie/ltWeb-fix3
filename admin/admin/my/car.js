function triggerClick1add() {
    document.querySelector('#carImage1add').click();
}

function displayImage1add(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#carDisplay1add').setAttribute('src', e.target.result);
        }
        
        reader.readAsDataURL(e.files[0]);
    }
}

function triggerClick2add() {
    document.querySelector('#carImage2add').click();
}

function displayImage2add(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#carDisplay2add').setAttribute('src', e.target.result);
        }
        
        reader.readAsDataURL(e.files[0]);
    }
}

function triggerClick3add() {
    document.querySelector('#carImage3add').click();
}

function displayImage3add(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#carDisplay3add').setAttribute('src', e.target.result);
        }
        
        reader.readAsDataURL(e.files[0]);
    }
}