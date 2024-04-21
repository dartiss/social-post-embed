=== Social Post Embed ===
Contributors: dartiss
Donate link: https://artiss.blog/donate
Tags: threads, spoutible, embed, social
Requires at least: 4.6
Tested up to: 6.5
Requires PHP: 8.0
Stable tag: 2.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add embedding for various social media platforms to your WordPress posts.

== Description ==

A temporary plugin solution to add embedding of various social media platform posts, until such time that they become of WordPress Core. At this moment this plugin will support embedding of Threads and Spoutible posts.

Using the plugin is incredibly simple. Once it's installed and activated...

* Head to your social media conversation and click on the option to copy a link to it (or just grab the URL from the browser)
* You should be able to paste that link straight into a post and it will appear as an embed

There are no additional parameters that you can specify, and the embed appears as specified by their originating sites.

Iconography is courtesy of the very talented [Shawon](https://www.fiverr.com/shawon300).

**Please visit the [Github page](https://github.com/dartiss/social-post-embed "Github") for the latest code development, planned enhancements and known issues**

**Please Note:**
This plugin makes use of external scripts, to provide the embedding, all of which are provided by the originating website (rather than a third-party solution). These are...

* Threads (part of Meta). Their privacy policy can be [found here](https://help.instagram.com/515230437301944).
* Spoutible. The Privacy Policy [is here](https://help.spoutible.com/support/solutions/articles/150000044459-privacy-policy).

== Installation ==

Social Post Embed can be found and installed via the Plugin menu within WordPress administration (Plugins -> Add New). Alternatively, it can be downloaded from WordPress.org and installed manually...

1. Upload the entire `social-post-embed` folder to your `wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress administration.

It's now ready to go and there are no settings.

== Frequently Asked Questions ==

= Which social networks does this plugin support? =

At the moment Threads and Spoutible.

I've checked the following and either they have no embedding capability or it's not possible to create an embed from a post link...

* Bluesky
* Cohost
* Discord
* Gab
* LinkedIn
* MeWe
* Next Door
* Pocket
* Quora
* Stackoverflow
* Weare8

And, if you're not already, WordPress natively supports...

* Facebook
* Instagram
* Pinterest
* Reddit
* TikTok
* Tumblr
* Twitter / X
* Vimeo
* YouTube

= Will you add a new social network to this plugin? =

Yes. If it's not listed above, please let me know and I'll take a look at it.

= Threads embeds are not appearing =

A number of plugins which make use of JavaScript appear to conflict with Meta's code. Known plugins so far include Query Monitor and Tada.

== Changelog ==

I use semantic versioning, with the first release being 1.0.

= 2.0.1 =
* Maintenance: Just some code tidying. Nothing to see here. Move along, move along.

= 2.0 =
* Maintenance: Instead of working solely with Threads, the plugin has been extended to work on a number of different social platforms. A lot of the changes made here are for future expansion
* Maintenance: New plugin icon and updated README to reflect the changes
* Enhancement: Added embedding of Spoutible

= 1.0 =
* Initial release

== Upgrade Notice ==

= 2.0.1 =
* Minor code improvements