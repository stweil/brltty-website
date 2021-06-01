<p>
The Java client library for BrlAPI on Android
is stored within a Maven repository that we maintain.
To use it, include the following code within
your project's <code>build.gradle</code> script:
</p>

<?php
   list_brlapi_file(
      "brlapi-android.gradle",
      "Groovy code for including the Android BrlAPI client library."
   );
?>

<ul>
<li>Your minimum SDK version must be at least <code>26</code>, which is Android 8 (Oreo).</li>
<li>Remember to change the dependency version as needed.</li>
</ul>

You can also get BrlAPI's jar and libraries directly:

<dl>
   <?php
      function list_brlapi_file ($name, $description) {
         list_android_file("BrlAPI/$name", $description, $name);
      }

      function list_brlapi_library ($abi, $architecture, $name, $description) {
         list_brlapi_file("$abi/$name", "The $architecture $description.");
      }

      function list_brlapi_libraries ($abi, $architecture) {
         list_brlapi_library(
            $abi, $architecture,
            "libbrlapi.so", "C client library"
         );

         list_brlapi_library(
            $abi, $architecture,
            "libbrlapi_java.so", "JNI implementation"
         );
      }

      list_brlapi_file(
         "brlapi.jar",
         "The jar containing BrlAPI's Java classes."
      );

      list_brlapi_libraries("armeabi-v7a", "arm 32-bit");
      list_brlapi_libraries("arm64-v8a", "arm 64-bit");
      list_brlapi_libraries("x86", "x86 32-bit");
      list_brlapi_libraries("x86_64", "x86 64-bit");
   ?>
</dl>

