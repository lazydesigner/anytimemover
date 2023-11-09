self.addEventListener('push', function(event) {
    var options = {
        body: event.data.text(),
        icon: 'https://rapidautoshipping.com/assets/images/Untitled-1-Recovered.png'
    };

    event.waitUntil(
        self.registration.showNotification('Push Notification', options)
    );
});
