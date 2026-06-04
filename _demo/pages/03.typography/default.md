This page shows lots of example HTML tags to give you an idea of the look and feel of Hypertext.

===

# Example HTML Content

<style>
  .example-container {
    display: flex;
    margin: 20px 0;
    gap: 20px;
  }

  .example-content {
    flex: 1;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
  }

  .example-code {
    flex: 1;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #f8f8f8;
    overflow-x: auto;
  }

  .example-code pre {
    margin: 0;
    padding: 0;
    white-space: pre-wrap;
    font-family: monospace;
    font-size: 0.85em;
  }

  .example-label {
    font-size: 0.7em;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #888;
    margin-bottom: 6px;
  }
</style>

## Headings

Headings are used to define titles and subtitles in HTML documents. There are six heading levels, from `h1` (most important) to `h6` (least important). Use them to structure your content hierarchically.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <h1>Heading One</h1>
    <h2>Heading Two</h2>
    <h3>Heading Three</h3>
    <h4>Heading Four</h4>
    <h5>Heading Five</h5>
    <h6>Heading Six</h6>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;h1&gt;Heading One&lt;/h1&gt;
&lt;h2&gt;Heading Two&lt;/h2&gt;
&lt;h3&gt;Heading Three&lt;/h3&gt;
&lt;h4&gt;Heading Four&lt;/h4&gt;
&lt;h5&gt;Heading Five&lt;/h5&gt;
&lt;h6&gt;Heading Six&lt;/h6&gt;</pre>
  </div>
</div>

## Emphasis Elements

These elements convey stress or alternate voice. `em` and `strong` carry semantic meaning (screen readers interpret them), while `i`, `b`, and `u` are presentational only. Use `del` and `ins` to mark editorial changes; use `s` for content that is no longer accurate.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <p><em>Italic via &lt;em&gt; — semantic emphasis.</em></p>
    <p><i>Italic via &lt;i&gt; — presentational.</i></p>
    <p><strong>Bold via &lt;strong&gt; — semantic importance.</strong></p>
    <p><b>Bold via &lt;b&gt; — presentational.</b></p>
    <p><u>Underline via &lt;u&gt; — presentational.</u></p>
    <p><ins>Inserted text via &lt;ins&gt; — editorial addition.</ins></p>
    <p><s>Stale content via &lt;s&gt;.</s></p>
    <p><strike>Strikethrough via &lt;strike&gt; — deprecated.</strike></p>
    <p><del>Deleted text via &lt;del&gt; — editorial removal.</del></p>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;em&gt;Italic via em — semantic emphasis.&lt;/em&gt;
&lt;i&gt;Italic via i — presentational.&lt;/i&gt;

&lt;strong&gt;Bold via strong — semantic importance.&lt;/strong&gt;
&lt;b&gt;Bold via b — presentational.&lt;/b&gt;

&lt;u&gt;Underline via u — presentational.&lt;/u&gt;
&lt;ins&gt;Inserted text via ins — editorial addition.&lt;/ins&gt;

&lt;s&gt;Stale content via s.&lt;/s&gt;
&lt;strike&gt;Strikethrough via strike — deprecated.&lt;/strike&gt;
&lt;del&gt;Deleted text via del — editorial removal.&lt;/del&gt;</pre>
  </div>
</div>

## Inline Text Elements

These elements format inline text content. `code`, `tt`, `kbd`, `var`, and `samp` all share a monospace appearance but carry distinct semantic meanings important for accessibility and machine parsing. `sup` and `sub` adjust vertical alignment; `cite` identifies a creative work; `q` wraps a short inline quotation.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <p><code>code — computer code text</code></p>
    <p><tt>tt — teletype text (deprecated)</tt></p>
    <p><kbd>kbd — keyboard input</kbd></p>
    <p><var>var — variable name</var></p>
    <p><samp>samp — sample program output</samp></p>
    <p><small>small — smaller text</small></p>
    <p><big>big — larger text (deprecated)</big></p>
    <p><cite>cite — a citation or title of a work</cite></p>
    <p>This is a <q>short inline quotation</q> using q.</p>
    <p>Superscript: E = mc<sup>2</sup></p>
    <p>Subscript: H<sub>2</sub>O</p>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;code&gt;code — computer code text&lt;/code&gt;
