<?php
/* Theme Support */
function thb_theme_setup() {
	/* Text Domain */
	load_theme_textdomain('north', THB_THEME_ROOT_ABS . '/inc/languages');
	
	/* Custom Background Support */
	add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );
	
	/* Title Support */
	add_theme_support( 'title-tag' );
	
	/* HTML5 Galleries */
	add_theme_support( 'html5', array( 'gallery', 'caption' ) );
	
	/* Post Formats */
	add_theme_support('post-formats', array('video', 'image', 'gallery', 'quote'));
	
	/* Editor Styling */
	add_editor_style();
	
	/* WooCommerce Support */
	add_theme_support( 'woocommerce' );
	
	/* Required Settings */
	if(!isset($content_width)) $content_width = 1170;
	add_theme_support( 'automatic-feed-links' );
	
	/* Image Settings */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 70, 60, true );
	add_image_size('north-blog-masonry', 370, 9999, false );
	add_image_size('north-blog-post', 1170, 550, true );
	add_image_size('north-blog-gallery-masonry', 370, 390, true );
	add_image_size('north-blog-grid', 370, 300, true );
	add_image_size('north-shop-boxed-image', 1000, 690, true );
}
add_action( 'after_setup_theme', 'thb_theme_setup' );

/* Filter Excerpt Length */
function thb_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'thb_custom_excerpt_length', 999 );
function thb_excerpt_more($more) {
	return '…';
}
add_filter('excerpt_more', 'thb_excerpt_more');

/* Adds custom classes to the array of body classes. */
function thb_body_classes( $classes ) {
	$id = get_queried_object_id();
	
	$page_scroll = (get_post_meta($id, 'page_scroll', true) == 'on' ? 'page_scroll' : '');
	$extended_product = (get_post_meta($id, 'extended_product_page', true) == 'on' ? 'extended_product_page' : '');
	$arrow_style = ot_get_option('arrow_style', 'arrow_pointer');
	$snap_scroll = (get_post_meta($id, 'snap_scroll', true) == 'on' ? 'snap_scroll' : '');
	
	$classes[] = $page_scroll;
	$classes[] = $extended_product;
	$classes[] = $arrow_style;
	if(!empty($snap_scroll)) { 
		$classes[] = 'snap';
	}
	return $classes;
}
add_filter( 'body_class', 'thb_body_classes' );

