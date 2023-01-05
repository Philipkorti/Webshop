    let form = document.querySelector('.fileupload');
        let fileSelect = document.getElementById('photos');
        let uploadButton = document.getElementById('upload-btn');
        alert(form)
    form.onsubmit = function(event){
        alert();
        event.preventDefault();
        uploadButton.innerHTML = 'Uploading ...';

        let files = fileSelect.files;
        let formData = new FormData();

        for(let i = 0; i < files.length; i++){
            let file = files[i];
            
            if(!file.type.match('image.*')){
                continue;
            }

            formData.append('photos[]', file, file.name);
        }

        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'uplode.php', true);
        xhr.onload = function(){
            if(xhr.status === 200){
                document.querySelector("#result").innerHTML = xhr.responseText;
                uploadButton.innerHTML = 'Upload';
            }else{
                document.querySelector('#result').innerHTML = "Fehler beim Upload " + xhr.responseText;
            }
        };
        xhr.send(formData);

        document.getElementById('photos').addEventListener('change', function (event){
            let files = event.target.files;
            for(let i = 0, f; f = files[i]; i++){
            if(!f.type.match('image.*')){
                continue;
            }
            let reader = new FileReader();
            reader.onload = (function(theFile){
                return function(e){
                    let span = document.createElement('span');
                    span.innerHTML =  ['<img class="thumb" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                    document.querySelector('.filelist').insertBefore(span,null);
                };
            })(f);
            reader.readAsDataURL(f);
            }
            document.querySelector('.filelist').innerHTML = '';
        });

        xhr.upload.onprogress = function (e) {
            let percentUpload = Math.floor(100 * e.loaded / e.total);
            progress.value = percentUpload;
        }
    }
   