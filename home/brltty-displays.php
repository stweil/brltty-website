The following braille display models are supported.
If you discover that any other displays and/or models work,
or if you know the technical details required to get another one to work,
then please <A HREF="contact.html">let us know</A>.
<DL>
<?php
   function list_models ($driver) {
      echo("<DT>$driver<DD>\n");
      $count = func_num_args();

      if ($count > 1) {
         echo("<UL>\n");
            for ($index=1; $index<$count; $index+=1) {
               $model = func_get_arg($index);
               echo("<LI>$model</LI>\n");
            }
         echo("</UL>\n");
      }
   }

   list_models("Albatross", "46/80");
   list_models("Alva", "ABT (3nn)", "Delphi (4nn)", "Satellite (5nn)", "Braille System 40", "Braille Controller 640/680");
   list_models("B2G");
   list_models("Baum", "BrailleConnect 12/24/32/40/64/.80", "Brailliant 24/32/40/64/.80", "Conny 12", "DM80 Plus", "EcoVario 24/32/40/64/.80", "Inka", "PocketVario 24", "Pronto! V3 18/40", "Pronto! V4 18/40", "RBT 40/80", "Refreshabraille 18", "SuperVario 24/32/40/64/.80", "Vario 40/80", "VarioConnect 12/24/32/40/64/.80", "VarioPro 40/64/80", "VarioUltra 20/32/40");
   list_models("BrailComm", "III");
   LIST_MODELS("BRAILLELITE", "18/40/M20/M40");
   list_models("BrailleMemo", "Pocket (16)", "Smart (16)", "32", "40");
   list_models("BrailleNote", "18/32");
   list_models("Braudi");
   list_models("BrlAPI");
   list_models("Cebra", "20/40/60/80/100/120/140");
   list_models("CombiBraille", "25/45/85");
   list_models("EcoBraille", "20/40/80");
   list_models("EuroBraille", "AzerBraille", "Clio", "Esys", "Iris", "NoteBraille", "Scriba");
   list_models("FreedomScientific", "Focus 1 44/70/84", "Focus 2 40/80", "Focus Blue 14/40", "PAC Mate 20/40");
   list_models("HandyTech", "Modular 20/40/80", "Modular Evolution 64/88", "Modular Connect 88", "Active Braille", "Active Star 40", "Basic Braille 16/20/32/40/48/64/80", "Braillino", "Braille Wave", "Easy Braille", "Braille Star 40/80", "Connect Braille 40", "Bookworm");
   list_models("Hedo", "ProfiLine", "MobiLine");
   list_models("HIMS" , "Braille Sense" , "SyncBraille" , "Braille Edge");
   list_models("HumanWare", "Brailliant 32/40/80 bi");
   list_models("Iris");
   list_models("Libbraille");
   list_models("LogText", "32");
   list_models("MDV", "MB208", "MB248", "MB408L", "MB408L+", "Lilli Blu");
   list_models("Metec", "BD-40");
   list_models("MiniBraille", "20");
   list_models("MultiBraille", "MB125CR", "MB145CR", "MB185CR");
   list_models("NinePoint");
   list_models("Papenmeier", "Compact 486", "Compact/Tiny", "IB 80 CR Soft", "2D Lite (plus)", "2D Screen Soft", "EL 80", "EL 2D 40/66/80", "EL 40/66/70/80 S", "EL 40/60/80 C", "EL 2D 80 S", "EL 40 P", "EL 80 II", "Elba 20/32", "Trio 40/Elba20/Elba32", "Live 20/40");
   list_models("Pegasus", "20/27/40/80");
   list_models("Seika", "3/4/5 (40)", "80", "Mini (16)");
   list_models("TechniBraille");
   list_models("TSI", "Navigator 20/40/80", "PowerBraille 40/65/80");
   list_models("TTY");
   list_models("VideoBraille", "40");
   list_models("Virtual");
   list_models("VisioBraille", "20/40");
   list_models("Voyager", "44/70", "Part232 (serial adapter)", "BraillePen/EasyLink");
   list_models("XWindow");
?>
</DL>
