jQuery(document).ready(function() {
    var ossy_aboutpage = ossyLiteWelcomeScreenCustomizerObject.aboutpage;
    var ossy_nr_actions_required = ossyLiteWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof ossy_aboutpage !== 'undefined') && (typeof ossy_nr_actions_required !== 'undefined') && (ossy_nr_actions_required != '0') && _wpCustomizeSettings.theme.active && _wpCustomizeSettings.theme.stylesheet == 'ossy' ) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + ossy_aboutpage + '"><span class="ossy-actions-count">' + ossy_nr_actions_required + '</span></a>');
    }

});