&lt;tt&gt;tt — teletype text (deprecated)&lt;/tt&gt;
&lt;kbd&gt;kbd — keyboard input&lt;/kbd&gt;
&lt;var&gt;var — variable name&lt;/var&gt;
&lt;samp&gt;samp — sample program output&lt;/samp&gt;

&lt;small&gt;small — smaller text&lt;/small&gt;
&lt;big&gt;big — larger text (deprecated)&lt;/big&gt;

&lt;cite&gt;cite — a citation or title of a work&lt;/cite&gt;
This is a &lt;q&gt;short inline quotation&lt;/q&gt; using q.

Superscript: E = mc&lt;sup&gt;2&lt;/sup&gt;
Subscript: H&lt;sub&gt;2&lt;/sub&gt;O</pre>
  </div>
</div>

## Text Formatting Elements

`abbr` and `acronym` (deprecated) expose long-form expansions on hover via the `title` attribute. `dfn` marks the defining instance of a term. `nav` is a semantic landmark element that wraps a site navigation block — screen readers and search engines treat it specially.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <p>Abbreviation: <abbr title="World Wide Web">WWW</abbr></p>
    <p>Acronym (deprecated): <acronym title="North Atlantic Treaty Organization">NATO</acronym></p>
    <p>Definition term: <dfn>Yog-Sothoth</dfn></p>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Orders</a></li>
      </ul>
    </nav>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;abbr title="World Wide Web"&gt;WWW&lt;/abbr&gt;
&lt;acronym title="North Atlantic Treaty Organization"&gt;NATO&lt;/acronym&gt;
&lt;dfn&gt;Yog-Sothoth&lt;/dfn&gt;

&lt;nav&gt;
  &lt;ul&gt;
    &lt;li&gt;&lt;a href="#"&gt;Home&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;About&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;Contact Us&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;Orders&lt;/a&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/nav&gt;</pre>
  </div>
</div>

## Lists

### Unordered List (`ul`)

An unordered list presents items where sequence doesn't matter. Browsers render each `li` with a bullet point. Use it for collections, feature lists, or any group of items without a meaningful order.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <ul>
      <li>Koyaanisqatsi</li>
      <li>Powaqqatsi</li>
      <li>Naqoyqatsi</li>
    </ul>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;ul&gt;
  &lt;li&gt;Koyaanisqatsi&lt;/li&gt;
  &lt;li&gt;Powaqqatsi&lt;/li&gt;
  &lt;li&gt;Naqoyqatsi&lt;/li&gt;
&lt;/ul&gt;</pre>
  </div>
</div>

### Ordered List (`ol`)

An ordered list presents items in a meaningful sequence. Browsers automatically number each `li`. Use it for steps, rankings, or any list where order carries meaning.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <ol>
      <li>Larry</li>
      <li>Moe</li>
      <li>Curly</li>
    </ol>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;ol&gt;
  &lt;li&gt;Larry&lt;/li&gt;
  &lt;li&gt;Moe&lt;/li&gt;
  &lt;li&gt;Curly&lt;/li&gt;
&lt;/ol&gt;</pre>
  </div>
</div>

### Description List (`dl`)

A description list associates terms (`dt`) with one or more descriptions (`dd`). Use it for glossaries, metadata pairs, FAQs, or any key–value content.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <dl>
      <dt>Definition Term</dt>
      <dd>Definition data describing the previous term.</dd>
      <dt>Another Definition Term</dt>
      <dd>Definition data describing the previous term.</dd>
    </dl>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;dl&gt;
  &lt;dt&gt;Definition Term&lt;/dt&gt;
  &lt;dd&gt;Definition data describing the previous term.&lt;/dd&gt;
  &lt;dt&gt;Another Definition Term&lt;/dt&gt;
  &lt;dd&gt;Definition data describing the previous term.&lt;/dd&gt;