/* Font Awesome Array */
function thb_getIconArray(){
	$icons = array(
			'' => '',
			'fa-adjust' => 'Adjust',
			'fa-adn' => 'Adn',
			'fa-align-center' => 'Align center',
			'fa-align-justify' => 'Align justify',
			'fa-align-left' => 'Align left',
			'fa-align-right' => 'Align right',
			'fa-ambulance' => 'Ambulance',
			'fa-anchor' => 'Anchor',
			'fa-android' => 'Android',
			'fa-angellist' => 'Angellist',
			'fa-angle-double-down' => 'Angle double down',
			'fa-angle-double-left' => 'Angle double left',
			'fa-angle-double-right' => 'Angle double right',
			'fa-angle-double-up' => 'Angle double up',
			'fa-angle-down' => 'Angle down',
			'fa-angle-left' => 'Angle left',
			'fa-angle-right' => 'Angle right',
			'fa-angle-up' => 'Angle up',
			'fa-apple' => 'Apple',
			'fa-archive' => 'Archive',
			'fa-area-chart' => 'Area chart',
			'fa-arrow-circle-down' => 'Arrow circle down',
			'fa-arrow-circle-left' => 'Arrow circle left',
			'fa-arrow-circle-o-down' => 'Arrow circle o down',
			'fa-arrow-circle-o-left' => 'Arrow circle o left',
			'fa-arrow-circle-o-right' => 'Arrow circle o right',
			'fa-arrow-circle-o-up' => 'Arrow circle o up',
			'fa-arrow-circle-right' => 'Arrow circle right',
			'fa-arrow-circle-up' => 'Arrow circle up',
			'fa-arrow-down' => 'Arrow down',
			'fa-arrow-left' => 'Arrow left',
			'fa-arrow-right' => 'Arrow right',
			'fa-arrow-up' => 'Arrow up',
			'fa-arrows' => 'Arrows',
			'fa-arrows-alt' => 'Arrows alt',
			'fa-arrows-h' => 'Arrows h',
			'fa-arrows-v' => 'Arrows v',
			'fa-asterisk' => 'Asterisk',
			'fa-at' => 'At',
			'fa-backward' => 'Backward',
			'fa-ban' => 'Ban',
			'fa-bar-chart' => 'Bar chart',
			'fa-barcode' => 'Barcode',
			'fa-bars' => 'Bars',
			'fa-bed' => 'Bed',
			'fa-beer' => 'Beer',
			'fa-behance' => 'Behance',
			'fa-behance-square' => 'Behance square',
			'fa-bell' => 'Bell',
			'fa-bell-o' => 'Bell o',
			'fa-bell-slash' => 'Bell slash',
			'fa-bell-slash-o' => 'Bell slash o',
			'fa-bicycle' => 'Bicycle',
			'fa-binoculars' => 'Binoculars',
			'fa-birthday-cake' => 'Birthday cake',
			'fa-bitbucket' => 'Bitbucket',
			'fa-bitbucket-square' => 'Bitbucket square',
			'fa-bold' => 'Bold',
			'fa-bolt' => 'Bolt',
			'fa-bomb' => 'Bomb',
			'fa-book' => 'Book',
			'fa-bookmark' => 'Bookmark',
			'fa-bookmark-o' => 'Bookmark o',
			'fa-briefcase' => 'Briefcase',
			'fa-btc' => 'Btc',
			'fa-bug' => 'Bug',
			'fa-building' => 'Building',
			'fa-building-o' => 'Building o',
			'fa-bullhorn' => 'Bullhorn',
			'fa-bullseye' => 'Bullseye',
			'fa-bus' => 'Bus',
			'fa-buysellads' => 'Buysellads',
			'fa-calculator' => 'Calculator',
			'fa-calendar' => 'Calendar',
			'fa-calendar-o' => 'Calendar o',
			'fa-camera' => 'Camera',
			'fa-camera-retro' => 'Camera retro',
			'fa-car' => 'Car',
			'fa-caret-down' => 'Caret down',
			'fa-caret-left' => 'Caret left',
			'fa-caret-right' => 'Caret right',
			'fa-caret-square-o-down' => 'Caret square o down',
			'fa-caret-square-o-left' => 'Caret square o left',
			'fa-caret-square-o-right' => 'Caret square o right',
			'fa-caret-square-o-up' => 'Caret square o up',
			'fa-caret-up' => 'Caret up',
			'fa-cart-arrow-down' => 'Cart arrow down',
			'fa-cart-plus' => 'Cart plus',
			'fa-cc' => 'Cc',
			'fa-cc-amex' => 'Cc amex',
			'fa-cc-discover' => 'Cc discover',
			'fa-cc-mastercard' => 'Cc mastercard',
			'fa-cc-paypal' => 'Cc paypal',
			'fa-cc-stripe' => 'Cc stripe',
			'fa-cc-visa' => 'Cc visa',
			'fa-certificate' => 'Certificate',
			'fa-chain-broken' => 'Chain broken',
			'fa-check' => 'Check',
			'fa-check-circle' => 'Check circle',
			'fa-check-circle-o' => 'Check circle o',
			'fa-check-square' => 'Check square',
			'fa-check-square-o' => 'Check square o',
			'fa-chevron-circle-down' => 'Chevron circle down',
			'fa-chevron-circle-left' => 'Chevron circle left',
			'fa-chevron-circle-right' => 'Chevron circle right',
			'fa-chevron-circle-up' => 'Chevron circle up',
			'fa-chevron-down' => 'Chevron down',
			'fa-chevron-left' => 'Chevron left',
			'fa-chevron-right' => 'Chevron right',
			'fa-chevron-up' => 'Chevron up',
			'fa-child' => 'Child',
			'fa-circle' => 'Circle',
			'fa-circle-o' => 'Circle o',
			'fa-circle-o-notch' => 'Circle o notch',
			'fa-circle-thin' => 'Circle thin',
			'fa-clipboard' => 'Clipboard',
			'fa-clock-o' => 'Clock o',
			'fa-cloud' => 'Cloud',
			'fa-cloud-download' => 'Cloud download',
			'fa-cloud-upload' => 'Cloud upload',
			'fa-code' => 'Code',
			'fa-code-fork' => 'Code fork',
			'fa-codepen' => 'Codepen',
			'fa-coffee' => 'Coffee',
			'fa-cog' => 'Cog',
			'fa-cogs' => 'Cogs',
			'fa-columns' => 'Columns',
			'fa-comment' => 'Comment',
			'fa-comment-o' => 'Comment o',
			'fa-comments' => 'Comments',
			'fa-comments-o' => 'Comments o',
			'fa-compass' => 'Compass',
			'fa-compress' => 'Compress',
			'fa-connectdevelop' => 'Connectdevelop',
			'fa-copyright' => 'Copyright',
			'fa-credit-card' => 'Credit card',
			'fa-crop' => 'Crop',
			'fa-crosshairs' => 'Crosshairs',
			'fa-css3' => 'Css3',
			'fa-cube' => 'Cube',
			'fa-cubes' => 'Cubes',
			'fa-cutlery' => 'Cutlery',
			'fa-dashcube' => 'Dashcube',
			'fa-database' => 'Database',
			'fa-delicious' => 'Delicious',
			'fa-desktop' => 'Desktop',
			'fa-deviantart' => 'Deviantart',
			'fa-diamond' => 'Diamond',
			'fa-digg' => 'Digg',
			'fa-dot-circle-o' => 'Dot circle o',
			'fa-download' => 'Download',
			'fa-dribbble' => 'Dribbble',
			'fa-dropbox' => 'Dropbox',
			'fa-drupal' => 'Drupal',
			'fa-eject' => 'Eject',
			'fa-ellipsis-h' => 'Ellipsis h',
			'fa-ellipsis-v' => 'Ellipsis v',
			'fa-empire' => 'Empire',
			'fa-envelope' => 'Envelope',
			'fa-envelope-o' => 'Envelope o',
			'fa-envelope-square' => 'Envelope square',
			'fa-eraser' => 'Eraser',
			'fa-eur' => 'Eur',
			'fa-exchange' => 'Exchange',
			'fa-exclamation' => 'Exclamation',
			'fa-exclamation-circle' => 'Exclamation circle',
			'fa-exclamation-triangle' => 'Exclamation triangle',
			'fa-expand' => 'Expand',
			'fa-external-link' => 'External link',
			'fa-external-link-square' => 'External link square',
			'fa-eye' => 'Eye',
			'fa-eye-slash' => 'Eye slash',
			'fa-eyedropper' => 'Eyedropper',
			'fa-facebook' => 'Facebook',
			'fa-facebook-official' => 'Facebook official',
			'fa-facebook-square' => 'Facebook square',
			'fa-fast-backward' => 'Fast backward',
			'fa-fast-forward' => 'Fast forward',
			'fa-fax' => 'Fax',
			'fa-female' => 'Female',
			'fa-fighter-jet' => 'Fighter jet',
			'fa-file' => 'File',
			'fa-file-archive-o' => 'File archive o',
			'fa-file-audio-o' => 'File audio o',
			'fa-file-code-o' => 'File code o',
			'fa-file-excel-o' => 'File excel o',
			'fa-file-image-o' => 'File image o',
			'fa-file-o' => 'File o',
			'fa-file-pdf-o' => 'File pdf o',
			'fa-file-powerpoint-o' => 'File powerpoint o',
			'fa-file-text' => 'File text',
			'fa-file-text-o' => 'File text o',
			'fa-file-video-o' => 'File video o',
			'fa-file-word-o' => 'File word o',
			'fa-files-o' => 'Files o',
			'fa-film' => 'Film',
			'fa-filter' => 'Filter',
			'fa-fire' => 'Fire',
			'fa-fire-extinguisher' => 'Fire extinguisher',
			'fa-flag' => 'Flag',
			'fa-flag-checkered' => 'Flag checkered',
			'fa-flag-o' => 'Flag o',
			'fa-flask' => 'Flask',
			'fa-flickr' => 'Flickr',
			'fa-floppy-o' => 'Floppy o',
			'fa-folder' => 'Folder',
			'fa-folder-o' => 'Folder o',
			'fa-folder-open' => 'Folder open',
			'fa-folder-open-o' => 'Folder open o',
			'fa-font' => 'Font',
			'fa-forumbee' => 'Forumbee',
			'fa-forward' => 'Forward',
			'fa-foursquare' => 'Foursquare',
			'fa-frown-o' => 'Frown o',
			'fa-futbol-o' => 'Futbol o',
			'fa-gamepad' => 'Gamepad',
			'fa-gavel' => 'Gavel',
			'fa-gbp' => 'Gbp',
			'fa-gift' => 'Gift',
			'fa-git' => 'Git',
			'fa-git-square' => 'Git square',
			'fa-github' => 'Github',
			'fa-github-alt' => 'Github alt',
			'fa-github-square' => 'Github square',
			'fa-glass' => 'Glass',
			'fa-globe' => 'Globe',
			'fa-google' => 'Google',
			'fa-google-plus' => 'Google plus',
			'fa-google-plus-square' => 'Google plus square',
			'fa-google-wallet' => 'Google wallet',
			'fa-graduation-cap' => 'Graduation cap',
			'fa-gratipay' => 'Gratipay',
			'fa-h-square' => 'H square',
			'fa-hacker-news' => 'Hacker news',
			'fa-hand-o-down' => 'Hand o down',
			'fa-hand-o-left' => 'Hand o left',
			'fa-hand-o-right' => 'Hand o right',
			'fa-hand-o-up' => 'Hand o up',
			'fa-hdd-o' => 'Hdd o',
			'fa-header' => 'Header',
			'fa-headphones' => 'Headphones',
			'fa-heart' => 'Heart',
			'fa-heart-o' => 'Heart o',
			'fa-heartbeat' => 'Heartbeat',
			'fa-history' => 'History',
			'fa-home' => 'Home',
			'fa-hospital-o' => 'Hospital o',
			'fa-html5' => 'Html5',
			'fa-ils' => 'Ils',
			'fa-inbox' => 'Inbox',
			'fa-indent' => 'Indent',
			'fa-info' => 'Info',
			'fa-info-circle' => 'Info circle',
			'fa-inr' => 'Inr',
			'fa-instagram' => 'Instagram',
			'fa-ioxhost' => 'Ioxhost',
			'fa-italic' => 'Italic',
			'fa-joomla' => 'Joomla',
			'fa-jpy' => 'Jpy',
			'fa-jsfiddle' => 'Jsfiddle',
			'fa-key' => 'Key',
			'fa-keyboard-o' => 'Keyboard o',
			'fa-krw' => 'Krw',
			'fa-language' => 'Language',
			'fa-laptop' => 'Laptop',
			'fa-lastfm' => 'Lastfm',
			'fa-lastfm-square' => 'Lastfm square',
			'fa-leaf' => 'Leaf',
			'fa-leanpub' => 'Leanpub',
			'fa-lemon-o' => 'Lemon o',
			'fa-level-down' => 'Level down',
			'fa-level-up' => 'Level up',
			'fa-life-ring' => 'Life ring',
			'fa-lightbulb-o' => 'Lightbulb o',
			'fa-line-chart' => 'Line chart',
			'fa-link' => 'Link',
			'fa-linkedin' => 'Linkedin',
			'fa-linkedin-square' => 'Linkedin square',
			'fa-linux' => 'Linux',
			'fa-list' => 'List',
			'fa-list-alt' => 'List alt',
			'fa-list-ol' => 'List ol',
			'fa-list-ul' => 'List ul',
			'fa-location-arrow' => 'Location arrow',
			'fa-lock' => 'Lock',
			'fa-long-arrow-down' => 'Long arrow down',
			'fa-long-arrow-left' => 'Long arrow left',
			'fa-long-arrow-right' => 'Long arrow right',
			'fa-long-arrow-up' => 'Long arrow up',
			'fa-magic' => 'Magic',
			'fa-magnet' => 'Magnet',
			'fa-male' => 'Male',
			'fa-map-marker' => 'Map marker',
			'fa-mars' => 'Mars',
			'fa-mars-double' => 'Mars double',
			'fa-mars-stroke' => 'Mars stroke',
			'fa-mars-stroke-h' => 'Mars stroke h',
			'fa-mars-stroke-v' => 'Mars stroke v',
			'fa-maxcdn' => 'Maxcdn',
			'fa-meanpath' => 'Meanpath',
			'fa-medium' => 'Medium',
			'fa-medkit' => 'Medkit',
			'fa-meh-o' => 'Meh o',
			'fa-mercury' => 'Mercury',
			'fa-microphone' => 'Microphone',
			'fa-microphone-slash' => 'Microphone slash',
			'fa-minus' => 'Minus',
			'fa-minus-circle' => 'Minus circle',
			'fa-minus-square' => 'Minus square',
			'fa-minus-square-o' => 'Minus square o',
			'fa-mobile' => 'Mobile',
			'fa-money' => 'Money',
			'fa-moon-o' => 'Moon o',
			'fa-motorcycle' => 'Motorcycle',
			'fa-music' => 'Music',
			'fa-neuter' => 'Neuter',
			'fa-newspaper-o' => 'Newspaper o',
			'fa-openid' => 'Openid',
			'fa-outdent' => 'Outdent',
			'fa-pagelines' => 'Pagelines',
			'fa-paint-brush' => 'Paint brush',
			'fa-paper-plane' => 'Paper plane',
			'fa-paper-plane-o' => 'Paper plane o',
			'fa-paperclip' => 'Paperclip',
			'fa-paragraph' => 'Paragraph',
			'fa-pause' => 'Pause',
			'fa-paw' => 'Paw',
			'fa-paypal' => 'Paypal',
			'fa-pencil' => 'Pencil',
			'fa-pencil-square' => 'Pencil square',
			'fa-pencil-square-o' => 'Pencil square o',
			'fa-phone' => 'Phone',
			'fa-phone-square' => 'Phone square',
			'fa-picture-o' => 'Picture o',
			'fa-pie-chart' => 'Pie chart',
			'fa-pied-piper' => 'Pied piper',
			'fa-pied-piper-alt' => 'Pied piper alt',
			'fa-pinterest' => 'Pinterest',
			'fa-pinterest-p' => 'Pinterest p',
			'fa-pinterest-square' => 'Pinterest square',
			'fa-plane' => 'Plane',
			'fa-play' => 'Play',
			'fa-play-circle' => 'Play circle',
			'fa-play-circle-o' => 'Play circle o',
			'fa-plug' => 'Plug',
			'fa-plus' => 'Plus',
			'fa-plus-circle' => 'Plus circle',
			'fa-plus-square' => 'Plus square',
			'fa-plus-square-o' => 'Plus square o',
			'fa-power-off' => 'Power off',
			'fa-print' => 'Print',
			'fa-puzzle-piece' => 'Puzzle piece',
			'fa-qq' => 'Qq',
			'fa-qrcode' => 'Qrcode',
			'fa-question' => 'Question',
			'fa-question-circle' => 'Question circle',
			'fa-quote-left' => 'Quote left',
			'fa-quote-right' => 'Quote right',
			'fa-random' => 'Random',
			'fa-rebel' => 'Rebel',
			'fa-recycle' => 'Recycle',
			'fa-reddit' => 'Reddit',
			'fa-reddit-square' => 'Reddit square',
			'fa-refresh' => 'Refresh',
			'fa-renren' => 'Renren',
			'fa-repeat' => 'Repeat',
			'fa-reply' => 'Reply',
			'fa-reply-all' => 'Reply all',
			'fa-retweet' => 'Retweet',
			'fa-road' => 'Road',
			'fa-rocket' => 'Rocket',
			'fa-rss' => 'Rss',
			'fa-rss-square' => 'Rss square',
			'fa-rub' => 'Rub',
			'fa-scissors' => 'Scissors',
			'fa-search' => 'Search',
			'fa-search-minus' => 'Search minus',
			'fa-search-plus' => 'Search plus',
			'fa-sellsy' => 'Sellsy',
			'fa-server' => 'Server',
			'fa-share' => 'Share',
			'fa-share-alt' => 'Share alt',
			'fa-share-alt-square' => 'Share alt square',
			'fa-share-square' => 'Share square',
			'fa-share-square-o' => 'Share square o',
			'fa-shield' => 'Shield',
			'fa-ship' => 'Ship',
			'fa-shirtsinbulk' => 'Shirtsinbulk',
			'fa-shopping-cart' => 'Shopping cart',
			'fa-sign-in' => 'Sign in',
			'fa-sign-out' => 'Sign out',
			'fa-signal' => 'Signal',
			'fa-simplybuilt' => 'Simplybuilt',
			'fa-sitemap' => 'Sitemap',
			'fa-skyatlas' => 'Skyatlas',
			'fa-skype' => 'Skype',
			'fa-slack' => 'Slack',
			'fa-sliders' => 'Sliders',
			'fa-slideshare' => 'Slideshare',
			'fa-smile-o' => 'Smile o',
			'fa-sort' => 'Sort',
			'fa-sort-alpha-asc' => 'Sort alpha asc',
			'fa-sort-alpha-desc' => 'Sort alpha desc',
			'fa-sort-amount-asc' => 'Sort amount asc',
			'fa-sort-amount-desc' => 'Sort amount desc',
			'fa-sort-asc' => 'Sort asc',
			'fa-sort-desc' => 'Sort desc',
			'fa-sort-numeric-asc' => 'Sort numeric asc',
			'fa-sort-numeric-desc' => 'Sort numeric desc',
			'fa-soundcloud' => 'Soundcloud',
			'fa-space-shuttle' => 'Space shuttle',
			'fa-spinner' => 'Spinner',
			'fa-spoon' => 'Spoon',
			'fa-spotify' => 'Spotify',
			'fa-square' => 'Square',
			'fa-square-o' => 'Square o',
			'fa-stack-exchange' => 'Stack exchange',
			'fa-stack-overflow' => 'Stack overflow',
			'fa-star' => 'Star',
			'fa-star-half' => 'Star half',
			'fa-star-half-o' => 'Star half o',
			'fa-star-o' => 'Star o',
			'fa-steam' => 'Steam',
			'fa-steam-square' => 'Steam square',
			'fa-step-backward' => 'Step backward',
			'fa-step-forward' => 'Step forward',
			'fa-stethoscope' => 'Stethoscope',
			'fa-stop' => 'Stop',
			'fa-street-view' => 'Street view',
			'fa-strikethrough' => 'Strikethrough',
			'fa-stumbleupon' => 'Stumbleupon',
			'fa-stumbleupon-circle' => 'Stumbleupon circle',
			'fa-subscript' => 'Subscript',
			'fa-subway' => 'Subway',
			'fa-suitcase' => 'Suitcase',
			'fa-sun-o' => 'Sun o',
			'fa-superscript' => 'Superscript',
			'fa-table' => 'Table',
			'fa-tablet' => 'Tablet',
			'fa-tachometer' => 'Tachometer',
			'fa-tag' => 'Tag',
			'fa-tags' => 'Tags',
			'fa-tasks' => 'Tasks',
			'fa-taxi' => 'Taxi',
			'fa-tencent-weibo' => 'Tencent weibo',
			'fa-terminal' => 'Terminal',
			'fa-text-height' => 'Text height',
			'fa-text-width' => 'Text width',
			'fa-th' => 'Th',
			'fa-th-large' => 'Th large',
			'fa-th-list' => 'Th list',
			'fa-thumb-tack' => 'Thumb tack',
			'fa-thumbs-down' => 'Thumbs down',
			'fa-thumbs-o-down' => 'Thumbs o down',
			'fa-thumbs-o-up' => 'Thumbs o up',
			'fa-thumbs-up' => 'Thumbs up',
			'fa-ticket' => 'Ticket',
			'fa-times' => 'Times',
			'fa-times-circle' => 'Times circle',
			'fa-times-circle-o' => 'Times circle o',
			'fa-tint' => 'Tint',
			'fa-toggle-off' => 'Toggle off',
			'fa-toggle-on' => 'Toggle on',
			'fa-train' => 'Train',
			'fa-transgender' => 'Transgender',
			'fa-transgender-alt' => 'Transgender alt',
			'fa-trash' => 'Trash',
			'fa-trash-o' => 'Trash o',
			'fa-tree' => 'Tree',
			'fa-trello' => 'Trello',
			'fa-trophy' => 'Trophy',
			'fa-truck' => 'Truck',
			'fa-try' => 'Try',
			'fa-tty' => 'Tty',
			'fa-tumblr' => 'Tumblr',
			'fa-tumblr-square' => 'Tumblr square',
			'fa-twitch' => 'Twitch',
			'fa-twitter' => 'Twitter',
			'fa-twitter-square' => 'Twitter square',
			'fa-umbrella' => 'Umbrella',
			'fa-underline' => 'Underline',
			'fa-undo' => 'Undo',
			'fa-university' => 'University',
			'fa-unlock' => 'Unlock',
			'fa-unlock-alt' => 'Unlock alt',
			'fa-upload' => 'Upload',
			'fa-usd' => 'Usd',
			'fa-user' => 'User',
			'fa-user-md' => 'User md',
			'fa-user-plus' => 'User plus',
			'fa-user-secret' => 'User secret',
			'fa-user-times' => 'User times',
			'fa-users' => 'Users',
			'fa-venus' => 'Venus',
			'fa-venus-double' => 'Venus double',
			'fa-venus-mars' => 'Venus mars',
			'fa-viacoin' => 'Viacoin',
			'fa-video-camera' => 'Video camera',
			'fa-vimeo-square' => 'Vimeo square',
			'fa-vine' => 'Vine',
			'fa-vk' => 'Vk',
			'fa-volume-down' => 'Volume down',
			'fa-volume-off' => 'Volume off',
			'fa-volume-up' => 'Volume up',
			'fa-weibo' => 'Weibo',
			'fa-weixin' => 'Weixin',
			'fa-whatsapp' => 'Whatsapp',
			'fa-wheelchair' => 'Wheelchair',
			'fa-wifi' => 'Wifi',
			'fa-windows' => 'Windows',
			'fa-wordpress' => 'Wordpress',
			'fa-wrench' => 'Wrench',
			'fa-xing' => 'Xing',
			'fa-xing-square' => 'Xing square',
			'fa-yahoo' => 'Yahoo',
			'fa-yelp' => 'Yelp',
			'fa-youtube' => 'Youtube',
			'fa-youtube-play' => 'Youtube play',
			'fa-youtube-square' => 'Youtube square'
		);
	return $icons;
}

