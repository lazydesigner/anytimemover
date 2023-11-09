document.getElementById('open-the-chat').addEventListener('click', () => {
    document.getElementById('chat').style.transform = " scale(1) translate(0 , 0)";
    document.getElementById('open-the-chat').style.display = 'none';
    token = document.getElementById('authtoken').value
    ip = document.getElementById('ip').value
    const notification = new FormData();
    notification.append('token', token);
    notification.append('ip', ip);
    notification.append('user', 'notification');
    fetch('https://dashboard.rapidautoshipping.com/chat/basic.php', {
            method: 'POST',
            body: notification
        }).then(res => res.json())
        .then(d => {})
})
document.getElementById('chat-closer-button').addEventListener('click', () => {
    document.getElementById('chat').style.transform = " scale(0) translate(50px , 200px)";
    document.getElementById('open-the-chat').style.display = 'flex'
})
document.getElementById('form_two').addEventListener('submit', function (e) {
    e.preventDefault()
})
document.getElementById('pk_solutions_send_chat').addEventListener('click', function () {
    
    var pk_solutions_chatus = document.getElementById("pk_solutions_chatus").value
    var ip = document.getElementById('ip').value
    var authtoken = document.getElementById('authtoken').value

    const chatFormData = new FormData();
    chatFormData.append('message', pk_solutions_chatus);
    chatFormData.append('ip', ip);
    chatFormData.append('authtoken', authtoken);

    fetch('https://dashboard.rapidautoshipping.com/chat/sendchat.php',{
        method :'POST',
        body: chatFormData,
    }).then(response=>response.json())
    .then(data=>{
        if(data['status'] == 402 ){
            document.getElementById("pk_solutions_chatus").disabled = true;
            document.getElementById("pk_solutions_chatus").style.cursor = 'disable';
        }else{
            document.getElementById('pk_solutions_chat-area').innerHTML = data['data']
            document.getElementById("pk_solutions_chatus").value = '';
            objDiv = document.getElementById('pk_solutions_chat-area')
            objDiv.scrollTop = objDiv.scrollHeight;
        }
    })

    
})
notification_sound = 0
function Resume_chat(){
    const eventSource = new EventSource('https://dashboard.rapidautoshipping.com/chat/updatechat.php?ip=' + document.getElementById('ip').value + '&token=' + document.getElementById('authtoken').value + '');
    eventSource.onmessage = (event) => {
        if (JSON.parse(event.data)['notification'] > 0) {
            document.getElementById('notify').style.display = 'block'
            if (notification_sound == 0) {
                notificationSound.play();
                notification_sound++
            }
        } else {
            document.getElementById('notify').style.display = 'none'
            notification_sound = 0
        }
        document.getElementById('pk_solutions_chat-area').innerHTML = JSON.parse(event.data)['chat']
        objDiv = document.getElementById('pk_solutions_chat-area')
        objDiv.scrollTop = objDiv.scrollHeight;
    }
}
Resume_chat()
window.addEventListener('beforeunload', function (event) {
    token = document.getElementById('authtoken').value
    ip = document.getElementById('ip').value
    const useroffline = new FormData();
    useroffline.append('token', token);
    useroffline.append('ip', ip);
    useroffline.append('status', 'false');
    useroffline.append('user', 'offline');
    fetch('https://dashboard.rapidautoshipping.com/chat/basic.php', {
        method: 'POST',
        body : useroffline
    }).then(res => res.json()).then(d => {})
});
function isMobileDevice() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}
if (isMobileDevice()) {
    document.addEventListener('visibilitychange', function() {
        if (document.visibilityState === 'hidden') {
            token = document.getElementById('authtoken').value
            ip = document.getElementById('ip').value
            const useroffline = new FormData();
            useroffline.append('token', token);
            useroffline.append('ip', ip);
            useroffline.append('status', 'false');
            useroffline.append('user', 'offline');
            fetch('./basic.php', {
                method: 'POST',
                body : useroffline
            }).then(res => res.json()).then(d => {})
        } else {
            token = document.getElementById('authtoken').value
            ip = document.getElementById('ip').value
            const useroffline = new FormData();
            useroffline.append('token', token);
            useroffline.append('ip', ip);
            useroffline.append('status', 'true');
            useroffline.append('user', 'offline');
            fetch('./basic.php', {
                method: 'POST',
                body : useroffline
            }).then(res => res.json()).then(d => {})
        }
    });
}
document.getElementById('pk_solutions_chatus').addEventListener('keyup', function (event) {
    let b = document.getElementById('pk_solutions_send_chat')

    token = document.getElementById('authtoken').value
    ip = document.getElementById('ip').value
    const usertying = new FormData();
    usertying.append('token', token);
    usertying.append('ip', ip);
    if (event.target.value.length == 0) {
        b.disabled = true
        usertying.append('user', 'typing-chat-admin');
        usertying.append('typing-status', 'false');
        fetch('https://dashboard.rapidautoshipping.com/chat/basic.php', {
            method: 'POST',
            body: usertying
        }).then(res => res.json())
            .then(d => {})
    } else {
        b.disabled = false
        usertying.append('user', 'typing-chat-admin');
        usertying.append('typing-status', 'true');
        fetch('https://dashboard.rapidautoshipping.com/chat/basic.php', {
            method: 'POST',
            body: usertying
        }).then(res => res.json())
            .then(d => {})
    }
})
function playNotificationSound() {
    var notificationSound = document.getElementById("notificationSound");
    notificationSound.play();
}