$(document).ready(function() {
    // initialize tooltip
    $(".content span").tooltip({
        track: true,
        open: function(event, ui) {
            var id = this.id;
            var userid = $(this).attr('data-id');

            $.ajax({
                url: 'modal/fetchDetail.php',
                type: 'post',
                data: {
                    userid: userid
                },
                success: function(response) {

                    // Setting content option
                    $("#" + id).tooltip('option', 'content', response);
                }
            });
        }
    });
    $(".content span").mouseout(function() {
        // re-initializing tooltip
        $(this).attr('title', 'Please wait...');
        $(this).tooltip();
        $('.ui-tooltip').hide();
    });


});