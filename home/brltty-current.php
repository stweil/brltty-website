<?php
   $brltty_current = '5.2';
   $brlapi_current = '0.6.3';

   global $brltty_files;
   put_versions('BRLTTY', $brltty_files, $brltty_current);

   global $brlapi_files;
   put_versions('BrlAPI', $brlapi_files, $brlapi_current);
?>
<B>BRLTTY</B> can also be downloaded from:
<DL>
<?php
   function put_alternate ($name, $home, $directory, $files) {
      echo("<DT><A HREF=\"$home\">$name</A><DD>\n");
      echo("<A HREF=\"$directory\">$directory</A>\n");
      echo("<UL>\n");
      reset($files);
      while (list($key, $file) = each($files)) {
         echo("<LI><A HREF=\"$directory$file\">$file</A>\n");
      }
      echo("</UL>\n");
   }
   put_alternate(
      "The Public's Library", "http://www.ibiblio.org",
      "ftp://ibiblio.org/pub/Linux/system/access/", array(
         "brltty-3.0.tar.gz",
         "brltty-3.0-2.i386.rpm",
         "brltty-3.0-2.src.rpm"
      )
   );
   put_alternate(
      "The Blinux Site", "http://www.leb.net/blinux/",
      "ftp://leb.net/pub/blinux/brltty/", array(
         "brltty-3.0.tar.gz",
         "brltty-3.0-2.i386.rpm",
         "brltty-3.0-2.src.rpm"
      )
   );
?>
</DL>
<P>
After downloading the package, install it as follows:
<DL>
<DT><CODE>.tar.gz</CODE><DD>
This flavour of the package contains the source and documentation
in a form which can be built on any system.
To unpack, configure, compile, and install it, do:
<KBD><PRE>
tar -xzf brltty-<I>release</I>.tar.gz
cd brltty-<I>release</I>
./configure
make
make install
</PRE></KBD>
The <CODE>./configure</CODE> script is only provided with version 3.1 and beyond;
for earlier releases, carefully edit the top-level <CODE>Makefile</CODE>.
<DT><CODE>.<I>arch</I>.rpm</CODE><DD>
This flavour of the package contains the compiled binaries and documentation
in RedHat Package Manager format.
To install or upgrade it, do:
<KBD><PRE>
rpm -Uvh brltty-<I>release</I>-<I>version</I>.<I>arch</I>.rpm
</PRE></KBD>
<DT><CODE>.src.rpm</CODE><DD>
This flavour of the package contains the source and documentation
in RedHat Package Manager format.
To build it, do:
<KBD><PRE>
rpm -ivh brltty-<I>release</I>-<I>version</I>.src.rpm
rpm -bi brltty-<I>release</I>-<I>version</I>
</PRE></KBD>
</DL>
After installing the package,
be sure to read its <CODE>README</CODE> file.
<P>
If you try <B>BRLTTY</B>, do
<A HREF="contact.html">leave us a note</A>!
We would like to know who the users of <B>BRLTTY</B> are.
