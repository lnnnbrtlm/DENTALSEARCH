<?php 
	session_start();
	include 'include/connection.php';
	include 'include/function.php';

    $toothID = $_POST['toothNumber'];
    $position = $_POST['position'];
    $color = $_POST['color'];
    $condition = $_POST['condition'];
    $procedure = $_POST['procedure'];
    $conLegend = "";
    $proLegend = "";
if(isset($_POST['submit'])){
    if($condition == 'Present Teeth'){
        $conLegend = 'P';
      }
    if($condition == 'Decayed'){
        $conLegend = 'D';
      }
    if($condition == 'Missing due to Canes'){
        $conLegend = 'M';
      }
    if($condition == 'Missing due to Other Causes'){
          $conLegend = 'MO';
    }
    if($condition == 'Impacted Tooth'){
        $conLegend = 'Im';
    }
    if($condition == 'Supernumerary Tooth'){
        $conLegend = 'Sp';
      }
    if($condition == 'Root Fragment'){
          $conLegend = 'Rf';
     }
    if($condition == 'Unerupted'){
        $conLegend = 'Un';
      }
    if($procedure == 'Amaigam Filling'){
        $proLegend = 'Am';
      }
    if($procedure == 'Composite Filling'){
        $proLegend = 'CO';
      }
    if($procedure == 'Jacket Crown'){
        $proLegend = 'JC';
      }
    if($procedure == 'Abutment'){
        $proLegend = 'Ab';
      }
    if($procedure == 'Attachment'){
          $proLegend = 'Att';
      }
    if($procedure == 'Pontic'){
        $proLegend = 'P';
    }
    if($procedure == 'Inlay'){
        $proLegend = 'In';
      }
    if($procedure == 'Implant'){
        $proLegend = 'Imp';
      }
    if($procedure == 'Removable Dentures'){
          $proLegend = 'Rm';
        }
        
    switch($position){
    
        case "Top":
	if (addDentalChartTop($conn, $toothID, $condition, $procedure,$conLegend,$proLegend,$color)) {
			
			header("Location: ../dc-assistant-doctor/dental-chart-adult.php");
			exit();
	}
    break;
    case "Left":
	if (addDentalChartLeft($conn, $toothID, $condition, $procedure,$conLegend,$proLegend,$color)) {
			
			header("Location: ../dc-assistant-doctor/dental-chart-adult.php");
			exit();
	}
    break;
    case "Right":
	if (addDentalChartRight($conn, $toothID, $condition, $procedure,$conLegend,$proLegend,$color)) {
			
			header("Location: ../dc-assistant-doctor/dental-chart-adult.php");
			exit();
	}
    break;
    case "Front":
	if (addDentalChartFront($conn, $toothID, $condition, $procedure,$conLegend,$proLegend,$color)) {
			
			header("Location: ../dc-assistant-doctor/dental-chart-adult.php");
			exit();
	}
    break;
    case "Back":
	if (addDentalChartBack($conn, $toothID, $condition, $procedure,$conLegend,$proLegend,$color)) {
			
			header("Location: ../dc-assistant-doctor/dental-chart-adult.php");
			exit();
	}
    break;
}

}
?>
<script type="text/javascript">

function CopyToLabel(a) {
  //Reference the TextBox.

  //Reference the Label.
  var lblName = document.getElementById("selectedTooth");

  //Copy the TextBox value to Label.
  lblName.innerHTML = a.value;
}
</script>