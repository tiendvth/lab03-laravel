@extends('.Admin.layout.master')
@section('title_page','Categories || admin')
@section('header_page','Categories')
@section('main')
    <section class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                        <button id="addToTable" class="btn btn-primary" data-toggle="modal" data-target="#modalBootstrap">Add <i class="fa fa-plus"></i></button>
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
                            <h2 class="modal-title" id="myModalLabel">New Category</h2>
                            <br>
                        </div>
                        <div class="col-md-12 show_form">
                            <form action="{{route('category_store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-7">
                                        Name
                                        <input type="text" autocomplete="off" name="name" class="form-control" placeholder="Please enter category name">
                                    </div>
                                    <div class="form-group col-md-5">
                                        Thumbnail <br>
                                        <img id="preview_cate_thumbnail" style="height: 45px;border-radius: 3px"
                                             src="https://kenh14cdn.com/2020/8/28/photo-1-15986171022051518128948.jpg">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        Thumbnail
                                        <input type="text" name="thumbnail" id="cate_thumbnail" class="form-control" placeholder="Enter url img">
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
                    <th class="table_item ">Name</th>
                    <th class="table_item">Thumbnail</th>
                    <th class="table_item">Status</th>
                    <th class="table_item">Created at</th>
                    <th class="table_item">Action</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 0 ; $i < sizeof($categories) ; $i++)
                    <tr class="gradeX">
                        <td class="table_item">{{$categories[$i]->id}}</td>
                        <td class="table_item">{{$categories[$i]->name}}</td>
                        <td class="table_item">
                            <img class="cate_thumnail" src="{{$categories[$i]->thumbnail}}">
                        </td>

                        @if($categories[$i]->status == \App\Enums\Category_status::ACTIVE)
                            <td class="table_item">Active</td>
                        @else
                            <td class="table_item">De active</td>
                        @endif
                        <td class="table_item">{{$categories[$i]->created_at}}</td>

                        <td class="table_item actions">
                            <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>

            <div class="row datatables-footer">
                <div class="col-sm-12 col-md-6">
                    {{$categories->links()}}
                </div>
            </div>
        </div>
        <input type="hidden" id="per_page_code" value="categories">
    </section>
@endsection
