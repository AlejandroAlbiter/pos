<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador"|| $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>';

		}

		if ($_SESSION["perfil"] == "Administrador") {

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<li class="active">

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>';
		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li class="active">

				<a href="categorias">

					<i class="fa fa-th"></i>
					<span>Sucursales</span>

				</a>

			</li>

			<li class="active">

				<a href="productos" >

					<i class="fa fa-product-hunt"></i>
					<span>Tipos de Movimientos</span>

				</a>

			</li>';

		}

		if( $_SESSION["perfil"] == "Vendedor"){

			echo '<li>

				<a href="clientes" class="active">

					<i class="fa fa-users"></i>
					<span>Contactos</span>

				</a>

			</li>';

		}

		if( $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">

				<a href="#" class="active">

					<i class="fa fa-list-ul"></i>
					
					<span>Transacciones</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="ventas">
							
							<i class="fa fa-circle-o"></i>
							<span>Transacciones</span>

						</a>

					</li>

					<li>

						<a href="crear-venta">
							
							<i class="fa fa-circle-o"></i>
							<span>Nueva Trsnsaccion</span>

						</a>

					</li>';

					if($_SESSION["perfil"] == "Administrador"){

					echo '<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de Transacciones</span>

						</a>

					</li>';

					}

				

				echo '</ul>

			</li>';

		}

		if (
			 $_SESSION["perfil"] == "Administrador"
		) {

			echo '<li class="treeview">

				<a href="#" class="active">

					<i class="fa fa-list-ul"></i>
					
					<span>Transacciones</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					';

			if ($_SESSION["perfil"] == "Administrador") {

				echo '<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de Transacciones</span>

						</a>

					</li>';
			}



			echo '</ul>

			</li>';
		}

		?>

		</ul>

	 </section>

</aside>