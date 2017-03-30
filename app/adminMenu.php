<html>
  <head>
    <title>Scout 17: Admin menu</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="lib/css/bootstrap.min.css" />
    <link rel="stylesheet" href="lib/css/main.css" /> 
  </head>
  <?php
    $def_opt_str = 
      "<option>A_Portcullis</option>\n"
      . "<option>A_ChevalDeFrise</option>\n"
      . "<option>B_Ramparts</option>\n"
      . "<option>B_Moat</option>\n"
      . "<option>C_SallyPort</option>\n"
      . "<option>C_Drawbridge</option>\n"
      . "<option>D_RockWall</option>\n"
      . "<option>D_RoughTerrain</option>\n";
      
    $event_code_opt =
      "<option>NYRO</option>\n"
	    . "<option>NYSU</option>\n"
      . "<option>NYLI</option>\n";
  ?>

  <body>
    <div id="container">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" id="adminTab">
        <li class="active">
          <a href="#setcurrent" data-toggle="tab">Set Current</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="setcurrent">
          <div id="side">
            <!--input id="cur_event_cd" type="text" class="form-control" placeholder="Event code"-->
            <div class="form-group">
              <label for="cur_event_cd">Event Code</label>
              <select id="cur_event_cd" class="form-control">
                <?php echo $event_code_opt; ?>
              </select>
            </div> <!--event code form group-->
            
          </div> <!--left column setcurrent tab-pane -->
          <div id="center">
            <!--input id="cur_match_type" type="text" class="form-control" placeholder="Match type">
            <p>
              Types of matches: qualifications, practice
            </p-->
            <!--TODO: fix the fact that this lookup has qualificat and others have qualifications-->
            <div class="form-group">
              <label for="cur_match_type">Match Type</label>
              <select id="cur_match_type" class="form-control"> <!--placeholder doesn't work for select-->
                <option>qualificat</option>
                <option>practice</option>
              </select>
          </div> <!--match type form group-->

          </div> <!--center column setcurrent tab-pane -->
          <div id="side">
            <div class="input-group">
              <button type="button" id="cur_prev" class="btn btn-default btn-lg btn-block" onclick="cur_prev()">
                Previous
              </button>
              
              <!--TODO: the min and the max should be set from an event object-->
              <!--input id="cur_match_nr" type="number" class="form-control" min="1" max="65" placeholder="Match #"-->
              <input id="cur_match_nr" type="number" class="form-control" placeholder="Match #">
              
              <button type="button" id="cur_next" class="btn btn-default btn-lg btn-block" onclick="cur_next()">
                Next
              </button>
            </div> <!-- end current match number input-group -->

            <button type="button" id="cur_save" class="btn btn-danger btn-lg btn-block" onclick="saveCurrent()">
              Save
            </button>
          </div> <!--right column setcurrent tab-pane -->
        </div> <!--setcurrent tab-pane -->
      <div> <!--tab-content-->
      <div id="info" class="panel panel-default"></div>
      </div> <!--info panel at bottom-->
    </div> <!--container-->

    <script src="lib/js/jquery-1.10.1.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="lib/js/scout.js"></script>
    <script src="lib/js/adminMenu/adminMenu.js"></script>
    <script src="lib/js/adminMenu/saveCurrent.js"></script>
  </body>
</html>
