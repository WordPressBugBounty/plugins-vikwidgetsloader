# Adding new Widgets

Adding new widgets to VikWidgetsLoader is very easy. Just follow this guide!

## Picking a name

The first step in your structure should be picking a name for your widget. This will be important as it will be used for several things in your component.
I generally recommend using a lowercase name, maybe with a prefix stating who is building the widget.
The name of the widget should be very representative of what your widget should do. It should not contain any spaces, use underscores instead.

**Developer prefix**: mydev
**Widget function**: digital watch
**Widget Name Example**: mydev_digital_watch

## Header

You will notice that all of the widget files will contain the following header in their PHP files:

```PHP
<?php
/**
 * @package     VikWidgetsLoader
 * @subpackage  widget
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */
```

When you're creating a new widget, you should change the header to fit your company! You should change all of the values, but leave the @package and @subpackage values intact.

## File structure

All of your files should be placed under the *widgets* folder. Create a new folder, with the same name as your widget, under the *widgets* folder.
Following our previous example, it would look something like this:

_vikwidgetsloader/widgets/mydev_digital_watch/_

In there, you should place the following files (we will continue using our example widget):

* [mydev_digital_watch.php](#main-file) - _This will be the main file for the widget. It is required_
* [mydev_digital_watch.png](#image-file) - _This will be the image file for the widget in the plugin's options page. It is not required, but it is recommended_
* [mydev_digital_watch.css](#front-end-style-sheet) - _This will be the style file for the widget. It is completely optional, and you will need to include it manually in the main PHP file if you wish to use it_
* [tmpl/form.php](#form-file) - _This is the file which renders the settings form in the Widgets page in the administrator section. It is required_
* [tmpl/widget.php](#widget-file) - _This is the file which renders the widget in the front-end, in your website. It is required_

After you have placed these files, the rest of the work is filling these files in. Any further dependency in your files should either be placed in your widget folder, or it should be placed in the _assets_ folder in the root of the plugin. If the dependency is a JS or CSS library, we recommend placing it in the _assets_ folder, this way other widgets can use it. If the dependency is an image, or something more specific, we recommend placing it in the widget folder, because it is more specific. After you have created the files as specified in this guide, you should be set. As long as you always use the widget name for every file, you should be set, just upload them in the _widgets_ directory and you should be good to go.

## Main file

The main file of the widget, which is the one which declares the widget class, is the most important file in the widget.
In our example it's the *mydev_digital_watch.php*. It should declare the widget's class and functions.
__This is very important:__ the class name should be the widget name, so it should be __IDENTICAL__ to the file name (without the extension).
All of the Widgets in the VikWidgetsLoader are extensions of the **VikWL_Widget** class, which handles most functions required by Wordpress for Widgets to run.
The only thing that this file should handle is declaring the _construct_ and adding external dependencies (such as the stylesheet file, if it's present).

### Example

Here is what our example widget's hypothetical *mydev_digital_watch.php* should look like:

```PHP
<?php 

//This should always be present to avoid Wordpress files from being called directly.
defined('ABSPATH') or die('No script kiddies please!');

//The class name should be identical to the widget name, and it should extend the VikWL_Widget base class
class mydev_digital_watch extends VikWL_Widget {
	
	//This class should only redefine the parent construct, to add any dependency the widget might have.
	function __construct() {

		//This is an example of adding the stylesheet file present in the widget folder to the widget in the front-end
		function mydev_digital_watch_add_style() {
			if (is_active_widget(false, false, 'mydev_digital_watch', false)) {
				wp_register_style('mydev_digital_watch', VIKWIDGETSLOADER_WIDGETS_URI . 'mydev_digital_watch/mydev_digital_watch.css', false, 1.0, 'all');
				wp_enqueue_style('mydev_digital_watch');
			}
		}

		//If you wish to add external files to what is displayed in administrator section, you should use the 'admin_enqueue_scripts' action instead.
		add_action('wp_enqueue_scripts', 'mydev_digital_watch_add_style');

		//To close out the new construct we call the parent's construct
		parent::__construct(
			// Path of the file
			dirname(__FILE__),
			
			// Base ID of your widget
			'mydev_digital_watch', 
			 
			// The Widget name will appear in UI
			__('My Digital Watch', 'vikwidgetsloader'), 
			 
			// Widget description
			array( 'description' => __( 'This widget displays a Digital Watch in the front-end', 'vikwidgetsloader' ), ) 
		);
	}
}
```

## Form file

This is the file which contains what is shown in the Widgets page, in the administrator section.
To set up your input fields you can use the _$this_ object, which is of the WP_Widget class. The most common functions you should use are:

* get_field_id - _this can be used to display the id for your input fields_
* get_field_name - _this can be used to display the name for your input fields_

In this file you can also access the _$instance_ array to get the settings saved by your user. They keys of the array are the names of the input fields. We recommend checking if a key is set before using it, and storing the value of the array in another variable before using it. 

### Back-end Style sheet

As far as styling in the administrator section, we have some classes already available for you to use, and some classes are already available in the Wordpress framework. We recommend using the inspector to check which classes display what, or following Wordpress reference. These are the classes we have defined in the _assets/css/vikwp_widgets_form.css_ file:

* vikwp-widget-cnt - _This should be used for the \<div> tag which contains your form_
* vikwp-widget-col - _This can be used to create different columns for different fields (eg. vikwp_contentslider)_
* vikwp-widget-col-inner - _This should be used inside vikwp-widget-col_
* vikwp_widget_more - _This should be added via JavaScript when the widget has been opened. Check its use in vikwp_textslide_
* vikwip_widget_more_bigger - _This has the same functionality of vikwp_widget_more and should be used the same way_
* vikwp-widget-box - _This can be used to separate content inside the same vikwp-widget-col, by drawing a box around it_
* vikwp-widget-spacing - _This is similar to vikwp-widget-box, as it is used to separate content, but this simply spaces it_

### Example

Instead of displaying an entire example for the file, we recommend checking out one of our widget's 'form' files.
A simple file to look at would be the '_vikwp_category_post_' widget's 'form' file, included with the plugin.

## Widget file

This is the file with contains what is shown in the Front-end, in the position in which the widget has been published. This is where you should implement the main functionalities of your widget, then print them out for your users to see. The array _$instance_ again contains all the values set by your users, which you should handle the same way as you have in the Form file, so checking that the values exist, then instancing them into variables before using them.

### Front-end Style sheet

There are no ready made styles you can use for the front-end, so you will need to make everything yourself. Most importantly, if you need to use custom classes, and don't want to declare them in the same file as your code (understandably so), you should load them in a separate file (the optional CSS file explained above). You can check our previous example of the Main File to see how we load the CSS file placed in the widget's folder, which is then loaded in the front-end, so when the Widget file is displayed.

### Example

As for the form view, we recommend simply looking at one of the widgets present as reference. This is because this file has no rules or restrictions to what should displayed in it, it should just display what you need the widget to look like in the front-end of your site.

## Image File

Lastly you should insert a PNG file in your widget folder, with the same name of your widget. This file will be used in the VikWidgetsLoader options page, to display your widget. If no image is found, then the plugin will display your widget's name instead (which is pretty unappealing).

## Translations

Make sure every new text line is translated in the PO file, and that it is called with the gettext translation functions before being echoed. Just update the sources in the language files to see all the new definitions added.

_Developed by [VikWP](http://www.vikwp.com)_