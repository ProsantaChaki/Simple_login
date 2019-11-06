
var id=-1, token='', photo='';
window.onload = function(){
    userInformationLoad();
    serverPostRequest();
};
//document.getElementById("fname").onchange = function() {myFunction()};
document.getElementById("myNavbar").style.marginTop = '0px';


var filter = {
    sort:[],
    type:[],
    category: [],
    sub_category:[],
    division:[],
    district:[]
}
$(window).resize(function(){
    if($(window).width()<769){
        document.getElementById("myNavbar").style.marginTop = '56px';
    }
    else {
        document.getElementById("myNavbar").style.marginTop = '0px';

    }
});

$("#sortby")
    .change(function(){
        filter['sort'] = document.getElementById('sortby').value;
        //alert(filter['sort'])
        serverPostRequest();
    });

$("#typeof")
    .change(function(){
        filter['type']=$('input[name="typeofvalue"]:checked', '#typeof').val();
        serverPostRequest();
        //alert(filter['type'])
    });

$("#category")
    .change(function(){
        var categories = [];
        $(':checkbox:checked').each(function(i){
            categories[i] = $(this).val();
        });
        if(categories.length==0){
            filter['sub_category'] = [];
        }
        filter['category']=categories;
        var data ={'category': categories}
        //alert(data['category']);
        var data = JSON.stringify(data);
        var url =  "http://donor.test/api/v1/subcategory";
        var request = httpRequest('POST', url, data);
        //alert(request.response)
        var sub_category = JSON.parse(request.response);
        //alert(request.response);
        var htmldata = '';
        for(var i=0; sub_category['data']['sub_category'].length>i; i++){
            htmldata = htmldata + "<option value= '"+ sub_category['data']['sub_category'][i] +"'>"+ sub_category['data']['sub_category'][i] +"</option>"
        }
        document.getElementById('sub_category').innerHTML = htmldata;
        serverPostRequest();
    });

$("#sub_category")
    .change(function(){
        filter['sub_category'] = document.getElementById('sub_category').value;
        serverPostRequest();
    });

$("#division")
    .change(function(){
        filter['division'] = document.getElementById('division').value;
        var url = 'http://donor.test/api/v1/area/division/' + document.getElementById('division').value;
        var request = httpRequest('GET', url, false);
        var district = JSON.parse(request.response);
        var htmldata = '';
        for(var i=0; district['data']['district'].length>i; i++){
            htmldata = htmldata + "<option value= '"+ district['data']['district'][i] +"'>"+ district['data']['district'][i] +"</option>"
        }
        document.getElementById('district').innerHTML = htmldata;
        //alert ('division')
        serverPostRequest();
    });

$("#district")
    .change(function(){
        filter['district'] = document.getElementById('district').value;
        /*alert(filter['district'])
        alert(filter['division'])
        alert(filter['sub_category'])
        alert(filter['category'])
        alert(filter['type'])
        alert(filter['sort'])*/
        serverPostRequest();

    });

function serverPostRequest() {
    var method = 'POST';
    var url = 'http://donor.test/api/v1/all/post';
    var data = JSON.stringify(filter);
    var request = httpRequest(method, 'http://donor.test/api/v1/all/post', data);
    var data = JSON.parse(request.response);
    var htmlData = '';
    for(var i = 0; i<data[0]['data'].length; i++){
        htmlData = htmlData + htmlPostDataGenerator(data[0]['data'][i])
    }
    var pagination = paginationGenarator(data[0])
    document.getElementById('posts').innerHTML = htmlData + pagination;
    //alert(data[0]['data'])
}

function getPostData(url) {
    url = 'http://donor.test/api/v1/all/post?page='+ url;
    var data = JSON.stringify(filter);

    //alert(url)
    var request = httpRequest('POST', url, data);
    var data = JSON.parse(request.response);
    var htmlData = '';
    for(var i = 0; i<data[0]['data'].length; i++){
        htmlData = htmlData + htmlPostDataGenerator(data[0]['data'][i])
    }
    //alert(htmlData)
    var pagination = paginationGenarator(data[0])
    document.getElementById('posts').innerHTML = htmlData + pagination;

}

function htmlPostDataGenerator(data) {
    //alert(data['id'])
    var html = '<div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >\n' +
        '                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">\n' +
        '                    <a href="single.html" class="img img-2">\n' +
        '                        <img src='+ data['photo'][0] +' style=" max-width: 200px; max-height:170px;">\n' +
        '                    </a>\n' +
        '                </div>\n' +
        '                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" style="alignment: right;">\n' +
        '                    <h4 class="mb-2"><a href="#" name="title">'+ data['title']+'</a></h4>\n' +
        '                    <div class="text text-2 pl-md-4">\n' +
        '                        <p class="mb-4" name="sub_title">'+ data['sub_title']+'</p>\n' +
        '                        <div class="meta-wrap">\n' +
        '                            <p class="meta">\n' +
        '                                <span name="date"><i class="icon-calendar mr-2"></i>'+ data['created_at']+'</span>\n' +
        '                                <span class="text-primary" style="font-weight: bold" name="type"><i class="mr-2 "></i>'+ data['post_type']+'</span>\n' +
        '                            </p>\n' +
        '                        </div>\n' +
        '                        <p class="mb-4" name="area">'+ data['area']+'</p>\n' +
        '                        <div class="meta-wrap">\n' +
        '                            <label class="text-primary" name="status" >'+ data['post_status']+'</label>\n' +
        '                            <label style="float: right; display: block" name><i class="fa fa-heart-o" style="font-size:24px;" ></i></label>\n' +
        '                            <label style="float: right; display: none "><i class="fa fa-heart" style="font-size:24px; color: blueviolet"></i></label>\n' +
        '\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '            </div>\n'
    return html;
}


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

function httpRequest(method, url, data) {
    var request = new XMLHttpRequest();
    request.open(method, url, false);
    request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    request.setRequestHeader("Authorization", 'Bearer '+token);
    request.send(data);
    return request;
}