/* Thb Header Search */
function thb_quick_search() {
 
	$search_results = ot_get_option('search_results');
 ?>
	<a href="#searchpopup" rel="inline" data-class="quick-search" id="quick_search"><i class="fa fa-search"></i></a>
	<aside id="searchpopup" class="mfp-hide">
		<div class="row">
			<div class="small-12 columns">
				<?php 
					if($search_results =='products') {
						if ( !defined( 'YITH_WCAS' ) ) {
							get_product_search_form(); 
						} else {
							echo do_shortcode('[yith_woocommerce_ajax_search]');
						}
					} else { 
						get_search_form(); 
					} 
				?>
			</div>
		</div>
	</aside>
<?php
}
add_action( 'thb_quick_search', 'thb_quick_search',3 );

/* Thb Newsletter Popup */
function thb_newsletter() {
	if(!is_admin() && ($popup = ot_get_option('newsletter') == 'on')) {
		$cookie = isset($_COOKIE['newsletter_popup']) ? $_COOKIE['newsletter_popup'] : false;
		if (!$cookie) {
			$newsletter_content = ot_get_option('newsletter_content');
	 	?>
		<aside id="newsletter-popup" rel="inline-auto" class="mfp-hide theme-popup" data-class="newsletter-popup">
			<?php if ($newsletter_content) { echo do_shortcode($newsletter_content); } else { ?>
			<h4><?php _e('Subscribe to our', 'north'); ?></h4>
			<h2><?php _e('Newsletter', 'north'); ?></h2>
			<p><?php _e('Get timely updates from your favorite products', 'north'); ?></p>
			<?php } ?>
			<form id="newsletter-form" action="#" method="post" class="row" data-target="<?php echo THB_THEME_ROOT; ?>/inc/subscribe_save.php">   
				<div class="small-12 columns"><label>E-Mail</label><input type="text" name="email" id="widget_subscribe" class="full"></div>
				<div class="small-12 columns tex-center"><input type="submit" name="submit" class="btn" value="<?php _e("Submit",'north'); ?>" /></div>
				<div class="result"></div>
			</form>
		</aside>
		<?php
		}
	}
}
add_action( 'thb_newsletter', 'thb_newsletter',3 );

