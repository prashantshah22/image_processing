<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dummy Image</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/themes/base/jquery-ui.min.css" integrity="sha512-TFee0335YRJoyiqz8hA8KV3P0tXa5CpRBSoM0Wnkn7JoJx1kaq1yXL/rb8YFpWXkMOjRcv5txv+C6UluttluCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/jquery-ui.min.js" integrity="sha512-MSOo1aY+3pXCOCdGAYoBZ6YGI0aragoQsg1mKKBHXCYPIWxamwOE7Drh+N5CPgGI5SA9IEKJiPjdfqWFWmZtRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        *:focus {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-4 bg-secondary">
        <div class="row main">
            <div class=" col-md-3 d-flex flex-column h-100 overflow-auto ">
                <form autocomplete="off" id="comp-form" class="mb-3">
                    <h3>Compress Image</h3>
                    <input type="file" name="c_file" id="c_file" accept="image/*" class="mb-2 form-control" required>
                    <input type="text" name="c_ratio" id="c_ratio" placeholder="50 for 50% " class="mb-2 form-control" required>
                    <input type="submit" value="Upload" class="form-control bg-secondary-emphasis text-info fw-bolder compress_btn">
                </form>
                <form autocomplete="off" class="mb-3">
                    <h3>Create Dummy Image</h3>
                    <input type="text" name="width" id="width" placeholder="width" class="mb-2 form-control" required>
                    <input type="text" name="height" id="height" placeholder="height" class="mb-2 form-control" required>
                    <input type="color" name="color" id="color" class="mb-3 form-control">
                    <select name="format" id="format" class="mb-2 form-select">
                        <option value="png">png</option>
                        <option value="jpeg">jpeg</option>
                        <option value="gif">gif</option>
                    </select>
                    <input type="submit" value="Generate" class="form-control bg-secondary-emphasis text-info fw-bolder generate_btn">
                </form>
                <form autocomplete="off" id="resize-form">
                    <h3>Resize Image</h3>
                    <input type="file" name="file" id="file" accept="image/*" class="mb-2 form-control" required>
                    <input type="text" name="resize_width" id="resize_width" placeholder="width" class="mb-2 form-control" required>
                    <input type="text" name="resize_height" id="resize_height" placeholder="height" class="mb-2 form-control" required>
                    <input type="submit" value="Upload" class="form-control bg-secondary-emphasis text-info fw-bolder upload_btn">
                </form>
            </div>
            <div class="col-md-9 p-2 h-100 bg-white overflow-auto shadow-sm text-center">
                <div id="result"></div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(() => {
            $(".main").css({
                height: $(window).height() - 48
            });
            $(window).resize(() => {
                $(".main").css({
                    height: $(window).height() - 48
                })
            });
            $(".generate_btn").click((e) => {
                e.preventDefault();
                $("#result").html("");
                var width = $("#width").val();
                var height = $("#height").val();
                var color = $("#color").val();
                var format = $("#format").val();
                var red = parseInt(color[1] + color[2], 16);
                var green = parseInt(color[3] + color[4], 16);
                var blue = parseInt(color[5] + color[6], 16);
                if (width !== "" && height !== "" && !isNaN(width) && !isNaN(height)) {
                    $.ajax({
                        type: "post",
                        url: "php/img.php",
                        data: {
                            width: width,
                            height: height,
                            red: red,
                            green: green,
                            blue: blue,
                            format: format
                        },
                        success: response => {
                            console.log(response);
                            var img = document.createElement("img");
                            img.src = "img/" + response.trim();
                            img.style.width = "80%";
                            img.style.marginLeft = "10%";
                            img.style.marginRight = "10%";
                            $("#result").append(img);
                            var a = document.createElement("a");
                            a.href = "img/" + response.trim();
                            a.download = response.trim();
                            a.innerHTML = "DownLoad Now";
                            a.className = "btn btn-danger p-2 my-5";
                            $("#result").append(a);
                        }
                    })
                } else {
                    alert("Invalid width or height");
                    return;
                }
            })
        })
    </script>
    <!-- ---------------------------------------------- -->
    <script>
        $(document).ready(() => {
            $("#file").on("change", function() {
                $("#result").html("");
                var file = this.files[0];
                var url = URL.createObjectURL(file);
                var img = document.createElement("img");
                img.src = url;
                $("#result").html(img);
                img.onload = e => {
                    var o_width = img.width;
                    var o_height = img.height;
                    $("#resize_width").on("input", function() {
                        var typed_width = Number($(this).val());
                        var ratio = typed_width / o_width;
                        var rec_height = Math.floor(o_height * ratio);
                        $("#resize_height").val(rec_height);
                        img.width = typed_width;
                        img.height = rec_height;
                    });
                    $("#resize_height").on("input", function() {
                        var typed_height = Number($(this).val());
                        img.height = typed_height;
                    });
                }
                $("#resize-form").submit(e => {
                    e.preventDefault();
                    $("#result").html("");
                    var c_width = $("#resize_width").val();
                    var c_height = $("#resize_height").val();
                    $.ajax({
                        type: "post",
                        url: "php/resize.php",
                        data: new FormData(e.target),
                        processData: false,
                        cache: false,
                        contentType: false,
                        success: response => {
                            var link = "img/" + response.trim();
                            var a = document.createElement("a");
                            a.href = link;
                            a.download = response.trim();
                            a.innerHTML = "Download Now";
                            a.className = "btn btn-danger py-2 my-2";
                            $("#result").append(a);
                        }
                    });
                });
            });
        });
    </script>
    <!-- -----------------------compress Image------------------------ -->
    <script>
        $(document).ready(() => {
            $("#comp-form").submit(e => {
                e.preventDefault();
                $("#result").html("");
                $("#result").append("<h1>Processing your image...</h1>");
                $.ajax({
                    type: "post",
                    url: "php/compress.php",
                    data: new FormData(e.target),
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: response => {
                        $("#result").html("");
                        var link = "img/" + response.trim();
                        var img = document.createElement("img");
                        img.src = link;
                        img.style.width = "70%";
                        img.style.marginLeft = "10%";
                        img.style.marginRight = "10%";
                        $("#result").append(img);
                        var a = document.createElement("a");
                        a.href = link;
                        a.download = response.trim();
                        a.innerHTML = "Download Now";
                        a.className = "btn btn-danger py-2 my-2";
                        $("#result").append(a);
                    }
                });
            });
        });
    </script>
</body>

</html>