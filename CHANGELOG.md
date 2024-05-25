# v2.3.0
## 05/25/2023

1. [](#new)
    * Adds a favicon uploader to make adding a favicon to your site easy. It must be a `.png` file. The uploader puts the file in `user/images/favicon` and don't forget to enable it with the feature just above it!


# v2.2.8
## 05/25/2023

1. [](#bug)
    * User [pmoreno-rodriguez](https://github.com/pmoreno-rodriguez) found and fixed a bug with custom header links not properly showing `title`, `rel`, and `name` contents. Thank you!
    * Custom, per-page CSS rules were not being properly written onto the page. Sorry about that.
2. [](#improved)
    * Removing `/blueprints/assets` directory. I don't think it does anything. Let me know if I'm wrong.
    * Headless rendering is now optional by page rather than only accessible through a url parameter.
    * Total overhaul of the demo content using ChatGPT to showcase functionality more consistently.

# v2.2.7
## 11/16/2021

1. [](#improved)
    * Adds the option to have custom HTML for the site header instead of always using the site title. This accepts _any_ raw HTML, so you can use an SVG, base64 encoded image, even an image sourced from somewhere else. Sky is the limit. Use with caution.

# v2.2.6
## 03/09/2021

1. [](#bug)
    * Forgot to close main PHP file. Fixes that.
2. [](#improved)
    * Adds the option of _what kind_ of dates to show on collection pages. Formerly was "Last Modified", but can now be selected explicitly.

# v2.2.5
## 02/23/2021

1. [](#bug)
    * Some pages didn't properly reference translations for words like "Categories". This has been fixed.
2. [](#improved)
    * User [nicosomb](https://github.com/nicosomb) added French translations and the fixes above. Many thanks!
    * **If you know a language besides English, please [feel free to contribute translations](https://github.com/artofthesmart/hypertext/blob/master/languages.yaml)!**

# v2.2.4
## 02/10/2021

1. [](#bug)
    * Fixes summary content display because sometimes it would repeat back escapated HTML instead of the contents of your page. Identified by [felixzwettler](https://github.com/felixzwettler).

# v2.2.3
## 01/09/2021

1.  [](#new)
    * Adds a visually impaired mode that replaces the default `<p>` and `<li>` font family of any style with the [Braille Institute's Atkinson Hyperlegible Font](https://brailleinstitute.org/freefont). This makes websites more readable at the click of a button, at the cost of ~100kb.
2.  [](#improved)
    * Makes `max-width` CSS required for all users instead of optional, greatly simplifying code. Yes, I know this is against the philosophy of the project but- frankly- HTML 3.2 couldn't have known about mobile devices.
    * Nits and additions to documentation.

# v2.2.2
## 12/11/2020

1.  [](#bug)
    * User [roslavych](https://github.com/roslavych) identified and fixed an error in one of the CSS theme names.

# v2.2.1
## 08/30/2020

1.  [](#bug)
    * Logic problem with "Continue Reading..." feature fixed, thanks to [takanotume24](https://github.com/takanotume24).
    * Fix to GPM version #s, also spotted by [takanotume24](https://github.com/takanotume24).

# v2.2.0
## 04/28/2020

1.  [](#new)
    * Added the ability to [suppress the "Continue Reading..." link in a collection](https://github.com/artofthesmart/hypertext/issues/31). Useful for when you have a collection page that doesn't have much content and instead is only meant to introduce other child pages.
    * Fixes a linebreak in List sub-children where it would add a new line after every child, when really I only wanted one after a set of sub-children is complete. Might delete it entirely someday.

# v2.1.1
## 01/27/2020

1. [](#bug)
    * [Fixes duplicate tags](https://github.com/artofthesmart/hypertext/issues/25) appearing at the beginning of default pages. Thanks to Github user [mbirth](https://github.com/mbirth) for calling it out!
    * Removes [extra break line between title and categories](https://github.com/artofthesmart/hypertext/issues/27) at the beginning of pages.
    * Fixes [typo in page comments](https://github.com/artofthesmart/hypertext/issues/26).
2. [](#improved)
    * Tags now have brackets around them when rendered.

# v2.1.0
## 01/01/2020

1. [](#new)
    * Adding the ability to have a custom footer on your website. [Fixes this issue](https://github.com/artofthesmart/hypertext/issues/23).

# v2.0.0
## 06/29/2019

1. [](#new)
    * **Massive overhaul.**  Incompatible with 1.x.x versions.  If you need to roll back to a prior version, you can [download the last 1.x version from Github](https://github.com/artofthesmart/hypertext/archive/v1.1.4.zip).
    * Adds open source stylesheets.  Hypertext is still plenty fast with very small CSS sheets.
        * Optional `inline` vs `href` include modes.
        * Quickly leaf through options via `?theme=1` URL parameter.  Pick what works for you!
        * Want to add your sheet to the supprted list?  [Check out this commit for a template](https://github.com/artofthesmart/hypertext/commit/7a5b5b61e8fe6001013722b2fd03c77369cb065c) then send me a pull request!
    * HTML 3 & HTML 5 compliance modes.  You can now choose whether to use HTML3.2 or HTML5 conventions.
    * Collection rendering options.  There are now three ways to render page children, all of which have options to configure which kinds of data get shown:
        * `list`, which is an ordered list of items.
        * `table`, which is a tabular view.
        * `summary`, which is the more standard, structured view of children.
    * Header images & thumbnails.  Add images to the tops of pages and thumbnails for rendering as children of some parent page.
2. [](#improved)
    * Simplified page types. All pages are now one of two types:
        * `default` for [pages](https://learn.getgrav.org/16/content/content-pages), which supports `item` and `blog_item` page types also.
        * `collection` for [page collections](https://learn.getgrav.org/16/content/collections), which supports `blog` and `blog_list` page types also.

# v1.2.0
## 04/20/2019

1. [](#new)
    * Adds the ability to hide the horizontal navigation separator, good for folks who want to add a little CSS.
2. [](#improved)
    * Allows more detail around how additional menu items are treated. You can now specify whether to open links in a new window, among other things.

# v1.1.4
## 04/14/2019

1. [](#improved)
    * Removes the color classes from the CSS since it doesn't look like they're being used and they don't work for dark themes.
    * Removes the "toggle-able" directive for colors and replaces them with defaults, since it was proving confusing.

# v1.1.3
## 03/22/2019

1. [](#improved)
    * Adds better pagination support, thanks to [jrswab](https://github/jrswab).

# v1.1.2
## 03/08/2019

1. [](#bug)
    * Fixes broken pagination. Thanks to [neilpanchal](https://github.com/neilpanchal).
    * Improves tag handling in classes thanks to [laynee](https://github.com/Laynee).

# v1.1.1
## 02/25/2019

1. [](#bug)
    * Re-fixing a previously broken customCSS feature.
    
# v1.1.0
## 02/07/2019

1. [](#new)
    * Adds a "blog" page type, supplementing the Collection type. Collections are now a trimmed down version, good for text-heavy pages.
    * Several potentially breaking changes.  Install with care.

# v1.0.3
## 02/07/2019

1. [](#bug)
    * Fixes custom CSS to be properly inserted into head section.
    * Fixes a missing 0 from [shanehoban](https://github.com/shanehoban).
    * Fixes "Next" and "Previous" post options in collections, they were reversed.

# v1.0.2
## 02/06/2019

1. [](#bug)
    * Fixes CSS/JS in footers. This broke popular plugins like code syntax highlighting.
    * Includes typo and logical fixes from [mbirth](https://github.com/mbirth).
    
# v1.0.1
## 01/18/2019

1. [](#new)
    * Adds demo content for testing and new installations.
    * Adds custom menu items after pages are rendered.
   [](#improved)
    * Removes some unneeded code.

# v1.0.0
## 01/17/2019

1. [](#new)
    * Changelog started.
    * Created the theme, and initial collection/item pages.
    * Added `headless` mode.
