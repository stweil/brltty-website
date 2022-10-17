<?php
   include "brltty-parameters.php";

   date_default_timezone_set("UTC");

   require "document.php";

   class brltty_document extends document {
      function __construct ($name, $title=null) {
         parent::__construct("BRLTTY");
         $this->set_image("brltty.jpg", 160, 500);

         $this->add_owner("dave@mielke.cc");

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
