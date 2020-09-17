$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var options = {
        autoClose: true,
        progressBar: true,
        enableSounds: true,
        sounds: {

            info: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233294/info.mp3",
            // path to sound for successfull message:
            success: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233524/success.mp3",
            // path to sound for warn message:
            warning: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233563/warning.mp3",
            // path to sound for error message:
            error: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233574/error.mp3",
        },
    };

    var toast = new Toasty(options);
    toast.configure(options);


    $('#successtoast').click(function () {

        toast.success("This toast notification with sound");

    });

    $('#infotoast').click(function () {

        toast.info("This toast notification with sound");

    });

    $('#warningtoast').click(function () {

        toast.warning("This toast notification with sound");

    });

    $('#errortoast').click(function () {
        toast.error("This toast notification with sound");

    });

    $(document).on('change', 'input[type=radio][name=transactionType]', function () {
        if (this.value == 'Deposit') {
            $('.refundAmtDiv').removeClass('hide');
            $('.dep_service_amt_div').removeClass('hide');
        } else if (this.value == 'Withdraw') {
            $('.refundAmtDiv').addClass('hide');
            $('.dep_service_amt_div').addClass('hide');
        }
    });


    $('.datepicker').datepicker({
       dateFormat: 'dd-mm-yy'
    });

    function RefundAmt() {
        var total_note_amt = 0;
        $('.note_count').each(function (ind, ele) {
            var not_amt = $(ele).val() * $(ele).attr('note_val');
            total_note_amt = parseFloat(total_note_amt) + parseFloat(not_amt);
        });
        var d_amt = $('#dep_amt').val();
        var s_amt = $('#dep_service_amt').val();
        d_amt = (parseFloat(d_amt) > 0) ? d_amt : 0;
        s_amt = (parseFloat(s_amt) > 0) ? s_amt : 0;
        var d_r_amt = parseFloat(total_note_amt) - (parseFloat(d_amt) + parseFloat(s_amt));
        if (d_r_amt > 0) {
            $('#dep_refund_amt').val(d_r_amt);
        } else {
            $('#dep_refund_amt').val('');
        }
    }
    $(document).on('keyup', '.note_count', function (e) {
        var total_note_amt = 0;
        $('.note_count').each(function (ind, ele) {
            var not_amt = $(ele).val() * $(ele).attr('note_val');
            total_note_amt = parseFloat(total_note_amt) + parseFloat(not_amt);
        });
        $('#note_amt_sapn').text(total_note_amt);
    });
    $(document).on('keyup', '#dep_amt', function (e) {
        RefundAmt();
    });
    $(document).on('keyup', '#dep_service_amt', function (e) {
        RefundAmt();
    });
    $(document).on('submit', '#addDepositForm', function (e) {
        var isValid = true;
        $('.AmountCount').text('');
        $('.trans_type_error').hide('');
        $('#depositTab .invalid-feedback').each(function () {
            var element = $(this);
            element.text('');
        });
        var transactionType = $("input[name=transactionType]:checked").val();

        var cust_id = $('#search_cust option:selected').val();
        var bank_detail_id = $('#search_bank option:selected').val();
        var dep_amt = $('#dep_amt').val();
        var dep_service_amt = $('#dep_service_amt').val();
        var dep_rs_10 = $('#dep_rs_10').val();
        var dep_rs_20 = $('#dep_rs_20').val();
        var dep_rs_50 = $('#dep_rs_50').val();
        var dep_rs_100 = $('#dep_rs_100').val();
        var dep_rs_200 = $('#dep_rs_200').val();
        var dep_rs_500 = $('#dep_rs_500').val();
        var dep_rs_2000 = $('#dep_rs_2000').val();
        var custDepositRemarks = $('#custDepositRemarks').val();
        dep_service_amt = (parseInt(dep_service_amt) > 0) ? dep_service_amt : 0;
        dep_rs_10 = (parseInt(dep_rs_10) > 0) ? dep_rs_10 : 0;
        dep_rs_20 = (parseInt(dep_rs_20) > 0) ? dep_rs_20 : 0;
        dep_rs_50 = (parseInt(dep_rs_50) > 0) ? dep_rs_50 : 0;
        dep_rs_100 = (parseInt(dep_rs_100) > 0) ? dep_rs_100 : 0;
        dep_rs_200 = (parseInt(dep_rs_200) > 0) ? dep_rs_200 : 0;
        dep_rs_500 = (parseInt(dep_rs_500) > 0) ? dep_rs_500 : 0;
        dep_rs_2000 = (parseInt(dep_rs_2000) > 0) ? dep_rs_2000 : 0;
        var totalAmt = ((dep_rs_10 * 10) + (dep_rs_20 * 20) + (dep_rs_50 * 50) + (dep_rs_100 * 100) + (dep_rs_200 * 200) + (dep_rs_500 * 500) + (dep_rs_2000 * 2000));
        var total_dep_service_amt = (parseFloat(dep_amt) + parseFloat(dep_service_amt));
        var dep_refund_amt = (totalAmt - total_dep_service_amt);
        dep_refund_amt = (parseInt(dep_refund_amt) > 0) ? dep_refund_amt : 0;
        $('#dep_refund_amt').val(dep_refund_amt);
        if (transactionType == '' || transactionType == 'undefined' || transactionType == 'NULL' || transactionType == undefined) {
            $('.trans_type_error').text('Please Select Transaction Type');
            $('.trans_type_error').show('');
            isValid = false;
            return false;
        } else {
            $('.trans_type_error').hide('');
            $('.trans_type_error').text('');
        }

        if (cust_id == '') {
            $('#search_cust').addClass('is-invalid');
            $('#search_cust').focus();
            $('#search_cust').next().next().text('Please Select Customer');
            isValid = false;
            return false;
        } else {
            $('#search_cust').removeClass('is-invalid');
            $('#search_cust').next().next().text('');
        }

        if (bank_detail_id == '') {
            $('#search_bank').addClass('is-invalid');
            $('#search_bank').focus();
            $('#search_bank').next().next().text('Please Select Bank');
            isValid = false;
            return false;
        } else {
            $('#search_bank').removeClass('is-invalid');
            $('#search_bank').next().next().text('');
        }

        if (dep_amt <= '0') {
            $('#dep_amt').addClass('is-invalid');
            $('#dep_amt').focus();
            $('#dep_amt').next().text('Please Enter Amount');
            isValid = false;
            return false;
        } else {
            $('#dep_amt').removeClass('is-invalid');
            $('#dep_amt').next().text('');
        }
        if (dep_service_amt <= '0') {
//            $('#dep_service_amt').addClass('is-invalid');
//            $('#dep_service_amt').focus();
//            $('#dep_service_amt').next().text('Please Enter Service Charge Amount');
//            isValid = false;
//            return false;
        } else {
            $('#dep_service_amt').removeClass('is-invalid');
            $('#dep_service_amt').next().text('');
        }

        if (totalAmt != (parseFloat(total_dep_service_amt) + parseFloat(dep_refund_amt))) {
            $('#dep_amt').addClass('is-invalid');
            $('#dep_amt').focus();
            $('.AmountCount').show('');
            $('.AmountCount').text('Amount Should be match with count of Notes');
            isValid = false;
            return false;
        } else {
            $('#dep_amt').removeClass('is-invalid');
            $('.AmountCount').hide('');
            $('.AmountCount').text('');
        }

        if (isValid) {
            return true;
        } else {
            e.preventDefault();
            return false;
        }

    });
    $(document).on('submit', '#addCustForm', function (e) {
        var isValid = true;

        $('#bankDetailDiv .invalid-feedback').each(function () {
            var element = $(this);
            element.text('');
        });
        var cust_mob = $('#cust_mob').val();
        var cust_aadhar = $('#cust_aadhar').val();
        if (/^\d{10}$/.test(cust_mob)) {
            $('#cust_mob').removeClass('is-invalid');
            $('#cust_mob').next().text('');
        } else {
            $('#cust_mob').addClass('is-invalid');
            $('#cust_mob').focus();
            $('#cust_mob').next().text('Please Enter Valid Mobile Number');
            isValid = false;
            return false;
        }
        if (cust_aadhar != '') {
            if (/^\d{12}$/.test(cust_aadhar)) {
                $('#cust_aadhar').removeClass('is-invalid');
                $('#cust_aadhar').next().text('');
            } else {
                $('#cust_aadhar').addClass('is-invalid');
                $('#cust_aadhar').focus();
                $('#cust_aadhar').next().text('Please Enter Valid Aadhar Number');
                isValid = false;
                return false;
            }
        } else {
            $('#cust_aadhar').removeClass('is-invalid');
            $('#cust_aadhar').next().text('');
        }

        $('#bankDetailDiv .ac_field').each(function () {
            var element = $(this);
            if (element.val() == "" && (!element.hasClass('ac_ifsc'))) {
                var plc = element.attr('placeholder');
                isValid = false;
                element.addClass('is-invalid');
                element.next().text("Please Enter " + plc);
                element.focus();
                return false;

            } else {
                if (element.hasClass('ac_ifsc')) {
                    if (element.val() != '') {
                        if (/^([a-zA-Z0-9]){11}$/.test(element.val())) {
                            element.removeClass('is-invalid');
                            element.next().text('');
                        } else {
                            element.addClass('is-invalid');
                            element.next().text("Please Enter Valid IFSC");
                            element.focus();
                            isValid = false;
                            return false;
                        }
                    } else {
                        element.removeClass('is-invalid');
                        element.next().text('');
                    }

                } else {
                    element.removeClass('is-invalid');
                    element.next().text('');
                }
            }
        });


        if (isValid) {
            return true;
        } else {
            e.preventDefault();
            return false;
        }


    });
});


