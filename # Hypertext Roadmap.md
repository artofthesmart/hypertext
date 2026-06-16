# Hypertext Roadmap

Many of the features on the roadmap are already complete, they just need to be reviewed and verified in the Hypertext codebase.

Let's define each feature in detail and then verify which already exist in the codebase. 

## General theme settings
### Header & Footer
These features are responsible for the sitename, subheader, and footer. 

**Sitename In Page Titles** - Boolean. Adds the sitename to the H1 of the page/item title. It is displayed as "Sitename - Item Title" (for example: "Alex's Blog - My First Post").
**Header Style** - Dropdown. Changes how the header/sitename is displayed. There are four options: Text, Image, None, Modular, or Both. 
- `Text` - Default. the text name of the site.
- `Image` - an image upload.
- `Both` - the site name followed by rendering the image below it. When `image` or `both` is selected, the user will be presented with the option to upload an image.
- `Modular` - searches for a root-level page in the `user/pages` directory named `_header.md` and renders that. See details below about Modular Content.
- `None` - renders neither.
**Subheader** - Boolean. Selects whether or not to show the site's subheader at the top of the page. If true, the user will be presented with the option to enter a subheader. This is different than GravCMS's standard site description which is useful for SEO.
**Footer** - Dropdown. Determines what/how to render a footer for the site. 
- `Content` - Default. The user is presented with a text box where they can add markdown footer content.
- `Modular` - Searches for a root-level page in the `user/pages` directory named `_footer.md` and renders that. See details below about Modular Content.
- `None` - Renders no footer.

### Navigation
These features define how navigation gets rendered on the screen. Relevant classes and IDs are assigned to each link in the HTML output to allow for easy styling downstream.

**Menu Bar Format** - Dropdown. Determines how the menu bar is displayed.
- `Inline` - Default. The menu bar is displayed in a single line.
- `Stacked` - The menu bar is displayed in multiple lines as a bulleted list.
- `None` - Renders no menu bar.

**Nav Text Style** - Dropdown. Determines how the menu bar text is displayed.
- `Brace Decorated` - Default. The menu bar text is rendered with braces, e.g. `[ Home ] [ About ] [ Contact ]`.
- `Angle Decorated` - The menu bar text is rendered with angle brackets, e.g. `< Home > < About > < Contact >`.
- `Plain` - The menu bar text is displayed without decoration, e.g. `Home About Contact`.

**Pagination Structure** - Dropdown. Determines how pagination is displayed site-wide (i.e. on collection pages).
- `Inline` - Default. Pagination is displayed in a single line.
- `Stacked` - Pagination is displayed in multiple lines.

**Pagination Text Style** - Dropdown. Determines how pagination text is displayed.
- `Brace Decorated` - Default. The pagination text is rendered with braces, e.g. `[ 1 ] [ 2 ] [ 3 ]`.
- `Angle Decorated` - The pagination text is rendered with angle brackets, e.g. `< 1 > < 2 > < 3 >`.
- `Plain` - The pagination text is displayed without decoration, e.g. `1 2 3`.

**Show Social Buttons** - Dropdown. Selects whether or not to show social buttons. If true, the user will be presented with the option to add social buttons.
- `None` - Default. Renders no social buttons.
- `With Navigation` - The social buttons are displayed after the navigation bar.
- `Top Right` - The social buttons are displayed at the top right corner of the page with the Header.

**Custom Menu Items** - Array Field. Allows the user to add custom menu items as `Title` and `URL` pairs. These items will be displayed in the menu bar after any automatically generated menu items like pages. This is useful for linking to pages that are not in the navigation menu, or for adding custom links to the navigation menu.


### Plugin Support
In a perfect world we'd support all of the GravCMS default plugins offered by the company. Below are a few examples:
- Shortcodes
- TOC
- Breadcrumbs
- Simple search

### Structure

**HTML Mode** - Dropdown. Determines the HTML version to use for the site.
- `HTML3.2` - Default. The site will use HTML3.2 elements like `<div id="nav">` and `<div id="header">`.
- `Modern HTML` - The site will use a modern HTML standard elements like `<nav>` and `<header>`.

