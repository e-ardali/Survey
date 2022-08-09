$(function () {

    /*
    //// header notification
    $('.by-dropdown').click(function () {

        if (!$(this).hasClass('active')) {
            $('.by-dropdown').each(function () {
                if ($(this).children('ul').length > 0) {
                    $(this).removeClass('active');
                    $(this).children('ul').removeClass('active');
                }
            });
            $(this).addClass('active');
            $(this).children('ul').addClass('active');
        } else {
            $(this).removeClass('active');
            $(this).children('ul').removeClass('active');
        }
    });

    $(document).click(function (e) {
        if (!$('.by-dropdown *').is(e.target)) {
            $('.by-dropdown').each(function () {
                if ($(this).children('ul').length > 0) {
                    $(this).removeClass('active');
                    $(this).children('ul').removeClass('active');
                }
            });
        }
    });
    //// end header notifications
    */

    //// side menu
    $('#side-menu-btn').click(function () {
        if ($(this).children('.mdi').hasClass('mdi-menu')) {
            $(this).children('.mdi').removeClass('mdi-menu').addClass('mdi-close');
            $('#side-menu').addClass('active');

        } else {
            $(this).children('.mdi').removeClass('mdi-close').addClass('mdi-menu');
            $('#side-menu').removeClass('active');
        }
    });
    $('#side-menu li.by-dropdown > a').click(function () {
        $(this).siblings('.sub-menu').slideToggle();
        $(this).parent().toggleClass('active');
    });
    $(document).click(function (e) {
        if (!$('#side-menu').is(e.target) && !$('#side-menu *').is(e.target) && !$('#side-menu-btn').is(e.target) && !$('#side-menu-btn *').is(e.target)) {
            if (!$(this).children('.mdi').hasClass('mdi-menu')) {
                $('#side-menu-btn').children('.mdi').removeClass('mdi-close').addClass('mdi-menu');
                $('#side-menu').removeClass('active');
            }
        }
    });
    //// end side menu

    // side menu scroll
    $("#side-menu").mCustomScrollbar({
        axis: "y",
        theme: "minimal-dark",
        autoHideScrollbar: true,
        documentTouchScroll: true,
        scrollInertia: 500,
        scrollEasing: "linear"
    });
    //// end side menu

    // inner-scroll-y
    $(".inner-scroll-y").each(function () {
        $(this).mCustomScrollbar({
            axis: "y",
            theme: "minimal-dark",
            autoHideScrollbar: true,
            documentTouchScroll: true,
            scrollInertia: 500,
            scrollEasing: "linear"
        });
    });
    //// inner-scroll-y

    //// numeral
    $('.numeral').keyup(function (e) {
        if (this.value && this.value != "") {
            this.value = numeral(this.value).value();
        }
    });
    //// end numeral

    //// money format
    $('.money-format').keyup(function (e) {
        if (this.value && this.value != "") {
            this.value = numeral(this.value).format('0,0');
        }
    });
    //// end money format

    //// date picker
    if ($('.date-input').length > 0) {
        $(".date-input").pDatepicker({
            format: 'YYYY/MM/DD',
            initialValueType: 'persian',
            autoClose: true,
            initialValue: $(this).val(),
        });
    }
    if ($('.date-input-g').length > 0) {
        $(".date-input-g").pDatepicker({
            format: 'YYYY-MM-DD',
            calendarType: 'gregorian',
            initialValueType: 'gregorian',
            autoClose: true,
            initialValue: $(this).val(),
        });
    }
    //// date picker

    //// collapse by select
    $('.collapse-by-select').change(function () {

        var target = $(this).attr('data-target');
        var thisVal = $(this).val().trim();
        var targetClass = 'show-by-' + thisVal;

        if ($(target).hasClass(targetClass)) {
            $(target).collapse('show');
        } else {
            $(target).collapse('hide');
        }
    });
    //// end check collapse

    ///// select state
    $('.select-state').on('change:flexdatalist', function (event, set, options) {

        var state = set.value;

        if (state != "") {

            var url = $(this).attr('data-data') + '?state=' + state;
            var html = '';
            $('#cities').empty();
            $('.select-city').prop('disabled', true);

            $.ajax({
                url: url,
                type: 'GET',
                beforeSend() {
                    $('.select-city').prop('disabled', true);
                },
                success: function (data) {
                    for (var i = 0; i < data.cities.length; i++) {
                        html += '<option>' + data.cities[i].name + '</option>';
                    }
                    $('.select-city').prop('disabled', false).attr('placeholder', 'انتخاب کنید');
                    $('#cities').append(html);
                }
            });

        } else {

            $('.select-city').prop('disabled', true);
            $('#cities').empty();
        }
    });
    ///// end select state

    $('.open-confirm-alert').click(function () {
        $('#confirm-alert').modal();
        $('#confirm-alert').find('.run-action').attr('action', $(this).attr('data-link'));
    });

});

