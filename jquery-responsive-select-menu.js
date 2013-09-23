jQuery(document).ready(function() {
 
    // Menu containers array
    var menuContainers = php_params.containers.replace(/ /g,'').split(',');

    // 1. Loop through menu containers
    jQuery.each(menuContainers, function( index, container ) {
        
        // Find first <ul> in container
        var ul = jQuery(container).find('ul').first().after('<select class="jquery-responsive-select-menu">aasdf</select>');

        // Make untouched copy of this <ul> to append to
        select = jQuery(container).children('.jquery-responsive-select-menu');

        // Create first, default <option>
        jQuery('<option />', {
           'selected': 'selected',
           'value'   : '',
           'text'    : php_params.firstItem
        }).appendTo(select);

        // Loop through menu item <li>'s in container
        get_child_menu_items( ul, 1 );

        // Media query to hide/show nav
        var mediaQuery = window.matchMedia( '(min-width: ' + php_params.width + 'px)' );
        if (mq.matches) {
            ul.show();
            select.hide();
        }
        else {
            ul.hide();
            select.show();
        }

    }); // End 1. Main loop through menu containers

    // Select functionality
    jQuery('.jquery-responsive-select-menu').change(function() {
        window.location = jQuery(this).find('option:selected').val();
    });
 
});

function get_child_menu_items( ul, depth ) {

    // 2. Loop through menu item <li>'s
    jQuery.each( ul.children('li'), function( index, li ) {
        
        // Get jQuery object of <li>
        var li = jQuery(li);

        // Get depth prefix
        var prefix = php_params.indent;
        prefix = Array(depth).join(prefix);

        jQuery('<option />', {
            'value'   : li.children('a').attr('href'),
            'text'    : prefix + ' ' + li.children('a').text()
        }).appendTo(select);

        // Only do something if this <li> contains a child <ul>
        var ul = li.children('ul');

        // Repeat this loop for child <ul>'s
        if ( ul.length > 0 ) {
            get_child_menu_items( ul, depth + 1 );
        }

    }); // End 2. Loop through menu item <li>'s

}