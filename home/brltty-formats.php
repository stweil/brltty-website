<B>BRLTTY</B> and <B>BrlAPI</B> can be downloaded in various archive formats.
These formats can be identified by their file extensions.
<P>
Source archives, which contain everything, include:
<DL>
<DT>.src.rpm<DD>
  The format used for building binary packages for platforms such as
  <B>Red Hat</B> and <B>Fedora</B>.
<DT>.tar.gz<DD>
  A <B>tar</B> archive compressed via <B>gzip</B>.
<DT>.tar.xz<DD>
  A <B>tar</B> archive compressed via <B>xz</B>.
</DL>
<P>
Binary formats which contain a full build include:
<DL>
<DT>.apk<DD>
  An Android package.
<DT>.exe<DD>
  A Windows installer.
<DT>.zip<DD>
  A full build for a Microsoft platform.
  If the file name begins with <CODE>brltty-win-</CODE>
  then it's for Windows.
  If the file name is <CODE>brltty</CODE><I>nn</I>
  (or, in some cases, <CODE>brltt</CODE><I>nnn</I>)
  then it's for DOS.
</DL>
<P>
There are two variants for each
Windows installer (.exe)
and Windows binary archive (.zip).
This is necessary because there are two ways to access USB devices on Windows.
<DL>
<DT>libusb<DD>
  The older, Win32-based interface.
  The version component of the file name ends with <CODE>-libusb</CODE>.
<DT>libusb-1.0<DD>
  The newer, WinUSB-based interface.
  The version component of the file name ends with <CODE>-libusb-1.0</CODE>.
</DL>
<P>
Binary builds for some distributions are split into several packages
in order to facilitate minimizing the dependency on external components.
Binary formats for these partial-build packages include:
<DL>
<DT>.i386.rpm<DD>
  A 32-bit Intel 386-compatible package for platforms such as
  <B>Red Hat</B> and <B>Fedora</B>.
<DT>.i686.rpm<DD>
  A 32-bit Intel 686-compatible package for platforms such as
  <B>Red Hat</B> and <B>Fedora</B>.
<DT>.noarch.rpm<DD>
  An architecture-independent package for platforms such as
  <B>Red Hat</B> and <B>Fedora</B>.
<DT>.x86_64.rpm<DD>
  A 64-bit Intel package for platforms such as
  <B>Red Hat</B> and <B>Fedora</B>.
</DL>
<P>
Partial build packages include:
<DL>
<DT>brlapi<DD>
  The <B>BrlAPI</B> client library.
<DT>brlapi-devel<DD>
  C headers and a run-time library that facilitate
  software development using <B>BrlAPI</B> client code.
<DT>brlapi-java<DD>
  Java bindings for <B>BrlAPI</B>.
<DT>brlapi-ocaml<DD>
  OCaml bindings for <B>BrlAPI</B>.
<DT>brlapi-python<DD>
  Python bindings for <B>BrlAPI</B>.
<DT>brlapi-tcl<DD>
  TCL bindings for <B>BrlAPI</B>.
<DT>brlapi-utils<DD>
  Commands that perform various <B>BrlAPI</B>-related functions.
<DT>brltty<DD>
  The core,
  braille and speech drivers that have no external dependencies,
  the Linux screen driver,
  and the BrlAPI server.
<DT>brltty-braille-brlapi<DD>
  The <B>BrlAPI</B> braille driver.
<DT>brltty-braille-xwindow<DD>
  The <B>XWindow</B> braille driver.
<DT>brltty-devel<DD>
  C headers and a run-time library that facilitate
  software development using <B>BRLTTY</B> code.
<DT>brltty-screen-atspi<DD>
  The <B>AtSpi</B> screen driver.
<DT>brltty-screen-atspi2<DD>
  The <B>AtSpi2</B> screen driver.
<DT>brltty-screen-screen<DD>
  The <B>screen</B> screen driver.
<DT>brltty-speech-espeak<DD>
  The <B>eSpeak</B> speech driver.
<DT>brltty-speech-festival<DD>
  The <B>Festival</B> speech driver.
<DT>brltty-speech-flite<DD>
  The <B>Festival Lite</B> speech driver.
<DT>brltty-speech-speechd<DD>
  The <B>Speech Dispatcher</B> speech driver.
<DT>brltty-systemd<DD>
  Units that allow <B>BRLTTY</B> processes to be managed by <B>Systemd</B>.
<DT>brltty-udev<DD>
  Rules that allow <B>BRLTTY</B> processes to be manged by <B>Udev</B>.
<DT>brltty-utils<DD>
  Commands that perform various <B>BRLTTY</B>-related functions.
</DL>
