<p>
<b>BRLTTY</b> is developed within a <b>git</b> repository.
You can access the repository yourself
if you have the <b>git</b> client.
To download and/or learn how to use the <b>git</b> client,
go to [<?php write_link('http://git-scm.com/'); ?>].
</p>

<p>
The repository is at [<?php write_link('https://github.com/brltty/brltty'); ?>].
Here are a few simple things that you can do:
</p>

<ul>
   <li>
      To obtain your own local copy of the latest development source, do:
      <pre>git clone https://github.com/brltty/brltty.git</pre>
      If it doesn't work then try one of these alternate commands:
      <ul>
      <li><pre>git clone http://github.com/brltty/brltty.git</pre></li>
      <li><pre>git clone git://github.com/brltty/brltty.git</pre></li>
      </ul>
      This will create the directory <code>brltty</code> in your current working directory.
   </li>

   <li>
      If you'd prefer for your local copy to be placed somewhere else
      then specify the path (relative or absolute) to the desired directory
      as an additional command line argument.
      <pre>git clone https://github.com/brltty/brltty.git /path/to/directory</pre>
   </li>

   <li>
      To pick up the latest changes from that point on,
      go to the top-level directory of your local copy and do:
      <pre>git pull</pre>
   </li>

   <li>
      To display a list of all of the releases of BRLTTY which are in the repository, do:
      <pre>git tag</pre>
   </li>

   <li>
      To switch to a specific release, do:
      <pre>git checkout &lt;release-name&gt;</pre>
      For example:
      <pre>git checkout BRLTTY-5.0</pre>
   </li>

   <li>
      To switch to the latest development code, do:
      <pre>git checkout master</pre>
   </li>
</ul>

<p>
No derived files, e.g. the <code>configure</code> script, are stored within the repository.
If you would like to build BRLTTY, then,
after obtaining the source tree,
you must first create all of the initial derived files by running
the <code>autogen</code> script
(<code>autogen.sh</code> in older releases)
in the top-level directory.
</p>

<pre>
cd brltty
./autogen
</pre>

<p>
In order for <code>autogen</code> to run successfully, you need at least the following:
</p>

<dl>
   <dt>Autoconf 2.53</dt>
   <dd>
      If the default <b>autoconf</b> on your system is too old
      then assign whatever command will invoke a sufficiently new <code>autoconf</code>
      to the environment variable <code>BRLTTY_AUTOCONF</code>.
      <pre>
      export BRLTTY_AUTOCONF=autoconf-2.53
      </pre>
   </dd>

   <dt>TclX (Extended Tcl) 8.3</dt>
   <dd>
      The <b>Extended Tcl</b> shell is assumed to be in <code>/usr/bin/tcl</code>.
      If it's in a different place on your system
      then adjust the path in the first line of the <code>gendeps</code> script.
   </dd>
</dl>
