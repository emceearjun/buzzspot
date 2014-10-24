<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

error_reporting(0);

if (!isset($_SESSION['userage']))
{
    session_start();
}

if ($_SESSION['userage'] != "above_21")
{
    $_SESSION['userage'] = "unknown";
}

?>
<head>
	<title>BuzzSpot</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/knockout.js"></script>
    <script src="js/authorize.js"></script>
    <script type="text/javascript">
    var obj;
    $(window).load(function(){
    obj = { session_name: "<?php echo $_SESSION['userage']; ?>" };
        if (obj.session_name == "unknown" || obj.session_name == "below_21")
        {
            $('#start-modal').modal('show');
        }
        else
        {
            <?php $_SESSION['userage'] = "above_21"; ?>            
        }
        $('#outlet-dropdown').on("click", ".outlet-select a", function(){
                var string = $(this).html();
                $('#outlet').text(string);
                    $.ajax({
                    url: 'ajax/list_table.php',
                    type: 'POST',
                    data: {msg: string},
                    success: function(data){
                        $('#display-table').html(data);
                    }
                });
            });
        $('#locality-dropdown').on("click", ".locality-select a", function(){
                var string = $(this).html();
                $('#locality').text(string);
            $('#outlet').text("Select Outlet");
                $.ajax({
                url: 'ajax/search_locality.php',
                type: 'POST',
                data: {msg: string},
                success: function(data){
                    $('#outlet-dropdown').html(data);
                }
                });
            });
        $('.city-select a').click(function(){
            var string = $(this).html();
            $('#city').text(string);
            $('#locality').text("Select Locality");
            $('#outlet').text("Select Outlet");
            $.ajax({
                url: 'ajax/search_city.php',
                type: 'POST',
                data: {msg: string},
                success: function(data){
                    $('#locality-dropdown').html(data);
                }
            });            
        });
        
    });
    </script>
</head>

<body>
    <div id="start-modal" class="modal fade" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Disclaimer</h4>
            </div>
            <div class="modal-body">
                <p>Please confirm your age before entering!</p>
                <button type="submit" class="btn btn-default" id="above-btn" data-dismiss="modal" onclick="set_session_for_above(obj)">I am above 21!</button>
                <button type="submit" class="btn btn-default" id="below-btn" data-dismiss="modal" onclick="set_session_for_below(obj)">I am below 21!</button>
            </div>
        </div>
    </div> 
</div>

    <div class="navbar navbar-inverse navbar-static-top">
           <div class="container">
                <div class="navbar-header">
                <a href="../buzzspot/" class="navbar-brand">
                    
                </a>
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                    
                    <span class="icon-bar"></span>                    
                </button>
                </div>
                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="link"><a href="."><font color="white">Home</font></a></li>
                        <li class="link"><a href="pages/about/"><font color="white">About</font></a></li>
                        <li class="link" style="border-right:0px"><a href="pages/our-team/"><font color="white">Our Team</font></a></li>
                    </ul>
                </div>
            </div>
        </div>
    
    <div class="container main-dropdown-container">
        <div class="row">
            <div class="col-md-4">
                <div class="btn-group">
                  <button type="button" class="btn btn-warning" id="city">Select City</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li class='city-select'><a href="#" id="delhi">Delhi</a></li>
                    <li class='city-select'><a href="#" id="gurgaon">Gurgaon</a></li>
                  </ul>
                </div>
            </div>
            <div class="col-md-4" id="locality-btn">
                <div class="btn-group">
                  <button type="button" class="btn btn-warning" id="locality">Select Locality</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu" id='locality-dropdown'>
                      
                  </ul>
                </div>
            </div>
            <div class="col-md-4" id="outlet-btn">
                <div class="btn-group">
                  <button type="button" class="btn btn-warning" id="outlet">Select Outlet</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu" id="outlet-dropdown">
                  </ul>
                </div>
            </div>
        </div>
    </div>
    
    <table class="table table-striped" id="display-table">
    
    </table>
    
    <div id="push"></div>
    
    <div class="navbar navbar-inverse navbar-fixed-bottom" id="footer">
        <div class="container footer">
            <p class="navbar-text footer-text"><font color="white">&copy 2014 BuzzSpot</font></p>
        </div>
    </div>
    
</body>
</html>
    