$(document).ready(function () {
    $("#search_cust").select2({
        minimumInputLength: 2,

        ajax: {
            url: '/searchAjaxCust',
            type: "get",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term // search term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
//                            text: '[' + item.name + '] [' + item.mobile + '] [' + item.aadhar + ']',
                            text: item.mobile,
                            id: item.id,
                            "data-select2-name": item.name,
                        }
                    })
                };
            },
            cache: true,
            tags: true
        }
    });

});
$(document).on("change", "#search_cust", function () {
    $("#custDetailName").text('');
    $("#custDetailMobile").text('');
    $("#custDetailAadhar").text('');
    $("#custAcName").text('');
    $("#custAcNumber").text('');
    $("#custIfsc").text('');
    $("#custBank").text('');
    var cust_id = this.value;
//    var cust_Details = $("#search_cust option:selected").text();
//    var fields = cust_Details.split('] [');
//    var c_d_name = fields[0].replace(/[\[\]']+/g, "");
//    var c_d_mobile = fields[1].replace(/[\[\]']+/g, "");
//    var c_d_aadhar = fields[2].replace(/[\[\]']+/g, "");
//    $("#custDetailName").text(c_d_name);
//    $("#custDetailMobile").text(c_d_mobile);
//    $("#custDetailAadhar").text(c_d_aadhar);
    $.ajax({
        url: "/searchAjaxCustBank",
        type: "get",
        data: {'cust_id': cust_id},
        success: function (res) {
            var html = '<option value="">- Please Select-</option>';
            $.each(res.data.bank, function (i, v) {
                html += '<option value="' + v.id + '">[' + v.ac_name + '] [' + v.ac_number + '] [' + v.ifsc + '] [' + v.bank_name + ']</option>';
            });
            $("#search_bank").html(html);
            $("#search_bank").select2();
            var custArr = res.data.customer;
            $("#custDetailName").text(custArr.name);
            $("#custDetailMobile").text(custArr.mobile);
            $("#custDetailAadhar").text(custArr.aadhar_no);
        },
        error: function (res) {

        }
    })

});
$(document).on("change", "#search_bank", function () {
    var cust_bank_id = this.value;
    var cust_bank_Details = $("#search_bank option:selected").text();
    var fields = cust_bank_Details.split('] [');
    var ac_name = fields[0].replace(/[\[\]']+/g, "");
    var ac_number = fields[1].replace(/[\[\]']+/g, "");
    var bank_ifsc = fields[2].replace(/[\[\]']+/g, "");
    var bank_name = fields[3].replace(/[\[\]']+/g, "");
    $("#custAcName").text(ac_name);
    $("#custAcNumber").text(ac_number);
    $("#custIfsc").text(bank_ifsc);
    $("#custBank").text(bank_name);
});
$(document).on('click', '.add_bank_row', function () {
    var bank_row_sample = '<div class="bank_row col-md-12">';
    bank_row_sample += $('.bank_row_sample').html();
    bank_row_sample += '</div>';
    $('#bankDetailDiv').append(bank_row_sample);
});
$(document).on('click', '.remove_bank_row', function () {
    $(this).parent().parent().parent().remove();
});

$(document).on('keypress', '.numeric', function (evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57)) {
        return false;
    }
    return true;
});

$(document).on('keypress', '.alphanumeric', function (evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (!(iKeyCode > 47 && iKeyCode < 58) && // numeric (0-9)
            !(iKeyCode > 64 && iKeyCode < 91) && // upper alpha (A-Z)
            !(iKeyCode > 96 && iKeyCode < 123)) { // lower alpha (a-z)
        return false;
    }
    return true;
});
$(document).on('keypress', '.amount', function (evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if ((iKeyCode != 9) && (iKeyCode != 46) && (iKeyCode != 8) && (iKeyCode != 110) && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57)) {
        return false;
    }
    return true;
});

jQuery('.numbersOnly').on('change', function () {
    this.value = this.value.replace(/[^0-9\.]/g, '');
});

function updateBankStatus(type, id) {
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
                            url: "/updateStatusBank",
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
function confirmBankDelete(id) {
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
                            url: "/delbank",
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

function editBank(id, name) {
    if (id > 0) {
        $('#addBankLabel').text('Update Bank');
        $('#addBankBtn').text('Update');
        $('#bank_name').val(name);
        $('#bankID').val(id);
        $('#addBankModal').modal('show');
    }

}

