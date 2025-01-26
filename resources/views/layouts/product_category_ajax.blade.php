<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.unit-rowid').on('click', function(e) {
        e.preventDefault();

        var id = $(this).data('id');

        $.ajax({
            url: "{{ url('get_unit') }}",
            type: "POST",
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);

                $('#unit_primary_view').text(response.unit.unit.unit_primary);
                $('#unit_primary_view_copy').text(response.unit.unit.unit_primary);
                $('#unit_pri_short_view').text(response.unit.unit.unit_pri_short);
                $('#unit_secondary_view').text(response.unit.unit.unit_secondary);
                $('#unit_sec_short_view').text(response.unit.unit.unit_sec_short);
                $('#unit_conversion_view').text(response.unit.unit.unit_conversion);

                var tableBody = $('#transactionsTable tbody');
                tableBody.empty();

                var hasData = false;

                // $.each(response.purchase_item.item, function(index, item) {
                //     var row = `
                //             <tr>
                //                 <td>Purchase</td>
                //                 <td>${item.purchase_bill}</td>
                //                 <td>${item.vendor_name}</td>
                //                 <td>${item.purchase_date}</td>
                //                 <td>${item.item_qty}</td>
                //                 <td>₹ ${parseFloat(item.item_purchase_price).toFixed(2)}</td>
                //                 <td>₹ ${parseFloat(item.item_amount).toFixed(2)}</td>
                //             </tr>
                //         `;
                //     tableBody.append(row);
                //     hasData = true;
                // });


                // $.each(response.sale_item.item, function(index, item) {
                //     var row = `
                //             <tr>
                //                 <td>Sale</td>
                //                 <td>${item.sale_bill}</td>
                //                 <td>${item.customer_name}</td>
                //                 <td>${item.sale_date}</td>
                //                 <td>${item.item_qty}</td>
                //                 <td>₹ ${parseFloat(item.item_sale_price).toFixed(2)}</td>
                //                 <td>₹ ${parseFloat(item.item_amount).toFixed(2)}</td>
                //             </tr>
                //         `;
                //     tableBody.append(row);
                //     hasData = true;
                // });


                if (!hasData) {
                    tableBody.append(
                        '<tr><td colspan="8" class="text-center">No data available</td></tr>'
                    );
                }


                $('#data-unit_id').empty();

                var editButton = $('<button/>', {
                    type: 'button',
                    class: 'btn btn-primary bd-example-modal-lg-unit-edit',
                    'data-toggle': 'modal',
                    'data-target': '#bd-example-modal-lg-unit-edit',
                    'data-unit_id': response.unit.unit.id,
                    text: 'Edit'
                });

                $('#data-unit_id').append(editButton);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
                alert('Failed to fetch unit details. Please try again.');
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $(document).on('click', '.bd-example-modal-lg-unit-edit', function() {
        var unit_id = $(this).data('unit_id');
        // alert(item_id);

        $('#data-bd-example-modal-lg-unit-edit').modal('show');

        $.ajax({
            url: "{{url('edit_unit')}}",
            type: "POST",
            data: {
                id: unit_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#unit_primary_edit').val(response.unit.unit_primary);
                // $('#unit_primary_view_copy').text(response.unit.unit.unit_primary);
                $('#unit_pri_short_edit').text(response.unit.unit_pri_short);
                $('#unit_secondary_edit').text(response.unit.unit_secondary);
                $('#unit_sec_short_edit').text(response.unit.unit_sec_short);
                $('#unit_conversion_edit').text(response.unit.unit_conversion);
                $('#unit_id_edit').val(response.unit.id);
                // $('#item_hsn_edit').val(response.item.item_hsn);
                // $('#item_unit_edit').val(response.item.item_unit);
                // $('#item_desc_edit').val(response.item.item_desc);
                // $('#item_mrp_edit').val(response.item.item_mrp);
                // $('#item_purchase_edit').val(response.item.item_purchase);
                // $('#item_sale_edit').val(response.item.item_sale);
                // $('#item_sale_stock').val(response.item.item_stock);
                // $('#item_id_edit').val(response.item.id);
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $('#vendor_id').on('change', function() {
        var id = this.value;
        // alert(id);

        $("#vendor_mobile").html('');
        $.ajax({
            url: "{{url('fetch_vendor_details')}}",
            type: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                // console.log(response.vendor.vendor_mobile);
                $('#vendor_mobile').val(response.vendor.vendor_mobile);
                $('#vendor_gstin').val(response.vendor.vendor_gstin);
                $('#vendor_name').val(response.vendor.vendor_name);
                $('#vendor_address').val(response.vendor.vendor_address);
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    // $('.item_name').on('change', function () {
    $('#itemTableBody').on('change', '.item_id', function() {
        var id = this.value;
        var currentRow = $(this).closest('tr');
        // alert(id);

        // $("#item_hsn").html('');
        $.ajax({
            url: "{{url('fetch_item_details')}}",
            type: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                currentRow.find('.item_hsn').val(response.item.item_hsn);
                currentRow.find('.item_mrp').val(response.item.item_mrp);
                currentRow.find('.item_purchase').val(response.item.item_purchase);
                currentRow.find('.item_name').val(response.item.item_name);
            }
        });
    });
});
</script>