<?php $view->extend('::base.html.php');?>

<?php 
if($errors) { 
    echo $errors;
}

if($formularioEnviado){ 
    echo 'Su solicitud ha sido procesada, en breve nos pondremos en contacto con usted';
}
?>
<form action="
    <?php 
        echo $view['router']->generate('le_llamamos');
     ?> " 

     method="post" 
     onSubmit="return validar()"

     <?php echo $view['form']->enctype($form) ?> >

     <?php // echo $view['form']->widget($form) ?>
     <?php echo $view['form']->errors($form) ?>
     <?php echo $view['form']->row($form['nombre']) ?>
     <?php echo $view['form']->row($form['telefono1']) ?>
     localidad <input  id="autocomplete" placeholder="Introduzca su ciudad" 
                       onFocus="geolocate()" type="text" size="50" required/>

     <?php echo $view['form']->row($form['locality']) ?>

     <input name="route" id="route" disabled hidden/>
     <input name="street_number" id="street_number" disabled hidden/>
     <input name="postal_code" id="postal_code" disabled hidden/>
     <input name="locality" id="locality" disabled hidden/>
     <input name="administrative_area_level_3" id="administrative_area_level_3" disabled hidden/>
     <input name="administrative_area_level_2" id="administrative_area_level_2" disabled hidden/>
     <input name="administrative_area_level_1" id="administrative_area_level_1" disabled hidden/>
     <input name="country" id="country" disabled hidden/>

     <?php echo $view['form']->row($form['send']); ?>

     <?php //resto de campos del formulario ?>
     <div class="profile_hidden">
        <?php echo $view['form']->rest($form) ?>
     </div>
</form>

<?php //Carga de la API de google para la obtención de la dirección del usuario?>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

    <?php //API de google. Con un par de modificaciones para el guardado de los datos
           //en campos propios del formulario?>
        <script type="text/javascript">

        var placeSearch, autocomplete;
        var componentForm = {
          route: 'long_name',
          street_number: 'short_name',
          postal_code: 'short_name',
          locality: 'long_name',
          administrative_area_level_3: 'long_name',
          administrative_area_level_2: 'long_name',
          administrative_area_level_1: 'long_name',
          country: 'long_name'
        };

        function initialize() {
          
          // Create the autocomplete object, restricting the search
          // to geographical location types.
          autocomplete = new google.maps.places.Autocomplete(
              /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
              { types: ['geocode'] });
          // When the user selects an address from the dropdown,
          // populate the address fields in the form.
          google.maps.event.addListener(autocomplete, 'place_changed', function() {
            fillInAddress();
          });
        }

        // [START region_fillform]
        function fillInAddress() {
          // Get the place details from the autocomplete object.
          var place = autocomplete.getPlace();

          for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
          }

          //tenemos que borrar el contenido de los inputs
          $("#iedes_webbundle_usuariostemporalescreatetype_route").val('');
          $("#iedes_webbundle_usuariostemporalescreatetype_streetNumber").val('');
          $("#iedes_webbundle_usuariostemporalescreatetype_postalCode").val('');
          $("#iedes_webbundle_usuariostemporalescreatetype_locality").val('');
          $("#iedes_webbundle_usuariostemporalescreatetype_adminArea3").val('');
          $("#iedes_webbundle_usuariostemporalescreatetype_adminArea2").val('');
          $("#iedes_webbundle_usuariostemporalescreatetype_adminArea1").val('');
          $("#iedes_webbundle_usuariostemporalescreatetype_country").val('');


          // Get each component of the address from the place details
          // and fill the corresponding field on the form.
          for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
              var val = place.address_components[i][componentForm[addressType]];
              document.getElementById(addressType).value = val;
              
              //almacenamos en el input de nuestro formulario, según su tipo
              if(document.getElementById(addressType).name == "route"){
                  $("#iedes_webbundle_usuariostemporalescreatetype_route").val(val);
              }
              else if(document.getElementById(addressType).name == "street_number"){
                  $("#iedes_webbundle_usuariostemporalescreatetype_streetNumber").val(val);
              }
              else if(document.getElementById(addressType).name == "postal_code"){
                  $("#iedes_webbundle_usuariostemporalescreatetype_postalCode").val(val);
              }
              else if(document.getElementById(addressType).name == "locality"){
                  $("#iedes_webbundle_usuariostemporalescreatetype_locality").val(val);
              }
              else if(document.getElementById(addressType).name == "administrative_area_level_3"){
                  $("#iedes_webbundle_usuariostemporalescreatetype_adminArea3").val(val);
              }
              else if(document.getElementById(addressType).name == "administrative_area_level_2"){
                  $("#iedes_webbundle_usuariostemporalescreatetype_adminArea2").val(val);
              }
              else if(document.getElementById(addressType).name == "administrative_area_level_1"){
                  $("#iedes_webbundle_usuariostemporalescreatetype_adminArea1").val(val);
              }
              else if(document.getElementById(addressType).name == "country"){
                  $("#iedes_webbundle_usuariostemporalescreatetype_country").val(val);
              }
            }
          }
        }
        // [END region_fillform]

        // [START region_geolocation]
        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var geolocation = new google.maps.LatLng(
                  position.coords.latitude, position.coords.longitude);
              autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
                  geolocation));
            });
          }
        }
        // [END region_geolocation]


        //script 
        $(document).ready(function () {
            $("#iedes_webbundle_usuariostemporalescreatetype_locality").val('');
            $("#iedes_webbundle_usuariostemporalescreatetype_nombre").val('');
            $("#iedes_webbundle_usuariostemporalescreatetype_telefono1").val('');
            
            initialize();
            
            if($("#autocomplete").val() != null)
                 $("#autocomplete").val();
            });          

        </script>
    