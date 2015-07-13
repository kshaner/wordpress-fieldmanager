(function($) {
    fm.colorpicker = {
        add:function() {
            $( '.fm-colorpicker.fm-element:visible' ).each( function() {
                if ( !$( this ).hasClass( 'wp-color-picker' ) ) {
                    var opts = $( this ).data( 'colorpicker-opts' );
                    $( this ).wpColorPicker( opts );
                }
            } );
        }
    };

    $( document ).ready( fm.colorpicker.add );
	$( document ).on( 'fm_collapsible_toggle fm_added_element fm_displayif_toggle fm_activate_tab', fm.colorpicker.add );
} ) ( jQuery );
