<?php
$thumbnail_id = get_post_thumbnail_id();
if ($thumbnail_id):
    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'large')[0];
endif;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if($thumbnail_id): ?>
            <div class="text-center">
                <img src="<?php echo $thumbnail_url; ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>">
            </div>
            <?php endif; ?>
      
            <h1 class="mt-3"><?php the_title(); ?></h1>
            <div class="mt-3"><?php the_content(); ?></div>
        </div>
    </div>
</div>
