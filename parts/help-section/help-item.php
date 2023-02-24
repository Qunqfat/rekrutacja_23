<?php
/** @var array $args */
$title = esc_html($args['title']);
$content = esc_html($args['content']);
$img = esc_html($args['img']);
?>
<div class="content-item">
    <div class="img-wrap"><img src="<?php echo $img?>" alt="">
    </div>
    <div class="help-title"><?php echo $title; ?></div>
    <div class="section-txt"><?php echo $content; ?></div>
</div>