var t = $('#manageTable').DataTable({
  "columnDefs": [{
    "searchable": false,
    "orderable": false,
    "targets": 0
  }],
  "order": [[1, 'desc']]
});
t.on('order.dt search.dt', function () {
  t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
    cell.innerHTML = i + 1;
  });
}).draw();
$(".select_group").select2();
var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
 'onclick="alert(\'Call your custom code here.\')">' +
 '<i class="glyphicon glyphicon-tag"></i>' +
 '</button>'; 
   $("[name=hinhanh]").fileinput({
 overwriteInitial: true,
 maxFileSize: 1500,
 showClose: false,
 showCaption: false,
 browseLabel: '',
 removeLabel: '',
 browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
 removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
 removeTitle: 'Cancel or reset changes',
 elErrorContainer: '#kv-avatar-errors-1',
 msgErrorClass: 'alert alert-block alert-danger',
 // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
 layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
 allowedFileExtensions: ["jpg", "png", "gif", "txt"]
});

function validate()
{
  if (func.ValidateId(["hinhanh", "tieude" , "iddanhmuc" ,"noidung"], [], []) === true) {
    return true
}

return false;}
function validate_update()
{
  if (func.ValidateId(["tieude" , "iddanhmuc" ,"noidung"], [], []) === true) {
    return true
}

return false;}
function removeFunc($id) {
  $('.alert-remove').html("<p>Bạn có muốn xóa bài viết ID :  " + $id + "?</p>")
  $("[name = baiviet]").val($id);
}

$(".remove_blog").on("click", function(e){
  e.preventDefault();
  var id = $("[name = baiviet]").val();

  $('#remove').attr('action', "/manage/blog/"+id).submit();
});

function showBlog($id){
  $(".title-blog > b").text("#"+$id);
  callApi("/api/manage/blog/"+$id, null, 'GET').done(function (data) {
    console.log(data);
    $(".load-lazy-loading").hide();
    $(".content-blog").html(data[0].noi_dung);

  })


}