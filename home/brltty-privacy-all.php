<p>
BRLTTY is a screen reader for braille users.
It doesn't introduce any content of its own - it just renders, in braille, what's on the user's screen.
The only exception to this is that, on request, it presents
internally-generated virtual braille screens for:
</p>

<ul>
<li>Help for the keys on the braille device currently being used.</li>
<li>Changing BRLTTY's own settings.</li>
</ul>

<p>
If the braille device has a keyboard then it can be used for typing.
this necessarily means that BRLTTY is transiently aware of any information that's being typed, including sensitive information such as passwords.
This information is only retained long enough for,
and exclusively for the purpose of,
forwarindg it through to the host.
</p>

