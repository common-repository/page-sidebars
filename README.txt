=== Page Sidebars ===
Contributors: DanielNexterous
Site: http://www.nexterous.com/
Tags: pages, sidebars, asides
Requires at least: 2.7
Tested up to: 2.7.1
Stable tag: 2.6

A small but useful plugin to have unique sidebars for each page.

== Description ==

A plugin that allows you to have a sidebar for content on each individual page.

== Installation ==

Download and unzip the file with your favorite ZIP extractor. Upload the page-sidebars.php file to /wp-content/plugins/. Activate the plugin and you are ready. For more detailed instruction follow these details:

1. Upload the file page-sidebars.php into your Wordpress directory under /wp-content/plugins/

2. Open your administration panel, go to Plugins, and activate it by clicking Activate next to the description of Page Sidebars.

3. You are now able to begin using the plugin. Go to [Pages] and select an existing page or write a new page. You will find a box named Page Sidebars. Enter the sidebar content in those two boxes (title & content).

4. To display the sidebar, add the widget Page Sidebars to one of your theme's sidebars (that displays on a page) [Appearance > Widgets].

== Legacy ==

Page Sidebars was my second Wordpress plugin (the first to serve a real purpose). 

For the first version, the code was useful but not improved upon. It did it's job, without any fancy features.

For the second version, I reconfigured this plugin a lot to include widget sidebars, but I had to overload it because Wordpress did not support some of the functions I needed yet. I also deviated too much from the original purpose of the plugin.

For version 2.5, I drafted this plugin back to it's original purpose: to serve sidebar content for each individual page. I corrected a lot of my techniques and formed new philosophies about my plugins. This is why widget support was dropped in favor of a smooth, fast-running, single-purpose plugin and without the template files editing.

== Frequently Asked Questions ==

The following are FAQ that have been asked on my site or that I find people might confuse. If you need any more help, or have questions, feel free to contact me on my site. 

= How do I add Page Sidebars widget to multiple sidebars? =

Open up the page-sidebars.php with your favorite text editor or through the built in plugin editor (Plugins > Page Sidebars row > Edit). In the code right below the plugin information, it says #MULTI-WIDGET Support and then below it it says $widgets_amount = 1. Change it to however many sidebars you need the Page Sidebars widget on.

= Do you support a widget sidebar for each page? =

With version 2.5, no, Page Sidebars is no longer widget-enabled. See Legacy tab for the basis of my decision.

= Do I have to add any template tags into my theme for this to work? =

No. All you have to do is add a widget to once of your existing sidebars in your theme (as long as that sidebar shows up on a page as well).