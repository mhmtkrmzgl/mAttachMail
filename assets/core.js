/* Çekirdek JS Dosyası */
$(function(){
    $("form#pForm").ajaxForm({
        beforeSend: function(){},
        uploadProgress: function(olay, yuklenen, toplam, yuzde){$("div.response").html("<p class='warning'>Lütfen Bekleyiniz..</p>");},
        complete: function(xhr){
            if(xhr.responseText == 'imageOk'){$("div.response").html("<p class='success'>Mesajınız gönderildi.</p>");  }
            else{$("div.response").html("<p class='error'>"+xhr.responseText+"</p>");}
        },
    });
});