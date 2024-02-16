<?php get_header(); ?>
<body 
    <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part('template-parts/header-navbar'); ?>
    <div class='w-md-75 container align-itens-center'>
        <div class='container d-flex flex-wrap'>
            <?php  
                if(have_posts()){
                    while(have_posts()){
                        the_post();
                        get_template_part('template-parts/post-content');
                    }
                }
            ?>
        </div>
    </div>
    
    <?php get_footer(); ?>
</body>
