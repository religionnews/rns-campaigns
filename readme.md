
# RNS Campaigns #

## Description ##

The RNS Campaigns plugin allows you to send email newsletters through Campaign Monitor from your WordPress site. It uses the [createsend-php][] library for interacting with the Campaign Monitor API.

The plugin creates a "Campaigns" post type. You can add custom fields to it as you can with any other post type.

In your theme, include a `single-rns_campaign.php` file that contains your campaign template along with whatever WordPress template tags you need to display your content (see an example in the `/examples` directory).

To send a newsletter, create and publish a new Campaign from your Dashboard in (mostly) the normal fashion. See the [Current limitations][] section below for some caveats to the publishing process.

RNS Campaigns was developed, and works fairly well, for [Religion News Service](http://www.religionnews.com).

## Changelog ##

### June 19, 2013 ###

* Campaigns no longer need to be set to 'Pending Review' before sending
* You can now send campaigns to one or multiple lists
* Errors from Campaign Monitor are handled more gracefully
* Support for scheduling campaigns has been removed, but might return eventually

## Installation ##

1. Unzip the contents and add the `rns-campaigns` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the Plugins menu in WordPress
1. Under Settings > RNS Campaigns, add an API Key, Client ID, and "From" name and email address. There are also options for specifying lists that campaigns will always be sent to and for hiding the lists metabox on the edit page.
1. Optionally customize the "Campaigns" post type with custom fields or other content you want to include in your campaigns
1. Include a `single-rns_campaign.php` file in your theme that contains your campaign template and any necessary WordPress template tags.

## Publishing a campaign ##

1. In your Dashboard, go to Campaigns > Add New.
1. Edit your campaign as you would a normal post. The fields involved will depend on the kind of content in your campaign template.
1. Select distribution lists under "Select Recipients," if the "Hide Lists Metabox" has not been checked
1. Click "Publish" to send your campaign.

## Current limitations ##

1. The title of the campaign will automatically be the email subject line and the campaign name in Campaign Monitor.
1. `TextUrl`s are not specified.
1. Campaign Monitor requires that the URL of your campaign be publicly accessible. That means that you will not be able to send a campaign though a local installation.
1. Scheduling campaigns is not supported.

## License ##

GPLv2

[createsend-php]: http://campaignmonitor.github.com/createsend-php/
[Current limitations]: #current-limitations

