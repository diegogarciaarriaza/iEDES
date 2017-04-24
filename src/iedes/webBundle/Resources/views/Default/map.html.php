<?php

    $poisBD_php = array();
    
    if(isset($sedes) && $sedes){
        foreach ($sedes as $s){
            $subArray_php = array(
                'id' => $s->getId(),
                'nombre' => $s->getNombre(),
                'nombreBasico' => $s->getNombreBasico(),
                'direccion' => $s->getDireccion()->getRoute(),
                'cp' => $s->getDireccion()->getPostalCode(),
                'lat' => $s->getDireccion()->getLatitude(),
                'lng' => $s->getDireccion()->getLongitude(),
                'locality' => $s->getDireccion()->getLocality(),
                'adminArea2' => $s->getDireccion()->getAdminArea2(),
                'telefono' => $s->getTelefono(),
                'email' => $s->getEmail(),
                'sedefisica' => $s->getSedeFisica()
            );
            array_push($poisBD_php, $subArray_php);
        }
    }
    
    $poisJson = json_encode($poisBD_php);
?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script>
    function load() {
        
        //carga de los pois desde php a js     
        var PoiBD = <?php echo $poisJson ?>;
        var subPoiBD = PoiBD[0];
        var map;
        
        if(PoiBD.length === 1){
            map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng(subPoiBD['lat'], subPoiBD['lng']),
                scrollwheel: false,
                zoom: 13,
                mapTypeId: 'roadmap',
                minZoom: 8
            });
        }

        else{
            map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng(40.053203, -3.688323),
                scrollwheel: false,
                zoom: 6,
                mapTypeId: 'roadmap',
                minZoom: 4
                /*
                * hybrid    Displays a photographic map + roads and city names
                * roadmap   Displays a normal, default 2D map
                * satellite Displays a photographic map
                * terrain   Displays a map with mountains, rivers, etc.
                 */
            });
        }

        var infoWindow = new google.maps.InfoWindow;

        for (var i = 0; i < PoiBD.length; i++) {

            //recuperamos cada uno de los pois
            var subPoiBD = PoiBD[i];

            var id = subPoiBD['id'];
            var name = subPoiBD['nombre'];
            var basicName = subPoiBD['nombreBasico'];
            var address = subPoiBD['direccion'];
            var locality = subPoiBD['locality'];
            var adminArea2 = subPoiBD['adminArea2'];
            var cp = subPoiBD['cp'];
            var telefono = subPoiBD['telefono'];
            var email = subPoiBD['email'];
            var sedeFisica = subPoiBD['sedefisica'];

            var point = new google.maps.LatLng(
                parseFloat(subPoiBD['lat']),
                parseFloat(subPoiBD['lng']));

            var html;
            var addressDefinitivo = "";
            var image = "";

            if(sedeFisica == 1){
                image = "/img/delegaciones/" + basicName + ".png";
                addressDefinitivo = address + "<br />" + cp + ", " + locality + ", " + adminArea2 + "."

            }
            else{
                image = "/img/delegaciones/logoSede.png";
                addressDefinitivo = cp + ", " + locality + "."
            }

            html = "<table>" +
                        "<tr>" +
                            "<td>" + "<img class='borde' src=" + image + " alt='delegación iEDES Solenergy'>" + "</td>" +
                            "<td>" + 
                                "<h1>" + name + "</h1>" +
                                "<h5>" + addressDefinitivo + "</h5>" + 
                                "<h5> <a href='tel:" + telefono + "'>" + telefono + "</a> - " + 
                                "<a href='mailto:" + email + "'>" + email + "</a> </h5>" +
                            "</td>" +
                        "</tr>" +
                    "</table>";

            var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: '/img/pin.png'
            }); 

            bindInfoWindow(marker, map, infoWindow, html);
        }
    }
 
    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
 
    //]]>
 
  </script>

  <script>
    $(document).ready(function(){
        load();
    });
  </script>
 
<div id="map"></div>
