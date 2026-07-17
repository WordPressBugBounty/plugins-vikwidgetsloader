=== VikWidgetsLoader - Collection of Widgets ===
Contributors: e4jvikwp
Tags: vik, widgets, slider, cookies, maps, grid, icons, carousel, tripadvisor
Requires at least: 4.7
Tested up to: 7.0
Stable tag: 1.12.1
Requires PHP: 5.4.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A variety of Widgets to enhance your website. Add sliders, grids and icons to your pages.

== Description ==

= VikWidgetsLoader =

Add 8 new fancy widgets to your website! Install this plugin to load a variety of widgets ready to be used with your theme.

Visit [VikWP.com](https://vikwp.com/) for more details.

= Here are the included Widgets =

* Category Post - Display your latest posts filtered by category
* Cookies Policy - Displays a message regarding the cookie policies
* Google Maps - Displays a Google Map with custom markers
* Grid Content - Displays a grid of posts
* Icons - Displays a grid of icons
* Speakers - Displays a list of people with names and surnames
* Text Slide - Displays several texts sliding over a still background image
* Trip Advisor Review - Displays one of several Trip Advisor widgets

= Wordpress's Powerful Widget System =

VikWidgetsLoader does not rely on external framworks, as we believe in the power of the lightweight and resourceful Wordpress Widget manager.
Every widget is loaded as any default Wordpress Widget is, so you don't need to load external libraries or anything.

= Extendable System =

VikWidgetsLoader has a simple to use and extendable, which will allow us (and you too!) to develop additional widgets for it with ease!
The installation also comes provided with a simple widgets guide, which you can follow to add any custom widget you wish to develop.

== Changelog ==

= 1.10.0 =
* Improved optimization minifying the CSS files.

= 1.10.1 =
* Minor bug fixes.

= 1.11.0 =
* Added Gutenberg block support for all 11 widgets via Server-Side Rendering.
* Added WordPress Media Manager picker for image fields in Gutenberg blocks.
* Added searchable FontAwesome icon picker with live preview in the VikWP Icons block.
* Added native color picker for color fields in Gutenberg blocks.
* Fixed background color not being applied in VikWP Grid Content widget.
* Updated WordPress compatibility to 7.0.

= 1.12.0 =
* Security: Hardened sanitization of the CSS class field in all widgets.
* Fixed FontAwesome icons not displaying on the frontend in the VikWP Icons widget/block when the active theme doesn't already load FontAwesome; the bundled copy is now loaded automatically, only when needed.
* Added an "Auto-load FontAwesome" setting (Settings > VikWidgetsLoader) to control the automatic loading above, for sites that prefer to manage FontAwesome themselves.
* Fixed the icon picker in the VikWP Icons block only showing the first 80 matching icons; searches now return every matching icon from the full bundled set.
* Removed the VikWP Content Slider widget from the widgets list, as it's no longer actively maintained. It remains available for existing sites already using it.

= 1.12.1 =
* Security: Hardened validation and sanitization of the timing fields (delay, fade in, fade out) in the VikWP Text Slide widget/block.
* Security: Hardened validation and sanitization of the icon column width field in the VikWP Icons widget/block.
* Security: Hardened validation and sanitization of marker coordinates in the VikWP Google Maps widget/block.
* Security: Hardened validation and sanitization of the hotel ID, website URL, language and protocol fields in the VikWP Trip Advisor Review widget/block.
