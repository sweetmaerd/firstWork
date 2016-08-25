<ul id="contact-columns" class="clearfix">
			
				<li>
					<img src="img/phone-icon.png" alt="" title="">
					<p>000 123 456 789</p>
				</li>
				
				<li>
					<img src="img/mail-icon.png" alt="" title="">
					<p><a href="mailto:#">address@email.com</a></p>
				</li>
				
				<li class="address">
					<img src="img/address-icon.png" alt="" title="">
					<p>
						123 Street Address,
						<br />
						Lovely City,
						<br />
						My Country
					</p>
				</li>
			
			</ul><!-- contact-columns end -->
			
			<div id="form-container" class="clearfix">
		
				<form id="contact-form" name="contact-form" method="post" action="submit.php">
						
					<div id="content-left">
							
						<ul id="contact-message">
							
							<li>
								<label for="message">Message:</label>
								<textarea name="message" id="message" class="validate[required]" cols="35" rows="5">{{ $_SESSION['post']['message']}}</textarea>
							</li>
								
						</ul>
								
					</div><!-- content-left end -->
					
							
					<div id="content-right">
							
						<ul id="contact-info">
							
							<li>
								<label for="name">Name:</label>
								<input type="text" class="validate[required,custom[onlyLetter]] " name="name" id="name" value="<?=$_SESSION['post']['name']?>" />
							</li>
				
							<li>
								<label for="email">Email:</label>
								<input type="text" class="validate[required,custom[email]] text-input" name="email" id="email" value="<?=$_SESSION['post']['email']?>" />
							</li>
				
							<li>
								<label for="subject">Subject:</label>
								<input type="text" class="validate[required] text-input" name="subject" id="subject" value="<?=$_SESSION['post']['subject']?>" />
							</li>
								
							<li>
								<label for="captcha"><?=$_SESSION['n1']?> + <?=$_SESSION['n2']?> =</label>
								<input type="text" class="validate[required,custom[onlyNumber]]" name="captcha" id="captcha" />
							</li>
								
						</ul>
								
						<div id="submit-btn"><input type="submit" name="button" id="button" class="submit" value="Submit" /></div>
						<?=$str?>
						<div id="contact-loading"><img src="contact-form/img/loading.gif" width="31" height="31" alt="loading" /></div>
								
					</div><!-- content-right end -->
							
      			</form>
				<?=$success?>
			
			</div><!-- form-container end -->