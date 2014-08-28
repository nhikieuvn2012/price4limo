<?php

function n960r_2_defaults() {
	$all = array (
  'n960r_2_css' => '&grid_960
&go_responsive
&body
&base_typography
&misc
&links
&forms

&main_content_areas
&logo
&nav
&headline_area
&social_buttons
&post_box
&author_box
&comments
&widget

&show_grid_lines

&mmq


',
  'n960r_2_boxes' => 
  array (
    'thesis_html_container' => 
    array (
      'thesis_html_container_1356709359' => 
      array (
        'id' => 'header_area',
        'class' => 'full_width',
        '_name' => 'Header Area',
      ),
      'thesis_html_container_1356709388' => 
      array (
        'id' => 'header',
        'class' => 'row',
        '_name' => '#header .row',
      ),
      'thesis_html_container_1356709758' => 
      array (
        'class' => 'six columns',
        '_name' => '6 Columns (#header > left)',
      ),
      'thesis_html_container_1356709775' => 
      array (
        'class' => 'six columns',
        '_name' => '6 Columns (#header > right)',
      ),
      'thesis_html_container_1356710294' => 
      array (
        'id' => 'feature_area',
        'class' => 'full_width',
        '_name' => 'Feature Area',
      ),
      'thesis_html_container_1356710306' => 
      array (
        'id' => 'feature',
        'class' => 'row',
        '_name' => '#feature .row (Feature Box)',
      ),
      'thesis_html_container_1356710406' => 
      array (
        'class' => 'eight columns',
        '_name' => '8 Columns (#feature > left)',
      ),
      'thesis_html_container_1356710459' => 
      array (
        'class' => 'four columns',
        '_name' => '4 Columns (#feature > right)',
      ),
      'thesis_html_container_1356711213' => 
      array (
        'id' => 'content_area',
        'class' => 'full_width',
        '_name' => 'Content Area',
      ),
      'thesis_html_container_1356711228' => 
      array (
        'id' => 'content',
        'class' => 'row',
        '_name' => '#content .row',
      ),
      'thesis_html_container_1356711325' => 
      array (
        'html' => 'article',
        'id' => 'main_content',
        'class' => 'eight columns',
        '_name' => '8 columns (#content > left)',
      ),
      'thesis_html_container_1356711366' => 
      array (
        'html' => 'aside',
        'id' => 'sidebar',
        'class' => 'four columns',
        '_name' => '4 columns (#content > right)',
      ),
      'thesis_html_container_1356711671' => 
      array (
        'class' => 'headline_area',
        '_name' => 'Headline Area',
      ),
      'thesis_html_container_1356711692' => 
      array (
        'class' => 'headline_meta',
        '_name' => 'Headline Meta',
      ),
      'thesis_html_container_1356779289' => 
      array (
        'id' => 'footer_area',
        'class' => 'full_width',
        '_name' => 'Footer Area',
      ),
      'thesis_html_container_1356779328' => 
      array (
        'id' => 'footer',
        'class' => 'row',
        '_name' => '#footer .row',
      ),
      'thesis_html_container_1356779411' => 
      array (
        'class' => 'four columns',
        '_name' => '4 columns (#footer > left)',
      ),
      'thesis_html_container_1356779439' => 
      array (
        'class' => 'four columns',
        '_name' => '4 columns (#footer > mid)',
      ),
      'thesis_html_container_1356779467' => 
      array (
        'class' => 'four columns',
        '_name' => '4 columns (#footer > right)',
      ),
      'thesis_html_container_1357079292' => 
      array (
        'class' => 'comment_wrapper',
        '_name' => 'Comment Wrapper',
      ),
      'thesis_html_container_1357079333' => 
      array (
        'class' => 'comment_meta',
        '_name' => 'Comment Intro Wrapper',
      ),
      'thesis_html_container_1357079423' => 
      array (
        'class' => 'author_box',
        '_name' => 'Author Box',
      ),
      'thesis_html_container_1357318441' => 
      array (
        '_name' => 'Archive Intro',
      ),
      'thesis_html_container_1357318519' => 
      array (
        'id' => 'prev_next_container',
        '_name' => 'Prev & Next Container',
      ),
      'thesis_html_container_1357318552' => 
      array (
        'id' => 'next_container',
        'class' => 'six columns',
        '_name' => 'Next Container',
      ),
      'thesis_html_container_1357318634' => 
      array (
        'class' => 'six columns',
        '_name' => 'Prev Container',
      ),
      'thesis_html_container_1357319945' => 
      array (
        'id' => 'main_content',
        'class' => 'eight columns centered',
        '_name' => '8 Columns (#content > skinny)',
      ),
    ),
    'thesis_wp_nav_menu' => 
    array (
      'thesis_wp_nav_menu_1356709882' => 
      array (
        'menu' => '13',
        'menu_id' => 'primary_nav',
        '_name' => 'Primary Nav',
      ),
    ),
    'thesis_html_body' => 
    array (
      'thesis_html_body' => 
      array (
        'wp' => 
        array (
          'auto' => true,
        ),
      ),
    ),
    'thesis_text_box' => 
    array (
      'thesis_text_box_1356710926' => 
      array (
        'text' => '<h2 class="headline">Insert your fabulous headline here!</h2>
<ul>
<li>Lorem ipsum dolor sit amet!</li>
<li>Cras sit amet nisl neque, ac volutpat libero.</li>
<li>Nam nisi arcu, mattis et pharetra ultrices.</li>
<li>Donec aliquam sapien vestibulum.</li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel ipsum odio, ut eleifend ipsum. Donec sed orci dolor, a scelerisque ligula. Aenean in vestibulum lacus.</p> ',
        'filter' => 
        array (
          'on' => true,
        ),
        'id' => 'feature_text',
        'class' => 'post_box',
        '_name' => 'Feature Box Text',
      ),
      'thesis_text_box_1357314885' => 
      array (
        'text' => '<h4>Hello I\'m a Text area</h4>
<p>But you can also replace me with a widget.</p>',
        'class' => 'widget',
        '_name' => 'Footer Left',
      ),
      'thesis_text_box_1357314988' => 
      array (
        'text' => '<h4>Hello I\'m a Text area</h4>
<p>But you can also replace me with a widget.</p>',
        'class' => 'widget',
        '_name' => 'Footer Mid',
      ),
      'thesis_text_box_1357314999' => 
      array (
        'text' => '<h4>Hello I\'m a Text area</h4>
<p>But you can also replace me with a widget.</p>',
        'class' => 'widget',
        '_name' => 'Footer Right',
      ),
    ),
    'thesis_wp_widgets' => 
    array (
      'thesis_wp_widgets_1356710967' => 
      array (
        '_name' => 'Feature Box Widget',
      ),
      'thesis_wp_widgets_1356713376' => 
      array (
        '_name' => 'Sidebar Widgets',
      ),
    ),
    'thesis_post_box' => 
    array (
      'thesis_post_box_1356711530' => 
      array (
        'schema' => 'article',
        '_name' => 'Page/Post Box',
      ),
      'thesis_post_box_1357074380' => 
      array (
        'class' => 'eleven',
        'schema' => 'article',
        '_name' => 'home/archive Page Post Box',
      ),
    ),
    'thesis_site_title' => 
    array (
      'thesis_site_title' => 
      array (
        'class' => 'logo',
      ),
    ),
    'smt_social_buttons_lite' => 
    array (
      'smt_social_buttons_lite_1356796940' => 
      array (
        '_name' => 'After Headline Social Buttons',
      ),
    ),
    'thesis_comment_form' => 
    array (
      'thesis_comment_form_1357079145' => 
      array (
        '_name' => 'Comment Form',
      ),
    ),
    'thesis_comments' => 
    array (
      'thesis_comments_1357079208' => 
      array (
        '_name' => 'Comments',
      ),
    ),
    'thesis_post_author' => 
    array (
      'thesis_post_box_1356711530_thesis_post_author' => 
      array (
        'intro' => 'Blog post by',
        '_parent' => 'thesis_post_box_1356711530',
      ),
    ),
    'thesis_post_author_avatar' => 
    array (
      'thesis_post_box_1356711530_thesis_post_author_avatar' => 
      array (
        'size' => '66',
        '_parent' => 'thesis_post_box_1356711530',
      ),
    ),
    'thesis_comment_avatar' => 
    array (
      'thesis_comments_1357079208_thesis_comment_avatar' => 
      array (
        'size' => '78',
        '_parent' => 'thesis_comments_1357079208',
      ),
    ),
    'ri_credits' => 
    array (
      'ri_credits' => 
      array (
        'start_date' => '2012',
      ),
    ),
    'thesis_previous_post_link' => 
    array (
      'thesis_previous_post_link' => 
      array (
        'intro' => 'Previous Post:',
      ),
    ),
    'thesis_next_post_link' => 
    array (
      'thesis_next_post_link' => 
      array (
        'intro' => 'Next Post: ',
      ),
    ),
  ),
  'n960r_2_packages' => 
  array (
    'thesis_package_basic' => 
    array (
      'thesis_package_basic_1356709147' => 
      array (
        '_name' => 'My Media Queries',
        '_ref' => 'mmq',
        '_css' => '/* Very large display targeting */
@media only screen and (min-width: 1441px) { ... }
					  
/* Medium display targeting */
@media only screen and (max-width: 1279px) and (min-width: 768px) { ... }

/* Small display targeting */
@media only screen and (max-width: 767px) { ... }

/* Touch-enabled device targeting */
@media screen and (orientation: landscape) { ... }
@media screen and (orientation: portrait) { ... }

@media only screen and (max-width: 1279px) and (min-width: 768px) { ... }
@media only screen and (max-width: 767px) { ... }

/* 1280 tablet ------------ */
@media only screen and (max-device-width: 1280px) { ... }

/* Covering almost all ----- */
@media only screen and (max-device-width: 800px), only screen and (device-width: 1024px) and (device-height: 600px), only screen and (width: 1280px) and (orientation: landscape), only screen and (device-width: 800px), only screen and (max-width: 767px) { ... }

/* Between Medium and Small */
@media only screen and (max-width: 1279px) and (min-width: 768px) { ... }

/* Small Devices ------------ */
@media only screen and (max-width: 767px) {
.logo, #site_tagline {text-align: center;}
.logo {font-size: 25px;}
.menu {float: none; text-align: center;}   
.menu li {float: none; margin-bottom: 2px;}
ul.children {margin-left: 0;}
.children .comment {border: medium none; padding: 1em 0 0;}
.comment_meta {text-align: center;}
.comment_meta .comment-reply-link {
    background: grey;
    color: white;
    display: block;
    float: none;
    font-weight: bold;
    margin: 1em auto;
    padding: 5px;
    text-align: center;
    width: 100%;
    max-width: 205px;
}
.comment_meta .comment-reply-link:hover {background: $hover;}
.widget {padding: 10px;}
.post_content {padding-right: 0;}
#credits .text-right {text-align: left;}
}

/* Topbar Specific Breakpoint that you can customize */
@media only screen and (max-width: 940px) { ... }',
      ),
      'thesis_package_basic_1356712022' => 
      array (
        '_name' => 'Show Grid',
        '_ref' => 'show_grid_lines',
        '_selector' => '#content, #feature, #footer',
        'background-image' => 'images/grid.png',
        'background-position' => '50% 0',
        'background-repeat' => 'repeat-y',
      ),
      'thesis_package_basic_1356716210' => 
      array (
        '_name' => 'Print Stylesheet',
        '_ref' => 'print',
        '_css' => '/* Print styles.  Inlined to avoid required HTTP connection: www.phpied.com/delay-loading-your-print-css/ Credit to Paul Irish and HTML5 Boilerplate (html5boilerplate.com) */
											.print-only { display: none !important; }
											@media print { * { background: transparent !important; color: black !important; box-shadow: none !important; text-shadow: none !important; filter: none !important; -ms-filter: none !important
/* Black prints faster: h5bp.com/s */
a, a:visited { text-decoration: underline; }
a[href]:after { content: " (" attr(href) ")"; }
abbr[title]:after { content: " (" attr(title) ")"; }
.ir a:after, a[href^="javascript:"]:after, a[href^="#"]:after { content: ""; }
 /* Don\'t show links for images, or javascript/internal links */
pre, blockquote { border: 1px solid #999; page-break-inside: avoid; }
thead { display: table-header-group; }
/* h5bp.com/t */
tr, img { page-break-inside: avoid; }
img { max-width: 100% !important; }
@page { margin: 0.5cm; }
p, h2, h3 { orphans: 3; widows: 3; }
h2, h3 { page-break-after: avoid; }
.hide-on-print { display: none !important; }
.print-only { display: block !important; }
.hide-for-print { display: none !important; }
.show-for-print { display: inherit !important; }
}
																',
      ),
      'thesis_package_basic_1356716455' => 
      array (
        '_name' => 'The Grid',
        '_ref' => 'grid_960',
        '_css' => '/* Global Reset & Standards ---------------------- */
*, *:before, *:after { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }


/* Reset for strange margins by default on <figure> elements */
figure { margin: 0; }

/* The Grid ---------------------- */
.row { width: 960px; max-width: 100%; min-width: 768px; margin: 0 auto; }
.row .row { width: auto; max-width: none; min-width: 0; margin: 0 -10px; }
.row.collapse .column, .row.collapse .columns { padding: 0; }
.row .row { width: auto; max-width: none; min-width: 0; margin: 0 -10px; }
.row .row.collapse { margin: 0; }

.column, .columns { float: left; min-height: 1px; padding: 0 10px; position: relative; }
.column.centered, .columns.centered { float: none; margin: 0 auto; }

[class*="column"] + [class*="column"]:last-child { float: right; }

[class*="column"] + [class*="column"].end { float: left; }

.one, .row .one { width: 8.33333%; }

.two, .row .two { width: 16.66667%; }

.three, .row .three { width: 25%; }

.four, .row .four { width: 33.33333%; }

.five, .row .five { width: 41.66667%; }

.six, .row .six { width: 50%; }

.seven, .row .seven { width: 58.33333%; }

.eight, .row .eight { width: 66.66667%; }

.nine, .row .nine { width: 75%; }

.ten, .row .ten { width: 83.33333%; }

.eleven, .row .eleven { width: 91.66667%; }

.twelve, .row .twelve { width: 100%; }

.row .offset-by-one { margin-left: 8.33333%; }

.row .offset-by-two { margin-left: 16.66667%; }

.row .offset-by-three { margin-left: 25%; }

.row .offset-by-four { margin-left: 33.33333%; }

.row .offset-by-five { margin-left: 41.66667%; }

.row .offset-by-six { margin-left: 50%; }

.row .offset-by-seven { margin-left: 58.33333%; }

.row .offset-by-eight { margin-left: 66.66667%; }

.row .offset-by-nine { margin-left: 75%; }

.row .offset-by-ten { margin-left: 83.33333%; }

.push-two { left: 16.66667%; }

.pull-two { right: 16.66667%; }

.push-three { left: 25%; }

.pull-three { right: 25%; }

.push-four { left: 33.33333%; }

.pull-four { right: 33.33333%; }

.push-five { left: 41.66667%; }

.pull-five { right: 41.66667%; }

.push-six { left: 50%; }

.pull-six { right: 50%; }

.push-seven { left: 58.33333%; }

.pull-seven { right: 58.33333%; }

.push-eight { left: 66.66667%; }

.pull-eight { right: 66.66667%; }

.push-nine { left: 75%; }

.pull-nine { right: 75%; }

.push-ten { left: 83.33333%; }

.pull-ten { right: 83.33333%; }

img, object, embed { max-width: 100%; height: auto; }

object, embed { height: 100%; }

img { -ms-interpolation-mode: bicubic; }

#map_canvas img, .map_canvas img { max-width: none!important; }

/* Nicolas Gallagher\'s micro clearfix */
.row { *zoom: 1; }
.row:before, .row:after { content: " "; display: table; }
.row:after { clear: both; }

/* Block Grids ---------------------- */
/* These are 2-up, 3-up, 4-up and 5-up ULs, suited
for repeating blocks of content. Add \'mobile\' to
them to switch them just like the layout grid
(one item per line) on phones

For IE7/8 compatibility block-grid items need to be
the same height. You can optionally uncomment the
lines below to support arbitrary height, but know
that IE7/8 do not support :nth-child.
-------------------------------------------------- */
.block-grid { display: block; overflow: hidden; padding: 0; }
.block-grid > li { display: block; height: auto; float: left; }
.block-grid.one-up { margin: 0; margin: 0 -8px; }
.block-grid.one-up > li { width: 100%; padding: 0 0 15px; padding: 0 8px 8px; }
.block-grid.two-up { margin: 0 -15px; margin: 0 -8px; }
.block-grid.two-up > li { width: 50%; padding: 0 15px 15px; padding: 0 8px 8px; }
.block-grid.two-up > li:nth-child(2n+1) { clear: both; }
.block-grid.three-up { margin: 0 -12px; margin: 0 -8px; }
.block-grid.three-up > li { width: 33.33333%; padding: 0 12px 12px; padding: 0 8px 8px; }
.block-grid.three-up > li:nth-child(3n+1) { clear: both; }
.block-grid.four-up { margin: 0 -10px; }
.block-grid.four-up > li { width: 25%; padding: 0 10px 10px; }
.block-grid.four-up > li:nth-child(4n+1) { clear: both; }
.block-grid.five-up { margin: 0 -8px; }
.block-grid.five-up > li { width: 20%; padding: 0 8px 8px; }
.block-grid.five-up > li:nth-child(5n+1) { clear: both; }
.block-grid.six-up { margin: 0 -8px; }
.block-grid.six-up > li { width: 16.66667%; padding: 0 8px 8px; }
.block-grid.six-up > li:nth-child(6n+1) { clear: both; }
.block-grid.seven-up { margin: 0 -8px; }
.block-grid.seven-up > li { width: 14.28571%; padding: 0 8px 8px; }
.block-grid.seven-up > li:nth-child(7n+1) { clear: both; }
.block-grid.eight-up { margin: 0 -8px; }
.block-grid.eight-up > li { width: 12.5%; padding: 0 8px 8px; }
.block-grid.eight-up > li:nth-child(8n+1) { clear: both; }
.block-grid.nine-up { margin: 0 -8px; }
.block-grid.nine-up > li { width: 11.11111%; padding: 0 8px 8px; }
.block-grid.nine-up > li:nth-child(9n+1) { clear: both; }
.block-grid.ten-up { margin: 0 -8px; }
.block-grid.ten-up > li { width: 10%; padding: 0 8px 8px; }
.block-grid.ten-up > li:nth-child(10n+1) { clear: both; }
.block-grid.eleven-up { margin: 0 -8px; }
.block-grid.eleven-up > li { width: 9.09091%; padding: 0 8px 8px; }
.block-grid.eleven-up > li:nth-child(11n+1) { clear: both; }
.block-grid.twelve-up { margin: 0 -8px; }
.block-grid.twelve-up > li { width: 8.33333%; padding: 0 8px 8px; }
.block-grid.twelve-up > li:nth-child(12n+1) { clear: both; }',
      ),
      'thesis_package_basic_1356790853' => 
      array (
        '_name' => 'Logo & Tagline',
        '_ref' => 'logo',
        '_selector' => '.logo',
        '_css' => '.logo {overflow: hidden;}
#site_tagline {clear: both; text-align: right; color: $cta_color; text-shadow: $shadow; font: italic 1.2em/1.6em georgia,serif;}

',
        'font-size' => '35',
        'line-height' => '1.2em',
        'font-weight' => 'bold',
      ),
      'thesis_package_basic_1356796481' => 
      array (
        '_name' => 'Social Buttons',
        '_ref' => 'social_buttons',
        '_css' => '.sbl-share-buttons {
    display: inline-block;
    padding: 10px 0;
    margin-bottom: 0;
}

.sbl-share-buttons ul {
    list-style: none outside none;
    margin: 0px;
    overflow: hidden;
}
.sbl-share-buttons li {
    background: none repeat scroll 0 0 transparent !important;
    display: inline-block;
    font-size: 0;
    margin-bottom: 0;
    overflow: hidden;
    width: 100px;
    height: 20px;
}
.sbl-facebook-share {
    overflow: hidden !important;
}


/*-- Stop weird page rendering on iOS devices if the social buttons are placed on the right-had side of the page --*/
#fb-root {
    display: none;
}',
      ),
      'thesis_package_basic_1357073007' => 
      array (
        '_name' => 'Headline Area',
        '_ref' => 'headline_area',
        '_selector' => '.headline_area',
        '_css' => '
.headline_meta {padding: 5px; background: $light_shade;}',
        'margin-bottom' => '10',
        'padding-bottom' => '10',
      ),
      'thesis_package_basic_1357079581' => 
      array (
        '_name' => 'Author Box',
        '_ref' => 'author_box',
        '_selector' => '.author_box',
        '_css' => '.author_box {position: relative; padding-left: 86px;}
.author_box img.avatar {position: absolute; bottom: 0; left: 0;}',
        'background-color' => '$light_shade',
        'margin-bottom' => '20',
        'padding-top' => '20',
        'padding-right' => '20',
        'padding-bottom' => '20',
        'padding-left' => '20',
      ),
      'thesis_package_basic_1357081327' => 
      array (
        '_name' => 'Main Content Areas',
        '_ref' => 'main_content_areas',
        '_selector' => '#header, #feature, #content, #footer',
        '_css' => '#footer_area {background: $footer_color;}
#feature_area {background: $feature_color;}
#sidebar {background: $sidebar_color;}',
        'padding-top' => '20',
        'padding-bottom' => '20',
      ),
      'thesis_package_basic_1357196181' => 
      array (
        '_name' => 'Go Responsive!',
        '_ref' => 'go_responsive',
        '_css' => '/* Visibility Classes ---------------------- */
/*                                           */
/* Standard (large) display targeting */
.show-for-small, .show-for-medium, .show-for-medium-down, .hide-for-large, .hide-for-large-up, .show-for-xlarge, .show-for-print { display: none !important; }

.hide-for-small, .hide-for-medium, .hide-for-medium-down, .show-for-large, .show-for-large-up, .hide-for-xlarge, .hide-for-print { display: inherit !important; }

/* Very large display targeting */
@media only screen and (min-width: 1441px) { .hide-for-small, .hide-for-medium, .hide-for-medium-down, .hide-for-large, .show-for-large-up, .show-for-xlarge { display: inherit !important; }
  .show-for-small, .show-for-medium, .show-for-medium-down, .show-for-large, .hide-for-large-up, .hide-for-xlarge { display: none !important; } }
/* Medium display targeting */
@media only screen and (max-width: 1279px) and (min-width: 768px) { .hide-for-small, .show-for-medium, .show-for-medium-down, .hide-for-large, .hide-for-large-up, .hide-for-xlarge { display: inherit !important; }
  .show-for-small, .hide-for-medium, .hide-for-medium-down, .show-for-large, .show-for-large-up, .show-for-xlarge { display: none !important; } }
/* Small display targeting */
@media only screen and (max-width: 767px) { .show-for-small, .hide-for-medium, .show-for-medium-down, .hide-for-large, .hide-for-large-up, .hide-for-xlarge { display: inherit !important; }
  .hide-for-small, .show-for-medium, .hide-for-medium-down, .show-for-large, .show-for-large-up, .show-for-xlarge { display: none !important; } }
/* Orientation targeting */
.show-for-landscape, .hide-for-portrait { display: inherit !important; }

.hide-for-landscape, .show-for-portrait { display: none !important; }

@media screen and (orientation: landscape) { .show-for-landscape, .hide-for-portrait { display: inherit !important; }
  .hide-for-landscape, .show-for-portrait { display: none !important; } }
@media screen and (orientation: portrait) { .show-for-portrait, .hide-for-landscape { display: inherit !important; }
  .hide-for-portrait, .show-for-landscape { display: none !important; } }
/* Touch-enabled device targeting */
.show-for-touch { display: none !important; }

.hide-for-touch { display: inherit !important; }

.touch .show-for-touch { display: inherit !important; }

.touch .hide-for-touch { display: none !important; }

/* Specific overrides for elements that require something other than display: block */
table.show-for-xlarge, table.show-for-large, table.hide-for-small, table.hide-for-medium { display: table !important; }

@media only screen and (max-width: 1279px) and (min-width: 768px) { ... }
@media only screen and (max-width: 767px) { ... }
/* 1280 tablet ------------ */
@media only screen and (max-device-width: 1280px) { ... }
/* Covering almost all ----- */
@media only screen and (max-device-width: 800px), only screen and (device-width: 1024px) and (device-height: 600px), only screen and (width: 1280px) and (orientation: landscape), only screen and (device-width: 800px), only screen and (max-width: 767px) { .flex-video { padding-top: 0; } }
/* Between Medium and Small */
@media only screen and (max-width: 1279px) and (min-width: 768px) { ... }
/* Small Devices ------------ */
@media only screen and (max-width: 767px) { /* Global Misc --- */
  /*                 */
  .left, .right { float: none; }
  body { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; width: 100%; min-width: 0; margin-left: 0; margin-right: 0; padding-left: 0; padding-right: 0; }
  /* The Grid --- */
  /*              */
  .row { width: auto; min-width: 0; margin-left: 0; margin-right: 0; }
  .column, .columns { width: auto !important; float: none; }
  .column:last-child, .columns:last-child { float: none; }
  [class*="column"] + [class*="column"]:last-child { float: none; }
  .column:before, .columns:before, .column:after, .columns:after { content: ""; display: table; }
  .column:after, .columns:after { clear: both; }
  .offset-by-one, .offset-by-two, .offset-by-three, .offset-by-four, .offset-by-five, .offset-by-six, .offset-by-seven, .offset-by-eight, .offset-by-nine, .offset-by-ten { margin-left: 0 !important; }
  .push-two, .push-three, .push-four, .push-five, .push-six, .push-seven, .push-eight, .push-nine, .push-ten { left: auto; }
  .pull-two, .pull-three, .pull-four, .pull-five, .pull-six, .pull-seven, .pull-eight, .pull-nine, .pull-ten { right: auto; }
  /* Mobile 4-column Grid */
  .row .mobile-one { width: 25% !important; float: left; padding: 0 10px; }
  .row .mobile-one:last-child { float: right; }
  .row .mobile-one.end { float: left; }
  .row.collapse .mobile-one { padding: 0; }
  .row .mobile-two { width: 50% !important; float: left; padding: 0 10px; }
  .row .mobile-two:last-child { float: right; }
  .row .mobile-two.end { float: left; }
  .row.collapse .mobile-two { padding: 0; }
  .row .mobile-three { width: 75% !important; float: left; padding: 0 10px; }
  .row .mobile-three:last-child { float: right; }
  .row .mobile-three.end { float: left; }
  .row.collapse .mobile-three { padding: 0; }
  .row .mobile-four { width: 100% !important; float: left; padding: 0 10px; }
  .row .mobile-four:last-child { float: right; }
  .row .mobile-four.end { float: left; }
  .row.collapse .mobile-four { padding: 0; }
  .push-one-mobile { left: 25%; }
  .pull-one-mobile { right: 25%; }
  .push-two-mobile { left: 50%; }
  .pull-two-mobile { right: 50%; }
  .push-three-mobile { left: 75%; }
  .pull-three-mobile { right: 75%; }
  /* Block Grids --- */
  /*                 */
  .block-grid.mobile > li { float: none; width: 100%; margin-left: 0; }
  .block-grid > li { clear: none !important; }
  .block-grid.mobile-one-up > li { width: 100%; }
  .block-grid.mobile-two-up > li { width: 50%; }
  .block-grid.mobile-two-up > li:nth-child(2n+1) { clear: both; }
  .block-grid.mobile-three-up > li { width: 33.33333%; }
  .block-grid.mobile-three-up > li:nth-child(3n+1) { clear: both; }
  .block-grid.mobile-four-up > li { width: 25%; }
  .block-grid.mobile-four-up > li:nth-child(4n+1) { clear: both; }
  .block-grid.mobile-five-up > li { width: 20%; }
  .block-grid.mobile-five-up > li:nth-child(5n+1) { clear: both; }
  .block-grid.mobile-six-up > li { width: 16.66667%; }
  .block-grid.mobile-six-up > li:nth-child(6n+1) { clear: both; }
  .block-grid.mobile-seven-up > li { width: 14.28571%; }
  .block-grid.mobile-seven-up > li:nth-child(7n+1) { clear: both; }
  .block-grid.mobile-eight-up > li { width: 12.5%; }
  .block-grid.mobile-eight-up > li:nth-child(8n+1) { clear: both; }
  .block-grid.mobile-nine-up > li { width: 11.11111%; }
  .block-grid.mobile-nine-up > li:nth-child(9n+1) { clear: both; }
  .block-grid.mobile-ten-up > li { width: 10%; }
  .block-grid.mobile-ten-up > li:nth-child(10n+1) { clear: both; }
  .block-grid.mobile-eleven-up > li { width: 9.09091%; }
  .block-grid.mobile-eleven-up > li:nth-child(11n+1) { clear: both; }
  .block-grid.mobile-twelve-up > li { width: 8.33333%; }
  .block-grid.mobile-twelve-up > li:nth-child(12n+1) { clear: both; }
  }
',
      ),
      'thesis_package_basic_1357196327' => 
      array (
        '_name' => 'Body',
        '_ref' => 'body',
        '_css' => 'body {position: relative; overflow-x: hidden;}',
        'font-weight' => 'normal',
        'text-transform' => 'none',
      ),
      'thesis_package_basic_1357294217' => 
      array (
        '_name' => 'Misc Snippets',
        '_ref' => 'misc',
        '_css' => '/* Misc ---------------------- */
.left { float: left; }
.right { float: right; }
.text-left { text-align: left; }
.text-right { text-align: right; }
.text-center { text-align: center; }
.hide { display: none; }
.hide-override { display: none !important; }
.highlight { background: #ffff99; }
#googlemap img, object, embed { max-width: none; }
#map_canvas embed { max-width: none; }
#map_canvas img { max-width: none; }
#map_canvas object { max-width: none; }

/* Reset for strange margins by default on <figure> elements */
figure { margin: 0; }
',
      ),
    ),
    'thesis_package_links' => 
    array (
      'thesis_package_links_1357294324' => 
      array (
        '_name' => 'Links',
        '_ref' => 'links',
        '_css' => 'a img {border: none;}',
        'link' => '$link',
        'link-decoration' => 'none',
        'link-hover' => '$hover',
        'link-hover-decoration' => 'none',
        'link-visited-decoration' => 'none',
        'link-active' => '$hover',
        'link-active-decoration' => 'underline',
      ),
    ),
    'thesis_package_wp_nav' => 
    array (
      'thesis_package_wp_nav_1356968979' => 
      array (
        '_name' => 'Primary Nav',
        '_ref' => 'nav',
        '_css' => '.menu {float: right;} .menu a {margin: 0 5px;}
ul.menu {margin-left: 0;}',
        'link-bg' => 'FFFFFF',
        'link-hover-bg' => 'f5f5f5',
        'link-active-decoration' => 'none',
        'padding-top' => '5',
        'padding-right' => '10',
        'padding-bottom' => '5',
        'padding-left' => '10',
        'border-type' => 'tabbed',
        'border-style' => 'none',
      ),
    ),
    'thesis_package_post_format' => 
    array (
      'thesis_package_post_format_1357079973' => 
      array (
        '_name' => 'Post Box',
        '_ref' => 'post_box',
        '_selector' => '.post_content',
        '_css' => '.post_content {padding: 10px 30px 10px 0;}
.post_image.alignleft {
    background: none repeat scroll 0 0 #EEEEEE;
    margin: 0px 30px 10px 0;
    padding-bottom: 10px;
}

.post_excerpt {margin-bottom: 10px;}
p.readon {clear: both;}',
        'list-indent' => 
        array (
          'on' => true,
        ),
        'typography' => '508',
      ),
      'thesis_package_post_format_1357294984' => 
      array (
        '_name' => 'Base Typography',
        '_ref' => 'base_typography',
        '_selector' => 'body',
        '_css' => 'body {font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
   font-weight: 300; -webkit-font-smoothing: antialiased; text-rendering: optimizeLegibility;}

h1 { font-size: 44px; }
h2 { font-size: 37px; }
h3 { font-size: 27px; }
h4 { font-size: 23px; }
h5 { font-size: 17px; }
h6 { font-size: 14px; }
h1, h2, h3, h4, h5, h6 {line-height: 1.2em; margin-bottom: 0.4em;}


/* Base Type Styles Using Modular Scale ---------------------- */

hr { border: solid #ddd; border-width: 1px 0 0; clear: both; margin: 22px 0 21px; height: 0; }

small { font-size: 60%; line-height: 1.4em; }

code { font-weight: bold; background: #ffff99; }


/* Blockquotes ---------------------- */
blockquote, blockquote p { line-height: 1.5; color: #6f6f6f; }

blockquote { margin: 0 0 17px; padding: 9px 20px 0 19px; border-left: 1px solid #ddd; }
blockquote cite { display: block; font-size: 13px; color: #555555; }
blockquote cite:before { content: "2014 �020"; }
blockquote cite a, blockquote cite a:visited { color: #555555; }

abbr, acronym { text-transform: uppercase; font-size: 90%; color: #222222; border-bottom: 1px solid #ddd; cursor: help; }

abbr { text-transform: none; }',
        'text-font-size' => '16',
        'text-line-height' => '1.571em',
        'headline-font-family' => 'helvetica',
        'headline-font-size' => '44',
        'headline-line-height' => '1.2em',
        'headline-font-weight' => 'bold',
        'subhead-font-family' => 'helvetica',
        'subhead-font-size' => '27',
        'subhead-font-weight' => 'bold',
        'subhead-font-style' => 'normal',
        'subhead-font-variant' => 'normal',
        'subhead-text-transform' => 'none',
        'list-indent' => 
        array (
          'on' => true,
        ),
        'typography' => '600',
      ),
    ),
    'thesis_package_wp_comments' => 
    array (
      'thesis_package_wp_comments_1357081480' => 
      array (
        '_name' => 'Comments',
        '_ref' => 'comments',
        '_css' => '#comment_form_title {font-size: 2em; color: $cta_color;}
#commentform {margin-top: 35px;}

.comment {list-style-type: none;}

.comment_wrapper img.avatar {
    border: 2px solid $text;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.8);
    float: left;
    margin: 0 16px 0px 0;
}
ul#comments_wrapper {margin-left: 0;}
.comment_wrapper .comment_author a {color: $cta_color; text-decoration: none;}
.comment_wrapper .comment_author a:hover {text-decoration: underline;}
.comment_meta {background-color: $bg; padding: 10px;}
.comment_meta a {font-size: 9pt; margin-right: 10px;}
.comment_meta .comment-reply-link {float: right; font-weight: bold;}


.comment textarea, #comment_form_comment textarea {
    width: 555px !important; border: solid 1px &border; background-color: $light_shade;}

#comment_form_comment textarea {max-width: 100%; background: $light_shade; padding: 10px; margin-top: 2em; overflow: auto;}

#comment_form_comment {position: relative;}
#comment_form_comment label {font-weight: bold; position: absolute; top: 0; left: 0;}',
        'subhead-font-family' => 'helvetica',
        'subhead-font-size' => '25',
        'subhead-font-weight' => 'bold',
        'list-indent' => 
        array (
          'on' => true,
        ),
        'comments-background-color' => '$light_shade',
        'comments-border-width' => '1',
        'comments-border-style' => 'solid',
        'comments-border-color' => '$border',
        'comments-margin-top' => '1em',
        'comments-padding-top' => '1em',
        'comments-padding-right' => '1em',
        'comments-padding-bottom' => '1em',
        'comments-padding-left' => '1em',
      ),
    ),
    'thesis_package_wp_widgets' => 
    array (
      'thesis_package_wp_widgets_1357296261' => 
      array (
        '_name' => 'widget',
        '_ref' => 'widget',
        '_css' => '.widget {color: $aside_text;}',
        'text-font-size' => '14',
        'text-padding-top' => '20',
        'text-padding-right' => '20',
        'text-padding-bottom' => '20',
        'text-padding-left' => '20',
        'subhead-font-size' => '20',
        'subhead-font-weight' => 'bold',
        'list-style-type' => 'square',
        'list-style-position' => 'inside',
        'list-indent' => 
        array (
          'on' => true,
        ),
      ),
    ),
    'thesis_package_input' => 
    array (
      'thesis_package_input_1357297461' => 
      array (
        '_name' => 'Forms & Buttons',
        '_ref' => 'forms',
        '_css' => 'input[type=text], textarea {
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  -o-transition: all 0.30s ease-in-out;
  outline: none;
  border: 1px solid #DDDDDD;
  max-width: 300px;
}
 
input[type=text]:focus, textarea:focus {
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
  border: 1px solid rgba(81, 203, 238, 1);
}

input[type="submit"], .button {padding: 5px 20px; background: $cta_color; color: #FFF; text-shadow: $shadow; text-align: center; width: auto; border: none; border-radius: 3px;}
input[type="submit"]:hover, .button:hover {background: $hover; color: #fff;}
',
        'box-sizing' => 'border-box',
        'width' => '100%',
        'margin-top' => '5px',
        'margin-right' => '20px',
        'margin-bottom' => '3px',
        'padding-top' => '3px',
        'padding-right' => '3px',
        'padding-bottom' => '3px',
        'padding-left' => '3px',
      ),
    ),
  ),
  'n960r_2_vars' => 
  array (
    'var_1356365092' => 
    array (
      'name' => 'Text',
      'ref' => 'text',
      'css' => '#222222',
    ),
    'var_1356365113' => 
    array (
      'name' => 'Background',
      'ref' => 'bg',
      'css' => '#ffffff',
    ),
    'var_1356712247' => 
    array (
      'name' => 'tint',
      'ref' => 'tint',
      'css' => 'rgba(0,0,0,0.1)',
    ),
    'var_1357073240' => 
    array (
      'name' => 'Light Shade',
      'ref' => 'light_shade',
      'css' => '#f5f5f5',
    ),
    'var_1357073612' => 
    array (
      'name' => 'Action Color',
      'ref' => 'cta_color',
      'css' => '#a0002e',
    ),
    'var_1357074048' => 
    array (
      'name' => 'Shadow',
      'ref' => 'shadow',
      'css' => '0 1px 1px rgba(0,0,0,0.8)',
    ),
    'var_1357294528' => 
    array (
      'name' => 'Link Color',
      'ref' => 'link',
      'css' => '#2ba6cb',
    ),
    'var_1357294554' => 
    array (
      'name' => 'Link Hover Color',
      'ref' => 'hover',
      'css' => '#2795b6',
    ),
    'var_1357296226' => 
    array (
      'name' => 'Aside Text Color',
      'ref' => 'aside_text',
      'css' => '#333',
    ),
    'var_1357315148' => 
    array (
      'name' => 'Border Color',
      'ref' => 'border',
      'css' => '#91B2F7',
    ),
    'var_1357320308' => 
    array (
      'name' => 'Footer Color',
      'ref' => 'footer_color',
      'css' => '#91B2F7',
    ),
    'var_1357320397' => 
    array (
      'name' => 'Feature Color',
      'ref' => 'feature_color',
      'css' => '#B3D3FA',
    ),
    'var_1357320454' => 
    array (
      'name' => 'Sidebar Color',
      'ref' => 'sidebar_color',
      'css' => '#DEF5FF',
    ),
  ),
  'n960r_2_templates' => 
  array (
    'front' => 
    array (
      'boxes' => 
      array (
        'thesis_html_body' => 
        array (
          0 => 'thesis_html_container_1356709359',
          1 => 'thesis_html_container_1356710294',
          2 => 'thesis_html_container_1356711213',
          3 => 'thesis_html_container_1356779289',
        ),
        'thesis_html_container_1356709359' => 
        array (
          0 => 'thesis_html_container_1356709388',
        ),
        'thesis_html_container_1356709388' => 
        array (
          0 => 'thesis_html_container_1356709758',
          1 => 'thesis_html_container_1356709775',
        ),
        'thesis_html_container_1356709758' => 
        array (
          0 => 'thesis_site_title',
        ),
        'thesis_html_container_1356709775' => 
        array (
          0 => 'thesis_wp_nav_menu_1356709882',
          1 => 'thesis_site_tagline',
        ),
        'thesis_html_container_1356710294' => 
        array (
          0 => 'thesis_html_container_1356710306',
        ),
        'thesis_html_container_1356710306' => 
        array (
          0 => 'thesis_html_container_1356710406',
          1 => 'thesis_html_container_1356710459',
        ),
        'thesis_html_container_1356710406' => 
        array (
          0 => 'thesis_text_box_1356710926',
        ),
        'thesis_html_container_1356710459' => 
        array (
          0 => 'thesis_wp_widgets_1356710967',
        ),
        'thesis_html_container_1356711213' => 
        array (
          0 => 'thesis_html_container_1356711228',
        ),
        'thesis_html_container_1356711228' => 
        array (
          0 => 'thesis_html_container_1356711325',
          1 => 'thesis_html_container_1356711366',
        ),
        'thesis_html_container_1356711325' => 
        array (
          0 => 'thesis_wp_loop',
        ),
        'thesis_wp_loop' => 
        array (
          0 => 'thesis_post_box_1356711530',
        ),
        'thesis_post_box_1356711530' => 
        array (
          0 => 'thesis_html_container_1356711671',
          1 => 'thesis_post_box_1356711530_thesis_wp_featured_image',
          2 => 'thesis_post_box_1356711530_thesis_post_content',
        ),
        'thesis_html_container_1356711671' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_headline',
          1 => 'smt_social_buttons_lite_1356796940',
        ),
        'thesis_html_container_1356711366' => 
        array (
          0 => 'thesis_wp_widgets_1356713376',
        ),
        'thesis_html_container_1356779289' => 
        array (
          0 => 'thesis_html_container_1356779328',
          1 => 'smt_credits',
        ),
        'thesis_html_container_1356779328' => 
        array (
          0 => 'thesis_html_container_1356779411',
          1 => 'thesis_html_container_1356779439',
          2 => 'thesis_html_container_1356779467',
        ),
        'thesis_html_container_1356779411' => 
        array (
          0 => 'thesis_text_box_1357314885',
        ),
        'thesis_html_container_1356779439' => 
        array (
          0 => 'thesis_text_box_1357314988',
        ),
        'thesis_html_container_1356779467' => 
        array (
          0 => 'thesis_text_box_1357314999',
        ),
        'thesis_post_box_1357074380' => 
        array (
          0 => 'thesis_post_box_1357074380_thesis_post_headline',
          1 => 'thesis_post_box_1357074380_thesis_post_author',
          2 => 'thesis_post_box_1357074380_thesis_post_edit',
          3 => 'thesis_post_box_1357074380_thesis_post_content',
        ),
        'thesis_comments_1357079208' => 
        array (
          0 => 'thesis_comments_1357079208_thesis_comment_author',
          1 => 'thesis_comments_1357079208_thesis_comment_date',
          2 => 'thesis_comments_1357079208_thesis_comment_edit',
          3 => 'thesis_comments_1357079208_thesis_comment_text',
          4 => 'thesis_comments_1357079208_thesis_comment_reply',
        ),
        'thesis_comment_form_1357079145' => 
        array (
          0 => 'thesis_comment_form_1357079145_thesis_comment_form_title',
          1 => 'thesis_comment_form_1357079145_thesis_comment_form_cancel',
          2 => 'thesis_comment_form_1357079145_thesis_comment_form_name',
          3 => 'thesis_comment_form_1357079145_thesis_comment_form_email',
          4 => 'thesis_comment_form_1357079145_thesis_comment_form_url',
          5 => 'thesis_comment_form_1357079145_thesis_comment_form_comment',
          6 => 'thesis_comment_form_1357079145_thesis_comment_form_submit',
        ),
      ),
    ),
    'home' => 
    array (
      'options' => 
      array (
        'thesis_wp_loop' => 
        array (
          'posts_per_page' => '5',
        ),
      ),
      'boxes' => 
      array (
        'thesis_html_body' => 
        array (
          0 => 'thesis_html_container_1356709359',
          1 => 'thesis_html_container_1356711213',
          2 => 'thesis_html_container_1356779289',
        ),
        'thesis_html_container_1356709359' => 
        array (
          0 => 'thesis_html_container_1356709388',
        ),
        'thesis_html_container_1356709388' => 
        array (
          0 => 'thesis_html_container_1356709758',
          1 => 'thesis_html_container_1356709775',
        ),
        'thesis_html_container_1356709758' => 
        array (
          0 => 'thesis_site_title',
        ),
        'thesis_html_container_1356709775' => 
        array (
          0 => 'thesis_wp_nav_menu_1356709882',
          1 => 'thesis_site_tagline',
        ),
        'thesis_html_container_1356711213' => 
        array (
          0 => 'thesis_html_container_1356711228',
        ),
        'thesis_html_container_1356711228' => 
        array (
          0 => 'thesis_html_container_1356711325',
          1 => 'thesis_html_container_1356711366',
        ),
        'thesis_html_container_1356711325' => 
        array (
          0 => 'thesis_wp_loop',
          1 => 'thesis_html_container_1357318519',
        ),
        'thesis_wp_loop' => 
        array (
          0 => 'thesis_post_box_1357074380',
        ),
        'thesis_post_box_1357074380' => 
        array (
          0 => 'thesis_html_container_1356711671',
          1 => 'thesis_post_box_1357074380_thesis_post_image',
          2 => 'thesis_post_box_1357074380_thesis_post_excerpt',
          3 => 'smt_read_more_button',
        ),
        'thesis_html_container_1356711671' => 
        array (
          0 => 'thesis_post_box_1357074380_thesis_post_headline',
        ),
        'thesis_html_container_1357318519' => 
        array (
          0 => 'thesis_html_container_1357318634',
          1 => 'thesis_html_container_1357318552',
        ),
        'thesis_html_container_1357318634' => 
        array (
          0 => 'thesis_previous_posts_link',
        ),
        'thesis_html_container_1357318552' => 
        array (
          0 => 'thesis_next_posts_link',
        ),
        'thesis_html_container_1356711366' => 
        array (
          0 => 'thesis_wp_widgets_1356713376',
        ),
        'thesis_html_container_1356779289' => 
        array (
          0 => 'thesis_html_container_1356779328',
          1 => 'smt_credits',
        ),
        'thesis_html_container_1356779328' => 
        array (
          0 => 'thesis_html_container_1356779411',
          1 => 'thesis_html_container_1356779439',
          2 => 'thesis_html_container_1356779467',
        ),
        'thesis_html_container_1356779411' => 
        array (
          0 => 'thesis_text_box_1357314885',
        ),
        'thesis_html_container_1356779439' => 
        array (
          0 => 'thesis_text_box_1357314988',
        ),
        'thesis_html_container_1356779467' => 
        array (
          0 => 'thesis_text_box_1357314999',
        ),
        'thesis_html_container_1356710294' => 
        array (
          0 => 'thesis_html_container_1356710306',
        ),
        'thesis_html_container_1356710306' => 
        array (
          0 => 'thesis_html_container_1356710406',
          1 => 'thesis_html_container_1356710459',
        ),
        'thesis_html_container_1356710406' => 
        array (
          0 => 'thesis_text_box_1356710926',
        ),
        'thesis_html_container_1356710459' => 
        array (
          0 => 'thesis_wp_widgets_1356710967',
        ),
        'thesis_post_box_1356711530' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_author',
          1 => 'thesis_post_box_1356711530_thesis_post_date',
          2 => 'thesis_post_box_1356711530_thesis_post_headline',
          3 => 'thesis_post_box_1356711530_thesis_wp_featured_image',
          4 => 'thesis_post_box_1356711530_thesis_post_content',
        ),
        'thesis_comments_1357079208' => 
        array (
          0 => 'thesis_comments_1357079208_thesis_comment_author',
          1 => 'thesis_comments_1357079208_thesis_comment_date',
          2 => 'thesis_comments_1357079208_thesis_comment_edit',
          3 => 'thesis_comments_1357079208_thesis_comment_text',
          4 => 'thesis_comments_1357079208_thesis_comment_reply',
        ),
        'thesis_comment_form_1357079145' => 
        array (
          0 => 'thesis_comment_form_1357079145_thesis_comment_form_title',
          1 => 'thesis_comment_form_1357079145_thesis_comment_form_cancel',
          2 => 'thesis_comment_form_1357079145_thesis_comment_form_name',
          3 => 'thesis_comment_form_1357079145_thesis_comment_form_email',
          4 => 'thesis_comment_form_1357079145_thesis_comment_form_url',
          5 => 'thesis_comment_form_1357079145_thesis_comment_form_comment',
          6 => 'thesis_comment_form_1357079145_thesis_comment_form_submit',
        ),
      ),
    ),
    'archive' => 
    array (
      'boxes' => 
      array (
        'thesis_html_body' => 
        array (
          0 => 'thesis_html_container_1356709359',
          1 => 'thesis_html_container_1356710294',
          2 => 'thesis_html_container_1356711213',
          3 => 'thesis_html_container_1356779289',
        ),
        'thesis_html_container_1356709359' => 
        array (
          0 => 'thesis_html_container_1356709388',
        ),
        'thesis_html_container_1356709388' => 
        array (
          0 => 'thesis_html_container_1356709758',
          1 => 'thesis_html_container_1356709775',
        ),
        'thesis_html_container_1356709758' => 
        array (
          0 => 'thesis_site_title',
        ),
        'thesis_html_container_1356709775' => 
        array (
          0 => 'thesis_wp_nav_menu_1356709882',
          1 => 'thesis_site_tagline',
        ),
        'thesis_html_container_1356710294' => 
        array (
          0 => 'thesis_html_container_1356710306',
        ),
        'thesis_html_container_1356710306' => 
        array (
          0 => 'thesis_html_container_1356710406',
          1 => 'thesis_html_container_1356710459',
        ),
        'thesis_html_container_1356710406' => 
        array (
          0 => 'thesis_archive_title',
          1 => 'thesis_archive_content',
        ),
        'thesis_html_container_1356710459' => 
        array (
          0 => 'thesis_wp_widgets_1356710967',
        ),
        'thesis_html_container_1356711213' => 
        array (
          0 => 'thesis_html_container_1356711228',
        ),
        'thesis_html_container_1356711228' => 
        array (
          0 => 'thesis_html_container_1356711325',
          1 => 'thesis_html_container_1356711366',
        ),
        'thesis_html_container_1356711325' => 
        array (
          0 => 'thesis_wp_loop',
          1 => 'thesis_html_container_1357318519',
        ),
        'thesis_wp_loop' => 
        array (
          0 => 'thesis_post_box_1357074380',
        ),
        'thesis_post_box_1357074380' => 
        array (
          0 => 'thesis_html_container_1356711671',
          1 => 'thesis_post_box_1357074380_thesis_post_image',
          2 => 'thesis_post_box_1357074380_thesis_post_excerpt',
          3 => 'smt_read_more_button',
        ),
        'thesis_html_container_1356711671' => 
        array (
          0 => 'thesis_post_box_1357074380_thesis_post_headline',
          1 => 'thesis_html_container_1356711692',
          2 => 'smt_social_buttons_lite_1356796940',
        ),
        'thesis_html_container_1356711692' => 
        array (
          0 => 'thesis_post_box_1357074380_thesis_post_date',
          1 => 'thesis_post_box_1357074380_thesis_post_author',
        ),
        'thesis_html_container_1357318519' => 
        array (
          0 => 'thesis_html_container_1357318634',
          1 => 'thesis_html_container_1357318552',
        ),
        'thesis_html_container_1357318634' => 
        array (
          0 => 'thesis_previous_posts_link',
        ),
        'thesis_html_container_1357318552' => 
        array (
          0 => 'thesis_next_posts_link',
        ),
        'thesis_html_container_1356711366' => 
        array (
          0 => 'thesis_wp_widgets_1356713376',
        ),
        'thesis_html_container_1356779289' => 
        array (
          0 => 'thesis_html_container_1356779328',
          1 => 'smt_credits',
        ),
        'thesis_html_container_1356779328' => 
        array (
          0 => 'thesis_html_container_1356779411',
          1 => 'thesis_html_container_1356779439',
          2 => 'thesis_html_container_1356779467',
        ),
        'thesis_html_container_1356779411' => 
        array (
          0 => 'thesis_text_box_1357314885',
        ),
        'thesis_html_container_1356779439' => 
        array (
          0 => 'thesis_text_box_1357314988',
        ),
        'thesis_html_container_1356779467' => 
        array (
          0 => 'thesis_text_box_1357314999',
        ),
        'thesis_post_box_1356711530' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_author',
          1 => 'thesis_post_box_1356711530_thesis_post_date',
          2 => 'thesis_post_box_1356711530_thesis_post_headline',
          3 => 'thesis_post_box_1356711530_thesis_wp_featured_image',
          4 => 'thesis_post_box_1356711530_thesis_post_content',
        ),
        'thesis_comments_1357079208' => 
        array (
          0 => 'thesis_comments_1357079208_thesis_comment_author',
          1 => 'thesis_comments_1357079208_thesis_comment_date',
          2 => 'thesis_comments_1357079208_thesis_comment_edit',
          3 => 'thesis_comments_1357079208_thesis_comment_text',
          4 => 'thesis_comments_1357079208_thesis_comment_reply',
        ),
        'thesis_comment_form_1357079145' => 
        array (
          0 => 'thesis_comment_form_1357079145_thesis_comment_form_title',
          1 => 'thesis_comment_form_1357079145_thesis_comment_form_cancel',
          2 => 'thesis_comment_form_1357079145_thesis_comment_form_name',
          3 => 'thesis_comment_form_1357079145_thesis_comment_form_email',
          4 => 'thesis_comment_form_1357079145_thesis_comment_form_url',
          5 => 'thesis_comment_form_1357079145_thesis_comment_form_comment',
          6 => 'thesis_comment_form_1357079145_thesis_comment_form_submit',
        ),
      ),
    ),
    'single' => 
    array (
      'boxes' => 
      array (
        'thesis_html_body' => 
        array (
          0 => 'thesis_html_container_1356709359',
          1 => 'thesis_html_container_1356711213',
          2 => 'thesis_html_container_1356779289',
        ),
        'thesis_html_container_1356709359' => 
        array (
          0 => 'thesis_html_container_1356709388',
        ),
        'thesis_html_container_1356709388' => 
        array (
          0 => 'thesis_html_container_1356709758',
          1 => 'thesis_html_container_1356709775',
        ),
        'thesis_html_container_1356709758' => 
        array (
          0 => 'thesis_site_title',
          1 => 'thesis_site_tagline',
        ),
        'thesis_html_container_1356709775' => 
        array (
          0 => 'thesis_wp_nav_menu_1356709882',
        ),
        'thesis_html_container_1356711213' => 
        array (
          0 => 'thesis_html_container_1356711228',
        ),
        'thesis_html_container_1356711228' => 
        array (
          0 => 'thesis_html_container_1356711325',
          1 => 'thesis_html_container_1356711366',
        ),
        'thesis_html_container_1356711325' => 
        array (
          0 => 'thesis_wp_loop',
        ),
        'thesis_wp_loop' => 
        array (
          0 => 'thesis_post_box_1356711530',
          1 => 'thesis_html_container_1357318519',
        ),
        'thesis_post_box_1356711530' => 
        array (
          0 => 'thesis_html_container_1356711671',
          1 => 'thesis_post_box_1356711530_thesis_post_image',
          2 => 'thesis_post_box_1356711530_thesis_post_content',
          3 => 'thesis_html_container_1357079423',
          4 => 'thesis_comment_form_1357079145',
          5 => 'thesis_comments_1357079208',
        ),
        'thesis_html_container_1356711671' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_headline',
          1 => 'thesis_html_container_1356711692',
          2 => 'smt_social_buttons_lite_1356796940',
        ),
        'thesis_html_container_1356711692' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_date',
        ),
        'thesis_html_container_1357079423' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_author',
          1 => 'thesis_post_box_1356711530_thesis_post_author_description',
          2 => 'thesis_post_box_1356711530_thesis_post_author_avatar',
        ),
        'thesis_comment_form_1357079145' => 
        array (
          0 => 'thesis_comments_intro',
          1 => 'thesis_comment_form_1357079145_thesis_comment_form_title',
          2 => 'thesis_comment_form_1357079145_thesis_comment_form_cancel',
          3 => 'thesis_comment_form_1357079145_thesis_comment_form_name',
          4 => 'thesis_comment_form_1357079145_thesis_comment_form_email',
          5 => 'thesis_comment_form_1357079145_thesis_comment_form_url',
          6 => 'thesis_comment_form_1357079145_thesis_comment_form_comment',
          7 => 'thesis_comment_form_1357079145_thesis_comment_form_submit',
        ),
        'thesis_comments_1357079208' => 
        array (
          0 => 'thesis_html_container_1357079292',
          1 => 'thesis_html_container_1357079333',
        ),
        'thesis_html_container_1357079292' => 
        array (
          0 => 'thesis_comments_1357079208_thesis_comment_avatar',
          1 => 'thesis_comments_1357079208_thesis_comment_author',
          2 => 'thesis_comments_1357079208_thesis_comment_text',
        ),
        'thesis_html_container_1357079333' => 
        array (
          0 => 'thesis_comments_1357079208_thesis_comment_number',
          1 => 'thesis_comments_1357079208_thesis_comment_date',
          2 => 'thesis_comments_1357079208_thesis_comment_edit',
          3 => 'thesis_comments_1357079208_thesis_comment_reply',
        ),
        'thesis_html_container_1357318519' => 
        array (
          0 => 'thesis_html_container_1357318634',
          1 => 'thesis_html_container_1357318552',
        ),
        'thesis_html_container_1357318634' => 
        array (
          0 => 'thesis_previous_post_link',
        ),
        'thesis_html_container_1357318552' => 
        array (
          0 => 'thesis_next_post_link',
        ),
        'thesis_html_container_1356711366' => 
        array (
          0 => 'thesis_wp_widgets_1356713376',
        ),
        'thesis_html_container_1356779289' => 
        array (
          0 => 'thesis_html_container_1356779328',
          1 => 'smt_credits',
        ),
        'thesis_html_container_1356779328' => 
        array (
          0 => 'thesis_html_container_1356779411',
          1 => 'thesis_html_container_1356779439',
          2 => 'thesis_html_container_1356779467',
        ),
        'thesis_html_container_1356779411' => 
        array (
          0 => 'thesis_text_box_1357314885',
        ),
        'thesis_html_container_1356779439' => 
        array (
          0 => 'thesis_text_box_1357314988',
        ),
        'thesis_html_container_1356779467' => 
        array (
          0 => 'thesis_text_box_1357314999',
        ),
        'thesis_html_container_1356710294' => 
        array (
          0 => 'thesis_html_container_1356710306',
        ),
        'thesis_html_container_1356710306' => 
        array (
          0 => 'thesis_html_container_1356710406',
          1 => 'thesis_html_container_1356710459',
        ),
        'thesis_html_container_1356710406' => 
        array (
          0 => 'thesis_text_box_1356710926',
        ),
        'thesis_html_container_1356710459' => 
        array (
          0 => 'thesis_wp_widgets_1356710967',
        ),
        'thesis_post_box_1357074380' => 
        array (
          0 => 'thesis_post_box_1357074380_thesis_post_headline',
          1 => 'thesis_post_box_1357074380_thesis_post_author',
          2 => 'thesis_post_box_1357074380_thesis_post_edit',
          3 => 'thesis_post_box_1357074380_thesis_post_content',
        ),
      ),
    ),
    'page' => 
    array (
      'boxes' => 
      array (
        'thesis_html_body' => 
        array (
          0 => 'thesis_html_container_1356709359',
          1 => 'thesis_html_container_1356711213',
          2 => 'thesis_html_container_1356779289',
        ),
        'thesis_html_container_1356709359' => 
        array (
          0 => 'thesis_html_container_1356709388',
        ),
        'thesis_html_container_1356709388' => 
        array (
          0 => 'thesis_html_container_1356709758',
          1 => 'thesis_html_container_1356709775',
        ),
        'thesis_html_container_1356709758' => 
        array (
          0 => 'thesis_site_title',
        ),
        'thesis_html_container_1356709775' => 
        array (
          0 => 'thesis_wp_nav_menu_1356709882',
          1 => 'thesis_site_tagline',
        ),
        'thesis_html_container_1356711213' => 
        array (
          0 => 'thesis_html_container_1356711228',
        ),
        'thesis_html_container_1356711228' => 
        array (
          0 => 'thesis_html_container_1356711325',
          1 => 'thesis_html_container_1356711366',
        ),
        'thesis_html_container_1356711325' => 
        array (
          0 => 'thesis_wp_loop',
        ),
        'thesis_wp_loop' => 
        array (
          0 => 'thesis_post_box_1356711530',
        ),
        'thesis_post_box_1356711530' => 
        array (
          0 => 'thesis_html_container_1356711671',
          1 => 'thesis_post_box_1356711530_thesis_post_image',
          2 => 'thesis_post_box_1356711530_thesis_post_content',
        ),
        'thesis_html_container_1356711671' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_headline',
          1 => 'smt_social_buttons_lite_1356796940',
        ),
        'thesis_html_container_1356711366' => 
        array (
          0 => 'thesis_wp_widgets_1356713376',
        ),
        'thesis_html_container_1356779289' => 
        array (
          0 => 'thesis_html_container_1356779328',
          1 => 'smt_read_more_button',
        ),
        'thesis_html_container_1356779328' => 
        array (
          0 => 'thesis_html_container_1356779411',
          1 => 'thesis_html_container_1356779439',
          2 => 'thesis_html_container_1356779467',
        ),
        'thesis_html_container_1356779411' => 
        array (
          0 => 'thesis_text_box_1357314885',
        ),
        'thesis_html_container_1356779439' => 
        array (
          0 => 'thesis_text_box_1357314988',
        ),
        'thesis_html_container_1356779467' => 
        array (
          0 => 'thesis_text_box_1357314999',
        ),
        'thesis_html_container_1356710294' => 
        array (
          0 => 'thesis_html_container_1356710306',
        ),
        'thesis_html_container_1356710306' => 
        array (
          0 => 'thesis_html_container_1356710406',
          1 => 'thesis_html_container_1356710459',
        ),
        'thesis_html_container_1356710406' => 
        array (
          0 => 'thesis_text_box_1356710926',
        ),
        'thesis_html_container_1356710459' => 
        array (
          0 => 'thesis_wp_widgets_1356710967',
        ),
        'thesis_post_box_1357074380' => 
        array (
          0 => 'thesis_post_box_1357074380_thesis_post_headline',
          1 => 'thesis_post_box_1357074380_thesis_post_author',
          2 => 'thesis_post_box_1357074380_thesis_post_edit',
          3 => 'thesis_post_box_1357074380_thesis_post_content',
        ),
        'thesis_comments_1357079208' => 
        array (
          0 => 'thesis_comments_1357079208_thesis_comment_author',
          1 => 'thesis_comments_1357079208_thesis_comment_date',
          2 => 'thesis_comments_1357079208_thesis_comment_edit',
          3 => 'thesis_comments_1357079208_thesis_comment_text',
          4 => 'thesis_comments_1357079208_thesis_comment_reply',
        ),
        'thesis_comment_form_1357079145' => 
        array (
          0 => 'thesis_comment_form_1357079145_thesis_comment_form_title',
          1 => 'thesis_comment_form_1357079145_thesis_comment_form_cancel',
          2 => 'thesis_comment_form_1357079145_thesis_comment_form_name',
          3 => 'thesis_comment_form_1357079145_thesis_comment_form_email',
          4 => 'thesis_comment_form_1357079145_thesis_comment_form_url',
          5 => 'thesis_comment_form_1357079145_thesis_comment_form_comment',
          6 => 'thesis_comment_form_1357079145_thesis_comment_form_submit',
        ),
      ),
    ),
    'custom_1357082408' => 
    array (
      'title' => 'Page with Comments',
      'boxes' => 
      array (
        'thesis_html_body' => 
        array (
          0 => 'thesis_html_container_1356709359',
          1 => 'thesis_html_container_1356711213',
          2 => 'thesis_html_container_1356779289',
        ),
        'thesis_html_container_1356709359' => 
        array (
          0 => 'thesis_html_container_1356709388',
        ),
        'thesis_html_container_1356709388' => 
        array (
          0 => 'thesis_html_container_1356709758',
          1 => 'thesis_html_container_1356709775',
        ),
        'thesis_html_container_1356709758' => 
        array (
          0 => 'thesis_site_title',
        ),
        'thesis_html_container_1356709775' => 
        array (
          0 => 'thesis_wp_nav_menu_1356709882',
          1 => 'thesis_site_tagline',
        ),
        'thesis_html_container_1356711213' => 
        array (
          0 => 'thesis_html_container_1356711228',
        ),
        'thesis_html_container_1356711228' => 
        array (
          0 => 'thesis_html_container_1356711325',
          1 => 'thesis_html_container_1356711366',
        ),
        'thesis_html_container_1356711325' => 
        array (
          0 => 'thesis_wp_loop',
        ),
        'thesis_wp_loop' => 
        array (
          0 => 'thesis_post_box_1356711530',
        ),
        'thesis_post_box_1356711530' => 
        array (
          0 => 'thesis_html_container_1356711671',
          1 => 'thesis_post_box_1356711530_thesis_post_image',
          2 => 'thesis_post_box_1356711530_thesis_post_content',
          3 => 'thesis_html_container_1357079423',
          4 => 'thesis_comment_form_1357079145',
          5 => 'thesis_comments_1357079208',
        ),
        'thesis_html_container_1356711671' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_headline',
          1 => 'thesis_html_container_1356711692',
          2 => 'smt_social_buttons_lite_1356796940',
        ),
        'thesis_html_container_1356711692' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_date',
        ),
        'thesis_html_container_1357079423' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_author',
          1 => 'thesis_post_box_1356711530_thesis_post_author_description',
          2 => 'thesis_post_box_1356711530_thesis_post_author_avatar',
        ),
        'thesis_comment_form_1357079145' => 
        array (
          0 => 'thesis_comments_intro',
          1 => 'thesis_comment_form_1357079145_thesis_comment_form_title',
          2 => 'thesis_comment_form_1357079145_thesis_comment_form_cancel',
          3 => 'thesis_comment_form_1357079145_thesis_comment_form_name',
          4 => 'thesis_comment_form_1357079145_thesis_comment_form_email',
          5 => 'thesis_comment_form_1357079145_thesis_comment_form_url',
          6 => 'thesis_comment_form_1357079145_thesis_comment_form_comment',
          7 => 'thesis_comment_form_1357079145_thesis_comment_form_submit',
        ),
        'thesis_comments_1357079208' => 
        array (
          0 => 'thesis_html_container_1357079292',
          1 => 'thesis_html_container_1357079333',
          2 => 'thesis_comments_nav',
        ),
        'thesis_html_container_1357079292' => 
        array (
          0 => 'thesis_comments_1357079208_thesis_comment_avatar',
          1 => 'thesis_comments_1357079208_thesis_comment_author',
          2 => 'thesis_comments_1357079208_thesis_comment_text',
        ),
        'thesis_html_container_1357079333' => 
        array (
          0 => 'thesis_comments_1357079208_thesis_comment_number',
          1 => 'thesis_comments_1357079208_thesis_comment_date',
          2 => 'thesis_comments_1357079208_thesis_comment_edit',
          3 => 'thesis_comments_1357079208_thesis_comment_reply',
        ),
        'thesis_html_container_1356711366' => 
        array (
          0 => 'thesis_wp_widgets_1356713376',
        ),
        'thesis_html_container_1356779289' => 
        array (
          0 => 'thesis_html_container_1356779328',
          1 => 'smt_credits',
        ),
        'thesis_html_container_1356779328' => 
        array (
          0 => 'thesis_html_container_1356779411',
          1 => 'thesis_html_container_1356779439',
          2 => 'thesis_html_container_1356779467',
        ),
        'thesis_html_container_1356779411' => 
        array (
          0 => 'thesis_text_box_1357314885',
        ),
        'thesis_html_container_1356779439' => 
        array (
          0 => 'thesis_text_box_1357314988',
        ),
        'thesis_html_container_1356779467' => 
        array (
          0 => 'thesis_text_box_1357314999',
        ),
        'thesis_html_container_1356710294' => 
        array (
          0 => 'thesis_html_container_1356710306',
        ),
        'thesis_html_container_1356710306' => 
        array (
          0 => 'thesis_html_container_1356710406',
          1 => 'thesis_html_container_1356710459',
        ),
        'thesis_html_container_1356710406' => 
        array (
          0 => 'thesis_text_box_1356710926',
        ),
        'thesis_html_container_1356710459' => 
        array (
          0 => 'thesis_wp_widgets_1356710967',
        ),
        'thesis_post_box_1357074380' => 
        array (
          0 => 'thesis_post_box_1357074380_thesis_post_headline',
          1 => 'thesis_post_box_1357074380_thesis_post_author',
          2 => 'thesis_post_box_1357074380_thesis_post_edit',
          3 => 'thesis_post_box_1357074380_thesis_post_content',
        ),
      ),
    ),
    'category' => 
    array (
      'boxes' => 
      array (
        'thesis_html_body' => 
        array (
          0 => 'thesis_html_container_1356709359',
          1 => 'thesis_html_container_1356710294',
          2 => 'thesis_html_container_1356711213',
          3 => 'thesis_html_container_1356779289',
        ),
        'thesis_html_container_1356709359' => 
        array (
          0 => 'thesis_html_container_1356709388',
        ),
        'thesis_html_container_1356709388' => 
        array (
          0 => 'thesis_html_container_1356709758',
          1 => 'thesis_html_container_1356709775',
        ),
        'thesis_html_container_1356709758' => 
        array (
          0 => 'thesis_site_title',
        ),
        'thesis_html_container_1356709775' => 
        array (
          0 => 'thesis_wp_nav_menu_1356709882',
          1 => 'thesis_site_tagline',
        ),
        'thesis_html_container_1356710294' => 
        array (
          0 => 'thesis_html_container_1356710306',
        ),
        'thesis_html_container_1356710306' => 
        array (
          0 => 'thesis_html_container_1356710406',
          1 => 'thesis_html_container_1356710459',
        ),
        'thesis_html_container_1356710406' => 
        array (
          0 => 'thesis_html_container_1357318441',
        ),
        'thesis_html_container_1357318441' => 
        array (
          0 => 'thesis_archive_title',
          1 => 'thesis_archive_content',
        ),
        'thesis_html_container_1356710459' => 
        array (
          0 => 'thesis_wp_widgets_1356710967',
        ),
        'thesis_html_container_1356711213' => 
        array (
          0 => 'thesis_html_container_1356711228',
        ),
        'thesis_html_container_1356711228' => 
        array (
          0 => 'thesis_html_container_1356711325',
          1 => 'thesis_html_container_1356711366',
        ),
        'thesis_html_container_1356711325' => 
        array (
          0 => 'thesis_wp_loop',
          1 => 'thesis_html_container_1357318519',
        ),
        'thesis_wp_loop' => 
        array (
          0 => 'thesis_post_box_1357074380',
        ),
        'thesis_post_box_1357074380' => 
        array (
          0 => 'thesis_html_container_1356711671',
          1 => 'thesis_post_box_1357074380_thesis_post_image',
          2 => 'thesis_post_box_1357074380_thesis_post_excerpt',
          3 => 'n960r_2_read_more_button',
        ),
        'thesis_html_container_1356711671' => 
        array (
          0 => 'thesis_post_box_1357074380_thesis_post_headline',
          1 => 'thesis_html_container_1356711692',
          2 => 'smt_social_buttons_lite_1356796940',
        ),
        'thesis_html_container_1356711692' => 
        array (
          0 => 'thesis_post_box_1357074380_thesis_post_date',
          1 => 'thesis_post_box_1357074380_thesis_post_author',
        ),
        'thesis_html_container_1357318519' => 
        array (
          0 => 'thesis_html_container_1357318634',
          1 => 'thesis_html_container_1357318552',
        ),
        'thesis_html_container_1357318634' => 
        array (
          0 => 'thesis_previous_posts_link',
        ),
        'thesis_html_container_1357318552' => 
        array (
          0 => 'thesis_next_posts_link',
        ),
        'thesis_html_container_1356711366' => 
        array (
          0 => 'thesis_wp_widgets_1356713376',
        ),
        'thesis_html_container_1356779289' => 
        array (
          0 => 'thesis_html_container_1356779328',
          1 => 'ri_credits',
        ),
        'thesis_html_container_1356779328' => 
        array (
          0 => 'thesis_html_container_1356779411',
          1 => 'thesis_html_container_1356779439',
          2 => 'thesis_html_container_1356779467',
        ),
        'thesis_post_box_1356711530' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_author',
          1 => 'thesis_post_box_1356711530_thesis_post_date',
          2 => 'thesis_post_box_1356711530_thesis_post_headline',
          3 => 'thesis_post_box_1356711530_thesis_wp_featured_image',
          4 => 'thesis_post_box_1356711530_thesis_post_content',
        ),
        'thesis_comments_1357079208' => 
        array (
          0 => 'thesis_comments_1357079208_thesis_comment_author',
          1 => 'thesis_comments_1357079208_thesis_comment_date',
          2 => 'thesis_comments_1357079208_thesis_comment_edit',
          3 => 'thesis_comments_1357079208_thesis_comment_text',
          4 => 'thesis_comments_1357079208_thesis_comment_reply',
        ),
        'thesis_comment_form_1357079145' => 
        array (
          0 => 'thesis_comment_form_1357079145_thesis_comment_form_title',
          1 => 'thesis_comment_form_1357079145_thesis_comment_form_cancel',
          2 => 'thesis_comment_form_1357079145_thesis_comment_form_name',
          3 => 'thesis_comment_form_1357079145_thesis_comment_form_email',
          4 => 'thesis_comment_form_1357079145_thesis_comment_form_url',
          5 => 'thesis_comment_form_1357079145_thesis_comment_form_comment',
          6 => 'thesis_comment_form_1357079145_thesis_comment_form_submit',
        ),
      ),
    ),
    'custom_1357319866' => 
    array (
      'title' => 'Skinny Latté',
      'boxes' => 
      array (
        'thesis_html_body' => 
        array (
          0 => 'thesis_html_container_1356709359',
          1 => 'thesis_html_container_1356711213',
          2 => 'thesis_html_container_1356779289',
        ),
        'thesis_html_container_1356709359' => 
        array (
          0 => 'thesis_html_container_1356709388',
        ),
        'thesis_html_container_1356709388' => 
        array (
          0 => 'thesis_html_container_1356709758',
          1 => 'thesis_html_container_1356709775',
        ),
        'thesis_html_container_1356709758' => 
        array (
          0 => 'thesis_site_title',
        ),
        'thesis_html_container_1356709775' => 
        array (
          0 => 'thesis_wp_nav_menu_1356709882',
          1 => 'thesis_site_tagline',
        ),
        'thesis_html_container_1356711213' => 
        array (
          0 => 'thesis_html_container_1356711228',
        ),
        'thesis_html_container_1356711228' => 
        array (
          0 => 'thesis_html_container_1357319945',
        ),
        'thesis_html_container_1357319945' => 
        array (
          0 => 'thesis_wp_loop',
        ),
        'thesis_wp_loop' => 
        array (
          0 => 'thesis_post_box_1356711530',
        ),
        'thesis_post_box_1356711530' => 
        array (
          0 => 'thesis_html_container_1356711671',
          1 => 'thesis_post_box_1356711530_thesis_post_image',
          2 => 'thesis_post_box_1356711530_thesis_post_content',
        ),
        'thesis_html_container_1356711671' => 
        array (
          0 => 'thesis_post_box_1356711530_thesis_post_headline',
          1 => 'smt_social_buttons_lite_1356796940',
        ),
        'thesis_html_container_1356779289' => 
        array (
          0 => 'thesis_html_container_1356779328',
          1 => 'smt_credits',
        ),
        'thesis_html_container_1356779328' => 
        array (
          0 => 'thesis_html_container_1356779411',
          1 => 'thesis_html_container_1356779439',
          2 => 'thesis_html_container_1356779467',
        ),
        'thesis_html_container_1356779411' => 
        array (
          0 => 'thesis_text_box_1357314885',
        ),
        'thesis_html_container_1356779439' => 
        array (
          0 => 'thesis_text_box_1357314988',
        ),
        'thesis_html_container_1356779467' => 
        array (
          0 => 'thesis_text_box_1357314999',
        ),
        'thesis_html_container_1356710294' => 
        array (
          0 => 'thesis_html_container_1356710306',
        ),
        'thesis_html_container_1356710306' => 
        array (
          0 => 'thesis_html_container_1356710406',
          1 => 'thesis_html_container_1356710459',
        ),
        'thesis_html_container_1356710406' => 
        array (
          0 => 'thesis_text_box_1356710926',
        ),
        'thesis_html_container_1356710459' => 
        array (
          0 => 'thesis_wp_widgets_1356710967',
        ),
        'thesis_html_container_1356711366' => 
        array (
          0 => 'thesis_wp_widgets_1356713376',
        ),
        'thesis_post_box_1357074380' => 
        array (
          0 => 'thesis_post_box_1357074380_thesis_post_headline',
          1 => 'thesis_post_box_1357074380_thesis_post_author',
          2 => 'thesis_post_box_1357074380_thesis_post_edit',
          3 => 'thesis_post_box_1357074380_thesis_post_content',
        ),
        'thesis_comments_1357079208' => 
        array (
          0 => 'thesis_comments_1357079208_thesis_comment_author',
          1 => 'thesis_comments_1357079208_thesis_comment_date',
          2 => 'thesis_comments_1357079208_thesis_comment_edit',
          3 => 'thesis_comments_1357079208_thesis_comment_text',
          4 => 'thesis_comments_1357079208_thesis_comment_reply',
        ),
        'thesis_comment_form_1357079145' => 
        array (
          0 => 'thesis_comment_form_1357079145_thesis_comment_form_title',
          1 => 'thesis_comment_form_1357079145_thesis_comment_form_cancel',
          2 => 'thesis_comment_form_1357079145_thesis_comment_form_name',
          3 => 'thesis_comment_form_1357079145_thesis_comment_form_email',
          4 => 'thesis_comment_form_1357079145_thesis_comment_form_url',
          5 => 'thesis_comment_form_1357079145_thesis_comment_form_comment',
          6 => 'thesis_comment_form_1357079145_thesis_comment_form_submit',
        ),
      ),
    ),
  ),
);
	foreach ($all as $key => $data)
		update_option($key, (strpos($key, 'css') ? strip_tags($data) : $data));
}
wp_cache_flush();