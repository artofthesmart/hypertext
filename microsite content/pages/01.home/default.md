> How fast did this page load for you?  
> Did it feel _nearly instant_?  
> That's the magic of Hypertext.

[Hypertext](http://hypertext.artofthesmart.com) is a theme for [Grav CMS](google.com) that prioritizes speed and simplicity.  It does not require (nor does it include) any Javascript and it keeps styles to a bare minimum.  This ensures a fast, consistent user experience across browsers and devices.

Special features include:
*  HTML 3 & HTML 5 compliance modes
*  Built-in open source style sheets
*  Headless mode for in-app serving

**Why does this theme exist?**  Most Grav themes come with heavy JS requirements.  Sometimes 1MB or more!  These slow down browsers and create compatibility issues.  Grav is a very powerful CMS but there should be an option for people who want something as close to hand-coded HTML as possible.  This theme tries to separate form and function to create a truly unique experience.

It brings all of the powerful CMS features of [Grav](getgrav.com), but is:
* **Lightweight** - Coming in at 0KB of Javascript and ~1KB of CSS (optional).
* **Compatible** - Works on any browser built after 1995.  [No, really!](/user/pages/01.home/win95.png)
* **Consistent** - Looks identical across any browser, no matter what.
* **Responsive** - Adjusts automatically to any screen size.
* **Accessible** - Works with screen readers and any OS language.
* **Readable** - Legible and clear, just like the W3C intended.

Here are some links to get you started:
*  [Read the installation guide](https://github.com/artofthesmart/hypertext) to download and install the theme.
*  [Visit the Hypertext home page](http://hypertext.artofthesmart.com) to learn more about the philosophy behind the project.
*  [Read the reference guide for caveats and gotchas](http://hypertext.artofthesmart.com/reference) to avoid common mistakes with Hypertext.
*  [Read the FAQ](http://hypertext.artofthesmart.com/FAQ) or [visit the issues page in Github](https://github.com/artofthesmart/hypertext/issues) if you run into problems.
*  [Contribute to Hypertext via Github](https://github.com/artofthesmart/hypertext) and help make the web faster!

!!! **Special thanks** go out to [Ricardo](http://urbansquid.london), the theme champion in the Grav Discord server, [Andy Miller](https://twitter.com/rhuk) creator of Grav CMS, and my wife who's sick of hearing about this project by now.

-------------------------------------------------------------------------------

## Background & Purpose
I've been thinking a lot lately about frontend development and I think the web has gotten very bloated.  I've built powerful tools and websites before, on a variety of platforms, but lately I've come away thinking that we could do so much more with less.  Imagine you aren't in a major US metro and have low bandwidth as a constant, nagging issue.  Or maybe your cellular plan is terribly expensive.  Perhaps you're just in the subway trying to read a blog.

These are common problems that don't look like they'll go away soon.

There's so much over-designing on the web.  Almost every Grav theme relies on jQuery to function and most of them require SASS or LESS to marshal their style sheets.  Then each plugin requires its own JS file and most come with some CSS files of their own.  That means
* More round-trips to the server to fetch files,
* More bytes downloaded, and
* More script for the JS engine to execute.

All of those create barriers between users and content.  Each line of JS or style code is one more thing that can go wrong and cause deviation between devices, browsers, and operating systems.  But smaller/simpler websites load faster, are more predictable, and use less bandwidth.

The web used to be about function over form and I'd like to get back to that a little.

!!! Remember; if you want plugins or other CSS/JS to load, you will need to _explicitly enable it_ with Hypertext!  This can be done globally via the theme settings- e.g. `<gravsite.com>/admin/themes/hypertext` or locally for each page in the `Advanced` tab.  [Details in the reference guide](http://hypertext.artofthesmart.com/reference).

## Philosophy
I tried to keep the theme consistent throughout by following a few key design principles.  Hypertext follows these rules, in order of priority:

1. No Javascript
2. No Theme File Fetches
2. Minimal Styles
3. Target the [HTML3.2 specification](https://www.w3.org/TR/2018/SPSD-html32-20180315)

### No Javascript
This was the easiest rule to follow and it's core to the philosophy of this theme.  JS files must be downloaded and executed before rendering of the page is complete because they could manipulate the DOM.  That means awaiting the first HTML response and putting out more requests, any of which could fail, delay, or call for more files.  Then the browser needs to execute those scripts, eating up time, memory, and battery.

### No Theme File Fetches
Everything that has to be loaded after the first HTML response is considered harmful.  If you, the user, want to add images and other cool stuff to your page, that's up to you, but this theme tries- no, _strives_- to provide as much data as possible to the client up front to ensure a fast, smooth rendering process.

Consider the following results from some basic testing of Hypertext page loads.  Basically, small styles like `sakura` load fast no matter what, but large styles like `latex` load faster when you use linking.

| Loading Type              | Caching   | Transfer Size | Speed |
|---------------------------|-----------|---------------|-------|
| No Style                  | FALSE     | 8.8KB         | 649ms |
| Stylesheet, inline        | FALSE     | 12.1KB        | 686ms |
| Stylesheet, inline        | TRUE      | 12.1KB        | 671ms |
| Stylesheet, via `href`    | FALSE     | 10.4KB        | 1.2s  |
| Stylesheet, via `href`    | TRUE      | 8.9KB         | 670ms |
| Big stylesheet, via `href`| FALSE     | 399KB         | 2.53s |
| Big stylesheet, via `href`| TRUE      | 8.9KB         | 660ms |
| Wikipedia homepage        | FALSE     | 549B          | 1.47s |
| Wikipedia homepage        | TRUE      | 61KB          | 1.47s |

!! Tested in an incognito window of Chrome with the `Fast 3G` throttling settings.

### No Styles
I wanted to avoid adding styles as much as possible because these can get quite large.  That goes double if you're using an off-the-shelf stylesheet.  This page you're reading is only about 8KB but the [Spectre CSS framework](https://picturepan2.github.io/spectre/) is already 8KB when minified and [Bootstrap's CSS alone](getbootstrap.com) weighs in at over 40KB.  It is far too easy to load up a bunch of stylesheets that overlap and override each other, eating bandwidth and accomplishing little.

That said, there were a few compromises, listed below.

**Images are capped at 100% of parent width.** The first was that the W3C couldn't have known in 1995 about the rise of mobile devices.  Back then, it was reasonable to assume that screens would always be wider than the widest reasonable image.  That's not true on mobile devices, which have an effective width of about 400px or about 5" wide by 1995 standards at 72dpi.  So if you load a modern website on a very old browser or a mobile device _without the assistance of meta tags and CSS_ you end up with lots of images that overflow horizontally.

There are some options for allowing a tiny amount of CSS that come built-in to help make sites look better.  This site uses them because they add a trivial amount of size and *zero additional requests*.

I get past this with one CSS rule to fix 99% of problems: `img { max-width: 100% }`.  This is present in all of the included CSS themes.

**Added some key classes and semantic CSS themes.** The default HTML style isn't especially stylish and the drive to make this theme wasn't about loving the HTML style but about loving speed.  It turns out that including _some_ style doesn't slow things down very much and adds a lot of structure to documents.

[The Hypertext reference guide](/reference) has [a table with all of the styles included in the theme by default](/reference#style_table), along with screenshots.

### Use HTML Like It's 1995
I liked the 3.2 spec.  I felt like it was that great combination of "here's how you should do it" and "but- hey- do whatever you want".  Hypertext tries to stick to the spirit of that specification in a few ways.  The most obvious is that you can choose whether to use HTML3 tags or HTML5 tags.

It also minimizes the use of classes and IDs.  In part this is to keep sizes low but also because at the time you would be have been using semantic selectors like `li` and `span`.  So there are almost no IDs, and classes only where one item has considerable metadata that cannot otherwise be reasonably distinguished (e.g. the `active` class in a nav item to indicate that is the currently loaded page).