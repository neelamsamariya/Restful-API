<!DOCTYPE html>
<html>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
    <body>
    <p>Please select city to display weather</p>

    <select id="cities">
        <option value="select">Select City</option>
        <option value="Melbourne">Melbourne</option>
        <option value="Sydney">Sydney</option>
        <option value="Goldcoast">Gold Coast</option>
        <option value="Brisbane">Brisbane</option>
    </select>

    <p id="displayData"></p>
  
    <script type="text/javascript">
        $(document).ready(function() {
            $('select#cities').change(function(){
                var selectedCity = $(this).children("option:selected").val();
                if (selectedCity !== 'select') {
                    //alert("You have selected the country - " + selectedCity);                    
                    
                    var my_city = selectedCity + ',australia';
                    var my_key = 'XXXXXXXXXXXXX';                    
                    var uri="http://api.worldweatheronline.com/premium/v1/weather.ashx?q="+my_city+"&key="+my_key+"&format=json&date=today"+"&includeLocation=yes";
                    // uri-encode it to prevent errors :
                    uri=encodeURI(uri); 
                    //alert(uri);
                    $.ajax({
                      type : 'GET',
                      url : uri,
                      dataType : 'JSON',
                      success: function (response, status, xhr) {
                          $('#displayData').html("Today's temperature for " + response.data.nearest_area[0].areaName[0].value + " is " + response.data.current_condition[0].temp_C); 
                      },
                      error: function (xhr, status, error) {
                       alert('error' + error);
                      }
                    });                    
                }                
            });   
        });     
        
    </script>  
    </body>
</html>