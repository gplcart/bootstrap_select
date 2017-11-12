<?php

/**
 * @package Bootstrap Select
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 * @var $this \gplcart\core\controllers\backend\Controller
 * To see available variables <?php print_r(get_defined_vars()); ?>
 */
?>
<form method="post" class="form-horizontal">
  <input type="hidden" name="token" value="<?php echo $_token; ?>">
  <div class="form-group required<?php echo $this->error('selector', ' has-error'); ?>">
    <label class="col-md-2 control-label"><?php echo $this->text('Selector'); ?></label>
    <div class="col-md-6">
      <textarea name="settings[selector]" rows="4" class="form-control"><?php echo $this->e($settings['selector']); ?></textarea>
      <div class="help-block">
        <?php echo $this->error('selector'); ?>
        <div class="text-muted">
          <?php echo $this->text('A list of textarea CSS selectors, one per line.'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-10 col-md-offset-2">
      <a href="<?php echo $this->url("admin/module/list"); ?>" class="btn btn-default"><?php echo $this->text("Cancel"); ?></a>
      <button class="btn btn-default save" name="save" value="1"><?php echo $this->text("Save"); ?></button>
    </div>
  </div>
</form>