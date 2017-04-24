/* Created by jankoatwarpspeed.com */

(function($) {
    $.fn.formToWizard = function(options) {
        options = $.extend({  
            submitButton: "" 
        }, options); 
        
        var element = this;

        var steps = $(element).find("fieldset");
        var count = steps.size();
        var submmitButtonName = "#" + options.submitButton;
        $(submmitButtonName).hide();

        steps.each(function(i) {
            $(this).wrap("<div id='step" + i + "'></div>");
            $(this).append("<p id='step" + i + "commands'></p>");

            if (i == 0) {
                createNextButton(i);
                selectStep(i);
            }

            else if (i == count-3) {
                $("#step" + i).hide();
            }

            else if(i >= count-2 ){
                $("#step" + (count-1)).hide();
                $("#step" + (count-2)).hide();
            }

            else {
                $("#step" + i).hide();
                createPrevButton(i);
                createNextButton(i);
            }
        });

        function createPrevButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a id='" + stepName + "Prev' class='prev'> <------ </a>");

            $("#" + stepName + "Prev").bind("mouseover", function(e) {
                document.body.style.cursor = "pointer";
            });      

            $("#" + stepName + "Prev").bind("mouseout", function(e) {
                document.body.style.cursor = "default";
            });  

            $("#" + stepName + "Prev").bind("click", function(e) {

                $("#" + stepName).hide();

                if(i == 2){
                    $("#step" + (0)).show();
                    selectStep(0);
                }

                else if(i == 3){
                    $("#step" + (1)).show();
                    selectStep(1);
                }

                else if(i == 8){
                    $("#step" + (5)).show();
                    selectStep(5);
                }

                else if(i == 9){
                    $("#step" + (2)).show();
                    selectStep(2);
                }

                else if(i == 13){
                    $("#step" + (11)).show();
                    selectStep(11);
                }

                else{
                    $("#step" + (i - 1)).show();
                    $(submmitButtonName).hide();
                    selectStep(i - 1);
                }
            });
        }

        function createNextButton(i) {
            var stepName = "step" + i;

            var steps = $(element).find("fieldset");
            var count = steps.size();

            $("#" + stepName + "commands").append("<a id='" + stepName + "Next' class='next'> ------> </a>");

            $("#" + stepName + "Next").bind("mouseover", function(e) {
                document.body.style.cursor = "pointer";
            });      

            $("#" + stepName + "Next").bind("mouseout", function(e) {
                document.body.style.cursor = "default";
            });      

            $("#" + stepName + "Next").bind("click", function(e) {

                $("#" + stepName).hide();

                if(i == 0){
                    if(document.getElementById("vivienda").checked){
                        $("#step" + (1)).show();
                        selectStep(1);
                    }
                    else{
                        $("#step" + (2)).show();
                        selectStep(2);
                    }    
                }

                else if(i == 1){
                    if(document.getElementById("piso").checked){
                        $("#step" + (count-1)).show();
                        selectStep(count-1);
                    }
                    else{
                        $("#step" + (3)).show();
                        selectStep(3);
                    }
                }

                else if(i == 2){
                    $("#step" + (9)).show();
                    selectStep(9);
                }

                else if(i == 4){
                    var error=false;
                    $(".banner-rojo").hide();

                    if($("#cp").val() == "" || (!parseInt($("#datacp").val(), 10) || 0) || $("#datacp").val().length != 5){
                        $(".banner-rojo p").html('<p>Introduce un código postal válido</p>'); 
                        $(".banner-rojo").show();
                        error=true;
                    }

                    if(error==true){
                        $("#step" + (4)).show();
                        selectStep(4);
                    }
                    else{
                        $("#step" + (5)).show();
                        selectStep(5);
                    }
                }

                else if(i == 5){
                    if(document.getElementById("electrico").checked){
                        $("#step" + (8)).show();
                        selectStep(8);
                    }
                    else{
                        $("#step" + (6)).show();
                        selectStep(6);
                    }
                }

                else if(i == 7 || i == 8 || i == 13){
                    $("#step" + (count-3)).show();
                    selectStep(count-3);
                }

                else if(i == 9){
                    if(document.getElementById("local").checked){
                        $("#step" + (count-1)).show();
                        selectStep(count-1);
                    }
                    else{
                        $("#step" + (10)).show();
                        selectStep(10);
                    }
                }

                else if(i == 10){
                    var error=false;
                    $(".banner-rojo").hide();

                    if($("#cp").val() == "" || (!parseInt($("#neg_datacp").val(), 10) || 0) || $("#neg_datacp").val().length != 5){
                        $(".banner-rojo p").html('<p>Introduce un código postal válido</p>'); 
                        $(".banner-rojo").show();
                        error=true;
                    }

                    if(error==true){
                        $("#step" + (10)).show();
                        selectStep(10);
                    }
                    else{
                        $("#step" + (11)).show();
                        selectStep(11);
                    }
                }

                else if(i == 11){
                    if(document.getElementById("neg_electrico").checked){
                        $("#step" + (13)).show();
                        selectStep(13);
                    }
                    else{
                        $("#step" + (12)).show();
                        selectStep(12);
                    }
                }

                else{
                    $("#step" + (i + 1)).show();
                }

                /*if (i + 2 >= count)
                    $(submmitButtonName).show();*/
            });
        }

        function selectStep(i) {
            $("#steps li").removeClass("current");
            $("#stepDesc" + i).addClass("current");
        }

    }
})(jQuery); 