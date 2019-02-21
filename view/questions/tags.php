<?php
namespace Anax\View;
use \Anax\TextFilter\TextFilter;

$filter = new TextFilter();
$filters = ["markdown"];
echo "<h3> Tags</h3>";
?>
<table style="width:100%">
    <tr>
        <th>Tag</th>
    </tr>
    <?php 
foreach ($tags as $value) {

  
  $tagsFiltered = $filter->parse($value->tags, $filters);
  preg_replace( "/\r|\n/", "", $tagsFiltered->text );
  $url = url("questions/index/$value->tags");
  ?>

    <tr>
        <th><?php echo "<a href='$url'>" . $tagsFiltered->text . "</a>";  ?></th>
    </tr>


    <?php
  
}

?>
</table>