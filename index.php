<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="display" id="display"><?php echo $_SESSION['display'] ?? '0'; ?></div>
        <form action="process.php" method="POST" class="buttons">
            <button type="submit" class="tombol" name="input" value="AC">AC</button>
            <button type="submit" class="tombol" name="input" value="DEL">DEL</button>
            <button type="submit" class="tombol" name="input" value="%">%</button>
            <button type="submit" class="operator" name="input" value="÷">÷</button>

            <button type="submit" class="angka" name="input" value="7">7</button>
            <button type="submit" class="angka" name="input" value="8">8</button>
            <button type="submit" class="angka" name="input" value="9">9</button>
            <button type="submit" class="operator" name="input" value="×">× </button>

            <button type="submit" class="angka" name="input" value="4">4</button>
            <button type="submit" class="angka" name="input" value="5">5</button>
            <button type="submit" class="angka" name="input" value="6">6</button>
            <button type="submit" class="operator" name="input" value="-">-</button>

            <button type="submit" class="angka" name="input" value="1">1</button>
            <button type="submit" class="angka" name="input" value="2">2</button>
            <button type="submit" class="angka" name="input" value="3">3</button>
            <button type="submit" class="operator" name="input" value="+">+</button>

            <button type="submit" class="angka" name="input" value="0">0</button>
            <button type="submit" class="angka" name="input" value="00">00</button>
            <button type="submit" class="angka" name="input" value=".">.</button>
            <button type="submit" class="operator" name="input" value="=">=</button>
        </form>
    </div>
</body>
</html>