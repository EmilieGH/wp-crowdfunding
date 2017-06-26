=== WP Crowdfunding ===
Contributors: themeum
Tags: woocommerce, baker, kickstarter, backer, online sell, e-commerce, paypal, crowdfunding, shop, indiegogo, funding, fund rising, invest, fund collecting, crowd, donation, downloads, marketplace, crowd funding, crowdfund, charity, donate, fundraising plugin, paypal donation, stripe donation, wordpress crowdfunding plugin, adaptive payment, split payment, paypal adaptive, stripe split

Donate Link: https://www.themeum.com/
Requires at least: 4.0
Tested up to: 4.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WP Crowdfunding is a WordPress plugin for fundraising/backer sites. This WooCommerce based plugin lets you launch a site like Kickstarter easily.

== Description ==
WP Crowdfunding is a WooCommerce based plugin that empowers anyone to create a crowdfunding site using WordPress content management system. It’s very user-friendly and convenient to manage. Most of the basic WP Crowdfunding features are offered in this free version. Advanced features like centralized Native Wallet System, PayPal Adaptive payments, Stripe Connect, analytical reports, email notifications, unlimited rewards and so on are available in paid versions.

[youtube https://www.youtube.com/watch?v=6Y8eDiKXQw8]

Please read the documentation.
[Documentation](https://www.themeum.com/docs/installing-wp-crowdfunding/)

> Try WP Crowdfunding
> [http://try.themeum.com/plugins/wp-crowdfunding/](http://try.themeum.com/plugins/wp-crowdfunding/)

= Features =

Here are the most notable features of WP Crowdfunding plugin. If you need any further information, please feel free to contact us. Below are the best offerings of WP Crowdfunding.

= Submitting/Adding a Project =
  * Dedicated user registration feature
  * Frontend project submission form
  * Project start & end date options
  * Setting a featured image and video
  * Minimum & maximum price options
  * Define a recommended price
  * Declare a funding goal
  * Reward system with estimated delivery date (1 reward in the free version)
  * Campaign end method (Target goal)
  * Campaign end method (Target date)
  * Campaign end method (Target goal & date)
  * Campaign end method (Campaign never ends)

= More Options for a Published Project =
  * Project update option
  * Display the backer(s) in project single page
  * Display the backer(s) name as anonymous

= Features: Frontend Dashboard Sections for Users =
  * Update the profile and contact information
  * See own projects list
  * Check the backed projects list
  * Explore the received pledges list
  * Visit bookmarks list (favorited projects)
  * Change account password

= Advanced Features for Admins and Developers =
  * Template overriding option for developers
  * Standard WordPress dashboard access for WP Crowdfunding, WooCommerce and other configurations
  * Adding and handling the payment methods

= Exclusive Features in the Paid Version =
  * Unlimited rewards with estimated delivery date
  * Native Wallet System to track, calculate, record and distribute all funds (an alternative system of PayPal Adaptive / Stripe Connect)
  * Google reCAPTCHA
  * Email notifications
  * Analytical reports
  * Social share
  * PayPal Adaptive payment
  * Stripe Connect
  * 1 Year plugin update
  * 1 Year Support
  * Plugin package includes an exclusive dedicated theme
  * Many more feature coming soon


Please let us know your feedback, if you think something can be more awesome this plugin, we will added it.

= Shortcode List =
To use these shortcodes, just place the required shortcode(s) on your desired location.

  * Crowdfunding Product Listing Shortcode [wpneo_crowdfunding_listing]
  * Crowdfunding Product Listing Shortcode with specific category [wpneo_crowdfunding_listing cat="cat_name"]
  * Crowdfunding Product Submission Form Shortcode [wpneo_crowdfunding_form]
  * Crowdfunding Product Search Shortcode [wpneo_search_shortcode]
  * Crowdfunding User Dashboard Shortcode [wpneo_crowdfunding_dashboard]
  * Crowdfunding User Registration Shortcode [wpneo_registration]

= Pro Version =

> [Pro Plugin + One Free Theme](https://www.themeum.com/product/wp-crowdfunding-plugin/)
> [Pro Plugins + Pro Themes](https://www.themeum.com/product/backer/)



= Author =
Developed by [Themeum](https://www.themeum.com)

== Installation ==

1. Go to Dashboard > Plugins > Add New, then search WP CrowdFunding and click Install Now
2. Upload 'wp-crowdfunding' to the '/wp-content/plugins/' directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Click on the new menu item "CrowdFunding" and Setup your Settings.

== Frequently Asked Questions ==

= Q. Where can I get support? =
A. You can get support by posting on the support section of this plugin on WordPress plugins directory or directly mailing to support@themeum.com

= Q. Can I use my existing WordPress theme? =
A. Sure, you can use your existing WordPress theme with WP Crowdfunding.

= Q. Where can I report a bug? =
A. Found a bug? Please let us know by posting on the support section of this plugin on WordPress plugins directory or directly mailing to support@themeum.com

= Q. Is WP CrowdFunding free? =
A. There are two versions of WP CrowdFunding. One is free and another is paid. The paid version has some more advanced features which are not accessible in the free version.

== Screenshots ==
1. Admin Dashboard
2. Crowdfunding General Settings
3. Crowdfunding Listing Page Settings
4. Crowdfunding Single Page Settings
5. Crowdfunding WooCommerce Settings
6. Crowdfunding Frontend Dashboard

== Changelog ==

= 1.0 =
Initial version released
= 1.1 =
PHP 5.2.17 compatibility
Minor bug fix
= 1.2 =
Minor bug fix
= 1.3 =
Minor bug fix
= 1.4 =
Changed some template file structure, button color from backend, fixed some minor bug
= 1.5 =
Native wallet system has been added in the pro version. Fixed initial campaign permission setup during plugin setup. Fixed some bug, performance improved
= 1.6.0 =
Fixed front page listing pagination bug, admin settings tab fixed. and other bug fixed
= 1.6.1 =
Supported WooCommerce native single page for the campaign details, Fixed Some Bug
= 1.6.2 =
Fix $this variable issue in the campaign edit page
= 1.6.3 =
Fixed a bug in getting user roles. We placed $roles  = get_editable_roles(); in the tab-general.php
= 1.6.4 =
WooCommerce 3.0 compatibility issue fixed, as well backword version of WooCommerce support added.
= 1.6.5 =
Remove Deprecated Method, Removed Unused Reward from Session During Cart/Donation, Permalink Plain Text Bug Fix, Translation Bug Fix, Reward Quantity Bug Fix, Checkout Only Crowdfunding Cart Bug Fix
= 1.6.6 =
Added a filter woocommerce_product_cf_meta_data in
/plugins/wp-crowdfunding/includes/woocommerce/class-wpneo-frontend-hook.php, Removed all tfoot, Fixed a issue in
PayPal Live payment issue, change ajax_object to wpcf_ajax_object, added a prefix to /plugins/wp-crowdfunding/includes/woocommerce/class-wpneo-frontend-hook.php.
= 1.6.7 =
Updated some minor broken link

== Upgrade Notice ==
Nothing here
