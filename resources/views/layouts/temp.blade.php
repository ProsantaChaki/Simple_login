<!DOCTYPE html>
<html>
<head>
</head>
<body>

<form>
    <input type="text" id="input1"/>
    <input type="file" id="fileSelect"/>
    <button type="button" onclick="doSubmit()">Submit</button>
</form>


<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script>
    function doSubmit(){
        // Form Data
        var formData = new FormData();

        var fileSelect = document.getElementById("fileSelect");
        if(fileSelect.files && fileSelect.files.length == 1){
            var file = fileSelect.files[0]
            formData.set("image", file , file.name);
        }

        alert(formData)

        var input1 = document.getElementById("input1");
        formData.set("input1", input1.value)
        // Http Request
        alert('ok');
        var request = new XMLHttpRequest();
        request.open('POST', "http://donor.test/v1/photo");
        request.send(formData);
        alert(request)
    }
</script>
</body>
</html>
