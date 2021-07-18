@extends('.Admin.layout.master')
@section('title_page','Product Options || admin')
@section('header_page','Product Options')
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
                    <th class="table_item">Product</th>
                    <th class="table_item">Size</th>
                    <th class="table_item">Color</th>
                    <th class="table_item ">Quantity</th>
                    <th class="table_item">Status</th>
                    <th class="table_item">Action</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 0 ; $i < sizeof($options) ; $i++)
                    <tr class="gradeX">
                        <td class="table_item">{{$options[$i]->id}}</td>
                        <td class="table_item">{{$options[$i]->products->name}}</td>
                        <td class="table_item">{{$options[$i]->sizes->name}}</td>
                        <td class="table_item">
                            <div style="height: 25px;width: 70%;background: {{$options[$i]->colors->color_code}};margin: auto;border: #bebebe 1px solid"></div>
                        </td>
                        <td class="table_item">{{$options[$i]->quantity}}</td>
                        @if($options[$i]->status == \App\Enums\Product_option_status::ACTIVE)
                            <td class="table_item">Con hang</td>
                        @else
                            <td class="table_item">Het hang</td>
                        @endif
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
        <input type="hidden" id="per_page_code" value="product_options">
    </section>
@endsection
