<?php

// Register Masonic block pattern category.
register_block_pattern_category('masonic', array('label' => __('Masonic', 'masonic_esports')));

/**
 * Register Masonic theme block patterns.
 */
function register_masonic_block_patterns() {

    $upload_dir = wp_upload_dir();
    // Register partner content block pattern.
    register_block_pattern( 
        'masonic_esports/partner-content', 
        array(
            'title'       => __('Partner Content', 'masonic_esports'),
            'description' => _x('Image, text and social icons for partner content', 'Block pattern description', 'masonic_esports'),
            'content'     => '<!-- wp:group {"tagName":"article","align":"wide","className":"reading-width","animation":"slideInLeft"} -->
            <article class="wp-block-group alignwide reading-width coblocks-animate" data-coblocks-animation="slideInLeft"><!-- wp:spacer {"height":50} -->
            <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->
            
            <!-- wp:image {"align":"center","id":200,"sizeSlug":"large","linkDestination":"none"} -->
            <div class="wp-block-image"><figure class="aligncenter size-large"><img src="' . $upload_dir['baseurl'] . '/2022/01/Cougar_logo_orange-1024x213.png" alt="masonic partner cougar" class="wp-image-200"/></figure></div>
            <!-- /wp:image -->
            
            <!-- wp:paragraph {"textColor":"white"} -->
            <p class="has-white-color has-text-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut auctor ullamcorper sem quis auctor. Aenean porta cursus ex, vel accumsan odio. Ut ut lectus eu nulla porttitor dictum ut tristique magna. In volutpat dictum mattis. Sed non erat auctor risus rhoncus ornare vel et nunc. Proin feugiat mauris augue, vel placerat odio tincidunt ac. Cras aliquam ante convallis, eleifend lacus sed, vestibulum leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer in erat ac sapien ornare viverra. Aenean quis fringilla nisi. Sed nec neque eget tortor egestas malesuada vel nec libero. Aliquam vitae convallis nibh. Duis porttitor magna velit, vitae feugiat nunc mollis id.</p>
            <!-- /wp:paragraph -->
            
            <!-- wp:paragraph {"align":"left","textColor":"white"} -->
            <p class="has-text-align-left has-white-color has-text-color">Mauris lorem magna, pharetra eu ornare et, fermentum in nisl. Aliquam sodales, massa in interdum interdum, dui lacus gravida velit, vitae consectetur turpis ligula in lectus. Aenean tempus, mauris vitae elementum blandit, leo erat sagittis libero, at imperdiet sem tellus ac ligula. Donec bibendum orci magna, eu interdum ipsum finibus vulputate. Sed sed diam sed turpis pulvinar commodo sed sed sapien. In sit amet risus et metus hendrerit congue nec id libero. Vivamus nec maximus nunc. Proin turpis turpis, scelerisque quis malesuada quis, venenatis ut felis. Phasellus malesuada ut libero id facilisis. Praesent placerat justo dictum consectetur gravida.</p>
            <!-- /wp:paragraph -->
            
            <!-- wp:paragraph {"align":"left","textColor":"white"} -->
            <p class="has-text-align-left has-white-color has-text-color">Nullam mollis, dolor vitae congue consectetur, orci nulla accumsan diam, in faucibus mi diam sed lacus. Integer mattis enim vel est malesuada tincidunt. Morbi tristique turpis gravida ultrices tristique. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras semper felis eget dolor egestas, vitae euismod turpis tincidunt. Fusce pretium sapien aliquam consequat ornare. Aliquam luctus ornare neque ut dapibus. Duis tempor placerat tincidunt. Donec ullamcorper felis eget tortor pharetra pharetra. Donec condimentum pellentesque scelerisque. Pellentesque at augue iaculis quam lacinia finibus sit amet sit amet felis. Duis molestie felis vitae sem congue egestas. Etiam eget facilisis sem, id vestibulum leo. Cras convallis sapien vel metus dictum egestas. Cras nec orci ac tortor rutrum pellentesque in nec leo. Duis ante quam, euismod et gravida ac, tristique et velit.</p>
            <!-- /wp:paragraph -->
            
            <!-- wp:spacer {"height":50} -->
            <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->
            
            <!-- wp:coblocks/social-profiles {"className":"is-style-mask","hasColors":false,"iconSize":30,"backgroundColor":"white","facebook":"facebook.com","twitter":"twitter.com","instagram":"instafgram.com","youtube":"youtube.com"} /-->
            
            <!-- wp:spacer {"height":50} -->
            <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer --></article>
            <!-- /wp:group -->',
            'categories'  => array('masonic'),
            'keywords'    => array('masonic')
        )
    );

    // Register CTA tagline block pattern.
    register_block_pattern( 
        'masonic_esports/tagline',
        array(
            'title'       => __('Tagline', 'masonic_esports'),
            'description' => _x('CTA tagline', 'Block pattern description', 'masonic_esports'),
            'content'     => '<!-- wp:coblocks/hero {"layout":"center-center","paddingSize":"advanced","paddingSyncUnits":true,"backgroundImg":"' . $upload_dir['baseurl'] . '/2022/01/teambuilding.png","focalPoint":{"x":"0.50","y":"0.30"},"height":200,"heightMobile":200,"contentAlign":"center","maxWidth":1000,"saveCoBlocksMeta":false,"className":"partners__tagline","coblocks":{"id":"018154729821"}} -->
            <div class="wp-block-coblocks-hero alignfull coblocks-hero-018154729821 partners__tagline"><div class="wp-block-coblocks-hero__inner bg-cover has-background-image bg-no-repeat bg-center-center hero-center-center-align has-padding has-center-content" style="background-image:url(' . $upload_dir['baseurl'] . '/2022/01/teambuilding.png);background-position:50% 30%;min-height:200px"><div class="wp-block-coblocks-hero__content-wrapper"><div class="wp-block-coblocks-hero__content" style="max-width:1000px"><!-- wp:heading {"textAlign":"left","placeholder":"Add hero heading…","textColor":"white","fontSize":"huge"} -->
            <h2 class="has-text-align-left has-white-color has-text-color has-huge-font-size" id="we-love-our-partners">WE LOVE OUR PARTNERS</h2>
            <!-- /wp:heading -->
            
            <!-- wp:buttons {"align":"center","layout":{"type":"flex","justifyContent":"right","orientation":"horizontal","flexWrap":"nowrap"}} -->
            <div class="wp-block-buttons"><!-- wp:button {"placeholder":"Primary button…","textColor":"white","style":{"color":{"gradient":"linear-gradient(200deg,rgb(135,39,131) 0%,rgb(46,49,134) 100%)"}},"className":"is-style-fill partner-btn"} -->
            <div class="wp-block-button is-style-fill partner-btn"><a class="wp-block-button__link has-white-color has-text-color has-background" href="mailto:contact@masonic.gg" style="background:linear-gradient(200deg,rgb(135,39,131) 0%,rgb(46,49,134) 100%)"><strong>Get in Touch</strong> [icon name="envelope" prefix="far"]</a></div>
            <!-- /wp:button --></div>
            <!-- /wp:buttons --></div></div></div></div>
            <!-- /wp:coblocks/hero -->',
            'categories'  => array('masonic'),
            'keywords'    => array('masonic')
        )
    );

    // Register Latest posts slider block pattern.
    register_block_pattern( 
        'masonic_esports/latest-posts',
        array(
            'title'       => __('Latest Posts', 'masonic_esports'),
            'description' => _x('Slider with latest posts', 'Block pattern description', 'masonic_esports'),
            'content'     => '<!-- wp:group {"tagName":"section","align":"full","className":"has-no-padding","animation":"slideInLeft","padding":"no"} -->
            <section class="wp-block-group alignfull has-no-padding coblocks-animate" data-coblocks-animation="slideInLeft"><!-- wp:heading {"textAlign":"left","align":"full","style":{"typography":{"fontSize":"40px"}},"textColor":"white","fontFamily":""} -->
            <h2 class="alignfull has-text-align-left has-white-color has-text-color" id="news" style="font-size:40px">NEWS</h2>
            <!-- /wp:heading -->
            
            <!-- wp:ap-block/posts {"align":"full","cId":"cab4635d-e3ff-43af-ba0e-9392217d7f4b","layout":"slider","subLayout":"overlay-content","columns":{"desktop":4,"tablet":2,"mobile":1},"postsPerPage":8,"contentBG":{"color":"#000000b3","styles":"background-color: #000000b3;","type":"solid","gradient":"linear-gradient(135deg, #4527a4, #8344c5)","image":{},"position":"center center","attachment":"initial","repeat":"no-repeat","size":"cover","overlayColor":"#000000b3"},"contentPadding":{"vertical":"20px","horizontal":"25px","side":4,"top":"0px","right":"0px","bottom":"0px","left":"0px","styles":"0px 0px 0px 0px"},"border":{"radius":"5px","width":"0px","style":"solid","color":"#0000","side":"all","styles":"border-radius: 5px;"},"sliderIsLoop":false,"sliderIsAutoplay":false,"sliderPageColor":"rgba(255, 255, 255, 1)","sliderPageBorder":{"radius":"50%","width":"0px","style":"solid","color":"#0000","side":"all","styles":"border-radius: 50%;"},"sliderPrevNextColor":"rgba(135, 39, 131, 1)","isFImgLink":true,"titleTypo":{"fontFamily":"Roboto","fontSize":25,"googleFontLink":"https://fonts.googleapis.com/css2?family=Roboto\u0026display=swap","styles":"font-family: "Roboto", sans-serif; font-size: 25px; line-height: 135%;"},"titleColor":"rgba(255, 255, 255, 1)","titleMargin":{"bottom":"15px","side":4,"vertical":"0px","horizontal":"0px","top":"0px","right":"0px","left":"20px","styles":"0px 0px 15px 20px"},"isMetaAuthor":false,"metaTypo":{"fontSize":13,"textTransform":"uppercase","styles":"font-size: 13px; text-transform: uppercase; line-height: 135%;","googleFontLink":"https://fonts.googleapis.com/css2?family=Open+Sans\u0026display=swap"},"metaTextColor":"rgba(255, 255, 255, 0.7)","metaLinkColor":"rgba(0, 0, 0, 1)","metaIconColor":"rgba(255, 255, 255, 0.9)","metaColorsOnImage":{"color":"#fff","bg":"#4527a4","bgType":"solid","gradient":"linear-gradient(135deg, #4527a4, #8344c5)","styles":"color: #fff; background: #4527a4;"},"metaMargin":{"bottom":"15px","side":4,"vertical":"0px","horizontal":"0px","top":"0px","right":"0px","left":"20px","styles":"0px 0px 15px 20px"},"isExcerpt":false,"excerptColor":"#fff","isReadMore":false} /--></section>
            <!-- /wp:group -->',
            'categories'  => array('masonic'),
            'keywords'    => array('masonic')
        )
    );

    // Register Partners Showcase with CTA block pattern.
    register_block_pattern( 
        'masonic_esports/partners-showcase',
        array(
            'title'       => __('Partners Showcase', 'masonic_esports'),
            'description' => _x('Showcase partner logos with links and CTA', 'Block pattern description', 'masonic_esports'),
            'content'     => '<!-- wp:columns {"align":"full"} -->
            <div class="wp-block-columns alignfull"><!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:coblocks/hero {"layout":"center-center","paddingSize":"medium","backgroundImg":"' . $upload_dir['baseurl'] . '/2022/01/teambuilding.png","focalPoint":{"x":"0.50","y":"0.45"},"height":400,"heightMobile":200,"contentAlign":"center","maxWidth":700,"saveCoBlocksMeta":false,"coblocks":{"id":"018154729821"}} -->
            <div class="wp-block-coblocks-hero alignfull coblocks-hero-018154729821"><div class="wp-block-coblocks-hero__inner bg-cover has-background-image bg-no-repeat bg-center-center hero-center-center-align has-padding has-medium-padding has-center-content" style="background-image:url('.$upload_dir['baseurl'].'/2022/01/teambuilding.png);background-position:50% 45%;min-height:400px"><div class="wp-block-coblocks-hero__content-wrapper"><div class="wp-block-coblocks-hero__content" style="max-width:700px"><!-- wp:heading {"textAlign":"center","placeholder":"Add hero heading…","textColor":"white","fontSize":"huge"} -->
            <h2 class="has-text-align-center has-white-color has-text-color has-huge-font-size" id="become-a-partner">BECOME A PARTNER</h2>
            <!-- /wp:heading -->
            
            <!-- wp:paragraph {"align":"center","placeholder":"Add hero content, which is typically an introductory area of a page accompanied by call to action or two.","textColor":"white","fontSize":"medium"} -->
            <p class="has-text-align-center has-white-color has-text-color has-medium-font-size">Join our circle by becoming a partner</p>
            <!-- /wp:paragraph -->
            
            <!-- wp:spacer {"height":30} -->
            <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->
            
            <!-- wp:buttons {"align":"center","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
            <div class="wp-block-buttons"><!-- wp:button {"placeholder":"Primary button…","textColor":"white","style":{"color":{"gradient":"linear-gradient(200deg,rgb(135,39,131) 0%,rgb(46,49,134) 100%)"}},"className":"is-style-fill partner-btn"} -->
            <div class="wp-block-button is-style-fill partner-btn"><a class="wp-block-button__link has-white-color has-text-color has-background" href="mailto:contact@masonic_gg" style="background:linear-gradient(200deg,rgb(135,39,131) 0%,rgb(46,49,134) 100%)"><strong>Get In Touch</strong> [icon name="envelope" prefix="far"]</a></div>
            <!-- /wp:button --></div>
            <!-- /wp:buttons --></div></div></div></div>
            <!-- /wp:coblocks/hero --></div>
            <!-- /wp:column -->
            
            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:columns -->
            <div class="wp-block-columns"><!-- wp:column -->
            <div class="wp-block-column"><!-- wp:image {"id":200,"sizeSlug":"medium","linkDestination":"custom"} -->
            <figure class="wp-block-image size-medium"><a href="' . get_site_url() . '/partners/cougar/"><img src="' . $upload_dir['baseurl'] . '/2022/01/Cougar_logo_orange-300x63.png" alt="masonic partner cougar" class="wp-image-200"/></a></figure>
            <!-- /wp:image -->
            
            <!-- wp:spacer {"height":250} -->
            <div style="height:250px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer --></div>
            <!-- /wp:column -->
            
            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:spacer {"height":125} -->
            <div style="height:125px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->
            
            <!-- wp:image {"id":201,"sizeSlug":"medium","linkDestination":"custom"} -->
            <figure class="wp-block-image size-medium"><a href="' . get_site_url() . '/partners/all-logistics-a-s/"><img src="' . $upload_dir['baseurl'] . '/2022/01/ALL_logo_white-300x90.png" alt="masonic partner all logistics" class="wp-image-201"/></a></figure>
            <!-- /wp:image --></div>
            <!-- /wp:column --></div>
            <!-- /wp:columns --></div>
            <!-- /wp:column --></div>
            <!-- /wp:columns -->',
            'categories'  => array('masonic'),
            'keywords'    => array('masonic')
        )
    );

    // Register Socials block pattern.
    register_block_pattern( 
        'masonic_esports/socials',
        array(
            'title'       => __('Socials', 'masonic_esports'),
            'description' => _x('Social icons with a heading and subtitle', 'Block pattern description', 'masonic_esports'),
            'content'     => '<!-- wp:group {"align":"full"} -->
            <div class="wp-block-group alignfull"><!-- wp:uagb/advanced-heading {"block_id":"8b21b161","classMigrate":true,"headingColor":"#ffffff","subHeadingColor":"#ffffff","separatorColor":"#872783","headSpace":10,"headFontSize":40,"subHeadFontSize":30} -->
            <div class="wp-block-uagb-advanced-heading uagb-block-8b21b161"><h2 class="uagb-heading-text">FOLLOW US</h2><div class="uagb-separator-wrap"><div class="uagb-separator"></div></div><p class="uagb-desc-text">Stay in touch for the latest matches and news</p></div>
            <!-- /wp:uagb/advanced-heading -->
            
            <!-- wp:spacer {"height":50} -->
            <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->
            
            <!-- wp:coblocks/social-profiles {"align":"full","className":"is-style-mask","hasColors":false,"opensInNewTab":true,"size":"lrg","iconSize":50,"textAlign":"center","backgroundColor":"white","facebook":"facebook.com","twitter":"twitter.com","instagram":"instagram.com","linkedin":"linkedin.com","youtube":"youtube.com"} /--></div>
            <!-- /wp:group -->',
            'categories'  => array('masonic'),
            'keywords'    => array('masonic')
        )
    );
}

add_action('init', 'register_masonic_block_patterns');