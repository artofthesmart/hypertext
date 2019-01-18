This page describes the philosophy behind Hypertext and some of the technical details. It's a good place to learn more about what it can do and why it's built the way it is.

---

## Summary
You probably work on front-end development, either as a hobbyist or a professional.  Whether you noticed or not websites are getting too heavy, with too many libraries, that take too long to render.  Worse yet, if you don't take the time to include only what you need, there's a good chance you're bloating your UX with code that doesn't ultimately have much impact.

Hypertext theme is the answer to that bloat.

It brings all of the powerful CMS features of [Grav](getgrav.com), but is:
* **Lightweight** - Coming in at 0KB of Javascript and <1KB of CSS (optional).
* **Compatible** - Works on any browser built after 1995.
* **Consistent** - Looks identical across any browser, no matter what.
* **Responsive** - Adjusts automatically to any screen size.
* **Accessible** - Works with screen readers and any OS language.
* **Readable** - Legible and clear, just like the W3C intended.

### Special Features
`headless=true` - If you add this query parameter to your URL, Grav will only return the content of the page (including any JS/CSS you enabled/disabled as normal).  This is useful for serving content for other 

## Background & Purpose
I've been thinking a lot lately about frontend development and I think the web has gotten very bloated.  I've built powerful tools and websites before, on a variety of platforms, but lately I've come away thinking that we could do so much more with less.  Imagine you aren't in a major US metro and have low bandwidth as a constant issue.  Or maybe your cellular plan is terribly expensive.  Perhaps you're just in the subway trying to read a blog.

These are common problems that don't look like they'll go away soon.

There's so much over-designing on the web.  Almost every Grav theme relies on jQuery to function and most of them require SASS or LESS to marshal their style sheets.  Then each plugin requires its own JS file and most come with some CSS files of their own.  That means
* More round-trips to the server to fetch files, holding up renders,
* More bytes downloaded in order to render, and
* More script for the JS engine to execute.

All of those create barriers between users and content.  Each line of JS or style code is one more thing that can go wrong and cause deviation between devices, browsers, and operating systems.  But smaller/simpler websites load faster, are more predictable, and use less bandwidth.  

The web used to be about function over form and I'd like to get back to that.

## Philosophy
I tried to keep the theme consistent throughout by following a few design principles and making tradeoffs where necessary.  Hypertext follows these rules, in order of priority:

1. No Javascript
2. No Stylesheets
3. Use HTML Right

### No Javascript
This was a hard rule to follow, but it's core to the philosophy of this theme.  JS files must be downloaded and executed before rendering of the page is complete because they could manipulate the DOM.  First of all, that means awaiting the first response, parsing the HTML, finding any Javascript that needs to be run, and putting out more requests (any of which could fail).  Then the browser needs to execute those scripts in a runtime, eating up time, memory, and battery.

**Note:** That means that in order to use Javascript with this theme, you will need to explicitly enable it!  This can be done globally via the theme settings- e.g. `gravsite.com/admin/themes/hypertext` or locally for each page in the `Advanced` tab.

### No Styles
I wanted to avoid adding styles as much as possible because these can also get quite large.  This page you're reading is only about 8KB but the [Spectre CSS framework](https://picturepan2.github.io/spectre/) is already 8KB when minified and [Bootstrap's CSS alone](getbootstrap.com) weighs in at over 40KB.  It is far too easy to to load up a bunch of stylesheets that overlap and override each other.

That said, there are some compromises here.  There are some options for allowing a tiny amount of CSS that come built-in to help make sites look better.  This site uses them because they add a trivial amount of size and *zero additional requests*.

**Note:** Similar to above you will need to explicitly enable CSS in order to make Grav include it in your page loads.  This can be done globally via the theme settings- e.g. `gravsite.com/admin/themes/hypertext` or locally for each page in the `Advanced` tab.  If you -don't- do this, you'll only get whatever CSS you enable or provide in the theme settings.

### Use HTML Right
The HTML specification- for all its faults- is a good piece of policywork.  It specifies which tags to use for style versus which tags have semantic meaning.  This theme seeks to adhere to that specification as much as possible while still keeping in the spirit of minimalism.  The HTML3 specification was the flavor of choice and it provided lots of semantic and stylistic options!  But ultimately every class, id, and attribute adds to the page size and gives additional avenues for you, the reader, to build in way too much style.

So there are very few classes in this theme and almost no IDs at all.

#### Classes
I only used classes where there were multiple DOM elements on a page that (a) are fundamentally different from one another in semantic meaning but (b) are indistinguishable from each other if you wanted to apply a style to them via CSS.

Let me explain what that means.

Supose you have a `<nav>` element near the top of the page and it's the only one.  You might want to float it or apply some color!  You don't need a class for that because you can use the selector `nav` to apply style to it.  Inside that element, though, you might have a `<ul>` of navigation items, one of which is the page the user is currently on.  That anchor is significantly different from the others, so it has an `active` class applied.

#### IDs
I don't think I used IDs at all.  This might change in the future, though.