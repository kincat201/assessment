<ul>
<?php if($currentpage > 1) { ?>
  <li><a href="#" data-page="1" onclick="changepage(this)"><<</a></li>
  <li><a href="#" data-page="<?= ($currentpage - 1); ?>" onclick="changepage(this)"><</a></li>
<?php } else { ?>
  <li class="disabled"><span><<</span></li>
  <li class="disabled"><span><</span></li>
<?php } ?>
<?php 
if($totalpage > 5) {
  if ($currentpage > 3) { ?>
    <li class="disabled"><span>...</span></li>
  <?php } else if ($currentpage == 1) { ?>
    <li class="active"><span>1</span></li>
  <?php } else { ?>
    <li><a href="#" data-page="1" onclick="changepage(this)">1</a></li>
  <?php }
  if ($currentpage >= $totalpage - 1) { ?>
    <li><a href="#" data-page="<?= ($totalpage - 3); ?>" onclick="changepage(this)"><?= ($totalpage - 3); ?></a></li>
  <?php } else if ($currentpage > 3) { ?>
    <li><a href="#" data-page="<?= ($currentpage - 1); ?>" onclick="changepage(this)"><?= ($currentpage - 1); ?></a></li>
  <?php } else if ($currentpage == 2) { ?>
    <li class="active"><span>2</span></li>
  <?php } else { ?>
    <li><a href="#" data-page="2" onclick="changepage(this)">2</a></li>
  <?php }
  if ($currentpage >= $totalpage - 1) { ?>
    <li><a href="#" data-page="<?= ($totalpage - 2); ?>" onclick="changepage(this)"><?= ($totalpage - 2); ?></a></li>
  <?php } else if ($currentpage >= 3) { ?>
    <li class="active"><span><?= $currentpage; ?></span></li>
  <?php } else { ?>
    <li><a href="#" data-page="3" onclick="changepage(this)">3</a></li>
  <?php }
  if ($currentpage == $totalpage) { ?>
    <li><a href="#" data-page="<?= ($totalpage - 1); ?>" onclick="changepage(this)"><?= ($totalpage - 1); ?></a></li>
  <?php } else if ($currentpage == $totalpage - 1) { ?>
    <li class="active"><span><?= $currentpage; ?></span></li>
  <?php } else if ($currentpage > 3 ) { ?>
    <li><a href="#" data-page="<?= ($currentpage + 1); ?>" onclick="changepage(this)"><?= ($currentpage + 1); ?></a></li>
  <?php } else { ?>
    <li><a href="#" data-page="4" onclick="changepage(this)">4</a></li>
  <?php }
  if ($currentpage < $totalpage - 2) { ?>
    <li class="disabled"><span>...</span></li>
  <?php } else if ($currentpage == $totalpage) { ?>
    <li class="active"><span><?= $totalpage; ?></span></li>
  <?php } else { ?>
    <li><a href="#" data-page="<?= $totalpage; ?>" onclick="changepage(this)"><?= $totalpage; ?></a></li>
  <?php }
} else {
  for($i = 1; $i <= $totalpage; $i++) {
    if($i == $currentpage) { ?>
      <li class="active"><span><?= $i; ?></span></li>
    <?php } else { ?>
      <li><a href="#" data-page="<?= $i; ?>" onclick="changepage(this)"><?= $i; ?></a></li>
    <?php }
  }
}
?>
<?php if($currentpage < $totalpage) { ?>
  <li><a href="#" data-page="<?= ($currentpage + 1); ?>" onclick="changepage(this)">></a></li>
  <li><a href="#" data-page="<?= $totalpage; ?>" onclick="changepage(this)">>></a></li>
<?php } else { ?>
  <li class="disabled"><span>></span></li>
  <li class="disabled"><span>>></span></li>
<?php } ?>
</ul>