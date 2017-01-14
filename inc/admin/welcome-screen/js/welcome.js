jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About ossy page -> Actions required tab */
    var ossy_nr_actions_required = ossyLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof ossy_nr_actions_required !== 'undefined') && (ossy_nr_actions_required != '0') ) {
        jQuery('li.ossy-w-red-tab a').append('<span class="ossy-actions-count">' + ossy_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".ossy-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'ossy_lite_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : ossyLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.ossy-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + ossyLiteWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var ossy_lite_actions_count = jQuery('.ossy-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof ossy_lite_actions_count !== 'undefined' ) {
                    if( ossy_lite_actions_count == '1' ) {
                        jQuery('.ossy-actions-count').remove();
                        jQuery('.ossy-tab-pane#actions_required').append('<p>' + ossyLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.ossy-actions-count').text(parseInt(ossy_lite_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function ossy_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".ossy-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var ossy_actions_anchor = location.hash;

	if( (typeof ossy_actions_anchor !== 'undefined') && (ossy_actions_anchor != '') ) {
		ossy_welcome_page_tabs('a[href="'+ ossy_actions_anchor +'"]');
	}

    jQuery(".ossy-nav-tabs a").click(function(event) {
        event.preventDefault();
		ossy_welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.ossy-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
