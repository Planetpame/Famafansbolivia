<header>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">
              <h4 style="color:green;">  <?php @session_start(); 
                      if(isset($_SESSION["nombre"])){
                        echo $_SESSION["nombre"];
                      }
                      
                ?></h4>

             


                <!--Start Fama Fans-->
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                   <li>
                  <img src="http://static.hogarmania.com/archivos/201204/estrenimiento-gato-bebe2-xl-668x400x80xX.jpg" width="100" height="100" alt="Tamaño original" border="3"> 
                    </li>
                    <li>
                        <a href="indexa.php">About</a>
                    </li>

                     <li>
                        <a href="lugar.php">Adm Lugares</a>
                    </li>
                    <li>
                        <a href="organizador.php">Adm Organizadores</a>
                    </li>

                    <li>
                        <a href="artistas.php">Adm Artistas</a>
                    </li>
                    <li>
                        <a href="eve.php">Crear Evento</a>
                    </li>

                    <li>
                        <a href="registrar_boleto.php">Precios</a>
                    </li>
                     <li>
                        <a href="news.php">Publicar Noticia</a>
                    </li>


<li>
                        <a href="edit.php">Editar Noticia</a>
                    </li>

                    <li>
                        <a href="balance.php">Ver Estadisticas</a>
                    </li>

                    <li>
                        <a href="edit_user.php">Editar Perfil</a>
                    </li>
                
                    <?php
                    if(isset($_SESSION["nombre"])){
                        echo '<li><a href="../dope1/php/logout.php">Logout</a></li>';
                      }
                    ?>  
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



  
</header>




