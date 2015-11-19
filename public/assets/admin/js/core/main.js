/**
 * Created by yura on 15.11.15.
 */
var Main = {
    init:function(){
        $('input').on('click',function(){
            var id = this.name;
            var el = $('#'+id+'-error');
            el.html('');

            $(this).closest('.form-group').removeClass('has-error').removeClass('has-feedback');
            $('#'+id+'-error-icon').hide();
        });
        $('.form-control-feedback').each(function(){
            $(this).hide();
        });
    },
    formSubmit:function(form){
        var url = form.action;
        $.ajax({
            type: "POST",
            url: url,
            data: $(form).serialize(),
            dataType: "json",
            success: function(data){
                Main.actionData(data);
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
            var input = $('#'+i);
            var el = $('#'+i+'-error');
            input.closest('.form-group').addClass('has-error').addClass('has-feedback');
            $('#'+i+'-error-icon').show();
            el.html(value);
        });
    },
    actionData: function(data){
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
    }

};

$(document).ready(function(){
    Main.init();
});
