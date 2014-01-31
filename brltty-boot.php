Since BRLTTY runs as a background process,
it can only be started after the kernel has been loaded.
This means that the braille display isn't yet working
during the boot manager (<B>lilo</B>, <B>grub</B>) prompt.
A blind user, therefore, would be helped a great deal
if the boot manager were configured to sound a console beep
when it issues its first prompt.
