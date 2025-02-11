@include('layouts.header')
<!-- CSS Start-->
@include('layouts.css')

@include('layouts.top_navbar')
@include('layouts.left_sidebar')
<!--**********************************
         Content body start
***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    @if (Session::has('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-lg-12">
        <div class="card">
            <form name="add_product" id="add_product" class="form-horizontal" method="Post"
                action="{{ url('add_production') }}" enctype="multipart/form-data" autocomplete="on">
                {{ csrf_field() }}
                <div class="card-body" style="text-transform:uppercase">
                    <h4 class="card-title">Production</h4>
                    <hr>

                    <div class="basic-form form-group row">
                        <!-- <div class="col-sm-2 pb-2">
                            <label for="product_name">Product Name :</label>
                            <input type="text" class="form-control" name="product_name" id="product_name"
                                placeholder="Product Name *" required>

                        </div> -->
                        <div class="col-sm-2 pb-2">
                            <label for="product_category">Category :</label>
                            <select class="form-control" id="product_category" name="product_category" required>
                                <option value="">Select Category</option>
                                @if($product_category->count() > 0)
                                @foreach($product_category as $value)
                                <option value="{{$value->id}}">{{$value->product_category_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="basic-form form-group row">
                    </div>
                    <hr>
                    <div class="basic-form">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th class="col-sm-1 pb-2">#</th>
                                    <th class="col-sm-2 pb-2">Product</th>
                                    <th class="col-sm-1 pb-2">QTY</th>
                                    <th class="col-sm-1 pb-2"></th>
                                </tr>
                            </thead>
                            <tbody id="itemTableBody">
                                <tr rowid='1'>
                                    <td class="col-sm-1 pb-2">1</td>
                                    <td class="col-sm-2 pb-2">
                                        <select class="item_id select2 form-control form-control-sm" name="product_id[]"
                                            id="product_id" data-placeholder="" style="width: 100%;">
                                            <option></option>
                                            @if($product->count() > 0)
                                            @foreach($product as $value)
                                            <option value="{{$value->id}}">{{$value->product_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>
                                    <td class="col-sm-1 pb-2">
                                        <input type="number" name="product_qty[]" id="product_qty"
                                            class="form-control form-control-sm item_qty" min="0" step="0.001"
                                            inputmode="decimal" placeholder="Qty">

                                        <!-- <input type="number" name="item_qty[]" id="item_qty"
                                            class="form-control form-control-sm item_qty" min="0" placeholder="Qty"> -->
                                        <!-- <input type="hidden" name="item_stock[]" id="item_stock"
                                            class="form-control form-control-sm item_stock" min="0" placeholder="Qty"> -->
                                    </td>
                                    <td class="col-sm-1 pb-2"><i class="remove-row far fa-trash-alt "></i></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><button id="addRowButton" class="btn btn-primary">Add Row</button></td>
                                    <!-- <td colspan="5" class="text-right">TOTAL</td> -->
                                    <!-- <td><input type="number" class="form-control form-control-sm item_totalAmount"
                                            name="item_totalAmount" id="item_totalAmount" placeholder="Total" readonly>
                                    </td> -->
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



</div>
<!--**********************************
        Content body end
***********************************-->
{{-- @include('layouts.ajax') --}}
@include('layouts.sale_script')



@include('layouts.footer')