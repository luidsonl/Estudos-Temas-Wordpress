<?php
$pagination_args = array(
    'mid_size' => 2,
    'type'     => 'array', // Configura para retornar um array
);

$pagination_elements = paginate_links($pagination_args);
?>

<div class='container d-flex justify-content-center align-items-center mb-5'>

    <nav>
        <ul class='pagination'>
        <?php if($pagination_elements): ?>
            <?php foreach ($pagination_elements as $element): ?>
                <?php
                $li_classes = 'page-item';
                $element = str_replace('page-numbers', 'page-link', $element);

                if(strpos($element, 'current')):
                    $li_classes = $li_classes . ' active';
                endif;
                ?>
                <li class="<?php echo $li_classes; ?>">
                <?php echo $element; ?>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
            
        </ul>
    </nav>

     
</div>

