@include('layouts.header')
<!-- CSS Start-->
@include('layouts.css')
<link href="{{asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

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

    <div class="container-fluid">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Raw Item</h4>
                    <hr>
                    <form class="form-group" name="add_item" id="add_item" action="{{url('add_item')}}" method="POST">
                        {{ csrf_field() }}
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control input-default" name="item_name" id="item_name"
                                    placeholder="Item Name *" autofocus required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>HSN Code</label>
                                <input type="text" class="form-control input-default" name="item_hsn" id="item_hsn"
                                    placeholder="HSN Code *" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Category </label>
                                <select class="form-control" id="item_category" name="item_category" required>
                                    <option value="">Select Category</option>
                                    @if($category->count() > 0)
                                    @foreach($category as $value)
                                    <option value="{{$value->id}}">{{$value->category_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Desccription</label>
                                <input type="text" class="form-control input-default" name="item_desc" id="item_desc"
                                    placeholder="Item Desc" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Primary Unit</label>

                                <select class="form-control" id="unit_primary" name="unit_primary" required>
                                    <option value="">Select Primary Unit</option>
                                    @if($unit->count() > 0)
                                    @foreach($unit as $value)
                                    <option value="{{$value->id}}">{{$value->unit_primary}} - {{$value->unit_pri_short}}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Secondary Unit</label>
                                <!-- <select class="form-control" id="unit_secondary" name="unit_secondary" readonly>
                                    <option value="">Secondary Unit</option>

                                </select> -->
                                <input type="text" class="form-control input-default" name="unit_secondary"
                                    id="unit_secondary" placeholder="Secondary Unit" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Convertion Factor</label>
                                <!-- <select class="form-control" id="item_unit" name="item_unit" required>
                                    <option value="">Select Unit</option>
                                    <option value="nos">NOS</option>
                                    <option value="kg">KG</option>
                                </select> -->
                                <input type="text" class="form-control input-default" name="unit_conversion"
                                    id="unit_conversion" placeholder="Unit Conversion" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>MRP</label>
                                <input type="text" class="form-control input-default" name="item_mrp" id="item_mrp"
                                    placeholder="MRP" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Purchase Price</label>
                                <input type="text" class="form-control input-default" name="item_purchase"
                                    id="item_purchase" placeholder="Purchase Price *" required>
                            </div>
                            <!-- <div class="form-group col-md-3">
                                <label>Sale Price</label>
                                <input type="text" class="form-control input-default" name="item_sale" id="item_sale"
                                    placeholder="Sale Price *" required>
                            </div> -->
                            <div class="form-group col-md-3">
                                <label>Opening Stock</label>
                                <input type="number" class="form-control input-default" name="item_opening_stock"
                                    id="item_opening_stock" placeholder="Opening Stock" pattern="[0-9]{4}" readonly>
                            </div>
                        </div>
                        <hr>

                        <!-- 
                        <div class="form-row">


                        </div> -->


                        <button type="submit" class="btn btn-dark float-right">Save</button>
                    </form>

                </div>
            </div>
        </div>

    </div>


</div>
<!--**********************************
        Content body end
***********************************-->

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select the inputs for name and village
    const inputsToCapitalize = ['item_name', 'item_desc', 'item_category'];

    inputsToCapitalize.forEach((id) => {
        const inputElement = document.getElementById(id);

        if (inputElement) {
            // Add input event listener
            inputElement.addEventListener('input', function() {
                this.value = this.value.toUpperCase(); // Convert input value to uppercase
            });
        }
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Allow only numbers and two decimal places for Purchase Price and MRP
    ['item_purchase', 'item_mrp'].forEach(id => {
        const inputElement = document.getElementById(id);
        inputElement.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9.]/g,
                ''); // Remove non-numeric characters except '.'
            // Allow only two decimal places
            if (this.value.includes('.')) {
                const parts = this.value.split('.');
                parts[1] = parts[1].substring(0, 2); // Keep only the first two decimal digits
                this.value = parts.join('.');
            }
        });
    });

    // Allow only numbers for HSN Code
    const itemHsn = document.getElementById('item_hsn');
    itemHsn.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#unit_primary').on('change', function() {
        var id = this.value;
        // alert(id);
        // console.log(id);

        // $("#unit_secondary").html('');
        $.ajax({
            url: "{{url('fetch_unit_details')}}",
            type: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                $('#unit_secondary').val(response.unit.unit_secondary);
                $('#unit_conversion').val(response.unit.unit_conversion);
            }
        });
    });
});
</script>
@include('layouts.footer')