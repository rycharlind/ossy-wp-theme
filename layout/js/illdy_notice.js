jQuery(document).on( 'click', '.ossy-error-update .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        method: "POST",
        data: {
            action: 'ossy_remove_upate_notice'
        }
    })

})