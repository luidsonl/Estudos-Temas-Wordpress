<?php

function init_rwiakt_blocks(){
    register_block_type_from_metadata( get_template_directory() . '/inc/blocks/megamenu' );
}

add_action( 'init', 'init_rwiakt_blocks');