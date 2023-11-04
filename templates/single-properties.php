<?php get_header(); ?>


<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-lg-<?php echo intval ( $colid ); ?> col-md-<?php echo intval ( $colid ); ?> col-sm-12">
			<main id="main" class="site-main">

				<div class="articlesListing row">	
					<?php
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                            the_post();

                            $proerty_id = get_the_ID();
                            $area = get_post_meta($proerty_id, 'area', true);
                            $configuration = get_post_meta($proerty_id, 'configuration', true);
                            $price = get_post_meta($proerty_id, 'price', true);
                            $sq_feet = get_post_meta($proerty_id, 'sq_feet', true);
                            $address = get_post_meta($proerty_id, 'address', true);
                            $places_nearby = get_field( 'places_nearby', $proerty_id);
                            $why_should_you_consider_this_property = get_field('why_should_you_consider_this_property', $proerty_id);
                            $features_copy = get_field('features_copy', $proerty_id);
                            $semifurnished = get_field('semifurnished', $proerty_id);
                            $dealer_number = get_post_meta($proerty_id, 'dealer_number', true);
                            $floor_number = get_post_meta($proerty_id, 'floor_number', true);
                            $facing = get_post_meta($proerty_id, 'facing', true);
                            $overlooking = get_post_meta($proerty_id, 'overlooking', true);
                            $property_age = get_post_meta($proerty_id, 'property_age', true);
                            $transaction_type = get_post_meta($proerty_id, 'transaction_type', true);
                            $property_ownership = get_post_meta($proerty_id, 'property_ownership', true);
                            $_flooring = get_post_meta($proerty_id, '_flooring', true);
                            $furnishing = get_post_meta($proerty_id, 'furnishing', true);
                            $width_of_facing_road = get_post_meta($proerty_id, 'width_of_facing_road', true);
                            $gated_community = get_post_meta($proerty_id, 'gated_community', true);
                            $parking = get_post_meta($proerty_id, 'parking', true);
                            $wheelchair_friendly = get_post_meta($proerty_id, 'wheelchair_friendly', true);
                            $pet_friendly = get_post_meta($proerty_id, 'pet_friendly', true);
                            $water_source = get_post_meta($proerty_id, 'water_source', true);
                            $power_backup = get_post_meta($proerty_id, 'power_backup', true);
                            $image_gallery = get_post_meta($proerty_id, 'image_gallery', true); 

                            ?>
                            <div class="mb-srp__list col-9">
                                <div class="mb-srp__card__price">
                                    <div class="mb-srp__card__price--amount"><span class="rupees">₹</span><?php echo $price;?> /-</div>                                                                 
                                    <?php if(!empty($address)){?>
                                        <div class="loaction-details"><i class="fas fa-location-arrow"></i> <?php echo $address;?></div>
                                    <?php } ?>
                                </div>

                                <div class="property-details-wrapper wt-bg-cls">
                                    <div class="property-details-cls">
                                        <div class="property-image">
                                            <?php echo get_the_post_thumbnail();?>                               
                                        </div>
                                    </div>
                                    <div class="mb-srp__card__info-withoutburger">
                                        <?php the_title('<h2>', '</h2>'); ?>

                                        <div class="mb-srp__card__summary ">
                                            <div class="mb-srp__card__summary__list">
                                                <div class="mb-srp__card__summary__list--item" data-summary="carpet-area">
                                                    <div class="mb-srp__card__summary--label">Area</div>
                                                    <div class="mb-srp__card__summary--value"><?php echo $sq_feet;?> sqft</div>
                                                </div>
                                                <div class="mb-srp__card__summary__list--item" data-summary="floor">
                                                    <div class="mb-srp__card__summary--label">Floor</div>
                                                    <div class="mb-srp__card__summary--value"><?php echo $floor_number ; ?></div>
                                                </div>
                                                <div class="mb-srp__card__summary__list--item" data-summary="transaction">
                                                    <div class="mb-srp__card__summary--label">Transaction</div>
                                                    <div class="mb-srp__card__summary--value"><?php echo $transaction_type;?></div>
                                                </div>
                                                <div class="mb-srp__card__summary__list--item" data-summary="furnishing">
                                                    <div class="mb-srp__card__summary--label">Furnishing</div>
                                                    <div class="mb-srp__card__summary--value"><?php echo $semifurnished;?></div>
                                                </div>
                                                <div class="mb-srp__card__summary__list--item" data-summary="facing">
                                                    <div class="mb-srp__card__summary--label">facing</div>
                                                    <div class="mb-srp__card__summary--value"><?php echo $facing;?></div>
                                                </div>
                                                <div class="mb-srp__card__summary__list--item" data-summary="overlooking">
                                                    <div class="mb-srp__card__summary--label">overlooking</div>
                                                    <div class="mb-srp__card__summary--value"><?php echo $overlooking;?></div>
                                                </div>
                                                <div class="mb-srp__card__summary__list--item" data-summary="ownership">
                                                    <div class="mb-srp__card__summary--label">Ownership</div>
                                                    <div class="mb-srp__card__summary--value"><?php echo $property_ownership;?></div>
                                                </div>
                                                <div class="mb-srp__card__summary__list--item" data-summary="parking">
                                                    <div class="mb-srp__card__summary--label">Car Parking</div>
                                                    <div class="mb-srp__card__summary--value"><?php echo $parking;?></div>
                                                </div>
                                                <div class="mb-srp__card__summary__list--item" data-summary="bathroom">
                                                    <div class="mb-srp__card__summary--label">Water Source</div>
                                                    <div class="mb-srp__card__summary--value"><?php echo $water_source;?></div>
                                                </div>
                                                <div class="mb-srp__card__summary__list--item" data-summary="balcony">
                                                    <div class="mb-srp__card__summary--label">Property Age</div>
                                                    <div class="mb-srp__card__summary--value"><?php echo $property_age;?></div>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="mb-srp__card--desc--text">
                                            <h6>Area</h6>
                                            <p><?php echo $area;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="properties-action-details">
                                    <div class="mb-srp__card--desc remove-truncated wt-bg-cls">
                                        <div class="configuration mb-srp__card--desc--text">
                                            <h6>Configuration</h6>
                                            <p><?php echo $configuration;?></p>
                                        </div>
                                    </div>
                                    <div class="place-nearby wt-bg-cls">
                                        <h6>Place Nearby</h6>
                                        <ul class="mb-ldp__amenities__list">
                                        <?php 
                                        foreach ($places_nearby as $places){
                                            $location_name = $places['location_name'];
                                            $location_icon = $places['icon'];
                                            ?>
                                                <li class="mb-ldp__amenities__list--item"><img src="<?php echo $location_icon; ?>" /> <?php echo $location_name;?></li>
                                            <?php 
                                        }
                                        ?>
                                        </ul>
                                    </div>

                                    <div class="why-should-consider-wrapper wt-bg-cls">
                                        <h6>Why should you consider this property?</h6>
                                        <ul class="mb-ldp__amenities__list">
                                        <?php 
                                        foreach ($why_should_you_consider_this_property as $why_this){
                                            $features = $why_this['features'];
                                            $features_icon = $why_this['features_icon'];
                                            ?>
                                                <li class="mb-ldp__amenities__list--item"><img src="<?php echo $features_icon; ?>" /> <?php echo $features;?></li>
                                            <?php 
                                        } ?>
                                        </ul>
                                    </div>

                                    <div class="features-wrapper wt-bg-cls">
                                        <h6>Features</h6>
                                        <ul class="mb-ldp__amenities__list">
                                        <?php
                                        foreach ($features_copy as $features_c){
                                            $features_details = $features_c['features_details'];
                                            $features_icon = $features_c['features_icon'];
                                            ?>
                                                <li class="mb-ldp__amenities__list--item"><img src="<?php echo $features_icon; ?>" /> <?php echo $features_details;?></li>
                                            <?php 
                                        } ?>
                                        </ul>
                                    </div>

                                    <div class="Semifurnished-wrapper wt-bg-cls">
                                        <h6>Semifurnished</h6>
                                        <ul class="mb-ldp__amenities__list">
                                        <?php 
                                            foreach ($semifurnished as $semifurnish){
                                            $semifurnished_details = $semifurnish['semifurnished_details'];
                                            $semifurnished_icon = $semifurnish['semifurnished_icon'];
                                            ?>
                                                <li class="mb-ldp__amenities__list--item"><img src="<?php echo $semifurnished_icon; ?>" /> <?php echo $semifurnished_details;?></li>
                                            <?php 
                                        } ?>
                                        </ul>
                                    </div>
                                    
                                    <div class="amenities-wrapper wt-bg-cls">
                                        <h6>Amenities</h6>
                                        <div class="mb-ldp__amenities">
                                            <ul class="mb-ldp__amenities__list">
                                                <?php if($gated_community == 'Yes'){?>
                                                <li class="mb-ldp__amenities__list--item"><img src="<?php echo plugins_url('', __FILE__); ?>/img/gate.png" /> Gated Community</li>
                                                <?php } ?>
                                                <?php if($parking == 'Yes'){?>
                                                <li class="mb-ldp__amenities__list--item"><img src="<?php echo plugins_url('', __FILE__); ?>/img/parking-lot.png" /> Parking</li>
                                                <?php } ?>
                                                <?php if($wheelchair_friendly == 'Yes'){?>
                                                <li class="mb-ldp__amenities__list--item"><img src="<?php echo plugins_url('', __FILE__); ?>/img/wheelchair.png" /> WheelChair Friendly</li>
                                                <?php } ?>
                                                <?php if($pet_friendly == 'Yes'){?>
                                                <li class="mb-ldp__amenities__list--item"><img src="<?php echo plugins_url('', __FILE__); ?>/img/dog.png" /> Pet Friendly</li>
                                                <?php } ?>
                                                <?php if($water_source == 'Yes'){?>
                                                <li class="mb-ldp__amenities__list--item"><img src="<?php echo plugins_url('', __FILE__); ?>/img/backup.png" /> Water Source</li>
                                                <?php } ?>
                                                <?php if($power_backup == 'Yes'){?>
                                                <li class="mb-ldp__amenities__list--item"><img src="<?php echo plugins_url('', __FILE__); ?>/img/hydro-power.png" /> Power Backup</li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="image_gallery_cls wt-bg-cls">
                                        <h6>Properties More Images</h6>
                                        <div class="more-image-list">
                                            <?php 
                                            $image_gallery = get_field('image_gallery', $proerty_id);
                                            foreach($image_gallery as $single_image){
                                                ?>
                                                <img src="<?php echo $single_image; ?>" />
                                                <?php 
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="dealer-details-cls wt-bg-cls col-3">
                                <h6>Dealer Details</h6>
                                <div class="mb-srp__card__ads">
                                    <div class="mb-srp__card__ads--name">Owner: <?php echo $property_ownership;?></div>
                                </div>
                                <div class="mb-srp__action action--single mb-srp__card__action">
                                    <a href="tel:<?php echo $dealer_number; ?>"><span class="mb-srp__action--btn medium btn-white btn-black wi-whatsapp">Call Now</span></a>
                                </div>
                            </div>

                            

                            <?php 
                        };
                        ?>
                        <!-- <div class="prevNextArticle box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php //previous_post_link( '%link', '<div class="hoverExtend active prev"><span>'.esc_html__('Previous article','construction-light').'</span></div><div class="title prev">%title</div>' ); ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php //next_post_link( '%link', '<div class="hoverExtend active next"><span>'.esc_html__('Next article','construction-light').'</span></div><div class="title next">%title</div>' ); ?>
                                </div>
                            </div>
                        </div> -->
                    <?php
                    };
					?>
				</div><!-- Articales Listings -->

			</main><!-- #main -->
		</div><!-- #primary -->
		
	</div>
</div>

<?php get_footer();
