
<!DOCTYPE html>
<html>
<head>
  <title>Funded Projects</title>
	<script src="jquery/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="all" href="css/style1.css">
  <style type="text/css">

  .button {
    width:150px;
    border-radius: 4px;
    background-color:#d55555;
    border: none;
    color: #FFFFFF;
    text-align: center;
    font-size: 17px;
    padding: 10px;

    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
  }
  .button:hover
  {
    box-shadow: 3px 3px tomato;
  }

  .button span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
  }

  .button span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -15px;
    transition: 0.5s;
  }

  .button:hover span {
    padding-right: 25px;
  }

  .button:hover span:after {
    opacity: 1;
    right: 0;
  }
  .add{
    position:absolute;
    top:0;
    left-300;
    right:0;
    font-size:250%;

  }

  </style>
</head>
<script>
$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    $.ajax({
      url:"fetch.php",
      method:"post",
      data:{query:query},
      success:function(data)
      {
        $('#search_text').html(data);
      }
    });
  }

  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();
    }
  });
});
</script>


<body>
  <center><h1>Funded Projects</h1></center>
  <hr>
  <a href="publish.php"> <button type="button" name="submit" style="float:left;"><span>Go Back</span></button></a>
  <div class="container">
    <form method="post" action="store1.php" enctype="multipart/form-data">
        <center><b><h3>Consultancy Projects</h3></b></center>

        <h3>Faculty Name</h3>
        <div class="input-group input-group-icon">
        <input type="text" list="search_text" name="name" required placeholder="Name"><br>
        <datalist name="search_text" id="search_text"/></datalist>
      </div>
          <h3>Title of the Project</h3>
              <div class="input-group input-group-icon">
                <input type="text" placeholder="Title of the project" name="title" required />
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
              </div>
              <h3>Name of Company</h3>
              <div class="input-group input-group-icon">
                <input type="text" placeholder="Name of the Company" name="name1" required />
                <div class="input-icon"><i class="fa fa-user"></i></div>
              </div>
              <h3>Total Amount</h3>
              <div class="input-group input-group-icon">
                <input type="text" placeholder="Total Amount" name="title1" required  pattern="[0-9]{1,}" />
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
              </div>
              <h3>Period of support</h3>
              <div class="input-group input-group-icon">
                <input type="date" placeholder="From" min="1" name="pfrom" required/>
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
              </div>
              <div class="input-group input-group-icon">
                <input type="date" placeholder="To" min="1" name="pto" required />
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
              </div>
              <h4>Status</h4>
              <div class="input-group">
                <input type="radio" name="ugc" value="completed" id="completed"/>
                <label for="completed">Completed</label>
                <input type="radio" name="ugc" value="ongoing" id="ongoing"/>
                <label for="ongoing">On-going</label>
              </div>
                <h3>Upload File:</h3>
                <input type="file" id="File" name="pdf" accept=".pdf" />
                  <center><input type="submit" name="submit" class="button" value="Submit">
                  <input type="reset" name="reset" class="button" value="Reset"></center>
            </form>
          </div>
        </body>
        </html>
