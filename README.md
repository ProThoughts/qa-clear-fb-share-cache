# Question2Answer Plugin: Clear FB share cache automatically #

----------

## Description ##

Just a simple plugin that will clear FB share cache automatically after new question is posted. By default you must clear FB share cache manualy [here]https://developers.facebook.com/tools/debug/og/object/ after new qustions is posted. If you don't do that and someone want to share question immediately, it will not pull right meta content. So, this plugin will prevent that situation by sending POST request to Facebook graph to scrape data.


## Installation ##

- Download the plugin as ZIP from [github](https://github.com/stefanmm/qa-clear-fb-share-cache)
- Make a full backup of your q2a database before installing the plugin.
- Extract the folder ``qa-clear-fb-cache`` from the ZIP file.
- Move the folder ``qa-clear-fb-cache`` to the ``qa-plugin`` folder of your Q2A installation.
- Use your FTP-Client to upload the folder ``qa-clear-fb-cache`` into the qa-plugin folder of your server.
- Navigate to your site, go to **Admin -> Plugins** and check if the plugin "Clear FB cache" is listed.

## Setup ##

- Make Facebook app
- Make Facebook page (page name must include app name)
- Set Facebook page type to "App Page"
- In Facebook app settings connect app with page
- Go to [THIS LINK]https://developers.facebook.com/tools/accesstoken/ and find your new page on list
- Copy "App Token"
- In your Q2A admin panel "Plugins" page, find "Clear FB cache" and click "options"
- In field you see paste that "App token"
- Enable and Save!

## Disclaimer ##

The code is probably okay for production environments, but may not work exactly as expected. You bear the risk!

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details.


## Copyright ##

All code herein is [OpenSource](http://www.gnu.org/licenses/gpl.html). Feel free to build upon it and share with the world.


## Final Note ##

I am not experienced PHP developer, I am front-end designer! So, my code is probably very bad, but it's working. Feel free to make it better, send suggestions. Thanks.