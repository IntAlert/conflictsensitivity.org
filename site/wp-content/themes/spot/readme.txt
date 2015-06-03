=== Spot by XtremelySocial ===

Contributors: timnicholson
Tags: one-column, right-sidebar, left-sidebar, fluid-layout, responsive-layout, custom-header, custom-menu, featured-images, featured-image-header, full-width-template, flexible-header, theme-options, sticky-post, threaded-comments, light, translation-ready, rtl-language-support, custom-background
Donate link: [https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JGJUJVK99KHRE]
Requires at least: 3.8
Tested up to: 4.0
Stable tag: 1.3
License: GPLv3
License URI: http://www.opensource.org/licenses/GPL-3.0

Spot by XtremelySocial is an adaptation of the "Spot" theme by Blacktie.co. It is a modern, fully responsive, "flat" style theme with a nice color palette, big full-width images, and full-width colored sections. The navbar is dark and fixed at the top of the page for easy navigation. It includes several beautiful header images for businesses, photographers, musicians, writers and you can upload your own as well. For more information go to http://xtremelysocial.com/wordpress/spot/.


== DESCRIPTION ==

The Spot theme is a child theme for Flat Bootstrap that moves the header below the navbar, chagnes the navbar to black and fixes it to the top of the page. The site title is displayed in the navbar, so you still retain your site branding.

The theme comes with several beautiful full-width header images and you can also upload your own. 

The theme is great for business sites, showcasing products, portfolios, or photos. The included header images are designed for businesses, photographers, musicians, and writers / bloggers.

This theme supports a "static" home page and full-width pages and posts, but you can use it in the more traditional blog-style with sidebars.
 
Other features include a mobile navigation bar, multiple columns (grid), buttons, icons, labels, badges, tabbed content areas, collapsible content areas, progress bars, alert boxes, carousels (sliders) and much, much more. This is a theme for both users and theme developers with lots of features but without the bloat. 

For more information go to [http://xtremelysocial.com/wordpress/spot/].


== LICENSE ==

Spot WordPress theme, Copyright (C) 2014 XtremelySocial
Spot WordPress theme is licensed under the GPL.

The included header photos are all Public Domain and we are releasing them as GPL along with the theme. They are all from unsplash.com [http://unsplash.com].

The theme was inspired by the "Spot" theme by Blacktie.co. They deserve all the credit for how nice the theme looks. [http://www.blacktie.co/]


== INSTALLATION ==

1. Download and install the parent theme, Flat Bootstrap, into your main /wp-content/themes/ directory
2. Download this theme into your main /wp-content/themes/ directory
3. Activate this theme through the 'Appearance' menu in WordPress
4. Read the notes below about how to use this theme


== HOW TO USE THIS THEME ==

= Setting up the Home Page =

We think this theme looks great with the home page as a full-width page with midnight blue "section header" that has a screenshot or picture of your product, service, or latest work at the top. So we have provided a sample home page that you can import into your theme. Use the standard WordPress Import feature and load the /samples/samples.xml file. You can use this sample to build your home page (or any other page on your site).

If you want this page to be your home page, create or edit an existing page to be used for your blog. You don't need any content or special settings on that page as its just a placeholder URL for WordPress to display your blog. Then go into WordPress Appearance -> Customize and set the option for Static Home Page to one of your pages. Assign this page as your blog page.

= Set up the Footer =

The original Spot HTML theme by Blacktie.co has a single-column footer with social media icons from the font-awesome icon set. So we've gone ahead and set that as the default when you first install the theme. However, that is just a sample. The links don't go anywhere. You'll want to add a text widget with your own links in it.

But first, view the page source and copy the text from the sample widget. Then add a normal WordPress text widget to the Footer sidebar, paste in the text and change the links to your social media profiles.

= About WordPress Child Themes =

This theme is a standard WordPress "child theme". It comes with only the files that modify the styling, templates, and functions of the parent theme that are needed for this theme.

If you just want to change some of the styling (CSS), we recommend using the WordPress Jetpack plugin for this. It will store your styles in the WordPress database and apply them automatically after the theme's default styles.

If you want to modify the theme further than that, such as to modify page templates, then COPY this theme into your /wp-content/themes directory with a new directory name. Perhaps spot-modified or my-spot or something like that. You'll also need to change the very first line of the style.css file to change the "Theme Name:" so that you can tell the difference between the original Spot theme and your customized one when you are viewing the themes on your site.

By using either of these methods described above (the Jetpack plugin or copying the theme files to a new name), you'll be able to upgrade this theme from WordPress.org to receive bug fixes and new features and incorporate those into your own child theme if you'd like.

You can read more information about how to use child themes on WordPress.org [http://codex.wordpress.org/Child_Themes]

= Additional Theme Features and Usage =

All of the features of the parent theme, Flat Bootstrap, are included in this theme. You can have full-width images at the top of your pages, full-width blog posts (no sidebar), colored sections, buttons, carousels (sliders), and much, much more. 

For more information, see the "How to use our themes" [http://xtremelysocial.com/wordpress/usergide/] and the "Theme Shortcodes" [http://xtremelysocial.com/wordpress/shortcodes/] pages on our website. 


== CHANGELOG ==

= 1.3 =
* Added new custom header that is a city skyline
* Added new custom header that is a desk with a briefcase on it
* Remove content-header.php as the parent theme (Flat Bootstrap v1.4) now handles the logic needed in this child theme. So no need to override it here anymore!
* Removed header.php so that the one from the parent theme is used. Created a function to filter xsbf_navbar to right-justify the menu items and replace O's in the site name with a red dot.
* Move the Page Top widget area to below the header image as this looks better.
* Updated the screenshot.
* Bumped version numbers.
* Includes all the latest enhancements from the parent theme, such as support for portfolios and testimonials, new page templates, full-width embedded videos, expanded color palette, and much more.

= 1.2 =
* Change name to Spot from Flat Bootstrap Spot per WordPress.org recommendation
* Remove features from this child theme that are now incorporated into the parent theme, Flat Bootstrap

= 1.0.1 =
* Initial updates for inclusion in the WordPress.org Theme Directory

= 1.0 =
* Initial version
