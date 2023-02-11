<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AI Thông Minh</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/jquery.toast.min.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
        }
        .title:empty:before {
            content:attr(data-placeholder);
            color:gray
        }

    </style>

    <script src="https://unpkg.com/marked" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl w-full mx-auto sm:px-6 lg:px-8 space-y-4 py-4">
        <div class="text-center text-gray-800 dark:text-gray-300 py-4">
            <h1 class="text-7xl font-bold">Chat thông minh</h1>
        </div>

        <div class="w-full rounded-md bg-white border-2 border-gray-600 p-4 min-h-[60px] h-full text-gray-600">
            <div class="inline-flex gap-2 w-full">
                <input id="input_content" required name="title" class="w-full outline-none text-2xl font-bold" placeholder="Type your article title..." />
                <button class="rounded-md bg-emerald-500 px-4 py-2 text-white font-semibold" onclick="generate()">Hỏi</button>
            </div>
        </div>
        <div class="w-full rounded-md bg-white border-2 border-gray-600 p-4 min-h-[720px] h-full text-gray-600">
            <textarea id="content_reponse" class="min-h-[720px] h-full w-full outline-none" spellcheck="false"></textarea>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script src="{{asset('js/jquery.toast.min.js')}}"></script>
<script>

    $(function() {
        let test = prompt('Gõ kí tự được cấp để dùng','ví dụ : NTD123');
        if(test !=='NTD1683'){
            alert('Liên hệ để được cấp');
            window.open("https://www.facebook.com/ntd1683/", "_self");
        }
    });

    let input_content = document.getElementById('input_content');
    input_content.onkeypress = (e)=>{
        if (e.key === "Enter") {
            e.preventDefault();
            generate();
        }
    };
    function notify_success(content){
        $.toast({
            heading: 'Import Success',
            text: content,
            icon: 'success',
            position: 'top-right',
            showHideTransition: 'slide',
        });
    }
    function notify_error(content){
        $.toast({
            heading: 'Error',
            text: content,
            icon: 'error',
            position: 'top-right',
            showHideTransition: 'slide',
        });
    }
    function generate(){
        let input_content = document.getElementById('input_content').value;
        let content_reponse = document.getElementById('content_reponse');
        alert('Bạn chờ 10s để lấy dữ liệu nha , có thể lâu hơn do mạng');
        $.ajax({
            url: "{{route('processing')}}",
            type: 'POST',
            dataType: 'json',
            data: {title: input_content},
            success: function (response) {
                alert('Đã xog');
                notify_success('Đã hỏi chat GPT Thành Công');
                content_reponse.innerHTML = response.content;
            },
            error: function (response) {
                notify_error('Thất bại rồi');
            }
        });
    }
</script>

</body>
</html>
