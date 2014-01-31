Requesting that braille be activated during the install procedure,
which, of course, must be done at a time when BRLTTY has not yet been started,
should be easy so that a blind person can do it on his own with a low probability of error.
It should, therefore, only involve the typing of a minimal number of common characters.
A single boot parameter with a series of comma-separated operands is ideal.
<PRE>
<I>parameter</I>=<I>operand</I>,...
</PRE>
We recommend:
<PRE>
brltty=<I>driver</I>,<I>device</I>,<I>table</I>
</PRE>
This maps to the following command line invocation:
<PRE>
/bin/brltty -b<I>driver</I> -d<I>device</I> -t<I>table</I>
</PRE>
It also maps to the following set of <CODE>/etc/brltty.conf</CODE> directives:
<PRE>
braille-driver <I>driver</I>
braille-device <I>device</I>
text-table <I>table</I>
</PRE>
<P>
<DL>
<DT><I>driver</I><DD>
The driver for the type of braille display being used.
It may be specified as
either a two-letter driver identification code
(see the file <CODE>/etc/brltty.conf</CODE>)
or the word <CODE>auto</CODE>.
<UL>
<LI><CODE>brltty=al</CODE>
<LI><CODE>brltty=auto</CODE>
</UL>
The default is to attempt to auto-detect which type of braille display
is connected to the specified device.
Some types, especially older ones, cannot be auto-detected.
<DT><I>device</I><DD>
The device to which the braille display is connected.
It may be specified as
either an absolute path
or a relative path (anchored at <CODE>/dev</CODE>).
<UL>
<LI><CODE>brltty=,/dev/ttyS0</CODE>
<LI><CODE>brltty=,ttyS0</CODE>
</UL>
If <B>devfs</B> is being used:
<UL>
<LI><CODE>brltty=,/dev/tts/0</CODE>
<LI><CODE>brltty=,tts/0</CODE>
</UL>
The default device is the first serial port, i.e.
<CODE>/dev/ttyS0</CODE> (<CODE>/dev/tts/0</CODE> if using <B>devfs</B>).
<DT><I>table</I><DD>
The braille translation table for the language being used.
It may be specified as
either an absolute path
or a relative path (anchored at <CODE>/etc/brltty</CODE>).
The complete set of provided tables is
the set of files whose names match the pattern <CODE>text.*.tbl</CODE>
in the directory <CODE>/etc/brltty</CODE>.
The <CODE>.tbl</CODE> extension may be omitted.
If a simple file name is specified
then the <CODE>text.</CODE> prefix may be omitted.
<UL>
<LI><CODE>brltty=,,text.us.tbl</CODE>
<LI><CODE>brltty=,,it.tbl</CODE>
<LI><CODE>brltty=,,text.es</CODE>
<LI><CODE>brltty=,,da</CODE>
<LI><CODE>brltty=,,/etc/brltty/text.fr.tbl</CODE>
<LI><CODE>brltty=,,/etc/brltty/text.uk</CODE>
</UL>
The default language translation table is for the <CODE>NABCC</CODE>
(North American Braille Computer Code).
</DL>
<P>
All operands are optional.
Trailing commas may be omitted.
<DL>
<DT><CODE>brltty=pm,/dev/ttyS0,text.de.tbl</CODE><DD>
Papenmeier on first serial port with German table.
<DT><CODE>brltty=bl,/dev/tts/1,text.da.tbl</CODE><DD>
BrailleLite on second <B>devfs</B> serial port with Danish table.
<DT><CODE>brltty=al,ttyS0,es</CODE><DD>
Alva on first serial port with Spanish table.
<DT><CODE>brltty=eu,tts/0</CODE><DD>
EuroBraille on first <B>devfs</B> serial port with default table.
<DT><CODE>brltty=bn,,fr</CODE><DD>
BrailleNote on first serial port with French table.
</DL>
<P>
If the <CODE>brltty=</CODE> boot parameter is supplied then the installer should:
<UL>
<LI>Automatically start BRLTTY as soon as possible.
<LI>Automatically include BRLTTY in the set of packages selected for installation.
</UL>
<P>
Installing the BRLTTY package should automatically generate
a BRLTTY configuration file (<CODE>/etc/brltty.conf</CODE>)
which corresponds to the specified boot operands.
See the <A HREF="#bp2cf">bp2cf</A> script for one way to do this.
The mapping from boot operand to configuration file directive is as follows:
<DL>
<DT><I>driver</I>
<DD><CODE>braille-driver</CODE>
<DT><I>device</I>
<DD><CODE>braille-device</CODE>
<DT><I>table</I>
<DD><CODE>text-table</CODE>
</DL>
BRLTTY (as of release <CODE>3.2</CODE>)
looks for and interprets the <CODE>brltty=</CODE> boot parameter as described above.
It looks in <CODE>/proc/cmdline</CODE> if it exists
(the <CODE>/proc</CODE> file system has already been mounted),
and in the <CODE>brltty</CODE> environment variable if it doesn't.
The boot parameter is given a lower precedence than the command line
but a higher precedence than the configuration file.
<P>
BRLTTY relies on a number of <A HREF="#devices">devices</A>.
These must be defined within the installer's root file system
and support for them must be configured into the installer's kernel.
<P>
If the braille display is connected to a serial port
then the installer should not probe that port when autodetecting hardware.
This is because port probing byte sequences
can render a braille display useless by interfering with its protocol.
The simplest solution to this problem is to do no serial port probing at all.
A better, but more complex, solution would be
to analyze BRLTTY's boot parameter
and to exclude the specified device from any port probing which needs to be done.
Another alternative might be to not probe any device which is already in use.
<P>
Braille users usually use a feature known as cursor tracking.
This feature causes the braille display
(which typically only presents part of a single line from the screen)
to follow the cursor, i.e.
whenever the cursor moves the braille display automatically jumps to the cursor's new position.
Distributions should carefully review each of their installer screens
to ensure that the cursor (not just catchy highlighting)
is always being placed at an appropriate location.
Examples of good cursor placement include:
<UL>
<LI>The first new character in a text entry area.
<LI>The first character of the active selection in a menu.
</UL>
<P>
Since good braille support hasn't been developed yet for graphics mode,
there should be an easy way for the user to inform the installer
(ideally, the mere presence of the <CODE>brltty=</CODE> boot parameter)
that it should only use text mode.
Graphically-oriented screens based on <B>curses</B>, <B>slang</B>, etc.
are okay as long as the console itself remains in text mode.
It may mean, however, that <B>X</B> should not be configured.
It definitely means that <B>X</B> should not be used.
The installed system, also, should not be configured to come up in <B>X</B>
unless the user has specifically requested it.
