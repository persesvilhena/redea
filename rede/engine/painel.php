        <div>
          <ul class="nav nav-sidebar">
            <li><a href="index.php?perfil"><img src="fotos/<?php echo $row['foto']; ?>" width="100%" class="img-rounded"></a></li>
            <li><a href="index.php?index"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="index.php?perfil"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
            <li><a href="index.php?msg&i1=1"><span class="glyphicon glyphicon-envelope"></span> Mensagens
            <?php
                $cmensagem = mysqli_query($conecta, "select * from msg where (deid = '$id' or paraid='$id') and nw = '1' and nwus <> '$id'");
                $cont = 0;
                while($rmensagem = mysqli_fetch_array($cmensagem)){
                    $cont = $cont + 1;
                }
                if ($cont != 0){
                    echo "<font color=\"#ff0000\">(" . $cont . ")</font>";
                }
            ?></a></li>
            <li><a href="index.php?album"><span class="glyphicon glyphicon-picture"></span> Fotos</a></li>
            <!--<li><a href="index.php?musicas"><span class="glyphicon glyphicon-music"></span> Musicas</a></li>
            <li><a href="index.php?videos"><span class="glyphicon glyphicon-facetime-video"></span> Videos</a></li>-->
            <li><a href="index.php?contatos"><span class="glyphicon glyphicon-th-large"></span> Contatos</a></li>
            <li><a href="index.php?allusers"><span class="glyphicon glyphicon-th"></span> Todos os usuários</a></li>
            <li><a href="index.php?config"><span class="glyphicon glyphicon-cog"></span> Configurações</a></li>
            <li><a href="index.php?sobre"><span class="glyphicon glyphicon-info-sign"></span> Sobre</a></li>
          </ul>
        </div>