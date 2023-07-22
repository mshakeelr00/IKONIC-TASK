// JavaScript Document
/*
* Sending Projects ajax request
*/

jQuery(document).ready(function($) {
								
    $.ajax({
        url: customAjax.ajaxurl, // Use the dynamically provided Ajax URL
        type: 'GET',
        dataType: 'json',
        data: {
            action: 'get_projects',
        },
        success: function(response) {
            if (response.success) {
                // Handle the data
                var projects = response.data;
                console.log(projects); // You can use this data as needed
            } else {
                console.log('Error fetching projects.');
            }
        },
        error: function(xhr, status, error) {
            console.log('Error: ' + xhr.responseText);
        },
    });
});
