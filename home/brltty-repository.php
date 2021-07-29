<p>
<b>BRLTTY</b> is developed within a <b>git</b> repository.
You can access the repository yourself
if you have the <b>git</b> client.
To download and/or learn how to use the <b>git</b> client,
go to [<?php write_link('http://git-scm.com/'); ?>].
</p>

<p>
If your distribution provides it (most do) then you should get it from them:
</p>

<ul>
<li>For Fedora-based systems: <code>dnf install git</code></li>
<li>For Debian-based systems: <code>apt install git</code></li>
</ul>

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
      <li><code>git clone http://github.com/brltty/brltty.git</code></li>
      <li><code>git clone git://github.com/brltty/brltty.git</code></li>
      </ul>
      This will create the directory <code>brltty</code> in your current working directory.
   </li>

   <li>
      If you'd prefer for your local copy to be placed somewhere else
      then specify the path (relative or absolute) to the desired directory
      as an additional command line argument.
      <pre>git clone https://github.com/brltty/brltty.git /path/to/directory</pre>
      Note that this directory needn't already exist.
      The best is for it either to be empty or for it to not already exist.
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
      <pre>git checkout BRLTTY-6.3</pre>
   </li>

   <li>
      To switch to the latest development code, do:
      <pre>git checkout master</pre>
   </li>
</ul>

<p>
None of the derived files, e.g. the <code>configure</code> script, are stored within the repository.
If you'd like to build BRLTTY, then,
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

   <dt>tcl 8.5</dt>
   <dd>
      The <b>tcl</b> shell needs to be within your command search path (<code>$PATH</code>)
      and must be named <code>tclsh</code>.
      If it's in a different place on your system
      then adjust the path in the first line of the <code>gendeps</code> script as needed.
   </dd>
</dl>
