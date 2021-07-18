@extends('.Admin.layout.master')
@section('title_page','Products || admin')
@section('header_page','Products')
@section('main')
    <section class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                        <button id="addToTable" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalBootstrap">Add <i class="fa fa-plus"></i></button>
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
                            <h2 class="modal-title" id="myModalLabel">Add Product</h2>
                            <br>
                        </div>
                        <div class="col-md-12 show_form">
                            <form action="{{route('product_store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        Product name
                                        <input type="text" name="name" autocomplete="off" class="form-control"
                                               placeholder="Enter Product name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        Price
                                        <input type="number" name="price" autocomplete="off" class="form-control"
                                               placeholder="Enter price" value="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        Thumbnail
                                        <input type="text" name="thumbnail" autocomplete="off" class="form-control"
                                               placeholder="Enter url thumbnail">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-9">
                                        Images
                                        <input id="url_images" type="text" autocomplete="off" class="form-control"
                                               placeholder="Enter url image">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <br>
                                        <button type="button" id="add_img" class="btn btn-danger form-control">Add image</button>
                                    </div>
                                </div>

                                <div id="Show_imgs" style="min-height: 70px;display: flex;justify-content: center;flex-wrap: wrap">
                                    <input id="images" type="hidden" name="images">

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        Category <br>
                                        <select name="category_id" class="form-control" data-plugin-multiselect>
                                            @for($i = 0 ; $i < sizeof($categories) ; $i++)
                                                <option value="{{$categories[$i]->id}}">{{$categories[$i]->name}}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        Sale <br>
                                        <input type="number" name="sale" autocomplete="off" class="form-control" placeholder="Sale" value="1">
                                    </div>
                                    <div class="form-group col-md-5">
                                        Description <br>
                                        <textarea type="text" name="description" autocomplete="off" class="form-control" style="height: 100px"></textarea>
                                    </div>
                                </div>
                                <div class="option_form col-md-12">
                                    <div style="width: 100%">
                                        <hr class="line_option">
                                        <div class="row col-md-12">
                                            <div class="form-group col-md-4">
                                                Size
                                                <select class="form-control size_option">
                                                    @for($i = 0 ; $i < sizeof($sizes) ; $i++)
                                                        <option value="{{$sizes[$i]->id}}">{{$sizes[$i]->name}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                Color
                                                <select class="form-control color_option">
                                                    @for($i = 0 ; $i < sizeof($colors) ; $i++)
                                                        <option value="{{$colors[$i]->id}}">{{$colors[$i]->name}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                Quantity
                                                <input id="quantity_product" type="number" class="form-control quantity_option" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="data_option" id="data_option">
                                    <hr class="line_option">
                                    <p class="add_option">+</p>
                                </div>
                                <div class="row" style="display: none">
                                    <div class="form-group col-md-6">
                                        <button id="real_btn_submit" class="btn btn-primary form-control">Add</button>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button id="real_btn_reset" type="reset" class="btn btn-warning form-control">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group col-md-6">
                                <button id="fake_btn_submit" class="btn btn-primary form-control">Add</button>
                            </div>
                            <div class="form-group col-md-6">
                                <button id="fake_btn_reset" type="reset" class="btn btn-warning form-control">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <table class="table table-bordered table-striped mb-none" id="datatable-editable">
                <thead>
                <tr>
                    <th class="table_item">Id</th>
                    <th class="table_item ">Thumbnail</th>
                    <th class="table_item " style="width: 27%">Images</th>
                    <th class="table_item">Product name</th>
                    <th class="table_item">Price</th>
                    <th class="table_item">Category</th>
                    <th class="table_item">Sale</th>
                    <th class="table_item">Status</th>
                    <th class="table_item">Action</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 0 ; $i < sizeof($products) ; $i++)
                    <tr class="gradeX">
                        <td class="table_item">{{$products[$i]->id}}</td>
                        <td class="table_item">
                            <img class="Show_Thumbnail"
                                 src="{{$products[$i]->thumbnail}}">
                        </td>
                        <td class="table_item">
                            @foreach(json_decode($products[$i]->images,true) as $img)
                                <img class="Show_Thumbnail"
                                     src="{{$img}}">
                                     @endforeach
                        </td>
                        <td class="table_item">{{$products[$i]->name}}</td>
                        <td class="table_item">{{$products[$i]->price}}$</td>
                        <td class="table_item">{{$products[$i]->categories->name}}</td>
                        <td class="table_item">{{$products[$i]->sale}} %</td>

                        @if($products[$i]->status == \App\Enums\Product_status::ACTIVE)
                            <td class="table_item">đang kinh doanh</td>
                        @else
                            <td class="table_item">đã ngừng kinh doanh</td>
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
                    {{$products->links()}}
                </div>
            </div>
        </div>
        <input type="hidden" id="per_page_code" value="products">
    </section>

@endsection

@section('script_in_page')
    <script>
        document.addEventListener('DOMContentLoaded',function (){
            $('.add_option').click(function (){
                var new_id = Math.random()
                $('.option_form').append(`<div id="${new_id}" style="width: 100%">
                                        <div class="row col-md-12">
                                            <div class="form-group col-md-4">
                                                Size
                                                <select class="form-control size_option">
                                                    @for($i = 0 ; $i < sizeof($sizes) ; $i++)
                <option value="{{$sizes[$i]->id}}">{{$sizes[$i]->name}}</option>
                                                    @endfor
                </select>
            </div>
            <div class="form-group col-md-5">
                Color
                <select class="form-control color_option">
@for($i = 0 ; $i < sizeof($colors) ; $i++)
                <option value="{{$colors[$i]->id}}">{{$colors[$i]->name}}</option>
                                                    @endfor
                </select>
            </div>
            <div class="form-group col-md-3">
                Quantity
                <input type="number" onchange="change_data()" class="form-control quantity_option" value="1">
            </div>
            <p slot="${new_id}" onclick="remove_option(this.slot)" class="remove_option">-</p>
        </div>
    </div>`)
            })
        })
        function remove_option(id){
            document.getElementById(`${id}`).remove()
        }
        $('input[type="number"]').change(function (){
            if (event.target.value <= 0){
                event.target.value = 1
            }
        })
        function change_data(){
            if (event.target.value <= 0){
                event.target.value = 1
            }
        }

        $('#fake_btn_reset').click(function (){
            $('#real_btn_reset').click()
        })


        $('#fake_btn_submit').click(function (){
            var sizes = document.querySelectorAll('.size_option')
            var colors = document.querySelectorAll('.color_option')
            var quantity = document.querySelectorAll('.quantity_option')
            var images = document.querySelectorAll('.view_images_product')
            var data_option = []
            var product_imgs = []
            for (let i = 0; i < sizes.length; i++) {
                var option = {
                    'size_id':sizes[i].value,
                    'color_id':colors[i].value,
                    'quantity':quantity[i].value
                }
                data_option.push(option)
            }
            $('#data_option').val(JSON.stringify(data_option))
            for (let i = 0; i < images.length; i++) {
                product_imgs.push(images[i].src)
            }
            $('#images').val(JSON.stringify(product_imgs))
            $('#real_btn_submit').click()
        })

        $('#add_img').click(function (){
            var key = Math.random()
            if ($('#url_images').val() != ""){
                $('#Show_imgs').append(`<div><div slot="${key}" onclick="remove_images(this.slot)" class="btn_remove_img">-</div><img id="${key}" class="view_images_product" src="${$('#url_images').val()}"></div>`)
                $('#url_images').val('')
            }
        })

        function remove_images(id){
            event.target.remove()
            document.getElementById(`${id}`).remove()
        }





    </script>
@endsection
