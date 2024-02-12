<?php
$thumbnail_id = get_post_thumbnail_id();
if ($thumbnail_id):
    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'large')[0];
endif;
$cat_list = get_the_category();
$tag_list = get_the_tags();
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
            <div class="text-end text-muted"> <?php the_time('j \d\e F \d\e Y') ?></div>
            <div class="mt-3"><?php the_content(); ?></div>
            
            <div><?php echo get_the_author_posts_link() ?></div>
            <div class="border-top mt-2 row">
                <div class="col-md-6">
                    <?php foreach($cat_list as $cat): ?>
                        <a href="<?php echo get_category_link($cat->term_id);?>" class="small me-1"><?php echo $cat->name;?> </a> 
                    <?php endforeach; ?>
                </div>
                <div class="col-md-6 text-end">
                    <?php foreach($tag_list as $tag): ?>
                        <a href="<?php echo get_tag_link($tag->term_id);?>" class="small me-1">#<?php echo $tag->name;?> </a> 
                    <?php endforeach; ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
