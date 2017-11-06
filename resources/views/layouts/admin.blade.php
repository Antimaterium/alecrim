<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Alecrim</title>
		<link rel="stylesheet" href="/css/app.css" type="text/css">
		
		<!-- MATERIAL ICONS -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
		<!-- END MATERIAL ICONS -->

		<!-- Custom CSS -->
	    <link href="/css/simple-sidebar.css" type="text/css" rel="stylesheet"/>

	    <!-- stylesheet CSS -->
	    <link href="/css/stylesheet.css" type="text/css" rel="stylesheet"/>
	    <link href="/css/order.css" type="text/css" rel="stylesheet"/>	    
	    <link href="/css/home.css" type="text/css" rel="stylesheet"/>	    

	    <link rel="shortcut icon" href="/img/icons/favicon.ico" type="image/x-icon">

		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"/>
		<!-- END BOOTSTRAP -->

		<!-- DATEPICKER -->

		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script src="http://code.gijgo.com/1.6.1/js/gijgo.js" type="text/javascript"></script>
		<link href="http://code.gijgo.com/1.6.1/css/gijgo.css" rel="stylesheet" type="text/css" />
		<!-- END DATEPICKER -->
		
	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
		
	</head>


	<body>

		<nav class="navbar navbar-toggleable-md navbar-inverse header-dashboard">
			
			<a class="navbar-brand" href="/">Alecrim</a>

			<ul class="nav navbar-nav navbar-right">              
				<li id="user-name">{{ substr(Auth::user()->name, 0, 10) . '...' }}</li>
               	<li class="dropdown" id="logout">
                   <a href="#" class="dropdown-toggle link" data-toggle="dropdown" role="button">
            			<i class="material-icons" >exit_to_app</i>
                   </a>
                             
                   <ul class="dropdown-menu" role="menu">
                       <li>
                           <a href="/logout"> Sair</a>
                       </li>
                   </ul>
               	</li>
             
          </ul>

		</nav>

		<div id="wrapper" class="toggled body">

	        <!-- Sidebar -->
	        <div id="sidebar-wrapper">
	            <ul class="sidebar-nav">					
	                <li>
	                    <a href="#item-menu" class="principal_item_menu">
	                    	Itens
	                    	<i class="material-icons menu-left-side-icon">keyboard_arrow_down</i>
                    	</a>
	                    <ul class="link secundary-menu" id="item-menu">
	                    	<li>
	                    		<a href="/items/adicionar">Cadastrar</a>	
	                    	</li>
	                    	<li>
	                    		<a href="/items/index">Listar</a>
	                    	</li>
	                    </ul>
	                </li>
					<li>
						<a href="#order-menu"  class="principal_item_menu">
	                    	Pedidos
	                    	<i class="material-icons menu-left-side-icon">keyboard_arrow_down</i>
                    	</a>
	                    <ul class="link secundary-menu" id="order-menu">
	                    	<li>
	                    		<a href="/pedidos/pagos">Pagos</a>	
	                    	</li>
	                    	<li>
	                    		<a href="/pedidos/pendetes">Em aberto</a>
	                    	</li>
	                    </ul>
					</li>
	                <li>
	                    <a href="#product-menu" class="principal_item_menu">
	                    	Produtos
	                    	<i class="material-icons menu-left-side-icon">keyboard_arrow_down</i>
                    	</a>
	                    <ul class="link secundary-menu" id="product-menu">
	                    	<li>
	                    		<a href="/adiciona-produtos">Cadastrar</a>	
	                    	</li>
	                    	<li>
	                    		<a href="/lista-produtos">Listar</a>
	                    	</li>
	                    </ul>
	                </li>        
        
	                <li>
	                    <a href="#employee-menu" class="principal_item_menu">
	                    	Funcionários
	                    	<i class="material-icons menu-left-side-icon">keyboard_arrow_down</i>
                    	</a>
	                    <ul class="link secundary-menu" id="employee-menu">
	                    	<li><a href="/cadastrar-usuario">Cadastrar</a></li>
	                    	<li><a href="/listar-usuarios">Listar</a></li>
	                    </ul>
	                </li>
	                <li>
	                    <a href="#report-menu" class="principal_item_menu">
	                    	Relatório Financeiro
	                    	<i class="material-icons menu-left-side-icon">keyboard_arrow_down</i>
                    	</a>
	                    <ul class="link secundary-menu" id="report-menu">
	                    	<li><a href="{{route('report.spending')}}">Gastos</a></li>
	                    </ul>
	                </li>
	              </ul>
	        </div>
	        <!-- /#sidebar-wrapper -->

	        <!-- Page Content -->
	        <div id="page-content-wrapper">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
					    	<div class="container-fluid" id="app">
								@yield('content')
							</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- /#page-content-wrapper -->

	    </div>
	    <!-- /#wrapper -->

	    <!-- Inclusão do jQuery -->
	    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
	    
	    <!-- BOOTSTRAP -->
	    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

		<!-- Inclusão do app.js -->
		<script src="/js/app.js"></script>		
		
		<!-- Inclusão do Plugin jQuery Validation-->
	    <script src="/assets/dist/jquery.validate.min.js"></script>

	    <!-- Inclusão dos scripts utilizados nas views -->
	    @yield('project-scripts')
	    
		<!-- Menu Toggle Script -->
	   <!--  <script>
		   script para fazer o toggle do side-bar
		   $("#menu-toggle").click(function(e) {
		       e.preventDefault();
		       $("#wrapper").toggleClass("toggled");
		   });
	   </script> -->
		
	</body>

</html>
