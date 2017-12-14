jQuery(function($) {
    $(document).ready(function() {
        
    });
    
    $(document).find('.mfw-btn-add').click(function(e) {
        var userName, userMessage, data;
        userName = $(this).parent().find('.mfw-user-name').val();
        userMessage = $(this).parent().find('.mfw-message').val();
        data = {
            action: 'guest_book',
            user_name: userName,
            message: userMessage
        }
        console.log(data);
        console.log(ajaxurl + '?action=guest_book');
            
            
        $.post(ajaxurl, data, function(response) {
            alert('Получено с сервера: ' + response.data.message);
            console.log(response);
        });
        return false;
    });

});