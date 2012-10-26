ScribbishWP Theme
=================

[Packagethief][QP] (aka Jeffrey Allan Hardy) has created an awesome theme for
[Typo][] called [Scribbish][].  As a WordPress user, I was extremely jealous
because I have been unable to find a theme that comes anywhere close to the
same simplicity and elegance.  So with Jeff's permission, I created a WordPress
version of the Scribbish theme which I've dubbed ScribbishWP.

ScribbishWP attempts to format posts according to the [hAtom microformat specification][hAtom].
Note that all of your post content must be valid XHTML to produce hAtom-compliant
output.

ScribbishWP has only been tested on WordPress 2.2.  Your mileage may vary on
other versions.  I've also only tested it with the blog options that I use so
there may be some areas that will not display properly with other options.
In particular, the popup comment entry window has not been themed yet.

There are several style variations available in ScribbishWP:

* Original-width or wide-width layout
* Scribbish 2.0 or Scribbish 3.0 header styles
* Right or left sidebar position

The defaults are original-width layout, right sidebar, and Scribbish 2.0 header
styles because that is what I use on this blog.  You can change the defaults by
editing the `style.css` file.  Just look for the commented sections.

Installation
------------

Just unpack the archive into your WordPress `wp-content/themes` directory.  You
can then use the WordPress Administration interface to activate the ScribbishWP
theme.

Feedback
--------

ScribbishWP is a work in progress.  If you discover any bugs, display problems,
or browser compatibility issues, please let me know.  You can reach me at
kenny [dot] pitt [at] gmail [dot] com.

Version History
---------------

ScribbishWP uses a two-part version number in the form `x.x-y.y`.  The `x.x`
part represents the version of ScribbishWP itself, and the `y.y` part
represents the version of the original Scribbish theme on which it is based.

#### v1.0-3.0

* Support for WordPress 2.x configurable sidebar widgets.  A new "Syndication"
  widget and a modified version of the "Meta" widget are included to allow you
  to configure your sidebar to match the default ScribbishWP sidebar.
* Improved [hAtom][] support based on [Scribbish 3.0][Scribbish30].
* Support for displaying the comment count after the post title as seen on
  [Quoted-Printable][QP].
* Dropped support for WordPress 1.5.

#### v0.1-2.0

* Initial release based on [Scribbish 2.0][Scribbish20].

[QP]:          http://quotedprintable.com/
[Typo]:        http://typosphere.org/
[hAtom]:       http://microformats.org/wiki/hatom
[Scribbish]:   http://quotedprintable.com/pages/scribbish
[Scribbish20]: http://quotedprintable.com/assets/2007/2/17/scribbish-2.0.tar.gz
[Scribbish30]: http://quotedprintable.com/assets/2007/2/17/scribbish-3.0.tar.gz
