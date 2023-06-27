<?php
header('Content-Type:text/html; charset=utf-8');
date_default_timezone_set('PRC');

$conn=@mysqli_connect('localhost','root','ZhengH@123','dracp') or die('连接错误！请检查网络');
mysqli_query($conn,'set names utf8');

@$tit=$_GET['id'];


function escapeString($content) {
    $pattern = "/(select[\s])|(insert[\s])|(update[\s])|(delete[\s])|(from[\s])|(where[\s])|(drop[\s])/i";
    if (is_array($content)) {
        foreach ($content as $key=>$value) {
            $content[$key] = addslashes(trim($value));
            if(preg_match($pattern,$content[$key])) {
                $content[$key] = '';
            }
        }
    } else {
        $content=addslashes(trim($content));
        if(preg_match($pattern,$content)) {
            echo '<script>location.href="http://dracp.cpu-bioinfor.org/"</script>';exit;
        }
    }
    return $content;
}
function safe_replace($string) {
    $string = str_replace('%20','',$string);
    $string = str_replace('%27','',$string);
    $string = str_replace('%2527','',$string);
    $string = str_replace('*','',$string);
    $string = str_replace('"','&quot;',$string);
    $string = str_replace("'",'',$string);
    $string = str_replace('"','',$string);
    $string = str_replace(';','',$string);
    $string = str_replace('<','&lt;',$string);
    $string = str_replace('>','&gt;',$string);
    $string = str_replace("{",'',$string);
    $string = str_replace('}','',$string);
    $string = str_replace('\\','',$string);
    return $string;
}
$tit=escapeString($tit);
$tit=safe_replace($tit);

$sql="select * from All_Information where DRACP_ID='$tit'";
$rs=mysqli_query($conn,$sql);

if(mysqli_num_rows($rs)>0){
    $row=mysqli_fetch_assoc($rs);
}else{
    echo '<script>location.href="http://dracp.cpu-bioinfor.org/"</script>';exit;
}



?>

<!DOCTYPE html>
<html lang="en">

<!--  browse   -->

