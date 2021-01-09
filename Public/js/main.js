if (window.location.href == "http://localhost/camagru/posts/add")
{

    var video = document.getElementById('video'),
        canvas = document.getElementById('pic'),
        context = canvas.getContext('2d'),
        imagefile = document.getElementById('upFile');
    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
    {
        navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
        {
        try {
                video.src = window.URL.createObjectURL(stream);
        } catch (error) {
                video.srcObject = stream;
            }
            video.play();
            camera_allowed = 1;
        }
        );
    } else if(navigator.webkitGetUserMedia) {
    navigator.webkitGetUserMedia({ video: true }, function(stream){
        try {
                video.src = window.URL.createObjectURL(stream);
            } catch (error) {
                    video.srcObject = stream;
            }
        video.play();
        camera_allowed = 1;
    }, function(err) {
            console.log("The following error occurred: " + err.name);
        });
    }

    document.getElementById('take').addEventListener("click", function(){
        context.drawImage(video, 0, 0, 500, 400);
        context.drawImage(elem, 0, 0, 100, 100);
    });

    document.getElementById('clear').addEventListener("click", function(){
    context.clearRect(0, 0, 500, 400);
    });

    mask = document.getElementById('mask'),
    covid = document.getElementById('covid'),
    ball = document.getElementById('ball'),
    hat = document.getElementById('hat');

    var elem = document.createElement('img');
    elem.setAttribute("height", "100");
    elem.setAttribute("width", "100");
    elem.setAttribute("id", "filters");

    function choose_filter()
    {
        if (mask.checked == true)
            elem.src = "../public/img/mask.png";
        if (covid.checked == true)
            elem.src = "../public/img/covid.png";
        if (ball.checked == true)
            elem.src = "../public/img/ball.png";
        if (hat.checked == true)
            elem.src = "../public/img/hat.png";

        document.getElementById('vi').appendChild(elem); 
    }

    window.addEventListener('DOMContentLoaded', initImageLoder);
    function initImageLoder(){
        imagefile.addEventListener('change', handleManualUploadedFiles);
 
        function handleManualUploadedFiles(ev){
            var file = ev.target.files[0];
            handleFile(file);
        }
    }
    function handleFile(file){
        var reader = new FileReader();
        reader.onloadend = function(e){
            var tempImageStore =  new Image();
 
            tempImageStore.onload = function(ev){
                h = ev.target.height;
                w = ev.target.width;
                context.clearRect(0, 0, w , h);
                context.drawImage(ev.target, 0, 0, 400, 300);
                document.getElementById('save').disabled = false;
                document.getElementById('clear').disabled = false;
            }
            tempImageStore.src = ev.target.result;
        }
        reader.readAsDataURL(file);
    }
    document.getElementById('save').addEventListener('click', function(){
        if (imgfilter.src != "")
            {
               saveImage();
               reloadDIV();
               h = canvas.height;
               w = canvas.width; 
               context.clearRect(0, 0, w , h);
               context.strokeRect(0, 0, w, h);
            }
            else {
                alert("Choose a sticker");
                document.getElementById('capture').disabled = true;
            }
    });
    
    
    function saveImage(){
        var canvasData = canvas.toDataURL("image/png");
        var params = "imgBase64="+canvasData+"&filtstick="+stick;
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', 'http://localhost/Camagru/Posts/takeImage');
        xhttp.withCredentials = true;
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function(){if (this.readyState == 4 && this.status == 200){}}
        xhttp.send(params);
    }
    function reloadDIV () {document.getElementById("ba3").innerHTML.reload}
    
}
function editShow() {
    document.getElementById('edit_div').style.display = "block";
    document.getElementById('edit_profile').style.display = "none";
}
function editHide() {
    document.getElementById('edit_div').style.display = "none";
    document.getElementById('edit_profile').style.display = "block";
}