&lt;/dl&gt;</pre>
  </div>
</div>

## Forms

Forms collect user input and submit it to a server. The `form` element wraps all controls. `fieldset` groups related controls visually and semantically; `legend` labels the group. Individual controls (`input`, `select`, `textarea`, `button`) are paired with `label` elements for accessibility.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <form>
      <fieldset id="forms__input">
        <legend>Input fields</legend>
        <p><label for="input__text">Text Input</label> <input id="input__text" placeholder="Text Input" type="text"></p>
        <p><label for="input__password">Password</label> <input id="input__password" placeholder="Type your Password" type="password"></p>
        <p><label for="input__webaddress">Web Address</label> <input id="input__webaddress" placeholder="http://yoursite.com" type="url"></p>
        <p><label for="input__emailaddress">Email Address</label> <input id="input__emailaddress" placeholder="name@email.com" type="email"></p>
        <p><label for="input__phone">Phone Number</label> <input id="input__phone" placeholder="(999) 999-9999" type="tel"></p>
        <p><label for="input__search">Search</label> <input id="input__search" placeholder="Enter Search Term" type="search"></p>
        <p><label for="input__number">Number Input</label> <input id="input__number" placeholder="Enter a Number" type="number"></p>
      </fieldset>
      <fieldset id="forms__select">
        <legend>Select menus</legend>
        <p><label for="select">Select</label>
        <select id="select">
          <optgroup label="Option Group">
            <option>Option One</option>
            <option>Option Two</option>
            <option>Option Three</option>
          </optgroup>
        </select></p>
      </fieldset>
      <fieldset id="forms__checkbox">
        <legend>Checkboxes</legend>
        <ul>
          <li><label for="checkbox1"><input checked="checked" id="checkbox1" name="checkbox" type="checkbox"> Choice A</label></li>
          <li><label for="checkbox2"><input id="checkbox2" name="checkbox" type="checkbox"> Choice B</label></li>
          <li><label for="checkbox3"><input id="checkbox3" name="checkbox" type="checkbox"> Choice C</label></li>
        </ul>
      </fieldset>
      <fieldset id="forms__textareas">
        <legend>Textareas</legend>
        <p><label for="textarea">Textarea</label>
          <textarea cols="48" id="textarea" placeholder="Enter your message here" rows="4"></textarea></p>
      </fieldset>
      <fieldset id="forms__action">
        <legend>Action buttons</legend>
        <p>
          <input type="submit" value="input type=submit">
          <input type="button" value="input type=button">
          <input type="reset" value="input type=reset">
          <input disabled="" type="submit" value="input disabled">
        </p>
        <p>
          <button type="submit">&lt;button type=submit&gt;</button>
          <button type="button">&lt;button type=button&gt;</button>
          <button type="reset">&lt;button type=reset&gt;</button>
          <button disabled="" type="button">&lt;button disabled&gt;</button>
        </p>
      </fieldset>
    </form>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;form&gt;
  &lt;fieldset id="forms__input"&gt;
    &lt;legend&gt;Input fields&lt;/legend&gt;
    &lt;p&gt;&lt;label for="input__text"&gt;Text Input&lt;/label&gt;
       &lt;input id="input__text" type="text" placeholder="Text Input"&gt;&lt;/p&gt;
    &lt;p&gt;&lt;label for="input__password"&gt;Password&lt;/label&gt;
       &lt;input id="input__password" type="password"&gt;&lt;/p&gt;
    &lt;p&gt;&lt;label for="input__emailaddress"&gt;Email&lt;/label&gt;
       &lt;input id="input__emailaddress" type="email"&gt;&lt;/p&gt;
  &lt;/fieldset&gt;

  &lt;fieldset id="forms__select"&gt;
    &lt;legend&gt;Select menus&lt;/legend&gt;
    &lt;p&gt;&lt;label for="select"&gt;Select&lt;/label&gt;
    &lt;select id="select"&gt;
      &lt;optgroup label="Option Group"&gt;
        &lt;option&gt;Option One&lt;/option&gt;
        &lt;option&gt;Option Two&lt;/option&gt;
      &lt;/optgroup&gt;
    &lt;/select&gt;&lt;/p&gt;
  &lt;/fieldset&gt;

  &lt;fieldset id="forms__checkbox"&gt;
    &lt;legend&gt;Checkboxes&lt;/legend&gt;
    &lt;ul&gt;
      &lt;li&gt;&lt;label for="checkbox1"&gt;
        &lt;input checked id="checkbox1" type="checkbox"&gt; Choice A
      &lt;/label&gt;&lt;/li&gt;
    &lt;/ul&gt;
  &lt;/fieldset&gt;

  &lt;fieldset id="forms__textareas"&gt;
    &lt;legend&gt;Textareas&lt;/legend&gt;
    &lt;p&gt;&lt;label for="textarea"&gt;Textarea&lt;/label&gt;
      &lt;textarea id="textarea" rows="4" cols="48"&gt;&lt;/textarea&gt;&lt;/p&gt;
  &lt;/fieldset&gt;

  &lt;fieldset id="forms__action"&gt;
    &lt;legend&gt;Action buttons&lt;/legend&gt;
    &lt;p&gt;
      &lt;input type="submit" value="input type=submit"&gt;
      &lt;input type="button" value="input type=button"&gt;
      &lt;input type="reset" value="input type=reset"&gt;
      &lt;input type="submit" disabled value="input disabled"&gt;
    &lt;/p&gt;
    &lt;p&gt;
      &lt;button type="submit"&gt;button type=submit&lt;/button&gt;
      &lt;button type="button"&gt;button type=button&lt;/button&gt;
      &lt;button type="reset"&gt;button type=reset&lt;/button&gt;
      &lt;button type="button" disabled&gt;button disabled&lt;/button&gt;
    &lt;/p&gt;
  &lt;/fieldset&gt;
