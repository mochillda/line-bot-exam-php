  <script src="https://static.line-scdn.net/liff/edge/2.1/liff.js"></script>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My LIFF App</title>
</head>
<body>
  <p id="scanCode"></p>
  <p>
    <button id="btnScanCode" onclick="liff.closeWindow();">Scan Code</button>
  </p>

</body>
</html>


  <script>
    

  function initializeApp(data) {
      let urlParams = new URLSearchParams(window.location.search);
	alert(data.context.userId));
  }


  $(function () {
        liff.init(function (data) {
          initializeApp(data);
        });
  });

  </script>