<?php include '../connection.php';

session_start();

if(!isset($_SESSION['email'])){
    header('Location: https://dashboard.rapidautoshipping.com/chat-dashboard-login');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
        }

        ::-webkit-scrollbar {
            width: 5px;
            /* height: 12px; */
        }

        ::-webkit-scrollbar-thumb {
            background-color: grey;
        }

        ::-webkit-scrollbar-track {
            background-color: lightgray;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .container {
            width: 100%;
            height: 100%;
        }

        .conteiner-flex {
            width: 100%;
            height: 100%;
            display: flex;
        }

        .ip-lists {
            height: 100%;
            width: 23%;
            background-color: dodgerblue;
            display: block;
            padding: 1%;
        }

        .ip-chat-detail {
            width: 77%;
            height: 100%;
            display: flex;
            gap: 1%;
            padding: .5%;
        }

        .chat-room {
            flex: 0 0  77%;
            height: 100%;
            display: block;
        }

        .ip-detail {
            flex: 0 0  23%;
            height: 100%;
            font-size: 16px;
            padding: 5%;
            position: relative;
        }
        .ip-detail-container{
            background-color: rgba(184, 218, 255, .3);
            border-radius: 5px;
            width: 100%;
            height: auto;
        }

        .ip-box-container {
            width: 100%;
            height: 100%;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            font-size: larger;
            margin: 5% 0;
        }

        .ip-list {
            width: auto;
            padding: 1% 3%;
            background-color: #ffffff10;
            /* background-color: lightgreen; */
            position: relative;
            font-size: larger;
            margin: 5% 0;
            cursor: pointer;
            border-radius: 5px;
            color: white;
        }

        .offline {
            width: 15px;
            height: 15px;
            background-color: grey;
            border-radius: 50%;
            position: absolute;
            left: -15%;
        }

        .online {
            width: 15px;
            height: 15px;
            background-color: green;
            border-radius: 50%;
            position: absolute;
            top: 18%;
            left: -5%;
        }

        .notify {
            position: absolute;
            top: -40%;
            right: -3%;
            /* right: 0; */
            width: 20px;
            z-index: 9;
            height: 20px;
            border-radius: 50%;
            background-color: orangered;
            display: grid;
            place-items: center;
        }

        .ip-box {
            width: 100%;
            height: 75%;
            background-color: rgba(255, 255, 255, .3);
            overflow-y: auto;
            padding: 5% 3% 5% 5%;
            margin-bottom: 3%;
            user-select: none;
            border-radius: 5px;
        }

        .setting {
            border-radius: 5px;
            padding: 2%;
            background-color: rgba(255, 255, 255, .3);
        }

        .setting li {
            cursor: pointer;
        }
        .ip {
            width: 100%;
            height: 10px;
            padding: 2%;
            text-align: center;
            background-color: rgba(184, 218, 255, .3);
            border-radius: 5px;
            line-height: 10%;
            font-weight: bold;
        }

        .chat {
            width: 100%;
            height: calc(100% - 25px);
            padding: .3%;
            display: block;
        }
        .chat-area{
            width: 100%;
            height: calc(100% - 10% - 10px);
            border-radius: 5px;
            background-color: rgba(205, 205, 205, .3);
            margin: .3% auto;
            padding: 2%;
            overflow-y: auto;
        }
        .admin-send-form{
            width: 100%;
            height: 8%;
            background-color: white;
            border-radius: 5px;
        }
        .chat-box{
            width: 100%;
            height: 100%;
            background-color: white;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            border: 1px solid lightgrey;
            /* padding: 1%; */
        }
        .chat-send{
            width: 100%;
            outline: 0;
            border: 0;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            padding: 1%;
        }
        .send{
            width: 15%;
            border: 0;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            padding: 1%;
            background-color: lightblue;
            cursor: pointer;
        }
        .clear_chat, .block_chat{
            width: 100%;
            height: 40px;
            border-radius: 5px;
            border: 0;
            background-color: teal;
            color: white;
            cursor: pointer;
            font-weight: bold;
            margin: 1% 0;
        }
        .block_chat{
            background-color: tomato;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="conteiner-flex">
            <div class="ip-lists">
                <div class="ip-box-container">
                    <h2 style="padding: 2%;margin:0;text-align:center;">ADMIN CHAT</h2>
                    <div class="ip-box">
                        <ul id="list-of-online-user"></ul>
                        <ul id="list-of-ip"></ul>
                    </div>
                    <div class="setting">
                        <ul>
                            <li onclick ="window.location.href='https://dashboard.rapidautoshipping.com/chat-setting'">Setting</li>
                            <li onclick="Logout()" style="cursor:pointer;">Logout</li>  
                        </ul>
                    </div>
                </div>
            </div>
            <div class="ip-chat-detail" id="ip-chat-detail">
                
            </div>
        </div>
    </div>


   <audio id="notificationSound" src="https://dashboard.rapidautoshipping.com/chat/notification.wav" preload="auto"></audio>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js"></script>
    <script>
        var jsonData = {};
        let eventSource;
        i = 0

        //Read Message Function

        function updateAdminToAuthor(jsonData) {
        // Loop through each object in the JSON dataset
        for (let key in jsonData) {
            // Check if the "3" key (assuming it represents the role) has the value "admin"
            if (jsonData[key]["4"] === "delivered") {
            // If it's "admin," update it to "author"
            jsonData[key]["4"] = "read";
            }
        }
        return jsonData;
        }

        list_of_notification = [];//ADDEDD


        // Call the function to update "admin" to "author"
        // Active user Check
        function ActiveUsers(){
            eventSource2 = new EventSource('https://dashboard.rapidautoshipping.com/chat/admin/useronline.php');
            eventSource2.onmessage = (event) => {
                outputs = JSON.parse(event.data)
                list = outputs['array'];//ADDEDD
                for(m=0;m<list.length;m++){//ADDEDD
                    if(!list_of_notification.includes(list[m])){//ADDEDD
                        showNotification('New Message', 'You have a new message! from IP : '+list[m]+'');//ADDEDD
                        list_of_notification.push(list[m])//ADDEDD
                    }//ADDEDD
                }//ADDEDD
                document.getElementById('list-of-ip').innerHTML = outputs['offline']
                document.getElementById('list-of-online-user').innerHTML = outputs['online']
            }
        }
        ActiveUsers()



        //Read Message Function

        

        hasScrolled = false;
        function showChat(id) {
            fetch('https://dashboard.rapidautoshipping.com/chat/admin/fetchchat.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        'a': 'id',
                        'id': id
                    })
                }).then(res => res.json())
                .then(d => {
                    document.getElementById('ip-chat-detail').innerHTML = '<div class="chat-room" id="chat-room"><div class="ip" id="ip"></div><span id="blocked"></span><div class="chat" id="chat"></div></div><div class="ip-detail-container"><div class="ip-detail"><ul><li><div class="page" id="page"></div></li><li><div class="ip2" id="ip2"></div></li><li><div id="agent"></div></li><li><div><b>CITY</b><br><span id="city"></span></div></li><li><div><b>REGION-NAME</b><br><span id="regionName"></span></div></li><li><div><b>ZIP</b><br><span id="zip"></span></div></li><li><div><b>COUNTRY</b><br><span id="country"></span></div></li><li><div class="email" id="email"></div></li></ul><button class="clear_chat" onclick="clear_chat('+id+')">Clear Chat</button><button onclick="block_chat('+id+')" class="block_chat">block Chat</button></div></div>';
                    let chat = JSON.parse(d['mes'])
                    jsonData = chat
                    jsonData = updateAdminToAuthor(jsonData);
                    i = Object.keys(chat).length
                    document.getElementById('email').innerHTML = "<b>Email</b><br> " + d['email']
                    document.getElementById('agent').innerHTML = "<b>Agent</b><br> <span id='agent_name_'> " + d['agent'] + "</span>"
                    document.getElementById('ip').innerHTML = "<b>IP</b> : <span id='chatIP'> " + d['ip'] + "</span>"
                    document.getElementById('ip2').innerHTML = "<b>IP</b><br> <span id='chatIP'>" + d['ip'] + "</span>"
                    document.getElementById('page').innerHTML = "<b>PAGE</b><br> <span id='chatIP'>" + d['page'] + "</span>"

                    list_of_notification = list_of_notification.filter(item => item !== d['ip']);//ADDEDD

                    if (eventSource) {
                        eventSource.close();
                    }
                    getIPInformation(d['ip']);
                    document.getElementById('chat').innerHTML = '<div class="chat-area" id="chat-area"></div><form onsubmit="return blockSubmit();" id="form"><div class="chat-box"><input class="chat-send" id="chat-send" onkeyup="myFunction(event)" placeholder="Type a Message"><button class="send" id="send" onclick="SendMessage()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16"><path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/></svg></button></div></form>'
                        hasScrolled = false;
                        ip_count = document.querySelectorAll('.ip-list')
                        for (k = 0; k < ip_count.length; k++) {
                                ip_count[k].style.backgroundColor = '#ffffff10';
                                ip_count[k].style.color = 'white';
                        }

                        document.getElementById('ip-list'+id).style.backgroundColor = 'lightgreen';
                        document.getElementById('ip-list'+id).style.color = 'black';
                        ResumeChat(d['ip'])
                })

        }

        function blockSubmit() {
            return false;
        }
 
        function SendMessage(){
            //e.preventDefault()
            var msg = document.getElementById("chat-send").value;
            const d = new Date();
            jsonData = updateAdminToAuthor(jsonData);
            jsonData[i] = {}
            jsonData[i][1] = msg;
            jsonData[i][2] = d.getDate() + 'days : ' + d.getHours() + 'hrs : ' + d.getMinutes() + 'min : ' + d.getSeconds() + 'sec';
            jsonData[i][3] = document.getElementById('agent_name_').innerText;
            jsonData[i][4] = '';
            i++
            var jsonString = JSON.stringify(jsonData);
            fetch('https://dashboard.rapidautoshipping.com/chat/admin/fetchchat.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        'ip': document.getElementById('chatIP').innerText,
                        'a': 'msg',
                        'id': jsonString
                    })
                }).then(res => res.json())
                .then(d => {

                    fetch('https://dashboard.rapidautoshipping.com/chat/admin/fetchchat.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        'ip': document.getElementById('chatIP').innerText,
                        'a': 'typing-chat-to-false',
                        'id': 'false',
                        })
                    }).then(res => res.json())
                    .then(d=>{})

                    let chat = JSON.parse(d['mes'])
                    document.getElementById('chat-area').innerHTML = ''
                    document.getElementById("chat-send").value = ''
                    objDiv = document.getElementById('chat-area')
                    for (const key in chat) {
                        if (chat[key][3] == 'user') {
                            const timeDifference = calculateTimeDifference(chat[key][2]);

                            document.getElementById('chat-area').innerHTML += '<div style="display: grid; margin: 1.5% auto;"><div><p style="text-align: right; margin: 0;"><small style="font-size: small; padding-bottom: 1%;"><b>' + chat[key][3] + '</b> ' + timeDifference + '</small><br><span class="mesg-text" style=" display: inline-block; background-color: #36454F; color: white; padding: .3% 1.5%; border-radius: 5px;">' + chat[key][1] + '</span><br>   <small>' + chat[key][4] + '</small></p></div></div>'
                            objDiv.scrollTop = objDiv.scrollHeight;
                        } else {
                            const timeDifference = calculateTimeDifference(chat[key][2]);

                            document.getElementById('chat-area').innerHTML += '<div style="display: grid; margin: 1.5% auto;"><div><p style="text-align: left; margin: 0;"><small style="font-size: small; padding-bottom: 1%;"><b>' + chat[key][3] + '</b> ' + timeDifference + '</small><br><span class="mesg-text" style=" display: inline-block; background-color: #00008C; color: white; padding:.3% 3% .3% 1.5%; border-radius: 5px;">' + chat[key][1] + '</span><br>   <small>' + chat[key][4] + '</small></p></div></div>'
                            objDiv.scrollTop = objDiv.scrollHeight;
                        }
                    }
                })
        }
    </script>
    <script>

