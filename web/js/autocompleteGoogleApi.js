
function initialize(prefix) {
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
        
        var options = {
          types: ['(cities)'],
          //types:['address'],
          componentRestrictions: {country: "es"}
        }

        // Create the autocomplete object, restricting the search
        // to geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
          /** @type {HTMLInputElement} */(document.getElementById(prefix+'autocomplete')),
          options);
        // When the user selects an address from the dropdown,
        // populate the address fields in the form.
        google.maps.event.addListener(autocomplete, 'place_changed', function() { 
            fillInAddress(placeSearch, autocomplete, componentForm, prefix);
        });
        
    }

    // [START region_fillform]
    function fillInAddress(placeSearch, autocomplete, componentForm, prefix) { 
      // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace(); 
        
      //tenemos que borrar el contenido de los inputs
      document.getElementById(prefix+"route").value = null;
      document.getElementById(prefix+"street_number").value = null;
      document.getElementById(prefix+"postal_code").value = null;
      document.getElementById(prefix+"locality").value = null;
      document.getElementById(prefix+"administrative_area_level_3").value = null;
      document.getElementById(prefix+"administrative_area_level_2").value = null;
      document.getElementById(prefix+"administrative_area_level_1").value = null;
      document.getElementById(prefix+"country").value = null;



      // Get each component of the address from the place details
      // and fill the corresponding field on the form.
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];                 
        if (componentForm[addressType]) {                                       
          var data = place.address_components[i][componentForm[addressType]];    
          //almacenamos en el input de nuestro formulario, según su tipo
          if(addressType == "route"){ 
              $('#'+prefix+"route").val(data);
          }
          else if(addressType == "street_number"){
              $('#'+prefix+"street_number").val(data);
          }
          else if(addressType == "postal_code"){
              $('#'+prefix+"postalCode").val(data);
          }
          else if(addressType === "locality"){ 
              $('#'+prefix+'locality').val(data);
          }
          else if(addressType == "administrative_area_level_3"){
              $('#'+prefix+"administrative_area_level_3").val(data);
          }
          else if(addressType == "administrative_area_level_2"){
              $('#'+prefix+"administrative_area_level_2").val(data);
          }
          else if(addressType == "administrative_area_level_1"){
              $('#'+prefix+"administrative_area_level_1").val(data);
          }
          else if(addressType == "country"){
              $('#'+prefix+"country").val(data);
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