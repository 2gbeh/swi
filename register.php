<?php require_once 'inc/top.php'; ?>  

<main class="base">
	<div class="ribbon">
	  <div class="caption"><?php echo $page_title; ?></div>
  </div>
  
	<div class="section_2">
	  <div class="container" style="padding-top:50px;">
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
        <td>
        	<select name="gender" required>
          	<option selected disabled>Select Gender :</option>
          	<option value="M" <?php echo $_POST['gender'] == 'M'? 'selected': ''; ?>>Male</option>
          	<option value="F" <?php echo $_POST['gender'] == 'F'? 'selected': ''; ?>>Female</option>
          </select>
        </td>
        <td>        
        	<select name="state" required>
          	<option selected disabled>Select Location :</option>
          	<?php echo jrad_enum::option(jrad_enum::STATE, $_POST['state']); ?>
          </select>
        </td>        
      </tr>      
      <tr>
        <td>
        	<input type="email" name="email" placeholder="Email Address :" value="<?php echo $_POST['email']; ?>" required />
        </td>
        <td>
        	<input type="tel" name="phone" placeholder="Phone Number :" maxlength="11" value="<?php echo $_POST['phone']; ?>" required />
        </td>
      </tr>        
      <tr>
        <td colspan="2">
        	<textarea name="address" placeholder="Home Address :" rows="5"><?php echo $_POST['address']; ?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2">
        	<button type="submit">Complete Registration</button>
        </td>
      </tr>        
      </table>
    </form>
    </div>
  </div>    
</main>  

<?php require_once 'inc/end.php'; ?>  


