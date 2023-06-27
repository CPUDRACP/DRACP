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
    <title>Peptide Libraray</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script language="Javascript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
    <script language="JavaScript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
    <script src="https://3Dmol.org/build/3Dmol-min.js" async></script>
    <script src="https://3Dmol.org/build/3Dmol.ui-min.js"></script>
   
</head>

<body>

<?php
require_once ("../head/head_content.php");
?>

<div class="container" style="padding-bottom:100px;">
    <div class="row" style="padding-top:80px;">
        <ol class="breadcrumb">
            <li><a href="http://dracp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dracp.cpu-bioinfor.org/browse/Peptide_Information.php">Peptide Library</a></li>
            <li class="active"><?php  echo "{$row['DRACP_ID']}"?></li>
        </ol>
    </div>



    <div class="row mt40">
        <div class="col-md-3" style="margin-top: 15px;">

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
        <div class="col-md-offset-1  col-md-8">

            <P style="margin: 15px 30px 25px; ">
            <?php echo '<strong style="font-size: 40px; font-family: Calisto MT; color: #63868b;">'.$row['Peptide_Name'].'</strong>' ?>
            </P>
            <!--<br>-->
            <p id="General Information" name="General Information">
                <strong style="font-size: 17px">General Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
          <div class="content-block">

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

                  if($row['UniProt_ID']=="Not available"){
                     echo "{$row['UniProt_ID']}";
                  }else{
                     $pieces = explode("##", $row['UniProt_ID']);
                     $num = count($pieces);        //count最好放到for外面，可以让函数只执行一次 count统计数组中元素的个数。
                     $i=0;
                     while($i<$num){
                          $link=$pieces[$i];
        
                          echo '<a href="https://www.uniprot.org/uniprot/'.$link.'">'.$link.'</a>&nbsp; ';
        
                          $i++;
                        }
                  }
                  
                  ?>
              </p>
              <p>
                  <span style="color: #77370B;font-weight: bold">PubChem CID</span>&nbsp;
                  <?php
                  if($row['PubChem_CID']=="Not available"){
                     echo "{$row['PubChem_CID']}";
                  }else{
                          echo '<a href="https://pubchem.ncbi.nlm.nih.gov/compound/'.$row['PubChem_CID'].'" target="_blank">'.$row['PubChem_CID'].'</a>&nbsp; ';
    
                  }
                  
                  ?>
                  
                  
              </p>
              <p>
                  <span style="color: #77370B;font-weight: bold">Origin</span>&nbsp; <?php echo $row['Origin']?>
              </p>
              <p>
                  <span style="color: #77370B;font-weight: bold">Type</span>&nbsp; <?php echo $row['Type']?>
              </p>
              <div style="display: flex; align-items: baseline;">
                <div>
                    <p style="color: #77370B;font-weight: bold">Classification</p>
                </div>&nbsp;&nbsp;
                <div>
                    <p style="display: flex; flex-wrap: wrap;">
                    <?php
                      $piecesg = explode("##", $row['Classification']);
                                $numg = count($piecesg);
                                $ig=0;
                                while($ig<$numg){
                                    $linkg=$piecesg[$ig];
    
                                    echo '
                                    <span class="tips">'.$linkg.'</span>';
    
                                    $ig++;
                                }
                      ?>
                </div>
              </div>
          </div>


            <br><br>
            <p id="Activity Information" name="Activity Information">
                <strong style="font-size: 17px">Activity Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            
            
            
                    <?php
            
                    $sqlde="select * from peptideactivity  where  DRACP_ID='$tit'  order by DRACP_ID asc ";
                    $rsde=mysqli_query($conn,$sqlde);
                    if(!empty(mysqli_num_rows($rsde))){
                        echo '
                        <table class="table table-borderednew text-center">
                            <thead class="table-header">
                                <tr>
                                    <th class="table-cell">Cell Line</th>
                                    <th class="table-cell">Disease</th>
                                    <th class="table-cell">Cancer Classified</th>
                                    <th class="table-cell">Activity</th>
                                    <th class="table-cell">Assay</th>
                                    <th class="table-cell">Testing Time</th>
                                    <th class="table-cell">Literature</th>
                                </tr>
                            </thead>
                            <tbody>';
                        while($rowe=@mysqli_fetch_assoc($rsde)) {

                            echo ' 
                            <tr>
                                <td class="table-inner-cell"><a href="activity_information.php?slt=Cell_Line&txtarea='.$rowe['Cell_Line'].'">'.$rowe['Cell_Line'].'</a></td>
                                <td class="table-inner-cell">'.$rowe['Disease'].'</td>
                                <td class="table-inner-cell">'.$rowe['Cancer_Classified'].'</td>
                                <td class="table-inner-cell">'.$rowe['Activity'].'</td>
                                <td class="table-inner-cell"><a href="activity_information.php?slt=Assay&txtarea='.$rowe['Assay'].'">'.$rowe['Assay'].'</a></td>
                                <td class="table-inner-cell">'.$rowe['Testing_Time'].'</td>
                                <td class="table-inner-cell"><a href="#Literature Information">'.$rowe['Literature'].'</a></td>
                            </tr>';
                        }

                    }
                    ?>
            
            
            
                    </tbody>
                </table>
                
            <div class="content-block">
                
                <p>
                    <span style="color: #77370B;font-weight: bold">Hemolytic Activity</span>&nbsp; <?php echo $row['Hemolytic_Activity']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Normal (non-cancerous) Cytotoxicity</span>&nbsp; <?php echo $row['Cytotoxicity']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Target</span>&nbsp; <?php echo $row['Binding_Target']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Affinity</span>&nbsp; <?php echo $row['Affinity']?>
                </p>
                <?php
                    if($row['*']!="Not available"){
                        echo '<p>
                    <span style="color: #77370B;font-weight: bold">*</span>&nbsp; '.$row['*'].'
                </p>';
                    }
                ?>
                
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
            <div class="content-block">
                <p >
                    <span style="color: #77370B;font-weight: bold">PDB ID</span>&nbsp;
                    <?php

                    if($row['PDB_ID']=="Not available"){
                     echo "{$row['PDB_ID']}";
                  }else{
                        $piecesa = explode("##", $row['PDB_ID']);
                        $numa = count($piecesa);
                        $ia=0;
                        while($ia<$numa){
                            $linka=$piecesa[$ia];
    
                            echo '<a href="https://www.rcsb.org/structure/'.$linka.'" target="_blank">'.$linka.'</a>&nbsp; ';
    
                            $ia++;
                        }
                  }
                    
                    ?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Predicted Structure</span>&nbsp;
                    
                    <a href="http://dracp.cpu-bioinfor.org/Structure/predicted pdb/<?php echo $row['Predicted_Structure_ID']?>.pdb"><?php echo $row['Predicted_Structure_ID']?></a>
                </p>
                <p>
                    <?php 
                        require_once("./viewer.php")
                    ?>
                </p>


                <p>
                    <span style="color: #77370B;font-weight: bold">Helicity</span>&nbsp; <?php echo $row['Helicity']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Linear/Cyclic</span>&nbsp; <?php echo $row['Linear_Cyclic']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">Disulfide/Other Bond</span>&nbsp; <?php echo $row['Disulfide_Bond']?>
                </p>
                <p>
                    <span style="color: #77370B;font-weight: bold">N-terminal Modification</span>&nbsp; <?php echo $row['N-terminal_Modification']?>
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
            <div class="content-block">

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
                    <span style="color: #77370B;font-weight: bold">Amino acid distribution</span>
                </p>
                <p>
                    <?php 
                        require_once("./distribution.php")
                    ?>
                </p>


            </div>



            <br><br>
            <p id="Literature Information" name="Literature Information">
                <strong style="font-size: 17px">Literature Information</strong>
            </p>
            <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
            <div class="content-block">
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


                    echo '<p class="margin-bottom: 10px;">
                        <strong style="font-size: 14px">Literature '.$ii.'</strong>
                        </p>';
                        

                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">Pubmed ID</span>&nbsp;';
                        if($lina=="Not available"){
                          echo '<span>'.$lina.'</span>';
                      }else{
                          echo '<a href="https://pubmed.ncbi.nlm.nih.gov/'.$lina.'" target="_blank">'.$lina.'</a>';
                      }
                    echo '</p>';
                    
                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">Title</span>&nbsp; '.$linb.'
                    </p>';
                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">Doi</span>&nbsp;';
                        if($linc=="Not available"){
                          echo '<span>'.$linc.'</span>';
                      }else{
                        echo '<a href="https://doi.org/'.$linc.'" target="_blank">'.$linc.'</a>';
                      }
                    echo '</p>';
                    
                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">Year</span>&nbsp; '.$lind.'
                    </p>';

                    $i++; $ii++;
                }

                echo '<p class="margin-bottom: 10px;">
                    <strong style="font-size: 14px">Patent</strong>
                    </p>';

                echo '<p>
                        <span style="color: #77370B;font-weight: bold">Patent ID</span>&nbsp;';
                        if($row['Patent_ID']=="Not available"){
                          echo "{$row['Patent_ID']}";
                      }else{
                          echo '<a href="https://www.google.com/patents/'.$row['Patent_ID'].'" target="_blank">'.$row['Patent_ID'].'</a>';
                      }
                echo '</p>';
                
                echo '<p>
                        <span style="color: #77370B;font-weight: bold">Patent Title</span>&nbsp; '.$row['Patent_Title'].'
                    </p>';
                echo '<p>
                        <span style="color: #77370B;font-weight: bold">Other Iinformation</span>&nbsp; '.$row['Other_Information'].'
                    </p>';

                echo '<p>
                        <span style="color: #77370B;font-weight: bold">Other Published ID</span>&nbsp; ';
                        if($row['Other_Published_ID']=="Not available"){
                          echo "{$row['Other_Published_ID']}";
                      }else{
                        $piecesw = explode("##", $row['Other_Published_ID']);
                        $numw = count($piecesw);        //count最好放到for外面，可以让函数只执行一次 count统计数组中元素的个数。
                        $iw=0;
                        while($iw<$numw){
                            $linkw=$piecesw[$iw];
        
                            echo '
                                <a href="https://www.google.com/patents/'.$linkw.'" target="_blank">'.$linkw.'</a>&nbsp; 
                            ';
        
                            $iw++;
                        }
                      }
                echo '</p>';
                ?>
            </div>
            
            <br><br>
            
            <?php
            
                $sqlde="select * from All_Information  where  DRACP_ID='$tit'  order by DRACP_ID asc ";
                $rsde=mysqli_query($conn,$sqlde);
                
                if($row['DRAMP_ID']=="Not available" and $row['CancerPPD_ID']=="Not available" and $row['DBAASP_ID']=="Not available" and $row['Cppsite_ID']=="Not available"){
                    echo '<br>';
                }else{
                echo '<p id="Link" name="Link">
                    <strong style="font-size: 17px">External Code</strong>
                </p>
                <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
                
                <div class="content-block">';
                if($row['DRAMP_ID'] !== "Not available"){
                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">DRAMP ID</span>&nbsp; <a target="_blank" href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id='.$row['DRAMP_ID'].'">'.$row['DRAMP_ID'].'</a>
                    </p>';
                }
                if($row['CancerPPD_ID'] !== "Not available"){
                $piecesh = explode("##", $row['CancerPPD_ID']);
                $numh = count($piecesh);
                $ih=0;
                while($ih<$numh){
                $linkh=$piecesh[$ih];
                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">CancerPPD ID</span>&nbsp; <a target="_blank" href="https://webs.iiitd.edu.in/raghava/cancerppd/display_sub.php?details='.$linkh.'">'.$linkh.'</a>
                    </p>';
                $ih++;
                }}
                if($row['DBAASP_ID'] !== "Not available"){
                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">DBAASP ID</span>&nbsp; <a target="_blank" href="https://dbaasp.org/peptide-card?id='.$row['DBAASP_ID'].'">'.$row['DBAASP_ID'].'</a>
                    </p>';
                }
                if($row['Cppsite_ID'] !== "Not available"){
                    echo '<p>
                        <span style="color: #77370B;font-weight: bold">Cppsite ID</span>&nbsp; <a target="_blank" href="https://webs.iiitd.edu.in/raghava/cppsite/display.php?details='.$row['Cppsite_ID'].'">'.$row['Cppsite_ID'].'</a>
                    </p>';
                }
                echo '</div>';
                }
            ?>
                
        </div>
    </div>
</div>





 
<?php

require_once("../head/footer.php");

?>



</body>

</html>
