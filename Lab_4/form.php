<?php
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
  $confirm_pass="";
  $err_confirm_pass="";
	$email="";
	$err_email="";


	$street="";
	$err_street="";

	$city="";
	$err_city="";

	$state="";
	$err_state="";

	$postal="";
	$err_postal="";

	$phone_code="";
	$err_phone_code="";
	$phone_num="";
	$err_phone_num="";


	$gender="";
	$err_gender="";

	$month="";
	$err_month="";
	$months = array("January","February","March","April","May","June","July","August","September","October","November","December");

	$day="";
	$err_day="";

	$year="";
	$err_year="";


	$infos=[];
	$err_infos="";
	$bio="";
	$err_bio="";

	$hasError=false;

	$profs = array("Service","Business","Teaching");

	function aboutInfo($in){
		global $infos;
		foreach($infos as $info){
			if ($in == $info) return true;
		}
		return false;
	}



	if($_SERVER["REQUEST_METHOD"] == "POST"){

		if(empty($_POST["name"])){
			$hasError=true;
			$err_name="Name Required";
		}
		elseif (strlen($_POST["name"]) <=2){
			$hasError = true;
			$err_name = "Name must be greater than 2 characters";
		}
		else
		{
			$name = htmlspecialchars($_POST["name"]);
		}


    if(empty($_POST["username"])){
			$hasError=true;
			$err_uname="Username Required";
		}
		elseif (strlen($_POST["username"]) < 6){
			$hasError = true;
			$err_uname = "Username must be greater than 6 characters";
		}

		elseif(strpos($_POST["username"]," "))
				{
					$hasError = true;
					$err_uname = "Space is not allowed.";
				}

		else
				{
					$uname = htmlspecialchars($_POST["username"]);

				}



    if(empty($_POST["password"])){
			$hasError=true;
			$err_pass="Password Required";
		}
		elseif (strlen($_POST["password"]) < 8){
			$hasError = true;
			$err_pass = "Password must be greater than 8 characters";
		}
		elseif (!strpos($_POST["password"],"#") && !strpos($_POST["password"],"?") ){
			$hasError = true;
			$err_pass = "Password should have atleast 1 special character ";
		}
		else if(ctype_upper($_POST["password"]) || ctype_lower($_POST["password"]) ){
			$hasError = true;
			$err_pass="Password should combination of uppercase and lowercase alphabet";
				}

		elseif (is_numeric($_POST["password"])){
			$hasError = true;
			$err_pass = "Password should have uppercase and lowercase alphabe ";
				}

		else
		{
			$arr_1=str_split($_POST["password"]);

			for ($i=0; $i < count($arr_1) ; $i++) {
				if (is_numeric($arr_1[$i])) {
					$pass = htmlspecialchars($_POST["password"]);
					$err_pass ="";
				}
				else {
					$hasError = true;
					$err_pass = "Password should have atleast 1 number ";
				}
			}





		}

    if(empty($_POST["confirm_password"])){
			$hasError=true;
			$err_confirm_pass="Confirm Password Required";
		}
    elseif (strlen($_POST["confirm_password"]) < 5){
      $hasError = true;
      $err_confirm_pass = "Confirm Password must be greater than 6 characters";
    }
		else
		{
			$confirm_pass = htmlspecialchars($_POST["confirm_password"]);
		}

		if(empty($_POST["email"])){
			$hasError=true;
			$err_email="Email Required";
		}
		elseif (!strpos($_POST["email"],"@") ){
			$hasError = true;
			$err_email = "Invalid email";
		}
		else
		{
			$dot=strpos($_POST["email"],"@");
			if(!strpos($_POST["email"],".",$dot+1))
			{
				$hasError = true;
				$err_email = "Invalid email";
			}
			else {
				$email = htmlspecialchars($_POST["email"]);
			}

		}

		if(empty($_POST["phone_code"])){
			$hasError=true;
			$err_phone_code="Code Required";
		}
		elseif (!is_numeric($_POST["phone_code"])){
			$hasError=true;
			$err_phone_code="Invalid phone number";
		}
		else
		{
			$phone_code = htmlspecialchars($_POST["phone_code"]);
		}

		if(empty($_POST["phone_num"])){
			$hasError=true;
			$err_phone_num="Number Required";
		}
		elseif (!is_numeric($_POST["phone_num"])){
			$hasError=true;
			$err_phone_num="Invalid phone number";
		}
		else
		{
			$phone_num = htmlspecialchars($_POST["phone_num"]);
		}


		if(empty($_POST["street"])){
			$hasError=true;
			$err_street="street Required";
		}

		else
		{
			$street = htmlspecialchars($_POST["street"]);
		}

		if(empty($_POST["city"])){
			$hasError=true;
			$err_city="City Required";
		}

		else
		{
			$city = htmlspecialchars($_POST["city"]);
		}

		if(empty($_POST["state"])){
			$hasError=true;
			$err_state="state Required";
		}

		else
		{
			$state = htmlspecialchars($_POST["state"]);
		}

		if(empty($_POST["postal"])){
			$hasError=true;
			$err_postal="postal Required";
		}

		else
		{
			$postal = htmlspecialchars($_POST["postal"]);
		}




		if(empty($_POST["email"])){
			$hasError=true;
			$err_email="Email Required";
		}
		else
		{
			$email = htmlspecialchars($_POST["email"]);
		}








		if(!isset($_POST["gender"])){
			$hasError = true;
			$err_gender = "Gender Required";
		}
		else{
			$gender = $_POST["gender"];
		}


		if(!isset($_POST["month"])){
			$hasError = true;
			$err_month= "Month Required";
		}
		else{
			$month = $_POST["month"];
		}

		if(!isset($_POST["day"])){
			$hasError = true;
			$err_day= "Day Required";
		}
		else{
			$day = $_POST["day"];
		}

		if(!isset($_POST["year"])){
			$hasError = true;
			$err_year= "Year Required";
		}
		else{
			$year = $_POST["year"];
		}


		if(!isset($_POST["infos"])){
			$hasError = true;
			$err_infos = "Information Required";
		}else{
			$infos = $_POST["infos"];
		}
		if(empty($_POST["bio"])){
			$hasError = true;
			$err_bio = "Bio Required";
		}
		else{
			$bio = $_POST["bio"];
		}

		if(!$hasError){
			echo $_POST["name"]."<br>";
			echo $_POST["username"]."<br>";
			echo $_POST["password"]."<br>";
			echo $_POST["gender"]."<br>";
			echo $_POST["profession"]."<br>";
			echo $_POST["bio"]."<br>";
			$arr = $_POST["hobbies"];

			foreach($arr as $e){
				echo "$e<br>";
			}
		}

	}

