<?php get_header(); the_post(); ?>
<?php 

if ( is_singular('person') ) {
    get_template_part( 'templates/content', 'boxed' ); 
    add_filter( 'the_title', 'remove_page_title', 10, 2 );
}else{
 get_template_part( 'templates/content', 'sidebar' ); 
}
?>

<?php get_footer(); ?>


<?php

