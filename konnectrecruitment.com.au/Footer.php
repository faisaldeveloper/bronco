<table width="100%" cellpadding="0" cellspacing="0"> 
	<?
	if($nFooterPanel==1)//If Condition for footer links
	{
	?>
		<tr>
			<td>
			<?
				$rsSql = GetFooterLinks($intLangId);//Get all pages on whick footer link is set
				if(isset($rsSql))
				{
				?>
					<table align="left">
						<tr>
							<?
							$nShowBar == 1;
							while($row=mysql_fetch_object($rsSql))
							{		
								?>
								<td>
								<?
								if($nShowBar == 1 )//Show Bar between two links
									echo " | ";
								?><a href="<?=$row->PageUrl?>"><? if($row->PageName=='') print "****"; else print $row->PageName;?></a>
								<?
								$nShowBar=1;
								?>
								</td>	
								<?	
							}//End of While
							?>
						</tr>
					</table>
				<?
				}
				?>
			</td>
		</tr>
	<?
	}
	?>
	<tr><td><?=$strFooter?></td></tr>
</table>			