function smoothSc(scTop) {
    $('html').animate({
        scrollTop: scTop
    }, 1000);
}

function generate_serial(target) {

    var url = $(target).find('input[name="action"]').val();
    var type = $(target).find('select[name="type"]').val();
    var current_index = $(target).find('input[name="current_index"]').val();
    var total_count = parseInt($(target).find('input[name="count"]').val());
    if (!total_count) {
        total_count = 1;
    }
    var inbox_count = parseInt($(target).find('input[name="inbox_count"]').val());
    if (!inbox_count) {
        inbox_count = 1;
    }

    var count = 2000;
    if (type == 2) {
        if (inbox_count < 11) {
            count = 200;
        } else if (inbox_count < 21) {
            count = 100;
        } else if (inbox_count < 31) {
            count = 70;
        } else if (inbox_count < 41) {
            count = 50;
        } else if (inbox_count < 51) {
            count = 40;
        } else if (inbox_count < 81) {
            count = 30;
        } else {
            count = 20;
        }
    }
    var current_count = count;

    var steps = Math.ceil(total_count / count);
    var index = steps - current_index;

    var progress = (current_index / steps) * 100;
    $(target).find('.progress-bar').attr('aria-valuenow', progress).css("width", progress + '%');

    if (index > 0) {

        if (index == 1) {
            current_count = (total_count % count) ? (total_count % count) : count;
        }
        console.log(index);
        console.log(count);

        var data = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            cargo_id: $(target).find('input[name="cargo_id"]').val(),
            entry_date: $(target).find('input[name="entry_date"]').val(),
            req_type: $(target).find('input[name="req_type"]').val(),
            inbox_count: inbox_count,
            current_index: current_index,
            count: count,
            current_count: current_count,
            type: type,
        }

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            beforeSend: function () {
                var btnHtml = 'در حال تولید';
                $(target).find('button[type="submit"]').prop("disabled", true).html(btnHtml).next().remove();
                $(target).find('.progress-box').collapse('show');
            },
            success: function (result) {
                console.log(result);
                $(target).find('input[name="current_index"]').val(++current_index);
                generate_serial(target);
            },
            error: function (error) {
                console.log(error);
                var btnHtml = 'تولید سریال';
                var errorHtml = '<p class="text-center text-danger">خطا در انجام عملیات</p>';
                $(target).find('button[type="submit"]').prop("disabled", false).html(btnHtml).after(errorHtml);
                $(target).find('.progress-box').collapse('hide');
            }
        });

    } else {

        var redirect = url + '?result=success';
        window.location.href = redirect;
    }

    return false;
}

function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test(email);
}

function checkForm(target) {
    var result = true;
    var index = 0;
    $(target).find('.needed').each(function () {
        $(this).removeClass('is-invalid').siblings('span').remove();
        var thisVal = $(this).val();
        if (thisVal == "") {
            $(this).addClass('is-invalid').after('<span class="invalid-feedback">پر کردن این فیلد ضروری است.</span>');
            if (index == 0) {
                var returnOffset = $(this).offset();
                smoothSc((returnOffset.top) - 80);
            }
            index++;
            result = false;
        }
    });
    if (result) {
        $(target).find('.email-type').each(function () {
            $(this).removeClass('is-invalid').siblings('span').remove();
            var thisVal = $(this).val();
            if (!validateEmail(thisVal)) {
                $(this).addClass('is-invalid').after('<span class="invalid-feedback">فرمت ایمیل وارد شده اشتباه است</span>');
                if (index == 0) {
                    var returnOffset = $(this).offset();
                    smoothSc((returnOffset.top) - 80);
                }
                index++;
                result = false;
            }
        });
    }
    return result;
}

function PostForm(target) {

    if (checkForm(target)) {
        $('#page-content').find('.builder-element-tools').remove();
        var html = $('#page-content').html();
        $('#post-content').val(html);
    } else {
        return false;
    }
}

function remove_file(target) {
    $(target).closest('.file-preview').empty().prev('.media-path-value').val();
}

