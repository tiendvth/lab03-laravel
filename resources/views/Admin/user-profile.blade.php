@extends('.Admin.layout.master')
@section('title_page','User detail || admin')
@section('header_page','User detail')
@section('main')
    <section class="panel">
        <div class="col-md-12" style="display: flex;justify-content: center">
            <div style="padding: 0" class="col-md-7">
                <div style="width: 100%;text-align: center">
                    <img src="{{$user->cover_photo}}" style="height: 300px;width: 100%;object-fit: cover;border: #ff2c42 3px solid">
                    <img src="/libs/assets/images/User_image/{{$user->avatar}}" style="height: 150px;width: 150px;object-fit: cover;transform: translateY(-75px);border-radius: 50%;border: #ff2c42 3px solid">
                    <div style="width: 100%;text-align: center;transform: translateY(-60px)">
                        <table class="table table-bordered table-striped mb-none" id="datatable-editable">
                            <tbody>
                                <tr class="gradeX">
                                    <td style="width: 30%;font-weigth:bold;color:black" class="table_item">User name</td>
                                    <td class="table_item">{{$user->user_name}}</td>
                                </tr>
                                <tr class="gradeX">
                                    <td style="width: 30%;font-weigth:bold;color:black" class="table_item">Email</td>
                                    <td class="table_item">{{$user->email}}</td>
                                </tr>
                                <tr class="gradeX">
                                    <td style="width: 30%;font-weigth:bold;color:black" class="table_item">Phone</td>
                                    <td class="table_item">{{$user->phone}}</td>
                                </tr>
                                <tr class="gradeX">
                                    <td style="width: 30%;font-weigth:bold;color:black" class="table_item">Address</td>
                                    <td class="table_item">{{$user->address}}</td>
                                </tr>
                                <tr class="gradeX">
                                    <td style="width: 30%;font-weigth:bold;color:black" class="table_item">Role</td>
                                    <td class="table_item">{{$user->role == \App\Enums\User_role::USER ? 'User' : 'Admin'}}</td>
                                </tr>
                                <tr class="gradeX">
                                    <td style="width: 30%;font-weigth:bold;color:black" class="table_item">Birthday</td>
                                    <td class="table_item">{{$user->birthday}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" id="per_page_code" value="users">
                </div>
            </div>
        </div>
    </section>
@endsection
