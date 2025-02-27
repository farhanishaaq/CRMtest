$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: APP_URL + '/admin/employees',
            type: 'GET',
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'company_name', name: 'company_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        drawCallback: function () {
            funTooltip()
        },
        language: {
            processing: '<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>'
        },
        order: [[0, 'DESC']],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']]
    })

    $(document).on('click', '.delete-single', function () {
        var value_id = $(this).data('id')

        Swal.fire({
            title: "Are you sure !",
            text: "This Employee will remove from record",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#067CBA",
            confirmButtonClass: "btn-danger",
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel',
            closeOnConfirm: true,
            closeOnCancel: true,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                deleteRecord(value_id)
            }
        })

    })

    let $form = $('#addEditForm')
    $form.on('submit', function (e) {
        e.preventDefault()
        $form.parsley().validate();
        if ($form.parsley().isValid()) {
            loaderView();
            let formData = new FormData($('#addEditForm')[0])
            $.ajax({
                url: APP_URL + '/admin/employees',
                type: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    loaderHide();
                    if (data.success === true) {
                        $form[0].reset()
                        $form.parsley().reset();
                        successToast(data.message)
                        setTimeout(function () {
                            window.location.href = APP_URL + '/admin/employees'
                        }, 1000);
                    } else if (data.success === false) {
                        warningToast(data.message)
                    }
                },
                error: function (data) {
                    loaderHide();
                    console.log('Error:', data)
                }
            })
        }
    })

    function deleteRecord(value_id) {
        $.ajax({
            type: 'DELETE',
            url: APP_URL + '/admin/employees' + '/' + value_id,
            success: function (data) {

                toastr.success(data.message);
                table.draw()
                loaderHide();
            }, error: function (data) {
                console.log('Error:', data)
            }
        })
    }


    $(document).on('click', '.details-single', function () {
        const value_id = $(this).data('id')

        $.ajax({
            type: 'get',
            url: APP_URL + '/admin/employees' + '/info/' + value_id,
            success: function (data) {
                if (data.success === true) {
                $('#detailInfo').empty();
                $('#detailInfo').html(data.data);
            } else if (data.success === false) {
            warningToast(data.message)
        }
            }, error: function (data) {
                console.log('Error:', data)
            }
        })
    })





    $( "#search" ).autocomplete({
        source: function( request, response ) {
            $.ajax({
                url: APP_URL + '/admin/autocompleteCompany',
                type: 'GET',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function( data ) {
                    response( data );
                }
            });
        },
        select: function (event, ui) {
            $('#search').val(ui.item.value);
            $('#company').val(ui.item.id);
            console.log(ui.item);
            return false;
        }
    });

})