const calculateTimeDifference = (givenTime) => {
    // Split the given time format
    const [days, hours, minutes, seconds] = givenTime.split(' : ').map(value => parseInt(value));

    // Calculate the total time in seconds since the given time
    const givenTimeInSeconds = days * 24 * 60 * 60 + hours * 60 * 60 + minutes * 60 + seconds;

    // Get the current time in seconds
    const currentDate = new Date();
    const currentDays = currentDate.getDate();
    const currentHours = currentDate.getHours();
    const currentMinutes = currentDate.getMinutes();
    const currentSeconds = currentDate.getSeconds();
    const currentTimeInSeconds = currentDays * 24 * 60 * 60 + currentHours * 60 * 60 + currentMinutes * 60 + currentSeconds;

    // Calculate the time difference in seconds
    const timeDifferenceInSeconds = currentTimeInSeconds - givenTimeInSeconds;

    if (timeDifferenceInSeconds <= 0) {
        return '0sec'; // Return 0 if the given time is in the future or equal to the current time
    }

    if (timeDifferenceInSeconds < 60) {
        // If the time difference is less than 1 minute, show seconds
        return `${timeDifferenceInSeconds}sec`;
    }

    if (timeDifferenceInSeconds < 60 * 60) {
        // If the time difference is less than 1 hour, show minutes
        const minutesDifference = Math.floor(timeDifferenceInSeconds / 60);
        return `${minutesDifference}min`;
    }

    if (timeDifferenceInSeconds < 24 * 60 * 60) {
        // If the time difference is less than 1 day, show hours
        const hoursDifference = Math.floor(timeDifferenceInSeconds / (60 * 60));
        return `${hoursDifference}hrs`;
    }

    // Calculate days for the time difference
    const daysDifference = Math.floor(timeDifferenceInSeconds / (24 * 60 * 60));

    // Format the result as "XXdays"
    return `${daysDifference}days`;
};


        


        
        function ResumeChat(ip) {
            eventSource = new EventSource('https://dashboard.rapidautoshipping.com/chat/admin/chatupdate.php?ip=' + ip + '');
            eventSource.onmessage = (event) => {

                let chat2 = JSON.parse(event.data)
                let chat = JSON.parse(chat2['mes'])
                jsonData = chat
                jsonData = updateAdminToAuthor(jsonData);
                i = Object.keys(chat).length                

                document.getElementById('chat-area').innerHTML = ''
                objDiv = document.getElementById('chat-area')

                if(chat2['typing'] == 'true' ){
                    jsonData[i] = {}
                    jsonData[i][1] = 'typing';
                    jsonData[i][2] = '';
                    jsonData[i][3] = 'typing';
                    jsonData[i][4] = 'delivered';

                for (const key in chat) {
                    if (chat[key][3] == 'user') {
                        const timeDifference = calculateTimeDifference(chat[key][2]);

                        document.getElementById('chat-area').innerHTML += '<div style="display: grid; margin: 1.5% auto;"><div><p style="text-align: right; margin: 0;"><small style="font-size: small; padding-bottom: 1%;"><b>' + chat[key][3] + '</b> ' + timeDifference + '</small><br><span class="mesg-text" style=" display: inline-block; background-color: #36454F; color: white; padding:.3% 3% .3% 1.5%; border-radius: 5px;">' + chat[key][1] + '</span><br>   <small>' + chat[key][4] + '</small></p></div></div>'

                        list_of_notification = list_of_notification.filter(item => item !== ip); //ADDEDD
                        objDiv.scrollTop = objDiv.scrollHeight;
                        
                    }else if(chat[key][3] == 'typing'){
                            document.getElementById('chat-area').innerHTML += '<div style="display: flex;justify-content: right;margin:1.5% auto;height:100px;><div style="width:fit-content;text-align:right;padding:1%;"><p style="text-align:right; width:50px;float:right;" id="loading-message"></p></div></div>'
                            const animationContainer2 = document.getElementById("loading-message");
                            const animationData2 = {
                                container: animationContainer2, // Container element
                                renderer: "svg", // Choose the renderer (e.g., "svg" or "canvas")
                                loop: true, // Loop the animation
                                autoplay: true, // Autoplay the animation
                                path: "../loading.json", // Path to your JSON animation file
                            };
                            const animation2 = lottie.loadAnimation(animationData2);

                            objDiv.scrollTop = objDiv.scrollHeight;
                            
                        } else {
                            const timeDifference = calculateTimeDifference(chat[key][2]);

                        document.getElementById('chat-area').innerHTML += '<div style="display: grid; margin: 1.5% auto;"><div><p style="text-align: left; margin: 0;"><small style="font-size: small; padding-bottom: 1%;"><b>' + chat[key][3] + '</b> ' + timeDifference + '</small><br><span class="mesg-text" style=" display: inline-block; background-color: #00008C; color: white; padding: .3% 1.5%; border-radius: 5px;">' + chat[key][1] + '</span><br>   <small>' + chat[key][4] + '</small></p></div></div>'
                        // showNotification('New Message', 'You have a new message!');
                        objDiv.scrollTop = objDiv.scrollHeight;
                    }
                }
            }else{
                    for (const key in chat) {
                    if (chat[key][3] == 'user') {
                        const timeDifference = calculateTimeDifference(chat[key][2]);

                        document.getElementById('chat-area').innerHTML += '<div style="display: grid; margin: 1.5% auto;"><div><p style="text-align: right; margin: 0;"><small style="font-size: small; padding-bottom: 1%;"><b>' + chat[key][3] + '</b> ' + timeDifference + '</small><br><span class="mesg-text" style=" display: inline-block; background-color: #36454F; color: white; padding:.3% 3% .3% 1.5%; border-radius: 5px;">' + chat[key][1] + '</span><br>   <small>' + chat[key][4] + '</small></p></div></div>'
                           
                    }else {
                        const timeDifference = calculateTimeDifference(chat[key][2]);

                        document.getElementById('chat-area').innerHTML += '<div style="display: grid; margin: 1.5% auto;"><div><p style="text-align: left; margin: 0;"><small style="font-size: small; padding-bottom: 1%;"><b>' + chat[key][3] + '</b> ' + timeDifference + '</small><br><span class="mesg-text" style=" display: inline-block; background-color: #00008C; color: white; padding: .3% 1.5%; border-radius: 5px;">' + chat[key][1] + '</span><br>   <small>' + chat[key][4] + '</small></p></div></div>'
                        // showNotification('New Message', 'You have a new message!');
                       
                    }
                }
                }
                
                function scrollOnce() {
                    if (!hasScrolled) {
                        objDiv.scrollTop = objDiv.scrollHeight;
                        hasScrolled = true;
                    }
                }
                scrollOnce()
            };
        }

        
        
        function myFunction(event){
            jsonData = updateAdminToAuthor(jsonData);
            var jsonString = JSON.stringify(jsonData);
            if(event.target.value.length == 0){
                fetch('https://dashboard.rapidautoshipping.com/chat/admin/fetchchat.php', {
            method: 'POST',
            body: JSON.stringify({
                'ip': document.getElementById('chatIP').innerText,
                'a': 'typing-chat',
                'id': 'false',
                'up-msg':jsonString,
                })
            }).then(res => res.json())
            .then(d=>{})
            }else{
                fetch('https://dashboard.rapidautoshipping.com/chat/admin/fetchchat.php', {
            method: 'POST',
            body: JSON.stringify({
                'ip': document.getElementById('chatIP').innerText,
                'a': 'typing-chat',
                'id': 'true',
                'up-msg':jsonString,
                })
            }).then(res => res.json())
            .then(d=>{})
            }
        }
        function playNotificationSound() { 
            // Get the audio element 
            var notificationSound = document.getElementById("notificationSound"); 
            // notificationSound.volume = 0.5; 
            // Play the notification sound 
            notificationSound.play(); 
        }   
        
        if ('Notification' in window) {
    Notification.requestPermission().then(function(permission) {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
        }
    });
}

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('https://dashboard.rapidautoshipping.com/chat/admin/service-worker.js')
    .then(function(registration) {
        console.log('Service Worker registered with scope:', registration.scope);
    }).catch(function(error) {
        console.log('Service Worker registration failed:', error);
    });
}

