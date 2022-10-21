<p>
The following instructions assume that you've changed your current working directory to the top level of <b>BRLTTY</b>'s source tree.
</p>

<p>
The following basic steps, in order, prepare, configure, build, and install <b>BRLTTY</b>.
Each of them will be described in detail below.
</p>

<ol>
<li><code>./autogen</code></li>
<li><code>Tools/reqpkgs -i</code></li>
<li><code>./configure -q</code></li>
<li><code>make -s</code></li>
<li><code>make -s install</code></li>
</ol>

<p>
The <code>autogen</code> script needs at least the following:
</p>

<dl>
  <dt>autoconf 2.65</dt>
  <dd>
    If the default <b>Autoconf</b> on your system is too old
    then assign whatever command will invoke a sufficiently new <b>Autoconf</b>
    to the environment variable <code>BRLTTY_AUTOCONF</code>.
    <pre>export BRLTTY_AUTOCONF=path-to-autoconf</pre>
  </dd>

  <dt>tcl 8.6</dt>
  <dd>
    The <b>tCL</b> shell needs to be within your command search path (<code>$PATH</code>)
    and must be named <code>tclsh</code>.
    If it's in a different place on your system
    then adjust the path in the first line of the <code>gendeps</code> script as needed.
  </dd>
</dl>

<p>
The <code>configure</code> script generates an enormous amount of output.
We recommend, therefore, that you use its <code>--quiet</code> (<code>-q</code>) option so that you won't miss warnings and errors.
If you need to see any of the details then look in <code>config.log</code>.
</p>

<p>
The <code>make</code> command generates an enormous amount of output.
We recommend, therefore, that you use its <code>--silent</code> (<code>-s</code>) option so that you won't miss warnings and errors.
You can get the same effect by setting this environment variable:
<pre>export MAKEFLAGS=s</pre>
</p>

<dl>
  <dt>./autogen</dt>
  <dd>
    <p>
    If you're starting from a checked out branch from
    <?php write_link("#repository", "the development repository"); echo(", "); ?>
    you must first generate the initial set of derived files.
    To do this, run:
    <pre>./autogen</pre>
    </p>

    <ul>
    <li>This step has already been done if you're starting with a downloaded archive.</li>
    <li>Prior to release <code>3.8</code>, this script was named <code>autogen.sh</code>.</li>
    </ul>
  </dd>

  <dt>Tools/reqpkgs -i</dt>
  <dd>
  <p>
  This optional step installs all of the additional packages (that we know about) that are required for a successful build of <b>BRLTTY</b>.
  It needs to be run as root (or via <code>sudo</code>) on most platforms.
  The command's name - <code>reqpkgs</code> means <q>required packages</q>,
  and its <code>-i</code> option means <q>install the missing packages</q>.
  Alternatively, you can:
  </p>

  <ul>
  <li><p>Use the <code>-l</code> option to list the missing packages.</p></li>
  <li><p>Not specify any option to just see how many packages are missing.</p></li>
  </ul>
  </dd>

  <dt>./configure -q</dt>
  <dd>
    <p>
    This step is only supported as of release <code>3.1</code>.
    For earlier releases, carefully edit the top-level <code>Makefile</code>.
    </p>

    <p>
    A number of platform-specific wrappers to the <code>configure</code> script are provided.
    As of the time this is being written, they are:
    </p>

    <ul>
    <li>cfg-android</li>
    <li>cfg-darwin</li>
    <li>cfg-dos</li>
    <li>cfg-grub</li>
    <li>cfg-iris</li>
    <li>cfg-windows</li>
    </ul>

    <p>
    Each of the wrappers passes the best set of options to the <code>configure</code> script for its corresponding platform.
    If one is provided for your platform, therefore, we recommend that you use it to configure <b>BRLTTY</b>.
    All of the options given to any of the wrappers are passed through, unmodified, to the <code>configure</code> script so you can still do additional customization.
    </p>
  </dd>

  <dt>make -s</dt>
  <dd>
    <p>
    The following components are built:
    </p>

    <ul>
    <li><p>The <code>brltty<//code> binary.</p></li>
    <li><p>The braille, speech, and screen drivers.</p></li>
    <li><p>The <code>brltty-*<//code> binaries.</p></li>
    <li><p>The <code>xbrlapi</code> binary.</p></li>
    <li><p>The <b>BrlAPI</b> client library and configured bindings.</p></li>
    </ul>
  </dd>

  <dt>make -s install</dt>
  <dd>
    <p>
    The following components are installed:
    </p>

    <ul>
    <li><p>The <code>brltty<//code> binary, configuration file, man page, and headers.</p></li>
    <li><p>The braille, speech, and screen drivers.</p></li>
    <li><p>The text, contraction, and attributes tables.</p></li>
    <li><p>The braille device (input) and keyboard key tables.</p></li>
    <li><p>The <code>brltty-*<//code> commands.</p></li>
    <li><p>The message catalogs.</p></li>
    <li><p>The package configuration file.</p></li>
    <li><p>The <code>xbrlapi</code> binary and man page.</p></li>
    <li><p>The <b>X11</b> and <b>gdm</b> startup scripts.</p></li>
    <li><p>The <b>BrlAPI</b> client library, configured bindings, headers, man pages, and access key.</p></li>
    </ul>

    <p>
    These additional make targets are provided:
    </p>

    <table>
      <caption>Additional Install Targets</caption>

      <tr>
      <td>install-appstream</td>
      <td>The AppStream metadata.</td>
      </tr>

      <tr>
      <td>install-messages</td>
      <td>The message catalogs.</td>
      </tr>

      <tr>
      <td>install-polkit</td>
      <td>The Polkit rules.</td>
      </tr>

      <tr>
      <td>install-systemd</td>
      <td>The Systemd units.</td>
      </tr>

      <tr>
      <td>install-udev</td>
      <td>The Udev rules.</td>
      </tr>

      <tr>
      <td>install-extras</td>
      <td>All of the above.</td>
      </tr>
    </table>
  </dd>
</dl>

