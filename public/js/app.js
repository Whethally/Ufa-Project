$('input').focus(function(){
    $(this).parents('.form-item').addClass('focused');
});

var cinput = $('input, textarea');

cinput.each(function(){
    if ($(this).val() != '') {
        // alert('not empty');
        $(this).parents('.form-item').addClass('focused');
        $(this).addClass('filled');

    } else {
        // alert('empty');
        $(this).parents('.form-item').removeClass('focused');
        $(this).removeClass('filled');
    }
});
$('input').blur(function(){
    if (!$(this).val()) {
        // alert('not empty');
        $(this).parents('.form-item').removeClass('focused');
        $(this).removeClass('filled');
    } else {
        // alert('empty');
        $(this).parents('.form-item').addClass('focused');
        $(this).addClass('filled');
    }
});