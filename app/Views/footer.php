<!DOCTYPE html>
<html>
<body>
	<footer id="contacto" class="footer">
	    <div class="container-fluid p-1 bg-body-secondary">
	        <form method="post" style="margin:5%">
	        	<div class="row">
	        		<h5 >Contáctanos</h5>
	        	</div>
	        	<div class="row">
	        		<div class="col-md-6">
		                <div class="form-group">
		                	
		                    <label for="nombre">Tu nombre:</label>
		                    <input type="text" class="form-control" id="nombre" name="nombre" required>
		                </div>
		                <div class="form-group">
		                    <label for="correo">Tu correo:</label>
		                    <input type="text" class="form-control" id="correo" name="correo">
		                </div>
		            </div>
		            <div class="col-md-6">
		                <div class="form-group">
		                    <label for="mensaje">Tu mensaje:</label>
		                    <textarea type="text" class="form-control" id="mensaje" name="mensaje"></textarea>
		                </div>
		            </div>
		        </div>
		        <div class="row">
		        	<div class="d-flex justify-content-end" style="margin-top:2%"> 
			        	<button type="submit" class="btn btn-secondary">Enviar mensaje</button>
			        </div>
		        </div>       
	        </form>
	    </div>
	</footer>

</body>
</html>