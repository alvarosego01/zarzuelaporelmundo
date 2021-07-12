







<?php

function getPosts($args)
{

    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        return $loop;
    } else {
        return null;
    }
}


function getPhoto($id)
{

    return wp_get_attachment_url(get_post_thumbnail_id($id));
}




function setTypeUrl(){

    if($_SERVER['SERVER_NAME'] == 'localhost') {

        return '/escala-dev';

    }else{

        return '';

    }

}




require get_template_directory() . '/../betheme-child/components/articlesSlideshow.php';


?>