<!DOCTYPE html>
<html lang="en">

<!--  advsearch   -->

<head>
    <title>Advance-Search</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script language="Javascript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
    <script language="JavaScript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
</head>

<body>

<?php

   require_once ("../head/head_content.php");

?>

<div class="container" style="padding-bottom:100px;">
    <div class="row" style="padding-top:80px;">
        <ol class="breadcrumb">
            <li><a href="http://dracp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dracp.cpu-bioinfor.org/search">Search</a></li>
            <li class="active">Advanced Search</li>
        </ol>
    </div>

        

   <!-- the content -->
   
   <div class="col-md-3">
        <div class="panel panel-success" style="margin-top:30px; border: 1px solid #9dbaac;">
            <div class="panel-heading">
                <h3 class="panel-title" style="color: #a5642e;">Search menu</h3></a>
            </div>
            <div class="panel-body" >
                <a href="http://dracp.cpu-bioinfor.org/search/index.php">
                    <span style="display: flex; justify-content: space-between;">
                        <p>Simple search</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                          <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>
                        </svg>
                    </span>
                </a>

                    <span style="display: flex; justify-content: space-between;">
                        <p>Advanced search</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                          <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                        </svg>
                    </span>
                <!--</a>-->
                <a href="http://dracp.cpu-bioinfor.org/search/drugsearch.php">
                    <span style="display: flex; justify-content: space-between;">
                        <p style="margin: 0;">Drug search</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
                          <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-9">
    
        <div style="width: 700px; margin-left: 75px; margin-top: 60px;">
            <div class="row highlight">
                  <p class="text-center text-info"><h2 class="text-center text-info" style="color:#087d49;">Advanced Search</h2></p>
                  <form role="advanced search" action="advanced_search.php" method="get">



                    <div class="form-group">
                        <fieldset style="padding: 0">
                        <legend>
                          Sequence
                        </legend>
			                   <div class="col-md-12">
                              <textarea name="wwed" class="form-control" cols="30"  rows="3" wrap="virtual" placeholder="e.g. FLPLLAGLAANFLPTIICKISYKC"></textarea>
                        </div>

			            </fieldset>
                    </div>
                    
                    <div class="form-group">
                        <fieldset style="padding: 0">
                        <legend>
                          Target
                        </legend>
			                   <div class="col-md-12">
                              <input name="wweb" class="form-control" cols="30"  rows="3" wrap="virtual" placeholder="e.g. Bcl"></input>
                        </div>

			            </fieldset>
                    </div>




                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Peptide Name</legend>
                              <div class="col-md-12">
                                  <input type="text" name="wwee" class="form-control" id="words" placeholder="e.g.Buforin IIb or Buforin" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Sequence Length</legend>
                              <div class="col-md-12">
                                  <input type="text" name="wweg" class="form-control" id="words" placeholder="Any figure like 21" />
                              </div>
                          </fieldset>
                      </div>

                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Origin</legend>
                              <div class="col-md-12">
                                  <input type="text" name="wwei" class="form-control" id="words" placeholder="e.g.Skin secretions of Rana rugosaor" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>UniProt ID</legend>
                              <div class="col-md-12">
                                  <input type="text" name="wwem" class="form-control" id="words" placeholder="e.g.P80400" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>PDB ID</legend>
                              <div class="col-md-12">
                                  <input type="text" name="wwen" class="form-control" id="words" placeholder="e.g.1JMN" />
                              </div>
                          </fieldset>
                      </div>


                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Linear/Cyclic</legend>
                              <div class="col-md-12">
                                  <input type="text" name="wwek" class="form-control" id="words" placeholder="e.g.linear"/>
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Chiral</legend>
                              <div class="col-md-12">
                                  <input type="text" name="wwel" class="form-control" id="words" placeholder="D" />
                              </div>
                          </fieldset>
                      </div>
                      

                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Patent ID</legend>
                              <div class="col-md-12">
                                  <input type="text" name="wwer" class="form-control" id="words" placeholder="e.g.US2018/0057532A1" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Pubmed ID</legend>
                              <div class="col-md-12">
                                  <input type="text" name="wweh" class="form-control" id="words" placeholder="e.g.14499271" />
                              </div>
                          </fieldset>
                      </div>
                      <div class="form-group">
                          <fieldset style="padding: 0">
                              <legend>Nature</legend>
                              <div class="col-md-12">
                                  <input type="text" name="wwes" class="form-control" id="words" placeholder="e.g.Antimicrobial" />
                              </div>
                          </fieldset>
                      </div>



                    <button type="submit" class="btn btn-submit">Submit</button>
                  </form>

            </div>
        </div>
    </div>
</div>

<?php

   require_once ("../head/footer.php");

?>

</body>
</html>
