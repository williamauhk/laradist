<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>多字倉頡字典</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script></head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
    <script src="http://www.openjs.com/scripts/events/keyboard_shortcuts/shortcut.js"></script>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">多字倉頡字典</h5>
    </div>
    <div class="container">
      <div class="card-deck mb-3 ">
        <div class="card mb-6 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">輸入要查詢的漢字：</h4>
          </div>
          <div class="card-body">
            <textarea name="input" id="input" class="form-control" rows="5" autofocus></textarea><hr>
            <button type="button" id="submit" class="btn btn-lg btn-block btn-outline-primary" onclick="search_func($('#input').val());" data-clipboard-target="#input">拆碼 和 複製到剪貼板 (Enter)</button>
            <input type="button" class="btn btn-lg btn-block btn-outline-primary" value="clear" onclick="$('#input').val('');">
          </div>
        </div>
        <div class="card mb-6 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">拆碼</h4>
          </div>
          <div class="card-body">
            <div id="ansner"></div>
          </div>
        </div>
      </div>      
    </div>
    <script>
        //add enter short cut to submit button
        shortcut.add("enter", function () {
            $('#submit').click();
        });
        
        //copy to clipboard, when click submit 
        new ClipboardJS('#submit');
        var req = null;

        //do search
        function search_func(value) {
            if (req != null) req.abort();
            req = $.ajax({
                type: "GET",
                url: "ajax",
                data: {
                    'input': value
                },
                dataType: "text",
                success: function (msg) {}
            }).done(function (data) {
                //change ansner to ajax result
                $('#ansner').html(data);
            });;
        }
    </script>
</body>
</html>