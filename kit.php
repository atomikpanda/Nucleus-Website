<?php

function echoContents($file) {
$data = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/docs/$file"), true);
foreach($data as $_sect) {
if(isset($_sect["method"])) {

$_def_sub_head = "";
foreach(array_keys($_sect["parameters"]) as $param) {
	$param = preg_replace('/\(([^)]+)\)/', '', $param);
	$_def_sub_head = $_def_sub_head.$param;
}
echo "<div style='color:#507073;' class='sub header'>".$_def_sub_head."</div>";
echo "<code class=\"brush: objc;\">".htmlentities($_sect["method"])."</code>";
$_msg = $_sect["message"];
if(isset($_msg))
			echo "<p>".htmlentities($_msg)."</p><br/>";
echo '	
	<table><thead>
        <tr>
           <th style="width: 1px">Parameter</th>
           <th style="width: 1px">Type</th>
            <th>Description</th>
        </tr>
    </thead><tbody>';
   
		
		for($idx=0;count(array_keys($_sect["parameters"]))>$idx;$idx++) {
		$_parameter = array_keys($_sect["parameters"])[$idx];
		$_desc = $_sect["parameters"][$_parameter];
		//$_parameter = preg_replace('/\s+/', '', $_parameter);			DISABLE WHITESPACE
		 preg_match_all('/\(([^)]+)\)/', $_parameter, $matches);
		 $_parameter = preg_replace('/\(([^)]+)\)/', '', $_parameter);
		 $_data_type = $matches[0][0];
		 $_data_type = preg_replace('/\(/', '', $_data_type);
		 $_data_type = preg_replace('/\)/', '', $_data_type);
		 
		echo "
        <tr>
            <td><code class=\"brush: objc;class-name:inline\">".htmlentities($_parameter)."</code></td>
            <td><code class=\"brush: objc;class-name:inline\">".htmlentities($_data_type)."</code></td>
            <td>".htmlentities($_desc)."</td></tr>";
        }
        echo '</tbody></table>';
        }  
        else if(isset($_sect["example"])) {
        	$_title = $_sect["title"];
        	$_msg = $_sect["message"];
        	if(isset($_title))
			echo "<div class='sub header'>$_title</div>";
			if(isset($_msg))
			echo "<p>".htmlentities($_msg)."</p>";
			
			echo '<code class="brush: objc;">'. htmlentities(file_get_contents('ex/'.$_sect["example"])).'</code>';
		}
  
  }
 
  
}

	
?>