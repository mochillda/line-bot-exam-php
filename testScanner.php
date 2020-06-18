
<!-- <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script> -->
<script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>

<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My LIFF App</title>
</head>
<body>
  <p id="scanCode"></p>
  <p>
    <button type="button" class="btn btn-success" onclick="coupon()">ออกddd</button>
  </p>

</body>
</html>


  <script>
    function coupon() {
      liff.getProfile().then(function (profile) {
            liff.sendMessages([
                  {
                    type: 'image',
                    originalContentUrl: 'https://' + document.domain + '/imgs/' + res + '.jpg',
                    previewImageUrl: 'https://' + document.domain + '/imgs/' + res + '_240.jpg'
                  },
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
        //}
    	 
  }
  liff.init({ liffId: "1653870917-7bBqe2GM" }, () => {}, err => console.error(err.code, error.message));

  </script>
