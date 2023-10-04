import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
Echo.private('App.Models.Teacher.' + userId)
    .notification((notification) => {
        console.log(notification);
    });
