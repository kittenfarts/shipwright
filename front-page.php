<?php
/*
Template Name: Front Page
*/
?>
<?php get_header(); ?>

<?php if( have_rows('slides') ): ?>
<div id="header-image" class="full-height">
  <ul class="bxslider full-height">
<?php while ( have_rows('slides') ) : the_row(); ?>      
    <li style="background-image: url(<?php the_sub_field('image'); ?>);"  class="full-height">
      <div class="vert-center full-height">
        <section>
          <h2>Harkinson Investment Corporation</h2>  
          <h3>Pride in Ownership</h3>
        </section>
      </div>
      <div class="infobox">
        <h4><?php the_sub_field('title'); ?></h4>  
        <h5><?php the_sub_field('sub_title'); ?></h5>
        <?php the_sub_field('copy'); ?>
      </div>
    </li>
<?php endwhile; ?>
  </ul>
</div>
<?php endif;?>

<div class="headlinez">
  <section>
    <?php the_field('about_us_section'); ?>
  </section>    
</div>
    
<div class="tab-bg" style="background-image: url(<?php the_field('portfolio_bg'); ?>);">
  <section>
    <a href="<?php the_field('portfolio_link'); ?>" class="tab">View Our Portfolio</a>  
  </section>
</div>
    
<div class="headlinez">
  <section>
    <?php the_field('services_section'); ?>
  </section>    
</div>
    
<?php if( have_rows('services_icons') ): ?>
<ul class="iconz">
<?php while ( have_rows('services_icons') ) : the_row(); ?>   
  <li class="<?php the_sub_field('icon'); ?> box-1-3">
    <strong><?php the_sub_field('title'); ?></strong>
    <?php the_sub_field('copy'); ?>
  </li>  
<?php endwhile; ?>
</ul>
<?php endif;?>

<div class="tab-bg" style="background-image: url(<?php the_field('available_properties_bg'); ?>);">
  <section>
    <a href="<?php the_field('available_properties_link'); ?>" class="tab">View Available Properties</a>  
  </section>
</div>

    
<div class="headlinez">
  <section>
    <?php the_field('contact_section'); ?>
  </section>    
</div>
    
<?php if( have_rows('cta_boxes') ): ?>
<div class="ctaboxes">
  <section class="row">
<?php while ( have_rows('cta_boxes') ) : the_row(); ?> 
    <a href="<?php the_sub_field('link'); ?>" class="box-1-2"><strong><?php the_sub_field('title'); ?></strong> <?php the_sub_field('text'); ?></a>  
<?php endwhile; ?>
  </section>
</div>
<?php endif;?>
    
<div class="tab-bg">
  <section>
    <a href="<?php the_field('contact_link'); ?>" class="tab">CONTACT THE HARKINSON’S TEAM</a>  
  </section>
  <div id="map-canvas"></div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type='text/javascript'>
var map;
  
var MY_MAPTYPE_ID = 'custom_style';

function initialize() {

  var featureOpts = [
    {
        "featureType": "landscape",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "stylers": [
            {
                "hue": "#00aaff"
            },
            {
                "saturation": -100
            },
            {
                "gamma": 2.15
            },
            {
                "lightness": 12
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": 24
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": 57
            }
        ]
    }
];

  var mapOptions = {
        zoom: 12,
        scrollwheel: false,
        disableDefaultUI: true,
        navigationControl: false,
        mapTypeControl: false,
        scaleControl: false,
        draggable: true,
        center: new google.maps.LatLng(<?php the_field('coordinates','options'); ?>),
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
    },
    mapTypeId: MY_MAPTYPE_ID
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var styledMapOptions = {
    name: 'Custom Style'
  };

  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
    
  var contentString = '<div class="infowindow"><h4>Harkinson Investment Corp.</h4><?php the_field('street_address', 'options'); ?><a href="<?php the_field('maps_link', 'options'); ?>">GET DIRECTIONS ▶</a></div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });    
    

  map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
        var iconBase = '<?php bloginfo( 'template_directory' ); ?>/images/';
        var marker= new google.maps.Marker({
          position: new google.maps.LatLng(<?php the_field('coordinates','options'); ?>),
          map: map,
          icon: iconBase + 'map-marker.png' 
        });
    google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
       
}
google.maps.event.addDomListener(window, 'load', initialize);
</script> 
</div>

<?php get_footer(); ?>