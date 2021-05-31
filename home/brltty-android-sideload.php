<p>
BRLTTY can be sideloaded.
This method is, in fact, how it had to be done before BRLTTY was on Google Play.
It's still supported although it's no longer what we recommend.
The differences between the two methods include:
</p>

<ul>
   <li>
   The Google Play version supports all of the mainstream architectures
   (arm 32-bit, arm 64-bit, x86 32-bit, x86 64-bit)
   whereas the sideload version only natively supports the arm 32-bit architecture.
   It does work, albeit less efficiently, on the arm 64-bit architecture
   because Android contains special support for this.
   </li>

   <li>
   The Google Play version is a signed, release variant of the app
   whereas the sideload version is an unsigned, debug variant of the app.
   To install it, Android forces you to acknowledge that you might be using an untrusted source.
   </li>

   <li>
   There's a delay between when we publish a new release on Google Play
   whereas we can deploy a new sideload version immediately.
   </li>
</ul>

<p>
The relevant files are:
</p>

<dl>
   <?php
      list_android_file(
         "brltty-latest.apk",
         "The latest version of BRLTTY for Android."
      );

      list_android_file(
         "brltty-on-android.html",
         "The latest documentation for BRLTTY on Android.",
         "Using BRLTTY on Android"
      );
   ?>
</dl>
