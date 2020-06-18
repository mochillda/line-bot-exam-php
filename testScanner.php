
<script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My LIFF App</title>
</head>
<body>
  <p id="scanCode"></p>
  <p>
    <button type="button" class="btn btn-success" onclick="liff.closeWindow()">ออก</button>
  </p>

</body>
</html>


  <script>
    function coupon() {
	   liff.closeWindow();
    }
//   function initializeApp(data) {
//       let urlParams = new URLSearchParams(window.location.search);
// 	alert(data.context.userId));
//   }


//   $(function () {
// 	  alert('ddddd');
//         liff.init(function (data) {
//           initializeApp(data);
//         });
//   });

  </script>
