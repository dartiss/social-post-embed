=== Threads Embed ===
Contributors: dartiss
Donate link: https://artiss.blog/donate
Tags: embed, threads, meta, social
Requires at least: 4.6
Tested up to: 6.1
Requires PHP: 8.0
Stable tag: 0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

🧵 Add Threads embedding to a WordPress post.

== Description ==

A temporary plugin solution to embedding Threads into a WordPress post, until such time that they provide an API.

Once the plugin is installed and activated...

* Head to your Thread conversation and click on the share option under it
* Select "Copy link"
* You should be able to paste that link straight into a post and it will appear as an embed

There are no additional parameters that you can specify, and the embed appears as specified by Meta.

== Installation ==

Threads Embed is not available from the wordpress.org plugin directory, so must be downloaded from Github and installed manually.

1. Download the latest release [from Github](https://github.com/dartiss/threads-embed/archive/refs/heads/main.zip), in the form of a Zip file
2. In your site's admin, head to Plugins -> Add New
3. Click on the "Upload Plugin" button and follow the instructions to upload the Zip file that was downloaded at step 1
4. Activate the plugin

It's now ready to go and there are no settings.

== Frequently Asked Questions ==

= Embeds are not appearing - it keeps showing "Cannot embed' =

A number of plugins which make use of JavaScript appear to conflict with Meta's code. Known plugins so far include Query Monitor and Tada.

== Changelog ==

I use semantic versioning, with the first release being 0.1.

= 0.2 =
* Enhancement: After finding that the embeds didn't work on my personal site, I realised that some of the embed code that I removed was a fallback mechanism. I've now added it back whilst I try and work out why this is occurring

== Upgrade Notice ==

= 0.1 =
* Fallback output added for when the embed can't be displayed