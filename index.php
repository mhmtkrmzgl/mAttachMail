<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <title>mk Mail Attachment Form Script</title>
    <style type="text/css">@import url("assets/reset.css");</style>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/jquery.js"></script>    
    <script src="assets/malsup.js"></script>    
    <script src="assets/core.js"></script>    
</head>  
<body>
    <div id="attach">
        <form id="pForm" action="send.php" method="POST" enctype="multipart/form-data">
           <input name="isim" type="text" placeholder="Adınız" />
           <input name="soyisim" type="text" placeholder="Soyadınız" />
           <input name="eposta" type="text" placeholder="Eposta Adresiniz" />
           <input name="konu" type="text" placeholder="Konu" />
           <textarea name="mesaj" placeholder="Mesajınız"></textarea>
            <input name="attachment" type="file" />
            <button type="submit">Gönder</button>
        </form>
        <div class="response"></div>
    </div>
</body>
</html>