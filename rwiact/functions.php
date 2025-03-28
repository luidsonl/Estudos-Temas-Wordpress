<?php

function init_rwiakt_blocks(){
    register_block_type_from_metadata( __DIR__ . '/blocks/header' );
}

add_action( 'init', 'init_rwiakt_blocks');