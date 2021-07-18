@extends('.Admin.layout.master')
@section('title_page','Users || admin')
@section('header_page','Users')
@section('main')
    <section class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                        <button id="addToTable" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalBootstrap">Add <i class="fa fa-plus"></i></button>
                        <form action="" style="display: inline">

                            <input class="search_form" name="search" value="{{$search != "" ? $search : ""}}"
                                   type="text" placeholder="search">
                            <button class="btn-search">search</button>
                            <select name="role" data-plugin-multiselect class="check_role"
                                    style="width: 80px!important;">
                                <option {{$role == "" ? "selected" : ""}} value="">All</option>
                                <option {{$role == 1 ? "selected" : ""}} value="{{\App\Enums\User_role::ADMIN}}">Admin
                                </option>
                                <option {{$role == 2 ? "selected" : ""}} value="{{\App\Enums\User_role::USER}}">User
                                </option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalBootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content col-md-12">
                        <div class="col-md-12" style="padding-top: 30px">
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h2 class="modal-title" id="myModalLabel">New User</h2>
                            <br>
                        </div>
                        <div class="col-md-12 show_form">
                            <form action="{{route('user.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        User name
                                        <input name="user_name" type="text" class="form-control"
                                               placeholder="User name">
                                    </div>
                                    <div class="form-group col-md-7">
                                        Email
                                        <input name="email" type="email" class="form-control" placeholder="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        Password
                                        <input name="password" type="password" class="form-control"
                                               placeholder="Password">
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
                                               placeholder="Avatar">
                                    </div>
                                    <div class="form-group col-md-3">
                                        Avatar <br>
                                        <img id="preview_avatar_user" style="height: 45px;border-radius: 3px"
                                             src="https://kenh14cdn.com/2020/8/28/photo-1-15986171022051518128948.jpg">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-9">
                                        Cover photo <br>
                                        <input type="text" id="cover_photo" name="cover_photo" class="form-control"
                                               placeholder="Cover photo">
                                    </div>
                                    <div class="form-group col-md-3">
                                        Cover photo
                                        <img id="preview_cover_photo" style="height: 45px;border-radius: 3px"
                                             src="https://kenh14cdn.com/2020/8/28/photo-1-15986171022051518128948.jpg">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        Birthday
                                        <input type="date" name="birthday" class="form-control" placeholder="Birthday">
                                    </div>
                                    <div class="form-group col-md-6">
                                        Phone number
                                        <input type="text" name="phone" placeholder="Phone number" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        Address
                                        <input type="text" name="address" class="form-control" placeholder="Address">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <button class="btn btn-primary form-control">Create</button>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="reset" class="btn btn-warning form-control">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button style="display: none" type="button" class="btn btn-primary">Confirm</button>
                            <button style="display: none" type="reset" class="btn btn-default">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped mb-none" id="datatable-editable">
                <thead>
                <tr>
                    <th class="table_item">Id</th>
                    <th class="table_item">Avatar</th>
                    <th class="table_item">User name</th>
                    <th class="table_item">Email</th>
                    <th class="table_item">Phone</th>
                    <th class="table_item">Address</th>
                    <th class="table_item">Role</th>
                    <th class="table_item">Birthday</th>
                    <th class="table_item">Action</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 0 ; $i < sizeof($users) ; $i++)
                    <tr class="gradeX">
                        <td class="table_item">#{{$users[$i]->id}}</td>
                        <td class="table_item"><img class="Show_avatar"
                                                    src="/libs/assets/images/User_image/{{$users[$i]->avatar}}">
                        </td>
                        <td class="table_item">{{$users[$i]->user_name}}</td>
                        <td class="table_item">{{$users[$i]->email}}</td>
                        <td class="table_item">{{$users[$i]->phone}}</td>
                        <td class="table_item">{{$users[$i]->address}}</td>
                        @if($users[$i]->role === \App\Enums\User_role::ADMIN)
                            <td class="table_item" style="color: #c82333">Admin</td>
                        @else
                            <td class="table_item">User</td>
                        @endif
                        <td class="table_item">{{$users[$i]->birthday}}</td>
                        <td class="table_item actions">
                            <a href="{{route('user.edit',$users[$i]->id)}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                            <a href="{{route('user.show',$users[$i]->id)}}" class="on-default edit-row"><i class="fa fa-info-circle"></i></a>
                            @if($users[$i]->role != \App\Enums\User_role::ADMIN)
                                <a onclick="return confirm('Bằng cách đồng ý bạn sẽ cấp quyền quản trị cho người dùng này')" href="{{route('user.upgrade',$users[$i]->id)}}" class="on-default edit-row" style="margin: 0"><i class="fa fa-star"></i></a>
                            @endif
                            <form method="post" action="{{route('user.destroy',$users[$i]->id)}}" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không')" style="border: none;height: 0;width: 0"><i class="fa fa-trash-o" style="cursor: pointer"></i></button>
                            </form>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
            <div class="row datatables-footer">
                <div class="col-sm-12 col-md-6">
                    {{$users->links()}}
                </div>
            </div>
        </div>
        <input type="hidden" id="per_page_code" value="users">
    </section>
@endsection
