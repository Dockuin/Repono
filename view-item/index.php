<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
// 	header('Location: ../');
// 	exit;
// }
?>

<!DOCTYPE html>
<html>
	<head>

		<!-- Tab Styling -->
		<title>Robotics IMS - View Item</title>
        <link rel="icon" href="../img/logo.png">

        <!-- Responsive Design Tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- Page Styling -->
		<script src="https://kit.fontawesome.com/7daaf9098f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./style.css">

    </head>
    <body id="grad">
        <nav>
            <li><a href="../home"><i class="fas fa-home"></i> Robotics IMS</a></li>
            <li><a href="../profile"><i class="fas fa-user-circle"></i> Profile</a></li>
            <li><a href="../logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </nav>
        <div class="welcome-container">
            <h3 class="welcome-text">View Item</h3>
        </div>
		<div class="account-info-container">
            <h3 class="account-info-text">Enter the item ID:</h3>
            <form action="request-handler" method="post">
                <div>
                    <input type="text" name="ims-id" placeholder="IMS ID" id="ims-id" required>
                    </div>
                    
                    <div id="sourceSelectPanel" style="display:none">
                    <label for="sourceSelect">Video Source:</label>
                    <select id="sourceSelect" style="max-width:400px"></select>
                    </div>
                    
                    <button id="matrix-scanner"><i class="fas fa-camera" id="camera_button_icon"></i></button>
                    <script> 
                        const form = document.querySelector("form"); 
  
                        // Prevent form submission on button click 
                        document 
                        .getElementById("matrix-scanner") 
                        .addEventListener("click", function (event) { 
                            event.preventDefault(); 
                        }); 
                    </script>
                
                <div id="query_div">
                    <input type="submit" value="query">
                </div>
            </form>
            
        </div>
        <!-- MATRIX SCANNER -->
        <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest/umd/index.min.js"></script>
        <script type="text/javascript">
        
            var window_open = false
            window.mobileAndTabletCheck = function() {
                  let check = false;
                  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
                  return check;
            };
            var mobile = mobileAndTabletCheck()
            // Run when start button is clicked
            document.getElementById('matrix-scanner').addEventListener('click', () => {

                var div_video = document.getElementById('query_div')
                if (window_open) {
                    window_open = false
                    document.getElementById('camera_button_icon').className = 'fas fa-camera'
                    source_id = document.getElementById('sourceSelectPanel').style = 'display:none'
                    div_video.childNodes[0].remove()
                    

                } else {
                    window_open = true
                    document.getElementById('camera_button_icon').className = 'fas fa-xmark'
                    var video = document.createElement('video')
                    video.id = 'camera'
                    video.width = "600"
                    video.height = "400"
                    video.style = "border: 1px solid gray"
                    div_video.prepend(video)
                    
                    // Declares a variable to take what camera is used
                    let selectedDeviceId;
                    const codeReader = new ZXing.BrowserMultiFormatReader()
                    // Take all video sources
                    codeReader.listVideoInputDevices()
                    .then((videoInputDevices) => {
                        // Find which source is selected on page and set that to the backend source to be used
                        const sourceSelect = document.getElementById('sourceSelect')
                        if (mobile) {
                            video.width = "400"
                            video.height = "600"
                            selectedDeviceId = videoInputDevices[1].deviceId

                        } else {
                            selectedDeviceId = videoInputDevices[0].deviceId
                        }

                        // Checks that a camera is found and for each source, takes information from the camera feed and creates an option in the source selector
                        if (videoInputDevices.length >= 1) {
                            videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option')
                            sourceOption.text = element.label
                            sourceOption.value = element.deviceId
                            sourceSelect.appendChild(sourceOption)
                        })
                    }
                    })
                    
                    // Update source on value change and generate the selector panel
                    sourceSelect.onchange = () => {
                    selectedDeviceId = sourceSelect.value;
                    };
                
                    const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                    sourceSelectPanel.style.display = 'block'

                    // Attempt to decode anything in camera frame and and output a result, followed by closing the camera
                    codeReader.decodeFromVideoDevice(selectedDeviceId, 'camera', (result, err) => {
                    if (result) {
                        var redirect = '//theiceburg.net/robotics-ims/view-item/item-viewer?ims-id='.concat(result)
                        window.location.href = redirect
                        codeReader.reset()
                    }
                    // Error Handling
                    if (err && !(err instanceof ZXing.NotFoundException)) {
                        console.error(err)
                        document.getElementById('ims-id').textContent = err
                    }
                    })
                }
            })   
                
        </script>
    </body>
</html>