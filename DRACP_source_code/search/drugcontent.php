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
    <title>drug-Search</title>
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
            <li><a href="http://dracp.cpu-bioinfor.org/browse/PeptideDrug.php">Browse</a></li>
            <li class="active">Peptide Drug Information</li>
        </ol>
    </div>



    <p>
        <strong style="font-size: 17px;">General information</strong>
    </p>
    <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">
    <div style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">

        <p>
            <span style="color: #77370B;font-weight: bold">DRACPC ID</span>&nbsp; <?php echo $row['DRACPC_ID']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">Active Ingredients</span>&nbsp;&nbsp; <?php echo $row['Active_Ingredients']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">PubChem CID</span>&nbsp; <?php echo $row['PubChem_CID']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">DRUGBANK Accession Number</span>&nbsp; <?php echo $row['DRUGBANK_Accession_Number']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">Synonyms</span>&nbsp; <?php echo $row['Synonyms']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">Active Sequence</span>&nbsp; <?php echo $row['Active_Sequence']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">Sequence Length</span>&nbsp; <?php echo $row['Sequence_Length']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">Molecular Formula</span>&nbsp; <?php echo $row['Molecular_Formula']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">Molecular Weight</span>&nbsp; <?php echo $row['Molecular_Weight']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">IUPAC Name</span>&nbsp; <?php echo $row['IUPAC_Name']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">Type</span>&nbsp; <?php echo $row['Type']?>
        </p>

        <p>
            <span style="color: #77370B;font-weight: bold">Description</span>&nbsp; <?php echo $row['Description']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">UNII</span>&nbsp; <?php echo $row['UNII']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">CAS</span>&nbsp; <?php echo $row['CAS']?>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold;word-break:break-all">InChI</span>&nbsp;
            <span style="word-break:break-all"><?php echo $row['InChI']?></span>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold;word-break:break-all">InChI_Key</span>&nbsp;
            <span style="word-break:break-all"><?php echo $row['InChI_Key']?></span>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold;word-break:break-all">SMILES</span>&nbsp;
            <span style="word-break:break-all"><?php echo $row['SMILES']?></span>
        </p>
        <p>
            <span style="color: #77370B;font-weight: bold">Disease</span>&nbsp; <?php echo $row['Disease']?>
        </p>



    </div>


    <br><br>
    <p>
        <strong style="font-size: 17px">Peptide drug information</strong>
    </p>
    <hr style="border-top: 1px solid #ddd;border-bottom: 1px dotted #fff;">

    <table class="table table-bordered"  style="padding: 12px;background-color: #f7f7f7;border: 1px solid #ddd;border-radius: 12px;">
        <thead>
        <tr>


            <th style="color: #77370B;font-weight: bold">Drug Name</th>
            <th style="color: #77370B;font-weight: bold">Strength</th>
            <th style="color: #77370B;font-weight: bold">Dosage Form/Route</th>
            <th style="color: #77370B;font-weight: bold">Company</th>
            <th style="color: #77370B;font-weight: bold">Marketing Status</th>
            <th style="color: #77370B;font-weight: bold">Drug ID</th>
            <th style="color: #77370B;font-weight: bold">Approval year</th>

        </tr>
        </thead>
        <tbody>


        <?php

        $sqlde="select * from marketpeptide  where  DRACPC_ID='$tit'  order by DRACPC_ID asc ";
        $rsde=mysqli_query($conn,$sqlde);
        while($rowe=mysqli_fetch_assoc($rsde)) {



            echo ' <tr>
                <td>'.$rowe['Drug_Name'].'</td>
                <td>'.$rowe['Strength'].'</td>
                <td>'.$rowe['Dosage_Form/Route'].'</td>
                <td>'.$rowe['Company'].'</td>
                <td>'.$rowe['Marketing_Status'].'</td>
                <td>'.$rowe['Drug_ID'].'</td>
               <td>'.$rowe['Approval_year'].'</td>
            </tr>';
        }
        ?>



        </tbody>
    </table>




    <br><br>







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
