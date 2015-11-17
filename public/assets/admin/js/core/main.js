/**
 * Created by yura on 15.11.15.
 */
var Main = {
    init:function(){
        $('input').on('click',function(){
            var id = this.name;
            var el = $('#'+id+'-error');
            el.html('');
        });
    },
    formSubmit:function(form){
        var url = form.action;
        var _token = $('input[name="_token"]').val();
        console.log(_token);
        var email = $('#input-email').val();
        var password = $('#input-password').val();

        $.ajax({
            type: "POST",
            url: url,
            data: $(form).serialize(),
            dataType: "json",
            success: function(data){
                if(typeof data['redirect'] != 'undefined'){
                    if(data['redirect']=='')
                        window.location.reload();
                    else
                        window.location = data['redirect'];
                }else{
                    if(typeof data['message'] != 'undefined')
                        Main.showNotifyMessage(data['title'],data['message'],data['icon'],data['class']);
                    else
                        Main.showValidationMessage(data);
                }
                console.log(data);
            }
        });

        return false;
    },
    showNotifyMessage: function(title,text,type,simbol,className){
        if(!type)
            type='success';

        new PNotify({
            title: title,
            text: text,
            icon: simbol,
            type: type,
            addclass:className
        });
    },
    showValidationMessage: function(data){
        $.each(data,function(i,value){
            var el = $('#'+i+'-error');
            el.html(value);
        });
    }

};

$(document).ready(function(){
    Main.init();
});
