<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Chat</title>
    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
        }

        .pk_solutions_input_fields {
            resize: none;
            border: 0;
            padding: 1%;
            width: 100%;
            height: 40px;
            outline: 0;
        }

        .pk_solutions_input_submit {
            width: 50px;
            height: 35px;
            background-color: tomato;
            color: white;
            font-weight: bolder;
            border: 0;
            outline: 0;
            place-items: center;
        }

        .pk_solutions_chat-input {
            width: 100%;
            border: 1px solid lightgray;
            border-radius: 5px;
            padding: 1%;
        }

        .pk_solutions_email_form {
            display: none;
        }

        .pk_solutions_send_chat_form {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chat {
            width: 300px;
            height: 540px;
            padding: .5%;
            border: 1px solid rgb(202, 202, 202);
            border-radius: 5px;
            position:fixed;                       
            background-color: lightgray;
            transform: scale(0) translate(50px, 200px);
            transition: transform .5s;
        }

        .pk_solutions_chat-area {
            width: 100%;
            /* height: 270px; */
            height: 350px;
            /* border: 1px solid lightgray;*/
            padding: 2%;
            margin: 2% auto;
            border-radius: 5px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .pk_solutions_hi-message {
            font-size: 2rem;
            width: auto;
            height: 100%;
            object-fit: cover;
            /*animation: bounce .3s linear infinite alternate;*/
        }
        .pk_solutions_hi-message img{
            width: 100%;
            height: 100%;
        }

        @keyframes bounce {
            from {
                transform: rotate(-15deg) scale(1);
            }

            to {
                transform: rotate(15deg) scale(1.2);
            }
        }

        .pk_solutions_send_email,
        .text {
            display: block;
        }


        .pk_solutions_send_chat,
        .pk_solutions_chatus {
            display: block;
        }


        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: grey;
        }

        ::-webkit-scrollbar-track {
            background-color: lightgray;
        }

        .pk_solutions_agent-div {
            display: flex;
            align-items: center;
            gap: 2%;
            border-radius: 5px;
        }

        .pk_solutions_agent-profile {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            position: relative;
        }

        .agent-online {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: green;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 1;
        }

        .pk_solutions_agent-profile img {
            border-radius: 50%;
        }

        .open-the-chat {
            width: 200px;
            height: 50px;
            /*display: grid;*/
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            bottom: 0;
            padding: .2% 1%;
            
            cursor: pointer;
            background-color: dodgerblue;
            color: white;
        }

        .open-the-chat:hover {
            background-color: black;
        }

        .open-the-chat:hover svg {
            color: dodgerblue;
        }

        .open-the-chat:hover span {
            color: dodgerblue;
        }

        .pk_solutions_chat-area p {
            padding: .5% 3%;
            font-size: 1.1rem;
        }

        .notify {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: none;
            background-color: tomato;
            position: absolute;
            right: -5%;
            top: -15%;
        }
    </style>
    <style>
        .loading{
            display: flex;
            width: auto;            
            width: 100px;
            justify-content: end;
            align-items: center;
            height: 100%;
        }
        .circle{
            width: 10px;
            height: 10px;
            margin: auto 1%;
            border-radius: 50%;
            background-color: grey;
            animation: typing 1s linear alternate infinite ;
        }
        .circle1, .circle3{animation: typing1 .5s  linear  alternate infinite ;}
        .circle2{animation: typing2 .5s linear alternate infinite ;}

        @keyframes typing1 {
            0%{transform: translateY(0px);}
            50%{transform: translateY(5px);}    
            100%{transform: translateY(0px);}
        }
        @keyframes typing2 {
            0%{transform: translateY(5px);}
            50%{transform: translateY(0px);}
            100%{transform: translateY(5px);}
        }
        .background-img{
            width: 100%;
            height: 100%;
            border-radius: 50%;
            position: absolute;
            z-index: -1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .background-img img{
            width: 270px;
            height: 270px;
            border-radius: 50%;
            opacity: .5;
            display: block;
        }

    </style>
</head>

<body>
    <div class="pk-solutions-chat" id="pk-solutions-chat"></div>
    <script>
        (() => {
            var ip
            fetch('https://api.ipify.org?format=json')
                .then(response => response.json())
                .then(data => {
                    ip = data.ip;
                    const formData = new FormData();
                    formData.append('ip', ip);
                    formData.append('url', window.location.href);
                    formData.append('token', 'abcd_deepakbaradwaj933_@deep8707');
                    fetch('https://dashboard.rapidautoshipping.com/chat/register-user.php', {
                            method: 'POST',
                            body: formData
                        }).then(response => response.json())
                        .then(data => {
                            // console.log(data)
                            if (data['status'] == 200) {
                                var linkElement = document.createElement('link');
                                linkElement.rel = 'stylesheet';
                                linkElement.type = 'text/css';
                                linkElement.href = 'https://dashboard.rapidautoshipping.com/chat/styles.css';
                                document.head.appendChild(linkElement);
                                document.getElementById('pk-solutions-chat').innerHTML = data['chat_layout'];   
                                var notificationSound = document.getElementById("notificationSound");
                                var script = document.createElement("script");
                                script.src = "https://dashboard.rapidautoshipping.com/chat/index.js";
                                script.async = true;
                                document.body.appendChild(script);

                            }
                        })
                })
        })()
    </script>

</body>

</html>