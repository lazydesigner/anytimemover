<?php include '../connection.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Chat</title>
    <style>
        * {
            box-sizing: border-box;
        }
        ::-webkit-scrollbar {
        width: 5px;
        /* height: 12px; */
        }
        ::-webkit-scrollbar-thumb{
            background-color: grey;
        }
        ::-webkit-scrollbar-track{
            background-color: lightgray;
        }
        

        body, html{
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        .container-fluid{
            width: 100%;
            height: 100%;
        }

        .list-of-user{
            width: 30%;
            background-color: dodgerblue;
            padding-top: 5%;
            height: 100%;
            overflow-y: auto;
        }
        ul{width: auto;
            height:auto;
            margin-left: 10%;
            }
        li {
            list-style: none;
            margin: 3% 0;
            cursor: pointer;
            font-size: large;
            color: whitesmoke;
        }
        .chat-room{
            width: 100%;
            height: 100%;
        }
        .chat{padding: 1%;}
        .chat-area {
            width: 100%;
            height: 100%;
            padding: 2%;
            margin-bottom: 5%;
            border-radius: 5px;
            overflow: auto;
        }

        .chat-box {
            display: flex;
            align-items: center;
            width: 100%;
            height: 50px;
            border: 1px solid lightgray;
            border-radius: 5px;
            padding: .1%;
        }

        input {
            border: 0;
            outline: 0;
            width: 100%;
            height: 100%;
        }

        .send {
            font-size: x-large;
            font-weight: bold;
            cursor: pointer;
            width: 100px;
            height: 50px;
            background-color: dodgerblue;
            display: grid;
            place-items: center;
            
        }
        .send svg{color: whitesmoke;}
        .send:hover{
            background-color: tomato;
        }

        .user {
            display: flex;justify-content: space-between;
            padding: 1%;
            align-items: center;
            gap: 5%;
            font-weight: bolder;
            background-color: lightgray;
        }
        header{
            display: flex;
            height: 80px;
            padding: .1% 5%;
            justify-content: space-between;
            align-items: center;
            background-color: dodgerblue;
        }
        .login{
            width: 100px;
            height: 40px;
            cursor: pointer;
            border-radius: 5px;
            border: 0;
            font-weight: bolder;
        }
        .conntainer {
            width: 100%;
            height: calc(100% - 80px);
            display: flex;
            position: relative;
        }
        .ip-list{
            position: relative;
        }
        .offline{
            width: 15px;
            height: 15px;
            background-color: grey;
            border-radius: 50%;
            position: absolute;
            left: -15%;
        }
        .online{
            width: 15px;
            height: 15px;
            background-color: green;
            border-radius: 50%;
            position: absolute;
            left: -15%;
        }
        .notify{
            position: absolute;
            top: -70%;
            left: -3%;
            /* right: 0; */
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: orangered;
            display: grid;
            place-items: center;
        }
        .chat-area .mesg-text{
            font-size: 1.5rem;
        }
        table{
            width: 100%;
        }
        table tr td{
            padding: 1%;
        }
        
    </style>
</head>

<body>
   <div class="container-fluid">
    <!-- Header -->
    <header>
        <h1>Admin Chat</h1>
        <button class="login">Login</button>
    </header>
   <div class="conntainer">
        <div class="list-of-user">
            <ul id="list-of-online-user"></ul>
            <ul id="list-of-ip"></ul>
        </div>
        <div class="chat-room" id="chat-room"> </div>
    </div>
   </div>

   <audio id="notificationSound" src="./notification.wav" preload="auto"></audio>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js"></script>
    <script>
        var jsonData = {};
        let eventSource;
        i = 0
        scroll = 0


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


// Call the function to update "admin" to "author"




        //Read Message Function

        

        hasScrolled = false;
        function showChat(id) {
            fetch('fetchchat.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        'a': 'id',
                        'id': id
                    })
                }).then(res => res.json())
                .then(d => {
                    document.getElementById('chat-room').innerHTML = '<div class="user"><div class="email" id="email"></div><div id="agent"></div><div class="ip" id="ip"></div></div><div id="ip_detail" class="ip_detail"><table><tr><td><div><b>CITY</b> : <span id="city"></span></div></td><td><div><b>COUNTRY</b> : <span id="country"></span></div></td></tr><tr><td><div><b>REGION-NAME</b> : <span id="regionName"></span></div></td><td><div><b>ZIP</b> : <span id="zip"></span></div></td></tr></table></div><div class="chat" id="chat"> </div> ';
                    let chat = JSON.parse(d['mes'])
                    jsonData = chat
                    jsonData = updateAdminToAuthor(jsonData);
                    i = Object.keys(chat).length
                    document.getElementById('email').innerText = "Email<br> " + d['email']
                    document.getElementById('agent').innerHTML = "Agent<br> <span id='agent_name_'> " + d['agent'] + "</span>"
                    document.getElementById('ip').innerHTML = "IP<br> <span id='chatIP'>" + d['ip'] + "</span>"
                    if (eventSource) {
                        eventSource.close();
                    }
                    getIPInformation(d['ip']);
                    document.getElementById('chat').innerHTML = '<div class="chat-area" id="chat-area"></div><form onsubmit="return blockSubmit();" id="form"><div class="chat-box"><input class="chat-send" id="chat-send" onkeyup="myFunction(event)" placeholder="Type a Message"><button class="send" id="send" onclick="SendMessage()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16"><path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/></svg></button></div></form>'
                        hasScrolled = false;
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
            jsonData[i][2] = d.getMinutes() + 'min : ' + d.getSeconds() + 'sec';
            jsonData[i][3] = document.getElementById('agent_name_').innerText;
            jsonData[i][4] = '';
            i++
            var jsonString = JSON.stringify(jsonData);
            fetch('fetchchat.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        'ip': document.getElementById('chatIP').innerText,
                        'a': 'msg',
                        'id': jsonString
                    })
                }).then(res => res.json())
                .then(d => {

                    fetch('fetchchat.php', {
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
            // Split the given time format (e.g., "58min : 58sec")
            const [givenMinutes, givenSeconds] = givenTime.split(' : ').map(value => parseInt(value));
        
            // Calculate the total time in seconds since the given time
            const givenTimeInSeconds = givenMinutes * 60 + givenSeconds;
        
            // Get the current time in seconds
            const currentDate = new Date();
            const currentMinutes = currentDate.getMinutes();
            const currentSeconds = currentDate.getSeconds();
            const currentTimeInSeconds = currentMinutes * 60 + currentSeconds;
        
            // Calculate the time difference in seconds
            const timeDifferenceInSeconds = currentTimeInSeconds - givenTimeInSeconds;
        
            if (timeDifferenceInSeconds <= 0) {
                return '0min'; // Return 0 if the given time is in the future or equal to the current time
            }
        
            if (timeDifferenceInSeconds < 60) {
                // If the time difference is less than 1 minute, show seconds
                return `${timeDifferenceInSeconds}sec`;
            }
        
            // Calculate the minutes for the time difference
            const minutesDifference = Math.floor(timeDifferenceInSeconds / 60);
        
            // Format the result as "XXmin"
            return `${minutesDifference}min`;
        };
        


        
        function ResumeChat(ip) {
            eventSource = new EventSource('./chatupdate.php?ip=' + ip + '');
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

        function ActiveUsers(){
            eventSource2 = new EventSource('./useronline.php');
            eventSource2.onmessage = (event) => {
                outputs = JSON.parse(event.data)
                document.getElementById('list-of-ip').innerHTML = outputs['offline']
                document.getElementById('list-of-online-user').innerHTML = outputs['online']
            }
        }
        ActiveUsers()
        
        function myFunction(event){
            jsonData = updateAdminToAuthor(jsonData);
            var jsonString = JSON.stringify(jsonData);
            if(event.target.value.length == 0){
                fetch('fetchchat.php', {
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
                fetch('fetchchat.php', {
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
function showNotification(title, body) {
    if (Notification.permission === 'granted') {
        var options = {
            body: body,
            icon: './design2.png' // Replace with the path to your notification icon
        };
        var notification = new Notification(title, options);

        // You can handle notification click event here
        notification.onclick = function(event) {
            // Handle the click event, for example, open a link
            window.open('https://example.com');
        };
    } else {
        console.log('Notification permission denied.');
    }
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
    <!-- <button id="start-sharing">Start Sharing</button>
    <video id="screen-video" autoplay playsinline></video> -->
    <script>
    //     const startSharingButton = document.getElementById('start-sharing');
    //     const screenVideo = document.getElementById('screen-video');

    //     startSharingButton.addEventListener('click', async () => {
    //         try {
    //             const stream = await navigator.mediaDevices.getDisplayMedia({ video: true });
    //             screenVideo.srcObject = stream;
    //         } catch (error) {
    //             console.error('Error accessing screen:', error);
    //         }
    //     });

    function getIPInformation(ipAddress) {
    fetch(`http://ip-api.com/json/${ipAddress}`)
    .then(response => response.json())
    .then(data => {
        console.log(data)
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
    function getIPInformation2(ipAddress) {
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

    </script>
</body>

</html>

