This page shows lots of example HTML tags to give you an idea of the look and feel of Hypertext.

===

# Example HTML Content

<h1>Heading One</h1>
<p>
  This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap.
</p>
<h2>Heading Two</h2>
<p>
  This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap.
</p>
<h3>Heading Three</h3>
<p>
  This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap.
</p>
<h4>Heading Four</h4>
<p>
  This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap.
</p>
<h5>Heading Five</h5>
<p>
  This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap.
</p>
<h6>Heading Six</h6>
<p>
  This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap. If not, we can repeat it over and over again until it does wrap. This is a paragraph of text that should be long enough to wrap.
</p>
<hr>
<p>
  <em>This is italic text, made with em.</em> <i>This is italic text as well, made with i.</i>
</p>
<p>
  <strong>This is bold text, made with strong.</strong> <b>This is bold text as well, made with b.</b>
</p>
<p>
  <u>This is underlined text, made with u.</u> <ins>This is inserted text, made with ins.</ins>
</p>
<p>
  <strike>This is deleted (strikethrough) text, made with strike.</strike> <s>This is also strikethrough text, but made with s.</s> <del>This is deleted text, made with del.</del>
</p>
<p>
  <code>This is computer code, made with code.</code> <tt>This is teletype text, made with tt.</tt>
</p>
<p>
  <kbd>This is text the user is supposed to enter in, or keyboard, made with kbd.</kbd> <var>This is a variable, made with var.</var> <samp>This is sample program output, made with samp.</samp>
</p>
<p>
  <small>This is small text, made with small.</small> <big>This is big text, made with big.</big>
</p>
<p>
  <cite>This is a citation, made with cite.</cite> This is a <q>short quotation</q> in the middle of a sentence, made with q.
</p>
<p>
  This sentence ends with a <sup>superscript</sup>. This sentence ends with a <sub>subscript</sub>.
</p>
<p>
  This is an abbreviation, made with abbr: <abbr>WWW</abbr>. This is an acronym, made with acronym: <acronym>NATO</acronym>. This is a term that needs a definition, made with dfn: <dfn>Yog-Sothoth</dfn>.
</p>
<p>This is a nav element with a ul in it.</p>
<nav>
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact Us</a></li>
    <li><a href="#">Orders</a></li>
  <ul>
</nav>
<p>
  This is an unordered list:
</p>
<ul>
  <li>Koyaanisqatsi</li>
  <li>Powaqqatsi</li>
  <li>Naqoyqatsi</li>
</ul>
<p>
  This is an ordered list:
</p>
<ol>
  <li>Larry</li>
  <li>Moe</li>
  <li>Curly</li>
</ol>
<p>
  This is a definition list:
</p>
<dl>
  <dt>Defintion Term</dt>
  <dd>Definition data defining the previous term</dd>
  <dt>Another Definition Term</dt>
  <dd>Definition data defining the previous term</dd>
</dl>
<p>
  This is a form:
</p>
<form _lpchecked="1">
    <fieldset id="forms__input">
      <legend>Input fields</legend>
      <p><label for="input__text">Text Input</label> <input id="input__text" placeholder="Text Input" type="text"></p>
      <p><label for="input__password">Password</label> <input id="input__password" placeholder="Type your Password" type="password"></p>
      <p><label for="input__webaddress">Web Address</label> <input id="input__webaddress" placeholder="http://yoursite.com" type="url"></p>
      <p><label for="input__emailaddress">Email Address</label> <input id="input__emailaddress" placeholder="name@email.com" type="email"></p>
      <p><label for="input__phone">Phone Number</label> <input id="input__phone" placeholder="(999) 999-9999" type="tel"></p>
      <p><label for="input__search">Search</label> <input id="input__search" placeholder="Enter Search Term" type="search"></p>
      <p><label for="input__text2">Number Input</label> <input id="input__text2" placeholder="Enter a Number" type="number"></p>
      <p><label for="input__text3">Error</label> <input id="input__text3" placeholder="Text Input" type="text"></p>
      <p><label for="input__text4">Valid</label> <input id="input__text4" placeholder="Text Input" type="text"></p>
    </fieldset>
    <fieldset id="forms__select">
      <legend>Select menus</legend>
      <p><label for="select">Select</label> <select id="select">
          <optgroup label="Option Group">
            <option>
              Option One
            </option>
            <option>
              Option Two
            </option>
            <option>
              Option Three
            </option>
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
        <textarea cols="48" id="textarea" placeholder="Enter your message here" rows="8"></textarea></p>
    </fieldset>
    <fieldset id="forms__html5">
      <fieldset id="forms__action">
        <legend>Action buttons</legend>
        <p><input type="submit" value="input type=submit"> <input type="button" value="input type=button"> <input type="reset" value="input type=reset"> <input disabled="" type="submit" value="input disabled"></p>
        <p><button type="submit">&lt;button type=submit&gt;</button> <button type="button">&lt;button type=button&gt;</button> <button type="reset">&lt;button type=reset&gt;</button> <button disabled="" type="button">&lt;button disabled&gt;</button></p>
      </fieldset>
    </fieldset>
  </form>