?>
<html>
	<body>

		<fieldset>
			<h1>Club Member Registration</h1>
			<form action="" method="post">
				<table>
					<tr>
						<td align="right">Name</td>
						<td>:<input name="name" value="<?php echo $name;?>" type="text"><br>
						<span><?php echo $err_name;?></span></td>
					</tr>

					<tr>
						<td align="right">Username</td>
						<td>
							:<input name="username" value="<?php echo $uname;?>" type="text"><br>
							<span><?php echo $err_uname;?></span>
						</td>

					</tr>

					<tr>
						<td align="right">Password</td>
						<td>:<input name="password" value="<?php echo $pass;?>" type="password" >
							<br><span><?php echo $err_pass;?></span>
						</td>
					</tr>

					<tr>
						<td align="right">Confirm Password</td>
						<td>:<input name="confirm_password" value="<?php echo $confirm_pass;?>" type="password" >
							<br><span><?php echo $err_confirm_pass;?></span>
						</td>

					</tr>

					<tr>
						<td align="right">Email</td>
						<td>
							:<input  type="text" name="email" value="<?php echo $email;?>"><br>
							<span><?php echo $err_email;?></span>
						</td>
					</tr>

					<tr>
						<td align="right">Phone</td>
						<td>
							:<input type="text" placeholder="code" name="phone_code" value="<?php echo $phone_code;?>"> - <input  type="text" placeholder="Number" name="phone_num" value="<?php echo $phone_num;?>">
							<br><span><?php echo $err_phone_code."&nbsp;&nbsp;"; echo $err_phone_num;?></span>
						</td>
					</tr>

					<tr>
						<td align="right" rowspan="3">Address</td>
						<td>
							:<input name="street" type="text" placeholder="Street Address" value="<?php echo $street;?>">
							<br><span><?php echo $err_street;?></span>
						</td>
					</tr>

					<tr>
						<td>
							&nbsp<input name="city" type="text" placeholder="City" value="<?php echo $city;?>"> - <input name="state" type="text" placeholder="State" value="<?php echo $state;?>">
							<br><span><?php echo $err_city;?></span> &nbsp; &nbsp;&nbsp; <span><?php echo $err_state;?></span>
						</td>
					</tr>

					<tr>
						<td>
							&nbsp<input name="postal" type="text" placeholder="Postal/Zip Code" value="<?php echo $postal;?>">
							<br> <span><?php echo $err_postal;?></span>
						</td>
					</tr>

					<tr>
						<td align="right">Birth Date</td>
						<td>:
							<select name="day">
								<option selected disabled>Day</option>
								<?php
										for($i=1;$i<32;$i++){
											if($day == $i)
													echo "<option selected>$i</option>";
											else
													echo "<option>$i</option>";
														}

									?>
							</select>

							<select name="month">
									<option selected disabled>Month</option>
									<?php
										foreach($months as $m){
													if($m == $month)
															echo "<option selected>$m</option>";
													else
															echo "<option>$m</option>";
																}
										?>
							</select>

							<select name="year">
									<option selected disabled>Year</option>
									<?php
											for($i=1990;$i<2001;$i++){
												if($year == $i)
														echo "<option selected>$i</option>";
												else
														echo "<option>$i</option>";
															}

										?>
							</select>
							<br><span><?php echo $err_day;?></span> &nbsp; &nbsp; <span><?php echo $err_month;?></span> &nbsp; &nbsp; <span><?php echo $err_year;?></span>
						</td>
					</tr>
			r>

					<tr>
						<td align="right">Gender</td>
						<td>:<input type="radio" value="Male" <?php if($gender == "Male") echo "checked";?> name="gender"> Male <input type="radio" <?php if($gender == "Female") echo "checked";?> value="Female" name="gender"> Female <br>
						<span><?php echo $err_gender;?></span></td>
					</tr>


					<tr>
						<td align="right">Where did you hear about us?</td>
						<td>
							<input value="A Friend or Colleague" name="infos[]" <?php if(aboutInfo("A Friend or Colleague")) echo "checked";?> type="checkbox" >A Friend or Colleague <br>
							<input value="Google" name="infos[]" <?php if(aboutInfo("Google")) echo "checked";?> type="checkbox">Google <br>
							<input value="Blog Post" name="infos[]" <?php if(aboutInfo("Blog Post")) echo "checked";?>  type="checkbox">Blog Post <br>
							<input value="News Aeticle" name="infos[]" <?php if(aboutInfo("News Aeticle")) echo "checked";?>  type="checkbox">News Aeticle
						<br>
						<span><?php echo $err_infos;?></span></td>
					</tr>

					<tr>
						<td align="right">Bio</td>
						<td>: <textarea name="bio"><?php echo $bio;?></textarea>
							<br><span><?php echo $err_bio;?></span>
						</td>
					</tr>

					<tr>
						<td align="right"><input type="submit" value="Register"></td>
					</tr>
				</table>
			</form>
		</fieldset>

	</body>
</html>