function thb_newsletter_cookie() {
	$popup_interval = ot_get_option('newsletter-interval', 1);
	$time = '';
	switch ($popup_interval) {
		case '0':
			$time = 0;
			break;
		case '1':
			$time = DAY_IN_SECONDS;
			break;
		case '2':
			$time = DAY_IN_SECONDS * 2;
			break;
		case '3':
			$time = DAY_IN_SECONDS * 3;
			break;
		case '7':
			$time = WEEK_IN_SECONDS;
			break;
		case '14':
			$time = WEEK_IN_SECONDS * 2;
			break;
		case '21':
			$time = WEEK_IN_SECONDS * 3;
			break;
		case '30':
			$time = DAY_IN_SECONDS * 30;
			break;
	}
	if ($time) {
		if (isset($_COOKIE['newsletter_popup'])) {
			return;
		} else {
			setcookie('newsletter_popup', '1', time() + $time, COOKIEPATH, COOKIE_DOMAIN);
		} 
	} else {
		setcookie('newsletter_popup', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN );	
	}
}
add_action( 'init', 'thb_newsletter_cookie');

/* THB Social Icons */
function thb_social() {
 ?>
	<?php if (ot_get_option('fb_link')) { ?>
	<a href="<?php echo ot_get_option('fb_link'); ?>" target="_blank" class="facebook icon-1x"><i class="fa fa-facebook"></i></a>
	<?php } ?>
	<?php if (ot_get_option('pinterest_link')) { ?>
	<a href="<?php echo ot_get_option('pinterest_link'); ?>" target="_blank" class="pinterest icon-1x"><i class="fa fa-pinterest"></i></a>
	<?php } ?>
	<?php if (ot_get_option('twitter_link')) { ?>
	<a href="<?php echo ot_get_option('twitter_link'); ?>" target="_blank" class="twitter icon-1x"><i class="fa fa-twitter"></i></a>
	<?php } ?>
	<?php if (ot_get_option('linkedin_link')) { ?>
	<a href="<?php echo ot_get_option('linkedin_link'); ?>" target="_blank" class="linkedin icon-1x"><i class="fa fa-linkedin"></i></a>
	<?php } ?>
	<?php if (ot_get_option('instragram_link')) { ?>
	<a href="<?php echo ot_get_option('instragram_link'); ?>" target="_blank" class="instagram icon-1x"><i class="fa fa-instagram"></i></a>
	<?php } ?>
	<?php if (ot_get_option('xing_link')) { ?>
	<a href="<?php echo ot_get_option('xing_link'); ?>" target="_blank" class="xing icon-1x"><i class="fa fa-xing"></i></a>
	<?php } ?>
	<?php if (ot_get_option('tumblr_link')) { ?>
	<a href="<?php echo ot_get_option('tumblr_link'); ?>" target="_blank" class="tumblr icon-1x"><i class="fa fa-tumblr"></i></a>
	<?php } ?>
	<?php if (ot_get_option('googleplus_link')) { ?>
	<a href="<?php echo ot_get_option('googleplus_link'); ?>" target="_blank" class="google-plus icon-1x"><i class="fa fa-google-plus"></i></a>
	<?php } ?>
	<?php if (ot_get_option('vk_link')) { ?>
	<a href="<?php echo ot_get_option('vk_link'); ?>" target="_blank" class="vk icon-1x"><i class="fa fa-vk"></i></a>
	<?php } ?>
<?php
}
add_action( 'thb_social', 'thb_social',3 );


