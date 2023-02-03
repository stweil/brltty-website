<p>
We're interested in translating the text on BRLTTY's Android screens
into as many languages as possible.
If you're a native speaker of a language for which we don't have a translation yet,
and if you'd like to do some translating for us,
then we'd sure appreciate your help.
So far, we have translations for the following languages:
</p>

<?php
   function listTranslations ($language, $code) {
      $url = "android-translations.html?language=$language&code=$code";

      echo("<li>");
         write_link($url, $language);
      echo("</li>\n");
   }
?>

<ul>
   <?php
      listTranslations("Arabic", "ar");
      listTranslations("Czech", "cs");
      listTranslations("Chinese (Taiwan)", "zh-rTW");
      listTranslations("Danish", "da");
      listTranslations("Dutch", "nl");
      listTranslations("Farsi (Persian)", "fa");
      listTranslations("Finnish", "fi");
      listTranslations("French", "fr");
      listTranslations("German", "de");
      listTranslations("Italian", "it");
      listTranslations("Norwegian (Bokmal)", "nb");
      listTranslations("Russian", "ru");
      listTranslations("Slovenian", "sl");
      listTranslations("Spanish", "es");
      listTranslations("Turkish", "tr");
   ?>
</ul>

<p>
If you'd like to help us then this is what you need to do:
</p>

<ol>
   <li>
      Download this file:

      <?php
         list_android_file(
            "android-strings.txt",
            "The strings that we'd like to have translations for."
         );
      ?>
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
