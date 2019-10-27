<?php
   function list_android_file($name, $description, $title=null) {
      global $archive_directory;
      $path = $archive_directory . "/Android/" . $name;
      $time = filemtime($path);

      if ($title == null) $title = $name;
      echo("<dt>");
         write_link($path, $title);
      echo("</dt>");

      echo("<dd>");
         echo($description);
         echo(" It was last updated on ");
         echo(date("Y-m-d", $time));
         echo(" at ");
         echo(date("H:i", $time));
         echo(".");
      echo("</dd>\n");
   }
?>

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

<p>
We're interested in translating the text on BRLTTY's Android screens
into as many languages as possible.
If you're a native speaker of a language for which we don't have a translation yet,
and if you'd like to do some translating for us,
then we'd sure appreciate your help.
So far, we have translations for the following languages:
</p>

<ul>
   <li>Czech</li>
   <li>Chinese</li>
   <li>Danish</li>
   <li>Farsi (Persian)</li>
   <li>Finnish</li>
   <li>French</li>
   <li>German</li>
   <li>Italian</li>
   <li>Norwegian</li>
   <li>Russian</li>
   <li>Slovenian</li>
   <li>Spanish</li>
</ul>

<p>
If you'd like to help us then this is what you need to do:
</p>

<ol>
   <li>
      Download this file:
      <a href="archive/Android/android-strings.txt">android-strings.txt</a>
   </li>

   <li>
      Use an editor to translate the English text into your language.
      The first word on each line is an internal identifier which you should not modify.
      The rest of the line is the English phrase associated with that identifier.
      That's the part you need to translate.
   </li>

   <li>
      Return the translated file to us.
      The best way is to attach it to an email to
      <a href="mailto:dave@mielke.cc?subject=Android+Translation">me</a>.
      In your email, please remember to tell me which language it is.
      It's a good idea to compress the file before attaching it to the email
      in order to protect all of the special characters used by your language
      from being inadvertently corrupted during transmission.
      To compress the file, use a tool like zip, gzip, bzip2, xz, etc.
   </li>
</ol>
