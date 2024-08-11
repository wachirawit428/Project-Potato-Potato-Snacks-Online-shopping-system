  <?php  include('config/db_connect.php'); ?>
    <script>
   //----------loader------
 	window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  };
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      });
  }

  </script>
    <script>
   //----------Modal Open------
 	window.uni_modal = function($title = '' , $url=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                $('#uni_modal').modal('show')
                end_load()
            }
        }
    });
}

   //----------Tost Message------
window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
   //----------Load Cart------
  window.load_cart = function(){
    $.ajax({
      url:'admin/ajax.php?action=get_cart_count',
      success:function(resp){
        if(resp > 0){
          resp = resp > 0 ? resp : 0;
          $('.item_count').html(resp)
        }
      }
    });
  }
  
  </script>
    <script>
    //----------Login------
  $('#login_now').click(function(){
    uni_modal("LOGIN",'login.php')
  });

  $(document).ready(function(){
    load_cart()
  });
  
  </script>
    <script>
          //----------View Product modal------
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        });
  //----------Add to cart Modal------
  $('#add_to_cart_modal').click(function(){
		start_load()
		$.ajax({
			url:'admin/ajax.php?action=add_to_cart',
			method:'POST',
			data:{pid:'<?php echo $_GET['prodid'] ?>',qty:$('[name="qty"]').val()},
			success:function(resp){
				if(resp == 1 )
					alert_toast("เพิ่มสินค้าในตะกร้าเรียบร้อย");
					$('.item_count').html(parseInt($('.item_count').html()) + parseInt($('[name="qty"]').val()))
					$('.modal').modal('hide')
					end_load()
			}
		});
	});
  
  </script>
    <script>
        //----------login form------
	$('#login-frm').submit(function(e){
		e.preventDefault()
		$('#login-frm button[type="submit"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		    $('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
			},
			success:function(resp){
				if(resp == 1){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
				}else{
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		});
	});
  
  </script>
  <script>
	$('#signup-frm').submit(function(e){
		e.preventDefault()
		$('#signup-frm button[type="submit"]').attr('disabled',true).html('Saving...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=signup',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
				}else{
					$('#signup-frm').prepend('<div class="alert alert-danger">Email already exist.</div>')
					$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		})
	})
</script>
    <script>
    //----------update quentity------
		$('.qty-plus').click(function(){
			   var qty =  $(this).siblings('input[name="qty"]').val();
				 $(this).siblings('input[name="qty"]').val(parseInt(qty) +1);
		     update_qty(parseInt(qty) +1,$(this).attr('data-id'));
		});

    $('.qty-minus').click(function(){
			   var qty =  $(this).siblings('input[name="qty"]').val();
          if (qty > 1) {            
            $(this).siblings('input[name="qty"]').val(parseInt(qty) -1);
            update_qty(parseInt(qty) -1,$(this).attr('data-id'));
          }
		});
  
    </script>
    <script>  
		function update_qty(qty,id){
			start_load()
			$.ajax({
				url:'admin/ajax.php?action=update_cart_qty',
				method:"POST",
				data:{id:id,qty},
				success:function(resp){
					if(resp == 1){
						load_cart();
             location.reload();
					}
				}
			});

		}
    
  </script>
    <script>
      //----------Go Checkout------
    $('#checkout').click(function(){
			if('<?php echo isset($_SESSION['login_user_id']) ?>' == 1){
				location.replace("index.php?page=checkout")
			}else{
        location.replace("index.php?page=login")
			}
		});
    
  </script>
    <script>
          //----------Checkout Data insert------
    $(document).ready(function(){
          $('#checkout-frm').submit(function(e){
            e.preventDefault()
          
            start_load()
            $.ajax({
                url:"admin/ajax.php?action=save_order",
                method:'POST',
                data:$(this).serialize(),
                success:function(resp){
                    if(resp==1){
                        alert_toast("Order successfully Placed.")
                        setTimeout(function(){
                            location.replace('index.php?page=success')
                        },1500)
                    }
                }
            })
        });
        });
</script>
<script>
    $(document).ready(function(){
    $('#updateprofile').submit(function(e){
     // alert('submit');
      e.preventDefault()
      start_load()
      $.ajax({
        url:'admin/ajax.php?action=update_profile',
        data: new FormData($(this)[0]),
          cache: false,
          contentType: false,
          processData: false,
          method: 'POST',
          type: 'POST',
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          if(resp == 1){
            alert_toast('Profile successfully Updated.','success')
            setTimeout(function(){
              location.reload()
            },1000)
          }
        }
      })

    })
});
</script>
<script>
    $(document).ready(function(){
    $('#changepassword').submit(function(e){
     // alert('submit');
      e.preventDefault()
      start_load()
      $.ajax({
        url:'admin/ajax.php?action=update_password',
        data: new FormData($(this)[0]),
          cache: false,
          contentType: false,
          processData: false,
          method: 'POST',
          type: 'POST',
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          if(resp == 1){
            alert_toast('Password successfully Changed.','success')
            setTimeout(function(){
              location.reload()
            },1000)
          }
          if(resp == 2){
            alert_toast('Password Dose not Same.','warning')
            setTimeout(function(){
              location.reload()
            },1000)
          }
        }
      })

    })
});
</script>
<script>
$(document).ready(function(){
    $('#food_search').submit(function(e){
      e.preventDefault()
      start_load()
      var inputval = $(this).find('input').val();
      location.replace("index.php?page=foods-menu&&catfoodnm="+inputval)
    })
});
</script>
<script>
    $(document).ready(function(){
    $('#odrcancl-frm').submit(function(e){
     // alert('submit');
      e.preventDefault()
      start_load()
      $.ajax({
        url:'admin/ajax.php?action=cancel_order',
        data: new FormData($(this)[0]),
          cache: false,
          contentType: false,
          processData: false,
          method: 'POST',
          type: 'POST',
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          if(resp == 2){
            alert_toast('Order successfully Cancled.','success')
            setTimeout(function(){
              location.replace("index.php?page=order-history")
            },1000)
          }
        }
      })

    })
});
</script>