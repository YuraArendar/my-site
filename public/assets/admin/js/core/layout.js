$(document).ready(function(){

    // инициализация чекбокса в виде переключателя

    if (Array.prototype.forEach) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html);
        });
    }
    else {
        var elems = document.querySelectorAll('.switchery');
        for (var i = 0; i < elems.length; i++) {
            var switchery = new Switchery(elems[i]);
        }
    }

    // Удаление текущего элемента

    $('.remove-button').on('click',function(e){
        e.preventDefault();
        var url = '/admin/'+$(this).data('item')+'/delete';
        var id = $(this).data('id');
        var _token = $('meta[name="csrf_token"]').attr('content');
        swal({
            title: "Are you sure?",
            text: "You will delete this item!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF7043",
            confirmButtonText: "Yes, delete it!"
        },
        function(isConfirm){
            if(isConfirm){
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token:_token,id:id},
                    dataType: "json",
                    success: function(data){
                        Main.actionData(data);
                    }
                });
            }
        });
    });


    // установка активности записи
    $('.active-button').on('change',function(){
        var url = '/admin/'+$(this).data('item')+'/active';
        var id = $(this).data('id');
        var _token = $('meta[name="csrf_token"]').attr('content');
        var checked = $(this).prop('checked');
        if(typeof checked != 'undefined'){
            checked = (checked) ? 1 : 0;
            $.ajax({
                type: "POST",
                url: url,
                data: {_token:_token,id:id,checked:checked},
                dataType: "json",
                success: function(data){

                }
            });
        }
    });

    // изменение языка редактируемого контента

    $('.change-lang-form').on('click',function(){
        var lang = $(this).data('lang');
        var _token = $('meta[name="csrf_token"]').attr('content');

        $.ajax({
            type: "POST",
            url: '/admin/language-form',
            data: {_token:_token,language:lang},
            dataType: "json",
            success: function(data){
                Main.actionData(data);
            }
        });
    });

    // инициализация дерева структуры
    if(typeof $(".tree-default").html() != 'undefined'){
        $(".tree-default").fancytree({
            init: function(event, data) {
                $('.has-tooltip .fancytree-title').tooltip();
            },
            click: function(event, data) {
                var node = data.node;
                window.location.href = node.data.href;
            },
        });
    }

});