<head>
    <title>Classified-Browse</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script language="Javascript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
    <script language="JavaScript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
    <script src="https://3Dmol.org/build/3Dmol-min.js" async></script>
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
            <li class="active">Peptide Information</li>
        </ol>
    </div>


    <div class="row mt40">
        <div class="col-md-3 mt30">

            <div class="row">
                <div class="panel panel-info" style="position: fixed;">

                    <div class="panel-footer">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#General Information">General Information</a></li>
                            <li><a href="#Activity Information">Activity Information</a></li>
                            <li><a href="#Structure Information">Structure Information</a></li>
                            <li><a href="#Physicochemical Information">Physicochemical Information</a></li>
                            <li><a href="#Literature Information">Literature Information</a></li>

                        </ul>
                    </div>
                </div>
            </div>



        </div>

        <!-- the content -->
        <div class="col-md-offset-1  col-md-8 mt30" >


            <p id="General Information" name="General Information">
                <strong style="font-size: 17px">General Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
          <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">

              <p>
                  <span style="color: #77370B;font-weight: bold">DRACP ID</span>&nbsp; <?php echo $row['DRACP_ID']?>
              </p>
              <p>
                  <span style="color: #77370B;font-weight: bold">Peptide Name</span>&nbsp;&nbsp; <?php echo $row['Peptide_Name']?>
              </p>
              <p>
                  <span style="color: #77370B;font-weight: bold">Sequence</span>&nbsp; <?php echo $row['Sequence']?>
              </p>
              <p>
                  <span style="color: #77370B;font-weight: bold">Sequence Length</span> &nbsp;<?php echo $row['Sequence_Length']?>
              </p>
              <p>
                  <span style="color: #77370B;font-weight: bold">UniProt ID</span>&nbsp;
                  <?php


                  $pieces = explode("##", $row['UniProt_ID']);
                  $num = count($pieces);        
                  $i=0;
                  while($i<$num){
                      $link=$pieces[$i];

                      echo '<a href="https://www.uniprot.org/uniprot/'.$link.'">'.$link.'</a>,';

                      $i++;
                  }
                  ?>
              </p>
              <p>
                  <span style="color: #77370B;font-weight: bold">Origin</span>&nbsp; <?php echo $row['Origin']?>
              </p>
              <p>
                  <span style="color: #77370B;font-weight: bold">Type</span>&nbsp; <?php echo $row['Type']?>
              </p>

          </div>


            <br><br>
            <p id="Activity Information" name="Activity Information">
                <strong style="font-size: 17px">Activity Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">
                <p>
                    <span style="color: #77370B;font-weight: bold">Cell Line</span>&nbsp; <?php echo $row['Cell_Line']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Assay</span>&nbsp; <?php echo $row['Assay']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Disease</span>&nbsp; <?php echo $row['Disease']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Cancer Classified</span>&nbsp; <?php echo $row['Cancer_Classified']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Testing Time</span>&nbsp; <?php echo $row['Testing_Time']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Activity</span>&nbsp; <?php echo $row['Activity']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Hemolytic Activity</span>&nbsp; <?php echo $row['Hemolytic_Activity']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Normal (non-cancerous) Cytotoxicity</span>&nbsp; <?php echo $row['Cytotoxicity']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Binding Target</span>&nbsp; <?php echo $row['Binding_Target']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Mechanism</span>&nbsp; <?php echo $row['Mechanism']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Nature</span>&nbsp; <?php echo $row['Nature']?>
                </p>

            </div>


            <br><br>
            <p id="Structure Information" name="Structure Information">
                <strong style="font-size: 17px">Structure Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">
                <p >
                    <span style="color: #77370B;font-weight: bold">PDB ID</span>&nbsp;
                    <?php

                    $piecesa = explode("##", $row['PDB_ID']);
                    $numa = count($piecesa);
                    $ia=0;
                    while($ia<$numa){
                        $linka=$piecesa[$ia];

                        echo '<a href="https://www.pdbus.org/structure/'.$linka.'">'.$linka.'</a>,';

                        $ia++;
                    }
                    ?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Predicted Structure ID</span>&nbsp; <a href="http://dracp.cpu-bioinfor.org/Structure/<?php echo $row['Predicted_Structure_ID']?>.pdb"><?php echo $row['Predicted_Structure_ID']?></a>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Structure</span>&nbsp;
                    <?php

                    $piecesb = explode("##", $row['Structure']);
                    $numb = count($piecesb);
                    $ib=0;
                    while($ib<$numb){
                        $linkb=$piecesb[$ib];


                        if($ib==0){
                            echo '<span class="btn btn-info" onclick="showDivs('.$ib.')" id="a'.$ib.'">'.$linkb.'</span>';
                        }else{
                            echo '<span class="btn btn-default" style="background:#e6e6e6;" onclick="showDivs('.$ib.')" id="a'.$ib.'">'.$linkb.'</span>';
                        }
                        $ib++;
                    }
                    $ic=0;
                    while($ic<$numb){
                        $linkc=$piecesb[$ic];



                        if($ic==0){
                            echo ' <p style="height: 400px; width: 400px; position: relative;" id="'.$ic.'" class="viewer_3Dmoljs" data-href="http://dracp.cpu-bioinfor.org/Structure/'.$linkc.'" data-backgroundcolor="0xffffff" data-style="cartoon:color=spectrum" data-ui="config"></p>';

                        }else{
                            echo ' <p style="height: 400px; width: 400px; position: relative;display: none" id="'.$ic.'" class="viewer_3Dmoljs" data-href="http://dracp.cpu-bioinfor.org/Structure/'.$linkc.'" data-backgroundcolor="0xffffff" data-style="cartoon:color=spectrum" data-ui="config"></p>';

                        }

                        $ic++;
                    }
                    ?>
                </p>



                <p>
                    <span style="color: #77370B;font-weight: bold">Linear/Cyclic</span>&nbsp; <?php echo $row['Linear_Cyclic']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Disulfide/Other Bond</span>&nbsp; <?php echo $row['Disulfide_Bond']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">N-terminal Modification</span>&nbsp; <span style="font-size:15px;color:black"><?php echo $row['N-terminal_Modification']?></span>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">C-terminal Modification</span>&nbsp; <?php echo $row['C-terminal_Modification']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Other Modification</span>&nbsp; <?php echo $row['Other_Modification']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Chiral</span>&nbsp; <?php echo $row['Chiral']?>
                </p>

            </div>


            <br><br>
            <p id="Physicochemical Information" name="Physicochemical Information">
                <strong style="font-size: 17px">Physicochemical Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">

                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <span style="color: #77370B;font-weight: bold">Formula</span>&nbsp; <?php echo $row['Formula']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Absent amino acids</span>&nbsp; <?php echo $row['Absent_amino_acids']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Common amino acids</span>&nbsp; <?php echo $row['Common_amino_acids']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Mass</span>&nbsp; <?php echo $row['Mass']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Pl</span>&nbsp; <?php echo $row['pI']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Basic residues</span>&nbsp; <?php echo $row['Basic_residues']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Acidic residues</span>&nbsp; <?php echo $row['Acidic_residues']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Hydrophobic residues</span>&nbsp; <?php echo $row['Hydrophobic_residues']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Net charge</span>&nbsp; <?php echo $row['Net_charge']?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <span style="color: #77370B;font-weight: bold">Boman Index</span>&nbsp; <?php echo $row['Boman_Index']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Hydrophobicity</span>&nbsp; <?php echo $row['Hydrophobicity']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Aliphatic Index</span>&nbsp; <?php echo $row['Aliphatic_Index']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Half Life</span>&nbsp; <br>
                            <?php

                            $piecesf = explode("##", $row['Half_Life']);
                            $numf = count($piecesf);
                            $if=0;
                            while($if<$numf){
                                $linkf=$piecesf[$if];

                                echo '&emsp;&emsp;'.$linkf.'<br>';

                                $if++;
                            }

                            ?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Extinction Coefficient cystines</span>&nbsp; <?php echo $row['Extinction_Coefficient_cystines']?>
                        </p>
                        <p>
                            <span style="color: #77370B;font-weight: bold">Absorbance 280nm</span>&nbsp; <?php echo $row['Absorbance_280nm']?>
                        </p>

                        <p>
                            <span style="color: #77370B;font-weight: bold">Polar residues</span>&nbsp; <?php echo $row['Polar_residues']?>
                        </p>
                    </div>
                </div>


                <p>
                    <span style="color: #77370B;font-weight: bold">Amino acid distribution</span>&nbsp; <img src="http://dracp.cpu-bioinfor.org/Amino_acid_distribution/<?php echo $row['Amino_acid_distribution']?>" width="100%">
                </p>


            </div>



            <br><br>
            <p id="Literature Information" name="Literature Information">
                <strong style="font-size: 17px">Literature Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">
                <?php
                $pieces = explode("##", $row['Literature']);
                $num = count($pieces);        //count最好放到for外面，可以让函数只执行一次 count统计数组中元素的个数。
                $i=0;$ii=1;
                while($i<$num){
                    $link=$pieces[$i];

                    $piecesa = explode("++", $link);

                    @$lina=$piecesa[0];
                    @$linb=$piecesa[1];
                    @$linc=$piecesa[2];
                    @$lind=$piecesa[3];


                    echo '<strong style="font-size: 14px">Literature '.$ii.'</strong>';

                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">Pubmed ID</span>&nbsp; 
                        <a href="https://pubmed.ncbi.nlm.nih.gov/'.$lina.'">'.$lina.'</a>
                    </p>';

                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">Title</span>&nbsp; '.$linb.'
                    </p>';
                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">Doi</span>&nbsp; 
                        <a href="https://doi.org/'.$linc.'">'.$linc.'</a>
                    </p>';
                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">Year</span>&nbsp; '.$lind.'
                    </p>';

                    $i++; $ii++;
                }

                echo '<strong style="font-size: 14px">Patent</strong>';

                echo '<p>
                        <span style="color: #77370B;font-weight: bold">Patent ID</span>&nbsp; 
                        <a href="https://www.google.com/patents/'.$row['Patent_ID'].'">'.$row['Patent_ID'].'</a>
                    </p>';
                echo '<p>
                        <span style="color: #77370B;font-weight: bold">Patent Title</span>&nbsp; '.$row['Patent_Title'].'
                    </p>';
                echo '<p>
                        <span style="color: #77370B;font-weight: bold">Other Iinformation</span>&nbsp; '.$row['Other_Information'].'
                    </p>';

                echo '<p>
                        <span style="color: #77370B;font-weight: bold">Other Published ID</span>&nbsp; ';
                $piecesw = explode("##", $row['Other_Published_ID']);
                $numw = count($piecesw);        //count最好放到for外面，可以让函数只执行一次 count统计数组中元素的个数。
                $iw=0;
                while($iw<$numw){
                    $linkw=$piecesw[$iw];

                    echo '
                        <a href="https://www.google.com/patents/'.$linkw.'">'.$linkw.'</a>
                    ';

                    $iw++;
                }
                echo '</p>';
                ?>
            </div>
            <br><br>

        </div>
    </div>
</div>






<?php

require_once("../head/footer.php");

?>



</body>
<script type="text/javascript">

    function showDivs(objId) {

        <?php
        $piewww = explode("##", $row['Structure']);
        $nuww = count($piewww);
        $ibwww=0;
        while($ibwww<$nuww){
            $linkbwww=$piewww[$ibwww];


           echo 'document.getElementById("'.$ibwww.'").style.display = "none";';
            echo 'document.getElementById("a'.$ibwww.'").style.background = "#e6e6e6";';
            echo 'document.getElementById("a'.$ibwww.'").style.color = "#000000";';
            echo 'document.getElementById("a'.$ibwww.'").style.borderColor = "#ccc";';

            $ibwww++;
        }
        ?>
        document.getElementById(objId).style.display = "";
        document.getElementById('a'+objId).style.background = "#31b0d5";
        document.getElementById('a'+objId).style.color = "#ffffff";
        document.getElementById('a'+objId).style.borderColor = "#31b0d5";
    }

</script>
</html>
