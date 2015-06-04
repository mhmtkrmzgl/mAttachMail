<?php 

ini_set('upload_max_filesize', '30M'); 
ini_set('post_max_size', '30M');  
ini_set('memory_limit', '30M'); 
ini_set('max_input_time', 500); 
ini_set('max_execution_time', 500);

require("config.php");
require("phpmailer/class.phpmailer.php");

$ad = $_POST["isim"];
$soyad = $_POST["soyisim"];
$eposta = $_POST["eposta"];
$konu = $_POST["konu"];
$mesaj = $_POST["mesaj"];
$tamAd = $ad.' '.$soyad;
$dosyaAd = round(111111,999999);

if($ad != "" && $soyad != "" && $eposta != "" && $konu != "" && $mesaj != ""){   
if(filter_var($eposta, FILTER_VALIDATE_EMAIL)){

if($_FILES['attachment']['name'] != ""){
$geciciDosyaAdi=$_FILES['attachment']['tmp_name']; 
$orjinalDosyaAdi=$_FILES['attachment']['name']; 
$dosyaBilgi = pathinfo($orjinalDosyaAdi);
$dosyaTipi = $dosyaBilgi["extension"];  
$secilenDosyaAdi= $dosyaAd.'.'.$dosyaTipi; 
$hedef_klasor = "attach";   

if (is_uploaded_file($geciciDosyaAdi)){
$attach = $hedef_klasor.'/'.$secilenDosyaAdi;  
if (move_uploaded_file( $geciciDosyaAdi, $attach)){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
//    $mail->SMTPSecure = "ssl";
    $mail->Port = SMTP_PORT;
    $mail->Host = SMTP_HOST;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->CharSet = 'UTF-8';
    $mail->SetFrom(SMTP_USERNAME, SMTP_USERNAME);

    $mail->Subject = $konu;
    $body = $mesaj;
    $mail->MsgHTML($body);
    $mail->AddReplyTo($eposta, $tamAd);
    $mail->AddAddress(SMTP_USERNAME, SMTP_USERNAME);
    $mail->AddAttachment($attach); 
    if($mail->Send()){echo 'imageOk';}
    else{echo 'Mesajınız gönderilemedi. Lütfen tekrar deneyiniz.';}
}
else{echo'Dosya yüklenemedi. Lütfen tekrar deneyiniz.';}}
else{echo'Dosya yüklenemedi. Lütfen tekrar deneyiniz.';}}
else{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
//    $mail->SMTPSecure = "ssl";
    $mail->Port = SMTP_PORT;
    $mail->Host = SMTP_HOST;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->CharSet = 'UTF-8';
    $mail->SetFrom(SMTP_USERNAME, SMTP_USERNAME);

    $mail->Subject = $konu;
    $body = $mesaj;
    $mail->MsgHTML($body);
    $mail->AddReplyTo($eposta, $tamAd);
    $mail->AddAddress(SMTP_USERNAME, SMTP_USERNAME);
    if($mail->Send()){echo 'imageOk';}
}}
else{echo'Lütfen geçerli bir eposta adresi giriniz.';}}    
else{echo'Lütfen tüm alanları doldurunuz.';}



?>