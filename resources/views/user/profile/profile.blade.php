@extends('user.user')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style=" background-color: #ffffff">
    <div class="row col-md-10" style=" background-color: #ffffff">
        <table class="table table-bordered success">
            <thead>
            <tr >
                <th >Full Name</th>
                <td>Vikram</td>
            </tr>
            <tr>
                <th class="info">Address</th>
                <td>India maharashtra Pune</td>
            </tr>
            <tr>
                <th class="info">Address</th>
                <td>India maharashtra Pune</td>
            </tr>
            <tr>
                <th class="info">Address</th>
                <td>India maharashtra Pune</td>
            </tr>
            <tr>
                <th class="info">Email</th>
                <td>lorem@mail.com</td>
            </tr>
            <tr>
                <th class="info">Contact</th>
                <td>+91 9999955555</td>
            </tr>

            <tr>
                <th class="info">State</th>
                <td>Maharashtra</td>
            </tr>
            <tr>
                <th class="info">City</th>
                <td>Pune</td>
            </tr>
            <tr >
                <th  class="info">Service List</th>
                <td>Service 1 , Service 2 , Serive 3</td>
            </tr>
            <tr>
                <th valign="top" class="info">Machine</th>
                <td>Machine1 , Machine2 , Machine3</td>
            </tr>
            <tr>
                <th class="info">Brand</th>
                <td>Audi</td>
            </tr>
            <tr>
                <th class="info">Specialization</th>
                <td>Lorem Ipsum that is dollor sign to write</td>
            </tr>

            <tr>
                <th class="info">Approval Status</th>
                <td><b>Active</b></td>
            </tr>

            <tr>
                <th class="info bg-info">Approval Date</th>
                <td class="bg-primary">14/12/2018</td>
            </tr>
            <tr>
                <th class="info bg-primary">Register Date</th>
                <td class="bg-info">10/12/2018 12:00:45</td>
            </tr>
            <tr>

                <form >

                    <th class="info">Action To Approval</th>
                    <td><select id="approv_status" name="approv_status" class="form-control">
                            <option value="">Select</option>
                            <option value="active"><b>Active</b></option>
                            <option value="inactive"><b>Inactive</b></option>
                        </select></td

                </form>
            </tr>
            </thead>

        </table>
    </div>
</div>
@endsection