/* Payment Icons */
function thb_payment() {
?>
	<?php if (ot_get_option('payment_visa') != 'off') { ?>
		<figure class="paymenttypes visa"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_mc') != 'off') { ?>
		<figure class="paymenttypes mc"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_pp') != 'off') { ?>
		<figure class="paymenttypes paypal"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_discover') != 'off') { ?>
		<figure class="paymenttypes discover"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_amazon') != 'off') { ?>
		<figure class="paymenttypes amazon"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_stripe') != 'off') { ?>
		<figure class="paymenttypes stripe"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_amex') != 'off') { ?>
		<figure class="paymenttypes amex"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_diners') != 'off') { ?>
		<figure class="paymenttypes diners"></figure>
	<?php } ?>
	<?php if (ot_get_option('payment_wallet') != 'off') { ?>
		<figure class="paymenttypes wallet"></figure>
	<?php } ?>
<?php
}
add_action( 'thb_payment', 'thb_payment',3 );

/* Post Categories Array */
function thb_blogCategories(){
	$blog_categories = get_categories();
	$out = array();
	foreach($blog_categories as $category) {
		$out[$category->name] = $category->cat_ID;
	}
	return $out;
}

/* Product Categories Array */
function thb_productCategories(){
	if(class_exists('woocommerce')) {
		
		$args = array(
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => '0'
		);
		
		$product_categories = get_terms( 'product_cat', $args );
		$out = array();
		if ($product_categories) {
			foreach($product_categories as $product_category) {
				$out[$product_category->name] = $product_category->slug;
			}
		}
		return $out;
	}
	
}
/* Out of Stock Check */
function thb_out_of_stock() {
  global $post;
  $id = $post->ID;
  $status = get_post_meta($id, '_stock_status',true);
  
  if ($status == 'outofstock') {
  	return true;
  } else {
  	return false;
  }
}
/* Social Sharing */
function thb_social_article_detail($id = false, $class = false) {
	$id = $id ? $id : get_the_ID();
	$permalink = get_permalink($id);
	$title = the_title_attribute(array('echo' => 0, 'post' => $id) );
	$image_id = get_post_thumbnail_id($id);
	$image = wp_get_attachment_image_src($image_id,'full');
	$twitter_user = ot_get_option('twitter_bar_username', 'anteksiler');
	$sharing_type = ot_get_option('sharing_buttons') ? ot_get_option('sharing_buttons') : array();
	$sharing_buttons = ot_get_option('sharing_buttons_content') ? ot_get_option('sharing_buttons_content') : array(); 
	if (is_singular('post')) {
		$type = 'blog';
	} else if (is_singular('product')) {
		$type = 'products';
	} else {
		$type = 'blog';	  
	}
 ?>
 	<?php if (in_array($type, (!empty($sharing_buttons) ? $sharing_buttons : array()))) { ?>
	<aside id="product_share" class="share-article hide-on-print <?php echo esc_attr($class); ?>">
		<?php if (in_array('facebook',$sharing_type)) { ?>
		<a href="<?php echo 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).''; ?>" class="facebook social"><i class="fa fa-facebook"></i></a>
		<?php } ?>
		<?php if (in_array('twitter',$sharing_type)) { ?>
		<a href="<?php echo 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . ''; ?>" class="twitter social"><i class="fa fa-twitter"></i></a>
		<?php } ?>
		<?php if (in_array('google-plus',$sharing_type)) { ?>
		<a href="<?php echo 'http://plus.google.com/share?url=' . esc_url( $permalink ) . ''; ?>" class="google-plus social"><i class="fa fa-google-plus"></i></a>
		<?php } ?>
		<?php if (in_array('pinterest',$sharing_type)) { ?>
		<a href="<?php echo 'http://pinterest.com/pin/create/link/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . ''; ?>" class="pinterest social" nopin="nopin" data-pin-no-hover="true"><i class="fa fa-pinterest"></i></a>
		<?php } ?>
	</aside>
	<?php } ?>
<?php
}
add_action( 'thb_social_article_detail', 'thb_social_article_detail', 3, 3 );

