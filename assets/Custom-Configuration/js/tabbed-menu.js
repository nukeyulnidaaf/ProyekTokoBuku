$(document).ready(function(){
    $('#tabbed-menu a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
});