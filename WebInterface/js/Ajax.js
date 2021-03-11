"use strict"

let link = document.getElementById('linkInput');

function ajax(event){
    event.preventDefault();

    console.log(link.value);

    let data = link.value;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'https://dev-21606393.users.info.unicaen.fr/M1/Knowledge/Python/test.py');
    xhr.responseType = 'json';

    let formData = new FormData();
    formData.append(0, data)

    console.log(formData);

    xhr.addEventListener('load', function(e) {
        console.log('xhr response load : ', xhr.response);
    });

    xhr.send(formData);
}



// let redirect;
// if(droppedFiles.length > 1){
//     redirect = 'ajaxUploadMultipleSucces';
// }
// else{
//     let file = droppedFiles[0].name;
//     let fileWithoutExtension = file.split('.');
//     redirect = 'ajaxUploadSucces&id=' + fileWithoutExtension[0];
// }


// xhr.upload.addEventListener('progress', function (e) {
//     console.log('Progress Bar : ', e);
//     document.getElementById("progressBar").value = e.loaded  / e.total;
// });
//
// // Redirect to php if end of XMLHttpRequest
// xhr.onreadystatechange = function(){
//     if(xhr.readyState == 4 && xhr.status == 200) {
//         window.location = "https://dev-21606393.users.info.unicaen.fr/devoir-idc2020/MoriniereRobinDev/index.php?obj=pdf&action=" + redirect;
//     }
// }
