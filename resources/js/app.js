import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



window.Echo.private('App.Models.User.' + id).notification((event) => {
    console.log(event);
    $('#push-notification').prepend(`<div class="dropdown-item d-flex justify-content-between align-items-center">
        <a href="${event.link}?notify=${event.id}" class="dropdown-item"><i class="fa fa-eye"></i>New Post Comment : ${event.post_title.substring(0 , 14)}</a>
        </div>`) ; 
    notification_count = Number($('#count-notification').text()) ; 
    notification_count++ ; 
    $('#count-notification').text(notification_count) ; 
}) ;