&lt;/form&gt;</pre>
  </div>
</div>

## Address

The `address` element provides contact information for its nearest `article` or `body` ancestor. Browsers typically render it in italics. Use it for author contact info, mailing addresses, or email addresses — not for arbitrary postal addresses elsewhere on the page.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <address>
      John Q. Public
      <br>123 Main Street
      <br>Anywhere, ST 12345
    </address>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;address&gt;
  John Q. Public
  &lt;br&gt;123 Main Street
  &lt;br&gt;Anywhere, ST 12345
&lt;/address&gt;</pre>
  </div>
</div>

## Blockquote

The `blockquote` element represents a section quoted from another source. It is a block-level element that browsers typically indent. For inline quotations, use `q` instead. The optional `cite` attribute can reference the source URL.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <blockquote>
      <p>
        "I love songs about horses, railroads, land, judgement day, family, hard times, whiskey, courtship, marriage, adultery, separation, murder, war, prison, rambling, damnation, home, salvation, death, pride, humor, piety, rebellion, patriotism, larceny, determination, tragedy, rowdiness, heartbreak, and love. And Mother. And God." ~ Johnny Cash
      </p>
    </blockquote>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;blockquote&gt;
  &lt;p&gt;
    "I love songs about horses, railroads, land,
    judgement day, family, hard times, whiskey…"
    ~ Johnny Cash
  &lt;/p&gt;
&lt;/blockquote&gt;</pre>
  </div>
</div>

## Preformatted Text

The `pre` element preserves whitespace and line breaks exactly as they appear in the source. It is rendered in a monospace font. Use it for ASCII art, code samples where indentation matters, or any text whose visual layout is meaningful.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <pre>
Start in column one.
         Then indent to column ten.
    Then back five spaces.
    </pre>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;pre&gt;
Start in column one.
         Then indent to column ten.
    Then back five spaces.
&lt;/pre&gt;</pre>
  </div>
</div>

## Figures

