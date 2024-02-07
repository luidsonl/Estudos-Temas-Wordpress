<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part('template-parts/navbar'); ?>
    <?php get_template_part('template-parts/slider'); ?>
    <div class='w-md-75 container'>
        
        <div class='container d-flex flex-wrap'>
            <?php  
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/postcard');
                }
            }
            ?>
        </div>
    </div>
    <?php get_template_part('template-parts/pagination') ?>
    
    <?php get_footer(); ?>
</body>
</html>
