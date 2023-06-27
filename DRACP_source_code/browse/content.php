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

$sql="select * from peptidedrug where DRACPC_ID='$tit'";
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
    <title>Drug Libraray</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/public.css">
    <link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/lazysheep/css/cooltipz.min.css">
    <script language="Javascript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
    <script language="JavaScript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
    <script language="JavaScript" src="http://dracp.cpu-bioinfor.org/lazysheep/js/bootstrap.bundle.js"></script>
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
            <li><a href="http://dracp.cpu-bioinfor.org/browse/Peptide_Information.php">Drug Libraray</a></li>
            <li class="active"><?php  echo "{$row['DRACPC_ID']}"?></li>
        </ol>
    </div>
    
    <div class="col-md-10">
        <div class="row">
            

    
        <P style="margin-left:25px; margin-bottom:15px;">
            <?php echo '<strong style="font-size: 40px; font-family: Calisto MT; color: #63868b;">'.$row['Active_Ingredients'].'</strong>' ?>
        </P>
    
    
    

        <div class="content-block">
    
            <p>
                <span style="color: #77370B;font-weight: bold">DRACPC ID</span>&nbsp; <?php echo $row['DRACPC_ID']?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">Active Ingredients</span>&nbsp;&nbsp; <?php echo $row['Active_Ingredients']?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">Description</span>&nbsp; <?php echo $row['Description']?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">Synonyms</span>&nbsp; <?php echo $row['Synonyms']?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">Type</span>&nbsp; <?php echo $row['Type']?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">Disease</span>&nbsp; <?php echo $row['Disease']?>
            </p>
            <div style="display: flex; align-items: baseline;">
                <div>
                    <p style="color: #77370B;font-weight: bold">Classification</p>
                </div>&nbsp;&nbsp;
                <div>
                    <p style="display: flex; flex-wrap: wrap;">
                    <?php 
                      $piecesa = explode("##", $row['Classification']);
                                $numa = count($piecesa);
                                $ia=0;
                                while($ia<$numa){
                                    $linka=$piecesa[$ia];
    
                                    echo '
                                    <span class="tips">'.$linka.'</span> ';
    
                                    $ia++;
                                }
                    ?>
                </div>
            </div>
        </div>
        
        <p id="General Information" name="General Information" class="mt30">
            <strong style="font-size: 17px;">Structure Information</strong>
        </p>
        <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
        
        <div class="content-block">
            <p>
                <span style="color: #77370B;font-weight: bold">Molecular Formula</span>&nbsp; <?php echo $row['Molecular_Formula']?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">Molecular Weight</span>&nbsp; <?php echo $row['Molecular_Weight']?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">Active Sequence</span>&nbsp; <?php echo $row['Active_Sequence']?>
                <?php
                if($row['Seq']=="Yes"){
                    echo '<br>
                    <img src="../Structure/drug/seq'.$row['DRACPC_ID'].'.png" style="width: 600px;">';
                }
                ?>
                
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">Sequence Length</span>&nbsp; <?php echo $row['Sequence_Length']?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">Modification</span>&nbsp; <?php echo $row['Other_Modification']?>
            </p>
            <div style="display: flex; align-items: flex-start; justify-content: space-between; ">
                <div style="padding-right: 300px;">
                    <p style="color: #77370B;font-weight: bold">Structure</p>
                </div>
                <div data-cooltipz-dir="top" aria-label="Download mol file">
                    <?php
                    if($row['Structure']=="Yes"){
                        echo '<a target="_blank" href="../Structure/drug/'.$row['DRACPC_ID'].'.mol">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-down" viewBox="0 0 16 16" >
                          <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"/>
                          <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                        </svg>
                    </a>';
                    }
                    ?>
                </div>
                <div>
                    &nbsp;
                </div>
            </div>
            <?php
            if($row['Structure']=="No"){
                echo '<img src="../Structure/drug/failed.png" style="margin: 20px;">';
            }else{
                echo '<a target="_blank" href="../Structure/drug/'.$row['DRACPC_ID'].'.svg"> 
                <img src="../Structure/drug/'.$row['DRACPC_ID'].'.svg" style="width: 450px; margin: 20px;">
                </a>';
            }
            ?>
            <br>
            <p class="flod">
                <a href="#demo" data-bs-toggle="collapse">Show IUPAC/InChI/SMILES<b class="caret" style="border-top: 4px solid #63868b;"></b></a>
            </p>
            <div id="demo" class="collapse">
            <p>
                <span style="color: #77370B;font-weight: bold">IUPAC Name</span>&nbsp; <?php echo $row['IUPAC_Name']?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold;word-break:break-all">InChI</span>&nbsp;
                <span style="word-break:break-all"><?php echo $row['InChI']?></span>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold;word-break:break-all">InChI_Key</span>&nbsp;<?php echo $row['InChI_Key']?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold;word-break:break-all">SMILES</span>&nbsp;
                <span style="word-break:break-all"><?php echo $row['SMILES']?></span>
            </p>
            </div>
        </div>
        
        <p id="General Information" name="External Codes" class="mt30">
            <strong style="font-size: 17px;">External Codes</strong>
        </p>
        <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
        
        <div class="content-block">
            <p>
                <span style="color: #77370B;font-weight: bold">PubChem CID</span>&nbsp; 
                <?php 
                if($row['PubChem_CID']=="Not available"){
                    echo "{$row['PubChem_CID']}";
                }else{
                    echo '<a target="_blank" href="https://pubchem.ncbi.nlm.nih.gov/compound/'.$row['PubChem_CID'].'">'.$row['PubChem_CID'].'</a>';
                }
                ?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">DrugBank Accession Number</span>&nbsp;
                <?php
                if($row['DRUGBANK_Accession_Number']=="Not available"){
                    echo "{$row['DRUGBANK_Accession_Number']}";
                }else{
                    echo '<a target="_blank" href="https://go.drugbank.com/drugs/'.$row['DRUGBANK_Accession_Number'].'">'.$row['DRUGBANK_Accession_Number'].'</a>';
                }
                ?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">NCI Thesaurus Code</span>&nbsp;
                <?php 
                if($row['NCI_Thesaurus_Code']=="Not available"){
                     echo "{$row['NCI_Thesaurus_Code']}";
                }else{
                    $piecesc= explode("##", $row['NCI_Thesaurus_Code']);
                    $numc= count($piecesc);        //count最好放到for外面，可以让函数只执行一次 count统计数组中元素的个数。
                    $ic=0;
                    while($ic<$numc){
                          $linkc=$piecesc[$ic];
        
                          echo '<a target="_blank" href="https://ncit.nci.nih.gov/ncitbrowser/ConceptReport.jsp?dictionary=NCI_Thesaurus&ns=ncit&code='.$linkc.'">'.$linkc.'</a>&nbsp;&nbsp; ';
        
                          $ic++;
                        }
                  }
                ?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">UNII</span>&nbsp; <?php echo $row['UNII']?>&nbsp;&nbsp; 
                <?php
                if($row['UNII']!="Not available"){
                    echo '<a target="_blank" href="https://gsrs.ncats.nih.gov/ginas/app/beta/substances/'.$row['UNII'].'">GSRS</a>';
                }
                ?>
            </p>
            <p>
                <span style="color: #77370B;font-weight: bold">CAS</span>&nbsp; <?php echo $row['CAS']?>
            </p>
        </div>
    
    
        <br><br>
        <p>
            <strong style="font-size: 17px">Drug approval</strong>
        </p>
        <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
        <div class="content-block" style="padding-bottom: 20px;">
            <p style="margin: 5px 5px 15px; line-height: 25px;">
                <span style="color: #77370B;font-weight: bold">Drug indication</span><br>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Indication']?>
            </p>
            <div class="accordion" id="accordionPanelsStayOpenExample">
              <div class="accordion-item">
                <p class="accordion-header" id="panelsStayOpen-headingTwo" style="margin: 0;">
                  <button class="accordion-button collapsed acctitle" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">Approved by FDA, EMA and HC</button>
                </p>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="accordion-body">

                
                
                        <?php
                
                        $sqlde="select * from marketpeptide  where  DRACPC_ID='$tit'  order by DRACPC_ID asc ";
                        $rsde=mysqli_query($conn,$sqlde);
                        $recordse=mysqli_num_rows($rsde);
                        if(!empty($recordse)){
                            echo '<table class="table table-borderednew text-center" style="margin:10px 0;">
                        <thead class="table-header">
                        <tr>
            
                            <th class="table-cell">Drug Name</th>
                            <th class="table-cell">Strength</th>
                            <th class="table-cell">Dosage Form/Route</th>
                            <th class="table-cell">Company</th>
                            <th class="table-cell">Marketing Status</th>
                            <th class="table-cell">Drug ID</th>
                            <th class="table-cell">Approval year</th>
                
                        </tr>
                        </thead>
                        <tbody>';
                            
                        while($rowe=@mysqli_fetch_assoc($rsde)) {
                            echo ' <tr>
                                <td class="table-inner-cell">'.$rowe['Drug_Name'].'</td>
                                <td class="table-inner-cell">'.$rowe['Strength'].'</td>
                                <td class="table-inner-cell">'.$rowe['Dosage_Form/Route'].'</td>
                                <td class="table-inner-cell">'.$rowe['Company'].'</td>
                                <td class="table-inner-cell">'.$rowe['Marketing_Status'].'</td>
                                <td class="table-inner-cell">'.$rowe['Drug_ID'].'</td>
                                <td class="table-inner-cell">'.$rowe['Approval_year'].'</td>
                            </tr>';
                            }
                        }else{
                            echo '<p style="margin-top: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;The drug is not approved.</p>';
                        }
                        ?>
            
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <p class="accordion-header" id="panelsStayOpen-headingThree" style="margin: 0;">
                  <button class="accordion-button collapsed acctitle" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree" style="border-top: 1px solid #d9edf7;">Clinical Trials</button>
                </p>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                  <div class="accordion-body">
                    <table class="table table-borderednew text-center" style="margin: 10px 0;">
                        <thead class="table-header">
                        <tr>
            
                            <th class="table-cell">ClinicalTrials.gov Identifier</th>
                            <th class="table-cell">Title</th>
                            <th class="table-cell">Condition or disease</th>
                            <th class="table-cell">Phase</th>
                            <th class="table-cell">Purpose</th>
            
                
                        </tr>
                        </thead>
                        <tbody>
                
                
                        <?php
                
                        $sqldf="select * from clinicalpeptide  where  DRACPC_ID='$tit'  order by DRACPC_ID asc ";
                        $rsdf=mysqli_query($conn,$sqldf);
                        while($rowf=@mysqli_fetch_assoc($rsdf)) {
                
                
                
                            echo ' <tr>
                                <td class="table-inner-cell">'.$rowf['ClinicalTrials.gov_Identifier'].'</td>
                                <td class="table-inner-cell" style="text-align: initial;">'.$rowf['Title'].'</td>
                                <td class="table-inner-cell" style="text-align: initial;">'.$rowf['Condition_or_disease'].'</td>
                                <td class="table-inner-cell">'.$rowf['Phase'].'</td>
                                <td class="table-inner-cell">'.$rowf['Purpose'].'</td>
                            </tr>';
                        }
                        ?>
            
                        </tbody>
                    </table>
                  </div>
                  <p style="padding: 0 15px;">&nbsp;&nbsp;&nbsp;&nbsp;More clinical information is obtained from <a target="_blank" href="https://www.clinicaltrials.gov/">ClinicalTrials.gov</a>.</p>
                </div>
              </div>
            </div>
        </div>
<br>
        

        <br>


    
    
    
        <br><br>
    
    
    
    
        </div>
    </div>
    

</div>






<?php

require_once("../head/footer.php");

?>





</body>

</html>
