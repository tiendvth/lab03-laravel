@extends('.Admin.layout.master')
@section('title_page','Orders || admin')
@section('header_page','Orders')
@section('main')
    <section class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                        <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped mb-none" id="datatable-editable">
                <thead>
                <tr>
                    <th class="table_item">Id</th>
                    <th class="table_item ">total</th>
                    <th class="table_item ">Customer name</th>
                    <th class="table_item ">Customer email</th>
                    <th class="table_item ">Customer address</th>
                    <th class="table_item ">Customer phone</th>
                    <th class="table_item">Status</th>
                    <th class="table_item">Created at</th>
                    <th class="table_item">Action</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 0 ; $i < 10 ; $i++)
                    <tr class="gradeX">
                        <td class="table_item">{{$i+1}}</td>
                        <td class="table_item">{{$i+2}}</td>
                        <td class="table_item">nguyen xuan hjnh</td>
                        <td class="table_item">hjnh@gmail.com</td>
                        <td class="table_item">kim quan thach that ha noi</td>
                        <td class="table_item">097998778{{$i}}</td>
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

            <div class="row datatables-footer">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_paginate paging_bs_normal" id="datatable-editable_paginate">
                        <ul class="pagination">
                            <li class="prev disabled"><a href="#"><span class="fa fa-chevron-left"></span></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li class="next"><a href="#"><span class="fa fa-chevron-right"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="per_page_code" value="orders">
    </section>
@endsection
