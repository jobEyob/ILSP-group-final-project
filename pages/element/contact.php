<?php

?>

<div id="bo">

<!-- advertising div -->

	
	<!-- Sliding div starts here -->
	<div id="slider" style="right:-342px;">
		<div id="sidebar" onclick="open_panel()">
			<img src="image/contact.png"/>
		</div>
		<div id="header">
				
					<h2>Contact Form</h2>
					<p>This is my form.Please fill it out.It's awesome!</p>
					<input type="text" name="dname" value="Your Name"/>
					<input type="text" name="demail" value="Your Email"/>
					<h4>Query type</h4>
                                        <select id="select2">
					        <option>General Query</option>
							<option>Presales</option>
							<option>Technical</option>
							<option>Others</option>
						</select>
					
                                        <textarea id="textarea"type="text" value="message">Message</textarea><br/>
                                        <button id="button2">Send Message</button>
				
		</div>
	</div>
	<!-- Sliding div ends here -->
</div>