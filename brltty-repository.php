BRLTTY is developed within a <B>subversion</B> repository.
You can access the repository yourself
if you have the <B>subversion</B> client.
To download and/or learn how to use the <B>subversion</B> client,
go to [<?php write_link('http://subversion.tigris.org/'); ?>].
<P>
The repository is at [<?php write_link('svn://mielke.cc/'); ?>].
Here are a few simple things which you can do:
<UL>
<LI>
To check out your own copy of the latest development source, do:
<KBD><PRE>
svn checkout svn://mielke.cc/main/brltty
</PRE></KBD>
This will create the directory <CODE>brltty</CODE> in your current working directory.
To pick up the latest changes from that point on,
go to that directory and do:
<KBD><PRE>
svn update
</PRE></KBD>
</UL>
<P>
No derived files, e.g. the <CODE>configure</CODE> script, are stored within the repository.
If you would like to build BRLTTY, then,
after checking out the source tree,
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
