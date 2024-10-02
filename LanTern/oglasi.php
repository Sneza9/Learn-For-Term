<?php
    session_start();
    include('config/konekcija.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LanTern</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">

    <!-- plugin scripts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,500i,600,700,800%7CSatisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/kipso-icons/style.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/vegas.min.css">

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
	
	<!-- Dodaci za filter -->
	<script src="filter/js/jquery-1.10.2.min.js"></script>
    <script src="filter/js/jquery-ui.js"></script>
    <script src="filter/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="filter/css/bootstrap.min.css">
    <link href = "filter/css/jquery-ui.css" rel = "stylesheet">
    <link href="filter/css/style.css" rel="stylesheet">
	
</head>

<body>
    <div class="preloader"><span></span></div>
    <div class="page-wrapper">
        <?php include("sablon/meni.php");?>
        <section class="inner-banner">
            <div class="container">
                <ul class="list-unstyled thm-breadcrumb">
                    <li><a href="#">Početna</a></li>
                    <li class="active"><a href="#">Oglasi</a></li>
                </ul>
                <h2 class="inner-banner__title">Oglasi</h2>
            </div> 
        </section>
		<section class="course-one course-page">
            <div class="container">
                <div class="row">

                    <?php 
                        if(isset($_SESSION['idUloga']))  	
                        {
                    ?>	

                    <div class="col-md-3">                				
                        <div class="list-group">
                            <h3>Cena</h3>
                            <input type="hidden" id="hidden_minimum_price" value="0" />
                            <input type="hidden" id="hidden_maximum_price" value="10000" />
                            <p id="price_show">400 - 5000</p>
                            <div id="price_range"></div>
                        </div>				
                        <div class="list-group">
                            <h3>Grad</h3>
                        
                            <?php
                                $upit1 = mysqli_query($kon,"SELECT * FROM grad");
                                while($rezultat = mysqli_fetch_array($upit1))
                                {
                            ?>

                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector grad" value="<?php echo $rezultat['idGrad']; ?>" > 
                                    <?php echo $rezultat['nazivGrada'];?>
                                </label>
                            </div>

                            <?php
                                }
                            ?>
                        </div>

                        <div class="list-group">
                            <h3>Kategorija</h3>

                            <?php
                                $upit2 = mysqli_query($kon,"SELECT * FROM kategorija");
                                while($rezultat2 = mysqli_fetch_array($upit2))
                                {
                            ?>

                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector kategorija" value="<?php echo $rezultat2['idKategorija']; ?>" > 
                                    <?php echo $rezultat2['nazivKategorija']; ?>
                                </label>
                            </div>

                            <?php    
                                }
                            ?>
                        </div>
                    </div>

                    <?php 
                        }
                    ?>	
                    
                    <?php 
                        if(isset($_SESSION['idUloga']) && ($_SESSION['idUloga']=="1" || $_SESSION['idUloga']=="2"))  	
                        {
                    ?>

                    <div class="col-md-9">
                        <br />
                        <div class="row filter_data">
                        </div>
                    </div>

                    <?php 
                        }
                        else
                        {
                    ?>

                    <div class="col-md-12">
                        <br />
                        <div class="row filter_data">
                        </div>
                    </div>
                    
                    <?php 
                        }
                    ?>

                </div>
            </div> 
        </section>
		
       
        <?php include("sablon/footer.php");?>

    </div>

    <script src="assets/js/TweenMax.min.js"></script>

    <!-- template scripts -->
    <script src="assets/js/theme.js"></script>

<!--<style>
#loading
{
    text-align:center; 
    background: url('loader.gif') no-repeat center; 
    height: 150px;
}
</style>-->

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        //$('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'filter';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var grad = get_filter('grad');
        var kategorija = get_filter('kategorija');
        
        $.ajax({
            url:"filter.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, grad:grad, kategorija:kategorija},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:400,
        max:5000,
        values:[400, 5000],
        step:100,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});

</script>

</body>
</html>
