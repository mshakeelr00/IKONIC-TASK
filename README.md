# IKONIC-TASK
IKONIC TASK


1. Redirect User if the IP range is "77.29" using WordPress Native Hook.
For redirecting users whose IP address starts with "77.29," I have utilized the WordPress "init" hook in the theme functions.php file.

2. Register a post type "Projects" and texanomy "Project Types".
I have registered a new post type called "Projects" and a taxonomy called "Project Types" using the appropriate functions "register_post_type" and "register_taxonomy."

3. Projects Archive page with pagination.
To ensure six projects are displayed per page with pagination, I have created a new archive page template named "archive-project.php." Pagination is now controlled through WordPress settings. Moreover, I have created an alternative page template using the wp_Query loop to display six posts per page.

4. Ajax endpoint to grab the Six recent published projects for logedin users and three for non logedin user. Results should be returned in the following JSON format {success: true, data: [{object}, {object}, {object}, {object}, {object}]}. 
I have successfully implemented the Ajax endpoint to display the six latest projects for logged-in users and three projects for non-logged-in users. You can review the Ajax endpoint screenshot for the output.

5. WordPress HTTP API to create a function called hs_give_me_coffee() that will return a direct link to a cup of coffee. for us using the Random Coffee API [JSON].
I have registered the [get_coffee] shortcode to print the output of hs_give_me_coffee().

6. Use this API https://api.kanye.rest/ and show 5 quotes on a page.
I have integrated the [kanye-quotes] and [kanye-quotes count=3] shortcodes to retrieve the API output as required.
