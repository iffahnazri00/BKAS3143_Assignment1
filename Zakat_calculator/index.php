<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="zakat_calculator.css">
</head>
<body>

<div class="container" align="center">

	<?php
        // Check if the "Calculate" button was pressed, then get the data from inputs
        if (isset($_GET['m_income']) && isset($_GET['self']) && isset($_GET['wifer']) 
		&& isset($_GET['child_blw']) && isset($_GET['child_ovr']) && isset($_GET['parents']) 
		&& isset($_GET['epf']) && isset($_GET['self_edu'])){
			$m_income = (int)$_GET["m_income"] *12;
			$self = (int)$_GET["self"];
			$wifer = (int)$_GET["wifer"] * 5000;
			$child_blw = (int)$_GET["child_blw"] * 2000;
			$child_ovr = (int)$_GET["child_ovr"] * 5000;
			$parents = (int)$_GET["parents"];
			$epf = (int)$_GET["epf"];
			$self_edu = (int)$_GET["self_edu"];
			
        } else {
			$m_income = 0;
			$self = 0;
			$wifer = 0;
			$child_blw = 0;
			$child_ovr = 0;
			$parents = 0;
			$epf = 0;
			$self_edu = 0;
        }
        // Make the calculations
		$zakat_yearly = round(($m_income - $self - $wifer - $child_blw - $child_ovr - $parents - $epf - $self_edu)* 0.025,2);
		$zakat_monthly = round($zakat_yearly / 12,2);
    ?>

<div class="content">
	<h1>ZAKAT CALCULATOR</h1>
	<form action="index.php" method="get">
		<h2>Income</h2>
		<label for="Monthly Income">Monthly Income:</label>
		<input type="number" id="m_income" name="m_income" value="<?=$m_income?>"><br><br>
		<h2>Deduction</h2>
		<label for="Self">Self-deduction:</label>
		<input type="number" id="self" name="self" min="12000" max="12000" readonly value="12000"><br><br>
    	<label for="Number of wives">Number of wives (RM5000 per wife):</label>
		<input type="number" value="<?=$wifer?>" id="wifer" name="wifer"><br><br>
		<label for="Number of children below 18">Number of children below 18 (RM2000 per children):</label>
		<input type="number" value="<?=$child_blw?>" id="child_blw" name="child_blw"><br><br>
		<label for="Number of children over 18">Number of children over 18 - studying in University (RM5000 per children):</label>
		<input type="number" value="<?=$child_ovr?>" id="child_ovr" name="child_ovr"><br><br>
		<label for="Parents yearly contribution">Parents yearly contribution :</label>
		<input type="number" value="<?=$parents?>" id="parents" name="parents"><br><br>
		<label for="EPF">EPF :</label>
		<input type="number" value="<?=$epf?>" id="epf" name="epf"><br><br>
		<label for="Self education">Self education (max RM2000):</label>
		<input type="number" value="<?=$self_edu?>" id="self_edu" name="self_edu" min="0" max="2000"> <br><br>
		<input type="Submit" value="Calculate" id="calculateBtn">
	</form>

	<div id="summary">
        <p>Zakat Entitled (Yearly): RM
			<span id="zakat_yearly">
				<?=$zakat_yearly ?>
            </span>
		</p>
        <p>Zakat Entitled (Monthly) : RM 
            <span id="zakat_monthly">
                <?=$zakat_monthly ?> 
            </span>
        </p>
    </div>
</div>
		