/* WishList Button*/
function thb_wishlist_button() {

	global $product; 
	
	if ( class_exists( 'YITH_WCWL_UI' ) )  {
		$url = YITH_WCWL()->get_wishlist_url();
		$product_type = $product->product_type;
		$default_wishlists = is_user_logged_in() ? YITH_WCWL()->get_wishlists( array( 'is_default' => true ) ) : false;
		
		if( ! empty( $default_wishlists ) ) {
			$default_wishlist = $default_wishlists[0]['ID'];
		}
		else {
			$default_wishlist = false;
		}
		
		$exists = YITH_WCWL()->is_product_in_wishlist( $product->id, $default_wishlist );
		
		$classes = get_option( 'yith_wcwl_use_button' ) == 'yes' ? 'class="add_to_wishlist single_add_to_wishlist"' : 'class="add_to_wishlist"';
		
		$html  = '<div class="yith-wcwl-add-to-wishlist">'; 
	    $html .= '<div class="yith-wcwl-add-button';  // the class attribute is closed in the next row
	    
	    $html .= $exists ? ' hide" style="display:none;"' : ' show"';
	    
	    $html .= '><a href="' . htmlspecialchars(YITH_WCWL()->get_addtowishlist_url()) . '" data-product-id="' . $product->id . '" data-product-type="' . $product_type . '" ' . $classes . ' ><i class="fa fa-heart-o"></i><span class="text">'.__( "Add to wishlist", 'north' ).'</span></a>';
	    $html .= '</div>';
	
			$html .= '<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> <a href="' . esc_url($url) . '"><i class="fa fa-heart"></i><span class="text">'.__( "Added to wishlist", 'north' ).'</span></a></div>';
			$html .= '<div class="yith-wcwl-wishlistexistsbrowse ' . ( $exists ? 'show' : 'hide' ) . '" style="display:' . ( $exists ? 'block' : 'none' ) . '"><a href="' . esc_url($url) . '"><i class="fa fa-heart"></i><span class="text">'.__( "Added to wishlist", 'north' ).'</span></a></div>';
		
		$html .= '</div>';
		
		return $html;
		
	}

}

