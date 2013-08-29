<?php
$selected = "";
echo '<option value="">- None -</option>';
$reporting_org_type_file = "codelists/Region.csv";
if (($handle = fopen($reporting_org_type_file, "r")) !== FALSE) {
    fgetcsv($handle, 1000, ","); //skip first line
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
       if (isset($region)) {
         if (in_array($data[0],$region)) { //remember posted variables may be a multi-array
           $selected = 'selected="selected"';
         } else {
           $selected = "";
         }
       }
        echo '<option value="' . $data[0] . '" ' . $selected . '>' . $data[0] . ': ' . $data[1] . '</option>';
    }
    fclose($handle);
}
?>
