<?php
session_start();

// Fungsi untuk menghapus tampilan
function clear() {
    $_SESSION['display'] = '0';
}

// Fungsi untuk menghapus karakter terakhir dari string tampilan
function delete() {
    if (isset($_SESSION['display'])) {
        $_SESSION['display'] = substr($_SESSION['display'], 0, -1);
        if ($_SESSION['display'] === '0') {
            $_SESSION['display'] = '0';
        }
    }
}

//fungsi pembagian
function Percent(){
    // Mengubah angka menjadi persentase
        if ($_SESSION['display'] !== '0') {
            // Jika tampilan tidak 0, ubah tampilan menjadi persentase
            $_SESSION['display'] .= '%';
        }
}

// function distribution
function distribution(){
    // Mengubah angka menjadi persentase
        if ($_SESSION['display'] !== '0') {
            // Jika tampilan tidak 0, ubah tampilan menjadi persentase
            $_SESSION['display'] .= '÷';
        }
            
}

// fungsi perkalian
function multiplication(){
    //mengubah angka menjadi persentase
    if ($_SESSION['display'] !== '0') {
        $_SESSION['display'] .= '×';
    }
}

function subtraction(){
    if ($_SESSION['display'] !== '0') {
        $_SESSION['display'] .= '-';
    }
}

function plus(){
    if ($_SESSION['display'] !== '0') {
        $_SESSION['display'] .= '+';
    }
}

function processCalculation() {
    if (!isset($_POST['input'])) return;
    $input = $_POST['input'];
    switch ($input) {
        case 'AC':
            clear();
            break;
        case 'DEL':
            delete();
            break;
        case '%':
            Percent();
            break;
        case '÷':
            distribution();
            break;
        case '×':
            multiplication();
            break;
        case '-':
            subtraction();
            break;
        case '+':
            plus();
            break;
            // Tambahkan operator ke string tampilan
            
        case '=':
            // Evaluasi ekspresi dan perbarui tampilan
            $expression = $_SESSION['display'];
            $expression = str_replace('×', '*', $expression);
            $expression = str_replace('÷', '/', $expression); 
            $expression = str_replace('%', '/100', $expression);
            try {
                // eval hanya akan mengeksekusi jika ekspresi valid
                @eval('$result = ' . $expression . ';');
                if (isset($result)) {
                    $_SESSION['display'] = $result;
                } else {
                    $_SESSION['display'] = '';
                }
            } catch (Throwable $e) {
                $_SESSION['display'] = 'Error';
            }
            break;
        default:
            // Tambahkan digit atau titik desimal ke string tampilan
            if ($_SESSION['display'] == '0' && $input != '.') {
                $_SESSION['display'] = $input;
            } else {
                $_SESSION['display'] .= $input;
            }
            break;
    }
}

// Proses kalkulasi
processCalculation();

// Arahkan kembali ke halaman kalkulator
header('Location: index.php');
exit();
?>
