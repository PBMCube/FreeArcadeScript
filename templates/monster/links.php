<?php


echo'

	<table align=\'center\' border=\'0\' width=\'100%\'>
	<tr>
		<td  class=\'header\'>Partners</td>
	</tr>

			<tr>
				<td align=\'center\' class=\'content\'>


';

					$rlinkx2 = "SELECT * FROM fas_links where activate != '0' ORDER BY activate desc ";
					$rlinkx1 = sqlcache('linkspage', $cachelife, $rlinkx2);
					if(isset($rlinkx1)){
						foreach($rlinkx1 as $row ){
							echo '<a href=\''.$row['url'].'\' target=\'_blank\'><font size=\'3\'>'.$row['title'].'</font></a><br />';
                    	};
					}else{
						echo'No links have been added!';
					}
echo'
</td>
</tr>
</table>

<hr width=\'85%\' />


';

if(isset($_POST['submit'])){
	$title = clean($_POST['title']);
	$url = clean($_POST['url']);
	$linkbackat = clean($_POST['linkbackat']);
	$emailaddress = clean($_POST['emailaddress']);
	$dateadded = time();
      $IPaddress = $_SERVER['REMOTE_ADDR'];
	if(!$title || !$url){
		echo '<div class=\'error\'>Title or URL was not filled.</div>';
		return;
	}
	mysql_query("INSERT INTO fas_links SET 
					title='$title',
					url='$url',
					dateadded='$dateadded',
					IPaddress='$IPaddress',
				      linkbackreq='1',
				      linkbackat='$linkbackat',
				      emailaddress='$emailaddress'
					");

	echo '<div class=\'msg\'>Link Added, waiting for verification.<br /><br /><b><font size=\'4\'>If our link is not up on your end before we check, your link will be deleted without notice.</font><br />
			</div>';				
}else{
	if($seo_on == 1){
		$submitlink = ''.$domain.'/links/';
	}else{
		$submitlink = ''.$domain.'/index.php?action=links';
	}

	echo '
	<form action=\''.$submitlink.'\' method=\'post\'>
	<table width=\'100%\'>


		<tr>
			<td colspan="2" class=\'header\'>Submit Your Link</td>
			
		</tr>

		<tr>
			<td colspan="2"  class=\'content\'><b>If we do not see our link up on your end when we do our verification check, your 
link will be deleted with out notice or being activated.<br /><br />
If you take ours down later, we take yours down. <br /><br />Please, don\'t waste your time or ours. <br /><br />Our link:<br />
Anchor: '.$sitename.'<br /><br />
URL: '.$domain.'<br /><br /></b></td>
			
		</tr>

		<tr>
			<td colspan="2"  class=\'content\'>Enter your link info:</td>
			
		</tr>



		<tr>
			<td class=\'content\' width="50%">Title: </td>
			<td class=\'content\'><input type=\'text\' name=\'title\' size=\'40\' /></td>
		</tr>
		<tr>
			<td class=\'content\'>URL: </td>
			<td class=\'content\'> 
			<input type=\'text\' name=\'url\' size=\'40\' value=\'http://\' /></td>
		</tr>
		<tr>
			<td class=\'content\'>Location of reciprocal link: </td>
			<td class=\'content\'>
			<input type=\'text\' name=\'linkbackat\' size=\'40\' value=\'http://\' /></td>
		</tr>
		<tr>
			<td class=\'content\'>E-mail Address: </td>
			<td class=\'content\'>
			<input type=\'text\' name=\'emailaddress\' size=\'40\' value=\'\' /></td>
		</tr>
		<tr>
			<td colspan="2" class=\'content\'><input type=\'submit\' name=\'submit\' value=\'Add Link\' /></td>
		</tr>
	</table>
	</form>';
};


$pagetitle = $sitename.' link partners';
$metatags = 'links, link exchange, link partners';
$metadescription = $sitename.' link partners';
?>