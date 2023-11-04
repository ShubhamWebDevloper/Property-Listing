<?php
/*
Plugin Name: Property Listing Plugin
Description: A simple WordPress plugin for show all listing properties on website. Shortcode: [properties-grid]
Version: 1.0
Author: Shubham Verma
*/

function enqueue_custom_scripts_and_styles() {
    // Enqueue the CSS file
    wp_enqueue_style('pl-plugin-css', plugin_dir_url(__FILE__) . 'css/pl-style.css', array(), '1.0.0');

    // Enqueue the JS file
    wp_enqueue_script('pl-plugin-js', plugin_dir_url(__FILE__) . 'js/pl-script.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts_and_styles');


function custom_register_properties_post_type() {
    $labels = array(
        'name'               => 'Properties',
        'singular_name'      => 'Property',
        'menu_name'          => 'Properties',
        'name_admin_bar'     => 'Property',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Property',
        'new_item'           => 'New Property',
        'edit_item'          => 'Edit Property',
        'view_item'          => 'View Property',
        'all_items'          => 'All Properties',
        'search_items'       => 'Search Properties',
        'parent_item_colon'  => 'Parent Properties:',
        'not_found'          => 'No properties found.',
        'not_found_in_trash' => 'No properties found in Trash.'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-admin-home', // Customize the icon
        'query_var'           => true,
        'rewrite'             => array('slug' => 'properties'), // Customize the URL slug
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('properties', $args);
}

add_action('init', 'custom_register_properties_post_type');

function custom_template_for_custom_post_type($template) {
    if (is_singular('properties')) {
        $template = plugin_dir_path(__FILE__) . 'templates/single-properties.php';
    }
    return $template;
}

add_filter('single_template', 'custom_template_for_custom_post_type');



function properties_grid_shortcode_func($atts) {    

    $args = array(
        'post_type' => 'properties',
        'posts_per_page' => -1,
    );
    $custom_query = new WP_Query($args);
    

    if ($custom_query->have_posts()) {
        while ($custom_query->have_posts()) {
            $custom_query->the_post();
            
            $proerty_id = get_the_ID();
            $area = get_post_meta($proerty_id, 'area', true);
            $configuration = get_post_meta($proerty_id, 'configuration', true);
            $price = get_post_meta($proerty_id, 'price', true);
            $sq_feet = get_post_meta($proerty_id, 'sq_feet', true);
            $address = get_post_meta($proerty_id, 'address', true);
            $places_nearby = get_post_meta($proerty_id, 'places_nearby', true);
            $why_should_you_consider_this_property = get_post_meta($proerty_id, 'why_should_you_consider_this_property', true);
            $features_copy = get_post_meta($proerty_id, 'features_copy', true);
            $semifurnished = get_post_meta($proerty_id, 'semifurnished', true);
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
            <div class="mb-srp__list">
                <div class="mb-srp__card has-package">
                    <div class="mb-srp__card__container ">
                        <div class="mb-srp__card__photo">
                            <div class="mb-srp__card__photo__fig">
                                <?php echo get_the_post_thumbnail();?>
                                <img src="https://dunlite.com.au/wp-content/uploads/2019/04/placeholder.jpg" decoding="async" alt="Owner property for sale in Chennai" title="Owner property for sale in Chennai" width="100%" height="100%" class="mb-srp__card__photo__fig--graphic">                                
                            </div>
                            <div class="mb-srp__card__ads">
                                <div class="mb-srp__card__ads--name">Owner: <?php echo $property_ownership;?></div>
                            </div>
                            <?php if(!empty($address)){?>
                                <div class="loaction-details"><i class="fas fa-location-arrow"></i> <?php echo $address;?></div>
                            <?php } ?>
                        </div>
                        <div class="mb-srp__card__info mb-srp__card__info-withoutburger">
                            <?php the_title('<h5>', '</h5>'); ?>
                            
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
                        </div>
                    </div>
                    <div class="mb-srp__card__estimate ">
                        <div class="mb-srp__card--desc remove-truncated">
                            <div class="mb-srp__card--desc--text">
                                <p class=""><?php echo $area;?></p>
                            </div>
                        </div>
                        <div class="mb-srp__card__price">
                            <div class="mb-srp__card__price--amount"><span class="rupees">₹</span><?php echo $price;?> /-</div>
                            <div class="mb-srp__card__price--size"><?php echo $sq_feet;?> sqft </div>
                        </div>
                        <div class="mb-srp__action action--single mb-srp__card__action">
                            <a href="<?php echo get_the_permalink(); ?>"><span class="mb-srp__action--btn medium btn-red">View More</span></a>
                            <a href="tel:<?php echo $dealer_number; ?>"><span class="mb-srp__action--btn medium btn-white btn-black wi-whatsapp">Call Now</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php 

        };
    
        
        wp_reset_postdata();
    } else {
        echo 'No Properties found.';
    }
    ?>
    
    
    <?php 
}
add_shortcode('properties-grid', 'properties_grid_shortcode_func');
