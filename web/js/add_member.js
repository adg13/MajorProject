    jQuery(document).ready(function() {
        jQuery('#add-another-email').click(function() {
            var emailList = jQuery('addAnotherOne');

            // grab the prototype template
            var newWidget = emailList.attr('data-prototype');
            // replace the "__name__" used in the id and name of the prototype
            // with a number that's unique to your emails
            // end name attribute looks like name="contact[emails][2]"
            newWidget = newWidget.replace(/__name__/g, emailCount);

            // create a new list element and add it to the list
            var newLi = jQuery('<li></li>').html(newWidget);
            newLi.appendTo(jQuery('#email-fields-list'));

            return false;
        });
    })
    