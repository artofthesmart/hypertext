> How fast did this page load for you?  
> Did it feel _nearly instant_?  
> That's the idea of Hypertext.

[Hypertext](http://hypertext.artofthesmart.com) is a theme for [Grav CMS](google.com) that prioritizes speed and simplicity.  It does not require (nor does it include) any Javascript and it keeps styles to a bare minimum.  This ensures a fast, consistent user experience across browsers and devices.

**Why does this theme exist?**  Most Grav themes come with heavy JS requirements.  Sometimes 1MB or more!  These slow down browsers and create compatibility issues.  Grav is a very powerful CMS but there should be an option for people who want something as close to hand-coded HTML as possible.  This theme tries to separate form and function to create a truly unique experience.

Read more about the [design decisions behind Hypertext here](/reference).

You can provide feedback at the [github page for this project](https://github.com/artofthesmart/hypertext).

# Installation

Installing the theme can be done in one of two ways. Grav's GPM (Grav Package Manager) installation method enables you to quickly and easily install the theme with a simple terminal command, while the manual method enables you to do so via a zip file.

## GPM Installation (Preferred)

The simplest way to install this theme is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's Terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install hypertext

This will install the Hypertext theme into your `/user/themes` directory within Grav. Its files can be found under `/your/site/grav/user/themes/hypertext`.

## Manual Installation

To install this theme, just download the zip version of this repository and unzip it under `/your/site/grav/user/themes`. Then, rename the folder to `hypertext`. You can find these files either on [GitHub](https://github.com/getgrav/hypertext) or via [GetGrav.org](http://getgrav.org/downloads/themes).

You should now have all the theme files under

    /your/site/grav/user/themes/hypertext

>> NOTE: This theme is a modular component for Grav which requires the [Grav](http://github.com/getgrav/grav), [Error](https://github.com/getgrav/grav-theme-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) plugins.

# Updating

As development for the Hypertext theme continues, new versions may become available that add additional features and functionality, improve compatibility with newer Grav releases, and generally provide a better user experience. Updating Hypertext is easy, and can be done through Grav's GPM system, as well as manually.

## GPM Update (Preferred)

The simplest way to update this theme is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm). You can do this with this by navigating to the root directory of your Grav install using your system's Terminal (also called command line) and typing the following:

    bin/gpm update hypertext

This command will check your Grav install to see if your Hypertext theme is due for an update. If a newer release is found, you will be asked whether or not you wish to update. To continue, type `y` and hit enter. The theme will automatically update and clear Grav's cache.

## Manual Update

Manually updating Hypertext is pretty simple. Here is what you will need to do to get this done:

* Delete the `your/site/user/themes/hypertext` directory.
* Downalod the new version of the Hypertext theme from either [GitHub](https://github.com/getgrav/hypertext) or [GetGrav.org](http://getgrav.org/downloads/themes#extras).
* Unzip the zip file in `your/site/user/themes` and rename the resulting folder to `hypertext`.
* Clear the Grav cache. The simplest way to do this is by going to the root Grav directory in terminal and typing `bin/grav clear-cache`.

> Note: Any changes you have made to any of the files listed under this directory will also be removed and replaced by the new set. Any files located elsewhere (for example a YAML settings file placed in `user/config/themes`) will remain intact.

## Dependencies

The Hypertext theme has no dependencies; one of the benefits of having no style sheets or javascript.

# Setup

If you want to set Hypertext as the default theme, you can do so by following these steps:

* Navigate to `/your/site/grav/user/config`.
* Open the **system.yaml** file.
* Change the `theme:` setting to `theme: hypertext`.
* Save your changes.
* Clear the Grav cache. The simplest way to do this is by going to the root Grav directory in Terminal and typing `bin/grav clear-cache`.

Once this is done, you should be able to see the new theme on the frontend. Keep in mind any customizations made to the previous theme will not be reflected as all of the theme and templating information is now being pulled from the **hypertext** folder.