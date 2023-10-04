$("#tblDataStaff").DataTable({
    scrollX: true
});
$("#tblData").DataTable({
    scrollX: true
});

$("#btnAddStaff").click(function(){
    $("#modalStaff").modal("show");
});

$("#btnAdd").click(function(){
    $("#formAdd").trigger('reset');
    $("#Kode").val('');
    $("#modalAdd").modal("show");
});

$("#tblData").on('click', '.editProfileCompany', function(){
    let data = $(this).data("id");
    var form_data = {};   
    form_data['Kode'] = data;  
    var urlFile = '/GetProfileCompany';
    getResult = postData(urlFile, form_data); 
    if(getResult.indexOf("Failed") >= 0)
    {
        alert(getResult);
    }
    else
    {
        var jsonData = JSON.parse(getResult);
        $("#modalAdd").modal("show");
        $("#CompanyName").val(jsonData.CompanyName);
        $("#Owner").val(jsonData.Owner);
        $("#Tagline").val(jsonData.TagLine);
        $("#Icon").val(jsonData.Icon);
        $("#AboutUs").val(jsonData.AboutUs);
        $("#Kode").val(jsonData.Kode);
        $(".btnAdd").text("Update");
    }

});


function postData(link, myFormData)
	{
		var getKey = [];
		var getValue = [];
		var resultData = null;
		var form_data = new FormData();
		getKey = Object.keys(myFormData);
		getValue = Object.values(myFormData);
		for(key=0; key<getKey.length; key++)
		{
			form_data.append(getKey[key], getValue[key]);
		}
		
		$.ajax({
			type: 'POST',  
			url: link,
			cache: false,
			contentType: false,
			processData: false,
			async:false,
			data: form_data,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') 
            },
			success: function(php_script_response){
				resultData = php_script_response;
			},
            error: function (request, status, error) {
                var jsonValue = JSON.parse( request.responseText );           
                resultData = "Failed, " + jsonValue.message;
            }
		});
		return resultData;
	}