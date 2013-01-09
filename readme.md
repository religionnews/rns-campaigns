
# RNS Campaigns #

## Description ##

The RNS Campaigns plugin allows you to send email newsletters through Campaign Monitor from your WordPress site. It uses the [createsend-php][] library for interacting with the Campaign Monitor API.

The plugin creates a "Campaigns" post type. You can add custom fields to it as you can with any other post type.

In your theme, include a `single-rns_campaign.php` file that contains your campaign template along with whatever WordPress template tags you need to display your content (see an example in the `/examples` directory).

To send a newsletter, create and publish a new Campaign from your Dashboard in (mostly) the normal fashion. Campaigns can be published immediately or scheduled. See the [Limitations][] section below for some caveats to the publishing process.

RNS Campaigns was originally developed, and currently works fairly well, for [Religion News Service](http://www.religionnews.com).

## Installation ##

1. Unzip the contents and add the `rns-campaigns` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the Plugins menu in WordPress
1. Under Settings > RNS Campaigns, add an API Key, Client ID, List ID, and "From" name and email address
1. Optionally customize the "Campaigns" post type with custom fields or other content you want to include in your campaigns
1. Include a `single-rns_campaign.php` file in your theme that contains your campaign template and any necessary WordPress template tags.

## Publishing a campaign ##

1. In your Dashboard, go to Campaigns > Add New.
1. Edit your campaign as you would a normal post. The fields involved will depend on the kind of content in your campaign template.
1. If you want to send the campaign in the future, be sure to schedule it as you would a normal post.
1. When you're finished editing and scheduling your campaign, change the status to Pending Review and click "Save as Pending." **You will not be able to edit the campaign once you change the status**.
1. Click "Publish" to send your campaign (or "Schedule," if you changed the publish date).

## Current limitations ##

1. You can send to only one List ID.
1. The title of the campaign will automatically be the email subject line and the campaign name in Campaign Monitor.
1. Scheduled campaigns cannot be rescheduled or cancelled through the Dashboard. You need to modify them directly in Campaign Monitor.
1. Error responses from Campaign Monitor (e.g., if a campaign contains JavaScript) are handled gracelessly.
1. `TextUrl`s are not specified.
1. Campaign Monitor requires that the URL of your campaign be publicly accessible. That means that you will not be able to send a campaign though a local installation.

## Why require saving the campaign as Pending Review? ##

In my testing, I found that WordPress would sometimes send incorrect information to Campaign Monitor if a campaign was published without being saved. For example, if you created a new campaign and immediately published it, Campaign Monitor would register the subject line as "Auto Draft."

To avoid this error, the plugin hides the Publish button via CSS until the post status is set to Pending Review. Once a campaign is set to Pending Review, it then hides the Status button. Effectively, the plugin forces the user to save the campaign before sending it.

## License ##

GPLv2

[createsend-php]: http://campaignmonitor.github.com/createsend-php/
[Limitations]: #limitations

