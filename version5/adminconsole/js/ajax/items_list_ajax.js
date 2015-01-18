// items_list.php ajax for editing/deleting rows

// delete row
$('.d-row').on('click', function(e){
    e.preventDefault();
	//get row id
	console.log(this);
    var rid = $(this).attr('data-rid');
	console.log(rid);
	
    $.ajax({
      url: 'ajax-php/items_list_ajax.php',
      type: 'post',
      data: {'action': 'delete', 'rid': rid},
      success: function(data, status) {
        if(data == "ok") {
          // woot!
		  alert("ok!!");
        }
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
});