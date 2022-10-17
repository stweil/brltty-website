<?php
   global $brltty_files;
   put_versions('BRLTTY', $brltty_files, BRLTTY_CURRENT_RELEASE);

   global $brlapi_files;
   put_versions('BrlAPI', $brlapi_files, BRLAPI_CURRENT_RELEASE);
?>

<p>
After downloading the package, install it as follows:
</p>

<dl>
   <dt><code>.tar.*</code></dt>
   <dd>
      This flavour of the package contains the source and documentation
      in a form which can be built on any system.
      To unpack the archive, do:
      <dl>
        <dt>bzip2</dt>
        <dd><pre>tar -xjf brltty-<i>release</i>.tar.bz2</pre></dd>

        <dt>gzip</dt>
        <dd><pre>tar -xzf brltty-<i>release</i>.tar.gz</pre></dd>

        <dt>xz</dt>
        <dd><pre>tar -xJf brltty-<i>release</i>.tar.xz</pre></dd>
      </dl>
      To configure, compile, and install it, see
      <?php write_link("#build", "Building BRLTTY"); echo(".\n"); ?>
   </dd>

   <dt><code>.<i>arch</i>.rpm</code></dt>
   <dd>
      This flavour of the package contains the compiled binaries and documentation
      in RedHat Package Manager format.
      To install or upgrade it, do:
      <pre>
      rpm -Uvh brltty-<i>release</i>-<i>version</i>.<i>arch</i>.rpm
      </pre>
   </dd>

   <dt><code>.src.rpm</code></dt>
   <dd>
      This flavour of the package contains the source and documentation
      in RedHat Package Manager format.
      To build it, do:
      <pre>
      rpm -ivh brltty-<i>release</i>-<i>version</i>.src.rpm
      rpm -bi brltty-<i>release</i>-<i>version</i>
      </pre>
   </dd>
</dl>

<p>
After installing the package,
be sure to read its <code>README</code> file.
</p>

<p>
If you try <b>BRLTTY</b>, do
<a href="contact.html">leave us a note</a>!
We would like to know who the users of <b>BRLTTY</b> are.
</p>
