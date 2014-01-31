BRLTTY relies on the following devices:
<CENTER>
<TABLE>
<TR>
<TH ALIGN=LEFT>Reason</TH>
<TH ALIGN=LEFT>Name</TH>
<TH ALIGN=LEFT>DevFS</TH>
<TH ALIGN=LEFT>Type</TH>
<TH ALIGN=RIGHT>Major</TH>
<TH ALIGN=RIGHT>Minor</TH>
</TR>
<TR>
<TD VALIGN=TOP ALIGN=LEFT>Screen Content Inspection</TD>
<TD VALIGN=TOP ALIGN=LEFT>vcsa</TD>
<TD VALIGN=TOP ALIGN=LEFT>vcc/a</TD>
<TD VALIGN=TOP ALIGN=LEFT>Char</TD>
<TD VALIGN=TOP ALIGN=RIGHT>7</TD>
<TD VALIGN=TOP ALIGN=RIGHT>128</TD>
</TR>
<TR>
<TD VALIGN=TOP ALIGN=LEFT>General Console Operations</TD>
<TD VALIGN=TOP ALIGN=LEFT>console</TD>
<TD VALIGN=TOP ALIGN=LEFT>console</TD>
<TD VALIGN=TOP ALIGN=LEFT>Char</TD>
<TD VALIGN=TOP ALIGN=RIGHT>5</TD>
<TD VALIGN=TOP ALIGN=RIGHT>1</TD>
</TR>
<TR>
<TD VALIGN=TOP ALIGN=LEFT>Virtual Console Operations</TD>
<TD VALIGN=TOP ALIGN=LEFT>tty0</TD>
<TD VALIGN=TOP ALIGN=LEFT>vc/0</TD>
<TD VALIGN=TOP ALIGN=LEFT>Char</TD>
<TD VALIGN=TOP ALIGN=RIGHT>4</TD>
<TD VALIGN=TOP ALIGN=RIGHT>0</TD>
</TR>
<TR>
<TD VALIGN=TOP ALIGN=LEFT>Braille Display Operations</TD>
<TD VALIGN=TOP ALIGN=LEFT>ttyS0</TD>
<TD VALIGN=TOP ALIGN=LEFT>tts/0</TD>
<TD VALIGN=TOP ALIGN=LEFT>Char</TD>
<TD VALIGN=TOP ALIGN=RIGHT>4</TD>
<TD VALIGN=TOP ALIGN=RIGHT>64</TD>
</TR>
</TABLE>
</CENTER>
The last device (Braille Display Operations)
should really be the set of possible devices
to which the braille display might be connected.
It is shown here as being the first serial port
since most braille displays do use a serial connection.
Some, however, can use a parallel and/or USB connection.
