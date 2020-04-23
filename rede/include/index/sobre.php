<!--<ul class="nav nav-tabs">
  <li role="presentation" class="active" id="tt" value="cocada"><a href="#">Cocada</a></li>
  <li role="presentation" class="" id="tapioca" value="tapioca"><a href="#" onclick="CarregaAba(1, 'us')">Tapioca</a></li>
  <li role="presentation" class="" id="tt" value="coco"><a href="#">Coco gay</a></li>
</ul>-->

<div>


  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" onclick="CarregaAba(1, 'us')">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" onclick="CarregaAba(2, 'us')">Profile</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" onclick="CarregaAba(3, 'us')">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab" onclick="CarregaAba(4, 'us')">Settings</a></li>
  </ul>


  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
    	<?php
		echo $user->nome; 
		sucesso("<b>ah: </b> aviso.");
		aviso("<b>ah: </b> aviso.");
		alerta("<b>ah: </b> aviso.");
		problema("<b>ah: </b> aviso.");
		?>
	</div>
    <div role="tabpanel" class="tab-pane fade" id="profile">
      <script>alert("teste");CarregaAba('1','us');</script>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="messages">...</div>
    <div role="tabpanel" class="tab-pane fade" id="settings">...</div>
  </div>

</div>

