@extends('.Admin.layout.master')
@section('title_page','Form || admin')
@section('header_page','Form')
@section('main')
    <div class="col-md-12 container_form">
        <div class="col-md-5 show_form">
            <h1>Register</h1><br>
            <form action="#" method="post">
                <div class="row">
                    <div class="form-group col-md-5">
                        User name
                        <input type="text" class="form-control" placeholder="User name">
                    </div>
                    <div class="form-group col-md-7">
                        Email
                        <input type="email" class="form-control" placeholder="email">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        Password
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group col-md-6">
                        Confirm password
                        <input type="password" class="form-control" placeholder="Confirm password">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-9">
                        Avatar
                        <input type="password" class="form-control" placeholder="Avatar">
                    </div>
                    <div class="form-group col-md-3">
                        Avatar
                        <img style="height: 45px;border-radius: 3px"
                             src="https://kenh14cdn.com/2020/8/28/photo-1-15986171022051518128948.jpg">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-9">
                        Cover photo
                        <input type="password" class="form-control" placeholder="Cover photo">
                    </div>
                    <div class="form-group col-md-3">
                        Cover photo
                        <img style="height: 45px;border-radius: 3px"
                             src="https://kenh14cdn.com/2020/8/28/photo-1-15986171022051518128948.jpg">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        Birthday
                        <input type="date" class="form-control" placeholder="Birthday">
                    </div>
                    <div class="form-group col-md-6">
                        Phone number
                        <input type="text" placeholder="Phone number" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        Address
                        <input type="text" class="form-control" placeholder="Address">
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="form-group col-md-6">
                        <button class="btn btn-primary form-control">Create</button>
                    </div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-warning form-control">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
