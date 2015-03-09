<?php
global $data;
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width" />
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
         <?php echo $data['style_head']; ?>
        <?php echo $data['script_head']; ?>
    </head>
    <body>
            <div class="header_top">
                <div class="container">
                <div class="col-sm-5 header-left">
                    <a href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo $data['media_logo']; ?>" alt="Mishiyeva Law, PLLC. logo"/></a>
                </div>
               <div class="col-sm-7 header-right">
                    
                        <div class="address-mobile">
                            <a href="http://maps.google.com/?q=<?php echo strip_tags($data['address1']) ?>"><i class="fa fa-map-marker map-fa"></i><br>Find Us</a>
                        </div>
                        <div class="Mobile-fone">
                            <a href="tell:<?php echo $data['phone1']; ?>">
                                <i class="fa fa-phone fone-fa"></i> <br> Call Us </a>
                        </div>
<!--                       <div class="inner-header-left">
                            <p><?php //echo $data['address1']?></p>
                        </div>-->
                         <div class="inner-header-right">
                            <p><?php echo $data['phone_heading']; ?></p>
                            <h5><?php echo $data['phone1']; ?></h5>
                            <p style="padding-top: 0px;">SE HABLA ESPAÑOL</p>
                        </div>
                    </div>
                    </div>
                </div>
        <div class="nav-bar">
         <div class="container">   
                <?php
                    $defaults = array(
                        'theme_location' => 'primary',
                        'menu' => '',
                        'container' => 'div',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => 'navbar-top',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 0,
                        'walker' => ''
                    );

                    wp_nav_menu($defaults);
                    ?>
                 <div class="clear"></div>
                </div>
            </div>
           <?php if(is_front_page()){?>
             <div class="inner-banner-sheet">
                <div class="container">
                   
                       
                        <div class="middle">
                             <img src="<?php echo $data['banner_text'] ?>" alt="banner Text" class="text-logo" />
<!--                             <div class="avvo_header">
                                 <a href="<?php echo $data['avvo_link_banner'];?>" target="_blank" aur rel="nofollow">
                                     <img src="<?php echo $data['avvo_banner_img2']?>" />
                                 </a>
                             </div>-->
                        </div>
                         <div class="left">
                            <a href="<?php echo $data['lawyer1_link']; ?>">
                                <img class="" src="<?php echo $data['lawyer_banner_img'] ?>" alt=""/>
                            </a>
                        </div>
                    </div>          
                </div>          
     <?php }?>
            
