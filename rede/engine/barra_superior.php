    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php?index"><img src="engine/imgs/logo.png" height="25"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php?perfil"><img src="fotos/<?php echo $user->foto; ?>" class="img-rounded" style="width: 25px; height: 25px;"> <?php echo $row['nome'] . " " . $row['sobrenome']; ?></a></li>
            <li><a href="index.php?config">Configurações</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?index"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="index.php?perfil"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                <li><a href="index.php?msg&i1=1"><span class="glyphicon glyphicon-envelope"></span> Mensagens</a></li>
                <li><a href="index.php?album"><span class="glyphicon glyphicon-picture"></span> Fotos</a></li>
                <li><a href="index.php?contatos"><span class="glyphicon glyphicon-th-large"></span> Contatos</a></li>
                <li><a href="index.php?allusers"><span class="glyphicon glyphicon-th"></span> Todos os usuários</a></li>
                <li><a href="index.php?config"><span class="glyphicon glyphicon-cog"></span> Configurações</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="index.php?sobre"><span class="glyphicon glyphicon-info-sign"></span> Sobre</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-right" method="get" action="index.php?buscar">
            <input type="text" class="form-control" name="buscar" id="input1" placeholder="Pesquisar...">
          </form>
        </div>
      </div>
    </nav>