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

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Sidebar -->
                    <div class="col-md-3">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4><span class="text-body">Unit's</span></h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg-unit">Add Unit</button>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <input type="text" id="itemSearch" class="form-control" placeholder="Search Unit...">
                        </div>
                        <hr>
                        <div class="item-list activity " id="activity">
                            <table id="itemTable" class="table table-bordered table-hover verticle-middle">

                                <tbody>
                                    <tr>
                                        <th>Unit</th>
                                        <th>Qty</th>
                                    </tr>
                                    @if($list_unit->count() > 0)
                                    @foreach($list_unit as $value)
                                    <tr class="unit-rowid" data-id="{{ $value->id }}"
                                        data-name="{{ $value->unit_primary ? $value->unit_primary : null  }}">
                                        <td>
                                            {{-- <a id="get_data">{{$value->item_name}}</a> --}}
                                            <a href="#" id="item-link" data-id="{{ $value->id ? $value->id : null  }}"
                                                data-name="{{ $value->unit_primary ? $value->unit_primary : null  }}">
                                                {{ $value->unit_primary ? $value->unit_primary : null}}</a>
                                        </td>
                                        <td>{{ $value->unit_pri_short ? $value->unit_pri_short : null}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- Main Content -->
                    <div class="col-md-9 item-details">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4><span
                                    id="unit_primary_view">{{ $list_unit[0]->unit_primary ? $list_unit[0]->unit_primary : null  }}</span>
                            </h4>
                            <div id="data-unit_id"></div>
                            <!-- <button type="button" id="data-vendor_id" class="btn btn-primary bd-example-modal-lg-edit"
                                data-toggle="modal" data-target="#bd-example-modal-lg-unit-edit">Edit</button> -->
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p>Primary Unit: <span class="text-success" id="unit_primary_view_copy">
                                        {{ $list_unit[0]->unit_primary }}</span>
                                </p>
                                <p>Primary Short Unit: <span class="text-success" id="unit_pri_short_view">
                                        {{ $list_unit[0]->unit_pri_short ? $list_unit[0]->unit_pri_short : null }}</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>Secondary Unit: <span class="text-success" id="unit_secondary_view">
                                        {{ $list_unit[0]->unit_secondary ? $list_unit[0]->unit_secondary : null }}</span>
                                </p>
                                <p>Secondary Short Unit: <span class="text-success" id="unit_sec_short_view">
                                        {{ $list_unit[0]->unit_sec_short ? $list_unit[0]->unit_sec_short : null }}</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>Unit Conversion:<span class="text-danger" id="unit_conversion_view">
                                        {{ $list_unit[0]->unit_conversion ? $list_unit[0]->unit_conversion : null }}</span>
                                </p>
                                <p><span class="text-success" id=""></span></p>
                            </div>
                        </div>
                        <hr>

                        <!-- Transactions Table -->
                        <h5>Transactions</h5>

                        <div class="transaction-list ">
                            <table id="transactionsTable" class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Invoice/Ref. No</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>Price/Unit</th>
                                        <th>Amount</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--
                                    <!-- Rows will be appended here by the script -->
                                    <td><a href="/sale/${item.id}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                                    --}}
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
        Content body end
***********************************-->

@include('layouts.unit_modal')
@include('layouts.unit_ajax')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#itemSearch').on('keyup', function() {
        var value = $(this).val().toLowerCase();

        $('#itemTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
</script>
@include('layouts.js')
<script>
$('.activity').slimscroll({
    position: "right",
    size: "5px",
    height: "390px",
    color: "transparent"
});
</script>
@include('layouts.foot')