<?php require_once 'inc/top.php'; ?>  

<main class="base">
	<div class="ribbon">
	  <div class="caption"><?php echo $page_title; ?></div>
  </div>
    
	<div class="section_1">
	  <div class="container" style="min-width:1500px; background-color:#FF;">  
	  <ul>
    	<li>
      	<i class="fas fa-university" style="font-size:150px;"></i>
        <div class="label">
        	<div class="important">BANK NAME</div>
          (Germany) <br/>
        	STADTSPARKASSE ESSEN
          <p></p>
          (Nigeria) <br/>
        	POLARIS BANK 
        </div>
      </li>    
    	<li>
      	<i class="fas fa-id-card"></i>
        <div class="label">
        	<div class="important">ACCOUNT NAME</div>        
          (Germany) <br/>
        	Social Welfare Initiative e.V 
          Reg. No. #5915
          <p></p>
          (Nigeria) <br/>
          Social Welfare For The Less Priviledged Initiative
        </div>
      </li>
    	<li>
      	<i class="fas fa-donate"></i>
        <div class="label">
        	<div class="important">ACCOUNT NO.</div>        
          (Germany) <br/>
          IBAN: DE21 3605 0105 0001 5495 75 <br/>
          BIC: SPESDE3EXXX
          <p></p>
					(Nigeria) <br/>
          1771782235 &amp; 1771833948
        </div>
      </li>            
    </ul>
    </div>
  </div>  
  
	<div class="section_2">
	  <div class="container">
    <div class="important">
      Kindly send your Donations to the Account Details stated above, <br/>
      and submit your Payment Slip below:
    </div>
    
   <?php echo $notice->display(); ?>
    <form <?php echo ACTION; ?>>
      <table>
      <tr>
        <td>
        	<input type="search" name="depositor" placeholder="Name of Depositor :" <?php echo $_POST['depositor']; ?> required />
        </td>
        <td>        
        	<input type="tel" name="phone" placeholder="Phone Number :" maxlength="11" <?php echo $_POST['phone']; ?> required />
        </td>
      </tr>
      <tr>
        <td>        
        	<input type="text" name="amount" placeholder="Amount Paid :" <?php echo $_POST['amount']; ?> required />
        </td>
        <td>
        	<select name="channel" required>
          	<option selected disabled>Payment Channel :</option>
          	<?php echo jrad_enum::option(jrad_enum::CHANNEL, $_POST['channel']); ?>
          </select>
        </td>
      </tr>       
      <tr>
        <td>        
        	<input type="search" name="reason" placeholder="Reason for Payment :" <?php echo $_POST['reason']; ?> maxlength="160" />
        </td>
        <td>        
        	<input type="text" name="payday" placeholder="Date of Payment :" <?php echo $_POST['payday']; ?> required />
        </td>
      </tr>
      <tr>
        <td colspan="2">
        	<button type="submit">Sumbit Payslip</button>
        </td>
      </tr>        
      </table>
    </form>
    </div>
  </div> 
  
  <div class="section_3">
 		<img src="img/epay.png" width="100%" alt="Google Maps API" />
  </div>     
</main>  

<?php require_once 'inc/end.php'; ?>  


