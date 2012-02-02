<?php
// $Id:  $
/**
 * @file vast_searchlist.tpl.php
 *
 * Theme implementation to display a vast search results listing.
 *
 * Available variables:
 * -
 * - $source
 * - $namespace['o']
 * -
 * - $source->title
 * - $source->updated
 * - $source->published
 * - $source->author->name
 * - $source->author->name
 * - $source->id
 * - $source->link[]
 * - $source->content
 * -
 * - $namespace['o']->totalResults
 * - $namespace['o']->startIndex
 * - $namespace['o']->itemsPerPage
 * -
 */
?>
<?php 
  drupal_set_title($source->title);
  $item_count = 10;
	$total_results = $namespace['o']->totalResults;
	$start_index = $namespace['o']->startIndex;
	$items_per_page = $namespace['o']->itemsPerPage;
  if ($total_results > 0) {	
?>
    <div class="pager-number">Viewing <?php echo($start_index) ?> thru <?php echo($start_index + $items_per_page -1) ?> of <?php echo number_format($total_results) ?> total matches.</div>
<?php 
    echo(theme('vast_pagelinks', $total_results, $start_index, $items_per_page));
?>
<?php 
    echo(theme('vast_sortlinks'));
?>
<hr style="margin: 5px 0; clear: both" />
<div id="listing-page">

<table class="vast-table" cellspacing="6">
<thead>
<tr>
<td class="column-image">Image</td>
<td class="column-year">Year</td> 
<td class="column-make">Make and Model</td>
<td class="column-price">Price</td>
<td class="column-mileage">Mileage</td>
<td class="column-color">Color</td>
<td class="column-distance">Distance</td>
<td class="column-resources">Resources</td>
</tr>
</thead>
<tbody>

<?php
  if (($total_results - $start_index) < 10 ) {
	  $valid_entries = $total_results - $start_index + 1;
	} else {
	  $valid_entries = 10;
	}
  for ($i = 0; $i < $valid_entries; $i++) {
    if ($i % 2) { $zebra = "even"; } else { $zebra = "odd"; }
    $namespace['v'] = $source->entry[$i]->children("http://data.vast.com/ns/listings");
    echo(theme('vast_listentry',$source, $source->entry[$i], $namespace['v'], $zebra));
	}
?>	
</tbody>
</table>
<hr style="margin: 5px 0" />
<?php
    echo(theme('vast_pagelinks', $total_results, $start_index, $items_per_page));
?>
</div>
<?php
  } else {
    echo('No results found<br />');
  }
?>
