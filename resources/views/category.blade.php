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
                            <h4><span class="text-body">Category</span></h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg-category">Add Category</button>
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
                                        <th>Category</th>
                                    </tr>
                                    @if($list_category->count() > 0)
                                    @foreach($list_category as $value)
                                    <tr class="category-rowid" data-id="{{ $value->id }}"
                                        data-name="{{ $value->category_name ? $value->category_name : null  }}">
                                        <td>
                                            {{-- <a id="get_data">{{$value->category_name}}</a> --}}
                                            <a href="#" id="item-link" data-id="{{ $value->id ? $value->id : null  }}"
                                                data-name="{{ $value->category_name ? $value->category_name : null  }}">
                                                {{ $value->category_name ? $value->category_name : null}}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- Main Content -->

                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
        Content body end
***********************************-->

@include('layouts.category_modal')
@include('layouts.category_ajax')

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