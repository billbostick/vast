<?php
// $Id:  $
/**
 * @file vast_sortlinks.tpl.php
 *
 * Theme implementation to display the sort links in a vast search results listing.
 *
 */
?>
<div class="vast-sortlinks-wrapper">
<?php
  $sort_order = $_SESSION['vast']['sort'];
?>
Sort by: <span class="vast-sort-link">
<?php
  if (!$sort_order) { ?>Relevance<?php	} else { ?><a href="<?php echo(base_path() . variable_get('vast_searchurl', 'vast') . '/sortbyrelevance') ?>">Relevance</a><?php	} ?>
  </span>&nbsp;|&nbsp;
<span class="vast-sort-link">
<?php
  if ($sort_order == '1') { ?>Price<?php	} else { ?><a href="<?php echo(base_path() . variable_get('vast_searchurl', 'vast') . '/sortbyprice') ?>"> Price </a><?php	} ?>
</span>&nbsp;|&nbsp;
<span class="vast-sort-link">
<?php
  if ($sort_order == '5') { ?>Mileage<?php	} else { ?><a href="<?php echo(base_path() . variable_get('vast_searchurl', 'vast') . '/sortbymileage') ?>"> Mileage </a> <?php   } ?>
  </span>&nbsp;|&nbsp;
<span class="vast-sort-link vast-sort-link-last">
<?php
  if ($sort_order == '3') { ?>Distance<?php	} else { ?><a href="<?php echo(base_path() . variable_get('vast_searchurl', 'vast') . '/sortbydistance') ?>"> Distance </a> <?php  } ?>
</span>
</div>