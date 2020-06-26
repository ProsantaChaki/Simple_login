@extends('layouts.userDashboardLayout')

@section('content')

    <div class="w3-container"  style="overflow: auto; margin-top: 10px; max-height: 100% ">
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">Post Title</th>
                <th scope="col">Post Type</th>
                <th scope="col">Activities</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody id="activities">
            </tbody>

        </table>
        <div style="align-content: center" id="page"></div>

    </div>
    <script src="{{ url('/') }}/js/staticText.js"></script>
    <script src="{{ url('/') }}/js/pagination.js"></script>
    <script src="{{ url('/') }}/js/common.js"></script>

    <script>
        getActivities()

        function getActivities() {
            url = project_url+'api/v1/user/activities';
            var request = httpRequest('GET', url, false);
            var data = JSON.parse(request.response);
            htmlData = ''
            $.each(data.data.data,function (key, activiteis) {
                htmlData = htmlData + htmlPostDataGenerator(activiteis)
            })
            var pagination = paginationGenarator(data.data)
            document.getElementById('activities').innerHTML=htmlData;
            document.getElementById('page').innerHTML= pagination;

        }
        function htmlPostDataGenerator(data) {
            //alert(data['id']);
            //return false;
            var activities = '';
            activities += data['created']==1? ' Created': '';
            activities += data['verified']==1? ' Verified': '';
            activities += data['interested']==1? ' Interested': '';
            activities += data['received']==1? ' Received': '';
            html = '<tr>\n' +
                '       <th scope="row">'+data["post"]["title"]+'</th>\n' +
                '       <td>'+data["post"]["post_type"]+'</td>\n' +
                '       <td>'+activities+'</td>\n' +
                '       <td>'+data["updated_at"]+'</td>\n' +
                '    </tr>'

            return html;
        }

        function getPostData(urlId) {
            url =  project_url+'api/v1/user/activities?page='+ urlId;
            var request = httpRequest('GET', url, false);
            var data = JSON.parse(request.response);
            htmlData = ''
            $.each(data.data.data,function (key, activiteis) {
                htmlData = htmlData + htmlPostDataGenerator(activiteis)
            })
            var pagination = paginationGenarator(data.data)
            document.getElementById('activities').innerHTML=htmlData;
            document.getElementById('page').innerHTML= pagination;


        }

    </script>

@endsection