**Favicons** - Dropdown. Determines how to handle favicons for the site.
- `Default` - Default. Uses the default GravCMS favicon.
- `Upload` - The user can upload a favicon.
- `Select From GravCMS List` - The user can select a favicon from the GravCMS list.

**Image Include** - Dropdown. Determines how images are included in the site.
- `Linked` - Default. Images are linked in the site as normal. Results in smaller page sizes but slower overall load times with more network requests. Use for sites that have lots of images or heavy image reuse.
- `Embedded` - Images are Base64 encoded and embedded into HTML responses. This reduces network requests at the expense of sending a single, larger file at once. Use for sites with few images.

**Resize Images To Fit** - Boolean. Determines whether or not to resize images to fit the site.
- `FALSE` - Default. Images are rendered at the size you uploaded.
- `TRUE` - Images are resized to Hypertext optimal sizes. For example, a header image would be resized to 768px wide and 128px high.

**Image Compression** - Dropdown. Determines whether or not to compress (shrink) images. This reduces quality to speed up delivery.
- `None` - Default. Images are not compressed or encoded when uploaded.
- `Medium` - Images are compressed and encoded at 80% quality.
- `High` - Images are compressed and encoded at 60% quality.
- `Extreme` - Images are aggressively compressed and downscaled.

**Allow URL Params** - Dropdown. Determines whether or not to allow URL parameters to override theme and page settings.
- `Admin Only` - Default. URL parameters are only allowed when signed in.
- `Never` - URL parameters are never allowed.
- `Always` - URL parameters are always allowed.

**Nav Alignment** - Dropdown. Determines the alignment of the navigation bar.
- `Left` - Default. The navigation bar is aligned on the left.
- `Center` - The navigation bar is aligned to the center.
- `Right` - The navigation bar is aligned on the right.

**Site Layout** - Dropdown. Determines the layout of the site.
- `1 Column` - Default. The site is displayed in one column.
- `2 Column (left)` - The site is displayed in two columns. The primary content is in the right column and the secondary content is in the left column. This mode searches for a page in the `user/pages` directory named `_column_left.md` and renders that. See details below about Modular Content.See details below about Modular Content.
- `2 Column (right)` - The site is displayed in two columns. The primary content is in the left column and the secondary content is in the right column. This mode searches for a page in the `user/pages` directory named `_column_right.md` and renders that. See details below about Modular Content.
- `3 Column` - The site is displayed in three columns. This mode searches for pages in the `user/pages` directory named `_column_left.md` and `_column_right.md` and renders them in the left and right columns respectively. See details below about Modular Content.

#### About Modular Content
Modular content is a feature that allows the user to create custom page layouts. It is a way to organize content in a way that is not possible with the standard page layout. Modular content is made up of a series of "modules" that are arranged in a specific order. Each module has a specific purpose and can be used to display different types of content. Hypertext will look for theme-specific modular content in the root pages directory first, followed by each lower directory until it reaches the current page. For example, you might define `_footer.md` in `user/pages` and again in `user/pages/03.blog/`. That means the footer in `user/pages` will be used everywhere on the site _except_ any pages in the `03.blog` directory and below.

### Style & JS

**Alignment** - Dropdown. Determines the alignment of the content. This doesn't affect left-to-right reading or paragraph alignment, just where the wrapper of the page resides.
- `Left` - Default. The content is aligned to the left of the screen.
- `Center` - The content is aligned to the center.
- `Right` - The content is aligned to the right of the screen.

**Column Widths** - Array Field. Allows the user to define the width of each column in the site layout. For a 1-column layout, this field is hidden. For a 2-column layout, this field shows two inputs for the width of the left and right columns respectively. For a 3-column layout, it shows three inputs. The nominal values aren't important: the proportions between them are used to determine the width of each column. For example, writing `50` and `25` for a two column layout will produce a two column site where the left column is twice as wide as the right column. 
    
**Total Width** - Dropdown. Determines the overall maximum width of the content for large screens.
- `Default` - No style (full width)
- `640px` - 640px (very small)
- `768px` - 768px (small)
- `960px` - 960px (medium)
- `1024px` - 1024px (large)
- `1280px` - 1280px (very large)

**Allow CSS** - Boolean. Determines whether or not to allow CSS. Allowing CSS will display other options. Remember that this can be overridden on the collection or page level.
- `false` - Default. Prevents the use of CSS.
- `true` - Allows CSS to be used.

