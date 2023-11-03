$(document).ready(function() {
    toastr.options = {
        'closeButton': true,
        'debug': false,
        'newestOnTop': false,
        'progressBar': false,
        'positionClass': 'toast-top-right',
        'preventDuplicates': false,
        'showDuration': '1000',
        'hideDuration': '1000',
        'timeOut': '5000',
        'extendedTimeOut': '1000',
        'showEasing': 'swing',
        'hideEasing': 'linear',
        'showMethod': 'fadeIn',
        'hideMethod': 'fadeOut',
    }

    function funDataTableCheck(class_name) {
        const $class_name = $('.' + class_name);
        const $table_head = $('#table_head');
        const $table_foot = $('#table_foot');

        $table_head.change(function () {
            if (this.checked) {
                $class_name.prop('checked', true);
                $table_foot.prop('checked', true);
            } else {
                $class_name.prop('checked', false);
                $table_foot.prop('checked', false);
            }
        });

        $table_foot.change(function () {
            if (this.checked) {
                $class_name.prop('checked', true);
                $table_head.prop('checked', true);
            } else {
                $class_name.prop('checked', false);
                $table_head.prop('checked', false);
            }
        });

        $class_name.change(function () {
            if (this.checked) {
                if ($class_name.filter(":checked").length === $class_name.length) {
                    $table_head.prop('checked', true);
                    $table_foot.prop('checked', true);
                }
            } else {
                $table_head.prop('checked', false);
                $table_foot.prop('checked', false);
            }
        });
    }
});
    function funDataTableUnCheck(class_name) {
        const $class_name = $('.' + class_name);
        const $table_head = $('#table_head');
        const $table_foot = $('#table_foot');
        $class_name.prop('checked', false);
        $table_head.prop('checked', false);
        $table_foot.prop('checked', false);
    }

    function funTooltip() {
        $('[data-toggle="tooltip"]').tooltip()
    }

    function successToast(message) {
        toastr.success(message)
    }function infoToast(message) {
        toastr.info(message)
    }function warningToast(message) {
        toastr.warning(message)
    }function dangerToast(message) {
        toastr.dangerous(message)
    }

    function floatOnly() {
        $('.float').keypress(function (event) {
            if ((event.which !== 46 || $(this).val().indexOf('.') !== -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    }

    function integerOnly() {
        $('.integer').keypress(function (event) {
            if (event.which !== 8 && event.which !== 0 && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    }

    function loaderView() {
        $.blockUI({
            message: '<div class="spinner-border text-success" role="status"><span class="sr-only">Loading...</span></div>',
            css: {
                padding: 0,
                margin: 0,
                width: "25%",
                top: "40%",
                left: "35%",
                textAlign: "center",
                color: "#000",
                border: "none",
                backgroundColor: "transparent",
                cursor: "wait",
                "z-index": "999999"
            }
        });
    }

    function loaderHide() {
        $.unblockUI();
    }

    $('#globalModal').on('hidden.bs.modal', function (e) {
        $(this).removeClass(function (index, className) {
            return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
        });
    });




