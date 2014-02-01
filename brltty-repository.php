BRLTTY is developed within a <B>git</B> repository.
You can access the repository yourself
if you have the <B>git</B> client.
To download and/or learn how to use the <B>git</B> client,
go to [<?php write_link('http://git-scm.com/'); ?>].
<P>
The repository is at [<?php write_link('https://github.com/brltty/brltty'); ?>].
Here are a few simple things which you can do:
<UL>
<LI>
To obtain your own local copy of the latest development source, do:
<KBD><PRE>
git clone https://github.com/brltty/brltty.git
</PRE></KBD>
This will create the directory <CODE>brltty</CODE> in your current working directory.
<LI>
If you'd prefer for your local copy to be placed somewhere else
then specify the path (relative or absolute) to the desired directory
as an additional command line argument.
<KBD><PRE>
git clone https://github.com/brltty/brltty.git /path/to/directory
</PRE></KBD>
<LI>
To pick up the latest changes from that point on,
go to the top-level directory of your local copy and do:
<KBD><PRE>
git pull
</PRE></KBD>
<LI>
To display a list of all of the releases of BRLTTY which are in the repository, do:
<KBD><PRE>
git tag
</PRE></KBD>
<LI>
To switch to a specific release, do:
<KBD><PRE>
git checkout &lt;release-name&gt;
</PRE></KBD>
For example:
<KBD><PRE>
git checkout BRLTTY-5.0
</PRE></KBD>
<LI>
To switch to the latest development code, do:
<KBD><PRE>
git checkout master
</PRE></KBD>
</UL>
<P>
No derived files, e.g. the <CODE>configure</CODE> script, are stored within the repository.
If you would like to build BRLTTY, then,
after obtaining the source tree,
you must first create all of the initial derived files by running
the <CODE>autogen</CODE> script
(<CODE>autogen.sh</CODE> in older releases)
in the top-level directory.
<KBD><PRE>
cd brltty
./autogen
</PRE></KBD>
In order for <CODE>autogen</CODE> to run successfully, you need at least the following:
<DL>
<DT>Autoconf 2.53<DD>
If the default <B>autoconf</B> on your system is too old
then assign whatever command will invoke a sufficiently new <CODE>autoconf</CODE>
to the environment variable <CODE>BRLTTY_AUTOCONF</CODE>.
<KBD><PRE>
export BRLTTY_AUTOCONF=autoconf-2.53
</PRE></KBD>
<DT>TclX (Extended Tcl) 8.3<DD>
The <B>Extended Tcl</B> shell is assumed to be in <CODE>/usr/bin/tcl</CODE>.
If it's in a different place on your system
then adjust the path in the first line of the <CODE>gendeps</CODE> script.
</DL>
