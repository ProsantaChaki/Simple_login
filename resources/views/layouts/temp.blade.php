@extends('layouts.userDashboardLayout')

@section('content')
    <div class="container" style="background-color: #ffffff; max-width: 800px">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header"><h4>Create a Post </h4></div>
                    <hr/>
                    <div class="card-body">

                        <form id="audit_submit" onsubmit="createPost()">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-7">
                                    <input id="title" type="text" class="form-control" name="title" placeholder="The Title of Your Post" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sub_title" class="col-md-4 col-form-label text-md-right">Sub-Title</label>

                                <div class="col-md-7">
                                    <input id="sub_title" type="sub_title" class="form-control" name="title" required placeholder="Sub-Title of Your Post"  >
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-7">
                                    <textarea rows="14" id="description" type="text" class="form-control " name="description" required placeholder="Describe within 200 words"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile Number</label>

                                <div class="col-md-7">
                                    <input id="mobile" type="mobile" disabled class="form-control " name="mobile">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="area" class="col-md-4 col-form-label text-md-right">Area</label>

                                <div class="col-md-7">
                                    <input id="area" type="text" class="form-control " required name="area" placeholder="Click to Enter Your Address" readonly  onclick="activateArea();">
                                    <input list="data" id="selectarea" class="chosen md-3 form-control" placeholder="Select Division"  onchange="addressPickup()" style="display: none; margin-top: 10px">
                                    <datalist id="data">
                                        <!--option value=" Dhaka">
                                        <option value="Firefox">
                                        <option value="Chrome">
                                        <option value="Opera"-->
                                    </datalist>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right" >Address</label>

                                <div class="col-md-7">
                                    <input id="address" type="text" class="form-control " name="address" required placeholder="Your Address" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                                <div class="col-md-7">
                                    <input id="category" type="text" class="form-control " name="area" required placeholder="Click to Enter Right Category" readonly  onclick="activateCategory();" >
                                    <input list="categorylist" id="selectcategory" required class="chosen md-3 form-control" placeholder="Select Category"  onchange="CategoryPickup()" style="display: none; margin-top: 10px">
                                    <datalist id="categorylist">
                                        <!--option value=" Dhaka">
                                        <option value="Firefox">
                                        <option value="Chrome">
                                        <option value="Opera"-->
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quality" class="col-md-4 col-form-label text-md-right" >Quality</label>

                                <div class="col-md-7">
                                    <div class="range range-primary">
                                        <input type="range" name="range" min="1" max="10" value="5" onchange="quality.value=value">
                                        <output id="quality">5</output>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post_type" class="col-md-4 col-form-label text-md-right">Type of Post</label>

                                <div class="col-md-7">
                                    <select id="post_type" class="chosen md-3 form-control" placeholder="ype of Post" required>
                                        <option value="Want to Donate" selected>Want to Donate</option>
                                        <option value="Asking For Donation">Asking For Donation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="financial_value" class="col-md-4 col-form-label text-md-right">Financial Value</label>

                                <div class="col-md-7">
                                    <input id="financial_value" type="number" class="form-control " name="financial_value" placeholder="Approximate Financial Value" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-4">
                                    <button type="submit" class="btn btn-primary" onclick="Validation()" >
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('/') }}/js/staticText.js"></script>


    <script>
        var id=-1, token='', photo='';
        window.onload = function(){
            userInformationLoad();
            serverPostRequest();
        };
        //document.getElementById("fname").onchange = function() {myFunction()};
        document.getElementById("myNavbar").style.marginTop = '0px';



        function serverPostRequest() {
            var method = 'GET';
            var url = project_url+'api/v1/post/user'+;
            var data = JSON.stringify(filter);
            var request = httpRequest(method, project_url+'api/v1/all/post', data);
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
            url = project_url+'api/v1/all/post?page='+ url;
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

        function paginationGenarator(data) {
            var currentPagenumber = data['current_page'];
            var lastPagenumber = data['last_page'];
            var url1= data['first_page_url'];
            //alert(lastPage)
            var firstPage ='<li class="page-item" ><a class="page-link" onclick= "getPostData(1)">1</a></li>\n';
            var lastPage ='<li class="page-item" ><a class="page-link" onclick= "getPostData('+lastPagenumber+')" >'+lastPagenumber+'</a></li>\n';
            var previousPage ='<li class="page-item"><a class="page-link"  onclick= "getPostData('+(currentPagenumber-1)+')">'+(currentPagenumber-1)+'</a></li>\n';
            var nextPage ='<li class="page-item" ><a class="page-link" onclick= "getPostData('+(currentPagenumber+1)+')">'+(currentPagenumber+1)+'</a></li>\n';
            var currentPage ='<li class="page-item active"><a class="page-link">'+currentPagenumber+'</a></li>\n';
            var empty = '<li class="page-item" style="border: none;"><a class="page-link" style="border: none; margin: 0px; padding-left: 0px; padding-right: 3px"> . . . . </a></li>\n';
            var htmlBefore ='<div class="col-md-12 col-sm-12 ftco-animate d-md-flex " style="padding-top: 10px; text-align: center;" >\n <ul class="pagination">\n';
            var htmlAfter = '</ul>\n </div>';

            var htmlRespons = '';


            if(lastPagenumber==1){
                htmlRespons = htmlBefore + currentPage + htmlAfter;
            }
            else if(lastPagenumber==2){

                if(currentPagenumber == 1){
                    htmlRespons = htmlBefore + currentPage + nextPage + htmlAfter;
                }
                else{
                    htmlRespons = htmlBefore + previousPage + currentPage + htmlAfter;
                }
            }
            else if(lastPagenumber==3){

                if(currentPagenumber == 1){
                    htmlRespons = htmlBefore + currentPage + nextPage + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 2){
                    htmlRespons = htmlBefore + previousPage + currentPage + lastPage + htmlAfter;
                }
                else{
                    htmlRespons = htmlBefore + firstPage + previousPage + currentPage + htmlAfter;
                }
            }
            else if(lastPagenumber==4){

                if(currentPagenumber == 1){
                    htmlRespons = htmlBefore + currentPage + nextPage + empty + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 2){
                    htmlRespons = htmlBefore + previousPage + currentPage + nextPage + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 3){
                    htmlRespons = htmlBefore + firstPage + empty + previousPage + currentPage + nextPage + htmlAfter;
                }
                else{
                    htmlRespons = htmlBefore + firstPage + empty + previousPage + currentPage + htmlAfter;
                }
            }
            else if(lastPagenumber==5){

                if(currentPagenumber == 1){
                    htmlRespons = htmlBefore + currentPage + nextPage + empty + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 2){
                    htmlRespons = htmlBefore + previousPage + currentPage + nextPage + empty + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 3){
                    htmlRespons = htmlBefore + firstPage + previousPage + currentPage + nextPage + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 4){
                    htmlRespons = htmlBefore + firstPage + empty + previousPage + currentPage + nextPage + htmlAfter;
                }
                else{
                    htmlRespons = htmlBefore + firstPage + empty + previousPage + currentPage + htmlAfter;
                }
            }
            else if(lastPagenumber==6){

                if(currentPagenumber == 1){
                    htmlRespons = htmlBefore + currentPage + nextPage + empty + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 2){
                    htmlRespons = htmlBefore + previousPage + currentPage + nextPage + empty + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 3){
                    htmlRespons = htmlBefore + firstPage + previousPage +  currentPage + nextPage  + empty + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 4){
                    htmlRespons = htmlBefore + firstPage + empty + previousPage + currentPage + nextPage + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 5){
                    htmlRespons = htmlBefore + firstPage + empty + previousPage + currentPage + nextPage + htmlAfter;
                }
                else{
                    htmlRespons = htmlBefore + firstPage + empty + previousPage + currentPage + htmlAfter;
                }
            }
            else{

                if(currentPagenumber == 1){
                    htmlRespons = htmlBefore + currentPage + nextPage + empty + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 2){
                    htmlRespons = htmlBefore + previousPage + currentPage + nextPage + empty + lastPage + htmlAfter;
                }
                else if(currentPagenumber == 3){
                    htmlRespons = htmlBefore + firstPage + previousPage + currentPage + nextPage  + empty + lastPage + htmlAfter;
                }
                else if(currentPagenumber == (lastPagenumber-2)){
                    htmlRespons = htmlBefore + firstPage + empty + previousPage + currentPage + nextPage + lastPage + htmlAfter;
                }
                else if(currentPagenumber == (lastPagenumber-1)){
                    htmlRespons = htmlBefore + firstPage + empty + previousPage + currentPage + nextPage + htmlAfter;
                }
                else if(currentPagenumber == lastPagenumber){
                    htmlRespons = htmlBefore + firstPage + empty + previousPage + currentPage + htmlAfter;
                }
                else{
                    htmlRespons = htmlBefore + firstPage + empty + previousPage + currentPage + nextPage + empty + lastPage + htmlAfter;
                }
            }

            return htmlRespons;
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
                var url = project_url+'api/v1/users/'+ id;
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
            var url= project_url+'api/v1/logout/'+id;
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

        function httpRequest(method, url, data) {
            var request = new XMLHttpRequest();
            request.open(method, url, false);
            request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            request.setRequestHeader("Authorization", 'Bearer '+token);
            request.send(data);
            return request;

        }


    </script>

@endsection
