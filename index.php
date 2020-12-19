<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <!--- bootstrap cdn --->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    
</head>
<body>

    <div class="container">
        <div class="col-md-12">
            <div class="result">

            </div>
        </div>
    </div>
    

    <!--- jqury cdn --->
    <script type="text/javascript" src="jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->


    <script type="text/javascript">
    
        $(document).ready(function(){

            load_data();
            function load_data(){

                $.ajax({
                    url: "load_data.php",
                    method: "POST",
                    success: function(data){
                        $(".result").html(data);
                    }
                });

            }

            $(document).on("click", ".delete", function(){
                var id = $(this).attr("id");
                $.ajax({
                    url: "delete_user.php",
                    method: "POST",
                    data: {id:id},
                    success: function(data){
                        load_data();
                    }
                })
            });
        });
    </script>
</body>
</html>