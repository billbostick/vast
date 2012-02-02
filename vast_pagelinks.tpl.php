<?php
// $Id:  $
/**
 * @file vast_pagelinks.tpl.php
 *
 * Theme implementation to display the page links for a vast search results listing.
 *
 * Available variables:
 * -
 * - $totalResults
 * - $startIndex
 * - $itemsPerPage
 * -
 */
?>
<div class="vast-pager-wrapper">
<?php 
  if ($start_index > 1) {
?>
<a href="<?php echo(base_path() . variable_get('vast_searchurl', 'vast') . '/firstpage') ?>"><span class="vast-pager">&lt;&lt;&nbsp;First Page</span></a>
<a href="<?php echo(base_path() . variable_get('vast_searchurl', 'vast') . '/prevpage') ?>"><span class="vast-pager">&lt;&nbsp;Previous Page</span></a>
<?php
  } else {
?>
<span class="vast-pager">&lt;&lt;First Page</span>
<span class="vast-pager">&lt;Previous Page</span>
<?php
	}
  if ($total_results >= ($start_index  + $items_per_page)) {
?>
<span class="vast-next-page"><a href="<?php echo(base_path() . variable_get('vast_searchurl', 'vast') . '/nextpage') ?>"><span class="vast-pager">Next Page&nbsp;&gt;</span></a></span>
<span class="vast-pager vast-pager-last">Last Page&nbsp;&gt;&gt;</span>
<?php
	} else {
?>
<span class="vast-pager">Next Page&gt;</span>
<span class="vast-pager vast-pager-last">Last Page&gt;&gt;</span>
<?php
	}
?>

</div>
