BRLTTY collects its options from a number of places.
In descending order of precedence, these places are:
<OL>
<LI>The command line.
<LI>The boot prompt (<CODE>brltty=</CODE>).
<LI>Environment variables (<CODE>BRLTTY_...</CODE>).
<LI>The configuration file (<CODE>/etc/brltty.conf</CODE>).
</OL>
<P>
Options should be specified in the configuration file if at all possible.
All the other methods are just to make BRLTTY as flexible as possible.
Do NOT use command line options within a system startup script
as they cannot be overridden in an emergency via the boot prompt.
<P>
BRLTTY (as of release <CODE>3.2</CODE>)
supports the guidelines for <A HREF="#install">installers</A> which are outlined within this document.
If the special file <CODE>/proc/cmdline</CODE> exists
(the <CODE>/proc</CODE> file system has already been mounted)
then the boot options
(the operands of the <CODE>brltty=</CODE> boot parameter)
are retrieved from there.
If not, then the value of the <CODE>brltty</CODE> environment variable is used.
This means that options can be specified within boot manager configuration files
(<CODE>lilo.conf</CODE>, <CODE>grub.conf</CODE>).
This feature is very useful for
rescue disks,
installation CDs,
system emergencies,
etc.
It should be avoided, however, for standard installations.
<P>
If you start BRLTTY manually from the command line
and aren't sure where certain options are being specified,
then, in this order, try:
<OL>
<LI><CODE>grep brltty /proc/cmdline</CODE>
<LI><CODE>echo $brltty</CODE>
<LI><CODE>env | grep "^BRLTTY_"</CODE>
<LI><CODE>grep -v "^ *#" /etc/brltty.conf</CODE>
</OL>
