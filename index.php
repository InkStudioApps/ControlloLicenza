<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Controllo Licenza</title>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

        <script type="text/javascript">
          $(document).ready(function() {
                var min_chars = 16; //the lenght of the license
                var characters_error = 'La licenza deve essere di almeno 16 caratteri'; //error printed if the license not match the "min_chars"
                var checking_html = 'Controllo...'
                //when button is clicked 
                $('#controllo_licenza').click(function(){
                    //run the character number check
                    if($('#licenza').val().length < min_chars){
                        //if don't match the minimum show characters_error text
                        $('#risultato_controllo').html(characters_error);
                       
                    }else{			
                        //else show the cheking_text and run the function to check
                        $('#risultato_controllo').html(checking_html);
                        check_availability();
                    }
                });
          });
        //function to check the license	
        function check_availability(){
                //get the license written
                var licenza = $('#licenza').val();
                //use ajax to run the check
                $.post("controllo_licenza.php", { licenza: licenza },
                    function(result){
                        //if the result is 1
                        if(result == 1){
                            //show that the license is invalid
                            $('#risultato_controllo').html('Licenza non valida');
                        }else{
                            //show that the license is valid, in this case, we'll show a form submit to complete che registration
                            $('#risultato_controllo').html('<input type="submit" class="btn bg-olive btn-block" value="Registrati" name="submit">');
                        }
                });
        }
        </script>
    </head>
    
    
    
    <body>
        <form action="">
            <input type="text" name="licenza" class="form-control" id="licenza" placeholder="licenza, 16 caratteri"/>
            <input type='button' class="btn bg-olive btn-block" id='controllo_licenza' value='Controlla'>
            <div id='risultato_controllo'></div>
        </form>
    </body>
    
    
</html>