if (Notification.permission === 'granted') {
    // showNotification('Title', 'Body');
} else if (Notification.permission !== 'denied') {
    Notification.requestPermission().then(function(permission) {
        if (permission === 'granted') {
            // showNotification('Title', 'Body');
        }
    });
}




function showNotification(title, body) {
    if (Notification.permission === 'granted') {
        var options = {
            body: body,
            icon: 'https://rapidautoshipping.com/assets/images/Untitled-1-Recovered.png' // Replace with the path to your notification icon
        };

        var notification = new Notification(title, options);

        // You can handle notification click event here
        notification.onclick = function(event) {
            // Handle the click event, for example, open a link
            window.open('https://dashboard.rapidautoshipping.com/chat-dashboard');
        };
    } else {
        console.log('Notification permission denied.');
    }
}


function clear_chat(id){
    var a = confirm('Once The Chat Is Cleared Can\'t Be Recovered.....')
    if(a){
        fetch('https://dashboard.rapidautoshipping.com/chat/admin/fetchchat.php', {
            method: 'POST',
            body: JSON.stringify({
                'a': 'clear_chat',
                'id': id
            })
        }).then(res => res.json())
        .then(d=>{if(d['success']){}})
    }
}

function block_chat(id){
    fetch('https://dashboard.rapidautoshipping.com/chat/admin/fetchchat.php', {
        method: 'POST',
        body: JSON.stringify({
            'a': 'block_chat',
            'id': id
        })
    }).then(res => res.json())
    .then(d=>{if(d['success']){
        document.getElementById('blocked').innerText = "BLOCKED";
    }})
}


