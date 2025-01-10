<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-POS Print Server</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">E-POS</a>
    </div>
  </nav>

  <main class="container">
    <div class="bg-body-tertiary p-5 mt-4 rounded">
      <h1>E-POS Print Server</h1>
      <p class="lead">An E-POS Print Server software solution that connects Point of Sale (POS) systems to printers,
        enabling seamless printing of receipts, invoices, and other transaction-related documents.</p>
      <div class="d-grid gap-2 d-md-block">
        <button class="btn btn-success" name="frmBtn" id="startSocket" value="start" type="button">
          Start Websocket
        </button>

        <button class="btn btn-dark" name="frmBtn" id="checksocketStatus" value="status" type="button">
          Check Websocket status
        </button>
      </div>
    </div>

    <div class="alert fade mt-2" id="alert" role="alert">
      <strong></strong>
    </div>
  </main>

  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/printer.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <script>
    $(function () {
      $('#checksocketStatus').on('click', function (e) {
        let content = {
          type: 'check-status'
        };

        $('button[name="frmBtn"]').attr('disabled', true);
        $('#alert').removeClass('alert-success alert-danger').addClass('alert-info show').find('strong').html('Please wait...');

        if (socket != null && socket.readyState == 1) {
          socket.send(JSON.stringify(content));
        } else {
          initializeSocket();
          setTimeout(function () {
            socket.send(JSON.stringify(content));
          }, 700);
        }

        socket.onmessage = function (msg) {
          $('#alert').removeClass('alert-danger alert-info').addClass('alert-success show').find('strong').html(msg.data);
          $('button[name="frmBtn"]').prop('disabled', false);
        };

        socket.onclose = function () {
          socket = null;
          $('#alert').removeClass('alert-danger alert-info').addClass('alert-success show').find('strong').html('Websocket is closed')
          $('button[name="frmBtn"]').prop('disabled', false);
        };

        return;
      })


      $('#startSocket').on('click', function (e) {
        let ele = $(this);
        let formData = new FormData();
        formData.append('frmBtn', 'start');

        $.ajax({
          url: "button_functions.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function () {
            $('button[name="frmBtn"]').attr('disabled', true);
            $('#alert').removeClass('alert-success alert-danger').addClass('alert-info show').find('strong').html('Please wait...');
          },
          success: function (response) {
            response = response.split('~~~');
            if (parseInt(response[1]) == 1) {
              $('#alert').removeClass('alert-danger alert-info').addClass('alert-success show').find('strong').html(response[2]);
            } else {
              $('#alert').removeClass('alert-success alert-info').addClass('alert-danger show').find('strong').html(response[2]);
            }
            $('button[name="frmBtn"]').prop('disabled', false);
            return;
          }
        });
      })
    });
  </script>
</body>

</html>