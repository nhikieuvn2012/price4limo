<?php if ($user != '') : ?>
<?php function st_my_stallion_defaults() {

########## Main Stallion Theme Settings ##########

$options1 = get_option('theme-stallion-seo-theme-options');
# AdSense
$options1['st_adsense_on'] = '1'; # AdSense ON = 1, AdSense OFF = 0
	$options1['st_adsense_pub'] = 'pub-8325072546567078'; # Your AdSense Publisher ID

# Chitika
$options1['st_chitika_on'] = '0'; # Chitika ON = 1, Chitika OFF = 0
$options1['st_chitika_pub'] = 'clickity'; # Your Chitika Username

# Clickbank
$options1['st_clickbank_on'] = '0'; # Clickbank ON = 1, ClickbankOFF = 0
$options1['st_clickbank_user'] = 'morearning'; # Your Clickbank Username

# Misc Ad Settings
$options1['st_adsense_main_ad'] = '0'; # Main AdSense ad post Number (0-9)
$options1['st_chitika_main_ad'] = '4'; # Main Chitika ad post Number (0-9)
$options1['st_clickbank_main_ad'] = '8'; # Main Clickbank ad post Number (0-9)

#$options1['themeID'] = ''; # Do Not Change
$options1['st_version_number'] = '6.2'; # Do Not Change unless you are manually updating this file with new entries.
$options1['st_update_now'] = '0'; # Do Not Change, Could Cause a Loop
$options1['st_my_defaults'] = '0'; # Do Not Change, Could Cause a Loop
update_option('theme-stallion-seo-theme-options', $options1);

########## AdSense Settings ##########

$st_options2 = get_option('theme-stallion-seo-theme-adsense');
# Ad Colours
	$st_options2['st_googlesearch'] = '2q49p6httws'; # AdSense for Search

# Ad Colours
$st_options2['st_googleborder'] = 'FFFFFF'; # AdSense Outer border colour
$st_options2['st_googlebg'] = 'FFFFFF'; # AdSense Background colour
$st_options2['st_googlelink'] = '000000'; # AdSense Colour of the anchor text of the underlined link at the top of an ad
$st_options2['st_googleurl'] = '4D4D4D'; # AdSense Colour of the URL at the bottom of text ads
$st_options2['st_googletext'] = '4D4D4D'; # AdSense Main text colour
$st_options2['st_gaduifeature'] = '0'; #AdSense border corner type: 0 = square corners, 6 = slightly rounded, 10 = very rounded
$st_options2['st_gadalternate_ad'] = ''; # URL to your alternative ads page

# Main Content Ad Unit
$st_options2['st_adsense_con1'] = '0'; # Main Content Ad Unit : 0 = On, 1 = Off
$st_options2['st_adsense_float'] = 'fadleft'; # Main Ad Float : fadright = Float Right, fadleft = Float Left
$st_options2['st_adsense_siz1'] = '11'; # Ad Size: See "AdSense Content Ad Unit Sizes" below.
$st_options2['st_adsense_typ1'] = '0'; # Ad Type: 0 = Text and Image Ads, 1 = Text Ads Only, 2 = Image Ads Only
$st_options2['st_adsense_chan1'] = ''; # AdSense Channel 1

# Movable Content Ad Unit
$st_options2['st_adsense_con3'] = '0'; # Movable Content Ad Unit : 0 = On, 1 = Off
$st_options2['st_adsense_switch'] = '3'; # Ad Placement : 0 = Above Footer Widget, 3 = Below Footer Widget, 1 = Above/Replace Banner, 2 = Below Navigation links
$st_options2['st_adsense_siz3'] = '1'; # Ad Size: See "AdSense Content Ad Unit Sizes" below.
$st_options2['st_adsense_typ3'] = '0'; # Ad Type: 0 = Text and Image Ads, 1 = Text Ads Only, 2 = Image Ads Only
$st_options2['st_adsense_chan3'] = ''; # AdSense Channel 2

# Sidebar Content Ad Unit
$st_options2['st_adsense_con2'] = '0'; # Sidebar Content Ad Unit : 0 = On, 1 = Off
$st_options2['st_adsense_siz2'] = '9'; # Ad Size: See "AdSense Content Ad Unit Sizes" below.
$st_options2['st_adsense_typ2'] = '0'; # Ad Type: 0 = Text and Image Ads, 1 = Text Ads Only, 2 = Image Ads Only
$st_options2['st_adsense_con1_head'] = '0'; # Sidebar Heading : 0 = Hide "Advert" Heading on Widget, 1 = Show "Advert" Heading on Widget
$st_options2['st_adsense_con1_bg'] = 'div'; # Background Surround : div = White BackGround, p = Match Theme Background
$st_options2['st_adsense_chan2'] = ''; # AdSense Channel 3

# Sidebar Content Ad Unit Extra
$st_options2['st_adsense_con7'] = '1'; # Sidebar Content Ad Unit Extra : 0 = On, 1 = Off
$st_options2['st_adsense_siz7'] = '9'; # Ad Size: See "AdSense Content Ad Unit Sizes" below.
$st_options2['st_adsense_typ7'] = '0'; # Ad Type: 0 = Text and Image Ads, 1 = Text Ads Only, 2 = Image Ads Only
$st_options2['st_adsense_con7_head'] = '0'; # Sidebar Heading : 0 = Hide "Advert" Heading on Widget, 1 = Show "Advert" Heading on Widget
$st_options2['st_adsense_con7_bg'] = 'div'; # Background Surround : div = White BackGround, p = Match Theme Background
$st_options2['st_adsense_chan7'] = ''; # AdSense Channel 7

# Top Link Ad Unit
$st_options2['st_adsense_lnk4'] = '1'; # Top Link Ad Unit : 0 = On, 1 = Off
$st_options2['st_adsense_siz4'] = '29'; # Ad Size: See "AdSense Link Ad Unit Sizes" below.
$st_options2['st_adsense_chan4'] = ''; # AdSense Channel 4

# Bottom Link Ad Unit
$st_options2['st_adsense_lnk6'] = '1'; # Bottom Link Ad Unit : 0 = On, 1 = Off
$st_options2['st_adsense_lnk6_pm'] = '0'; # Ad Post Number : 0 to 9
$st_options2['st_adsense_lnk6_sing'] = '0'; # Show Ad On Posts/Pages : 1 = Show On Posts/Pages ON, 0 = Show On Posts/Pages OFF
$st_options2['st_adsense_siz6'] = '29'; # Ad Size: See "AdSense Link Ad Unit Sizes" below.
$st_options2['st_adsense_chan6'] = ''; # AdSense Channel 5

# Sidebar Link Ad Unit
$st_options2['st_adsense_lnk5'] = '0'; # Sidebar Link Ad Unit : 0 = On, 1 = Off
$st_options2['st_adsense_siz5'] = '25'; # Ad Size: See "AdSense Link Ad Unit Sizes" below.
$st_options2['st_adsense_lnk5_head'] = '1'; # Sidebar Heading : 0 = Hide "Related Searches" Heading on Widget, 1 = Show "Related Searches" Heading on Widget
$st_options2['st_adsense_lnk5_bg'] = 'div'; # Background Surround : div = White BackGround, p = Match Theme Background
$st_options2['st_adsense_chan5'] = ''; # AdSense Channel 6
update_option('theme-stallion-seo-theme-adsense', $st_options2);

/* AdSense Content Ad Unit Sizes
1 = 728 x 90 Leaderboard
2 = 468 x 60 Banner
3 = 125 x 125 Button
4 = 234 x 60 Half Banner
5 = 120 x 600 Skyscraper
6 = 160 x 600 Wide Skyscraper
7 = 180 x 150 Small Rectangle
8 = 120 x 240 Vertical Banner
9 = 300 x 250 Medium Rectangle
10 = 250 x 250 Square
11 = 336 x 280 Large Rectangle
12 = 200 x 200 Small Square

AdSense Link Ad Unit Sizes
21 = 120 x 90 4 Links
22 = 120 x 90 5 Links
23 = 160 x 90 4 Links
24 = 160 x 90 5 Links
25 = 180 x 90 4 Links
26 = 180 x 90 5 Links
27 = 200 x 90 4 Links
28 = 200 x 90 5 Links
29 = 468 x 15 4 Links
30 = 468 x 15 5 Links
31 = 728 x 15 4 Links
32 = 728 x 15 5 Links
*/

########## Chitika Settings ##########

$st_options3 = get_option('theme-stallion-seo-theme-chitika');
# Ad Colours
$st_options3['st_ch_color_border'] = 'FFFFFF'; # Outer border colour
$st_options3['st_ch_color_bg'] = 'FFFFFF'; # Background colour
$st_options3['st_ch_color_title'] = '000000'; # Colour of the anchor text of the underlined link at the top of an ad
$st_options3['st_ch_color_site_link'] = '4D4D4D'; # Colour of the URL at the bottom of text ads
$st_options3['st_ch_color_text'] = '4D4D4D'; # Main text colour
$st_options3['st_ch_alternate_ad_url'] = ''; # URL to your alternative ads page

# Main Content Ad Unit
$st_options3['st_chitika_con1'] = '0'; # Main Content Ad Unit : 0 = On, 1 = Off 
$st_options3['st_chitika_float'] = 'fadright'; # Main Ad Float : fadright = Float Right, fadleft = Float Left
$st_options3['st_chitika_siz1'] = '23'; # Ad Size: See "Chitika Ad Unit Sizes" below.
$st_options3['st_chitika_typ1'] = '0'; # Ad Type: 0 = Multi Purpose Unit : standard ad, 2 = Map Unit : Adds a map to the ad
$st_options3['st_chitika_chan1'] = ''; # Chitika Channel 1

# Movable Ad Unit
$st_options3['st_chitika_con3'] = '0'; # Movable Ad Unit : 0 = On, 1 = Off
$st_options3['st_chitika_switch'] = '0'; # Ad Placement : 0 = Above Footer Widget, 3 = Below Footer Widget, 1 = Above/Replace Banner, 2 = Below Navigation links
$st_options3['st_chitika_siz3'] = '8'; # Ad Size: See "Chitika Ad Unit Sizes" below.
$st_options3['st_chitika_typ3'] = '0'; # Ad Type: 0 = Multi Purpose Unit : standard ad, 2 = Map Unit : Adds a map to the ad
$st_options3['st_chitika_chan3'] = ''; # Chitika Channel 2

# Bottom Post Ad Unit
$st_options3['st_chitika_con6'] = '1'; # Bottom Post Ad Unit : 0 = On, 1 = Off 
$st_options3['st_chitika_con6_pm'] = '2'; # Ad Post Number : 0 to 9
$st_options3['st_chitika_con6_sing'] = '1'; # Show Ad On Posts/Pages : 1 = Show On Posts/Pages ON , 0 = Show On Posts/Pages OFF
$st_options3['st_chitika_siz6'] = '10'; # Ad Size: See "Chitika Ad Unit Sizes" below.
$st_options3['st_chitika_typ6'] = '0'; # Ad Type: 0 = Multi Purpose Unit : standard ad, 2 = Map Unit : Adds a map to the ad
$st_options3['st_chitika_chan6'] = ''; # Chitika Channel 3

#Above Footer Ad Unit
$st_options3['st_chitika_con4'] = '1'; # Above Footer Ad Unit : 0 = On, 1 = Off 
$st_options3['st_chitika_siz4'] = '1'; # Ad Size: See "Chitika Ad Unit Sizes" below.
$st_options3['st_chitika_typ4'] = '0'; # Ad Type: 0 = Multi Purpose Unit : standard ad, 2 = Map Unit : Adds a map to the ad
$st_options3['st_chitika_chan4'] = ''; # Chitika Channel 4

# Sidebar Ad Unit 1
$st_options3['st_chitika_con2'] = '0'; # Sidebar Ad Unit 1 : 0 = On, 1 = Off
$st_options3['st_chitika_siz2'] = '26'; # Ad Size: See "Chitika Ad Unit Sizes" below.
$st_options3['st_chitika_typ2'] = '0'; # Ad Type: 0 = Multi Purpose Unit : standard ad, 2 = Map Unit : Adds a map to the ad
$st_options3['st_chitika_con1_head'] = '0'; # Sidebar Heading : 0 = Hide "Advert" Heading on Widget, 1 = Show "Advert" Heading on Widget
$st_options3['st_chitika_con1_bg'] = 'div'; # Background Surround : div = White BackGround, p = Match Theme Background
$st_options3['st_chitika_chan2'] = ''; # Chitika Channel 5

# Sidebar Ad Unit 2
$st_options3['st_chitika_lnk5'] = '0'; # Sidebar Ad Unit 2 : 0 = On, 1 = Off
$st_options3['st_chitika_siz5'] = '5'; # Ad Size: See "Chitika Ad Unit Sizes" below.
$st_options3['st_chitika_typ5'] = '0'; # Ad Type: 0 = Multi Purpose Unit : standard ad, 2 = Map Unit : Adds a map to the ad
$st_options3['st_chitika_lnk5_head'] = '0'; # Sidebar Heading : 0 = Hide "Advert" Heading on Widget, 1 = Show "Advert" Heading on Widget
$st_options3['st_chitika_lnk5_bg'] = 'div'; # Background Surround : div = White BackGround, p = Match Theme Background
$st_options3['st_chitika_chan5'] = ''; # Chitika Channel 6
update_option('theme-stallion-seo-theme-chitika', $st_options3);

/* Chitika Ad Unit Sizes
1 = 550 x 250 MEGA-Unit
2 = 500 x 250 MEGA-Unit
3 = 728 x 90 Leaderboard
4 = 120 x 600 Skyscraper
5 = 160 x 600 Wide Skyscraper
6 = 468 x 250 MEGA-Unit Jr.
7 = 468 x 180 Blog Banner
8 = 468 x 120 Blog Banner
9 = 468 x 90 Small Blog Banner
10 = 468 x 60 Mini Blog Banner
11 = 550 x 120 Content Banner
12 = 550 x 90 Content Banner
13 = 450 x 90 Small Content Banner
14 = 430 x 90 Small Content Banner
15 = 400 x 90 Small Content Banner
16 = 300 x 250 Rectangle
17 = 300 x 150 Rectangle, Wide
18 = 300 x 125 Mini Rectangle, Wide
19 = 300 x 70 Mini Rectangle, Wide
20 = 250 x 250 Square
21 = 200 x 200 Small Square
22 = 160 x 160 Small Square
23 = 336 x 280 Rectangle
24 = 336 x 160 Rectangle, Wide
25 = 334 x 100 Small Rectangle, Wide
26 = 180 x 300 Small Rectangle, Tall
27 = 180 x 150 Small Rectangle
28 = 475 x 250 Mega-Unit Junior (map only)
*/

########## Clickbank Settings ##########

$st_options4 = get_option('theme-stallion-seo-theme-clickbank');
# Ad Colours
$st_options4['st_cb_hopfeed_font_color'] = '4D4D4D'; # Main ad text font color
$st_options4['st_cb_hopfeed_link_font_color'] = '000000'; # Ad link text color
$st_options4['st_cb_hopfeed_link_font_hover_color'] = '6A6A6A'; # Ad link text color hovering
$st_options4['st_cb_hopfeed_background_color'] = 'FFFFFF'; # Background color of ads
$st_options4['st_cb_hopfeed_border_color'] = 'FFFFFF'; # Border color around your CB ads
$st_options4['st_cb_hopfeed_align'] = 'LEFT'; # Align the ad LEFT CENTER or RIGHT.
$st_options4['st_cb_hopfeed_fill_slots'] = 'true'; # Fill all ad spots true or false.
$st_options4['st_cb_hopfeed_cellpadding'] = '2'; # Used to buffer the text from the ad border.
$st_options4['st_cb_hopfeed_font'] = 'Arial'; # Font type
$st_options4['st_cb_hopfeed_font_size'] = '12px'; # Font size

$st_options4['st_cb_track'] = 'STALLION'; # Add tracking code
$st_options4['st_cb_hopfeed_keyword_list'] = ''; # Keyword List : keyword1, keyword2, keyword3
$st_options4['st_cb_keyword_auto'] = '1'; # Keyword List and Auto Keywords : 1 = Keywords List and Auto Keywords ON, 0 = Keywords List and Auto Keywords OFF

# Main Content Ad Unit
$st_options4['st_cb_con1'] = '0'; # Main Content Ad Unit : 0 = On, 1 = Off
$st_options4['st_cb_float'] = 'fadleft'; # Main Ad Float : fadright = Float Right, fadleft = Float Left
$st_options4['st_cb_siz1'] = '6'; # Ad Size: See "Clickbank Ad Unit Sizes" below.

# Bottom Ad Unit
$st_options4['st_cb_con2'] = '0'; # Bottom Ad Unit : 0 = On, 1 = Off
$st_options4['st_cb_siz2'] = '1'; # Ad Size: See "Clickbank Ad Unit Sizes" below.

# Bottom Post Ad Unit
$st_options4['st_cb_con3'] = '1'; # Bottom Post Ad Unit : 0 = On, 1 = Off
$st_options4['st_cb_siz3'] = '4'; # Ad Size: See "Clickbank Ad Unit Sizes" below.
$st_options4['st_cb_con3_pm'] = '2'; # Ad Post Number : 0 to 9
$st_options4['st_cb_con3_sing'] = '0'; # Show Ad On Posts/Pages : 1 = Show On Posts/Pages ON, 0 = Show On Posts/Pages OFF

# Sidebar Ad Unit 1
$st_options4['st_cb_con4'] = '0'; # Sidebar Ad Unit 1 : 0 = On, 1 = Off
$st_options4['st_cb_siz4'] = '10'; # Ad Size: See "Clickbank Ad Unit Sizes" below.
$st_options4['st_cb_side4_head'] = '0'; # Sidebar Heading : 0 = Hide "Related Products" Heading on Widget, 1 = Show "Advert" Heading on Widget
$st_options4['st_cb_side4_bg'] = 'div'; # Background Surround : div = White BackGround, p = Match Theme Background

# Sidebar Ad Unit 2
$st_options4['st_cb_con5'] = '0'; # Sidebar Ad Unit 2 : 0 = On, 1 = Off
$st_options4['st_cb_siz5'] = '12'; # Ad Size: See "Clickbank Ad Unit Sizes" below.
$st_options4['st_cb_side5_head'] = '0'; # Sidebar Heading : 0 = Hide "Related Products" Heading on Widget, 1 = Show "Advert" Heading on Widget
$st_options4['st_cb_side5_bg'] = 'div'; # Background Surround : div = White BackGround, p = Match Theme Background

# Sidebar Ad Unit 3
$st_options4['st_cb_con6'] = '0'; # Sidebar Ad Unit 3 : 0 = On, 1 = Off
$st_options4['st_cb_siz6'] = '15'; # Ad Size: See "Clickbank Ad Unit Sizes" below.
$st_options4['st_cb_side6_head'] = '0'; # Sidebar Heading : 0 = Hide "Related Products" Heading on Widget, 1 = Show "Advert" Heading on Widget
$st_options4['st_cb_side6_bg'] = 'div'; # Background Surround : div = White BackGround, p = Match Theme Background

# Stallion Clickbank Affiliate Program
$st_options4['st_stallion_link'] = '1'; # Stallion Affiliate Backlink On/Off : 1 = Backlink ON, 0 = Backlink OFF (see http://www.stallion-theme.com/stallion-seo-ad-theme-clickbank-affiliate-program for how to make 50% revenue share on Stallion sales).
update_option('theme-stallion-seo-theme-clickbank', $st_options4);

/* Clickbank Ad Unit Sizes
1 = 540 x 200 3 rows 2 columns - 6 ads
2 = 540 x 200 4 rows 1 columns - 4 ads
3 = 540 x 210 5 rows 1 columns - 5 ads
4 = 540 x 45 1 rows 1 columns - 1 ad
5 = 540 x 90 2 rows 1 columns - 2 ads
6 = 336 x 280 5 rows 1 columns - 5 ads
7 = 336 x 280 3 rows 2 columns - 6 ads
8 = 250 x 250 4 rows 1 columns - 4 ads
9 = 250 x 125 2 rows 1 columns - 2 ads
10 = 190 x 430 6 rows 1 columns - 6 ads
11 = 190 x 360 5 rows 1 columns - 5 ads
12 = 190 x 290 4 rows 1 columns - 4 ads
13 = 190 x 220 3 rows 1 columns - 3 ads
14 = 190 x 150 2 rows 1 columns - 2 ads
15 = 190 x 80 1 rows 1 columns - 1 ad
*/

########## Inlinks Settings ##########

$st_options5 = get_option('theme-stallion-seo-theme-inlinks');
# Kontera Options
$st_options5['st_kontera_on'] = '0'; # Kontera Contextual Ads : 1 = Kontera Ads ON, 0 = Kontera Ads OFF
$st_options5['st_kontera_pubid'] = ''; # Kontera Publisher ID
$st_options5['st_konteralink'] = '4D4D4D'; # Anchor Text Colour

# Infolinks Options
$st_options5['st_infolinks_on'] = '0'; # Infolinks Contextual Ads : 1 = Infolinks Ads ON, 0 =Infolinks Ads OFF
$st_options5['st_infolinks_pid'] = ''; # Infolinks Publisher ID
$st_options5['st_infolinks_wsid'] = '0'; # Infolinks Website ID (wsid)
$st_options5['st_infolinks_link_color'] = '000000'; # Infolinks Link Colour
$st_options5['st_infolinks_title_color'] = '000000'; # Infolinks Title Colour
$st_options5['st_infolinks_ad_link_color'] = '000000'; # Infolinks Ad Link Colour

#LinkWords Options
$st_options5['st_linkwords_on'] = '0'; # LinkWords In-Content PPC Ads : 1 = LinkWords Ads ON, 0 = LinkWords Ads OFF
$st_options5['st_linkwords_pubid'] = ''; # LinkWords Website ID
update_option('theme-stallion-seo-theme-inlinks', $st_options5);

########## Layout Settings ##########

$st_options6 = get_option('theme-stallion-seo-theme-layout');
$st_options6['st_sidebar_lo'] = '310r'; # Sidebar Layout : See "Sidebar layouts" below.
/*Sidebar layouts
200l200r = Left 200px Right 200px
200l200l = Left 200px Left 200px
200r200r = Right 200px Right 200px
255l165l = Left 255px Left 165px
255r165r = Right 255px Right 165px
310l = Left 310px
310r = Right 310px
1000 = No Sidebars
*/

$st_options6['st_post_lo'] = '0'; # Post Layout : 0 = One Post Column, 1 = Two Posts Columns
$st_options6['st_header_hide'] = '1'; # Hide Stallion Header : 1 = Show Stallion Header, 0 = Hide Stallion Header
$st_options6['st_title_hide'] = '1'; # Site Title Link : 1 = Show Title Link, 0 = Hide Title Link
$st_options6['st_header_2011_activate'] = '0'; # 2011 Header : 1 = Show 2011 Header, 0 = Hide 2011 Header
$st_options6['st_header_2011_title'] = '0'; # 2011 Title : 1 = Show Stallion 2011 Header, 0 = Hide Stallion 2011 Header

$st_options6['st_tagline'] = '1'; # Location of Sites TagLine : 1 = Header: Below Site Title, 0 = Footer: Above Copyright Notice
$st_options6['st_search_form_hide'] = '1'; # Search Form : 1 = Search Form ON, 0 = Search Form OFF
$st_options6['st_author_link_hide'] = '0'; # Author Archives Link : 1 = Author Archives Link ON, 0 = Author Archives Link OFF
$st_options6['st_author_bio'] = '1'; # Author Bio : 1 = Author Bio ON, 0 = Author Bio OFF
$st_options6['st_post_tags'] = '0'; # Post Tags on Archives : 1 = Show, 0 = Hide
$st_options6['st_post_dates_hide'] = '0'; # Post and Page Dates : 1 = Dates ON, 0 = Dates OFF
$st_options6['st_commentst_post_dates_hide'] = '0'; # Comment Dates : 1 = Comment Dates ON, 0 = Comment Dates OFF
$st_options6['st_commentlink'] = '2'; # Comment Button Link : 1 = Comment Button Clickable Link ON, 2 = Comment Button Non-Clickable ON, 0 = Comment Button Link OFF
$st_options6['st_admin_baroff'] = '0'; # WP Admin Bar : 1 = Admin Bar ON, 0 = Admin Bar OFF

# Navigation Menu
$st_options6['st_nav_menu_photo'] = '0'; # Photo Navigation Menu : 1 = Photo Navigation Menu on, 0 = Photo Navigation Menu OFF
$st_options6['st_nav_menu_photo_temp'] = '0'; # Photo Navigation Menu Setup : 1 = Menu Setup on, 0 = Menu Setup OFF
$st_options6['st_nav_menu_on'] = '1'; # Navigation Menu : 1 = New Style Navigation Menu, 2 = Old Style Navigation Menu, 0 = Navigation Menu OFF
$st_options6['st_nav_menu_on2'] = '0'; # Secondary Navigation Menu : 1 = Secondary Navigation Menu on, 0 = Secondary Navigation Menu OFF
$st_options6['st_nav_depth'] = '0'; # Nav Menu Drop Down Depth : 0 = unlimited, 1 = 1, 2 = 2 etc...

# Old Style Navigation Menu
$st_options6['st_home_nav_link'] = '0'; # Home Page Link : 1 = Home Navigation Link ON, 0 = Home Navigation Link OFF
$st_options6['st_include_exclude'] = 'exclude'; # Include or Exclude Pages : exclude = Exclude Pages, include = Include Pages
$st_options6['st_pages_in_exclude'] = ''; # Navigation Menu Exclude/Includes : Page IDs to exclude (ie 1, 17, 34)
$st_options6['st_extra_nav_links'] = ''; # Custom Navigation Links : Paste fully formed HTML links.

# WP Codeshield Plugin
$st_options6['st_wp_codeshield'] = '1'; # WP Codeshield Plugin : 1 = Convert Code ON, 0 = Convert Code OFF

# Better Search Excerpt Plugin Plugin
$st_options6['st_search_excerpt'] = '1'; # Better Search Excerpt Plugin : 1 = Better Search Excerpt ON, 0 = Better Search Excerpt OFF

# Advanced WordPress Settings
$st_options6['st_queries_used'] = '1'; # Show Database Queries : 1 = Queries ON, 0 = Queries OFF

# All settings on or off
$st_options6['st_wp_generatoroff'] = 'off'; # wp_generator
$st_options6['st_wp_shortlink_wp_headoff'] = 'off'; # wp_shortlink_wp_head
$st_options6['st_start_post_rel_linkoff'] = 'off'; # start_post_rel_link
$st_options6['st_adjacent_posts_rel_link_wp_headoff'] = 'off'; # adjacent_posts_rel_link_wp_head
$st_options6['st_index_rel_linkoff'] = 'off'; # index_rel_link
$st_options6['st_parent_post_rel_linkoff'] = 'off'; # parent_post_rel_link
$st_options6['st_wlwmanifest_linkoff'] = 'off'; # wlwmanifest_link
$st_options6['st_rsd_linkoff'] = 'off'; # rsd_link
$st_options6['st_automatic_feedoff'] = 'off'; # automatic-feed-links
$st_options6['st_wp_enqueue_scriptsoff'] = 'on'; # wp_enqueue_scripts
$st_options6['st_wp_print_head_scriptsoff'] = 'on'; # wp_print_head_scripts
$st_options6['st_wp_print_stylesoff'] = 'on'; # wp_print_styles
$st_options6['st_feed_linksoff'] = 'on'; # feed_links
$st_options6['st_feed_links_extraoff'] = 'on'; # feed_links_extra
$st_options6['st_rel_canonicaloff'] = 'on'; # rel_canonical
update_option('theme-stallion-seo-theme-layout', $st_options6);

########## Colour Settings ##########

$st_options7 = get_option('theme-stallion-seo-theme-colours');
$st_options7['st_themecolor'] = 'dark-blue-gradients'; # Stallion Theme Colour : See "Theme Colours" below.
/* Theme Colours
black = Black Stallion
black-gradients = Black Stallion Gradients
blue = Blue
blue-gradients = Blue Gradients
blue-orange = Blue Orange
blue-orange-gradients = Blue Orange Gradients
brown = Brown
brown-gradients = Brown Gradients
dark-blue = Dark Blue
dark-blue-gradients = Dark Blue Gradients
green = Green
green-gradients = Green Gradients
grey = Grey
grey-gradients = Grey Gradients
pink = Pink
pink-gradients = Pink Gradients
red = Red
red-gradients = Red Gradients
simple = Simple Stallion
simple2 = Simple  Stallion : White Text Heading
talian = Talian
talian-gradients = Talian Gradients
yellow = Yellow
yellow-gradients = Yellow Gradients
custom-01 = Custom 1
custom-02 = Custom 2
custom-03 = Custom 3
custom-04 = Custom 4
custom-05 = Custom 5
custom-06 = Custom 6
custom-07 = Custom 7
custom-08 = Custom 8
custom-09 = Custom 9
custom-10 = Custom 10
*/

$st_options7['st_banners_on'] = '0'; # Banners On/Off : 1 = Top Banners ON, 2 = Middle Banners On, 3 = both Banner On, 0 = Banners OFF
$st_options7['st_banners_set'] = '01-default'; # Top Banner Set : See "Banner Sets" below.
$st_options7['st_banners_set_mid'] = '03-artistic'; # Middle Banner Set : See "Banner Sets" below.

/* Banner Sets
01-default = Default
02-night = Night
03-artistic = Artistic
04-fun = Fun
05-flowers = Flowers
06-plants = Plants
07-birds = Birds
08-money = Money
09-kids = Kids
10-butterflies = Butterflies
11-sun = Sun
12-seaside = Seaside
hue-aqua = Hue Aqua
hue-blue = Hue Blue
hue-brown = Hue Brown
hue-green = Hue Green
hue-orange = Hue Orange
hue-pink = Hue Pink
hue-purple = Hue Purple
hue-red = Hue Red
hue-light-red = Hue Light Red
hue-yellow = Hue Yellow
custom-01 = Custom 1
custom-02 = Custom 2
custom-03 = Custom 3
custom-04 = Custom 4
custom-05 = Custom 5
custom-06 = Custom 6
custom-07 = Custom 7
custom-08 = Custom 8
custom-09 = Custom 9
custom-10 = Custom 10
*/

$st_options7['st_banners_size'] = '10'; # Banner Set Size : 10 by default
$st_options7['st_banners_size_mid'] = '10'; # Middle Banner Set Size : 10 by default
$st_options7['st_header_bg_on'] = '0'; # Header Image On/Off : 1 = Header Image ON, 0 = Header Image OFF
$st_options7['st_header_bg_img'] = '19.jpg'; # Header Image : See "Header Images" below.
/*Header Images
1.jpg = Orange Flower
2.jpg = Money Dollars
20.gif = Money 100 Dollars
3.jpg = Grey Background
4.jpg = Sea Bird
5.jpg = Waterfall
6.jpg = Skegness Pier
7.jpg = Green Background
8.jpg = Sunset
9.jpg = Cheatahs
1.gif = Coins
2.gif = Music
3.gif = Love Heart
4.gif = Colourful Stars
5.gif = Blue Splash
6.gif = Lips
7.gif = Squares
8.gif = Playing Cards
9.gif = Circles
10.gif = Cool Pig
11.gif = Art
12.gif = Orange Swirls
14.jpg = Love Hearts
15.jpg = Pattern Purple
16.jpg = Pattern Red
17.jpg = Pattern Blue
18.jpg = Shaded Light Blue
10.jpg = Shaded Dark Blue
11.jpg = Shaded Dark Red
12.jpg = Shaded Pink
20.jpg = Shaded Light Pink
13.jpg = Shaded Green
19.jpg = Shaded Grey
21.jpg = Black Pattern 1
22.jpg = Black Pattern 2
23.jpg = Blue Pattern
24.jpg = Water Drops
25.jpg = Connections Reloaded
c1.jpg = custom 1 jpg
c2.jpg = custom 2 jpg
c3.jpg = custom 3 jpg
c4.jpg = custom 4 jpg
c5.jpg = custom 5 jpg
c6.jpg = custom 6 jpg
c7.jpg = custom 7 jpg
c8.jpg = custom 8 jpg
c9.jpg = custom 9 jpg
c10.jpg = custom 10 jpg
c1.gif = custom 1 gif
c2.gif = custom 2 gif - my new Stallion header (example custom header)
c3.gif = custom 3 gif
c4.gif = custom 4 gif
c5.gif = custom 5 gif
c6.gif = custom 6 gif
c7.gif = custom 7 gif
c8.gif = custom 8 gif
c9.gif = custom 9 gif
c10.gif = custom 10 gif
*/

$st_options7['st_header_2011_images'] = 'twenty-eleven'; # 2011 Header Image : See "2011 Header Images" below.
/*2011 Header Images
twenty-eleven = TwentyEleven
mixture = Mixture
custom-01 = Custom 1
custom-02 = Custom 2
custom-03 = Custom 3
custom-04 = Custom 4
custom-05 = Custom 5
custom-06 = Custom 6
custom-07 = Custom 7
custom-08 = Custom 8
custom-09 = Custom 9
custom-10 = Custom 10
*/
#Featured Posts Slideshow
$st_options7['st_feature_slide'] = '0'; # Featured Posts Slideshow : 1 = Home Page Only, 2 = Home Page and All Archives, 0 = Featured Posts Slideshow OFF
$st_options7['st_feature_slide_num'] = '9'; # Featured Posts Slideshow Number of posts
$st_options7['st_ft_effects'] = 'zoom'; # Featured Posts Slideshow Effects
#Featured Posts Slideshow Effects options : blindX, blindY, blindZ, cover, curtainX, curtainY, fade, fadeZoom, growX, growY, none, scrollUp, scrollDown, scrollLeft, scrollRight, scrollHorz, scrollVert, shuffle, slideX, slideY, toss, turnUp, turnDown, turnLeft, turnRight, uncover, wipe, zoom
$st_options7['st_ft_easings'] = 'easeOutQuart'; # Featured Posts Slideshow Extra Effects
#Featured Posts Slideshow Extra Effects options : easeInOutBounce, easeOutBounce, easeInBounce, easeInOutBack, easeOutBack, easeInBack, easeInOutElastic, easeOutElastic, easeInElastic, easeInOutCirc, easeOutCirc, easeInCirc, easeInOutExpo, easeOutExpo, easeInExpo, easeInOutSine, easeOutSine, easeInSine, easeInOutQuint, easeOutQuint, easeInQuint, easeInOutQuart, easeOutQuart, easeInQuart, easeInOutCubic, easeOutCubic, easeInCubic, easeInOutQuad, easeOutQuad, easeInQuad, easeOutQuad
$st_options7['st_ft_timing'] = '4000'; # Featured Posts Slideshow Timing in milliseconds
$st_options7['st_ft_timing2'] = '2000'; # Featured Posts Slideshow Timing 2 in milliseconds
$st_options7['st_thumbs_admin'] = '1'; # Featured Image and Thumbnails Admin Images : 1 = on, 0 = off
update_option('theme-stallion-seo-theme-colours', $st_options7);

########## Promotion Settings ##########

$st_options8 = get_option('theme-stallion-seo-theme-promotion');
# Social Network Promotions
$st_options8['st_social_network'] = '1'; # Social Networking Buttons : 0 = Turn Buttons OFF, 1 = Turn Buttons ON Top of Content, 2 = Turn Buttons ON Bottom of Content
$st_options8['st_social_network_arch'] = '1'; # Show Buttons On : 1 = Posts and Pages Only, 2 = Posts, Pages and Archives
$st_options8['st_googlep1'] = '1'; # Google +1 Button : 1 = Google +1 Button ON, 0 = Google +1 Button OFF
$st_options8['st_facebook'] = '1'; # Facebook Like Button : 1 = Facebook Like Button ON, 0 = Facebook Like Button OFF
$st_options8['st_twitter'] = '1'; # Twitter Tweet Button : 1 = Twitter Tweet Button ON, 0 = Twitter Tweet Button OFF
	$st_options8['st_twitter_name'] = 'DavidLaw'; # Your Twitter Name
$st_options8['st_flickr_widget'] = '0'; # Flickr Widget : 1 = Flickr Widget ON, 0 = Flickr Widget OFF
$st_options8['st_youtube_widget'] = '1'; # YouTube Widget : 1 = YouTube Widget ON, 0 = YouTube Widget OFF
$st_options8['st_google_trans_widget'] = '1'; # Google Translation Widget : 1 = Google Translation Widget ON, 0 = Google Translation Widget OFF
$st_options8['st_bio_profile'] = '0'; # Social Network Profile Links : 1 = Social Network Profile Links ON, 0 = Social Network Profile Links OFF
$st_options8['st_bio_profile_position'] = 'left'; # Social Network Profile Links Location : left = Left Side, right = Right Side
$st_options8['st_125px_widget'] = '1'; # 125px Ad Widget : 1 = 125px Ad Widget ON, 0 = 125px Ad Widget OFF
$st_options8['st_customad_widget'] = '1'; # Custom Ad Widget : 1 = Custom Ad Widget ON, 0 = Custom Ad Widget OFF

# Webmaster Tools
$st_options8['st_g_analytics'] = '0'; # Google Analytics : 1 = Google Analytics ON, 0 = Google Analytics OFF
$st_options8['st_g_analytics_ua'] = ''; # Google Analytics UA Code
$st_options8['st_g_analytics_sub'] = ''; # Google Analytics Sub-Domain Tracking

$st_options8['st_google_verify'] = ''; # Google Site Verification
$st_options8['st_bing_verify'] = ''; # Bing Site Verification
$st_options8['st_yahoo_verify'] = ''; # Yahoo Site Verification
update_option('theme-stallion-seo-theme-promotion', $st_options8);

########## SEO Advanced Settings ##########

$st_options9 = get_option('theme-stallion-seo-theme-seo-advanced');

# Built in Plugins
$st_options9['st_super_comments'] = '1'; # Stallion SEO Super Comments Plugin : 1 = SEO Comments ON, 0 = SEO Comments OFF
$st_options9['st_super_comments_wds'] = '400'; # Comment Posts Size : Default 400
$st_options9['st_super_comments_title'] = '12'; # Comment Posts Title Element Size : Default 12
$st_options9['st_super_comments_more'] = '5'; # More Comments by Author : Default 5
$st_options9['st_super_comments_excerpt_length'] = '40'; # More Comments Excerpt Length : Default 40
$st_options9['st_comment_titles'] = '1'; # Comment Titles Plugin : 1 = Comment Titles ON, 0 = Comment Titles OFF

# Meta Tags and Title
$st_options9['st_seo_titles'] = '1'; # Best SEO Title Element : 1 = Best SEO Title ON, 0 = Best SEO Title OFF
$st_options9['st_seo_title_home'] = ''; # Home Page Title Element : Custom Title
$st_options9['st_seo_plugin_desc'] = '0'; # Meta Description Tag : 1 = Automated Meta Description Tag ON, 0 = Automated Meta Description Tag OFF
$st_options9['st_seo_plugin_key'] = '0'; # Meta Keywords Tag : 1 = Automated Meta Keywords ON, 0 = Automated Meta Keywords OFF
$st_options9['st_excerpt_length'] = '55'; # Excerpt Length :  Default 55
$st_options9['st_robot_noodpydir'] = '0'; # DMOZ/Yahoo Directory Robots Meta Tag : 1 = Block Snippets ON, 0 = Block Snippets OFF

# Auto Thumbnails
$st_options9['st_auto_thumbs'] = '1'; # Auto Thumbnails : 1 = Auto and Featured Thumbnails ON, 2 = Featured Thumbnails Only ON, 0 = Thumbnails OFF
$st_options9['st_auto_thumb_align'] = 'alignright'; # Auto Thumbnails Position : alignleft = Float Thumbnails Left, alignright = Float Thumbnails Right
$st_options9['st_auto_thumb_wid'] = '180'; # Auto Thumbnails Width : default 150
$st_options9['st_auto_thumb_hei'] = '120'; # Auto Thumbnails Height : default 150

# Cloak Links
$st_options9['st_cloak_links'] = '1'; # Cloak Affiliate Links : 1 = Cloak Affiliate Links ON, 0 = Cloak Affiliate Links OFF
$st_options9['st_biography_links'] = '1'; # Cloak Author Biography Links : 1 = Cloak Bio Links ON, 0 = Cloak Bio Links OFF
$st_options9['st_nofollow_content_links'] = '1'; # Cloak Nofollow Content Links : 1 = Cloak Nofollow Content Links ON, 0 = Cloak Nofollow Content Links OFF
$st_options9['st_nofollow_comment_links'] = '1'; # Cloak Nofollow Comment Links : 1 = Cloak Nofollow Comment Links ON, 0 = Cloak Nofollow Comment Links OFF

# Links and Comments
$st_options9['st_author_links'] = '1'; # Comment Author Links : 1 = Author Links ON, 0 = Author Links OFF
$st_options9['st_author_links_show'] = '1'; # Show Comment Author Links : 1 = Show Author Links ON, 0 = Show Author Links OFF
$st_options9['st_comment_links_html'] = '1'; # Disable HTML Comment Links : 1 = Disable HTML Comment Links, 0 = Enable HTML Comment Links
$st_options9['st_comment_nofollow'] = '1'; # Nofollow Comment Links : 0 = Nofollow ON, 1 = Nofollow OFF
$st_options9['st_stupid_bots'] = '1'; # Block Comment SPAM : 1 = Block Comment SPAM ON, 0 = Block Comment SPAM OFF

# Plugin Support
$st_options9['st_wprobot_seo'] = '0'; # WPRobot 3 Plugin Advanced SEO : 1 = Advanced SEO ON, 0 = Advanced SEO OFF
$st_options9['st_mppp_seo'] = '0'; # Massive Passive Profits Plugin Advanced SEO : 1 = Advanced SEO ON, 0 = Advanced SEO OFF
$st_options9['st_seo_plug_warn'] = '0'; # SEO Plugin Warnings : 1 = Warnings ON, 0 = Warnings OFF
update_option('theme-stallion-seo-theme-seo-advanced', $st_options9);
}
?>
<?php {st_my_stallion_defaults();} ?><?php endif; ?>