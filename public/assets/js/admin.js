$("#tblDataStaff").DataTable({
    scrollX: true
});
$("#tblData").DataTable({
    scrollX: true
});
$("#tblDataService").DataTable({
    scrollX: true
});
$("#tblDataClient").DataTable({
    scrollX: true
});
$("#tblPortofolio").DataTable({
    scrollX: true
});
$("#tblTopMenu").DataTable({
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
$("#btnAddPortofolio").click(function(){
    $("#formAdd").trigger('reset');
    $("#Kode").val('');
    $("#modalPortofolio").modal("show");
});
$("#btnAddTopMenu").click(function(){
    $("#modalTopMenu").modal("show");
});


$("#tblData").on('click', '.addDetailCompany', function(){
    let data = $(this).data("id");
    let company = $(this).data("company");

    $("#DetailCompanyName").val(company);
    $("#KodeDetail").val(data);
    $("#modalAddDetail").modal("show");

});

$("#tblDataService").on('click', '.editService', function(){
    let data = $(this).data("id");
    var form_data = {};   
    form_data['Kode'] = data;  
    var urlFile = '/GetServiceCompany';
    getResult = postData(urlFile, form_data); 
    if(getResult.indexOf("Failed") >= 0)
    {
        alert(getResult);
    }
    else
    {
        var jsonData = JSON.parse(getResult);
        $("#modalAdd").modal("show");
        $("#ServiceName").val(jsonData.ServiceName);
        $("#DetailService").val(jsonData.DetailService);
        $("#Icon").val(jsonData.Icon);
        $("#LinkDetail").val(jsonData.LinkDetail);
        $("#Kode").val(jsonData.Kode);
        $(".btnAdd").text("Update");
    }

});
$("#tblDataClient").on('click', '.edit', function(){
    let data = $(this).data("id");
    var form_data = {};   
    form_data['Kode'] = data;  
    var urlFile = '/GetDataClient';
    getResult = postData(urlFile, form_data); 
    if(getResult.indexOf("Failed") >= 0)
    {
        alert(getResult);
    }
    else
    {
        var jsonData = JSON.parse(getResult);
        $("#modalAdd").modal("show");
        $("#ClientName").val(jsonData.ClientName);
        $("#Address").val(jsonData.Address);
        $("#Phone").val(jsonData.Phone);
        $("#NPWP").val(jsonData.NPWP);
        $("#Email").val(jsonData.Email);
        $("#Kode").val(jsonData.Kode);
        
        const fileInput = document.querySelector('input[type="file"]');

        // Create a new File object
        const myFile = new File(['Logo'], jsonData.Logo, {
            lastModified: new Date(),
        });

        // Now let's create a DataTransfer to get a FileList
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(myFile);
        fileInput.files = dataTransfer.files;
        
        $(".btnAdd").text("Update");
    }

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

$("#tblPortofolio").on('click', '.editPortofolio', function(){
    let data = $(this).data("id");
    var form_data = {};   
    form_data['Kode'] = data;  
    var urlFile = '/GetDataPortofolio';
    getResult = postData(urlFile, form_data); 
    console.log(getResult);
    if(getResult.indexOf("Failed") >= 0)
    {
        alert(getResult);
    }
    else
    {
        var jsonData = JSON.parse(getResult);
        $("#modalPortofolio").modal("show");
        $("#ServiceName").val(jsonData.KodeService);
        $("#PortofolioName").val(jsonData.PortofolioName);
        $("#Link").val(jsonData.Link);
        $("#DetailPortofolio").text(jsonData.DetailPortofolio);
        $("#Kode").val(jsonData.Kode);
        //$("#Photo").val("http://localhost:8000/assets/img/portfolio/" + jsonData.Photo);
        $(".btnAdd").text("Update");
    }

});
$("#tblTopMenu").on('click', '.editTopBar', function(){
    let data = $(this).data("id");
    var form_data = {};   
    form_data['Kode'] = data;  
    var urlFile = '/GetDataTopMenu';
    getResult = postData(urlFile, form_data);
    if(getResult.indexOf("Failed") >= 0)
    {
        alert(getResult);
    }
    else
    {
        var jsonData = JSON.parse(getResult);
        $("#modalTopMenu").modal("show");
        $("#Menu").val(jsonData.Menu);
        $("#Link").val(jsonData.Link);
        $("#Icon").val(jsonData.Icon);
        $("#Isi").text(jsonData.Isi);
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