/* Custom GRAvatar */
function thb_gravatar ($avatar_defaults) {
	$myavatar = THB_THEME_ROOT . '/assets/img/avatar.png';
	$avatar_defaults[$myavatar] = 'THB Gravatar';
	return $avatar_defaults;
}
add_filter('avatar_defaults', 'thb_gravatar');

/* Human time */
function thb_human_time_diff_enhanced( $duration = 60 ) {

	$post_time = get_the_time('U');
	$human_time = '';

	$time_now = date('U');

	// use human time if less that $duration days ago (60 days by default)
	// 60 seconds * 60 minutes * 24 hours * $duration days
	if ( $post_time > $time_now - ( 60 * 60 * 24 * $duration ) ) {
		$human_time = sprintf( __( '%s ago', 'north'), human_time_diff( $post_time, current_time( 'timestamp' ) ) );
	} else {
		$human_time = get_the_date();
	}

	return $human_time;

}

/* DNS Prefetch */
function thb_dns_prefetch() {
	echo '<meta http-equiv="x-dns-prefetch-control" content="on">
	<link rel="dns-prefetch" href="//fonts.googleapis.com" />
	<link rel="dns-prefetch" href="//fonts.gstatic.com" />
	<link rel="dns-prefetch" href="//0.gravatar.com/" />
	<link rel="dns-prefetch" href="//2.gravatar.com/" />
	<link rel="dns-prefetch" href="//1.gravatar.com/" />';
}
add_action('wp_head', 'thb_dns_prefetch', 0);

/*--------------------------------------------------------------------*/                							
/*  ADD DASHBOARD LINK			                							
/*--------------------------------------------------------------------*/
function admin_menu_new_items() {
    global $submenu;
    $submenu['index.php'][500] = array( 'Fuelthemes.net', 'manage_options' , 'http://fuelthemes.net/?ref=wp_sidebar' ); 
}
add_action( 'admin_menu' , 'admin_menu_new_items' );


/*--------------------------------------------------------------------*/         							
/*  FOOTER TYPE EDIT									 					
/*--------------------------------------------------------------------*/
function thb_footer_admin () {  
  echo 'Thank you for choosing <a href="http://fuelthemes.net/?ref=wp_footer" target="blank">Fuel Themes</a>.';  
}
add_filter('admin_footer_text', 'thb_footer_admin'); 
?>