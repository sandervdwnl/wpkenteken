=== Plugin Name ===
Tags: rdw, kenteken, car, auto, garage, api
Requires at least: 6.3
Tested up to: 6.3.2
Stable tag: 1.0
Requires PHP: 8.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Fill your form with the car information by filling the car license plate number.

== Description ==

This plugin retrieves the car informtation for cars with Dutch license plate. You can create a form with your favorite form builder and when the user fills out the license plate information, the rest of the car info is filled in. 
THis plugin comes in handy for car shop or garage businesses or car dealers. 

A few notes about the sections above:

== Installation ==

1. Download the latest release from the Github pge (https://github.com/sandervdwnl/wpkenteken-plugin).
1. In WordPress admin, choose 'Plugins' and then 'Add New'.
1. Upload the downloaded .zip-file.
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= Where can I get the API key? =

Navigate to https://dev.socrata.com/foundry/opendata.rdw.nl/qyrd-w56j and choose 'API'. There you can register for an API key.
When you have received the API key, go to WordPress admin and choose 'Settings' and then 'WPKenteken'. There you can fill in the API key and your key will be saved in the database.

= How do I use the plugin? =

Build a form with at least a field for the license number and other field you like to have filled in automatically.
For now the following fields with the fowllowing CSS-classes are supported:
* A field for the license number with CSS class 'wpkenteken-kenteken';
* A field for the car's brand with CSS class 'wpkenteken-merk'; 
* A field for the car's model with CSS class 'wpkenteken-model';
* A field for the car's production year with CSS class 'wpkenteken-bouwjaar'.

This plugin is tested with Contact Form 7, Ninja Forms and WP Forms. 
If possible, give the container of the field the CSS class. Otherwise give the field itself the CSS class.

== Changelog ==

= 1.0 =
* First stable version.