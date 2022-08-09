$(function () {

    $('.survey-index').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).next().val('');
        } else {
            $(this).addClass('active');
            $(this).next().val($(this).attr('data-value'));
        }
    });

    $('.survey-point').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $('#point-field').val('');
            $('#user-point').attr('class', "btn btn-sm w-100 btn-primary").children('span').text('انتخاب کنید');
        } else {
            $(this).parent().siblings('li').find('.survey-point').removeClass('active');
            $(this).addClass('active');
            $('#point-field').val($(this).attr('data-value'));
            if ($(this).attr('data-value') > 5) {
                var $btnClass = "btn btn-sm w-100 btn-success";
            } else {
                var $btnClass = "btn btn-sm w-100 btn-danger";
            }
            $('#user-point').attr('class', $btnClass).children('span').text('امتیاز شما: ' + $(this).attr('data-value'));
        }
    });

    $('.select-point').click(function () {
        let points = parseInt($(this).attr('data-value'));
        let label = $(this).attr('data-label');
        $('.select-point').each(function (){
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        let cssClass = 'text-body';
        $('#more-collapse').collapse('show');
        if (points < 5) {
            cssClass = 'text-danger';
            $('#weaknesses').collapse('show',{
                toggle: false
            });
            $('#strengths').collapse('hide',{
                toggle: false
            });
            $('#submit-format').removeClass('btn-success').addClass('btn-warning');
        } else if (points < 7) {
            cssClass = 'text-warning';
            $('#weaknesses').collapse('show',{
                toggle: false
            });
            $('#strengths').collapse('hide',{
                toggle: false
            });
            $('#submit-format').removeClass('btn-success').addClass('btn-warning');
        } else {
            cssClass = 'text-success';
            $('#strengths').collapse('show',{
                toggle: false
            });
            $('#weaknesses').collapse('hide',{
                toggle: false
            });
            $('#submit-format').removeClass('btn-warning').addClass('btn-success');
        }
        $('#point-field').val(points);
        $('#user-comment').text(label).attr('class', cssClass);
    });

    let params = new URLSearchParams(window.location.search);
    if(params.has('result') && params.get('result') == 'success') {
        $('#result').addClass('active');
        setTimeout(function(){ $('#result').removeClass('active'); }, 3000);
    }

});
