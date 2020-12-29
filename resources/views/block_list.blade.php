<!DOCTYPE html>

<html>

<head>

    <title>Laravel AJAX пагинация</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>

<div class="container">

    <h1>Laravel AJAX пагинация</h1>

    <div id="category_wrap">

        @include('block')

    </div>

</div>

<script type="text/javascript">


 $(document).ready(function(){
     $(document).on('click', '.pagination a', function (){
         event.preventDefault();
         var page = $(this).attr('href').split('page=')[1];
         fetch_data(page);
     });
     function fetch_data(page)
     {
         $.ajax({
             url: "/pagination/fetch_data?page="+page,
             success:function (data)
             {
                $('#category_wrap').html(data);
             },
             error:function (msg)
             {
                 return msg;
             }
         })
     }

 })

</script>

</body>

</html>