The `figure` element represents self-contained content — typically an image, diagram, or code snippet — that is referenced from the main flow but could be moved without affecting the document's meaning. `figcaption` provides an optional caption and is the only permitted caption element inside `figure`.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <figure>
      <img src="" alt="A photo placeholder" />
      <figcaption>A photo placeholder with a figcaption below it.</figcaption>
    </figure>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;figure&gt;
  &lt;img src="photo.jpg" alt="A photo placeholder" /&gt;
  &lt;figcaption&gt;A photo placeholder with a figcaption.&lt;/figcaption&gt;
&lt;/figure&gt;</pre>
  </div>
</div>

## Tables

Tables display two-dimensional data. Use `thead`, `tbody`, and `tfoot` to group rows semantically. `th` marks header cells (bold, centered by default); `td` marks data cells. `caption` provides an accessible title. `colgroup` and `col` let you apply styles to entire columns.

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <table border="1">
      <caption>Table with caption, colgroup, thead, tfoot, and tbody</caption>
      <colgroup span="2">
        <col>
        <col>
      </colgroup>
      <colgroup></colgroup>
      <thead>
        <tr>
          <th>Table Header 1</th>
          <th>Table Header 2</th>
          <th>Table Header 3</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td>Table Footer 1</td>
          <td>Table Footer 2</td>
          <td>Table Footer 3</td>
        </tr>
      </tfoot>
      <tbody>
        <tr>
          <td>TD 1.1</td>
          <td>TD 1.2</td>
          <td>TD 1.3</td>
        </tr>
        <tr>
          <td>TD 2.1</td>
          <td>TD 2.2</td>
          <td>TD 2.3</td>
        </tr>
        <tr>
          <td>TD 3.1</td>
          <td>TD 3.2</td>
          <td>TD 3.3</td>
        </tr>
      </tbody>
    </table>

    <p>A minimal table without border or colgroup:</p>
    <table>
      <caption>My Little Table</caption>
      <thead>
        <tr>
          <th>Header 1</th>
          <th>Header 2</th>
          <th>Header 3</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Cell 1</td>
          <td>Cell 2</td>
          <td>Cell 3</td>
        </tr>
        <tr>
          <td>Cell 4</td>
          <td>Cell 5</td>
          <td>Cell 6</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td>Footer 1</td>
          <td>Footer 2</td>
          <td>Footer 3</td>
        </tr>
      </tfoot>
    </table>
  </div>
  <div class="example-code">
    <p class="example-label">HTML</p>
    <pre>&lt;table border="1"&gt;
  &lt;caption&gt;Table caption&lt;/caption&gt;
  &lt;colgroup span="2"&gt;
    &lt;col&gt;&lt;col&gt;
  &lt;/colgroup&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th&gt;Table Header 1&lt;/th&gt;
      &lt;th&gt;Table Header 2&lt;/th&gt;
      &lt;th&gt;Table Header 3&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tfoot&gt;
    &lt;tr&gt;
      &lt;td&gt;Table Footer 1&lt;/td&gt;
      &lt;td&gt;Table Footer 2&lt;/td&gt;
      &lt;td&gt;Table Footer 3&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tfoot&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;td&gt;TD 1.1&lt;/td&gt;
      &lt;td&gt;TD 1.2&lt;/td&gt;
      &lt;td&gt;TD 1.3&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;</pre>
  </div>
</div>

## Callout Boxes

Callout boxes highlight important information at varying priority levels. These are not standard HTML elements — they are a Grav/Hypertext theme convention rendered via Markdown. The number of `!` characters controls the severity level (1 = note, 5 = critical).

<div class="example-container">
  <div class="example-content">
    <p class="example-label">Rendered</p>
    <p>! This is a level 1 callout box.</p>
    <p>!! This is a level 2 callout box.</p>
    <p>!!! This is a level 3 callout box.</p>
    <p>!!!! This is a level 4 callout box.</p>
    <p>!!!!! This is a level 5 callout box.</p>
  </div>
  <div class="example-code">
    <p class="example-label">Markdown</p>
    <pre>! This is a level 1 callout box.
!! This is a level 2 callout box.
!!! This is a level 3 callout box.
!!!! This is a level 4 callout box.
!!!!! This is a level 5 callout box.</pre>
  </div>
</div>