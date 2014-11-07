<?php
   include "brltty-parameters.php";

   date_default_timezone_set("UTC");

   require "document.php";

   class brltty_document extends document {
      function brltty_document ($name, $title=null) {
         $this->document("BRLTTY");
         $this->set_image("brltty.jpg", 160, 500);

         $this->add_owner("dave@mielke.cc");
         $this->add_owner("nico@cam.org");
         $this->add_owner("s.doyon@videotron.ca");

         $this->set_colour("BGCOLOR", "white");
         $this->set_colour("TEXT", "black");
         $this->set_colour("LINK", "gray");
         $this->set_colour("VLINK", "gray");

         $this->add_section("Home", "index.html");
         $this->add_section("Download", "download.html");
         $this->add_section("Details", "details.html");
         $this->add_section("Documentation", "documentation.html");
         $this->add_section("Guidelines", "guidelines.html");
         $this->add_section("Contact", "contact.html");

         $this->begin($name, $title);
      }
   }
?>
