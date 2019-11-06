

var id=-1, token='', photo='';
userInformationLoad();

function userInformationLoad() {
    //alert('successful')
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
}
serverPostRequest()

function serverPostRequest() {
    var method = 'GET';
    var url = 'http://donor.test/api/v1/post/user/'+ id;
    var data = false;
    var request = httpRequest(method, url, data);
    var data = JSON.parse(request.response);
    var htmlData = '';
    for(var i = 0; i<data[0]['data'].length; i++){
        htmlData = htmlData + htmlPostDataGenerator(data[0]['data'][i])
    }
    //document.getElementById('posts').innerHTML = htmlData;
    var pagination = paginationGenarator(data[0])
    document.getElementById('posts').innerHTML = htmlData + pagination;
    //alert(data[0]['data'])
}

function htmlPostDataGenerator(data) {
    //alert(data['id'])
    var comment = '';
    if(data['post_type'] == 'Want to donate'){
        comment = 'Received this.'
    }
    else{
        comment = 'Donate this.'
    }
    var select = {}
    select[data['post_status']]= 'selected';
    var html = '            <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >\n' +
        '                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">\n' +
        '                    <a href="single.html" class="img img-2">\n' +
        '                        <img src='+ data['photo'][0] +' style="height: auto; max-height: 180px; width: 100%; max-width: 300px; ">\n' +
        '                    </a>\n' +
        '                </div>\n' +
        '                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" >\n' +
        '                    <h4 class="mb-2"><a onclick="openSinglePost(1)" name="title">'+ data['title'] +' </a></h4>\n' +
        '                    <div class="text text-2 pl-md-4">\n' +
        '                        <div class="meta-wrap">\n' +
        '                            <p class="meta">\n' +
        '                                <span name="date"><i class="icon-calendar mr-2"></i>J'+ data['created_at'] +' </span>\n' +
        '                                <span class="text-primary" style="font-weight: bold" name="type"><i class="mr-2 "></i>'+ data['post_type'] +'</span>\n' +
        '                            </p>\n' +
        '                        </div>\n' +
        '                        <p onclick="openSinglePost(1)"><b>'+ data['number_people'] +'</b> People are interested on this</p>\n' +
        '                        <div class="meta-wrap">\n' +
        '                            <p class="meta">\n' +
        '                                <span class="text-primary">'+ data['receiver_name'] +'</span>\n' +
        '                                <span > '+ comment +'</span>\n' +
        '                            </p>\n' +
        '                        </div>\n' +
        '                        <select id="post_type" class="chosen md-3 form-control " placeholder="ype of Post" required>\n' +
        '                            <option value="Available" '+ select['Available'] +'>Available</option>\n' +
        '                            <option value="Reserved" '+ select['Reserved'] +'>Reserved</option>\n' +
        '                            <option value="Occupied"'+ select['Occupied'] +'>Occupied</option>\n' +
        '                            <option value="Delete" '+ select['Occupied'] +'>Delete</option>\n' +
        '                        </select>\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '            </div>\n'
    return html;
}


function httpRequest(method, url, data) {
    var request = new XMLHttpRequest();
    request.open(method, url, false);
    request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    request.setRequestHeader("Authorization", 'Bearer '+token);
    request.send(data);
    return request;
}

