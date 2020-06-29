<!doctype html>
<html lang="pt">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmgQyyn79lnPCE93YHqplwWybPn0ZCiRQ&callback=initMap&libraries=&v=weekly" defer></script>
        <title>App View</title>
        <style type="text/css">
            html,body{
                width: 100%;
                height:100%;
            }
            #menu-head{
                float: left;
                width: 100%;
            }
            .corpo-principal {
                float: left;
                position: absolute;
                top: 56px;
                bottom: 58px;
                width: 100%;
                overflow: auto;
            }
            .menu-rodape {
                float: left;
                width: 100%;
                height: 58px;
                position: absolute;
                bottom: 0;
                color: #3c3f41;
                padding: 10px 5px 10px 5px;
                background-color: #212529;
            }
            .menu-rodape table {
                float: left;
                width: 100%;
                text-align: center;
                font-weight: normal;
            }
            .menu-rodape table tr a {
                text-decoration: none;
                font-weight: normal;
                font-size: 1.5em;
                text-decoration: none;
                color: #3c3f41;
            }
            #selected {
                color: #848586;
            }
			
			
			
			.gm-svpc {
				display: none;
			}
			.gmnoprint {
				display: none;
			}
			.gm-control-active{
				display: none;
			}
        </style>
        <script type="text/javascript">
			var map;
            function initMap() {
                    map = new google.maps.Map(document.getElementById("map"), {
                        center: {
                            lat: 0,
                            lng: 0
                        },
                        zoom: 16,
						styles:[
							{
								"featureType": "administrative",
								"elementType": "geometry",
								"stylers": [
									{
										"visibility": "off"
									}
								]
							},
							{
								"featureType": "poi",
								"stylers": [
									{
										"visibility": "off"
									}
								]
							},
							{
								"featureType": "road",
								"elementType": "labels.icon",
								"stylers": [
									{
										"visibility": "off"
									}
								]
							},
							{
								"featureType": "transit",
								"stylers": [
									{
										"visibility": "off"
									}
								]
							}
						]
                    });
					
					
					var icons = {
						meuloc: {
							icon: 'img/meuloc2_red.png'
						},
						rest: {
							icon: 'img/icone.png'
						}
					};
					
					var features = [
						{
							position: new google.maps.LatLng(-3.7874523, -38.4969083),
							type: 'rest',
							title: 'Restaurante 1'
						}, {
							position: new google.maps.LatLng(-3.7870127, -38.4975527),
							type: 'rest',
							title: 'Restaurante 2'
						}
					];
					
					// Create markers.
					for (var i = 0; i < features.length; i++) {
						var marker = new google.maps.Marker({
							position: features[i].position,
							icon: icons[features[i].type].icon,
							title: features[i].title,
							map: map
						});
					};

                }
			
			function MakerLocal(){
				if(navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(function(position){
						// ajusta a posição do marker para a localização do usuário
						/*marker.setPosition(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));*/
						var mylocal = {lat: position.coords.latitude, lng: position.coords.longitude};
						map.setCenter(mylocal);
						var markerlc = new google.maps.Marker({
							position: mylocal,
							map: map,
							icon: 'img/meuloc2_red.png',
							title: 'Meu Local'
						});
						setInterval(function(){ 
							markerlc.setPosition(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
						}, 1000);
					}, 
						function(error){ // callback de erro
						alert('Erro ao obter localização!');
						console.log('Erro ao obter localização.', error);
					});
				} else {
					console.log('Navegador não suporta Geolocalização!');
				}
				/*var mylocal = {lat: -3.7866488, lng: -38.497493};
				var markerlc = new google.maps.Marker({
					position: mylocal,
					map: map,
					icon: 'img/meuloc2_red.png',
					title: 'Meu Local'
				});
				setInterval(function(){ 
					markerlc.setPosition(mylocal);
				}, 1000);*/
			}
        </script>
    </head>
    <body onload='MakerLocal();'>
        <nav id="menu-head" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">iMenu</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="corpo-principal">
            <div style="width: 100%;height: 100%;" id="map"></div>
        </main>
        <footer class="menu-rodape">
            <table>
                <tr>
                    <td width='33%'><a id="selected" href="#"><i class="fas fa-map-marker-alt"></i></a></td>
                    <td width='34%'><a href="#"><i class="fas fa-qrcode"></i></a></td>
                    <td width='33%'><a href="#"><i class="fas fa-biking"></i></a></td>
                </tr>
            </table>
        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
