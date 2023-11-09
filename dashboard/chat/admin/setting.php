<!-- 

    chat background
    input field placeholder
    list of agents name
    list of agent image
    chat header color
    chat color user side and agent side

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting Of Chat</title>
    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        .setting-row {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            gap: 1%;
        }

        .setting-col {
            flex: 0 0 47%;
        }

        input {
            width: 250px;
            height: 40px;
            border: 1px solid lightgray;
            border-radius: 5px;
            outline: 0;
            padding: 1%;
        }

        input[type='color'] {
            width: 100px;
            height: 40px;
            border: 1px solid lightgray;
            border-radius: 5px;
        }
        input[type=number]{
            width: 100px;
            height: 30px;
            border-radius: 5px;
            outline: 0;
            cursor: pointer;
        }

        button {
            width: 100px;
            height: 40px;
            border: 0;
            border-radius: 5px;
            background-color: lightblue;
            font-weight: bold;
            cursor: pointer;
        }

        .setting1 {
            width: auto;
            height: auto;
            border: 1px solid lightgray;
            border-radius: 5px;
            padding: .5% 3%;
            margin: 1% 0;
        }

        .save-changes {
            width: 150px;
            text-align: center;
            font-weight: bold;
        }

        .agent-images {
            width: 100%;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .chat-position{
            width: 100px;
            height: 30px;
            border-radius: 5px;
            outline: 0;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="setting">
        <h1 style="text-align: center;">Chat Setting</h1><br />
        <div style="width:100%;height:100%;display:grid;justify-content:end;padding:1%;"><button id="save-changes" class="save-changes">Save Changes</button></div>
        <div class="setting-row">
            <div class="setting-col">
                <div class="setting1">
                    <h3>Chat background color</h3>
                    <div class="setting1-row">
                        <input type="color" name="background-color" id="background-color">
                    </div>
                </div>
                <div class="setting1">
                    <h3>Chat Header color</h3>
                    <div class="setting1-row">
                        <input type="color" name="header-color" id="header-color">
                    </div>
                </div>
                <div class="setting1">
                    <h3>Chat Color User Side And Admin Side</h3>
                    <div class="setting1-row">
                        <h4>User Side</h4>
                        <input type="color" name="user-color" id="user-color">
                    </div>
                    <div class="setting1-row">
                        <h4>Admin Side</h4>
                        <input type="color" name="admin-color" id="admin-color">
                    </div>
                </div>
                <div class="setting1">
                    <h3>Change Background Image</h3>
                    <div class="setting1-row  agent-images">
                        <div>
                            <input type="file" name="background-image" id="background-image">
                            <button id="background-image-button">Add</button>
                        </div>
                        <div id="showing-background-image"></div>
                    </div>
                </div>
                <div class="setting1">
                    <h3>Chat Position</h3>
                    <div class="setting1-row  agent-images">
                    <select name="chat-position" id="chat-position" class="chat-position">
                        <option value="right">right</option>
                        <option value="left">left</option>
                    </select>
                    <div class="positionvalue">
                        <span id="positionvaluerightleft">right</span><input type="number" min=0 name="positionvalue" id="positionvalueright">
                    </div>
                    <div class="positionvaluebottom">
                        <span>Margin From Bottom</span><input type="number" min=0 name="positionvalue" id="positionvaluebottom">
                    </div>
                    </div>
                </div>
            </div>
            <div class="setting-col">
                <div class="setting1">
                    <h3>Chat Heading</h3>
                    <div class="setting1-row">
                        <input type="text" name="chat-heading" id="chat-heading">
                    </div>
                </div>
                <div class="setting1">
                    <h3>Input Field PlaceHoder</h3>
                    <div class="setting1-row">
                        <input type="text" name="placeholder" id="placeholder">
                    </div>
                </div>
                <div class="setting1">
                    <h3>Agent Names</h3>
                    <div class="setting1-row agent-images">
                        <div>
                            <input type="text" name="agent-name" id="agent-name">
                            <button id="agent-name-button">Add</button>
                        </div>
                        <div class="list-of-agent-name" id="list-of-agent-name" style="padding: 2% 1%;"></div>
                    </div>
                </div>
                <div class="setting1">
                    <h3>Agent Images</h3>
                    <div class="setting1-row agent-images">
                        <div>
                            <input type="file" name="agent-images" id="agent-images">
                            <button id="agent-images-button">Add</button>
                        </div>
                        <div class="list-of-agent-image" id="list-of-agent-image" style="padding: 2% 1%;">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>


        list_of_agent_image = [];
        list_of_agent_name = [];

        document.getElementById('agent-images-button').addEventListener('click', () => {
            const Formdata = new FormData();
            var agent_image = document.getElementById('agent-images');
            filex = agent_image.files[0]

            Formdata.append('upload', 'image_upload');  
            Formdata.append('image', filex);

            fetch('https://dashboard.rapidautoshipping.com/chat/admin/upload.php',{
                method:'POST',
                body:Formdata
                }).then(response=> response.json()).then(data=>{
                    if(data['success']){
                        list_of_agent_image.push(data['image'])
                    document.getElementById('agent-images').value = ''
                    document.getElementById('list-of-agent-image').innerHTML = '';
                    for (b = 0; b < list_of_agent_image.length; b++) {
                        document.getElementById('list-of-agent-image').innerHTML += '<div style="display: flex;width:auto;height:50px;font-size:20px;width:200px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" class=""><div>' + list_of_agent_image[b] + '</div><div onclick="remove(' + b + ',\'' + list_of_agent_image[b] + '\')" style="width: 40px;height:50px;background-color:tomato;display:grid;place-items:center;font-size:xx-larger;font-weight:boler;color:white;cursor:pointer;"><b>&times;</b></div></div>'
                    }     
                    }else if(data['image_type']){
                        alert(data['image_type'])
                    }                                  
                })            
        })

        function remove(id, image_name) {
            const formdata = new FormData();
            formdata.append('upload','image_unlink')
            formdata.append('filename',image_name)
            fetch('https://dashboard.rapidautoshipping.com/chat/admin/upload.php',{
                method:'POST',
                body:formdata
            }).then(res=>res.json()).then(d=>{
                if(d['success']){
                    list_of_agent_image.splice(id, 1);
                    document.getElementById('list-of-agent-image').innerHTML = '';
                    for (b = 0; b < list_of_agent_image.length; b++) {
                        document.getElementById('list-of-agent-image').innerHTML += '<div style="display: flex;width:auto;height:50px;font-size:20px;width:200px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" class=""><div>' + list_of_agent_image[b] + '</div><div onclick="remove(' + b + ')" style="width: 40px;height:50px;background-color:tomato;display:grid;place-items:center;font-size:xx-larger;font-weight:boler;color:white;cursor:pointer;"><b>&times;</b></div></div>'
                    }
                }
            })
            
        }
        function removebackgroundimage(image_name) {
            const formdata = new FormData();
            formdata.append('upload','image_unlink')
            formdata.append('filename',image_name)
            fetch('https://dashboard.rapidautoshipping.com/chat/admin/upload.php',{
                method:'POST',
                body:formdata
            }).then(res=>res.json()).then(d=>{
                if(d['success']){
                    document.getElementById('showing-background-image').innerHTML = '<div style="display: flex;width:auto;height:50px;font-size:20px;width:200px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" class=""><input type="text" style="display: flex;width:auto;height:50px;font-size:20px;width:200px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" value="Empty" id="showing-background-image-name"></div>';
                }
            })
            
        }
        function remove2(id) {
            list_of_agent_name.splice(id, 1);
            document.getElementById('list-of-agent-name').innerHTML = '';
            for (bb = 0; bb < list_of_agent_name.length; bb++) {
                document.getElementById('list-of-agent-name').innerHTML += '<div style="display: flex;width:auto;height:50px;font-size:20px;width:200px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" class=""><div>' + list_of_agent_name[bb] + '</div><div onclick="remove2(' + bb + ')" style="width: 40px;height:50px;background-color:tomato;display:grid;place-items:center;font-size:xx-larger;font-weight:boler;color:white;cursor:pointer;"><b>&times;</b></div></div>'
            }
        }

        document.getElementById('agent-name-button').addEventListener('click', () => {
            var agent_name = document.getElementById('agent-name').value;
            list_of_agent_name.push(agent_name)
            document.getElementById('agent-name').value = ''
            document.getElementById('list-of-agent-name').innerHTML = '';
            for (bb = 0; bb < list_of_agent_name.length; bb++) {
                document.getElementById('list-of-agent-name').innerHTML += '<div style="display: flex;width:auto;height:50px;font-size:20px;width:200px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" class=""><div>' + list_of_agent_name[bb] + '</div><div onclick="remove2(' + bb + ')" style="width: 40px;height:50px;background-color:tomato;display:grid;place-items:center;font-size:xx-larger;font-weight:boler;color:white;cursor:pointer;"><b>&times;</b></div></div>'
            }
        })

        document.getElementById('save-changes').addEventListener('click', function() {
            background_color = document.getElementById('background-color').value
            header_color = document.getElementById('header-color').value
            user_color = document.getElementById('user-color').value
            admin_color = document.getElementById('admin-color').value
            chat_heading = document.getElementById('chat-heading').value
            placeholder = document.getElementById('placeholder').value    
            background_image = document.getElementById('showing-background-image-name').value
            chat_position = document.getElementById('chat-position').value
            left_right_position = document.getElementById('positionvalueright').value
            bottom_position = document.getElementById('positionvaluebottom').value
            fetch('https://dashboard.rapidautoshipping.com/chat/admin/fetchchat.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        'background_color': background_color,
                        'background_image': background_image,
                        'header_color': header_color,
                        'user_color': user_color,
                        'admin_color': admin_color,
                        'chat_heading': chat_heading,
                        'placeholder': placeholder,
                        'chat_position': chat_position,
                        'left_right_position': left_right_position,
                        'bottom_position': bottom_position,
                        'list_of_agent_name': JSON.stringify(list_of_agent_name),
                        'list_of_agent_image': JSON.stringify(list_of_agent_image),
                        'a': 'customise-chat',
                        'id': 1
                    })
                    
                }).then(res => res.json())
                .then(d => {
                    if(d['success']){
                        document.getElementById('list-of-agent-image').innerHTML = '';
                        document.getElementById('list-of-agent-name').innerHTML = '';
                        Get_detail();
                    }
                })

        })

        function colorToHex(colorName) {
            // Create a dummy element to help with color conversion
            const dummyElement = document.createElement("div");
            dummyElement.style.color = colorName;
            document.body.appendChild(dummyElement);

            // Get the RGB color of the dummy element
            const rgbColor = window.getComputedStyle(dummyElement).color;

            // Remove the dummy element from the DOM
            document.body.removeChild(dummyElement);

            // Convert the RGB color to a hexadecimal color code
            const hexColor = rgbColor.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            if (!hexColor) {
                // Return null if the color couldn't be parsed
                return null;
            }

            const r = parseInt(hexColor[1], 10).toString(16).padStart(2, '0');
            const g = parseInt(hexColor[2], 10).toString(16).padStart(2, '0');
            const b = parseInt(hexColor[3], 10).toString(16).padStart(2, '0');

            // Return the hexadecimal color code
            return `#${r}${g}${b}`;
        }

        Get_detail()

        function Get_detail() {
            fetch('https://dashboard.rapidautoshipping.com/chat/admin/fetchchat.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        'a': 'get_chat_detail',
                        'id': 1
                    })
                }).then(res => res.json())
                .then(d => {
                    document.getElementById('background-color').value = colorToHex(d['background-color']);
                    document.getElementById('header-color').value = colorToHex(d['header-color']);
                    document.getElementById('user-color').value = colorToHex(d['user-color']);
                    document.getElementById('admin-color').value = colorToHex(d['admin-color']);
                    document.getElementById('chat-heading').value = d['chat-heading'];
                    document.getElementById('placeholder').value = d['placeholder'];
                    document.getElementById('chat-position').value = d['chat-position']
                    document.getElementById('positionvaluerightleft').innerText = d['chat-position']
                    document.getElementById('positionvalueright').value = d['left-right-position']
                    document.getElementById('positionvaluebottom').value = d['bottom-position']
                    a = JSON.parse(d['agent-name'])
                    list_of_agent_name = a
                    for (bb = 0; bb < list_of_agent_name.length; bb++) {
                        document.getElementById('list-of-agent-name').innerHTML += '<div style="display: flex;width:auto;height:50px;font-size:20px;width:200px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" class=""><div>' + list_of_agent_name[bb] + '</div><div onclick="remove2(' + bb + ')" style="width: 40px;height:50px;background-color:tomato;display:grid;place-items:center;font-size:xx-larger;font-weight:boler;color:white;cursor:pointer;"><b>&times;</b></div></div>'
                    }

                    v = JSON.parse(d['agent-image'])
                    list_of_agent_image = v
                    for (b = 0; b < list_of_agent_image.length; b++) {
                        document.getElementById('list-of-agent-image').innerHTML += '<div style="display: flex;width:auto;height:50px;font-size:20px;width:200px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" class=""><div>' + list_of_agent_image[b] + '</div><div onclick="remove(' + b + ',\'' + list_of_agent_image[b] + '\')" style="width: 40px;height:50px;background-color:tomato;display:grid;place-items:center;font-size:xx-larger;font-weight:boler;color:white;cursor:pointer;"><b>&times;</b></div></div>'
                    }

                    document.getElementById('showing-background-image').innerHTML = '<div style="display: flex;width:auto;height:50px;font-size:20px;width:250px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" class=""><input type="text" style="display: flex;width:auto;height:50px;font-size:20px;width:200px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" value='+ d["background-image"] + ' id="showing-background-image-name"><div onclick="removebackgroundimage(\''+ d["background-image"] + '\')" style="width: 40px;height:50px;background-color:tomato;display:grid;place-items:center;font-size:xx-larger;font-weight:boler;color:white;cursor:pointer;"><b>&times;</b></div></div>';

                    
                })
        }

        document.getElementById('background-image-button').addEventListener('click',()=>{
            const Formdata = new FormData();
            namex = document.getElementById('background-image')
            var tt = namex.files[0]
            Formdata.append('upload', 'image_upload');  
            Formdata.append('image', tt);
            fetch('https://dashboard.rapidautoshipping.com/chat/admin/upload.php',{
                method:'POST',
                body:Formdata
                }).then(res=>res.json())
                .then(data=>{
                    if(data['success']){
                        document.getElementById('showing-background-image').innerHTML = '<div style="display: flex;width:auto;height:50px;font-size:20px;width:250px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" class=""><input type="text" style="display: flex;width:auto;height:50px;font-size:20px;width:200px;align-items:center;border:1px solid lightgrey;justify-content:space-between;margin:2px 0;" value='+ data["image"] + ' id="showing-background-image-name"><div onclick="removebackgroundimage(\''+ data["image"] + '\')" style="width: 40px;height:50px;background-color:tomato;display:grid;place-items:center;font-size:xx-larger;font-weight:boler;color:white;cursor:pointer;"><b>&times;</b></div></div>';
                    }
                })
            
        })

        document.getElementById('chat-position').addEventListener('change',()=>{
            document.getElementById('positionvaluerightleft').innerText = document.getElementById('chat-position').value
        })
       
    </script>
</body>

</html>