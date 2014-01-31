BRLTTY should be started as early as possible
so that a blind user can handle system startup problems
without requiring sighted assistance.
Most distributions have a special initialization script which is run
before the general package start sequence is performed.
This script would be a good place wherein to start BRLTTY.
Code like the following should be inserted into it:
<PRE>
# If a braille display is being used then start it now.
[ -x /bin/brltty ] && /bin/brltty
</PRE>
Note that BRLTTY, by default, puts itself into the background
so there's no need to explicitly do this in the script.
<P>
<A NAME="fsck"></A>
The most common problems which occur during system startup tend to be
those related to the lack of file system integrity.
BRLTTY should be started, therefore, before the <B>fsck</B>s are done.
<P>
BRLTTY relies on a number of <A HREF="#devices">devices</A>.
Distributions which use <B>devfs</B> should not start BRLTTY
until after <B>devfs</B> has been activated.
<P>
Distributions which fork the initial system startup script,
e.g. via <B>initlog</B>,
should not start BRLTTY until after this fork has been done.
<P>
Braille displays can become confused by port probing byte sequences.
System hardware detection/configuration packages like <B>kudzu</B>
are known to cause problems in this area.
One solution is to start BRLTTY only after all such port probing has been completed.
This approach is usually inadequate, though, because it tends to impair
the ability of a blind person to handle early system startup problems
(see <A HREF="#fsck">fsck</A> paragraph above).
Since most braille displays use a serial port connection,
a better approach may be to disable serial port probing.
For <B>kudzu</B>, this would mean using its <CODE>--safe</CODE> option.
<P>
If BRLTTY can safely be started before any other system initialization is performed,
then it can be started by inserting the following lines into <CODE>/etc/inittab</CODE>.
<PRE>
# Start the braille display.
brl::sysinit:/bin/brltty
</PRE>
These lines should be placed before any other <CODE>sysinit</CODE> lines.
<P>
BRLTTY (as of release <CODE>3.1</CODE>)
provides a mechanism whereby it can be started
as soon as the kernel is up
and before any other system activity takes place.
The trick is for the kernel to start <B>brltty</B> instead of <B>init</B>,
and for <B>brltty</B> to then start <B>init</B>.
To set this up, do:
<OL>
<LI>Move the real <B>init</B> to a new location.
<LI>Configure BRLTTY to know <B>init</B>'s new location.
<LI>Build BRLTTY and install it in <B>init</B>'s original location.
</OL>
The following command sequence illustrates how to do this:
<PRE>
cd brltty-<I>release</I>
./configure --with-init-path=/sbin/real_init
make
mv /sbin/init /sbin/real_init
cp Programs/brltty /sbin/init
</PRE>
