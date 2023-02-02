<?php /* Template: Login West Coast */ ?>
            <table width="684" height="88" border="0" align="center">
              <tr>
                <td width="688" scope="col"><div align="left">You are entering a members-only web site containing content that has been obtained under NOAA's Marine Mammal Health and Stranding Response Program (Permit #24359).&nbsp; The information presented within is intended for the sole use of the North Pacific Large Whale Entanglement Response Network and its partners.&nbsp; Please do not cite or distribute content without prior approval from the <a href="mailto:ed.lyman@noaa.gov">network coordinator.</a> <div></td>
              </tr>
            </table>
           
            <table width="807" height="146" border="0" align="center" cellspacing="3">
              <tr>
                <th width="95" scope="col">
                    <div align="center">
                        <img src="http://www.whaledisentanglement.org/mmhsrp_logo.jpg" alt="logo" width="85" height="79" />
                    </div>
                </th>
                 <th width="95" scope="col">
                    <div align="center">
                        <img src="http://www.whaledisentanglement.org/Logo_NOAA.jpg" alt="logo" width="85" height="79" />
                    </div>
                </th>
                <th width="96" scope="col">
                    <div align="center">
                    <img src="http://www.whaledisentanglement.org//Logo_NMS.jpg" alt="logo" width="89" height="94" />
                    </div>
                </th>
                <th width="96" scope="col">
                    <div align="center">
                        <img src="http://www.whaledisentanglement.org//Logo_uscg.JPG" alt="logo" width="87" height="81" />
                    </div>
                </th>
              </tr>
              <tr>
                <td scope="col"><div align="center" class="style23">NOAA Fisheries’ Office of Protected Resources</div></td>
                <td height="28" scope="col"><div align="center" class="style23">NOAA Fisheries’ Protected Resource Divisions</div></td>
                <td scope="col"><div align="center" class="style23">NOAA's  Office of National Marine Sanctuaries</div></td>
                <td scope="col"><div align="center" class="style23">U.S. Coast Guard Districts</div></td>
              </tr>
          </table>
<div class="um <?php echo $this->get_class( $mode ); ?> um-<?php echo $form_id; ?>">

    <div class="um-form">
	
		<form method="post" action="" autocomplete="off">
	
		<?php

			do_action("um_before_form", $args);
			
			do_action("um_before_{$mode}_fields", $args);
			
			do_action("um_main_{$mode}_fields", $args);
			
			do_action("um_after_form_fields", $args);
			
			do_action("um_after_{$mode}_fields", $args);
			
			do_action("um_after_form", $args);
			
		?>
		
		</form>
	
	</div>
	
</div>
