<!--            <table width="100%" cellpadding="4" class="x-form">
                            <tr>
                                <td colspan="4" class="section">
                                    Thông tin chung
                                </td>
                            </tr>
                            <tr>
                                <td class="c1">
<?php _e(translate('default.room.field.title') . ':') ?>
                                </td>
                                <td class="c2">
                                    <input name="title" type="text" style="width:250px;" class="x-text bor" value="<?php _e($title) ?>" />
                                </td>
            
                                <td class="c1">
<?php _e(translate('default.hotel.field.hotel_id') . ':') ?>
                                </td>
                                <td class="c2">
                                    <a href="#Hotel/Index/View?ID=<?php _e($hotel['ID']) ?>">
<?php _e($hotel['title']) ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="c1">
<?php _e(translate('default.hotel.field.price') . ':') ?>
                                </td>
                                <td class="c2">
                                    <input name="price" type="text" style="width:150px;" class="x-text bor" value="<?php _e($price) ?>"/>
                                    <select name="currency_id" class="x-select bor" style="width:100px">                   
<?php _e(select_options(Plugins::getOptions('currencies'), 'title', $post['currency_id'])); ?>	
                                    </select>
                                </td>
                                <td class="c1">
                                    Dịch vụ thêm giường :
                                </td>
                                <td class="c2">
                                    <input name="has_extrabed" type="checkbox" value="1" <?php if ($post['has_extrabed'] == 1) {
    _e('checked="checked"');
} ?>/>
                                </td>
            
                            </tr>
                            <tr>
                                <td class="c1">
<?php _e(translate('default.hotel.field.number') . ':') ?>
                                </td>
                                <td class="c2">
                                    <input name="number" type="text" style="width:150px;" class="x-text bor" value="<?php _e($number) ?>"/>
                                </td>
                                <td class="c1">
<?php _e(translate('default.hotel.field.extrabed_price')); ?>:
                                </td>
                                <td class="c2">                               
                                    <input name="extrabed_price" type="text" style="width:150px;" class="x-text bor" value="<?php ($post['has_extrabed'] == 0) ? _e('') : _e($post['extrabed_price']) ?>" <?php if ($post['has_extrabed'] == 0) {
    _e('disabled="disabled"');
} ?>/>
                                    <span class="type-price-extrabed"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="c1">
            <?php _e(translate('default.hotel.field.size_people') . ':') ?>
                                </td>
                                <td class="c2">
                                    <input name="size_people" type="text" style="width:150px;" class="x-text bor" value="<?php _e($size_people) ?>"/>
                                </td>
                                <td class="c1">
<?php _e(translate('default.hotel.field.area') . ':') ?>
                                </td>
                                <td class="c2">
                                    <input name="area" type="text" style="width:150px;" class="x-text bor" value="<?php _e($area) ?>"/>
                                </td>
                            </tr>
            
                            <tr>
                                <td class="c1">
            <?php _e(translate('default.image')); ?>:
                                </td>
                                <td>
<?php if ($post['img']): ?>
                                            <img  src="<?php _e(baseUrl()) ?>/files/rooms/<?php _e($post['img']) ?>" style="max-width:150px"/>
            <?php endif; ?>
<?php _e(tpl_upload('img', 'rooms')) ?> 
            
                                </td>
            
                                <td class="c1">
<?php _e(translate('default.desc') . ':') ?>
                                </td>
                                <td class="c2">
                                    <textarea name="desc" style="width:250px" class="x-text bor" rows="6"><?php _e($desc) ?></textarea>
                                </td>
            
                            </tr>
                            Rule Price 
                            <tr>
                                <td class="c1" >
            <?php _e('Áp dụng quản lý giá:') ?>
                                </td>
                                <td colspan="3">
                                    <table cellpadding="10" width ="100%">
            <?php
            if (isset($rules_all) && count($rules_all) > 0):
                $row_rules = ceil(count($rules_all) / $colum);
                for ($i = 0; $i < $row_rules; $i++):
                    ?>
                                                        <tr width="100%">
                    <?php
                    for ($j = 0; $j < $colum; $j++):
                        $a = $rules_all[$i * $colum + $j];
                        ?>
                                                                    <td valign="top" width="<?php _e(ceil(100 / $colum)) ?>%"  >
                        <?php
                        if (isset($a['ID'])):
                            if ($rules_checked) {
                                (in_array($a['ID'], $rules_checked)) ? $check = ' checked' : $check = '';
                            }
                            ?>
                                                                                <input type="checkbox" name="room_rules[]" value="<?php _e($a['ID']) ?>" <?php _e($check) ?>/>
                            <?php _e($a['title']); ?></br>
                        <?php endif; ?>
                                                                    </td>
                        
        <?php endfor; ?>
                                                        </tr>
        <?php
    endfor;
endif;
?>
                                    </table>
                                </td>
                            </tr>
                             SERVICES 
                            <tr>
                                <td class="c1">
            <?php _e('Dịch vụ phòng :') ?>
                                </td>
                                <td colspan="3"> 
                                    <table cellpadding="10" width ="100%">
            <?php
            if (isset($room_services) && count($room_services) > 0):
                $row_services = ceil(count($room_services) / $colum);
                for ($i = 0; $i < $row_services; $i++):
                    ?>
                                                        <tr width="100%">
                    <?php
                    for ($j = 0; $j < $colum; $j++):
                        $a = $room_services[$i * $colum + $j];
                        ?>
                                                                    <td valign="top" width="<?php _e(ceil(100 / $colum)) ?>%"  >
                        <?php if (isset($a['ID'])): ?>
                                                                                <input type="checkbox" name="services[]" value="<?php _e($a['ID']) ?>"<?php _e($a['checked']); ?>/>
                            <?php _e($a['title']); ?>
                        <?php endif; ?>
                                                                    </td>
                        
        <?php endfor; ?>
                                                        </tr>
        <?php
    endfor;
endif;
?> 
                                    </table>
                                </td>
                            </tr>
            
                            <tr>
                                <td width="15%"></td>
                                <td>
<?php _e(tpl_button_add()) ?>
<?php _e(tpl_button_cancel('#Hotel/Room')) ?>
                                </td>
                            </tr>
            
                        </table>-->