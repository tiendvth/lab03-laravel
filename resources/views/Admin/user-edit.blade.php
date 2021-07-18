@extends('.Admin.layout.master')
@section('title_page','User edit || admin')
@section('header_page','User edit')
@section('main')
    <section class="panel">
        <div class="col-md-12" style="display: flex;justify-content: center">
            <div class="col-md-5 show_form">
                <h1 style="margin-bottom: 30px">Edit User</h1>
                <form action="{{route('user.update',$user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-5">
                            User name
                            <input name="user_name" type="text" class="form-control"
                                   placeholder="User name" value="{{$user->user_name}}">
                        </div>
                        <div class="form-group col-md-7">
                            Email
                            <input name="email" type="email" class="form-control" placeholder="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            Password
                            <input name="password" type="password" class="form-control"
                                   placeholder="Password" >
                        </div>
                        <div class="form-group col-md-6">
                            Confirm password
                            <input type="password" class="form-control" placeholder="Confirm password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-9">
                            Avatar
                            <input type="text" name="avatar" id="avatar" class="form-control"
                                   placeholder="Avatar" value="{{$user->avatar}}">
                        </div>
                        <div class="form-group col-md-3">
                            Avatar <br>
                            <img id="preview_avatar_user" style="height: 45px;border-radius: 3px"
                                 src="{{$user->avatar}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-9">
                            Cover photo <br>
                            <input type="text" id="cover_photo" name="cover_photo" class="form-control"
                                   placeholder="Cover photo" value="{{$user->cover_photo}}">
                        </div>
                        <div class="form-group col-md-3">
                            Cover photo
                            <img id="preview_cover_photo" style="height: 45px;border-radius: 3px"
                                 src="{{$user->cover_photo}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            Birthday
                            <input type="date" name="birthday" class="form-control" placeholder="Birthday" value="{{$user->birthday}}">
                        </div>
                        <div class="form-group col-md-6">
                            Phone number
                            <input type="text" name="phone" placeholder="Phone number" class="form-control" value="{{$user->phone}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            Address
                            <input type="text" name="address" class="form-control" placeholder="Address" value="{{$user->address}}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <button class="btn btn-primary form-control">Update</button>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="reset" class="btn btn-warning form-control">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
