<?php
if (has_post_thumbnail()) {
    $thumbnail_url = get_the_post_thumbnail_url();
} else {
    $thumbnail_url = esc_url(get_template_directory_uri() . '/images/default-thumbnail.jpg');
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <img src="<?php echo $thumbnail_url; ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>">
            </div>
      
            <h1 class="mt-3"><?php the_title(); ?></h1>
            <div class="mt-3"><?php the_content(); ?></div>
        </div>
    </div>
</div>
