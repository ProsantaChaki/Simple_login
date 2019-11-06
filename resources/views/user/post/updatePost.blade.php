@extends('layouts.userDashboardLayout')

@section('content')
    <div class="container" style="background-color: #ffffff; max-width: 800px">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header"><h4>Update Post </h4></div>
                    <hr/>
                    <div class="card-body">

                        <form id="audit_submit" onsubmit="updatePost()">
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
                                        <input id="quality-" type="range" name="range" min="1" max="10" value="5" onchange="quality.value=value">
                                        <output id="quality">5</output>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post_type" class="col-md-4 col-form-label text-md-right">Type of Post</label>

                                <div class="col-md-7">
                                    <select id="post_type" class="chosen md-3 form-control" value="Want to Donate" placeholder="Type of Post" required>
                                        <option value="Want to Donate" >Want to Donate</option>
                                        <option value="Asking For Donation">Asking For Donation</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post_type" class="col-md-4 col-form-label text-md-right">Post Status</label>

                                <div class="col-md-7">
                                    <select id="post_status" class="chosen md-3 form-control" placeholder="ype of Post" value="Available" required>
                                        <option value="Available" >Available</option>
                                        <option value="Reserved">Reserved</option>
                                        <option value="Occupied">Occupied</option>
                                        <option value="Delete">Delete</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post_condition" class="col-md-4 col-form-label text-md-right"> Condition</label>

                                <div class="col-md-7">
                                    <select id="post_condition" class="chosen md-3 form-control" placeholder="Condition" required>
                                        <option value="Used" selected>Used</option>
                                        <option value="New">New</option>
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
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var division = ['Dhaka','Chittagong', 'Khulna', 'Sylhet','Barisal','Rajshahi'];
        var idlist = [ 'title', 'sub_title', 'description', 'area', 'address', 'category', 'quality', 'mobile', 'post_status' , 'post_type', 'financial_value'];
        var areaTypes =['division','district','subordinate','branch'];
        var selectedArea = [], areaId = 0 , areaTypeId=0, areaType=[], selectedCategory=[], categoryId=0; categoryType=[]
        var id='', token='';
        var respons, postId=0;

        loadData()
        function loadData() {
            var CookieArray = document.cookie.split(';');

            for(var i=0; CookieArray.length>i; i++){
                if(CookieArray[i].split('=')[0]==' id'){
                    id=CookieArray[i].split('=')[1];
                }
                else if(CookieArray[i].split('=')[0]==' token'){
                    token=CookieArray[i].split('=')[1];
                }
            }

            var CookieArray = document.cookie.split(';');

            for(var i=0; CookieArray.length>i; i++){
                if(CookieArray[i].split('=')[0]==' id'){
                    id=CookieArray[i].split('=')[1];
                }
                else if(CookieArray[i].split('=')[0]==' token'){
                    token=CookieArray[i].split('=')[1];
                }
            }
            try{
                var url = 'http://donor.test/api/v1/post/user/'+ 7 + '/'+ 2;
                var method= 'GET';
                var data = false;
                var request = httpRequest(method, url, data);
                //alert(request.response)
                respons  = JSON.parse(request.response);
                //alert(respons['data']['id'])



                for(var i = 0; i<idlist.length; i++){
                    document.getElementById(idlist[i]).value = respons['data'][idlist[i]];
                }
                areaId = respons['data']['area_id'];
                categoryId = respons['data']['category_id'];
                document.getElementById('quality-').value = respons['data']['quality'];



            }
            catch (e) {
                console.log(e)
            }

        }


        function activateArea() {
            selectedArea = [];
            areaId = 0;
            areaTypeId=0;
            areaType=[];

            document.getElementById('area').value = null;
            document.getElementById('area').placeholder = 'Select Your Division';
            document.getElementById('selectarea').value = '';
            document.getElementById('selectarea').style.display = 'block';
            document.getElementById('selectarea').placeholder = 'Select Division';
            document.getElementById('data').innerHTML = optionDataGenerator(division);
            areaType = division;
            areaTypeId++;
        }

        function areaDataFeatch(areaTypes , name, areaTypesNext){
            var request = new XMLHttpRequest();
            var url = 'http://donor.test/api/v1/area/'+ areaTypes + '/' + name;
            var method = 'GET'
            var request = httpRequest(method, url, false)

            if(request.status = 200) {
                var tem = JSON.parse(request.response);
                if(selectedArea.length==4){
                    var temt= '';
                    for(i=3; i>-1; i--){
                        temt = temt + selectedArea[i] + ' , ';
                    }
                    temt = temt + tem['data']['post_code'];
                    areaId = tem['data']['id']
                    document.getElementById('area').value = temt;
                    document.getElementById('selectarea').style.display = 'none';
                }
                else {
                    areaType = tem['data'][areaTypesNext];
                    return  optionDataGenerator(areaType);
                }
            }
            else{
                alert('something wrong');
                return '<option value= none>';
            }
        }

        function addressPickup(){

            var selectedAreaData = document.getElementById('selectarea').value


            if(areaType.indexOf(selectedAreaData)>-1){
                selectedArea[selectedArea.length] =  selectedAreaData;
                document.getElementById('selectarea').style.backgroundColor = '#ffffff';

                var optionList = areaDataFeatch(areaTypes[selectedArea.length-1], selectedAreaData, areaTypes[selectedArea.length]) ;

                document.getElementById('data').innerHTML = optionList;
                document.getElementById('area').placeholder = 'Select Your '+ areaTypes[selectedArea.length].charAt(0).toUpperCase() + areaTypes[selectedArea.length].slice(1);
                document.getElementById('selectarea').placeholder = 'Select '+ areaTypes[selectedArea.length].charAt(0).toUpperCase() + areaTypes[selectedArea.length].slice(1);
                document.getElementById('selectarea').value = '';
            }
            else {
                document.getElementById('selectarea').style.backgroundColor = '#FFA07A';
            }
        }



        function activateCategory() {
            selectedCategory = [];
            categoryId = 0;
            document.getElementById('category').value = '';
            document.getElementById('category').placeholder = 'Select Appropriate Category';
            document.getElementById('selectcategory').value = '';
            document.getElementById('selectcategory').style.display = 'block';
            document.getElementById('selectcategory').placeholder = 'Select Category';
            document.getElementById('categorylist').innerHTML = categoryDataFeatch('category' , 'category')
        }

        function categoryDataFeatch(Types , name){
            var url = 'http://donor.test/api/v1/category/'+ Types + '/' + name;
            var method = 'GET';
            var request = httpRequest(method, url, false)

            //alert(request.response)

            if(request.status = 200) {
                var tem = JSON.parse(request.response);
                categoryType = tem['data'][Types];
                if(Types=='id'){
                    return tem['data'][Types];
                }
                else{
                    return  optionDataGenerator(tem['data'][Types]);
                }
            }
            else{
                alert('something wrong');
                return '<option value= none>';
            }
        }

        function CategoryPickup(){

            var selectedItem = document.getElementById('selectcategory').value;
            var type = '';
            if(selectedCategory.length == 0){
                if(categoryType.indexOf(selectedItem)>-1){

                    selectedCategory[selectedCategory.length] = selectedItem;
                    type = 'sub_category';
                    document.getElementById('selectcategory').style.backgroundColor = '#ffffff';
                    document.getElementById('categorylist').innerHTML = categoryDataFeatch(type, selectedItem) ;

                    document.getElementById('category').placeholder = 'Select Sub-Category';
                    document.getElementById('selectcategory').placeholder = 'Select Sub-Category';
                    document.getElementById('selectcategory').value = '';
                }
                else {
                    document.getElementById('selectcategory').style.backgroundColor = '#FFA07A';
                }
            }
            else{
                if(categoryType.indexOf(selectedItem)>-1){

                    selectedCategory[selectedCategory.length] = selectedItem;
                    type = 'id';
                    categoryId = categoryDataFeatch(type, selectedItem)[0] ;
                    document.getElementById('category').value = selectedCategory;
                    document.getElementById('selectcategory').style.display = 'none';
                }
                else {
                    document.getElementById('selectcategory').style.backgroundColor = '#FFA07A';
                }

            }

        }



        function httpRequest(method, url, data) {
            var request = new XMLHttpRequest();
            request.open(method, url, false);
            request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            request.setRequestHeader("Authorization", 'Bearer '+token);
            request.send(data);
            return request;

        }

        function optionDataGenerator(name) {
            var htmldata = '';
            for(var i=0; name.length>i; i++){
                htmldata = htmldata + "<option value= '"+ name[i] +"'>"
            }
            return htmldata;

        }


        function updatePost() {
            alert('came')
            var data={}
            data['category_id']=categoryId;
            data['area_id'] = areaId;
            data['id'] = postId;
            //data['user_id']=id;
            for(var i=0; i<idlist.length; i++){
                data[idlist[i]]=document.getElementById(idlist[i]).value;
                //alert(data[idlist[i]]);
            }
            //alert(data);
            var data = JSON.stringify(data);
            var url = 'http://donor.test/api/v1/post/update'+postId;
            var method =  'POST';
            var request= httpRequest(method, url, data);
            alert(request.response)
            postId = JSON.parse(request.response)['data']['id'];
            alert(postId)
            return false;

        }

        function Validation() {
            if(categoryId==0){
                activateCategory()
            }
            if(areaId==0){
                alert('area need')
                activateArea()
                document.getElementById('selectarea').style.backgroundColor = '#FFA07A';
                document.getElementById('financial_value').value = null

            }
            alert('validation')

        }

    </script>

@endsection
