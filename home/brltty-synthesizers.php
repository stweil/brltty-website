The following speech synthesizers are supported.
If you discover that any other synthesizers work,
or if you know the technical details required to get another one to work,
then please <A HREF="contact.html">let us know</A>.

<?php
   $speech_synthesizers = array(
      array("Alva", "Delphi (4nn) models"),
      array("BrailleLite"),
      array("CombiBraille"),
      array("eSpeak"),
      array("eSpeak NG"),
      array("External Speech", "needs user-provided server"),
      array("Festival"),
      array("Festival Lite"),
      array("Generic Say", "needs user-provided script"),
      array("Mikropuhe", "commercial product"),
      array("Speech Dispatcher"),
      array("Swift", "commercial product"),
      array("Theta", "commercial product"),
      array("ViaVoice", "commercial product"),
   );

   list_drivers($speech_synthesizers);
?>
