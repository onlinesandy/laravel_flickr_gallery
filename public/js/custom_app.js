$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});

function updateCategoryStatus(type, id) {
    if (type == '1') {
        var updt_msg = 'You Want To Activate this record';
    } else {
        var updt_msg = 'You Want To Deactivate this record';
    }
    if (id > 0) {
        swal({
            title: "Are you sure?",
            text: updt_msg,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "/updateStatusCategory",
                            type: "POST",
                            data: {'id': id, 'type': type},
                            success: function (res) {
                                swal({
                                    title: res.type,
                                    text: res.text,
                                    icon: res.type,
                                }).then(function () {
                                    window.location.reload();
                                });
                            },
                            error: function () {
                                swal({
                                    title: 'Opps...',
                                    text: 'Something Went Wrong',
                                    type: 'error',
                                    timer: '1500'
                                })
                            }
                        })
                    } else {

                    }
                });
    }

}
function confirmCategoryDelete(id) {
    if (id > 0) {
        swal({
            title: "Are you sure?",
            text: "You want to delete this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "/delcategory",
                            type: "POST",
                            data: {'id': id},
                            success: function (res) {
                                swal({
                                    title: res.type,
                                    text: res.text,
                                    icon: res.type,
                                }).then(function () {
                                    window.location.reload();
                                });
                            },
                            error: function (res) {
                                swal({
                                    title: 'Opps...',
                                    text: 'Something Went Wrong',
                                    type: 'error',
                                    timer: '1500'
                                })
                            }
                        })
                    } else {

                    }
                });
    }

}

function editCategory(id, name) {
    if (id > 0) {
        $('#addCategoryLabel').text('Update Category');
        $('#addCategoryBtn').text('Update');
        $('#cat_name').val(name);
        $('#catID').val(id);
        $('#addCategoryModal').modal('show');
    }

}

