<?php
   function write_link ($url, $text=null) {
      if ($text == null) $text = $url;
      $attributes = array(
         'href' => $url
      );
      write_element('a', $attributes);
      echo($text);
      echo('</a>');
   }
   function write_mailto ($address) {
      write_element("a", array("href" => "mailto:$address"));
      echo("<code>&lt;$address&gt;</code></a>");
   }
   function write_element ($name, $attributes=null) {
      echo("<$name");
      if (is_array($attributes)) {
         write_attributes($attributes);
      }
      echo(">");
   }
   function write_attributes (&$attributes) {
      reset($attributes);
      while (list($name, $value) = each($attributes)) {
         write_attribute($name, $value);
      }
   }
   function write_attribute ($name, $value) {
      echo(" $name=\"$value\"");
   }

   class document {
      var $document_relations;
      function add_forward_relation ($name, $url) {
         $this->add_relation("rel", $name, $url);
      }
      function add_reverse_relation ($name, $url) {
         $this->add_relation("rev", $name, $url);
      }
      function add_relation ($type, $name, $url) {
         if (!isset($this->document_relations[$type])) {
	    $this->document_relations[$type] = array();
	 }
	 $this->document_relations[$type][$name] = $url;
      }
      function write_relations () {
         reset($this->document_relations);
	 while (list($type, $names) = each($this->document_relations)) {
	    reset($names);
	    while (list($name, $url) = each($names)) {
	       echo("<link $type=$name href=\"$url\" />\n");
	    }
	 }
      }

      var $document_owners;
      function add_owner ($address) {
	 $this->document_owners[] = $address;
      }
      function owners_mailto () {
         return "mailto:" . implode(",", $this->document_owners);
      }

      var $document_colours;
      function set_colour ($type, $colour) {
	 $this->document_colours[$type] = $colour;
      }

      var $document_image;
      function set_image ($url, $height, $width) {
	 $this->document_image = array(
            'src'    => $url,
            'height' => $height,
            'width'  => $width,
            'alt'    => $this->document_name
         );
      }

      var $document_selector;
      function add_section ($name, $url) {
         $this->document_selector->add_item($name, $url);
      }

      var $document_subsections;
      function add_subsection ($name, $file, $anchor) {
         $this->document_subsections[] = array(
            'name'   => $name,
            'file'   => $file,
            'anchor' => $anchor
         );
      }
      function write_contents () {
         if (count($this->document_subsections) > 1) {
            echo("<ul>\n");
            reset($this->document_subsections);
            while (list($key, $subsection) = each($this->document_subsections)) {
               echo("<li><a href=\"#" . $subsection['anchor'] . "\">" . $subsection['name'] . "</a></li>\n");
            }
            echo("</ul>\n");
            echo("<hr />\n");
         }
      }
      function write_subsections () {
         reset($this->document_subsections);
         while (list($key, $subsection) = each($this->document_subsections)) {
            echo("<h2><a name=\"" . $subsection['anchor'] . "\">" . $subsection['name'] . "</a></h2>\n");
            $this->include_subsection($subsection['file']);
            echo("<hr />\n");
         }
      }
      function include_subsection ($file) {
         include $file;
      }

      var $document_name;
      function document ($name) {
         $this->document_name = $name;
         $this->document_relations = array();
         $this->document_owners = array();
	 $this->document_colours = array();
	 $this->document_selector = new toolbar();
	 $this->document_subsections = array();
      }

      function begin ($section, $title=null) {
	 if (count($this->document_owners) > 0) {
	    $this->add_reverse_relation("\"made\"", $this->owners_mailto());
	 }

	 echo("<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n");
         echo("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 4.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n");

	 echo("<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\">\n");
	 echo("<head>\n");

	 if ($title == null) {
	    $title = $section;
	 }
	 echo("<title>$this->document_name - $title</title>\n");

	 $this->write_relations();
	 echo("</head>\n");

	 write_element("body", $this->document_colours);
	 echo("\n");

	 if (is_array($this->document_image)) {
	    echo("<div align=\"center\">");
	    write_element("img", $this->document_image);
	    echo("</div>\n");
	 } else {
	    echo("<h1>$this->document_name</h1>\n");
	 }

	 $this->document_selector->set_default($section);
	 $this->document_selector->write();

	 echo("<h2>$title</h2>\n");
      }
      function end () {
         $this->write_contents();
         $this->write_subsections();
	 $this->document_selector->write();
	 echo("</body>\n");
	 echo("</html>\n");
      }
   }

   class selector {
      var $selector_items;
      function add_item ($name, $url) {
         $this->selector_items[$name] = $url;
      }

      var $selector_default;
      function set_default ($name) {
         $this->selector_default = $name;
      }

      function selector () {
         $this->selector_items = array();
      }

      function write () {
         echo($this->before());
	 reset($this->selector_items);
	 $first = true;
	 while (list($name, $url) = each($this->selector_items)) {
	    if ($first) {
	       $first = false;
	    } else {
	       echo($this->between());
	    }
	    $active = false;
	    if ($this->selector_default != null) {
	       if ($name == $this->selector_default) {
		  $active = true;
	       }
	    }
	    echo($this->item($name, $url, $active));
	 }
         echo($this->after());
      }
      function before () {
         return "";
      }
      function between () {
         return "";
      }
      function after () {
         return "";
      }
      function item ($name, $url, $active) {
         return "";
      }
   }

   class toolbar extends selector {
      function toolbar () {
         $this->selector();
      }
      function before () {
         return "<div align=\"center\"><small>\n";
      }
      function between () {
         return "|\n";
      }
      function after () {
         return "</small></div>\n";
      }
      function item ($name, $url, $active) {
	 if ($active) {
	    $open = "<b>";
	    $close = "</b>";
	 } else {
	    $open = "<a href=\"$url\">";
	    $close = "</a>";
	 }
	 return $open . str_replace(" ", "&nbsp;", $name) . $close . "\n";
      }
   }
?>
