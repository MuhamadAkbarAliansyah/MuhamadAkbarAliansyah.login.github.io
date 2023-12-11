<?php 
$hasil = '';
$clashasill = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $value = $_POST['nilai'];
    $clashasill = $_POST['calculation'];
    if ($value === 'DEL') {
        $clashasill = substr($clashasill, 0, -1);
    } elseif ($value === '=') {
        $clashasill = str_replace('%', '/100', $clashasill);
        $clashasill = str_replace(['+','-','*','/'], ['+ ','- ','* ','/ '], $clashasill);
        $clashasill = eval("return $clashasill;");
        // $clashasill = "result";
    } elseif ($value === 'C') {
        $clashasill = '';
    }else {
        $clashasill .= $value;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
            <div class="calculator p-2 border">
                <form method="post" action="">
                    <input class="display form-control"  type="text" name="calculation" value="<?php  echo $clashasill ; ?>" readonly>
                    <div class="buttons">   
                        <?php 
                        $buttons = ['7','8','9','+','4','5','6','-','1','2','3','*','0','.','/','C','DEL','='];
                        foreach ($buttons as $button) {
                            $class = 'button btn';
                            if($button === 'C' || $button === 'DEL') {
                                $class .= ' clear';
                            }
                            echo '<button class="'.$class.'" type="submit" name="nilai" value="'.$button.'">'.$button.'</button>';
                        }
                        ?>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
                        
</body>
</html>