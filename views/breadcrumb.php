<?php
/**
 * FuelPHP Breadcrumb
 * "MIT License"
 * @Copyright 2017 Keite Trần <anhtrn90@gmail.com>
 * @Author anhtn
 */
?>
<?php if (!empty($breadcrumb)): ?>
  <ul id="breadcrumbs" class="breadcrumb">
    <?php foreach ($breadcrumb AS $bre): ?>
      <li class="<?php echo ($bre->current == true) ? 'current' : ''; ?>">
        <?php if (!empty($bre->iconClass)): ?>
          <i class="<?php echo $bre->iconClass; ?>"></i>
        <?php endif; ?>
        <?php if (!empty($bre->link)): ?>
          <a href="<?php echo $bre->link; ?>" title="<?php echo $bre->name; ?>"><?php echo $bre->name; ?></a>
        <?php else: ?>
          <span title="<?php echo $bre->name; ?>"><?php echo $bre->name; ?></span>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>