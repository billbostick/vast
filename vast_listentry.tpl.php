<?php
// $Id:  $
/**
 * @file vast_listentry.tpl.php
 *
 * Theme implementation to display a single entry from a vast search results listing.
 *
 * Available variables:
 * -
 * - $source
 * - $namespace
 * -
 * - $source->title
 * - $source->updated
 * - $source->published
 * - $source->author->name
 * - $source->id
 * - $source->link[]
 * - $source->content
 * - 
 * - $namespace->price
 * - $namespace->vertical
 * - $namespace->item_id
 * - $namespace->domain_name
 * - $namespace->location->state
 * - $namespace->location->country
 * - $namespace->location->zip
 * - $namespace->location->city
 * - $namespace->location->distance
 * - $namespace->location->lat
 * - $namespace->location->lon
 * - $namespace->search_range
 * - $namespace->make
 * - $namespace->model
 * - $namespace->trim
 * - $namespace->year
 * - $namespace->vehicle_condition
 * - $namespace->vin
 * - $namespace->{"body-style"}
 * - $namespace->impressions
 * - $namespace->price
 * - $namespace->price->attributes()->type
 * - $namespace->price->attributes()->symbol
 * - $namespace->price->attributes()->currency
 * - $namespace->price->attributes()->value
 * - $namespace->currency
 * - $namespace->image_url
 * - $namespace->tiny_image_url
 * - $namespace->large_image_url
 * - $namespace->image_count
 * - $namespace->hasimage
 * - $namespace->hosted
 * - $namespace->hosted_type
 * - $namespace->auction
 * - $namespace->dup_count
 * - $namespace->one_owner
 * - $namespace->free_carfax_report
 * - $namespace->mpg_city
 * - $namespace->mpg_highway
 * - $namespace->mpg_combined
 * - $namespace->mpg
 * - $namespace->{"exterior-color"}
 * - $namespace->{"interior-color"}
 * - $namespace->displacement
 * - $namespace->engine
 * - $namespace->transmission
 * - $namespace->fuel
 * - $namespace->{"drive-type"}
 * - $namespace->details
 *
 * -
 * - $zebra
 */
 ?>
<?php
  $img = $namespace->image_url;
  if ($img == '') {
    $img = base_path() . drupal_get_path("module", 'vast') . '/images/DefaultPhoto128x96.jpg';
  }
  $image_link = '<a href="' . base_path() . variable_get('vast_detailurl', 'vastdetail') . '/' . $namespace->item_id . '"><img src='. $img .' /></a>';
  $detail_link = l($namespace->make . ' ' . $namespace->model, variable_get('vast_detailurl', 'vastdetail') . '/' . $namespace->item_id);
  $make_model = $namespace->make . ' ' . $namespace->model;
?>	
  <tr class="<?php echo $zebra ?>">
<?php
  if ($img != '') {
?>
    <td class="column-image"><?php echo($image_link) ?></td>
<?php
  } else {
?>
    <td class="column-image">&nbsp;</td>
<?php
	}
?>
<td class="column-year"><?php echo($namespace->year) ?></td> 
<td class="column-make"><?php echo($detail_link) ?></td>
<td class="column-price"><?php echo($namespace->price)?></td>
<td class="column-mileage"><?php echo(number_format($namespace->mileage)) ?></td>
<td class="column-color"><?php echo($namespace->{"exterior-color"}) ?></td>
<td class="column-distance"><?php echo($namespace->location->distance) ?></td>
<td class="column-resources"><a href="<?php echo $element->link[1]['href'] ?>" target="_blank">Contact&nbsp;Seller</a></td>
</tr>
