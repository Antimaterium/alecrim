<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Controle de estoque</title>
		<link rel="stylesheet" href="/css/app.css" type="text/css">

		<!-- MATERIAL ICONS -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- END MATERIAL ICONS -->

		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<!-- END BOOTSTRAP -->

	    <!-- Custom CSS -->
	    <link href="css/simple-sidebar.css" rel="stylesheet">

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
		
	</head>

	<body>

		<div id="wrapper" class="toggled">

	        <!-- Sidebar -->
	        <div id="sidebar-wrapper">
	            <ul class="sidebar-nav">
	                <li class="sidebar-brand">
	                    <a href="/">
	                        Alecrim
	                    </a>
	                </li>
	                <li>
	                    <a href="/">Home</a>
	                </li>
	                <li>
	                    <a href="#">Pedidos</a>
	                </li>
	                <li>
	                    <a href="#">Produtos</a>
	                    <ul style="list-style: none">
	                    	<li>
	                    		<a href=" adiciona-produtos">Adicionar Produtos</a>	
	                    	</li>
	                    	<li>
	                    		<a href="lista-produtos">Listagem de Produtos</a>
	                    	</li>
	                    </ul>
	                </li>
	                <li>
	                    <a href="#">Fornecedores</a>
	                </li>
	                <li>
	                    <a href="#">Caixa</a>
	                </li>
	            </ul>
	        </div>
	        <!-- /#sidebar-wrapper -->

	        <!-- Page Content -->
	        <div id="page-content-wrapper">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
					    	<div class="container">
								@yield('content')
							</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- /#page-content-wrapper -->

	    </div>
	    <!-- /#wrapper -->

		<!-- Menu Toggle Script -->
	    <script>
	    // script para fazer o toggle do side-bar
	    // $("#menu-toggle").click(function(e) {
	    //     e.preventDefault();
	    //     $("#wrapper").toggleClass("toggled");
	    // });
	    </script>

	</body>

</html>
