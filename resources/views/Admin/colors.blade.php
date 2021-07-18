@extends('.Admin.layout.master')
@section('title_page','Colors || admin')
@section('header_page','Colors')
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
                            <h2 class="modal-title" id="myModalLabel">Add color</h2>
                            <br>
                        </div>
                        <div class="col-md-12 show_form">
                            <form action="{{route('Color_store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        Color code
                                        <input type="color" autocomplete="off" name="color_code" class="form-control" placeholder="Please enter category name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        Color name
                                        <input type="text" autocomplete="off" name="name" class="form-control" placeholder="Please enter category name">
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
                    <th class="table_item ">Color code</th>
                    <th class="table_item ">View color</th>
                    <th class="table_item">Status</th>
                    <th class="table_item">Created at</th>
                    <th class="table_item">Action</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 0 ; $i < sizeof($colors) ; $i++)
                    <tr class="gradeX">
                        <td class="table_item">{{$colors[$i]->id}}</td>
                        <td class="table_item">{{$colors[$i]->name}}</td>
                        <td class="table_item">{{$colors[$i]->color_code}}</td>
                        <td class="table_item">
                            <div style="height: 25px;width: 70%;background: {{$colors[$i]->color_code}};margin: auto;border: #848484 1px solid"></div>
                        </td>
                        @if($i % 2 == 0)
                            <td class="table_item">Active</td>
                        @else
                            <td class="table_item">De active</td>
                        @endif
                        <td class="table_item">12/12/2021</td>
                        <td class="table_item actions">
                            <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>

        </div>
        <input type="hidden" id="per_page_code" value="colors">
    </section>
@endsection
