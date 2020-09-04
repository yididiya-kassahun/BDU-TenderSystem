var postId = 0;

$('.post').find('.interaction').find('.edit').on('click', function(event){
    event.preventDefault();

    var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
     postId = event.target.parentNode.parentNode.dataset['postid'];
   // console.log(postBody);
     $('#post-body').val(postBody);
     $('#edit-modal').modal();

});

$('.post').find('.interaction').find('.reply').on('click', function(event){
    event.preventDefault();

    var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
     postId = event.target.parentNode.parentNode.dataset['postid'];
    //console.log(postId);
    //  $('#post-body').val(postBody);
      $('#edit-modal').modal();

});

$('.post').find('.myinfo').find('.posts').on('click', function(event){
  event.preventDefault();

  var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
   postId = event.target.parentNode.parentNode.dataset['postid'];
   // console.log(postId);
  //  $('#post-body').val(postBody);
    $('#edit-modal').modal();

});

$('#detail').find('.mydiv').find('.mod').on('click', function(event){
    event.preventDefault();

    var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
     postId = event.target.parentNode.parentNode.dataset['postid'];
     // console.log(postId);
    //  $('#post-body').val(postBody);
      $('#edit-modal').modal();

  });

$('#modal-save').on('click', function(){

    $.ajax({
        method: 'POST',
        url: url,
        data:{ body: $('#post-body').val(), postId: postId , _token: token }
    })
    .done(function(msg){
        console.log(JSON.stringify(msg));
    });
});

$postIds = 0;

$('#modal-savee').on('click', function(){

  $.ajax({
      method: 'POST',
      url: url,
      data:{purchaser: $('#purchaser').val(),
            purchase_method:$('#purchase_method').val(),
            purchase_type:$('#purchase_type').val(),
            purchase_id_no:$('#purchase_id_no').val(),
            lot_no:$('#lot_no').val(),
            content:$('#content').val(),postIds: postId , _token: token }
  })
  .done(function(msg){
      console.log(JSON.stringify(msg));
  });
});

// ############ For Technical Review Modal #################

$('#modal-save2').on('click', function(){

    $.ajax({
        method: 'POST',
        url: url,
        data:{technical_review: $('#review').val(),point:$('#point').val(),postIds: postId , _token: token }
    })
    .done(function(msg){
        console.log(JSON.stringify(msg));
    });
  });


