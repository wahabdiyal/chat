<!DOCTYPE html><html class=''>
<head>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="https://use.typekit.net/hoy3lrg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link rel="stylesheet" type="text/css" href="{{asset('css/message.css')}}">
<style class="cp-pen-styles">

</style>

</head>

<body>
 

<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<img id="profile-img" src="{{session('user')->image}}" class="online" alt="" />
				<p>{{session('user')->name}}</p>
				<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
				<div id="status-options">
					<ul>
						<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
						<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
						<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
						<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
					</ul>
				</div>
				<div id="expanded">
					<label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mikeross" />
					<label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="ross81" />
					<label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mike.ross" />
				</div>
			</div>
		</div>
		<div id="search">
			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
			<input type="text" placeholder="Search contacts..." />
		</div>
		<div id="contacts">
			<ul>
        @foreach($users as $user)
       <?php $a = \App\Models\Message::where('user_id',$user->id)->orderBy('id','desc')->first();

        ?>
				<li class="contact 
         @if(request()->user == $user->id)
         active
         @endif
        ">
        <a href="{{url('messagebox')}}?user={{$user->id}}">
					<div class="wrap">
						<span class="contact-status online"></span>
						<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
						<div class="meta">
							<p class="name">{{$user->name}}</p>
							<p class="preview" style="color: lightgray;">
                   <?php
             
             if($a){

             echo $a['message'];
             }
             ?>
              </p>
						</div>
					</div>
        </a>
				</li>
        @endforeach
	 
				 
			</ul>
		</div>
		<div id="bottom-bar">
			<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
			<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
		</div>
	</div>

  <!-- side bar of chat end -->


	<div class="content">
    <!-- reciver profile  -->
		<div class="contact-profile">
			@isset(request()->user)<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
			<p>
        
        {{\App\Models\User::find(request()->user)['name']}}

      </p>
      @endisset
			<div class="social-media">
				<i class="fa fa-facebook" aria-hidden="true"></i>
				<i class="fa fa-twitter" aria-hidden="true"></i>
				 <i class="fa fa-instagram" aria-hidden="true"></i>
			</div>
		</div>

    <!-- reciver profile end -->

		<div class="messages">
			<ul>
			<!-- 	<li class="sent">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					<p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
				</li> 
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>When you're backed against the wall, break the god damn thing down.</p>
				</li> -->
			 
				 
			</ul>
		</div>
    <!-- input for message  -->
    @isset(request()->user)
		<div class="message-input">
			<div class="wrap">
        <input type="hidden" id="sendto" name="sendto" value="{{request()->user}}">
			<input type="text" id="message" placeholder="Write your message..." />
			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>
    @endisset
    <!-- end of message  -->
	</div>
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('0fd21ea6a8c21227a10d', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('{{session("user")->id}}');
    channel.bind('abc', function(data) {
      
        

        var message =data.message;
     

       $('<li class="replies"><img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" /><p>'+message.message+'</p></li>').appendTo($('.messages ul'));
  
  $('.contact.active .preview').html('<span >@isset(request()->user)'+"<?=\App\Models\User::findOrFail(request()->user)['name']?>"+': @endisset</span><span>' + message.message+'<sup style="color: #ff99ff;position: absolute;">new</sup></span>');
  $(".messages").animate({ scrollTop: $(document).height() }, "fast");
      console.log('message reciver');
    });
  </script>

<script >
  $(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
  console.log('profile-img')
	$("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
	$("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
	$("#profile-img").removeClass();
	$("#status-online").removeClass("active");
	$("#status-away").removeClass("active");
	$("#status-busy").removeClass("active");
	$("#status-offline").removeClass("active");
	$(this).addClass("active");
	
	if($("#status-online").hasClass("active")) {
		$("#profile-img").addClass("online");
	} else if ($("#status-away").hasClass("active")) {
		$("#profile-img").addClass("away");
	} else if ($("#status-busy").hasClass("active")) {
		$("#profile-img").addClass("busy");
	} else if ($("#status-offline").hasClass("active")) {
		$("#profile-img").addClass("offline");
	} else {
		$("#profile-img").removeClass();
	};
	
	$("#status-options").removeClass("active");
});

function newMessage() {
  var message = $("#message").val();
	var sendto = $("#sendto").val();
	if($.trim(message) == '') {
		return false;
	}

/*ajax of message start*/
 
       
       $.ajax({
           type: "POST",
        url: '{{url("messages")}}',
           
           data: {"message":message,user:"{{request()->user}}",  "_token": "{{ csrf_token() }}"},
           success: function( msg ) {
                // alert( msg );
           }
    });

	$('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$('.contact.active .preview').html('<span>You: </span>' + message);
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});
//# sourceURL=pen.js
</script>
</body></html>