<p>
  This is an address with breaks:
</p>
<address>
  John Q. Public
  <br>123 Main Street
  <br>Anywhere, ST 12345
</address>
<p>
  This is a long quotation inside a blockquote:
</p>
<blockquote>
  <p>
    “I love songs about horses, railroads, land, judgement day, family, hard times, whiskey, courtship, marriage, adultery, separation, murder, war, prison, rambling, damnation, home, salvation, death, pride, humor, piety, rebellion, patriotism, larceny, determination, tragedy, rowdiness, heartbreak, and love. And Mother. And God.” ~ Johnny Cash
  </p>
</blockquote>
<p>
  This is pre-formatted:
</p>
<pre>
Start in column one.
         Then indent to column ten.
    Then back five spaces.
</pre>
<p>
  This is some code:
</p>
```javascript
// This is some code!
var v = 256;
var m = function() { alert('How do you like the service?'); }
```
<p>
  This is a figure with image (no CSS) and caption:
</p>
<figure>
    <img src="data:image/png;base64,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" />
    <figcaption>A photo placeholder text</figcaption>
</figure>
<p>
  Here are 3 more test images with no markup (just <code>img</code> tags).
</p>
<img src="data:image/png;base64,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" />
<img src="data:image/png;base64,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" /><br/>
<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPoAAAD6BAMAAAB6wkcOAAAAG1BMVEXMzMyWlpacnJyqqqrFxcWxsbGjo6O3t7e+vr6He3KoAAAACXBIWXMAAA7EAAAOxAGVKw4bAAADgUlEQVR4nO2bzW/bRhDFHyl+HbmSLPpI2k6jo5TWaI5kbSRXSoecycKAfaTUwupRcorUf3Znl7RJxwbiCBQCBO8HaJfkk/ZxdmeHOkgAIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgj5OQje/VIBmVJqDLjJmxdlR2SVAsth3q/7SqkjYFe7l0oVL8lB7e4pNenV3FHvP8u4q983m7/hqn9WRy/J/miz2aRYRP+pXoN3JZj5DItKn2QRfD3Bz2Q3qm+lwmrcp7t3LNMeY7HVJ6tCJl/fx06ulkUru8da9uVWvKhPd1tisULMU30yl2ldzLTpRJY6beWBiXggq+KO+nT3YjN8Ce1VbiXSAjrLKm/Ukb3QQT0RQb9pJ6xinKzVDZDILWSxvjSPd+OObL9NJlszEc6wZ3MnyaF3VN5xz6Iy78iW0hvvIO53E8nmm6AcQ8HMs+CqYUdGNtl+UamRVL/mvjqDcy6rOurE7iRRR8aFTEQ5O0Ts8yaLJZ9ad5Tjr2RJxwO4e6qqDxzV5rwk/egrGVl4gJyfT5sDiepxv8uGb2reoyyT0v9+d4baRVcwqWSPtU4Kqil1jWwuror+a11dwfW49lGnzif57riVzW0l+QHqfHR/f7+VHfcxidtnnNyDN2ll2XH/riXden/G2brOhPoxrrbt813mITDp1si+tMfo//lu1cMHfw5/Q/vdZjHWxbaV8SU5TXGA7zaEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBBCnmI1r5/XXZkfsL/CPZQz/bN2DAE7hPlzDS6Sa+CDuoIVA8n3u4fOr693N+1ki9vG3XmTfpbmcplaN/DLPdzxB96dwk59OXBPZrCWoe4GJwvtvjyFV4nScY8KXDfug7xu3Jl1C2+1l7t79SEfVBn+wqfLc1hXpvt0qUOxRApinHfdw2kQN+52WjdObNnbuz2SRGbeTp04mC2r9ziTKK3UdGfItLtIuJYXzN+5avdbr2rcrYcmtPzieg93yToTUjwtYu2gB9Nd+LDuIe4G1ZPY7TWex4638T6x64/rAIubQgI2FrrrxG4v8cTdPcLzdcci389drzuW1TrHbXqhLXTXrjv86Km7OTFtJ+exV3HQo0jOY5dmKfxkqsfQXZvz8OMX3OvVuVAP+30/91fgVd9+z+FY/0hza/rt9xBCfhT/A2Hwit6kVCNWAAAAAElFTkSuQmCC" /><br/>
<p>
  Here's a table with a border, a caption, colgroups, cols, thead, tfoot, & tbody:
</p>
<table border="1">
  <caption>This is a table caption, made with caption</caption>
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

<p>Here's a more modest table.</p>
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
      <tr>
        <td>Cell 7</td>
        <td>Cell 8</td>
        <td>Cell 9</td>
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

! This is a level 1 callout box.

!! This is a level 2 callout box.

!!! This is a level 3 callout box.

!!!! This is a level 4 callout box.

!!!!! This is a level 5 callout box.