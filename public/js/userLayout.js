
var id=-1, token='', photo='';
window.onload = function(){
    userInformationLoad();
    serverPostRequest();
};
//document.getElementById("fname").onchange = function() {myFunction()};


function userInformationLoad() {
    // alert('successful')
    try{
        var allCookieArray = document.cookie.split(';');
        for(var i=0; allCookieArray.length>i; i++){
            //alert(allCookieArray[i].split('=')[0])
            if(allCookieArray[i].split('=')[0]==' id'){
                id=allCookieArray[i].split('=')[1];
            }
            else if(allCookieArray[i].split('=')[0]==' token'){
                token=allCookieArray[i].split('=')[1];
            }
        }
    }
    catch (e) {
        alert ('alert');
    }
    //alert ('alert no');

    if(id>0){
        var url = 'http://donor.test/api/v1/users/'+ id;
        var method = 'GET';
        var data = false;
        var request = httpRequest(method, url, data);
        var respons  = JSON.parse(request.response);
        if(respons['data']['photo'].length>1)
            document.getElementById('profilePhoto').src =respons['data']['photo'];

        document.getElementById('loginVisibility').style.display = 'none';
        document.getElementById('profileVisibility').style.display = 'block';
        /* document.getElementById('messageVisibility').style.display = 'block';
        document.getElementById('notificationVisibility').style.display = 'block';*/
    }
    else {
        document.getElementById('loginVisibility').style.display = 'block';
        document.getElementById('profileVisibility').style.display = 'none';
        /*document.getElementById('messageVisibility').style.display = 'none';
        document.getElementById('notificationVisibility').style.display = 'none';*/
    }
}


function logout(){
    var url= 'http://donor.test/api/v1/logout/'+id;
    var method = 'GET';
    var data = false;
    var request = httpRequest(method, url, data);
    var allCookieArray = document.cookie.split(';');
    for(var i=0; allCookieArray.length>i; i++){
        document.cookie = allCookieArray[i].split('=')[0]+'=; Max-Age=-99999999;';
    }
    id=-1;
    token='';
    photo='';
    userInformationLoad();
    //window.location.reload(true);

}


function userRegistration(theForm) {
    var time= 0 ;
    try{
        alert(document.querySelector('.messageCheckbox:checked').value)
        (document.querySelector('.messageCheckbox:checked').value)
        time = 60;
    }
    catch (e) {

    }

    var data = JSON.stringify({
        'name' :document.getElementById("r_name").value,
        'email' : document.getElementById("r_email").value,
        'mobile' : document.getElementById("r_mobile").value,
        'password' : document.getElementById("r_password").value,
        'c_password' :document.getElementById("r_c_password").value,
    });

    var request = new XMLHttpRequest();
    request.open("POST", "http://donor.test/api/v1/register", false);
    request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    request.send(data);
    if(request.status = 200) {
        setCookies(request.response);
        document.getElementById("r_password").value= '';
        document.getElementById("r_c_password").value= '';

    }
    //userInformationLoad();
}

function setCookies(data ) {

    var date = new Date();
    date.setTime(date.getTime() + (60*24*60*60*1000));

    var respons  = JSON.parse(data);
    var u_id     = respons['data']['id'];
    var u_name   = respons['data']['name'];
    var u_token  = respons['data']['token'];
    var expires  = date.toUTCString();
    document.cookie = 'name=' + u_name + ";" + "expires=" + expires + ";path=/";
    document.cookie = 'id=' + u_id + ";" + "expires=" + expires + ";path=/";
    document.cookie = 'token=' + u_token + ";" + "expires="+ expires + ";path=/";


    userInformationLoad();
    //window.location.reload(true);

}

function userLogin(form) {
    // var checkedValue = document.querySelector('.messageCheckbox:checked').value;
    // New XMLHTTPRequest
    if(document.getElementById("email").value.length >1 && document.getElementById("password").value.length>6){
        var data = JSON.stringify({
            'email' : document.getElementById("email").value,
            'password' : document.getElementById("password").value
        });
        var url =  "http://donor.test/api/v1/login";
        var method = 'POST';
        //var data  = false;
        var request = httpRequest(method, url, data)
        if(request.status == 200) {
            setCookies(request.response);
            document.getElementById("email").value = '';
            document.getElementById("password").value= '';
        }
        else{
            alert('Login failed, Try again')
        }
    }
    else{
        alert('Enter Correct Login Data')
    }
}

function navMargin() {
    if($(window).width()<769){
        document.getElementById("myNavbar").style.marginTop = '56px';
    }
}
// Script to open and close sidebar when on tablets and phones
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

$(window).resize(function(){
    if($(window).width()<769){
        document.getElementById("myNavbar").style.marginTop = '56px';
    }
    else {
        document.getElementById("myNavbar").style.marginTop = '0px';

    }
});

document.getElementById("myNavbar").style.marginTop = '0px';


function httpRequest(method, url, data) {
    var request = new XMLHttpRequest();
    request.open(method, url, false);
    request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    request.setRequestHeader("Authorization", 'Bearer '+token);
    request.send(data);
    return request;

}

