<?php
// $Id:  $
/**
 * @file vastdetailstemplate.tpl.php
 *
 * Theme implementation to display a detailed vast auto listing.
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
 */
?>
<?php 
  drupal_set_title($source->title); 
  $image_caption = $source->title . ' - ' . $namespace->price;
?>
<div class="details-page">
<span class="pricestring"><?php echo $namespace->price ?></span>
<hr style="clear:both; margin: 0 0 15px 0" />

<div id="left-col">
<?php
  $img = $namespace->large_image_url;
	if ($img == '') {
    $img = base_path() . drupal_get_path("module", 'vast') . '/images/DefaultPhoto320x240.jpg';
?>
    <img class="bigpic" src="<?php echo $img ?>" /><br style="clear:left"/>
<?php
	} else {
?>
    <a href="<?php echo $namespace->large_image_url ?>" rel="lightbox[vast]" title="<?php echo($image_caption) ?>"><img class="bigpic" src="<?php echo $img ?>" /></a><br style="clear:left"/>
<?php
	}
?>
<span id="contact-seller"><a href="<?php echo $source->link[1]['href'] ?>" target="_blank"><img src="<?php echo(base_path() . drupal_get_path('module', 'vast')) ?>/images/ContactSeller.png" /></a></span>
</div>
<div id="detail-text">
<div class="detail-title">
<span class="carstring"><?php echo $namespace->year . ' ' . $namespace->make . ' ' . $namespace->model ?></span>
</div>
<div class="detail-block1">
<span class="label">Location: </span><?php echo $namespace->location->city ?>, <?php echo $namespace->location->state ?><br />
<?php if ($namespace->trim != '') { ?><span class="label">Trim: </span><?php echo $namespace->trim ?><br /><?php } ?>
<?php if ($namespace->{"body-style"} != '') { ?><span class="label">Body Style: </span><?php echo $namespace->{"body-style"} ?><br /><?php } ?>
<?php if ($namespace->mileage) { ?><span class="label">Mileage: </span><?php echo number_format($namespace->mileage) ?><br /><?php } ?>
<?php if ($namespace->mpg_city) { ?><span class="label">MPG City: </span><?php echo $namespace->mpg_city ?><br /><?php } ?>
<?php if ($namespace->mpg_highway) { ?><span class="label">MPG Highway: </span><?php echo $namespace->mpg_highway ?><br /><?php } ?>
<?php if ($namespace->vehicle_condition) { ?><span class="label">Condition: </span><?php echo $namespace->vehicle_condition ?><br /><?php } ?>
<?php if ($namespace->vin != '') { ?><span class="label">VIN: </span><?php echo $namespace->vin ?><br /><?php } ?>
<?php if ($namespace->auction == 'yes') { ?><span class="label">Auction: </span>Yes<br /><?php } ?>
<?php if ($namespace->transmission) { ?><span class="label">Transmission: </span><?php echo $namespace->transmission ?><br /><?php } ?>
<?php if ($namespace->drive-type) { ?><span class="label">Drive-Type: </span><?php echo $namespace->drive-type ?><br /><?php } ?>
<?php if ($namespace->{"exterior-color"}) { ?><span class='label colorlabel'>Exterior Color: </span><span class='color-box <?php echo($namespace->{"exterior-color"}) ?>'></span><?php echo $namespace->{"exterior-color"} ?><br /><?php } ?>
<?php if ($namespace->{"interior-color"}) { ?><span class='label colorlabel'>Interior Color: </span><span class='color-box <?php echo($namespace->{"interior-color"}) ?>'></span><?php echo $namespace->{"interior-color"} ?><br /><?php } ?>
<?php if ($namespace->engine) { ?><span class="label">Engine: </span><?php echo $namespace->engine ?><br /><?php } ?>
<?php if ($namespace->fuel) { ?><span class="label">Fuel: </span><?php echo $namespace->fuel ?><br /><?php } ?>
<?php if ($namespace->{"body-style"} != '') { ?><span class="label">Body Style: </span><?php echo $namespace->{"body-style"} ?><br /><?php } ?>
<?php if ($namespace->displacement) { ?><span class="label">Displacement: </span><?php echo $namespace->displacement ?><br /><?php } ?>
<?php if ($namespace->one_owner != 0) { ?><span class="label">One Owner: </span>Yes<br /><?php } ?>
<?php if ($namespace->free_carfax_report != 0) { ?><span class="label">Free Carfax Report: </span>Yes<br /><?php } ?>
</div>


</div>

<div style="clear: both"></div>
<hr style="clear:both; margin: 15px 0" />

<?php
if ($namespace->image_count > 1) {
  for ($imagenum = 2; $imagenum <= $namespace->image_count; $imagenum++) {
?>
    <a href="<?php echo($namespace->large_image_url . '_' . $imagenum) ?>" rel="lightbox[vast]" title="<?php echo($image_caption) ?>"><img class="smallpic" src="<?php echo($namespace->tiny_image_url . '_' . $imagenum) ?>" /></a>
<?php 
	}
?>
  <div style="clear: both"></div>
  <hr style="clear:both; margin: 15px 0" />
<?php
}
?>
<?php if ($namespace->details) { ?>
<div class="detail-block5">
<span class="label">Details: </span><br /><?php echo $namespace->details ?><br />
</div>
<?php } ?>
<div style="clear: both"></div></div>
