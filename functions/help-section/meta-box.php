<?php
function add_help_fields_meta_box()
{
    add_meta_box(
        'help_fields_meta_box', // $id
        'Meta Box Fields', // $title
        'show_help_fields_meta_box', // $callback
        'kg_help_section', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action('add_meta_boxes', 'add_help_fields_meta_box');

function show_help_fields_meta_box()
{
    global $post;

    $meta = get_post_meta($post->ID, 'help_fields', true); ?>

<style>
.cms-wrapper {
    display: flex;
    justify-content: space-around;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

option {
    text-align: center;
    color: black;
}

label {
    font-size: 16px;
}

.effect-wrapper {
    border: 2px solid black;
    border-radius: 10px;
    padding: 15px;
    background-color: #f8f8ff;
    box-shadow: 0px 0px 20px #808080;
}

.cms-title {
    font-size: 20px;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
}

.add-gallery-item {
    margin-bottom: 25px;
    padding: 15px;
}
</style>


<input type="hidden" name="help_meta_box_nonce_24_02_2023" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>">


<div class="cms-wrapper">
    <div class="effect-wrapper">
        <p>
            <label for="help_fields[img]">Wczytaj zdjęcie dla wpisu</label><br>
            <input type="text" name="help_fields[img]" id="help_fields[img]" required class="meta-image regular-text"
                value="<?php if (is_array($meta) && isset($meta['img'])) {
                    echo sanitize_text_field($meta['img']);
                } ?>">
            <input type="button" onclick="addImgToMetabox(this)" data-btn-target="help_fields[img]"
                class="button image-upload" value="Browse">
        </p>
        <div class="image-preview"><img data-media-target="help_fields[img]"
                src="<?php if (is_array($meta) && isset($meta['img'])) {echo sanitize_text_field($meta['img']); } ?>"
                style="max-width: 250px;">
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    const addMedia = function(e, type) {
        const img_target = e.dataset.btnTarget;
        const preview = $('[data-media-target="' + img_target + '"]');
        const input = $('[name="' + img_target + '"]');
        const meta_image_frame = wp.media({
            library: {
                type
            },
        });
        meta_image_frame.on('select', function() {
            var media_attachment = meta_image_frame
                .state()
                .get('selection')
                .first()
                .toJSON();
            input.val(media_attachment.url);
            preview.attr('src', media_attachment.url);
            if (type.some(e => e === 'video')) {
                preview.attr('type', media_attachment.mime);
                let mime_target = img_target.replace('[video]', '[mime]');
                mime_target = $('[name="' + mime_target + '"]');
                mime_target.val(media_attachment.mime);
                preview.parent()[0].load()
            }
            if (type.some(e => e === 'image')) {
                let alt_target = img_target.replace('[img]', '[alt]');
                alt_target = $('[name="' + alt_target + '"]');
                if (!alt_target.val()) {
                    alt_target.val(media_attachment.alt);
                }
            }

        });
        meta_image_frame.open();

    }
    window.addImgToMetabox = function(e) {
        addMedia(e, ["image"])
    }

})
</script>


<?php }
function save_help_fields_meta($post_id)
{
    // verify nonce
    if (
        isset($_POST['trend_meta_box_nonce'])
        && !wp_verify_nonce($_POST['trend_meta_box_nonce'], basename(__FILE__))
    ) {
        return $post_id;
    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if (isset($_POST['post_type'])) { //Fix 2
        if ('page' === $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
        }
    }

    $old = get_post_meta($post_id, 'help_fields', true);
    if (isset($_POST['help_fields'])) {
        $new = $_POST['help_fields'];
        if ($new && $new !== $old) {
            update_post_meta($post_id, 'help_fields', $new);
        } elseif ('' === $new && $old) {
            delete_post_meta($post_id, 'help_fields', $old);
        }
    }
}

add_action('save_post', 'save_help_fields_meta');
?>