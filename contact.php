<?php require_once 'inc/top.php'; ?>  

<main class="base">
	<div class="ribbon">
	  <div class="caption"><?php echo $page_title; ?></div>
  </div>
  
	<div class="section_1">
	  <div class="container" style="min-width:1600px; background-color:#FF;">  
	  <ul>
    	<li>
      	<img src="img/ico_pin.png" alt="Address" />
        <div class="label">
        	<div class="important">OFFICE ADDRESS</div>
          (GERMANY) <br/>
          Horsterstr.295, <br/>
          46238, Bottrop, Germany.
        </div>
      </li>
    	<li>
      	<img src="img/ico_pin.png" alt="Address" />
        <div class="label">
        	<div class="important">OFFICE ADDRESS</div>
          (NIGERIA) <br/>
          Anabul Estate, Afowah Uzairue, <br/>
          Auchi, Edo State, Nigeria.
        </div>
      </li>      
    	<li>
      	<img src="img/ico_email.png" alt="Email" />
        <div class="label">
        	<div class="important">EMAIL ADDRESS</div>        
        	info@socialwelfareinitiative.com <br/>
        	support@socialwelfareinitiative.com <br/>          
        </div>
      </li>
    	<li>
      	<img src="img/ico_phone.png" alt="Tel" />
        <div class="label">
        	<div class="important">PHONE NO.</div>
          (GERMANY) <br/>
	        +49 1577 623 9085, +49 1621 514 0326 <br/>
	        +49 1521 501 6281
        </div>
      </li>
    	<li>
      	<img src="img/ico_phone.png" alt="Tel" />
        <div class="label">
        	<div class="important">PHONE NO.</div>
          (NIGERIA) <br/>
          +234 81 4294 4738, +234 80 5275 9580 <br/>         
          +234 70 1651 4301, +234 80 6392 3993      
        </div>
      </li>
    </ul>
    </div>
  </div>
  
	<div class="section_2">
	  <div class="container">
    <?php echo $notice->display(); ?>
    <form <?php echo ACTION; ?>>
      <table>
      <tr>
        <td>
        	<input type="search" name="fname" placeholder="First Name :" value="<?php echo $_POST['fname']; ?>" required />
        </td>
        <td>
        	<input type="search" name="lname" placeholder="Last Name (Surname) :" value="<?php echo $_POST['lname']; ?>" required />
        </td>
      </tr>
      <tr>
        <td colspan="2">
        	<input type="email" name="email" placeholder="Email Address :" value="<?php echo $_POST['email']; ?>" required />
        </td>
      </tr>        
      <tr>
        <td colspan="2">
        	<textarea name="message" placeholder="Type Message :" rows="5" required><?php echo $_POST['lname']; ?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2">
        	<button type="submit">Send Message</button>
        </td>
      </tr>        
      </table>
    </form>
    </div>
  </div>  
  
  <div class="section_3">
 		<img src="img/map.png" width="100%" alt="Google Maps API" />
  </div>
</main>  

<?php require_once 'inc/end.php'; ?>  


