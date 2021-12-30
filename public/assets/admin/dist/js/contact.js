var t = $('#manageTable').DataTable({
    "columnDefs": [{
      "searchable": false,
      "orderable": false,
      "targets": 0
    }],
    "order": [[1, 'desc']]
  });
  function removeFunc($id) {
    $('.alert-remove').html("<p>Bạn có muốn xóa Khách hàng ID :  " + $id + "?</p>")
    $("[name = lienhe]").val($id);
  }
  $(".remove_contact").on("click", function(e){
    e.preventDefault();
    var id = $("[name = lienhe]").val();
  
    $('#remove').attr('action', "/manage/contact/"+id).submit();
  });
  
