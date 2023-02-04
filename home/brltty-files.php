<?php
   function get_released_files ($package) {
      global $archive_directory;
      $pattern = 
         '/^' . $package .
         '(?P<subpackage>(?:-[[:alpha:]]\w*)*)' .
         '(?P<release>(?:-\d\w*(?:\.\d\w*)*)+)' .
         '(?:-(?P<usb>[[:alpha:]]+(?:-\d+(?:\.\d+)*)*))?' .
         '(?P<extension>(?:\.[[:alpha:]]\w*)+)' .
         '$/i';
      $dos_pattern =
         '/^' .
         '(?=\w{1,8}\.\w{1,3}$)' .
         '(?P<package>[[:alpha:]]+)' .
         '(?P<release>\d\w*)' .
         '(?P<extension>\.zip)' .
         '$/i';
      if ($directory = opendir($archive_directory)) {
         while (($name = readdir($directory))) {
            if (preg_match($pattern, $name, $matches)) {
               $release = substr($matches['release'], 1);
               $extensions = explode('.', $matches['extension']);
               switch ($extensions[1]) {
                  case 'src':
                  case 'tar':
                     $category = 'Source';
                     break;
                  default:
                     switch (end($extensions)) {
                        case 'rpm':
                           $category = 'Linux';
                           break;
                        case 'apk':
                           $category = 'Android';
                           break;
                        case 'exe':
                        case 'zip':
                           $category = 'Windows';
                           break;
                        default:
                           $category = 'unknown';
                           break;
                     }
                     break;
               }
            } elseif (preg_match($dos_pattern, $name, $matches)) {
               if (strncmp($package, $matches['package'], strlen($matches['package'])) != 0) continue;
               $release = $matches['release'];
               $offset = 1;
               $release = substr_replace($release, '.', $offset, 0);
               $category = 'DOS';
            } else {
               continue;
            }
            $components = explode('-', $release);
            $version = $components[0];
            foreach ($components as $component_index => $component) {
               $numbers = explode('.', $component);
               foreach ($numbers as $number_index => $number) {
                  $integer = true;
                  while (strlen($number)) {
                     $function = $integer? 'strspn': 'strcspn';
                     $element = ($length = $function($number, '0123456789'))? substr($number, 0, $length): '0';
                     if ($count = strspn($element, '0')) {
                        $element = ($count == strlen($element))? '0': substr($element, $count);
                     }
                     $elements[] = $element;
                     $number = substr($number, $length);
                     $integer = !$integer;
                  }
                  $numbers[$number_index] = $elements;
                  unset($elements);
               }
               $components[$component_index] = $numbers;
            }
            $path = $archive_directory . '/' . $name;
            $files[] = array(
               'name'       => $name,
               'path'       => $path,
               'size'       => filesize($path),
               'time'       => filemtime($path),
               'category'   => $category,
               'subpackage' => $matches['subpackage'],
               'release'    => $release,
               'version'    => $version,
               'components' => $components,
               'extension'  => $matches['extension']
            );
         }
         closedir($directory);
      }
      usort($files, 'compare_files_by_release');
      return $files;
   }
   function compare_files_by_release ($file1, $file2) {
      $components1 = $file1['components'];
      $components2 = $file2['components'];

      reset($components1);
      reset($components2);

      while (true) {
         $haveNumbers1 = is_array($numbers1 = current($components1));
         $haveNumbers2 = is_array($numbers2 = current($components2));

         if ($haveNumbers1 != $haveNumbers2) return $haveNumbers1? 1: -1;
         if (!$haveNumbers1) break;

         reset($numbers1);
         reset($numbers2);

         while (true) {
            $haveElements1 = is_array($elements1 = current($numbers1));
            $haveElements2 = is_array($elements2 = current($numbers2));

            if ($haveElements1 != $haveElements2) return $haveElements1? 1: -1;
            if (!$haveElements1) break;

            reset($elements1);
            reset($elements2);
            $isInteger = true;

            while (true) {
               $haveElement1 = is_string($element1 = current($elements1));
               $haveElement2 = is_string($element2 = current($elements2));

               if ($haveElement1 != $haveElement2) return $haveElement1? 1: -1;
               if (!$haveElement1) break;

               if ($isInteger) {
                  $isEmpty1 = strlen($element1) == 0;
                  $isEmpty2 = strlen($element2) == 0;
                  if ($isEmpty1 != $isEmpty2) return $isEmpty2? 1: -1;

                  if (!$isEmpty1) {
                     $integer1 = intval($element1);
                     $integer2 = intval($element2);

                     if ($integer1 < $integer2) return -1;
                     if ($integer1 > $integer2) return 1;
                  }
               } else {
                  $relation = strcmp($element1, $element2);
                  if ($relation != 0) return $relation;
               }

               $isInteger = !$isInteger;
              next($elements1);
              next($elements2);
            }

            next($numbers1);
            next($numbers2);
         }

         next($components1);
         next($components2);
      }

      return strcmp($file1['name'], $file2['name']);
   }

   $GLOBALS['archive_directory'] = 'archive';
   $GLOBALS['android_directory'] = "$archive_directory/Android";

   $GLOBALS['brltty_files'] = get_released_files('brltty');
   $GLOBALS['brlapi_files'] = get_released_files('(?:(?:java|ocaml|python|tcl)-)?brlapi');

   function get_version_files (&$package_files, $version) {
      foreach ($package_files as $key => $file) {
         if (strcmp($version, $file['version']) == 0) {
            $files[] = $file;
         }
      }
      return $files;
   }
   function put_file_row (&$file) {
      $size = $file['size'];
      $scale = 0;
      $factor = 1000;

      while ($size >= $factor) {
         $size /= $factor;
         $scale++;
      }

      echo("<tr>\n");
      echo("<td align=\"left\"><a href=\"" . $file['path'] . "\"><code>" . $file['name'] . "</code></a></td>\n");
      echo("<td align=\"left\">" . $file['category'] . "</td>\n");
      echo("<td align=\"right\">" . round($size) . substr(' KMG', $scale, 1) . "</td>\n");
      echo("<td align=\"left\">" . date('Y-m-d', $file['time']) . "</td>\n");
      echo("</tr>\n");
   }
   function put_file_rows (&$files) {
      $all_files = array_reverse($files);

      foreach ($all_files as $key => $file) {
         put_file_row($file);
      }
   }
   function put_file_table (&$files) {
      echo("<table align=\"center\">\n");

      echo("<tr>\n");
      echo("<th>Name</th>\n");
      echo("<th>Category</th>\n");
      echo("<th>Size</th>\n");
      echo("<th>Date</th>\n");
      echo("</tr>\n");

      $all_files = array_reverse($files);
      $release_files = array();
      $previous_release = "";

      foreach ($all_files as $key => $file) {
         $next_release = $file['release'];
         if (strcmp($next_release, $previous_release) != 0) {
            put_file_rows($release_files);
            $release_files = array();
            $previous_release = $next_release;
         }
         $release_files[] = $file;
      }
      put_file_rows($release_files);

      echo("</table>\n");
   }

   function put_version ($package_name, &$package_files, $version_name, $version_description) {
      $files = get_version_files($package_files, $version_name);
      $date = date('F j, Y', $files[0]['time']);

      echo("<p>\n");
      echo("The $version_description version of <b>$package_name</b> is $version_name ($date).\n"); 
      echo("It can be downloaded in the following formats:\n"); 
      echo("</p>\n");

      put_file_table($files);
   }
   function put_latest_version ($package_name, &$package_files, $current_version) {
      $latest_release = end($package_files);
      $latest_version = $latest_release['version'];
      if ($latest_version != $current_version) {
         put_version($package_name, $package_files, $latest_version, 'latest beta');
      }
   }
   function put_current_version ($package_name, &$package_files, $current_version) {
      put_version($package_name, $package_files, $current_version, 'current production');
   }
   function put_versions ($package_name, &$package_files, $current_version) {
      put_latest_version($package_name, $package_files, $current_version);
      put_current_version($package_name, $package_files, $current_version);
   }
?>
