<?php
/* The function that creates the HTML on the front-end, based on the parameters
* supplied in the product-catalog shortcode */
function Insert_Register_Form($atts) {
	// Include the required global variables, and create a few new ones
	global $wpdb, $post, $user_message, $feup_success;
	global $ewd_feup_fields_table_name;

	$Custom_CSS = get_option("EWD_FEUP_Custom_CSS");
	$Salt = get_option("EWD_FEUP_Hash_Salt");
	$Username_Is_Email = get_option("EWD_FEUP_Username_Is_Email");
	$Use_Captcha = get_option("EWD_FEUP_Use_Captcha");
	$Login_Options = get_option("EWD_FEUP_Login_Options");
	if (!is_array($Login_Options)) {$Login_Options = array();}
	$Time = time();

	$feup_Label_Username =  get_option("EWD_FEUP_Label_Username");
	if ($feup_Label_Username == "") {$feup_Label_Username = __("Username", 'EWD_FEUP');}
	$feup_Label_Email =  get_option("EWD_FEUP_Label_Email");
	if ($feup_Label_Email == "") {$feup_Label_Email = __("Email", 'EWD_FEUP');}
	$feup_Label_Username =  get_option("EWD_FEUP_Label_Username");
	if ($feup_Label_Username == "") {$feup_Label_Username = __("Username", 'EWD_FEUP');}
	$feup_Label_Password =  get_option("EWD_FEUP_Label_Password");
	if ($feup_Label_Password == "") {$feup_Label_Password = __("Password", 'EWD_FEUP');}
	$feup_Label_Repeat_Password = get_option("EWD_FEUP_Label_Repeat_Password");
	if ($feup_Label_Repeat_Password == "") {$feup_Label_Repeat_Password = __("Repeat Password", 'EWD_FEUP');}
	$feup_Label_Password_Strength = get_option("EWD_FEUP_Label_Password_Strength");
	if ($feup_Label_Password_Strength == "") {$feup_Label_Password_Strength = __("Password Strength", 'EWD_FEUP');}
	$feup_Label_Too_Short = get_option("EWD_FEUP_Label_Too_Short");
	if ($feup_Label_Too_Short == "") {$feup_Label_Too_Short = __("Too Short", 'EWD_FEUP');}
	$feup_Label_Confirm_Email_Message =  get_option("EWD_FEUP_Label_Confirm_Email_Message");
	if ($feup_Label_Confirm_Email_Message == "") {$feup_Label_Confirm_Email_Message = __("Thanks for confirming your e-mail address!", 'EWD_FEUP');}
	$feup_Label_Incorrect_Confirm_Message =  get_option("EWD_FEUP_Label_Incorrect_Confirm_Message");
	if ($feup_Label_Incorrect_Confirm_Message == "") {$feup_Label_Incorrect_Confirm_Message = __("The confirmation number provided was incorrect. Please contact the site administrator for assistance.", 'EWD_FEUP');}

	$Payment_Frequency = get_option("EWD_FEUP_Payment_Frequency");
	$Payment_Types = get_option("EWD_FEUP_Payment_Types");
	$Membership_Cost = get_option("EWD_FEUP_Membership_Cost");
	$Levels_Payment_Array = get_option("EWD_FEUP_Levels_Payment_Array");

	$feup_required_field_symbol = " <span class='ewd-feup-req-symbol'>".get_option("EWD_FEUP_Required_Field_Symbol")."</span>";

	$Sql = "SELECT * FROM $ewd_feup_fields_table_name ORDER BY Field_Order";
	$Fields = $wpdb->get_results($Sql);

	if (in_array("Facebook", $Login_Options) or in_array("Twitter", $Login_Options)) {
		$Logged_In_User = EWD_FEUP_Get_External_Login(); // in Insert_Login_Form.php
	}
	if (!is_array($Logged_In_User)) {$Logged_In_User['Login_Status'] = "None";}

	if ($Logged_In_User['Login_Status'] == "Facebook") {$Registration_Type = "Facebook";}
	elseif ($Logged_In_User['Login_Status'] == "Twitter") {$Registration_Type = "Twitter";}
	else {$Registration_Type = "FEUP";}


	$ReturnString = "<style type='text/css'>";
	$ReturnString .= $Custom_CSS;
	$ReturnString .= EWD_FEUP_Add_Modified_Styles();
	$ReturnString .= "</style>";

	// Get the attributes passed by the shortcode, and store them in new variables for processing
	extract( shortcode_atts( array(
				'redirect_page' => '#',
				'redirect_field' => "",
				'redirect_array_string' => "",
				'submit_text' => __('Register', 'EWD_FEUP')),
			$atts
		)
	);
	if (get_option("EWD_FEUP_Label_Register") != "") {$submit_text = get_option("EWD_FEUP_Label_Register");}

	if (isset($_GET['ConfirmEmail'])) {$ConfirmationSuccess = ConfirmUserEmail();}

	if ($_POST['Payment_Required'] == "Yes" or isset($_POST['PayPal_Username_Submit'])) {
		if ($feup_success or isset($_POST['PayPal_Username_Submit']) and $Payment_Frequency != "None") {
			if (($Payment_Types == "Membership" and is_numeric($Membership_Cost) and $Membership_Cost != "") or
				($Payment_Types == "Levels" and sizeof($Levels_Payment_Array) >0 )) {

				$ReturnString .= do_shortcode("[account-payment]");
				return $ReturnString;
			}
		}
	}

	if ($feup_success and $redirect_field != "") {$redirect_page = Determine_Redirect_Page($redirect_field, $redirect_array_string, $redirect_page);}

	if ($feup_success and $redirect_page != '#') {FEUPRedirect($redirect_page);}

	if (!isset($ConfirmationSuccess)) {
		$ReturnString .= "<div id='ewd-feup-register-form-div' class='ewd-feup-form-div'>";
		if (isset($user_message['Message'])) {$ReturnString .= $user_message['Message'];}
		if ((in_array("Facebook", $Login_Options) or in_array("Twitter", $Login_Options)) and $Logged_In_User['Login_Status'] == "None") {
			$ReturnString .= "<div class='ewd-feup-social-registration-options'>";
			if (in_array("Facebook", $Login_Options)) {
				$ReturnString .= "<div class='ewd-feup-login-option' id='ewd-feup-facebook-login'>";
				$ReturnString .= "<a href='" . $Logged_In_User['Facebook_Login_URL'] . "'><img src='" . EWD_FEUP_CD_PLUGIN_URL . "images/fb_login.png'></a>";
				$ReturnString .= "</div>";
			}
			if (in_array("Twitter", $Login_Options)) {
				$ReturnString .= "<div class='ewd-feup-login-option' id='ewd-feup-twitter-login'>";
				$ReturnString .= "<a href='" . $Logged_In_User['Twitter_Login_URL'] . "'><img src='" . EWD_FEUP_CD_PLUGIN_URL . "images/sign-in-with-twitter.png'></a>";
				$ReturnString .= "</div>";
			}
			$ReturnString .= "</div>";
		}
		$ReturnString .= "<form action='#' method='post' id='ewd-feup-register-form' class='feup-pure-form feup-pure-form-aligned' enctype='multipart/form-data'>";
		$ReturnString .= "<input type='hidden' name='ewd-feup-check' value='" . sha1(md5($Time.$Salt)) . "'>";
		$ReturnString .= "<input type='hidden' name='ewd-feup-time' value='" . $Time . "'>";
		$ReturnString .= "<input type='hidden' name='ewd-feup-action' value='register'>";
		$ReturnString .= "<input type='hidden' name='ewd-registration-type' value='" . $Registration_Type . "'>";
		$ReturnString .= "<input type='hidden' name='ewd-feup-post-id' value='" . $post->ID . "'>";
		if ($Payment_Frequency != "None") {$ReturnString .= "<input type='hidden' name='Payment_Required' value='Yes' />";}
		if ($Registration_Type == "Facebook" or $Registration_Type == "Twitter") {
			if ($Registration_Type == "Twitter") {$Twitter_Vars = unserialize(stripslashes($_COOKIE['EWD_FEUP_request_vars']));}
			if ($Registration_Type == "Facebook") {$ReturnString .= "<input type='hidden' name='Third_Party_ID' value='" . $Logged_In_User['Facebook_Profile']['id'] . "'>";}
			if ($Registration_Type == "Twitter") {$ReturnString .= "<input type='hidden' name='Third_Party_ID' value='" . $Twitter_Vars['user_id'] . "'>";}
			if ($Username_Is_Email == "Yes") {
				if ($Registration_Type == "Facebook") {$ReturnString .= "<input type='hidden' name='Username' value='" . $Logged_In_User['Facebook_Profile']['email'] . "'>";}
				if ($Registration_Type == "Twitter") {$ReturnString .= "<input type='hidden' name='Username' value='" . $_COOKIE['EWD_FEUP_Email'] . "'>";}
				if (($Registration_Type == "Twitter" and $_COOKIE['EWD_FEUP_Email'] == "") or ($Registration_Type == "Facebook" and $Logged_In_User['Facebook_Profile']['email'] == "")) {$ReturnString .= __("No email address from your profile, please hit 'Logout' and use the full form.", 'EWD_FEUP');}
			}
			else {
				if ($Registration_Type == "Facebook") {$ReturnString .= "<input type='hidden' name='Username' value='" . $Logged_In_User['Facebook_Profile']['id'] . "'>";}
				if ($Registration_Type == "Twitter") {$ReturnString .= "<input type='hidden' name='Username' value='" . $Twitter_Vars['user_id'] . "'>";}
			}
			if ($Registration_Type == "Facebook") {$Generated_Password = substr(md5($Logged_In_User['Facebook_Profile']['id']), 0, 15);}
			if ($Registration_Type == "Twitter") {$Generated_Password = substr(md5($Twitter_Vars['user_id']), 0, 15);}
			$ReturnString .= "<input type='hidden' class='ewd-feup-text-input ewd-feup-password-input' name='User_Password' value='" . $Generated_Password . "'>";
			$ReturnString .= "<input type='hidden' class='ewd-feup-text-input ewd-feup-check-password-input' name='Confirm_User_Password' value='" . $Generated_Password . "'>";
			$ReturnString .= "<div class='feup-pure-control-group'><label class='ewd-feup-field-label'></label>";
			$ReturnString .= __("Logging in with ", 'EWD_FEUP') . $Registration_Type;
			if ($Registration_Type == "Facebook") {$ReturnString .= " (" . $Logged_In_User['Facebook_Output'] . ")";}
			if ($Registration_Type == "Twitter") {$ReturnString .= " (" . $Logged_In_User['Twitter_Output'] . ")";}
			$ReturnString .= "</div>";
		}
		else {
			$ReturnString .= "<div class='feup-pure-control-group'>";
			if ($Username_Is_Email == "Yes") {
				$ReturnString .= "<label for='Username' id='ewd-feup-register-username-div' class='ewd-feup-field-label'>" . $feup_Label_Email . ": <span class='req-symbol'>*</span></label>";
				if (isset($_POST['Username'])) {
					$ReturnString .= "<input type='email' class='ewd-feup-text-input' name='Username' value='" . $_POST['Username'] . "'>";
				} else {
					$ReturnString .= "<input type='email' class='ewd-feup-text-input' name='Username' placeholder='" .	$feup_Label_Email . "...'>";
				}
			} else {
				$ReturnString .= "<label for='Username' id='ewd-feup-register-username-div' class='ewd-feup-field-label'>" . $feup_Label_Username . ": </label>";
				if (isset($_POST['Username'])) {$ReturnString .= "<input type='text' class='ewd-feup-text-input' name='Username' value='" . $_POST['Username'] . "'>";}
				else {$ReturnString .= "<input type='text' class='ewd-feup-text-input' name='Username' placeholder='" . 	$feup_Label_Username . "...'>";}
			}
			$ReturnString .= "</div>";
			$ReturnString .= "<div class='feup-pure-control-group'>";
			$ReturnString .= "<label for='Password' id='ewd-feup-register-password-div' class='ewd-feup-field-label'>" . $feup_Label_Password . ":".$feup_required_field_symbol."</label>";
			if (isset($_POST['User_Password'])) {$ReturnString .= "<input type='password' class='ewd-feup-text-input ewd-feup-password-input' name='User_Password' value='" . $_POST['User_Password'] . "'>";}
			else {$ReturnString .= "<input type='password' class='ewd-feup-text-input ewd-feup-password-input' name='User_Password'>";}
			$ReturnString .= "</div>";
			$ReturnString .= "<div class='feup-pure-control-group'>";
			$ReturnString .= "<label for='Repeat Password' id='ewd-feup-register-password-confirm-div' class='ewd-feup-field-label'>" . $feup_Label_Repeat_Password . ":".$feup_required_field_symbol."</label>";
			if (isset($_POST['Confirm_User_Password'])) {$ReturnString .= "<input type='password' class='ewd-feup-text-input ewd-feup-check-password-input' name='Confirm_User_Password' value='" . $_POST['Confirm_User_Password'] . "'>";}
			else {$ReturnString .= "<input type='password' class='ewd-feup-text-input ewd-feup-check-password-input' name='Confirm_User_Password'>";}
			$ReturnString .= "</div>";
			$ReturnString .= "<div class='feup-pure-control-group'>";
			$ReturnString .= "<label for='Password Strength' id='ewd-feup-password-strength' class='ewd-feup-field-label'>" . $feup_Label_Password_Strength . ": </label>";
			$ReturnString .= "<span id='ewd-feup-password-result'>" . $feup_Label_Too_Short . "</span>";
			$ReturnString .= "</div>";
		}

		foreach ($Fields as $Field) {
			if ($Field->Field_Required == "Yes") {
				$Req_Text = "required";
			} else {
				$Req_Text = "";
			}
			$ReturnString .= "<div class='feup-pure-control-group'>";
			if ($Field->Field_Type == "label") {
				$ReturnString .= "<div id='ewd-feup-register-input-" . $Field->Field_ID . "' class='ewd-feup-label'><span>". __($Field->Field_Name, 'EWD_FEUP') . "</span><span class='ewd-feup-label-description'>".$Field->Field_Description."</span></div>";
			} else {
			$ReturnString .= "<label for='" . $Field->Field_Name . "' id='ewd-feup-register-" . $Field->Field_ID . "' class='ewd-feup-field-label'>" . __($Field->Field_Name, 'EWD_FEUP'). ":" . $feup_required_field_symbol . "</label>";
			}
			if ($Field->Field_Type == "text" or $Field->Field_Type == "mediumint") {
				if (isset($_POST[str_replace(" ", "_", $Field->Field_Name)])) {$ReturnString .= "<input name='" . $Field->Field_Name . "' id='ewd-feup-register-input-" . $Field->Field_ID . "' class='ewd-feup-text-input pure-input-1-3' type='text' value='" . $_POST[str_replace(" ", "_", $Field->Field_Name)] . "' " . $Req_Text . "/>";}
				else {$ReturnString .= "<input name='" . $Field->Field_Name . "' id='ewd-feup-register-input-" . $Field->Field_ID . "' class='ewd-feup-text-input' type='text' placeholder='" . $Field->Field_Name . "' " . $Req_Text . "/>";}
			}
			elseif ($Field->Field_Type == "date") {
				$ReturnString .= "<input name='" . $Field->Field_Name . "' id='ewd-feup-register-input-" . $Field->Field_ID . "' class='ewd-feup-date-input' type='date' value='" . $Value . "' " . $Req_Text . "/>";
			}
			elseif ($Field->Field_Type == "datetime") {
				$ReturnString .= "<input name='" . $Field->Field_Name . "' id='ewd-feup-register-input-" . $Field->Field_ID . "' class='ewd-feup-datetime-input' type='datetime-local' value='" . $Value . "' " . $Req_Text . "/>";
			}
			elseif ($Field->Field_Type == "picture") {
				$ReturnString .= "<input name='" . $Field->Field_Name . "' id='ewd-feup-register-input-" . $Field->Field_ID . "' class='ewd-feup-date-input' type='file' value='' " . $Req_Text . "/>";
			}
			elseif ($Field->Field_Type == "file") {
				$ReturnString .= "<input name='" . $Field->Field_Name . "' id='ewd-feup-register-input-" . $Field->Field_ID . "' class='ewd-feup-date-input' type='file' value='' " . $Req_Text . "/>";
			}
			elseif ($Field->Field_Type == "textarea") {
				$ReturnString .= "<textarea name='" . $Field->Field_Name . "' id='ewd-feup-register-input-" . $Field->Field_ID . "' class='ewd-feup-textarea' " . $Req_Text . ">" . $_POST[str_replace(" ", "_", $Field->Field_Name)] . "</textarea>";
			}
			elseif ($Field->Field_Type == "select" or $Field->Field_Type == "countries") {
				$Options = explode(",", $Field->Field_Options);
				if ($Field->Field_Type == "countries") {$Options = EWD_FEUP_Return_Country_Array();}
				$ReturnString .= "<select name='" . $Field->Field_Name . "' id='ewd-feup-register-input-" . $Field->Field_ID . "' class='ewd-feup-select'>";
			 	foreach ($Options as $Option) {
					$ReturnString .= "<option value='" . $Option . "' ";
					if (isset($_POST[str_replace(" ", "_", $Field->Field_Name)]) and $Option == $_POST[str_replace(" ", "_", $Field->Field_Name)]) {$ReturnString .= "selected='selected'";}
					$ReturnString .= ">" . $Option . "</option>";
				}
				$ReturnString .= "</select>";
			}
			elseif ($Field->Field_Type == "radio") {
				$Counter = 0;
				$Options = explode(",", $Field->Field_Options);
				foreach ($Options as $Option) {
					if ($Counter != 0) {$ReturnString .= "</div><div class='feup-pure-control-group ewd-feup-negative-top'><label class='feup-pure-radio'></label>";}
					$ReturnString .= "<input type='radio' name='" . $Field->Field_Name . "' value='" . $Option . "' class='ewd-feup-radio' " . $Req_Text . " ";
					if (isset($_POST[str_replace(" ", "_", $Field->Field_Name)]) and $Option == $_POST[str_replace(" ", "_", $Field->Field_Name)]) {$ReturnString .= "checked='checked'";}
					$ReturnString .= ">" . $Option  . "<br/>";
					$Counter++;
				}
			}
			elseif ($Field->Field_Type == "checkbox") {
  				$Counter = 0;
				$Options = explode(",", $Field->Field_Options);
				foreach ($Options as $Option) {
					if ($Counter != 0) {$ReturnString .= "</div><div class='feup-pure-control-group ewd-feup-negative-top'><label class='feup-pure-radio'></label>";}
					$ReturnString .= "<input type='checkbox' name='" . $Field->Field_Name . "[]' value='" . $Option . "' class='ewd-feup-checkbox' " . $Req_Text . " ";
					if (isset($_POST[str_replace(" ", "_", $Field->Field_Name)])) {if (in_array($Option, $_POST[str_replace(" ", "_", $Field->Field_Name)])) {$ReturnString .= "checked";}}
					$ReturnString .= ">" . $Option . "</br>";
					$Counter++;
				}
			}
			if ($Field->Field_Type !== "label") {
				$ReturnString .= "<span class='ewd-feup-label-description'>".$Field->Field_Description."</span></div>";
			}
			unset($Req_Text);
		}

		if ($Use_Captcha == "Yes") {$ReturnString .= EWD_FEUP_Add_Captcha();}
		$ReturnString .= "<div class='feup-pure-control-group'><label for='submit'></label><input type='submit' class='ewd-feup-submit feup-pure-button feup-pure-button-primary' name='Register_Submit' value='" . $submit_text . "'></div>";
		$ReturnString .= "</form>";
		$ReturnString .= "</div>";
	}
	else {
		$ReturnString = "<div class='ewd-feup-email-confirmation'>";
		if ($ConfirmationSuccess == "Yes") {$ReturnString .= $feup_Label_Confirm_Email_Message ;}
		if ($ConfirmationSuccess == "No") {$ReturnString .= $feup_Label_Incorrect_Confirm_Message ;}
		$ReturnString .= "</div>";
	}

	return $ReturnString;
}
add_shortcode("register", "Insert_Register_Form");
