<div class="modal fade bd-example-modal-lg-category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product Category</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" name="product_category" id="product_category"
                    action="{{url('product_category')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row ">
                        <div class="col-md-3 ">
                        </div>
                        <label for="unit" class="col-sm-2 col-form-label pb-3">Category :</label>
                        <div class="col-md-3 ">
                            <input type="text" class="form-control" name="product_category_name"
                                id="product_category_name" placeholder="Product Category *" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark float-right">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bd-example-modal-lg-unit-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product Category</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <!-- <div class="modal-body">
                <form class="form-group" name="edit_unit" id="edit_unit" action="{{url('edit_unit_post')}}"
                    method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row ">
                        <div class="col-md-3 ">
                        </div>
                        <label for="unit" class="col-sm-2 col-form-label pb-3">Primary Unit :</label>
                        <div class="col-md-3 ">
                            <input type="text" class="form-control" name="unit_primary" id="unit_primary_edit" Value=""
                                placeholder="Primary Unit *" required>
                            <input type="hidden" class="form-control" name="unit_id" id="unit_id_edit" required>
                        </div>
                        <div class="col-md-2 ">
                            <input type="text" class="form-control" name="unit_pri_short" id="unit_pri_short_edit"
                                placeholder="Short Unit *">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-3 ">
                        </div>
                        <label for="unit" class="col-sm-2 col-form-label pb-3">Secondary Unit :</label>
                        <div class="col-md-3 ">
                            <input type="text" class="form-control" name="unit_secondary" id="unit_secondary_edit"
                                placeholder="Secondary Unit">
                        </div>
                        <div class="col-md-2 ">
                            <input type="text" class="form-control" name="unit_sec_short" id="unit_sec_short_edit"
                                placeholder="Short Unit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 ">
                        </div>
                        <label for="vendor" class="col-sm-2 col-form-label pb-3">Conversion :</label>
                        <div class="col-sm-3 pb-3">
                            <input type="text" class="form-control" name="unit_conversion" id="unit_conversion_edit"
                                placeholder="Convesion Per Unit">
                        </div>
                    </div>
            </div> -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>