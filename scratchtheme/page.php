<?php get_header(); ?>
<body 
    <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part('template-parts/navbar'); ?>
    <div class='w-md-75 container align-itens-center'>
    <div class='container d-flex flex-wrap'>
    <?php  
        if(have_posts()){
            while(have_posts()){
                the_post();
                get_template_part('template-parts/page-content');
            }
        }
    ?>
    </div>
    </div>   
    <?php wp_footer(); ?>
</body>
</html>
<?php get_footer(); ?>