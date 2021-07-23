

<!DOCTYPE html>
<html>
<head>
  <title>chat</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

  <style>

  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
  }

  .chat li .chat-body p {
    margin: 0;
    color: #777777;
  }

  .panel-body {
    overflow-y: scroll;
    height: 350px;
  }

  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }
</style>
</head>
<body>
  @yield('content')

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('0fd21ea6a8c21227a10d', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('{{session("user")->id}}');
    channel.bind('abc', function(data) {
        var a =JSON.stringify(data);
            $("ol").append("<li>"+a+"</li>");
      alert('message send');
    });
  </script>
<div class=" bg-gray-100 py-6 flex flex-col float-left justify-start sm:py-12">
  <div class="relative py-3 sm:max-w-xl sm:mx-auto">
 @foreach($users as $user)
 <a href="{{url('/')}}?user={{$user->id}}">{{$user->name}}</a>
  
  <br>
 @endforeach
 </div>
 </div>

  <h1>Pusher Test</h1>
  <ol>

      {{session('user')->name}}
    
  </ol>

  <script>

     $('#comment').on('click', function() {
    
    var name = $('#name').val();
       var message = $('#message').val();
       $('#message').val('').change();
       
       $.ajax({
           type: "POST",
        url: '{{url("messages")}}',
           
           data: {"message":message,user:"{{request()->user}}",  "_token": "{{ csrf_token() }}"},
           success: function( msg ) {
                alert( msg );
           }
    });
});
  </script>
</body>
</html>