**Custom CSS** - Textarea. Allows the user to add custom CSS to include site-wide. This should be used for simple tweaks and overrides. For larger projects, use a CSS file instead.

**CSS Include Mode** - Dropdown. Determines how the CSS is included in the site.
- `Inline` - Default. All CSS is inlined into the site and delivered on each page load. Prioritizes speed for small sites with little CSS.
- `File` - The CSS is included in a file that is fetched with a separate network request.
- `Pipeline` - Enables the GravCMS CSS Pipeline. Best for sites with lots of CSS or multiple CSS files to combine like from plug-ins.

**Allow JS** - Boolean. Determines whether or not to allow JavaScript. Allowing JS will display other options. Remember that this can be overridden on the collection or page level. If you're turning this on, seriously reconsider using the Hypertext theme. The whole point is to avoid using the client's JS engine.
- `false` - Default. Prevents the use of JS.
- `true` - Allows JS to be used.

**Custom JS** - Textarea. Allows the user to add custom JavaScript. This should be used for simple tweaks and overrides. For larger projects, use a JS file instead.

**JS Include Mode** - Dropdown. Determines how the JavaScript is included in the site.
- `Inline` - Default. All JS is inlined into the site and delivered on each page load. Prioritizes speed for small sites with little JS.
- `Pipelined` - Enables the GravCMS JS Pipeline. Best for sites with lots of JS or multiple JS files to combine like from plug-ins.

## Page Settings
When rendering a page, these settings can be used to override the theme and collection settings for that specific page. If a setting is not set, it will use the theme's default setting if available or just use Grav's built-in default values. Some settings are specific to how pages and collections function and cannot be set at a site-wide level effectively.

### Page Content Settings
These determine what metadata from the frontmatter should be shown when rendering a page.

**Show title** - Boolean. Determines whether or not to show the title of the page.
**Show subtitle** - Boolean. Determines whether or not to show the subtitle of the page.
**Show header image** - Boolean. Determines whether or not to show the header image of the page.
**Show author** - Boolean. Determines whether or not to show the author of the page.
**Show last updated** - Boolean. Determines whether or not to show the last updated date of the page.
**Show publish date** - Boolean. Determines whether or not to show the publish date of the page.
**Show tags** - Boolean. Determines whether or not to show the tags of the page.
**Show categories** - Boolean. Determines whether or not to show the categories of the page.
**Show summary** - Boolean. Determines whether or not to show the summary of the page.
**Show clickthru** - Boolean. Determines whether or not to show the "Read More" click-through text on page summaries.
**Use Headless Mode** - Boolean. Determines whether or not this page is rendered in headless mode. If true, the theme will not render anything except the page's content. No header, no metadata, no titles, no footer, nothing. Just the body content of parsed markdown into HTML. The content will get a `<body>` tag and the proper DOCTYPE.
	
## Collection Settings
### Render Options
**Render Style** - Dropdown. Determines the style in which child pages are rendered.
- `Compact List` - Default. Child pages are rendered in an ordered list with all content appearing on a single line.
- `Comfy List` - Child pages are rendered in a column, with better spacing for each frontmatter attribute you choose to render. This is sort of between a compact list and a cards view.
- `Table` - Child pages are rendered in a table.
- `Cards` - Child pages are rendered as cards with structured data views. These can appear in a grid if desired.

**Render Nested** - Boolean. Determines whether or not to render nested child pages. Child pages are only rendered 1 level down. This is useful for high level views of complex page groups like blog posts composed of multiple entries or projects composed of multiple tasks. Keep in mind that rendering nested content often gets super complex and busy.

**Nested Block Title** - Textarea. The title to display for nested child pages. Something like "Content:" is sufficient. It just helps the reader understand what they're looking at.
	

Page Content	
Show author	
Date Primacy	
Show last updated	
Show publish date	
Show tags	
Show Categories	
Show summary	
Show subtitle	
Show header image	
Show title	
Show clickthru	
Use Headless	
	
Ordering Options	
Ordering Type	Forced, Order-By
Order Direction	
Child Render Limit	
Sibling Links (prev/next when viewing a child)	
	
Modular	
Render Style	Linear, SxS
Order	