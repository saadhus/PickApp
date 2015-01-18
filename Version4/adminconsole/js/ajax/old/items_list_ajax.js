// items_list.php ajax js for editing/deleting rows

function edit_table (rid, cid, text) {
	
    $.ajax({
      url: 'ajax-php/items_list_ajax.php',
      type: 'post',
      data: {'action': 'edit', 'rid': rid, 'cid': cid, 'text': text},
      success: function(data, status) {
        if(data == "ok") {
          // woot!
        }
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call

}

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
        }
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
});

// edit row upon blur event (after editing)
$('div').on('focus', '[contenteditable]', function() {
    var $this = $(this);
    $this.data('before', $this.html());
    return $this;
}).on('blur', '[contenteditable]', function() {
    var $this = $(this);
    if ($this.data('before') !== $this.html()) {
        $this.data('before', $this.html());
        $this.trigger('change');
		edit_table($this.attr('data-rid'), $this.attr('data-cid'), $this.html());
    }
    return $this;
});
