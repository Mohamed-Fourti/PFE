window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

const NOTIFICATION_TYPES = {
    Réclamation: 'App\\Notifications\\RéclamationNotification',
    newPost: 'App\\Notifications\\NewPost'
};




    var notifications = [];
    var delay = ( function() {
        var timer = 0;
        return function(callback, ms) {
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();
    

    $(document).ready(function() {
        var el = document.querySelector('.notification');

        if(User.id) {
            $.get(`/notifications`, function (data) {
                addNotifications(data, "#notifications");
            });

            window.Echo.private('App.Models.User.' + User.id)
            .notification((notification) => {
                addNotifications([notification], '#notifications');
                document.getElementById('CountNotification').innerHTML = parseInt(document.getElementById('CountNotification').innerHTML)+1;
                delay(function(){
                    var count = Number(el.getAttribute('data-count')) ;
                    el.setAttribute('data-count', count + 1);
                    el.classList.remove('notify');

                }, 400 ); // end delay

                    el.classList.add('notify'); 
                 

            });
        }
    });
    
    function addNotifications(newNotifications, target) {
        notifications = _.concat(newNotifications,notifications );
        notifications.slice(0,3);
        showNotifications(notifications, target);
    }
    
    function showNotifications(notifications, target) {
        if(notifications.length) {
            var htmlElements = notifications.map(function (notification) {
                return makeNotification(notification);
            });
            $(target + 'Menu').html(htmlElements.join(''));
            $(target).addClass('has-notifications')
        } else {
            $(target + 'Menu').html('<li>No notifications</li>');
            $(target).removeClass('has-notifications');
        }
    }
    
    function makeNotification(notification) {
        var notificationText = makeNotificationText(notification);
        const id = notification.id;

        return `<li><a  href="/notifications/${id}">${notificationText}</a></li>`;
    }
    

    
    function makeNotificationText(notification) {
        var text = '';
        if(notification.type === NOTIFICATION_TYPES.Réclamation) {
            const user_name = notification.data.user_name;
            const priorité = notification.data.priorité;
            text +=`<p>Nouvelle réclamation de ${user_name} de priorité ${priorité} </p>`;
        } 
        return text;
    }