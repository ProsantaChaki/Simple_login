@extends('layouts.userDashboardLayout')

@section('content')
    <div class="container" style="background-color: #ffffff; max-width: 800px">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header"><h4>Update Information </h4></div>
                    <hr/>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"></label>

                                <div class="col-md-7 text-center">
                                    <img id="photo" name="photo" src="#" class="avatar img-circle img-thumbnail" alt="avatar" style="max-height: 200px; width: auto">
                                    <h6>Upload a different photo...</h6>
                                    <button id="imageUpload" type="submit" class="btn btn-primary ext-center center-block"  style="display: none; margin-bottom: 7px ">
                                        <i class="fa fa-cloud-upload" style="font-size: 20px"></i>
                                        Update Image
                                    </button>
                                    <input type="file" id="photoupload" name="photoupload" class="text-center center-block well well-sm" accept="image/*" onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0]); document.getElementById('imageUpload').style.display = 'block'">

                                </div>
                            </div>
                        </form>
                        <form>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control " name="email" placeholder="Your Email Address" required autocomplete="email" pattern="\S+@\S+\.\S+">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                                <div class="col-md-7">
                                    <select id="gender" class="chosen md-3 form-control" placeholder="Your Gender" required>
                                        <option value="" disabled selected>Your Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Shemale">Shemale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right" >Date of Birth</label>

                                <div class="col-md-7">
                                    <input id="birthday" type="date" class="form-control" name="birthday" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="occupation" class="col-md-4 col-form-label text-md-right">Occupation</label>

                                <div class="col-md-7">
                                    <select id="occupation" class="chosen md-3 form-control" placeholder="Your Occupation" required>
                                        <option value="" disabled selected>Your Occupation Type</option>
                                        <option value="Actor">Actor</option>
                                        <option value="Banker">Banker</option>
                                        <option value="Student">Student</option>
                                        <option value="Teacher">Teacher</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="marital_status" class="col-md-4 col-form-label text-md-right">Marital Status</label>

                                <div class="col-md-7">
                                    <select id="marital_status" class="chosen md-3 form-control" required>
                                        <option value="" disabled selected>Your Marital Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="blood_group" class="col-md-4 col-form-label text-md-right">Blood Group</label>

                                <div class="col-md-7">
                                    <select id="blood_group" class="chosen md-3 form-control" required>
                                        <option value="" disabled selected>Your Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="weight" class="col-md-4 col-form-label text-md-right">Weight</label>

                                <div class="col-md-7">
                                    <input id="weight" type="number" class="form-control " name="weight" placeholder="Require if You Want To Donate Blood">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Area</label>

                                <div class="col-md-7">
                                    <input id="area" type="text" class="form-control " name="area" placeholder="Click to Enter Your Address" readonly  onclick="activateArea(); this.onclick=null;" ondblclick="activateArea()" required>
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
                                    <input id="address" type="text" class="form-control " name="address" value="{{ old('address') }}" placeholder="Your Address" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-7">
                                    <textarea rows="4" id="description" type="text" class="form-control " name="description" placeholder="Describe Yourself within 50 words"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-4">
                                    <button type="submit" class="btn btn-primary"  onclick="userInformationUpdate()">
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

        $(document).ready(function() { /*  here */

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
                var request = new XMLHttpRequest();
                var url = 'http://donor.test/api/v1/users/'+ id;
                request.open("GET", url, false);
                request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
                request.setRequestHeader("Authorization", 'Bearer '+token);
                request.send(data);

                respons  = JSON.parse(request.response);

                respons['data']['photo']= "{{ url('/') }}"+respons['data']['photo'];
            }
            catch (e) {
                console.log(e)
            }
            for(var i=0; i<idlist.length; i++){
                if (idlist[i] in respons['data']){
                    if(idlist[i]=='photo'){
                        document.getElementById(idlist[i]).src =respons['data'][idlist[i]];
                    }
                    else if(idlist[i]=='area'){
                        document.getElementById(idlist[i]).value =respons['data'][idlist[i]];
                        areaId = respons['data']['area_id'];
                    }
                    else{
                        document.getElementById(idlist[i]).value =respons['data'][idlist[i]];
                    }
                }
            }

        });



        var division = ['Dhaka','Chittagong', 'Khulna', 'Sylhet','Barisal','Rajshahi'];
        var idlist = ['photo','name','email','gender','birthday','occupation','marital_status','blood_group','weight','address','description','area'];
        var areaTypes =['division','district','subordinate','branch'];
        var selectedArea = [], areaId = 0 , areaTypeId=0, areaType=[];
        var id='', token='';
        var onloadData = {};
        var respons;

        function activateArea() {
            selectedArea = [];
            areaId = 0;
            areaTypeId=0;
            areaType=[];

            document.getElementById('area').value = '';
            document.getElementById('area').placeholder = 'Select Your Division';
            document.getElementById('selectarea').value = '';
            document.getElementById('selectarea').style.display = 'block';
            document.getElementById('selectarea').placeholder = 'Select Division';
            document.getElementById('data').innerHTML = areaDataGenerator(division);
            areaType = division;
            areaTypeId++;
        }

        function areaDataFeatch(areaTypes , name, areaTypesNext){
            var request = new XMLHttpRequest();
            var url = 'http://donor.test/api/v1/area/'+ areaTypes + '/' + name;
            request.open("GET", url, false);
            request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            request.send(data);
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
                    return  areaDataGenerator(areaType);
                }
            }
            else{
                alert('something wrong');
                return '<option value= none>';
            }
        }

        function areaDataGenerator(name) {

            var htmldata = '';
            for(var i=0; name.length>i; i++){
                htmldata = htmldata + "<option value= '"+ name[i] +"'>"
            }
            return htmldata;

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

        function userInformationUpdate(form) {
            var data={}
            for(var i=0; i<idlist.length; i++){
                if(idlist[i]!='photo'){
                    data[idlist[i]]=document.getElementById(idlist[i]).value;
                }
            }
            data['area_id'] = areaId;
            var data = JSON.stringify(data);
            var url = 'http://donor.test/api/v1/users/'+ id + '/update';
            var method =  'POST';
            var request= httpRequest(method, url, data);

            alert(request.status)
            alert(request.response)


        }

        function httpRequest(method, url, data) {
            var request = new XMLHttpRequest();
            request.open(method, url, false);
            request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            request.setRequestHeader("Authorization", 'Bearer '+token);
            request.send(data);
            return request;

        }

        function updatePhoto() {
        }



    </script>
@endsection
