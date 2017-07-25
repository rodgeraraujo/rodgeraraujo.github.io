		<?php
			if($_POST) {
				$name = $_POST['name'];
				$content = $_POST['commentContent'];
				$handle = fopen("comment/comments.html","a");
	
				date_default_timezone_set('America/Sao_Paulo');
				$data = date('d/m/Y');
				$hora = date('H:i:s');
				fwrite($handle,"\n\t\t\t\t\t\t\t<div>\n"
							 . "\t\t\t\t\t\t\t\t<i><p>&ldquo;" . $content . "&rdquo;- <b>" .$name . "</b></p></i> \n"
							 . "\t\t\t\t\t\t\t\t<i style='font-size: 11px;'>" . $data .', ' . $hora . " - [Text version <a href='versions/version1.0.php'>1.0</a>]</i> \n"
							 . "\t\t\t\t\t\t\t\t<br/>\n"
							 . "\t\t\t\t\t\t\t</div>\n"
							 . "\t\t\t\t\t\t\t<br> \n");
				fclose($handle);
			}
		?>
			
				<br>	
					<br>
						<hr class='style14'> <br>
						<h3>Deixe um comentário!</h3>
						<br> <br>
						<center>
							<form action="" method = "POST">
								<input id="fomrComment" class="name" type = "text" name = "name" placeholder="Nome*" required><br/>
								<textarea id="fomrComment" class="comentText" rows = "5" cols = "30" name = "commentContent" placeholder="Comentário*" required></textarea><br/>
								<input id="fomrComment" class="submitComment" type = "submit" value = "Post"><br/>
							</form>
							<h4>Comentários recentes:</h4>
							<?php include "comment/comments.html";?>	
						</center>
	</body>
</html>