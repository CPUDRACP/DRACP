
<link rel="stylesheet" type="text/css" href="http://dracp.cpu-bioinfor.org/molviewer/pdbe-molstar-light-3.0.0.css">
<script type="text/javascript" src="http://dracp.cpu-bioinfor.org/molviewer/pdbe-molstar-plugin-3.0.0.js"></script>
<style>
      .msp-plugin ::-webkit-scrollbar-thumb {
          background-color: #474748 !important;
      }
      .viewerSection {
        margin: 110px 0 0 0;
      }
      #myViewer{
        width:400px;
        height: 400px;
        position:relative;
      }
      .msp-sequence-wrapper-non-empty{
          background-color: #fff;
      }
</style>
 



        <?php

            $piecesb = explode("##", $row['Structure']);
            $numb = count($piecesb);
            $ib=0;

            echo '<div class="viewerSection">';
            $ic=0;
            

            while($ic<$numb){
                $linkc=$piecesb[$ic];
                
                if($ic==0){
                    echo ' <div id="myViewer" style="height: 400px; width: 400px; position: relative;" id="'.$ic.'"></div>';
                    $linkd='http://dracp.cpu-bioinfor.org/Structure/predicted cif/'.$linkc.''; 

                }else{
                    echo ' <div id="myViewer" style="height: 400px; width: 400px; position: relative;display: none" id="'.$ic.'"></div>';
                    $linkd='http://dracp.cpu-bioinfor.org/Structure/predicted cif/'.$linkc.'';

                }

                $ic++;
            }
            echo '</div>';
    ?>
      <!-- Molstar container -->
      
    
    <script>
        
      //Create plugin instance
      var viewerInstance = new PDBeMolstarPlugin();
      var link = '<?php echo $linkd;?>'
      //Set options (Checkout available options list in the documentation)
      var options = {
        customData: {
          url: link,
          format: 'cif'
        },
        alphafoldView: true,
        bgColor: {r:255, g:255, b:255},
        hideCanvasControls: ['selection', 'animation', 'controlToggle', 'controlInfo']
      }
      
      //Get element from HTML/Template to place the viewer 
      var viewerContainer = document.getElementById('myViewer');
  
      //Call render method to display the 3D view
      viewerInstance.render(viewerContainer, options);
      
    </script>
    
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