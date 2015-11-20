The following speech synthesizers are supported.
If you discover that any other synthesizers work,
or if you know the technical details required to get another one to work,
then please <A HREF="contact.html">let us know</A>.

<?php
   $drivers=array(
      array("Alva", "Delphi (4nn)"),
      array("BrailleLite"),
      array("CombiBraille"),
      array("eSpeak", "text to speech engine"),
      array("ExternalSpeech", "text to speech engine"),
      array("Festival", "text to speech engine"),
      array("FestivalLite", "text to speech engine"),
      array("GenericSay", "text to speech engine"),
      array("Mikropuhe", "text to speech engine"),
      array("SpeechDispatcher", "text to speech server"),
      array("Swift", "text to speech engine"),
      array("Theta", "text to speech engine"),
      array("ViaVoice", "text to speech engine"),
   );

   list_drivers($drivers);
?>