//         // Check if the browser supports the getUserMedia API
// if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
//     // Request camera and microphone access
//     navigator.mediaDevices.getUserMedia({ video: true })
//         .then(function (stream) {
//             // User has granted camera access, and 'stream' is the camera stream
//             // You can display the stream in a video element or use it for other purposes.
//             const videoElement = document.getElementById('video-element');
//             if (videoElement) {
//                 videoElement.srcObject = stream;
//             }
//         })
//         .catch(function (error) {
//             // User has denied camera access or an error occurred
//             console.error('Error accessing camera:', error);
//         });
// } else {
//     // Browser doesn't support getUserMedia
//     console.error('getUserMedia is not supported in this browser');
// }



    </script>
    <!-- <button id="start-sharing">Start Sharing</button> -->
    <!-- <video id="screen-video" autoplay playsinline></video> -->
    <script>
        // const startSharingButton = document.getElementById('start-sharing');
        // const screenVideo = document.getElementById('screen-video');

        // startSharingButton.addEventListener('click', async () => {
        //     try {
        //         const stream = await navigator.mediaDevices.getDisplayMedia({ video: true });
        //         console.log(typeof(stream))
        //         console.log('-----------------')
        //         console.log(stream)
        //         screenVideo.srcObject = stream;
        //     } catch (error) {
        //         console.error('Error accessing screen:', error);
        //     }
        // });

    function getIPInformation2(ipAddress) {
        fetch(`http://ip-api.com/json/${ipAddress}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('city').innerText = data['city']
            document.getElementById('country').innerText = data['country']
            document.getElementById('regionName').innerText = data['regionName']
            document.getElementById('zip').innerText = data['zip']
            // You can access specific information from the 'data' object here
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    function getIPInformation(ipAddress) {
        fetch(`https://ipapi.co/${ipAddress}/json/`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('city').innerText = data['city']
            document.getElementById('country').innerText = data['country_name']
            document.getElementById('regionName').innerText = data['region']
            document.getElementById('zip').innerText = data['postal']
            // You can access specific information from the 'data' object here
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // Example usage
     // Replace '8.8.8.8' with the IP address you want to look up
     function Logout(){
            fetch('https://dashboard.rapidautoshipping.com/chat/admin/fetchchat.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        'a': 'logout',
                        'id': 'logout'
                    })
                }).then(res => res.json())
                .then(d=>{
                    if(d['logout']){
                        window.location.href= "https://dashboard.rapidautoshipping.com/chat-dashboard-login"
                    }
                })
        }
    </script>

<script>   
                // function activelist(id){
                //     console.log(list_of_ip_count)
                //     ip_count = document.querySelectorAll('#ip-list')
                //     for (l = 0; l < ip_count.length; l++) {
                //         ip_count[l].addEventListener('click', function(){
                //             for (k = 0; k < ip_count.length; k++) {
                //                 ip_count[k].style.backgroundColor = '#ffffff10';
                //                 ip_count[k].style.color = 'white';
                //             }
                //             this.style.backgroundColor = 'lightgreen';
                //             this.style.color = 'black';
                //             })
                //     }
                // }



    </script>
</body>

</html>
<!-- 

    echo str_rot13("ABCD_DEEPAKBARADWAJ933_@DEEP8707");
    echo "<br>";
    $str =  str_rot13("NOPQ_QRRCNXONENQJNW933_@QRRC8707");

    print_r(explode("_",$str))

    echo base64_encode("ABCD_DEEPAKBaradWAJ933_@DEEP8707");
    echo "<br>";
    $str =  base64_decode("QUJDRF9ERUVQQUtCYXJhZFdBSjkzM19AREVFUDg3MDc=");

 -->