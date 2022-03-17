<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>AI Traffic Control</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/album.css" rel="stylesheet">
  </head>

  <body data-new-gr-c-s-check-loaded="8.896.0" data-gr-ext-installed="">

    <header>
      <div class="bg-dark collapse" id="navbarHeader" style="">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">This research is focused on the issue and tries to prove a hypothesis where a deep learning-based automated system can detect cars violating speed rules and change lanes illegally. This system will help the existing traffic infrastructure to upgrade and become more efficient with lesser effort to change the full system itself. </p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                <li><a href="#" class="text-white">Like on Facebook</a></li>
                <li><a href="#" class="text-white">Email me</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
			<i class="fa-regular fa-traffic-light"></i>
            <strong>AI Traffic Control</strong>
          </a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Towards Deep Learning Based Automated Speed and Line Change Detection System in Perspective of Bangladesh.</h1>
          <!--<p class="lead text-muted">Something short and leading about 
the collection below—its contents, the creator, etc. Make it short and 
sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <button id="ajax" class="btn btn-primary my-2">Main call to action</button>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>-->
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row" id="chk">
			<?php
			foreach ($trafic_record as $row){
			echo'
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img id="imageresource'.$row["sl"].'" class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/png;base64, '.$row["img"].'" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text"><b style="color: #008000;">Location: '.$row["location"].'</b><br/>
                  <b style="color: #0066cc;">Timestamp: '.$row["date_time"].'</b><br/>
                  <br><b>Possible Violation: </b><br/><b>';
				  if($row["possible_violation"]=="Lane change and Over speed."){
					echo '<span style="color:#e6005c">'.$row["possible_violation"].'</span>';
				  }
				  else if($row["possible_violation"]=="Over Speed"){
					echo '<span style="color:#cc00ff">'.$row["possible_violation"].'</span>';
				  }
				  else{
					echo '<span style="color: #e67300;">'.$row["possible_violation"].'</span>';
				  }
					
					
				  echo'</b><br/>
                  Vehicle Class: '.strtoupper($row["type"]).'<br/>
                  Vehicle Speed: '.$row["speed"].' KM/H</p>
				  
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button id="'.$row["sl"].'" type="button" class="view btn btn-sm btn-outline-secondary">View</button>
                    </div>
                    <small class="text-muted">'.$count.'</small>
                  </div>
                </div>
              </div>
            </div>';
			}
			?>
			
			
			
          </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>This is an demo demonstration website © BUP.</p>
        <p>New to Bootstrap? <a href="https://getbootstrap.com/docs/4.0/">Visit the homepage</a> or read our <a href="https://getbootstrap.com/docs/4.0/getting-started/">getting started guide</a>.</p>
      </div>
    </footer>
	
	
	
<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: fit-content; max-width: 1000px;">
      <div class="modal-header">        
        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="width: 600px;" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/jquery-3.6.0.min.js"></script>
	
    
    <script src="<?php echo base_url();?>assets/popper.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/holder.js"></script>
	
	
	
	
<script type="text/javascript">

$(".view").on("click", function() {
	var id = $(this).attr('id');
	//alert(id);
   $('#imagepreview').attr('src', $('#imageresource'+id).attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
    //$('#ajax').click(function(){
    setInterval(function(){

       //var count = <?php echo $count?>;
       var count = parseInt($('.row small:first').html());
	   var u = "ajax_request";
	   var r = "<?php echo base_url()?>";
	   var l=r.concat(u);
	   //alert(count);

        $.ajax({
           url: l,
           type: 'POST',
           data: {count: count},
		   
           error: function() {
              alert('Something is wrong');
           },
		   
           success: function(data) {
                //$("#chk").append("<tr><td>"+title+"</td><td>"+description+"</td></tr>");
                //alert("Record added successfully");  
				//console.log(data);
				//$("#chk").html(data);
				$("#chk").prepend(data);
				//$(data).insertBefore("#chk");
           }

        });


    },5000); //1000 =1 second


</script>
  

<svg xmlns="http://www.w3.org/2000/svg" width="348" height="225" viewBox="0 0 348 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="17" style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>