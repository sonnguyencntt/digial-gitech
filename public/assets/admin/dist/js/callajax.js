function callApi($url,$data=null,$type="POST")
{
   return $.ajax({
        url: $url,
        type: $type,
        dataType: "JSON",
        data: $data
    });
}