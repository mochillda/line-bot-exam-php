
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My LIFF App</title>
</head>
<body>
  <p id="scanCode"></p>
  <p>
    <button id="btnScanCode" onclick="scanCode();">Scan Code</button>
  </p>

</body>
</html>

  <script src="https://static.line-scdn.net/liff/edge/2.1/liff.js"></script>
  <script>
    function scanCode() {
    	  liff.sendMessages([
        {
          type: 'text',
          text: 'From:' + profile.displayName
        }
        ]).then(function () {
        liff.closeWindow();
        }).catch(function (error) {
        window.alert('Error sending message: ' + error.message);
        });
      }).catch(function (error) {
        window.alert("Error getting profile: " + error.message);
      });
    }
//     function scanCode() {
// //       alert('dddddd');
//       liff.scanCode().then(result => {
//         const stringifiedResult = JSON.stringify(result);
//         alert(stringifiedResult);
//         document.getElementById("scanCode").textContent = stringifiedResult;
//       });
//     }
//     liff.init({ liffId: "https://liff.line.me/1653870917-7bBqe2GM" }, () => {}, err => console.error(err.code, error.message));
  </script>
