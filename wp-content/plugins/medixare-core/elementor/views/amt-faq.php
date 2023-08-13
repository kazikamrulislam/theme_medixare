<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

namespace Elementor;

use MedixareTheme;
use MedixareTheme_Helper;
use \WP_Query;

?>

<?php $ac_id = rand(1, 9999); ?>
<div class="accordion-wrapper tp-custom-accordio" id="accordion_<?php echo $ac_id; ?>">
    <?php
    $i = 1;
    foreach ($data['faq_items'] as $index => $item) :
        $item_id = rand(1, 9999);
    ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="item-<?php echo $item_id ?>">
                <button class="accordion-button <?php echo ($i == 1) ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $item_id ?>" aria-expanded="<?php echo ($i == 1) ? 'true' : 'false'; ?>" aria-controls="collapse-<?php echo $item_id ?>">
                    <span><?php echo esc_attr($item['faq-title']); ?></span>
                    <div class="arrow">
                        <span class="faq-toggle-icon-closed"><?php Icons_Manager::render_icon($item['selected_icon']); ?></span>
                        <span class="faq-toggle-icon-opened"><?php Icons_Manager::render_icon($item['selected_active_icon']); ?></span>
                    </div>
                </button>
            </h2>
            <div id="collapse-<?php echo $item_id ?>" class="accordion-collapse collapse <?php echo ($i == 1) ? 'show' : ''; ?>" aria-labelledby="item-<?php echo $item_id ?>" data-bs-parent="#accordion_<?php echo $ac_id; ?>">
                <div class="accordion-body">
                    <?php echo esc_attr($item['faq-content']); ?>
                </div>
            </div>
        </div>
    <?php
        $i++;
    endforeach;
    ?>
</div>